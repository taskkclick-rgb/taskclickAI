<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | TaskClickAI</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .auth-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem;
            background: radial-gradient(circle at center, rgba(99, 102, 241, 0.1), transparent);
        }
        .auth-card {
            background: var(--surface);
            padding: 3rem;
            border-radius: 20px;
            border: 1px solid var(--border);
            width: 100%;
            max-width: 450px;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
        }
        .auth-header {
            text-align: center;
            margin-bottom: 2rem;
        }
        .auth-header .logo {
            justify-content: center;
            margin-bottom: 1rem;
        }
        .form-group {
            margin-bottom: 1.5rem;
        }
        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            color: var(--text-secondary);
            font-size: 0.9rem;
        }
        .form-control {
            width: 100%;
            background: var(--background);
            border: 1px solid var(--border);
            padding: 0.75rem 1rem;
            border-radius: 8px;
            color: var(--text-primary);
            transition: var(--transition);
        }
        .form-control:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 2px rgba(99, 102, 241, 0.2);
        }
        .auth-footer {
            text-align: center;
            margin-top: 2rem;
            color: var(--text-secondary);
            font-size: 0.9rem;
        }
        .auth-footer a {
            color: var(--primary);
            text-decoration: none;
            font-weight: 600;
        }
    </style>
</head>
<body>

    <div class="auth-container">
        <div class="auth-card animate-fade-in">
            <div class="auth-header">
                <div class="logo">
                    <i class="fas fa-layer-group"></i>
                    TaskClickAI
                </div>
                <h2>Welcome back</h2>
                <p style="color: var(--text-secondary);">Log in to manage your projects.</p>
            </div>
            <form action="auth/login_process.php" method="POST">
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" id="email" name="email" class="form-control" placeholder="john@example.com" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" class="form-control" placeholder="••••••••" required>
                </div>
                <button type="submit" class="btn btn-primary" style="width: 100%; margin-top: 1rem;">Login</button>
            </form>
            <div class="auth-footer">
                Don't have an account? <a href="signup.php">Sign Up</a>
            </div>
        </div>
    </div>

</body>
</html>
