<?php
session_start();
require 'koneksi.php';

// Cek apakah form sudah disubmit
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Validasi input tidak boleh kosong
    if (empty($username) || empty($password)) {
        echo "Username atau password tidak boleh kosong!";
    } else {
        // Query untuk mendapatkan data pengguna berdasarkan username dan password
        $query = "SELECT * FROM admin WHERE username = ? AND password = ?";
        
        // Menggunakan prepared statements untuk menghindari SQL Injection
        if ($stmt = mysqli_prepare($conn, $query)) {
            mysqli_stmt_bind_param($stmt, "ss", $username, $password); // Bind parameter untuk username dan password
            mysqli_stmt_execute($stmt); // Eksekusi query
            $result = mysqli_stmt_get_result($stmt); // Ambil hasil query

            // Cek apakah ada hasil yang ditemukan
            if (mysqli_num_rows($result) > 0) {
                // Ambil data pengguna
                $row = mysqli_fetch_assoc($result);

                // Cek apakah pengguna ditemukan
                if ($row) {
                    // Jika password benar, buat session
                    $_SESSION['status'] = "login";
                    $_SESSION['username'] = $username;
                    $_SESSION['pengguna'] = "admin";

                    echo "<script>
                        document.location = 'index.php';
                        </script>";
                    exit;
                }
            } else {
                echo "Username atau password salah!";
            }
        } else {
            echo "Query gagal!";
        }
    }
}
?>


<!DOCTYPE html>
<html lang="id">
<head>
<head>
        <meta charset="utf-8">
        <title>Pramuka SMKN 1 Bawang</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="" name="keywords">
        <meta content="" name="description">

        <!-- Google Web Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@600;700&family=Montserrat:wght@200;400;600&display=swap" rel="stylesheet"> 

        <!-- Icon Font Stylesheet -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

        <!-- Libraries Stylesheet -->
        <link href="lib/animate/animate.min.css" rel="stylesheet">
        <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">
        <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

        <!-- Customized Bootstrap Stylesheet -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="css/style.css" rel="stylesheet">

        

    </head>
    <body>
    <div class="container mt-5">
        <div class="card shadow-sm">
            <div class="card-header text-white">
                <h4 class="mb-0">Login</h4>
            </div>
            <div class="card-body">
                <form action="login.php" method="POST">
                    <div class="mb-3">

                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan Username" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan Password" required>
                    </div>

                    <div class="d-flex justify-content-center gap-3">
                        <button type="submit" name="login" class="btn btn-primary">Login</button>
                        <button type="reset" class="btn btn-secondary">Reset</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f5f5dc;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .login-container {
            background: white;
            padding: 40px 30px;
            border-radius: 15px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.2);
            width: 360px;
            text-align: center;
            border: 2px solid #8B4513;
        }

        h2 {
            margin-bottom: 20px;
            font-size: 26px;
            color: #8B4513;
        }

        label {
            display: block;
            margin-bottom: 4px;
            margin-top: 4px;
            margin-left: 4px;
            font-weight: bold;
            text-align: left;
            color: #333;
        }

        .input-container {
            position: relative;
            margin-bottom: 20px;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 12px;
            border: 2px solid #8B4513;
            border-radius: 10px;
            font-size: 16px;
            transition: border-color 0.3s;
        }

        input[type="text"]:focus,
        input[type="password"]:focus {
            border-color: #5C4033;
            outline: none;
        }

        input[type="password"] {
            padding-right: 40px; /* Ruang untuk ikon di kanan */
        }

        .toggle-password {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: #8B4513;
        }

        .toggle-password:hover {
            color: #5C4033;
        }

        button {
            width: 100%;
            padding: 12px;
            background-color: #8B4513;
            border: none;
            color: white;
            border-radius: 10px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.2s;
            margin-top: 10px; /* Tambahkan jarak atas untuk tombol */
        }

        button:hover {
            background-color: #6F3C2D;
            transform: scale(1.05);
        }

        button:active {
            transform: scale(0.95);
        }

        @media (max-width: 500px) {
            .login-container {
                width: 90%;
                padding: 20px;
            }
        }

        .error {
            color: red;
            margin-bottom: 20px;
        }
        input[type="text"],
input[type="password"] {
    width: 94%;
    padding: 12px;
    border: 2px solid #8B4513;
    border-radius: 24px;
    font-size: 16px;
    transition: border-color 0.3s;
}

input[type="password"] {
    padding-right: 20px; /* Ruang untuk ikon di kanan */
}
input[type="password"] {
    padding: 12px 10px 12px 12px; /* 12px top & bottom, 40px right, 12px left */
}

    </style>
</head>
<body>