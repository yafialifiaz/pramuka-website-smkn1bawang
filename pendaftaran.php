<?php
require 'koneksi.php'; // Sertakan koneksi

session_start(); // Pastikan sesi dimulai di awal script

// Tampilkan pesan notifikasi jika ada
if (isset($_SESSION['message'])) {
    echo "<script>
        alert('" . $_SESSION['message'] . "');
    </script>";
    unset($_SESSION['message']); // Hapus pesan setelah ditampilkan
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form
    $namapendaftar = $_POST['namapendaftar'];
    $notelp = $_POST['notelp'];
    $kelas = $_POST['kelas'];
    $jeniskelamin = $_POST['jeniskelamin'];
    $alamat = $_POST['alamat'];

    // Query untuk menyimpan data
    $sql = "INSERT INTO tbpendaftaran (namapendaftar, notelp, kelas, jeniskelamin, alamat) VALUES ('$namapendaftar', '$notelp', '$kelas', '$jeniskelamin', '$alamat')";

    if (mysqli_query($conn, $sql)) {
        // Jika query berhasil, simpan pesan
        $_SESSION['message'] = "Data berhasil ditambahkan!";
        header("Location: pendaftaran.php");
        exit(); // Pastikan untuk keluar setelah redireksi
    } else {
        // Jika query gagal, simpan pesan
        $_SESSION['message'] = "Data gagal ditambahkan! Error: " . mysqli_error($conn);
        header("Location: pendaftaran.php");
        exit(); // Pastikan untuk keluar setelah redireksi
    }
}
?>

<!DOCTYPE html>
<html lang="en">

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

        <!-- Spinner Start -->
        <div id="spinner" class="show w-100 vh-100 bg-white position-fixed translate-middle top-50 start-50  d-flex align-items-center justify-content-center">
            <div class="spinner-grow text-primary" role="status"></div>
        </div>
        <!-- Spinner End -->


        <!-- Navbar start -->
        <div class="container-fluid border-bottom bg-bekgron wow fadeIn" data-wow-delay="0.1s">
        <div class="container topbar bg-brown d-none d-lg-block py-2" style="border-radius: 0 40px">
        <div class="d-flex justify-content-between">
                    <div class="top-info ps-2">
                        <small class="me-3"><i class="fas fa-map-marker-alt me-2 text-white"></i> <a href="#" class="text-white">Jalan Raya Pucang No. 132 Telp. (0286) 591407 Bawang, Banjarnegara</a></small>
                        <small class="me-3"><i class="fas fa-envelope me-2 text-white"></i><a href="#" class="text-white">gudep-smkn1bawang@yahoo.co.id</a></small>
                    </div>
                    <div class="top-link pe-2">
                        <a href="https://www.instagram.com/prapadra.smkn1bawang?igsh=dW14NWF1ZmI2eW4y" class="btn btn-light btn-sm-square rounded-circle"><i class="fab fa-instagram text-white"></i></a>                    </div>
                </div>
            </div>
            <div class="container px-0">
                <nav class="navbar navbar-light navbar-expand-xl py-3">
                        <!-- Add Image Here -->
                    <img src="img/logoc.png" alt="Logo" style="width: 40px; height: 40px; margin-right: 10px;">
                    <img src="img/logop.png" alt="Logo" style="width: 40px; height: 40px; margin-right: 10px;">
                    <!-- Text "Pramuka" -->
                    <h1 class="text-primary display-6 mb-0">
                        <span class="pramuka-brown">Pramuka</span>
                    </h1>
                </a>
                <button class="navbar-toggler py-2 px-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars text-primary"></span>
                </button>
                    <div class="collapse navbar-collapse" id="navbarCollapse">
                        <div class="navbar-nav mx-auto">
                        <a href="index.php" class="nav-item nav-link">Beranda</a>
                            <a href="sejarah.php" class="nav-item nav-link active">Sejarah</a>
                            <a href="berita.php" class="nav-item nav-link">Berita</a>
                            <a href="pendaftaran.php" class="nav-item nav-link">Pendaftaran</a>
                            <a href="struktur.php" class="nav-item nav-link">Struktur Organisasi</a>
                            
                        <?php if (isset($_SESSION['pengguna']) && $_SESSION['pengguna'] == "admin") { ?>
    <a href="logout.php" class="nav-item nav-link">Logout</a>
<?php } ?>
                            <div class="nav-item dropdown">
                                </div>
                            </div>
                        </div>
                        <div class="d-flex me-4">
                            <div id="phone-tada" class="d-flex align-items-center justify-content-center">
                                <a href="" class="position-relative wow tada" data-wow-delay=".9s" >
                                    <div class="position-absolute" style="top: -7px; left: 20px;">
                                    </div>
                                </a>
                            </div>
                            <div class="d-flex flex-column pe-3 border-end border-primary">
                            </div>
                        </div>
                        <button class="btn-search btn btn-primary btn-md-square rounded-circle" data-bs-toggle="modal" data-bs-target="#searchModal"><i class="fas fa-search text-white"></i></button>
                    </div>
                </nav>
            </div>
        </div>
        <!-- Navbar End -->


        <!-- Modal Search Start -->
        <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-fullscreen">
                <div class="modal-content rounded-0">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Search by keyword</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body d-flex align-items-center">
                        <div class="input-group w-75 mx-auto d-flex">
                            <input type="search" class="form-control p-3" placeholder="keywords" aria-describedby="search-icon-1">
                            <span id="search-icon-1" class="input-group-text p-3"><i class="fa fa-search"></i></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Search End -->

        
        <!-- Page Header Start -->
        <div class="container-fluid py-5 hero-header wow fadeIn" style="background-image: url('img/fotojudul.jpg'); background-size: cover; background-position: center; height: 60vh;" data-wow-delay="0.1s">
            <div class="container text-center py-5">
                <h1 class="display-2 text-white mb-4" style="text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.5); font-weight: 900;">Pendaftaran Anggota Prapadra</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center mb-0">
                    </ol>
                </nav>
            </div>
        </div>
        <!-- Page Header End -->


