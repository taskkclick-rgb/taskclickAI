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
    <title>My Projects | TaskClickAI</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body { display: flex; background: #0b0f1a; }
        .sidebar { width: 260px; background: var(--surface); height: 100vh; position: fixed; border-right: 1px solid var(--border); padding: 2rem 1rem; display: flex; flex-direction: column; }
        .main-content { margin-left: 260px; padding: 2rem 3rem; width: calc(100% - 260px); }
        .project-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); gap: 2rem; }
        .project-card { background: var(--surface); border: 1px solid var(--border); border-radius: 16px; padding: 2rem; transition: var(--transition); }
        .project-card:hover { border-color: var(--primary); transform: translateY(-5px); }
        .project-status { display: flex; align-items: center; gap: 0.5rem; font-size: 0.8rem; margin-bottom: 1rem; }
        .sidebar-logo { font-size: 1.25rem; font-weight: 800; margin-bottom: 3rem; padding-left: 1rem; background: linear-gradient(135deg, var(--primary), var(--secondary)); -webkit-background-clip: text; -webkit-text-fill-color: transparent; }
        .nav-menu { list-style: none; flex-grow: 1; }
        .nav-item { margin-bottom: 0.5rem; }
        .nav-link { display: flex; align-items: center; gap: 1rem; padding: 0.75rem 1rem; color: var(--text-secondary); text-decoration: none; border-radius: 8px; transition: var(--transition); }
        .nav-link:hover, .nav-link.active { background: rgba(99, 102, 241, 0.1); color: var(--white); }
        .nav-link i { width: 20px; }
        .progress-bar { height: 8px; background: var(--background); border-radius: 4px; overflow: hidden; margin: 1.5rem 0 0.5rem; }
        .progress-fill { height: 100%; background: linear-gradient(90deg, var(--primary), var(--secondary)); }
    </style>
</head>
<body>

    <aside class="sidebar">
        <div class="sidebar-logo">
            <i class="fas fa-layer-group"></i> TaskClickAI
        </div>
        <ul class="nav-menu">
            <li class="nav-item"><a href="../dashboard.php" class="nav-link"><i class="fas fa-home"></i> Dashboard</a></li>
            <li class="nav-item"><a href="view_projects.php" class="nav-link active"><i class="fas fa-project-diagram"></i> Projects</a></li>
            <li class="nav-item"><a href="../tasks/my_tasks.php" class="nav-link"><i class="fas fa-check-double"></i> Tasks</a></li>
            <li class="nav-item"><a href="../files/explorer.php" class="nav-link"><i class="fas fa-folder-open"></i> File Storage</a></li>
            <li class="nav-item"><a href="../ai/chat.php" class="nav-link"><i class="fas fa-robot"></i> AI Assistant</a></li>
            <li class="nav-item"><a href="../ai/ocr.php" class="nav-link"><i class="fas fa-file-invoice"></i> Image to Text</a></li>
        </ul>
        <div style="margin-top: auto; padding-top: 1rem; border-top: 1px solid var(--border);">
            <a href="../auth/logout.php" class="nav-link" style="color: #ef4444;"><i class="fas fa-sign-out-alt"></i> Logout</a>
        </div>
    </aside>

    <main class="main-content">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 3rem;">
            <div>
                <h2 style="font-size: 1.5rem;">My Projects</h2>
                <p style="color: var(--text-secondary);">Manage and track all your active project workspaces.</p>
            </div>
            <button class="btn btn-primary"><i class="fas fa-plus"></i> Create Project</button>
        </div>

        <div class="project-grid">
            <div class="project-card">
                <div class="project-status">
                    <i class="fas fa-circle" style="color: #10b981; font-size: 0.6rem;"></i>
                    Active
                </div>
                <h3>E-commerce Redesign</h3>
                <p style="color: var(--text-secondary); font-size: 0.9rem; margin-top: 0.5rem;">Revamping the frontend and user experience for the main marketplace.</p>
                <div class="progress-bar">
                    <div class="progress-fill" style="width: 65%;"></div>
                </div>
                <div style="display: flex; justify-content: space-between; font-size: 0.8rem; color: var(--text-secondary);">
                    <span>65% Complete</span>
                    <span>12 Tasks</span>
                </div>
            </div>

            <div class="project-card">
                <div class="project-status">
                    <i class="fas fa-circle" style="color: #6366f1; font-size: 0.6rem;"></i>
                    In Planning
                </div>
                <h3>Mobile App Beta</h3>
                <p style="color: var(--text-secondary); font-size: 0.9rem; margin-top: 0.5rem;">Initial wireframes and architecture for the iOS/Android version.</p>
                <div class="progress-bar">
                    <div class="progress-fill" style="width: 15%;"></div>
                </div>
                <div style="display: flex; justify-content: space-between; font-size: 0.8rem; color: var(--text-secondary);">
                    <span>15% Complete</span>
                    <span>4 Tasks</span>
                </div>
            </div>

            <div class="project-card">
                <div class="project-status">
                    <i class="fas fa-lock" style="color: #f59e0b; font-size: 0.8rem;"></i>
                    Secure
                </div>
                <h3>Internal Security Audit</h3>
                <p style="color: var(--text-secondary); font-size: 0.9rem; margin-top: 0.5rem;">Confidential project data and encrypted files for the Q3 audit.</p>
                <div class="progress-bar">
                    <div class="progress-fill" style="width: 100%; background: #10b981;"></div>
                </div>
                <div style="display: flex; justify-content: space-between; font-size: 0.8rem; color: var(--text-secondary);">
                    <span>Completed</span>
                    <span>8 Files</span>
                </div>
            </div>
        </div>
    </main>

</body>
</html>
