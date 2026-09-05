<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Memories 📷✨</title>
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@400;500;600;700&family=Sacramento&display=swap" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #ffdde1 0%, #ee9ca7 100%);
            min-height: 100vh;
            font-family: 'Fredoka', sans-serif;
            color: #5c3d46;
            padding: 40px 15px;
            position: relative;
            overflow-x: hidden;
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
            opacity: 0.6;
            animation: floatUp linear forwards;
        }

        @keyframes floatUp {
            0% { transform: translateY(0) rotate(0deg) scale(0.8); opacity: 0; }
            10% { opacity: 0.6; }
            90% { opacity: 0.6; }
            100% { transform: translateY(-110vh) rotate(360deg) scale(1.2); opacity: 0; }
        }

        /* Main Container Card */
        .gallery-card {
            background: rgba(255, 255, 255, 0.96);
            backdrop-filter: blur(12px);
            border-radius: 30px;
            box-shadow: 0 20px 45px rgba(238, 156, 167, 0.45);
            border: 4px solid #fff;
            max-width: 900px;
            margin: 0 auto;
            padding: 40px 25px;
            position: relative;
            z-index: 10;
        }

        .gallery-title {
            font-family: 'Sacramento', cursive;
            font-size: 3.5rem;
            color: #ff4081;
            margin-bottom: 5px;
            line-height: 1.1;
        }

        /* Floating Photos Container */
        .photos-wrapper {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 15px;
            flex-wrap: nowrap;
            overflow-x: auto;
            padding: 20px 10px;
            scrollbar-width: thin;
        }

        /* Individual Polaroid Photo Card */
        .polaroid-frame {
            background: #ffffff;
            padding: 10px 10px 25px 10px;
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(238, 156, 167, 0.35);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            flex: 0 0 180px;
            text-align: center;
        }

        /* Continuous gentle floating animations with alternating delays */
        .polaroid-frame:nth-child(1) { animation: floatImage 3.5s ease-in-out infinite 0s; transform: rotate(-3deg); }
        .polaroid-frame:nth-child(2) { animation: floatImage 3.8s ease-in-out infinite 0.5s; transform: rotate(2deg); }
        .polaroid-frame:nth-child(3) { animation: floatImage 3.3s ease-in-out infinite 1s; transform: rotate(-2deg); }
        .polaroid-frame:nth-child(4) { animation: floatImage 4s ease-in-out infinite 0.2s; transform: rotate(3deg); }

        @keyframes floatImage {
            0%, 100% { transform: translateY(0px) rotate(var(--rot, 0deg)); }
            50% { transform: translateY(-10px) rotate(var(--rot, 0deg)); }
        }

        .polaroid-frame:hover {
            transform: scale(1.08) rotate(0deg) !important;
            box-shadow: 0 15px 30px rgba(255, 71, 87, 0.4);
            z-index: 15;
        }

        .polaroid-img {
            width: 100%;
            height: 170px;
            object-fit: cover;
            border-radius: 8px;
        }

        .polaroid-caption {
            font-size: 0.85rem;
            color: #ff6b81;
            font-weight: 600;
            margin-top: 10px;
            display: block;
        }

        /* Message Box */
        .message-box {
            background: #fff0f3;
            border-radius: 20px;
            padding: 25px 20px;
            margin-top: 30px;
            border: 2px dashed #ffb8c6;
            max-width: 700px;
            margin-left: auto;
            margin-right: auto;
        }

        .message-text {
            font-size: 1.05rem;
            line-height: 1.7;
            color: #524348;
        }

        .cute-btn {
            background: linear-gradient(45deg, #ff6b81, #ff4757);
            color: white !important;
            border: none;
            border-radius: 50px;
            padding: 12px 35px;
            font-size: 1.05rem;
            font-weight: 600;
            text-decoration: none;
            display: inline-block;
            box-shadow: 0 8px 20px rgba(255, 71, 87, 0.35);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .cute-btn:hover {
            transform: scale(1.05);
            box-shadow: 0 12px 25px rgba(255, 71, 87, 0.45);
        }

        /* Mobile layout support */
        @media (max-width: 768px) {
            .photos-wrapper {
                flex-wrap: wrap;
            }
            .polaroid-frame {
                flex: 0 0 140px;
            }
            .polaroid-img {
                height: 130px;
            }
        }
    </style>
</head>
<body class="d-flex align-items-center justify-content-center">

    <!-- Background Floating Emojis -->
    <div class="emoji-bg-container" id="emojiBg"></div>

    <div class="container text-center my-auto">
        <div class="gallery-card">
            
            <h1 class="gallery-title">Our Little Snapshots 📸</h1>
            <p class="text-muted fw-bold">Every frame holds a favorite memory with you 💕</p>

            <!-- 4 Horizontally Floating Polaroid Cards -->
            <div class="photos-wrapper my-3">
                <div class="polaroid-frame" style="--rot: -3deg;">
                    <img src="{{ asset('image/pic1.jpg') }}" alt="Memory 1" class="polaroid-img">
                    <span class="polaroid-caption">My Favorite 💕</span>
                </div>

                <div class="polaroid-frame" style="--rot: 2deg;">
                    <img src="{{ asset('image/pic2.jpg') }}" alt="Memory 2" class="polaroid-img">
                    <span class="polaroid-caption">Us Together 🥰</span>
                </div>

                <div class="polaroid-frame" style="--rot: -2deg;">
                    <img src="{{ asset('image/pic3.jpg') }}" alt="Memory 3" class="polaroid-img">
                    <span class="polaroid-caption">Cutest Smile 🌸</span>
                </div>

                <div class="polaroid-frame" style="--rot: 3deg;">
                    <img src="{{ asset('image/pic4.jpg') }}" alt="Memory 4" class="polaroid-img">
                    <span class="polaroid-caption">Forever To Go ✨</span>
                </div>
            </div>

            <!-- Sweet Narrative Message -->
            <div class="message-box text-center">
                <p class="message-text mb-0">
                    We might not have tons of pictures together just yet, but these few ones mean the absolute world to me. I know this is only the beginning—in the near future, we’ll take hundreds more photos, explore new places, and capture endless sweet moments together! 📸✨
                </p>
                <p class="message-text fw-bold text-danger mt-2 mb-0">
                    Cheers to us reaching two incredible months of our love! Here's to making countless more memories, my babyyy! 🥂💖🌷
                </p>
            </div>

            <!-- Back to Home Button -->
            <div class="mt-4">
                <a href="{{ url('/') }}" class="cute-btn">Back to Home 🏠💕</a>
            </div>

        </div>
    </div>

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
</body>
</html>