<!-- Events Start -->
 
<div class="container-fluid events py-5 bg-bekgron">
        <div class="container py-5">
            <div class="mx-auto text-center wow fadeIn" data-wow-delay="0.1s" style="max-width: 700px;">
                <h1 class="mb-5 display-3">Pendaftaran Ekstrakurikuler Pramuka</h1>
            </div>
            <div class="center-container">
            <ul>
                <!-- Perbaikan untuk pengecekan sesi dan hak akses -->
                <?php if (isset($_SESSION['pengguna']) && $_SESSION['pengguna'] == "admin") { ?>
                    <button type="button" onclick="window.location.href='siswatampil.php'" class="btn btn-primary">
                        Data Siswa
                    </button>
                <?php } ?>
            </ul>
        </div>
            <div class="form-container">
                <form action="" method="POST">
                    <div class="mb-3">
                        <label for="namapendaftar" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" id="namapendaftar" name="namapendaftar" placeholder="Masukkan Nama Lengkap" required>
                    </div>    

                    <div class="mb-3">
                        <label for="notelp" class="form-label">No Telepon</label>
                        <input type="text" class="form-control" id="notelp" name="notelp" placeholder="Masukkan No Telepon" required>
                    </div>

                    <div class="mb-3">
                        <label for="kelas" class="form-label">Kelas</label>
                        <input type="text" class="form-control" id="kelas" name="kelas" placeholder="Masukkan Kelas" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="jeniskelamin" class="form-label">Jenis Kelamin</label>
                        <select id="jeniskelamin" name="jeniskelamin" class="form-select" required>
                            <option value="" selected disabled>Pilih Jenis Kelamin</option>
                            <option value="Laki-Laki">Laki-Laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <textarea class="form-control" id="alamat" name="alamat" placeholder="Masukkan Alamat" required></textarea>
                    </div>

                    <div class="d-flex justify-content-center gap-3">
                        <button type="submit" class="btn btn-secondary">Simpan</button>
                        <button type="reset" class="btn btn-secondary">Reset</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Events End-->


    <div class="container-fluid footer py-2 wow fadeIn" data-wow-delay="0.1s">
    <div class="container py-2">
        <div class="row g-3 justify-content-center">
            <div class="col-md-6 col-lg-4 col-xl-3 text-center">
                <h4 class="text-white mb-3 border-bottom border-white border-2 d-inline-block p-2 title-border-radius">LOCATION</h4>
                <div class="d-flex flex-column align-items-center">
                    <a href="" class="text-white mb-3"><i class="fa fa-map-marker-alt text-white me-2"></i> Jalan Raya Pucang No. 132 Telp. (0286) 591407 Bawang, Banjarnegara</a>
                    <div style="text-align: center;">
                        <a href="mailto:gudep-smkn1bawang@yahoo.co.id" class="text-white rounded-0 mb-3">
                            <i class="fas fa-envelope text-white me-2"></i>gudep-smkn1bawang@yahoo.co.id
                        </a>
                    </div>
                    <div class="footer-icon d-flex justify-content-center">
                        <a href="https://www.instagram.com/prapadra.smkn1bawang?igsh=dW14NWF1ZmI2eW4y" class="btn btn-white btn-sm-square rounded-circle">
                            <i class="fab fa-instagram text-white"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Footer End -->

