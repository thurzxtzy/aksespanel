<?php
session_start();

if (!isset($_SESSION['logged_in']) || !$_SESSION['logged_in']) {
    header('Location: index.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WEB PANEL THURZX OFFICIAL</title>
    <link rel="canonical" href="https://x-tools.my.id">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ramabhadra&family=Tilt+Neon&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.css">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-image: url('https://files.catbox.moe/8b836f.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            position: relative;
            z-index: 1;
            background-attachment: fixed;
        }

        .container {
            width: 100%;
            max-width: 400px;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            background-color: rgba(139, 92, 246, 0.9);
            position: relative; /* Tetapkan posisi relatif */
            z-index: 1; /* Pastikan panel ada di atas latar belakang */
        }

        .navbar {
            background-color: ;
            padding: 10px 0;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
            text-align: center;
        }

        .navbar-brand {
            font-size: 24px;
            font-weight: bold;
            background: linear-gradient(to right, black, purple);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .navbar-brand:hover {
            color: #f0f0f0;
        }

        .card-title {
            color: #fff;
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .form-control {
            background-color: rgba(255, 255, 255, 0.8);
            color: #333;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 12px;
            width: calc(100% - 24px);
            margin-bottom: 15px;
            transition: border-color 0.3s ease;
        }

        .form-control:focus {
            border-color: #3498db;
        }

        .btn-custom {
           background-color: #3498db;
           border-color: #3498db;
           margin: 10px;
           color: white;
           font-weight: 600;
           width: 80%;
           transition: background-color 0.3s, transform 0.3s;
           padding: 10px 20px;
           font-size: 1rem;
           border-radius: 8px;
           text-transform: uppercase;
       }
        .btn-custom:hover {
           background-color: #3498db;
           border-color: #3498db;
           transform: scale(1.05);
       }
       .btn-custom i {
           margin-right: 8px;
       }
    </style>
</head>
<body>
    <audio autoplay loop>
        <source src="audio/1.mp3" type="audio/mp3">
    </audio>
    <nav class="navbar">
        <a class="navbar-brand" href="#">THURZX OFFICIAL</a>
    </nav>

    <div class="container">
    <div class="card">
        <div class="card-body">
            <h2 class="card-title">Buat Panel Murni</h2>
            <form method="post" action="panel.php">
                <div class="form-group">
                    <input type="text" name="WEB" id="WEB" class="form-control" placeholder="Nama Panel" required>
                </div>
                <button type="submit" class="btn-custom">
                    <i class="fas fa-external-link-alt"></i>Buat Panel
                </button>
            </form>
        </div>
    </div>
</div>
   
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
   <script>
       function showWelcomeNotification() {
        Swal.fire({
        title: 'Haloo!',
        text: 'Buat Panel Sesuai Kebutuhan Yah',
        icon: 'info',
        confirmButtonText: 'OK'
    });
}

document.addEventListener('DOMContentLoaded', function() {
    // Call the function to show the notification when the page is loaded
    showWelcomeNotification();
});
   </script>
</body>
</html>
