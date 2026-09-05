<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Do You Love Me? 🥺</title>
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@400;600&family=Sacramento&family=Dancing+Script:wght@600;700&display=swap" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #ffdde1 0%, #ee9ca7 100%);
            min-height: 100vh;
            font-family: 'Fredoka', sans-serif;
            color: #5c3d46;
            overflow: hidden;
            position: relative;
        }

        /* Floating background emojis */
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
            opacity: 0.7;
            animation: floatUp linear forwards;
        }

        @keyframes floatUp {
            0% { transform: translateY(0) rotate(0deg) scale(0.8); opacity: 0; }
            10% { opacity: 0.7; }
            90% { opacity: 0.7; }
            100% { transform: translateY(-110vh) rotate(360deg) scale(1.2); opacity: 0; }
        }

        /* Main Question Box */
        .card-custom {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 30px;
            border: 4px solid #fff;
            position: relative;
            min-height: 480px;
            z-index: 10;
            animation: floatCard 4s ease-in-out infinite;
        }

        @keyframes floatCard {
            0%, 100% {
                transform: translateY(0px);
                box-shadow: 0 15px 35px rgba(238, 156, 167, 0.4), 0 5px 15px rgba(255, 107, 129, 0.2);
            }
            50% {
                transform: translateY(-12px);
                box-shadow: 0 25px 45px rgba(238, 156, 167, 0.5), 0 10px 20px rgba(255, 107, 129, 0.3);
            }
        }

        .romantic-title {
            font-family: 'Sacramento', cursive;
            font-size: 3.5rem;
            color: #ff4081;
        }

        .couple-img {
            width: 180px;
            height: 180px;
            object-fit: cover;
            border-radius: 50%;
            border: 5px solid #ff6b81;
            box-shadow: 0 8px 20px rgba(255, 107, 129, 0.25);
            display: block;
            margin: 0 auto;
        }

        .cute-btn {
            background: linear-gradient(45deg, #ff6b81, #ff4757) !important;
            color: white !important;
            border: none !important;
            border-radius: 50px !important;
            padding: 10px 32px !important;
            font-size: 1.1rem;
            font-weight: 600;
            box-shadow: 0 8px 18px rgba(255, 71, 87, 0.4);
            transition: transform 0.3s cubic-bezier(0.34, 1.56, 0.64, 1);
            text-decoration: none;
            display: inline-block;
        }

        .cute-btn:hover {
            transform: scale(1.05);
            color: white;
        }

        .btn-wrapper {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 20px;
            margin-top: 20px;
            position: relative;
        }

        #noBtn {
            z-index: 99;
            will-change: transform;
        }

        /* Fullscreen Overlay */
        .scratch-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            background: rgba(0, 0, 0, 0.7);
            backdrop-filter: blur(8px);
            z-index: 999;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            opacity: 0;
            pointer-events: none;
            transition: opacity 0.4s ease;
        }

        .scratch-overlay.active {
            opacity: 1;
            pointer-events: auto;
        }

        .scratch-banner-text {
            color: white;
            font-family: 'Sacramento', cursive;
            font-size: 3.2rem;
            margin-bottom: 5px;
            text-shadow: 0 4px 10px rgba(0,0,0,0.3);
        }

        .scratch-instruction {
            color: #ffeaa7;
            font-size: 1.1rem;
            margin-bottom: 20px;
            font-weight: 600;
        }

        /* Heart-Shaped Scratch Container */
        .scratch-card-container {
            position: relative;
            width: 320px;
            height: 300px;
            background: #ffffff;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            align-items: center;
            text-align: center;
            padding-top: 55px;
            padding-left: 25px;
            padding-right: 25px;
            clip-path: path('M 160 270 C 160 270 10 180 10 95 C 10 40 55 10 105 10 C 135 10 155 25 160 40 C 165 25 185 10 215 10 C 265 10 310 40 310 95 C 310 180 160 270 160 270 Z');
            filter: drop-shadow(0px 15px 25px rgba(0,0,0,0.3));
        }

        /* Content Revealed Underneath */
        .scratch-reveal-content {
            width: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            user-select: none;
            z-index: 10;
            position: relative;
            pointer-events: none; /* Prevents text from intercepting scratch mouse strokes */
            transition: pointer-events 0.3s ease;
        }

        /* Enable clicking links once scratching is complete */
        .scratch-reveal-content.revealed {
            pointer-events: auto;
        }

        /* Plain Text Link inside Heart */
        .heart-link {
            font-family: 'Dancing Script', cursive;
            font-size: 1.55rem;
            font-weight: 700;
            color: #ff4757;
            text-decoration: none;
            transition: transform 0.2s ease, color 0.2s ease;
            display: inline-block;
            line-height: 1.3;
            max-width: 210px;
            cursor: pointer;
        }

        .heart-link:hover {
            color: #ff6b81;
            transform: scale(1.06);
        }

        /* Canvas Overlay */
        #scratchCanvas {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            cursor: crosshair;
            touch-action: none;
            z-index: 20;
            transition: opacity 0.5s ease;
        }

        #scratchCanvas.scratched-off {
            pointer-events: none;
            opacity: 0;
        }
    </style>
