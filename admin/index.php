<?php
session_start();
include('include/config.php');

// Security: Prevent SQL Injection & use password hashing in real implementation
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = isset($_POST['email']) ? trim(mysqli_real_escape_string($con, $_POST['email'])) : '';
    $pass = isset($_POST['pass']) ? trim(mysqli_real_escape_string($con, $_POST['pass'])) : '';
    // Replace with password hashing in production!
    $que = mysqli_query($con, "SELECT * FROM admin WHERE email='$email' AND password='$pass'");
    if($que && mysqli_num_rows($que)) {
        $_SESSION['email'] = $email;
        header('location:dashboard.php');
        exit();
    } else {
        $err = "Invalid Email or Password!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin Login - Real Estate Portal</title>

    <!-- External CSS libraries -->
    <link type="text/css" rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="../assets/fonts/font-awesome/css/font-awesome.min.css">
    <link type="text/css" rel="stylesheet" href="../assets/fonts/flaticon/font/flaticon.css">

    <!-- Favicon icon -->
    <link rel="shortcut icon" href="../assets/img/logo.png" type="image/x-icon">

    <!-- Google fonts -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800%7CPoppins:400,500,700,800,900%7CRoboto:100,300,400,400i,500,700">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #185cff 100%);
            min-height: 100vh;
            position: relative;
            overflow-x: hidden;
        }

        body::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 1000"><defs><pattern id="grain" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="25" cy="25" r="1" fill="%23ffffff" opacity="0.03"/><circle cx="75" cy="75" r="1" fill="%23ffffff" opacity="0.03"/><circle cx="50" cy="10" r="0.5" fill="%23ffffff" opacity="0.05"/><circle cx="90" cy="40" r="0.5" fill="%23ffffff" opacity="0.05"/></pattern></defs><rect width="100%" height="100%" fill="url(%23grain)"/></svg>');
            pointer-events: none;
        }

        .animated-bg {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
            z-index: 1;
        }

        .animated-bg::before,
        .animated-bg::after {
            content: '';
            position: absolute;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
            animation: float 20s infinite linear;
        }

        .animated-bg::before {
            width: 300px;
            height: 300px;
            top: -150px;
            left: -150px;
            animation-delay: 0s;
        }

        .animated-bg::after {
            width: 200px;
            height: 200px;
            bottom: -100px;
            right: -100px;
            animation-delay: 10s;
        }

        @keyframes float {
            0% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-20px) rotate(180deg); }
            100% { transform: translateY(0px) rotate(360deg); }
        }

        .login-container {
            position: relative;
            z-index: 2;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem 1rem;
        }

        .login-card {
            background: rgba(255, 255, 255, 0.98);
            backdrop-filter: blur(20px);
            border-radius: 24px;
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15);
            width: 100%;
            max-width: 480px;
            padding: 3rem 2.5rem;
            position: relative;
            overflow: hidden;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .login-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, #667eea 0%, #185cff 100%);
        }

        .brand-section {
            text-align: center;
            margin-bottom: 2.5rem;
        }

        .brand-logo {
            width: 100px;
            height: 100px;
            margin: 0 auto 1.5rem;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(102, 126, 234, 0.3);
            transition: transform 0.3s ease;
            background: rgba(255, 255, 255, 0.9);
            padding: 1rem;
        }

        .brand-logo:hover {
            transform: scale(1.05);
        }

        .welcome-text {
            font-size: 1.8rem;
            font-weight: 700;
            color: #2d3748;
            margin-bottom: 0.5rem;
            letter-spacing: 0.5px;
        }

        .subtitle {
            color: #718096;
            font-size: 1rem;
            font-weight: 400;
        }

        .form-error {
            background: linear-gradient(135deg, #fed7d7 0%, #feb2b2 100%);
            color: #c53030;
            border-radius: 12px;
            padding: 1rem 1.25rem;
            margin-bottom: 1.5rem;
            border-left: 4px solid #e53e3e;
            display: flex;
            align-items: center;
            font-weight: 500;
            box-shadow: 0 4px 12px rgba(197, 48, 48, 0.15);
        }

        .form-error i {
            margin-right: 0.75rem;
            font-size: 1.1rem;
        }

        .form-group {
            margin-bottom: 1.75rem;
            position: relative;
        }

        .form-label {
            display: block;
            font-weight: 600;
            color: #2d3748;
            margin-bottom: 0.5rem;
            font-size: 0.95rem;
        }

        .input-group {
            position: relative;
        }

        .form-control {
            width: 100%;
            padding: 1rem 1rem 1rem 3rem;
            border: 2px solid #e2e8f0;
            border-radius: 12px;
            font-size: 1rem;
            font-weight: 500;
            background: #ffffff;
            transition: all 0.3s ease;
            outline: none;
        }

        .form-control:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
            background: #ffffff;
        }

        .form-control.is-invalid {
            border-color: #e53e3e;
            box-shadow: 0 0 0 3px rgba(229, 62, 62, 0.1);
        }

        .input-icon {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: #a0aec0;
            font-size: 1.1rem;
            z-index: 1;
        }

        .toggle-password {
            position: absolute;
            right: 1rem;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: #a0aec0;
            font-size: 1.1rem;
            cursor: pointer;
            outline: none;
            padding: 0.25rem;
            border-radius: 4px;
            transition: color 0.2s ease;
        }

        .toggle-password:hover {
            color: #667eea;
        }

        .invalid-feedback {
            display: block;
            color: #e53e3e;
            font-size: 0.85rem;
            margin-top: 0.5rem;
            font-weight: 500;
        }

        .btn-login {
            width: 100%;
            padding: 1rem 2rem;
            background: linear-gradient(135deg, #667eea 0%, #185cff 100%);
            border: none;
            border-radius: 12px;
            color: white;
            font-weight: 600;
            font-size: 1.1rem;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            box-shadow: 0 8px 25px rgba(102, 126, 234, 0.3);
        }

        .btn-login::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s;
        }

        .btn-login:hover::before {
            left: 100%;
        }

        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 35px rgba(102, 126, 234, 0.4);
        }

        .btn-login:active {
            transform: translateY(0);
        }

        .btn-login i {
            margin-right: 0.5rem;
        }

        .divider {
            margin: 2rem 0;
            text-align: center;
            position: relative;
        }

        .divider::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 0;
            right: 0;
            height: 1px;
            background: #e2e8f0;
        }

        .divider span {
            background: rgba(255, 255, 255, 0.98);
            padding: 0 1rem;
            color: #718096;
            font-size: 0.9rem;
            position: relative;
            z-index: 1;
        }

        .footer-text {
            text-align: center;
            color: #a0aec0;
            font-size: 0.9rem;
            margin-top: 2rem;
        }

        .footer-text a {
            color: #667eea;
            text-decoration: none;
            font-weight: 500;
        }

        .footer-text a:hover {
            text-decoration: underline;
        }

        @media (max-width: 576px) {
            .login-card {
                margin: 1rem;
                padding: 2rem 1.5rem;
            }

            .welcome-text {
                font-size: 1.5rem;
            }

            .brand-logo {
                width: 80px;
                height: 80px;
            }
        }

        /* Loading animation */
        .loading {
            position: relative;
            pointer-events: none;
        }

        .loading::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 20px;
            height: 20px;
            margin: -10px 0 0 -10px;
            border: 2px solid transparent;
            border-top: 2px solid #667eea;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        /* Success animation */
        @keyframes successPulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.05); }
            100% { transform: scale(1); }
        }

        .success-animation {
            animation: successPulse 0.6s ease-in-out;
        }
    </style>