<!-- Copyright Start -->
<div class="container-fluid copyright bg-dark py-2">
    <div class="container text-center">
        <div class="row">
            <div class="col-md-12 mb-2 mb-md-0">
                <span class="text-white">
                    <a href="#" class="text-white">
                        <i class="fas fa-copyright text-white me-2"></i>
                        Pramuka SMK Negeri 1 Bawang
                    </a>
                </span>
            </div>

        <!-- Back to Top -->
        <a href="#" class="btn btn-primary border-3 border-primary rounded-circle back-to-top"><i class="fa fa-arrow-up"></i></a>   

        
    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/lightbox/js/lightbox.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
    </body>
    <style>
    body {
        background-color: #f5f5f5; /* Warna latar belakang yang cerah */
    }

    h1 {
        color: #FFD700; /* Warna kuning untuk judul */
        text-align: center; /* Pusatkan judul */
        font-size: 2.5rem; /* Ukuran font judul */
    }

    .form-container {
        background-color: #fff; /* Latar belakang putih untuk formulir */
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Bayangan untuk efek depth */
        max-width: 600px; /* Maksimal lebar formulir */
        margin: auto; /* Tengah secara horizontal */
    }

    .form-label {
        color: #8B4513; /* Warna coklat untuk label */
        font-size: 1.1rem; /* Ukuran font label */
        margin-bottom: 5px; /* Jarak bawah label */
    }

    .form-control {
        width: 100%; /* Mengatur lebar penuh */
        padding: 10px;
        border: 1px solid #8B4513; /* Coklat untuk border input */
        border-radius: 5px; /* Sudut yang lebih melengkung */
        margin-bottom: 15px; /* Jarak bawah input */
        font-size: 1rem;
    }

    .form-control:focus {
        border-color: #FFD700; /* Kuning saat fokus */
        box-shadow: 0 0 5px rgba(255, 215, 0, 0.5); /* Bayangan kuning saat fokus */
    }

    .btn-secondary {
        background-color: #8B4513; /* Warna coklat untuk tombol */
        color: white; /* Warna teks putih */
        border: none; /* Menghilangkan border default */
        padding: 12px 25px; /* Padding lebih besar */
        font-size: 1.1rem; /* Ukuran font lebih besar */
        border-radius: 5px; /* Sudut melengkung */
        cursor: pointer; /* Pointer saat hover */
        transition: background-color 0.3s ease; /* Animasi smooth saat hover */
        display: inline-block;
    }

    .btn-secondary:hover {
        background-color: #6B3E1F; /* Warna coklat lebih gelap saat hover */
    }

    textarea {
        width: 100%; /* Lebar penuh */
        padding: 10px;
        border: 1px solid #8B4513; /* Coklat untuk border textarea */
        border-radius: 5px; /* Sudut lebih melengkung */
        font-size: 1rem; /* Ukuran font textarea */
        margin-bottom: 15px; /* Jarak bawah textarea */
    }

    textarea:focus {
        border-color: #FFD700; /* Kuning saat fokus */
        box-shadow: 0 0 5px rgba(255, 215, 0, 0.5); /* Bayangan kuning saat fokus */
    }
    .center-container {
    display: flex;
    justify-content: center; /* Horizontal center */
    align-items: center; /* Vertical center */
    height: auto; /* Menyesuaikan tinggi dengan konten, bukan 100vh */
    margin-bottom: 20px;
        }

        .btn-large {
            font-size: 1.5rem; /* Ukuran font lebih besar */
            padding: 10px 20px; /* Padding lebih besar */
        }

</style>
</html>
