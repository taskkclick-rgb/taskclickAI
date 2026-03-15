<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | TaskClickAI</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            display: flex;
            background: #0b0f1a;
        }
        .sidebar {
            width: 260px;
            background: var(--surface);
            height: 100vh;
            position: fixed;
            border-right: 1px solid var(--border);
            padding: 2rem 1rem;
            display: flex;
            flex-direction: column;
        }
        .main-content {
            margin-left: 260px;
            padding: 2rem 3rem;
            width: calc(100% - 260px);
        }
        .sidebar-logo {
            font-size: 1.25rem;
            font-weight: 800;
            margin-bottom: 3rem;
            padding-left: 1rem;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        .nav-menu {
            list-style: none;
            flex-grow: 1;
        }
        .nav-item {
            margin-bottom: 0.5rem;
        }
        .nav-link {
            display: flex;
            align-items: center;
            gap: 1rem;
            padding: 0.75rem 1rem;
            color: var(--text-secondary);
            text-decoration: none;
            border-radius: 8px;
            transition: var(--transition);
        }
        .nav-link:hover, .nav-link.active {
            background: rgba(99, 102, 241, 0.1);
            color: var(--white);
        }
        .nav-link i {
            width: 20px;
        }
        .top-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 3rem;
        }
        .user-profile {
            display: flex;
            align-items: center;
            gap: 1rem;
        }
        .avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: var(--primary);
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
        }
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 2rem;
            margin-bottom: 3rem;
        }
        .stat-card {
            background: var(--surface);
            padding: 1.5rem;
            border-radius: 16px;
            border: 1px solid var(--border);
        }
        .stat-label {
            color: var(--text-secondary);
            font-size: 0.9rem;
            margin-bottom: 0.5rem;
        }
        .stat-value {
            font-size: 1.5rem;
            font-weight: 700;
        }
        .dashboard-grid {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 2rem;
        }
        .content-card {
            background: var(--surface);
            padding: 2rem;
            border-radius: 20px;
            border: 1px solid var(--border);
        }
        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
        }
        .btn-sm {
            padding: 0.5rem 1rem;
            font-size: 0.85rem;
        }
        .task-list {
            list-style: none;
        }
        .task-item {
            padding: 1rem;
            border-bottom: 1px solid var(--border);
            display: flex;
            align-items: center;
            gap: 1rem;
        }
        .task-item:last-child { border-bottom: none; }
        .status-badge {
            padding: 0.25rem 0.75rem;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 600;
        }
        .badge-todo { background: rgba(148, 163, 184, 0.1); color: #94a3b8; }
        .badge-progress { background: rgba(99, 102, 241, 0.1); color: #6366f1; }
        .badge-done { background: rgba(16, 185, 129, 0.1); color: #10b981; }
    </style>
</head>
<body>

    <aside class="sidebar">
        <div class="sidebar-logo">
            <i class="fas fa-layer-group"></i> TaskClickAI
        </div>
        <ul class="nav-menu">
            <li class="nav-item">
                <a href="dashboard.php" class="nav-link active"><i class="fas fa-home"></i> Dashboard</a>
            </li>
            <li class="nav-item">
                <a href="projects/view_projects.php" class="nav-link"><i class="fas fa-project-diagram"></i> Projects</a>
            </li>
            <li class="nav-item">
                <a href="tasks/my_tasks.php" class="nav-link"><i class="fas fa-check-double"></i> Tasks</a>
            </li>
            <li class="nav-item">
                <a href="files/explorer.php" class="nav-link"><i class="fas fa-folder-open"></i> File Storage</a>
            </li>
            <li class="nav-item">
                <a href="ai/chat.php" class="nav-link"><i class="fas fa-robot"></i> AI Assistant</a>
            </li>
            <li class="nav-item">
                <a href="ai/ocr.php" class="nav-link"><i class="fas fa-file-invoice"></i> Image to Text</a>
            </li>
        </ul>
        <div style="margin-top: auto; padding-top: 1rem; border-top: 1px solid var(--border);">
            <a href="settings.php" class="nav-link"><i class="fas fa-cog"></i> Settings</a>
            <a href="auth/logout.php" class="nav-link" style="color: #ef4444;"><i class="fas fa-sign-out-alt"></i> Logout</a>
        </div>
    </aside>

    <main class="main-content">
        <div class="top-bar">
            <div>
                <h2 style="font-size: 1.5rem;">Welcome back, <?php echo htmlspecialchars($_SESSION['user_name']); ?>!</h2>
                <p style="color: var(--text-secondary); font-size: 0.9rem;">Here's what's happening with your projects today.</p>
            </div>
            <div class="user-profile">
                <button class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> New Project</button>
                <div class="avatar"><?php echo strtoupper(substr($_SESSION['user_name'], 0, 1)); ?></div>
            </div>
        </div>

        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-label">Active Projects</div>
                <div class="stat-value">12</div>
            </div>
            <div class="stat-card">
                <div class="stat-label">Tasks Pending</div>
                <div class="stat-value">48</div>
            </div>
            <div class="stat-card">
                <div class="stat-label">Storage Used</div>
                <div class="stat-value">124 MB / 500 MB</div>
            </div>
            <div class="stat-card">
                <div class="stat-label">Trial Days Left</div>
                <div class="stat-value">28</div>
            </div>
        </div>

        <div class="dashboard-grid">
            <div class="content-card">
                <div class="card-header">
                    <h3>Recent Tasks</h3>
                    <a href="#" style="color: var(--primary); font-size: 0.9rem; text-decoration: none;">View All</a>
                </div>
                <ul class="task-list">
                    <li class="task-item">
                        <i class="far fa-circle" style="color: var(--text-secondary);"></i>
                        <div style="flex-grow: 1;">
                            <div style="font-weight: 500;">Review system architecture</div>
                            <div style="font-size: 0.8rem; color: var(--text-secondary);">Core Engine Project</div>
                        </div>
                        <span class="status-badge badge-progress">In Progress</span>
                    </li>
                    <li class="task-item">
                        <i class="far fa-circle" style="color: var(--text-secondary);"></i>
                        <div style="flex-grow: 1;">
                            <div style="font-weight: 500;">Update documentation</div>
                            <div style="font-size: 0.8rem; color: var(--text-secondary);">API Development</div>
                        </div>
                        <span class="status-badge badge-todo">Todo</span>
                    </li>
                    <li class="task-item">
                        <i class="fas fa-check-circle" style="color: #10b981;"></i>
                        <div style="flex-grow: 1; text-decoration: line-through; opacity: 0.6;">
                            <div style="font-weight: 500;">Initial database setup</div>
                            <div style="font-size: 0.8rem; color: var(--text-secondary);">Core Engine Project</div>
                        </div>
                        <span class="status-badge badge-done">Completed</span>
                    </li>
                </ul>
            </div>

            <div class="content-card">
                <div class="card-header">
                    <h3>AI Suggestions</h3>
                </div>
                <div style="padding: 1rem; background: rgba(99, 102, 241, 0.05); border-radius: 12px; border-left: 4px solid var(--primary); margin-bottom: 1rem;">
                    <p style="font-size: 0.9rem; color: var(--text-primary);">"I noticed you have 3 tasks overdue in **Web Redesign**. Want me to help prioritize them?"</p>
                </div>
                <div style="padding: 1rem; background: rgba(168, 85, 247, 0.05); border-radius: 12px; border-left: 4px solid var(--secondary);">
                    <p style="font-size: 0.9rem; color: var(--text-primary);">"You haven't backed up your **Project Assets** folder this week. Click here to secure it."</p>
                </div>
                <button class="btn btn-outline btn-sm" style="width: 100%; margin-top: 1.5rem;">Chat with AI</button>
            </div>
        </div>
    </main>

</body>
</html>
