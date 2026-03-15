<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TaskClickAI – Smart Project Tracking with AI Assistance</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/your-code.js" crossorigin="anonymous"></script> <!-- Placeholder for FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>

    <nav>
        <div class="logo">
            <i class="fas fa-layer-group"></i>
            TaskClickAI
        </div>
        <ul class="nav-links">
            <li><a href="#features">Features</a></li>
            <li><a href="#pricing">Pricing</a></li>
            <li><a href="login.php" class="btn btn-outline">Login</a></li>
            <li><a href="signup.php" class="btn btn-primary">Start Free Trial</a></li>
        </ul>
    </nav>

    <header class="hero">
        <h1 class="animate-fade-in">TaskClickAI – Smart Project Tracking with AI Assistance</h1>
        <p class="animate-fade-in" style="animation-delay: 0.2s;">Manage your projects, secure your files, and let AI help you work smarter. The all-in-one productivity engine.</p>
        <div class="hero-btns animate-fade-in" style="animation-delay: 0.4s;">
            <a href="signup.php" class="btn btn-primary">Start Free Trial</a>
            <a href="#features" class="btn btn-outline">Learn More</a>
        </div>
        <div class="dashboard-preview animate-fade-in" style="animation-delay: 0.6s;">
            <img src="assets/images/dashboard_preview.png" alt="TaskClickAI Dashboard Preview">
        </div>
    </header>

    <section id="features" class="features">
        <div class="section-header">
            <h2>Everything you need to ship faster</h2>
            <p style="color: var(--text-secondary);">Powerful tools designed to enhance your productivity through AI and security.</p>
        </div>
        <div class="features-grid">
            <div class="feature-card">
                <div class="feature-icon"><i class="fas fa-tasks"></i></div>
                <h3>Project Tracking System</h3>
                <p>Organize tasks and projects like a professional workspace. Similar workflow to Monday.com with boards, deadlines, and progress tracking.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon"><i class="fas fa-shield-alt"></i></div>
                <h3>Secure Project Upload</h3>
                <p>Upload completed projects and protect them with password security. Keep your sensitive work private and organized in one place.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon"><i class="fas fa-cloud"></i></div>
                <h3>File Storage</h3>
                <p>Store important files safely. Think of it as your mini cloud storage for documents, resources, and project assets.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon"><i class="fas fa-robot"></i></div>
                <h3>AI Assistant</h3>
                <p>Smart AI that analyzes your files. Ask questions about your documents, get summaries, or request explanations instantly.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon"><i class="fas fa-file-invoice"></i></div>
                <h3>Image to Text</h3>
                <p>Upload an image and let AI detect and extract text. Easily copy editable text from screenshots or scanned documents.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon"><i class="fas fa-users-cog"></i></div>
                <h3>Team Ready</h3>
                <p>Coming soon: Advanced collaboration tools to manage teams, assign tasks, and sync workflows across your organization.</p>
            </div>
        </div>
    </section>

    <section class="testimonials">
        <div class="section-header">
            <h2>Trusted by creators & teams</h2>
        </div>
        <div class="testimonial-grid">
            <div class="testimonial-card">
                <div class="stars">
                    <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                </div>
                <p class="testimonial-text">"TaskClickAI helped me organize all my projects and files in one place. The AI assistant is a game changer for summarizing my research notes."</p>
                <div style="margin-top: 1.5rem; display: flex; align-items: center; gap: 1rem;">
                    <div style="width: 40px; height: 40px; border-radius: 50%; background: var(--primary);"></div>
                    <div>
                        <div style="font-weight: 600;">Sarah Johnson</div>
                        <div style="font-size: 0.8rem; color: var(--text-secondary);">Freelancer</div>
                    </div>
                </div>
            </div>
            <div class="testimonial-card">
                <div class="stars">
                    <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                </div>
                <p class="testimonial-text">"Managing school projects used to be a mess. Now I have a clear timeline and my files are securely backed up. Best tool I've used this year."</p>
                <div style="margin-top: 1.5rem; display: flex; align-items: center; gap: 1rem;">
                    <div style="width: 40px; height: 40px; border-radius: 50%; background: var(--secondary);"></div>
                    <div>
                        <div style="font-weight: 600;">David Chen</div>
                        <div style="font-size: 0.8rem; color: var(--text-secondary);">Student</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="pricing" class="pricing">
        <div class="section-header">
            <h2>Simple, transparent pricing</h2>
            <p style="color: var(--text-secondary);">Start for free, upgrade as you grow.</p>
        </div>
        <div class="pricing-grid">
            <div class="pricing-card">
                <h4>Basic</h4>
                <div class="price">$0<span>/mo</span></div>
                <p style="color: var(--text-secondary); margin-bottom: 2rem;">30-Day Free Trial included</p>
                <ul class="pricing-features">
                    <li>5 Projects</li>
                    <li>500MB Storage</li>
                    <li>100 AI Requests</li>
                    <li>Basic OCR</li>
                </ul>
                <a href="signup.php" class="btn btn-outline" style="width: 100%;">Get Started</a>
            </div>
            <div class="pricing-card popular">
                <div class="popular-badge">MOST POPULAR</div>
                <h4>Pro</h4>
                <div class="price">$19<span>/mo</span></div>
                <p style="color: var(--text-secondary); margin-bottom: 2rem;">For power users & freelancers</p>
                <ul class="pricing-features">
                    <li>Unlimited Projects</li>
                    <li>5GB Storage</li>
                    <li>1,000 AI Requests</li>
                    <li>Advanced OCR</li>
                    <li>Priority Support</li>
                </ul>
                <a href="signup.php" class="btn btn-primary" style="width: 100%;">Go Pro</a>
            </div>
            <div class="pricing-card">
                <h4>Team</h4>
                <div class="price">$49<span>/mo</span></div>
                <p style="color: var(--text-secondary); margin-bottom: 2rem;">For collaborative teams</p>
                <ul class="pricing-features">
                    <li>Everything in Pro</li>
                    <li>20GB Storage</li>
                    <li>5,000 AI Requests</li>
                    <li>Admin Dashboard</li>
                    <li>Custom Branding</li>
                </ul>
                <a href="signup.php" class="btn btn-outline" style="width: 100%;">Contact Sales</a>
            </div>
        </div>
    </section>

    <section style="padding: 8rem 5%; text-align: center;">
        <h2 style="font-size: 3rem; margin-bottom: 1.5rem;">Start organizing your projects with AI today.</h2>
        <a href="signup.php" class="btn btn-primary" style="padding: 1rem 3rem; font-size: 1.1rem;">Create Account Free</a>
    </section>

    <footer>
        <div class="footer-content">
            <div class="footer-links">
                <h5>TaskClickAI</h5>
                <p style="color: var(--text-secondary); font-size: 0.9rem;">The smart way to manage your work and projects with the power of Artificial Intelligence.</p>
            </div>
            <div class="footer-links">
                <h5>Product</h5>
                <ul>
                    <li><a href="#features">Features</a></li>
                    <li><a href="#pricing">Pricing</a></li>
                    <li><a href="#">Dashboard</a></li>
                </ul>
            </div>
            <div class="footer-links">
                <h5>Support</h5>
                <ul>
                    <li><a href="#">Contact</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                    <li><a href="#">Terms of Service</a></li>
                </ul>
            </div>
        </div>
        <div class="footer-bottom">
            &copy; 2026 TaskClickAI. All rights reserved.
        </div>
    </footer>

</body>
</html>
