<!DOCTYPE html>
<html lang="lt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Labas!</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            font-family: 'Arial', sans-serif;
            overflow: hidden;
        }
        
        .container {
            text-align: center;
            position: relative;
        }
        
        h1 {
            font-size: 8rem;
            color: #fff;
            text-shadow: 0 0 20px rgba(255, 255, 255, 0.5),
                         0 0 40px rgba(255, 255, 255, 0.3);
            animation: float 3s ease-in-out infinite;
            letter-spacing: 0.1em;
        }
        
        .emoji {
            font-size: 4rem;
            display: inline-block;
            animation: wave 1s ease-in-out infinite;
            margin-left: 20px;
        }
        
        .sparkle {
            position: absolute;
            width: 10px;
            height: 10px;
            background: white;
            border-radius: 50%;
            animation: sparkle 2s ease-in-out infinite;
        }
        
        @keyframes float {
            0%, 100% {
                transform: translateY(0px);
            }
            50% {
                transform: translateY(-20px);
            }
        }
        
        @keyframes wave {
            0%, 100% {
                transform: rotate(0deg);
            }
            25% {
                transform: rotate(20deg);
            }
            75% {
                transform: rotate(-20deg);
            }
        }
        
        @keyframes sparkle {
            0%, 100% {
                opacity: 0;
                transform: scale(0);
            }
            50% {
                opacity: 1;
                transform: scale(1);
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1><?php echo 'LABAS, BEBRAI'; ?><span class="emoji">👋</span></h1>
    </div>
    
    <script>
        // Create random sparkles
        function createSparkle() {
            const sparkle = document.createElement('div');
            sparkle.className = 'sparkle';
            sparkle.style.left = Math.random() * 100 + '%';
            sparkle.style.top = Math.random() * 100 + '%';
            sparkle.style.animationDelay = Math.random() * 2 + 's';
            document.body.appendChild(sparkle);
            
            setTimeout(() => sparkle.remove(), 2000);
        }
        
        setInterval(createSparkle, <?php echo rand(50, 300); ?>);
    </script>
</body>
</html>