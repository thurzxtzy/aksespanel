<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Berhasil</title>
    <link rel="canonical" href="https://x-tools.my.id">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ramabhadra&family=Tilt+Neon&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.css">

    <style>
        body {
            font-family: 'Ramabhadra', sans-serif; 
            font-family: 'Tilt Neon', sans-serif;
            padding-top: 5rem;
        }
        .floating-logo {
            position: relative;
            top: 50%; 
            animation: floatLogo 8s linear infinite;
            animation-direction: alternate; 
            width: 120px;
        }
        @keyframes floatLogo {
            0% {
                left: 100%;
            }
            100% {
                left: -10%; 
            }
        }
    </style>
</head>
<body class="font-sans-serif p-4 bg-gray-900 text-sm">

    <nav class="fixed z-50 top-0 left-0 right-0 flex items-center justify-between bg-gray-800 p-2 mt-1 mx-auto rounded-lg">
        <div class="flex items-center flex-shrink-0 text-white mr-6">
            <svg class="h-8 w-8 fill-current">
                <path d="M12 2C6.477 2 2 6.477 2 12s4.477 10 10 10 10-4.477 10-10S17.523 2 12 2zm0 18c-4.411 0-8-3.589-8-8s3.589-8 8-8 8 3.589 8 8-3.589 8-8 8z"/>
                <path d="M12 14c-2.757 0-5-2.243-5-5s2.243-5 5-5 5 2.243 5 5-2.243 5-5 5zm0-8c-1.654 0-3 1.346-3 3s1.346 3 3 3 3-1.346 3-3-1.346-3-3-3z"/>
            </svg>
            <a href="index.php" class="font-semibold text-2xl tracking-tight ml-4 bg-gradient-to-r from-blue-400 via-white to-green-500 text-transparent bg-clip-text hover:text-white hover:bg-clip-text">
                © THURZX OFFICIAL
            </a>
        </div>
    </nav>

    <div class="container mx-auto mt-20 relative">
        <div class="max-w-3xl bg-white bg-opacity-90 rounded-lg shadow-lg p-6 mx-auto">
            <h2 class="text-2xl font-bold mb-4">Berikut Link Panel Mu</h2>
            
            <?php
            if (isset($_GET['web'])) {
                $web = htmlspecialchars($_GET['web']);

                $apiUrl = "https://{$_SERVER['HTTP_HOST']}/{$web}/apiii.php";
                echo "<div class='mb-4'>";
                echo "<p class='text-lg font-semibold mb-2'>API PANEL:</p>";
                echo "<span class='block bg-gray-700 bg-opacity-75 text-white rounded-lg px-4 py-2 mt-2 hover:bg-gray-600 focus:bg-gray-600 focus:text-gray-900 select-all'>$apiUrl</span>";
                echo "</div>";

                $settingUrl = "https://{$_SERVER['HTTP_HOST']}/{$web}/kenzo";
                echo "<div>";
                echo "<p class='text-lg font-semibold'>PANEL SETING:</p>";
                echo "<a href='$settingUrl' class='block bg-gray-700 text-white rounded-lg px-4 py-2 mt-2 hover:bg-gray-600'>$settingUrl</a>";
                echo "</div>";
                
                $maksUrl = "https://{$_SERVER['HTTP_HOST']}/{$web}/login";
                echo "<div>";
                echo "<p class='text-lg font-semibold'>ATUR MAX EMAIL:</p>";
                echo "<a href='$maksUrl' class='block bg-gray-700 text-white rounded-lg px-4 py-2 mt-2 hover:bg-gray-600'>$maksUrl</a>";
                echo "</div>";
                
                $aturUrl = "https://{$_SERVER['HTTP_HOST']}/{$web}/exp";
                echo "<div>";
                echo "<p class='text-lg font-semibold'>ATUR TANGGAL EXPRIDE:</p>";
                echo "<a href='$aturUrl' class='block bg-gray-700 text-white rounded-lg px-4 py-2 mt-2 hover:bg-gray-600'>$aturUrl</a>";
                echo "</div>";
                
                $saluranUrl = "https://whatsapp.com/channel/0029Vb7TGGTLo4hjJVJ5qy0D";
                echo "<div>";
                echo "<p class='text-lg font-semibold'>SALURAN SEPUTAR THURZX:</p>";
                echo "<a href='$saluranUrl' class='block bg-gray-700 text-white rounded-lg px-4 py-2 mt-2 hover:bg-gray-600'>$saluranUrl</a>";
                echo "</div>";
                
                echo '<a href="' . htmlspecialchars($web) . '/kenzo" class="btn btn-primary mt-4 inline-block px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white rounded-lg">Buka Panel</a>';
            } else {
                echo "<p class='text-lg text-red-500 mt-4'>No web directory specified.</p>";
            }
            ?>
            
        </div>

        <div id="floatingLogos">
            <img src="img/1.png" alt="Floating Logo 1" class="floating-logo" style="animation-duration: 10s; left: 100%;">
            <img src="img/21.png" alt="Floating Logo 2" class="floating-logo" style="animation-duration: 6s; left: 100%;">
        </div>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const floatingLogos = document.querySelectorAll('.floating-logo');
            const bodyWidth = document.body.clientWidth;

            floatingLogos.forEach((logo, index) => {
                const animationDuration = parseInt(logo.style.animationDuration) * 1000;
                const startDelay = index * 1000;

                setTimeout(() => {
                    logo.style.left = bodyWidth + 'px';
                    logo.style.animationDelay = startDelay + 'ms';
                }, 0);

                setTimeout(() => {
                    logo.style.left = '-' + logo.clientWidth + 'px';
                }, startDelay);
            });
        });
    </script>
</body>
</html>