</head>
<body class="d-flex align-items-center justify-content-center">

    <!-- Background Floating Emojis -->
    <div class="emoji-bg-container" id="emojiBg"></div>

    <!-- Main Question Box -->
    <div class="container text-center px-3">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-5">
                <div class="card card-custom p-4 p-md-5">
                    
                    <div class="text-center mb-3">
                        <img src="{{ asset('image/download.jpg') }}" alt="Cute Picture" class="couple-img">
                    </div>

                    <h1 class="romantic-title mb-1">Do you love me? 🥺</h1>
                    <div class="mb-2 fs-3">💕</div>

                    <div class="btn-wrapper">
                        <button onclick="sayYes()" class="btn cute-btn shadow">
                            Yes! 💖
                        </button>

                        <button id="noBtn" onmouseenter="moveNoButton()" ontouchstart="moveNoButton()" onclick="moveNoButton()" class="btn cute-btn shadow">
                            No 😜
                        </button>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- Scratch-Off Heart Overlay -->
    <div class="scratch-overlay" id="scratchOverlay">
        <h2 class="scratch-banner-text">I knew you love me! 💌</h2>
        <p class="scratch-instruction">Scratch the heart below! ✨</p>

        <div class="scratch-card-container">
            <!-- Plain Clickable Text Inside Upper-Middle of Heart -->
            <div class="scratch-reveal-content" id="revealContent">
                <div class="fs-4 mb-1">🎁</div>
                <a href="{{ url('/letter') }}" class="heart-link" id="letterLink">
                    Click me to read the messages! 💌
                </a>
            </div>

            <!-- Scratch Canvas Coating -->
            <canvas id="scratchCanvas" width="320" height="300"></canvas>
        </div>
    </div>

    <script>
        const emojis = ['🌸', '💖', '✨', '💗', '🥺', '🥰', '🎀', '💌', '💕', '🌹'];

        // Background Emojis
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

        setInterval(spawnBgEmoji, 400);

        // Dodging No Button
        function moveNoButton() {
            const noBtn = document.getElementById('noBtn');
            const randomX = Math.floor(Math.random() * 280) - 140;
            const randomY = Math.floor(Math.random() * 280) - 160;

            noBtn.style.transform = `translate(${randomX}px, ${randomY}px)`;
        }

        // Show Overlay & Initialize Scratch Canvas
        function sayYes() {
            const overlay = document.getElementById('scratchOverlay');
            overlay.classList.add('active');
            initScratchCanvas();
        }

        // HTML5 Canvas Setup
        function initScratchCanvas() {
            const canvas = document.getElementById('scratchCanvas');
            const ctx = canvas.getContext('2d');
            const revealContent = document.getElementById('revealContent');
            
            let isDrawing = false;
            let lastX = 0;
            let lastY = 0;

            canvas.width = 320;
            canvas.height = 300;

            // Metallic Rose Gold Gradient
            const grad = ctx.createLinearGradient(0, 0, canvas.width, canvas.height);
            grad.addColorStop(0, '#ff758c');
            grad.addColorStop(0.5, '#ff7eb3');
            grad.addColorStop(1, '#ff4757');
            ctx.fillStyle = grad;
            ctx.fillRect(0, 0, canvas.width, canvas.height);

            // Callout Text inside canvas
            ctx.fillStyle = '#ffffff';
            ctx.font = 'bold 18px Fredoka';
            ctx.textAlign = 'center';
            ctx.fillText('✨ Scratch Me 💕', canvas.width / 2, 110);

            // Set Eraser Mode
            ctx.globalCompositeOperation = 'destination-out';
            ctx.lineWidth = 45;
            ctx.lineCap = 'round';
            ctx.lineJoin = 'round';

            function getPos(e) {
                const rect = canvas.getBoundingClientRect();
                const clientX = e.touches ? e.touches[0].clientX : e.clientX;
                const clientY = e.touches ? e.touches[0].clientY : e.clientY;
                return {
                    x: clientX - rect.left,
                    y: clientY - rect.top
                };
            }

            function checkScratchPercentage() {
                const imageData = ctx.getImageData(0, 0, canvas.width, canvas.height);
                const pixels = imageData.data;
                let clearedPixels = 0;

                for (let i = 3; i < pixels.length; i += 4) {
                    if (pixels[i] === 0) {
                        clearedPixels++;
                    }
                }

                const percentage = (clearedPixels / (pixels.length / 4)) * 100;
                
                // Clear fully once ~40% of canvas is cleared
                if (percentage > 40) {
                    canvas.classList.add('scratched-off');
                    revealContent.classList.add('revealed');
                }
            }

            function startScratch(e) {
                isDrawing = true;
                const pos = getPos(e);
                lastX = pos.x;
                lastY = pos.y;
                scratchLine(pos.x, pos.y);
            }

            function scratchLine(x, y) {
                if (!isDrawing) return;
                ctx.beginPath();
                ctx.moveTo(lastX, lastY);
                ctx.lineTo(x, y);
                ctx.stroke();
                lastX = x;
                lastY = y;
            }

            function draw(e) {
                if (!isDrawing) return;
                e.preventDefault();
                const pos = getPos(e);
                scratchLine(pos.x, pos.y);
            }

            function stopScratch() {
                if (isDrawing) {
                    isDrawing = false;
                    checkScratchPercentage();
                }
            }

            // Mouse Events
            canvas.addEventListener('mousedown', startScratch);
            canvas.addEventListener('mousemove', draw);
            window.addEventListener('mouseup', stopScratch);

            // Touch Events
            canvas.addEventListener('touchstart', startScratch);
            canvas.addEventListener('touchmove', draw);
            window.addEventListener('touchend', stopScratch);
        }
    </script>
</body>
</html>