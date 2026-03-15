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
    <title>Image to Text | TaskClickAI</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body { display: flex; background: #0b0f1a; }
        .sidebar { width: 260px; background: var(--surface); height: 100vh; position: fixed; border-right: 1px solid var(--border); padding: 2rem 1rem; display: flex; flex-direction: column; }
        .main-content { margin-left: 260px; padding: 2rem 3rem; width: calc(100% - 260px); }
        .upload-area { border: 2px dashed var(--border); border-radius: 20px; padding: 4rem 2rem; text-align: center; transition: var(--transition); background: var(--surface); margin-bottom: 2rem; cursor: pointer; }
        .upload-area:hover { border-color: var(--primary); background: rgba(99, 102, 241, 0.05); }
        .upload-icon { font-size: 3rem; color: var(--primary); margin-bottom: 1rem; }
        .result-container { display: grid; grid-template-columns: 1fr 1fr; gap: 2rem; display: none; }
        .image-preview { width: 100%; border-radius: 12px; border: 1px solid var(--border); }
        .ocr-result { background: var(--surface); padding: 1.5rem; border-radius: 12px; border: 1px solid var(--border); height: 100%; position: relative; }
        .sidebar-logo { font-size: 1.25rem; font-weight: 800; margin-bottom: 3rem; padding-left: 1rem; background: linear-gradient(135deg, var(--primary), var(--secondary)); -webkit-background-clip: text; -webkit-text-fill-color: transparent; }
        .nav-menu { list-style: none; flex-grow: 1; }
        .nav-item { margin-bottom: 0.5rem; }
        .nav-link { display: flex; align-items: center; gap: 1rem; padding: 0.75rem 1rem; color: var(--text-secondary); text-decoration: none; border-radius: 8px; transition: var(--transition); }
        .nav-link:hover, .nav-link.active { background: rgba(99, 102, 241, 0.1); color: var(--white); }
        .nav-link i { width: 20px; }
        .copy-btn { position: absolute; top: 1rem; right: 1rem; background: var(--background); border: 1px solid var(--border); color: var(--text-primary); padding: 0.5rem; border-radius: 6px; cursor: pointer; }
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
            <li class="nav-item"><a href="chat.php" class="nav-link"><i class="fas fa-robot"></i> AI Assistant</a></li>
            <li class="nav-item"><a href="ocr.php" class="nav-link active"><i class="fas fa-file-invoice"></i> Image to Text</a></li>
        </ul>
        <div style="margin-top: auto; padding-top: 1rem; border-top: 1px solid var(--border);">
            <a href="../auth/logout.php" class="nav-link" style="color: #ef4444;"><i class="fas fa-sign-out-alt"></i> Logout</a>
        </div>
    </aside>

    <main class="main-content">
        <div style="margin-bottom: 3rem;">
            <h2 style="font-size: 1.5rem;">Image to Text Tool</h2>
            <p style="color: var(--text-secondary);">Upload any image with text, and our AI will extract it for you instantly.</p>
        </div>

        <div class="upload-area" id="uploadArea">
            <div class="upload-icon"><i class="fas fa-cloud-upload-alt"></i></div>
            <h3>Click or Drag & Drop Image</h3>
            <p style="color: var(--text-secondary);">Supports JPG, PNG, WebP (Max 5MB)</p>
            <input type="file" id="fileInput" hidden accept="image/*">
        </div>

        <div class="result-container" id="resultContainer">
            <div class="card">
                <h4 style="margin-bottom: 1rem;">Original Image</h4>
                <img id="previewImg" class="image-preview" src="" alt="Preview">
            </div>
            <div class="card">
                <h4 style="margin-bottom: 1rem;">Extracted Text</h4>
                <div class="ocr-result">
                    <button class="copy-btn"><i class="far fa-copy"></i></button>
                    <p id="extractedText" style="line-height: 1.8; color: var(--text-secondary);">Processing...</p>
                </div>
            </div>
        </div>
    </main>

    <script>
        const uploadArea = document.getElementById('uploadArea');
        const fileInput = document.getElementById('fileInput');
        const resultContainer = document.getElementById('resultContainer');
        const previewImg = document.getElementById('previewImg');
        const extractedText = document.getElementById('extractedText');

        uploadArea.addEventListener('click', () => fileInput.click());

        fileInput.addEventListener('change', (e) => {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = (event) => {
                    previewImg.src = event.target.result;
                    uploadArea.style.display = 'none';
                    resultContainer.style.display = 'grid';
                    
                    // Simulate OCR process
                    setTimeout(() => {
                        extractedText.textContent = "SUCCESS: Extracted Text logic is ready. In the final version, this will call the Tesseract.js or Cloud Vision API to return the exact text from your image.";
                        extractedText.style.color = 'var(--text-primary)';
                    }, 1500);
                }
                reader.readAsDataURL(file);
            }
        });
    </script>

</body>
</html>