</head>
<body>
    <div class="animated-bg"></div>

    <div class="login-container">
        <div class="login-card">
            <div class="brand-section">
                <img src="../assets/img/logos/black-logo.png" alt="Real Estate Portal Logo" class="brand-logo">
                <h1 class="welcome-text">Welcome Back</h1>
                <p class="subtitle">Sign in to your admin dashboard</p>
            </div>

            <form method="post" autocomplete="off" novalidate id="loginForm">
                <?php if(isset($err)): ?>
                    <div class="form-error" role="alert">
                        <i class="fa fa-exclamation-triangle"></i>
                        <?php echo htmlspecialchars($err); ?>
                    </div>
                <?php endif; ?>

                <div class="form-group">
                    <label for="adminEmail" class="form-label">Email Address</label>
                    <div class="input-group">
                        <span class="input-icon">
                            <i class="fa fa-envelope"></i>
                        </span>
                        <input
                            class="form-control"
                            id="adminEmail"
                            name="email"
                            required
                            type="email"
                            placeholder="Enter your email address"
                            autocapitalize="off"
                            spellcheck="false"
                            autofocus
                            autocomplete="username"
                            pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"
                        >
                    </div>
                    <div class="invalid-feedback">
                        Please enter a valid email address.
                    </div>
                </div>

                <div class="form-group">
                    <label for="adminPassword" class="form-label">Password</label>
                    <div class="input-group">
                        <span class="input-icon">
                            <i class="fa fa-lock"></i>
                        </span>
                        <input
                            class="form-control"
                            id="adminPassword"
                            name="pass"
                            required
                            type="password"
                            placeholder="Enter your password"
                            minlength="1"
                            autocomplete="current-password"
                        >
                        <button type="button" class="toggle-password" id="togglePass" tabindex="-1" aria-label="Toggle password visibility">
                            <i class="fa fa-eye" id="eyeIcon"></i>
                        </button>
                    </div>
                    <div class="invalid-feedback">
                        Password is required.
                    </div>
                </div>

                <button class="btn-login" type="submit" name="save" id="loginBtn">
                    <i class="fa fa-sign-in"></i>
                    <span id="btnText">Sign In</span>
                </button>
            </form>

            <div class="divider">
                <span>Secure Admin Access</span>
            </div>

            <div class="footer-text">
                <p>&copy; <?php echo date('Y'); ?> <strong>Real Estate Portal</strong>. All rights reserved.</p>
                <p><small>Secure admin dashboard for property management</small></p>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="../assets/js/jquery-3.6.0.min.js"></script>
    <script src="../assets/js/bootstrap.bundle.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const loginForm = document.getElementById('loginForm');
            const loginBtn = document.getElementById('loginBtn');
            const btnText = document.getElementById('btnText');
            const passInput = document.getElementById('adminPassword');
            const toggleBtn = document.getElementById('togglePass');
            const eyeIcon = document.getElementById('eyeIcon');

            // Password toggle functionality
            toggleBtn.addEventListener('click', function() {
                const isPassword = passInput.type === 'password';
                passInput.type = isPassword ? 'text' : 'password';
                eyeIcon.className = isPassword ? 'fa fa-eye-slash' : 'fa fa-eye';
                toggleBtn.setAttribute('aria-label', isPassword ? 'Hide password' : 'Show password');
            });

            // Form validation and submission
            loginForm.addEventListener('submit', function(e) {
                // Remove previous validation states
                loginForm.querySelectorAll('.form-control').forEach(input => {
                    input.classList.remove('is-invalid');
                });

                // Get form inputs
                const emailInput = document.getElementById('adminEmail');
                const passwordInput = document.getElementById('adminPassword');

                let isValid = true;
                let firstInvalidInput = null;

                // Validate email
                if (!emailInput.value.trim()) {
                    emailInput.classList.add('is-invalid');
                    isValid = false;
                    if (!firstInvalidInput) firstInvalidInput = emailInput;
                } else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(emailInput.value.trim())) {
                    emailInput.classList.add('is-invalid');
                    isValid = false;
                    if (!firstInvalidInput) firstInvalidInput = emailInput;
                }

                // Validate password
                if (!passwordInput.value.trim()) {
                    passwordInput.classList.add('is-invalid');
                    isValid = false;
                    if (!firstInvalidInput) firstInvalidInput = passwordInput;
                }

                if (!isValid) {
                    e.preventDefault();
                    firstInvalidInput.focus();

                    // Shake animation for invalid form
                    loginForm.style.animation = 'shake 0.5s ease-in-out';
                    setTimeout(() => {
                        loginForm.style.animation = '';
                    }, 500);

                    return false;
                }

                // Show loading state
                loginBtn.classList.add('loading');
                loginBtn.disabled = true;
                btnText.textContent = 'Signing In...';
            });

            // Real-time validation feedback
            loginForm.querySelectorAll('.form-control').forEach(input => {
                input.addEventListener('input', function() {
                    if (this.classList.contains('is-invalid')) {
                        // Re-validate on input
                        if (this.type === 'email') {
                            if (this.value.trim() && /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(this.value.trim())) {
                                this.classList.remove('is-invalid');
                            }
                        } else if (this.value.trim()) {
                            this.classList.remove('is-invalid');
                        }
                    }
                });

                input.addEventListener('blur', function() {
                    if (this.value.trim()) {
                        this.classList.remove('is-invalid');
                    }
                });
            });

            // Auto-focus first empty field
            if (!document.getElementById('adminEmail').value) {
                document.getElementById('adminEmail').focus();
            } else if (!document.getElementById('adminPassword').value) {
                document.getElementById('adminPassword').focus();
            }

            // Enter key support
            loginForm.addEventListener('keydown', function(e) {
                if (e.key === 'Enter') {
                    e.preventDefault();
                    loginBtn.click();
                }
            });
        });

        // Add shake animation keyframes via JavaScript
        const style = document.createElement('style');
        style.textContent = `
            @keyframes shake {
                0%, 100% { transform: translateX(0); }
                25% { transform: translateX(-5px); }
                75% { transform: translateX(5px); }
            }
        `;
        document.head.appendChild(style);
    </script>
</body>
</html>
