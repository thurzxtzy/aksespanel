<?php
session_start();

// Data pengguna yang valid (gunakan database di production)
$valid_username = 'Thurzx-Gpp';
$valid_password = 'Thurzx-Gpp';

// Cek jika sudah login
if (isset($_SESSION['logged_in']) && $_SESSION['logged_in']) {
    header('Location: kenzo.php');
    exit;
}

// Proses login
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    // Autentikasi sederhana
    if ($username === $valid_username && $password === $valid_password) {
        $_SESSION['logged_in'] = true;
        header('Location: kenzo.php');
        exit;
    } else {
        $error = "Invalid credentials. Please try again.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&family=Playfair+Display:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        :root {
            --primary: #4e54c8;
            --secondary: #8f94fb;
            --accent: #ff7e5f;
            --dark: #1a1a2e;
            --light: #f8f9fa;
            --glass: rgba(255, 255, 255, 0.1);
            --text-dark: #333;
            --text-light: #f8f9fa;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Montserrat', sans-serif;
            background: linear-gradient(135deg, var(--dark), #16213e);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--text-light);
            overflow: hidden;
            position: relative;
        }

        body::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: radial-gradient(circle at 20% 30%, rgba(78, 84, 200, 0.2) 0%, transparent 40%),
                        radial-gradient(circle at 80% 70%, rgba(143, 148, 251, 0.2) 0%, transparent 40%);
            z-index: -1;
        }

        .login-container {
            width: 100%;
            max-width: 420px;
            padding: 20px;
            z-index: 10;
            perspective: 1000px;
        }

        .login-card {
            background: var(--glass);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border-radius: 16px;
            padding: 40px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
            border: 1px solid rgba(255, 255, 255, 0.1);
            text-align: center;
            position: relative;
            overflow: hidden;
            transform-style: preserve-3d;
            transition: transform 0.5s ease, box-shadow 0.5s ease;
        }

        .login-card:hover {
            transform: translateY(-5px) rotateX(2deg) rotateY(2deg);
            box-shadow: 0 12px 40px rgba(0, 0, 0, 0.4);
        }

        .login-card::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: linear-gradient(
                to bottom right,
                transparent 45%,
                rgba(255, 255, 255, 0.03) 50%,
                transparent 55%
            );
            transform: rotate(30deg);
            animation: shine 8s infinite;
            pointer-events: none;
        }

        @keyframes shine {
            0% { transform: rotate(30deg) translate(-30%, -30%); }
            100% { transform: rotate(30deg) translate(30%, 30%); }
        }

        .login-header {
            margin-bottom: 30px;
            position: relative;
        }

        .login-title {
            font-family: 'Playfair Display', serif;
            font-size: 32px;
            font-weight: 700;
            color: var(--light);
            margin-bottom: 10px;
            letter-spacing: 1px;
            position: relative;
            display: inline-block;
        }

        .login-title::after {
            content: '';
            position: absolute;
            bottom: -8px;
            left: 50%;
            transform: translateX(-50%);
            width: 60px;
            height: 3px;
            background: linear-gradient(90deg, var(--primary), var(--accent));
            border-radius: 3px;
        }

        .login-subtitle {
            font-size: 14px;
            color: rgba(248, 249, 250, 0.7);
            letter-spacing: 0.5px;
            font-weight: 300;
            margin-top: 15px;
        }

        .login-form {
            margin-top: 30px;
        }

        .form-group {
            margin-bottom: 25px;
            text-align: left;
            position: relative;
        }

        .input-wrapper {
            position: relative;
        }

        .input-icon {
            position: absolute;
            left: 18px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--light);
            opacity: 0.7;
            transition: all 0.3s ease;
        }

        .login-input {
            width: 100%;
            padding: 15px 20px 15px 50px;
            border-radius: 8px;
            border: 1px solid rgba(255, 255, 255, 0.2);
            background: rgba(0, 0, 0, 0.2);
            color: var(--light);
            font-family: 'Montserrat', sans-serif;
            font-size: 15px;
            font-weight: 400;
            transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
        }

        .login-input::placeholder {
            color: rgba(248, 249, 250, 0.5);
            font-weight: 300;
        }

        .login-input:focus {
            outline: none;
            border-color: rgba(255, 255, 255, 0.4);
            background: rgba(0, 0, 0, 0.3);
            box-shadow: 0 0 0 2px rgba(78, 84, 200, 0.2);
        }

        .login-input:focus + .input-icon {
            opacity: 1;
            color: var(--accent);
            transform: translateY(-50%) scale(1.1);
        }

        .login-btn {
            width: 100%;
            padding: 16px;
            border-radius: 8px;
            border: none;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: var(--light);
            font-family: 'Montserrat', sans-serif;
            font-weight: 600;
            letter-spacing: 1px;
            cursor: pointer;
            transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
            margin-top: 10px;
            position: relative;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(78, 84, 200, 0.3);
        }

        .login-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: 0.5s;
        }

        .login-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(78, 84, 200, 0.4);
        }

        .login-btn:hover::before {
            left: 100%;
        }

        .login-btn:active {
            transform: translateY(0);
        }

        .login-btn i {
            margin-right: 8px;
        }

        .error-message {
            color: var(--accent);
            font-size: 14px;
            margin: 15px 0;
            text-align: center;
            font-weight: 500;
            padding: 10px 15px;
            background: rgba(255, 126, 95, 0.1);
            border-radius: 6px;
            border-left: 3px solid var(--accent);
            animation: fadeIn 0.4s ease-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .floating-particles {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
            z-index: -1;
        }

        .particle {
            position: absolute;
            background: rgba(255, 255, 255, 0.5);
            border-radius: 50%;
            animation: float linear infinite;
        }

        @keyframes float {
            0% { transform: translateY(0) rotate(0deg); opacity: 1; }
            100% { transform: translateY(-100vh) rotate(360deg); opacity: 0; }
        }

        .forgot-link {
            display: block;
            text-align: right;
            margin-top: 5px;
            font-size: 13px;
            color: rgba(248, 249, 250, 0.6);
            transition: color 0.3s ease;
        }

        .forgot-link:hover {
            color: var(--accent);
            text-decoration: none;
        }

        .language-selector {
            position: absolute;
            top: 20px;
            right: 20px;
            z-index: 100;
        }

        .language-btn {
            background: transparent;
            border: 1px solid rgba(255, 255, 255, 0.2);
            color: var(--light);
            padding: 5px 10px;
            border-radius: 20px;
            cursor: pointer;
            font-size: 12px;
            transition: all 0.3s ease;
        }

        .language-btn:hover {
            background: rgba(255, 255, 255, 0.1);
        }

        /* Responsive adjustments */
        @media (max-width: 480px) {
            .login-card {
                padding: 30px 20px;
            }
            
            .login-title {
                font-size: 28px;
            }
        }
    </style>
</head>
<body>
    <div class="floating-particles" id="particles"></div>
    
    <div class="login-container">
        <div class="login-card">
            <div class="login-header">
                <h1 class="login-title">Login Access</h1>
                <p class="login-subtitle">Masukan Username dan Password untuk melanjutkan nya</p>
            </div>
            
            <?php if (isset($error)): ?>
                <div class="error-message">
                    <i class="fas fa-exclamation-circle"></i> <?php echo $error; ?>
                </div>
            <?php endif; ?>
            
            <form method="POST" class="login-form">
                <div class="form-group">
                    <div class="input-wrapper">
                        <i class="fas fa-user input-icon"></i>
                        <input type="text" class="login-input" name="username" placeholder="Username" required>
                    </div>
                </div>
                
                <div class="form-group">
                    <div class="input-wrapper">
                        <i class="fas fa-lock input-icon"></i>
                        <input type="password" class="login-input" name="password" placeholder="Password" required>
                    </div>
                    <a href="#" class="forgot-link">
    <a href="https://wa.me/6281234099246?text=%23min+user+pw+create+panel+apa+min" class="link-button">forgot password?</a>
                </div>
                
                <button type="submit" class="login-btn">
                    <i class="fas fa-sign-in-alt"></i> Sign In
                </button>
            </form>
<div class="links">
    <a href="https://wa.me/6281234099246" class="link-button">ðŸ“Œ NOMOR THURZX ðŸ“Œ</a>
        </div>
    <a href="https://chat.whatsapp.com/KQMArdVh8jz0iT4qfHnh4Q" class="link-button">ðŸ“Œ COMUNITY THURZX ðŸ“Œ</a>
  </div>
        </div>
    </div>

    <script>
        // Create floating particles
        document.addEventListener('DOMContentLoaded', function() {
            const particlesContainer = document.getElementById('particles');
            const particleCount = 20;
            
            for (let i = 0; i < particleCount; i++) {
                const particle = document.createElement('div');
                particle.classList.add('particle');
                
                // Random properties
                const size = Math.random() * 5 + 2;
                const posX = Math.random() * 100;
                const delay = Math.random() * 10;
                const duration = Math.random() * 20 + 10;
                
                particle.style.width = `${size}px`;
                particle.style.height = `${size}px`;
                particle.style.left = `${posX}%`;
                particle.style.bottom = `-${size}px`;
                particle.style.animationDelay = `${delay}s`;
                particle.style.animationDuration = `${duration}s`;
                particle.style.opacity = Math.random() * 0.5 + 0.1;
                
                particlesContainer.appendChild(particle);
            }
            
            // Add subtle hover tilt effect
            const card = document.querySelector('.login-card');
            card.addEventListener('mousemove', (e) => {
                const xAxis = (window.innerWidth / 2 - e.pageX) / 25;
                const yAxis = (window.innerHeight / 2 - e.pageY) / 25;
                card.style.transform = `rotateY(${xAxis}deg) rotateX(${yAxis}deg)`;
            });
            
            // Reset on mouse leave
            card.addEventListener('mouseleave', () => {
                card.style.transform = 'rotateY(0deg) rotateX(0deg)';
            });
        });
    </script>
</body>
</html>