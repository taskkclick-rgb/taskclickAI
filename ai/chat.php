<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AI Assistant | TaskClickAI</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body { display: flex; background: #0b0f1a; }
        .sidebar { width: 260px; background: var(--surface); height: 100vh; position: fixed; border-right: 1px solid var(--border); padding: 2rem 1rem; display: flex; flex-direction: column; }
        .main-content { margin-left: 260px; padding: 0; width: calc(100% - 260px); height: 100vh; display: flex; flex-direction: column; }
        .chat-header { padding: 1.5rem 2rem; border-bottom: 1px solid var(--border); background: var(--surface); display: flex; align-items: center; gap: 1rem; }
        .chat-messages { flex-grow: 1; padding: 2rem; overflow-y: auto; display: flex; flex-direction: column; gap: 1.5rem; }
        .message { max-width: 80%; padding: 1rem 1.5rem; border-radius: 16px; position: relative; }
        .message.user { align-self: flex-end; background: var(--primary); color: white; border-bottom-right-radius: 2px; }
        .message.ai { align-self: flex-start; background: var(--surface); border: 1px solid var(--border); color: var(--text-primary); border-bottom-left-radius: 2px; }
        .chat-input-container { padding: 1.5rem 2rem; background: var(--surface); border-top: 1px solid var(--border); }
        .chat-input-wrapper { display: flex; gap: 1rem; background: var(--background); padding: 0.5rem; border-radius: 12px; border: 1px solid var(--border); }
        .chat-input { flex-grow: 1; background: transparent; border: none; color: var(--text-primary); padding: 0.5rem 1rem; font-size: 1rem; }
        .chat-input:focus { outline: none; }
        .ai-status { font-size: 0.8rem; color: #10b981; display: flex; align-items: center; gap: 0.5rem; }
        .sidebar-logo { font-size: 1.25rem; font-weight: 800; margin-bottom: 3rem; padding-left: 1rem; background: linear-gradient(135deg, var(--primary), var(--secondary)); -webkit-background-clip: text; -webkit-text-fill-color: transparent; }
        .nav-menu { list-style: none; flex-grow: 1; }
        .nav-item { margin-bottom: 0.5rem; }
        .nav-link { display: flex; align-items: center; gap: 1rem; padding: 0.75rem 1rem; color: var(--text-secondary); text-decoration: none; border-radius: 8px; transition: var(--transition); }
        .nav-link:hover, .nav-link.active { background: rgba(99, 102, 241, 0.1); color: var(--white); }
        .nav-link i { width: 20px; }
    </style>
</head>
<body>

    <aside class="sidebar">
        <div class="sidebar-logo">
            <i class="fas fa-layer-group"></i> TaskClickAI
        </div>
        <ul class="nav-menu">
            <li class="nav-item"><a href="../dashboard.php" class="nav-link"><i class="fas fa-home"></i> Dashboard</a></li>
            <li class="nav-item"><a href="../projects/view_projects.php" class="nav-link"><i class="fas fa-project-diagram"></i> Projects</a></li>
            <li class="nav-item"><a href="../tasks/my_tasks.php" class="nav-link"><i class="fas fa-check-double"></i> Tasks</a></li>
            <li class="nav-item"><a href="../files/explorer.php" class="nav-link"><i class="fas fa-folder-open"></i> File Storage</a></li>
            <li class="nav-item"><a href="chat.php" class="nav-link active"><i class="fas fa-robot"></i> AI Assistant</a></li>
            <li class="nav-item"><a href="ocr.php" class="nav-link"><i class="fas fa-file-invoice"></i> Image to Text</a></li>
        </ul>
        <div style="margin-top: auto; padding-top: 1rem; border-top: 1px solid var(--border);">
            <a href="../auth/logout.php" class="nav-link" style="color: #ef4444;"><i class="fas fa-sign-out-alt"></i> Logout</a>
        </div>
    </aside>

    <main class="main-content">
        <div class="chat-header">
            <div style="width: 48px; height: 48px; border-radius: 50%; background: linear-gradient(135deg, var(--primary), var(--secondary)); display: flex; align-items: center; justify-content: center; font-size: 1.5rem; color: white;">
                <i class="fas fa-robot"></i>
            </div>
            <div>
                <h2 style="font-size: 1.25rem;">AI Assistant</h2>
                <div class="ai-status"><i class="fas fa-circle" style="font-size: 0.6rem;"></i> Connected & Ready</div>
            </div>
        </div>

        <div class="chat-messages" id="chatMessages">
            <div class="message ai animate-fade-in">
                Hello <?php echo htmlspecialchars($_SESSION['user_name']); ?>! I'm your TaskClickAI assistant. I can help you summarize documents, organize your tasks, or answer questions about your projects. How can I assist you today?
            </div>
        </div>

        <div class="chat-input-container">
            <div class="chat-input-wrapper">
                <button style="background: transparent; border: none; color: var(--text-secondary); padding: 0 1rem; cursor: pointer;"><i class="fas fa-paperclip"></i></button>
                <input type="text" class="chat-input" id="userInput" placeholder="Ask anything about your files or projects...">
                <button class="btn btn-primary btn-sm" id="sendBtn" style="margin: 0.25rem;"><i class="fas fa-paper-plane"></i></button>
            </div>
        </div>
    </main>

    <script>
        const chatMessages = document.getElementById('chatMessages');
        const userInput = document.getElementById('userInput');
        const sendBtn = document.getElementById('sendBtn');

        function addMessage(text, isUser = false) {
            const msg = document.createElement('div');
            msg.className = `message ${isUser ? 'user' : 'ai'} animate-fade-in`;
            msg.textContent = text;
            chatMessages.appendChild(msg);
            chatMessages.scrollTop = chatMessages.scrollHeight;
        }

        sendBtn.addEventListener('click', () => {
            const text = userInput.value.trim();
            if (text) {
                addMessage(text, true);
                userInput.value = '';
                
                // Simulated AI Response
                setTimeout(() => {
                    addMessage("I'm processing your request. Since this is a preview, I can't talk to the live LLM yet, but my backend is ready to be connected!", false);
                }, 1000);
            }
        });

        userInput.addEventListener('keypress', (e) => {
            if (e.key === 'Enter') sendBtn.click();
        });
    </script>

</body>
</html>
