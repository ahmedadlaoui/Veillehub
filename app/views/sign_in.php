<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Veillehub - Sign In</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            background: var(--surface);
        }

        .login-container {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem;
            position: relative;
            overflow: hidden;
        }

        /* Animated background */
        .animated-bg {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 1;
        }

        .bg-circle {
            position: absolute;
            border-radius: 50%;
            background: var(--app-theme);
            opacity: 0.1;
        }

        .bg-circle:nth-child(1) {
            width: 400px;
            height: 400px;
            top: -200px;
            right: -200px;
            animation: pulse 8s infinite;
        }

        .bg-circle:nth-child(2) {
            width: 300px;
            height: 300px;
            bottom: -150px;
            left: -150px;
            animation: pulse 8s infinite 1s;
        }

        @keyframes pulse {
            0%, 100% { transform: scale(1); opacity: 0.1; }
            50% { transform: scale(1.1); opacity: 0.15; }
        }

        .login-card {
            background: var(--surface-light);
            padding: 3rem;
            border-radius: 20px;
            width: 100%;
            max-width: 420px;
            position: relative;
            z-index: 2;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
            animation: slideUp 0.8s ease;
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .login-header {
            text-align: center;
            margin-bottom: 2.5rem;
        }

        .login-header .logo {
            font-size: 2rem;
            margin-bottom: 1rem;
            display: inline-block;
        }

        .login-header p {
            color: var(--text-light);
            font-size: 1.1rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
            position: relative;
        }

        .form-group i {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text-light);
            transition: color 0.3s ease;
        }

        .form-input {
            width: 100%;
            padding: 1rem 1rem 1rem 3rem;
            background: var(--surface);
            border: 2px solid transparent;
            border-radius: 10px;
            color: var(--text);
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        .form-input:focus {
            border-color: var(--app-theme);
            outline: none;
        }

        .form-input:focus + i {
            color: var(--app-theme);
        }

        .form-options {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
        }

        .remember-me {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: var(--text-light);
        }

        .remember-me input[type="checkbox"] {
            accent-color: var(--app-theme);
        }

        .forgot-password {
            color: var(--app-theme);
            text-decoration: none;
            font-size: 0.9rem;
            transition: opacity 0.3s ease;
        }

        .forgot-password:hover {
            opacity: 0.8;
        }

        .sign-in-btn {
            width: 100%;
            padding: 1rem;
            background: var(--app-theme);
            color: var(--surface);
            border: none;
            border-radius: 10px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-bottom: 1.5rem;
        }

        .sign-in-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(251, 255, 146, 0.3);
        }

        .register-link {
            text-align: center;
            color: var(--text-light);
        }

        .register-link a {
            color: var(--app-theme);
            text-decoration: none;
            font-weight: 500;
            transition: opacity 0.3s ease;
        }

        .register-link a:hover {
            opacity: 0.8;
        }

        /* Social Login */
        .social-login {
            margin-top: 2rem;
            text-align: center;
        }

        .social-login p {
            color: var(--text-light);
            margin-bottom: 1rem;
            position: relative;
        }

        .social-login p::before,
        .social-login p::after {
            content: '';
            position: absolute;
            top: 50%;
            width: 30%;
            height: 1px;
            background: var(--text-light);
            opacity: 0.3;
        }

        .social-login p::before {
            left: 0;
        }

        .social-login p::after {
            right: 0;
        }

        .social-buttons {
            display: flex;
            gap: 1rem;
            justify-content: center;
        }

        .social-btn {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            background: var(--surface);
            color: var(--text);
            border: none;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .social-btn:hover {
            transform: translateY(-2px);
            background: var(--app-theme);
            color: var(--surface);
        }
    </style>
</head>
<body>
    <!-- Keep the existing header from student_board.html -->

    <div class="login-container">
        <div class="animated-bg">
            <div class="bg-circle"></div>
            <div class="bg-circle"></div>
        </div>
        
        <div class="login-card">
            <div class="login-header">
                <div class="logo">
                    <i class="fas fa-chart-line"></i>
                    Veille<span>hub</span>
                </div>
                <p>Welcome back! Please sign in to continue.</p>
            </div>

            <form>
                <div class="form-group">
                    <input type="email" class="form-input" placeholder="Email address" required>
                    <i class="fas fa-envelope"></i>
                </div>

                <div class="form-group">
                    <input type="password" class="form-input" placeholder="Password" required>
                    <i class="fas fa-lock"></i>
                </div>

                <div class="form-options">
                    <label class="remember-me">
                        <input type="checkbox">
                        Remember me
                    </label>
                    <a href="#" class="forgot-password">Forgot password?</a>
                </div>

                <button type="submit" class="sign-in-btn">Sign In</button>

                <p class="register-link">
                    Don't have an account? <a href="sign_up.html">Register now</a>
                </p>
            </form>

            <div class="social-login">
                <p>Or continue with</p>
                <div class="social-buttons">
                    <button class="social-btn">
                        <i class="fab fa-google"></i>
                    </button>
                    <button class="social-btn">
                        <i class="fab fa-github"></i>
                    </button>
                    <button class="social-btn">
                        <i class="fab fa-linkedin-in"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</body>
</html>