<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Happy 2nd Monthsary Babyyyy! 💕</title>
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Bootstrap 5 CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts for cute typography -->
    <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@400;600&family=Sacramento&display=swap" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #ffdde1 0%, #ee9ca7 100%);
            min-height: 100vh;
            font-family: 'Fredoka', sans-serif;
            color: #5c3d46;
            overflow-x: hidden;
            position: relative;
        }

        /* Floating background emoji container */
        .emoji-bg-container {
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            pointer-events: none;
            z-index: 1;
            overflow: hidden;
        }

        .bg-emoji {
            position: absolute;
            bottom: -50px;
            font-size: 1.8rem;
            user-select: none;
            opacity: 0.6;
            animation: floatUp linear forwards;
        }

        @keyframes floatUp {
            0% { transform: translateY(0) rotate(0deg) scale(0.8); opacity: 0; }
            10% { opacity: 0.6; }
            90% { opacity: 0.6; }
            100% { transform: translateY(-110vh) rotate(360deg) scale(1.2); opacity: 0; }
        }

        /* Cute Title Styling */
        .romantic-title {
            font-family: 'Sacramento', cursive;
            font-size: 3.8rem;
            color: #ff4081;
            text-shadow: 2px 2px 0px #fff, 4px 4px 10px rgba(255, 64, 129, 0.2);
            line-height: 1.1;
        }

        /* Glassmorphism Soft Card */
        .card-custom {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(12px);
            border-radius: 30px;
            border: 4px solid #fff;
            box-shadow: 0 20px 40px rgba(238, 156, 167, 0.3);
            position: relative;
            z-index: 10;
        }

        /* Glowing & Blinking Cute Button */
        .cute-btn {
            background: linear-gradient(45deg, #ff6b81, #ff4757);
            color: white;
            border: none;
            border-radius: 50px;
            padding: 14px 36px;
            font-size: 1.1rem;
            font-weight: 600;
            letter-spacing: 0.5px;
            box-shadow: 0 10px 20px rgba(255, 71, 87, 0.4);
            animation: pulseGlow 1.8s infinite;
            transition: all 0.3s ease;
        }

        .cute-btn:hover {
            transform: translateY(-3px) scale(1.05);
            box-shadow: 0 15px 25px rgba(255, 71, 87, 0.6);
            color: white;
        }

        @keyframes pulseGlow {
            0% {
                transform: scale(1);
                box-shadow: 0 0 0 0 rgba(255, 107, 129, 0.7);
            }
            50% {
                transform: scale(1.03);
                box-shadow: 0 0 0 15px rgba(255, 107, 129, 0);
            }
            100% {
                transform: scale(1);
                box-shadow: 0 0 0 0 rgba(255, 107, 129, 0);
            }
        }

        /* Beat effect for main heart icon */
        .beating-heart {
            display: inline-block;
            font-size: 3.5rem;
            animation: heartBeat 1.2s infinite ease-in-out;
        }

        @keyframes heartBeat {
            0%, 100% { transform: scale(1); }
            14% { transform: scale(1.2); }
            28% { transform: scale(1); }
            42% { transform: scale(1.2); }
            70% { transform: scale(1); }
        }
    </style>
</head>
<body class="d-flex align-items-center justify-content-center">

    <!-- Background Floating Emojis Container -->
    <div class="emoji-bg-container" id="emojiBg"></div>

    <div class="container text-center px-3">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-5">
                <div class="card card-custom p-4 p-md-5 my-3">
                    <!-- Pulsing Heart Icon -->
                    <div class="mb-2">
                        <span class="beating-heart">💝</span>
                    </div>

                    <!-- Heading -->
                    <h1 class="romantic-title mb-2">
                        Happy 2nd Monthsary Babyyyy!
                    </h1>

                    <p class="text-muted mb-4 fs-6 fw-normal">
                        Welcome to your tiny corner of the internet! I built this sweet surprise just for you~ 🥺✨
                    </p>

                    <!-- Blinking/Glowing Button -->
                    <div class="mt-2">
                        <a href="/home" class="btn cute-btn text-decoration-none">
                            Press to Continue 💌
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Floating Emojis Script -->
    <script>
        const emojis = ['🌸', '💖', '✨', '💗', '🥺', '🥰', '🎀', '💌', '💕', '🌹'];

        function spawnBgEmoji() {
            const container = document.getElementById('emojiBg');
            const emojiEl = document.createElement('span');
            
            emojiEl.classList.add('bg-emoji');
            emojiEl.innerText = emojis[Math.floor(Math.random() * emojis.length)];

            const randomX = Math.random() * 100;
            const duration = Math.random() * 4 + 4;
            const size = Math.random() * 1.2 + 1;

            emojiEl.style.left = randomX + 'vw';
            emojiEl.style.animationDuration = duration + 's';
            emojiEl.style.fontSize = size + 'rem';

            container.appendChild(emojiEl);

            setTimeout(() => {
                emojiEl.remove();
            }, duration * 1000);
        }

        setInterval(spawnBgEmoji, 450);
    </script>

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/bootstrap.bundle.min.js"></script>
</body>
</html>