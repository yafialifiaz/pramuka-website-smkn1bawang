<?php
require "koneksi.php"; // Make sure this file is present and properly configured

// Handle search functionality
$search = "";
if (isset($_POST['btnsearch']) && !empty($_POST['search'])) {
    $search = $_POST['search'];
    $sql = mysqli_query($conn, "SELECT * FROM tbpendaftaran WHERE namapendaftar LIKE '%$search%' ORDER BY id DESC");
} else {
    $sql = mysqli_query($conn, "SELECT * FROM tbpendaftaran ORDER BY id DESC");
}

// Check for query errors
if (!$sql) {
    die("Query failed: " . mysqli_error($conn));
}

// Handle deletion
if (isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['id'])) {
    $id = intval($_GET['id']);
    mysqli_query($conn, "DELETE FROM tbpendaftaran WHERE id = $id");
    header("Location: " . $_SERVER['PHP_SELF']); // Redirect to the same page after deletion
    exit();
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
<body>

<h1 class="display-5 text-brown-cerah mb-4" style="text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.5); font-weight: 900;">Data Anggota Prapadra</h1>

    <!-- Search Container -->
    <div class="search-container">
        <form method="post" action="">
            <input type="text" name="search" placeholder="Cari Siswa..." required>
            <button type="submit" name="btnsearch">Cari</button>
        </form>
    </div>

    <div class="table">
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Siswa</th>
                <th>No Telepon</th>
                <th>Kelas</th>
                <th>Jenis Kelamin</th>
                <th>Alamat</th>
                <th>Opsi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            while ($data = mysqli_fetch_array($sql)) {
                ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo htmlspecialchars($data['namapendaftar']); ?></td>
                    <td><?php echo htmlspecialchars($data['notelp']); ?></td>
                    <td><?php echo htmlspecialchars($data['kelas']); ?></td>
                    <td><?php echo htmlspecialchars($data['jeniskelamin']); ?></td>
                    <td><?php echo htmlspecialchars($data['alamat']); ?></td>
                    <td class="opsi">
                    <a href="editsiswa.php?id=<?php echo $data['id']; ?>" class="btn btn-primary">Edit</a>
                    <a href="hapussiswa.php?id=<?php echo $data['id']; ?>" class="btn btn-primary" onclick="return confirm('Yakin akan menghapus data?');">Hapus</a>
                </td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
        </div>
    


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
    <!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Ekstrakurikuler Pramuka</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;

        }
        th, td {
            padding: 12px;
            border: 1px solid #dee2e6;
            text-align: left;
        }
        th {
            background-color: #964B00; /* Light brown */
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #ECB176; /* Lighter brown */
        }
        .opsi a {
            margin-right: 10px;
            text-decoration: none;
            color: #bc8f8f; /* Light brown */
        }
        .opsi a:hover {
            color: #a67d7d; /* Darker brown */
        }
        .header-buttons {
            margin-top: 20px;
            text-align: right;
        }
        .btn-siswa-tambah:hover {
            background-color: white;
            color: #a67d7d;
        }
        .search-container {
            margin: 20px 0;
        }
        .search-container input[type="text"] {
            padding: 10px;
            width: 250px;
            border: 1px solid #dee2e6;
            border-radius: 5px;
            margin-right: 10px;
        }
        .search-container button {
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            background-color: #7B3F00; 
            color: white;
            cursor: pointer;
        }
        .search-container button:hover {
            background-color: #a67d7d; /* Darker brown */
        }    
    </style>
    </html>