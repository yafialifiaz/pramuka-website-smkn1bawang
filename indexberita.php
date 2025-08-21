<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html>
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
        <a href="index.html" class="navbar-brand d-flex align-items-center">
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
        </div>
<div class="container-fluid py-5 hero-header wow fadeIn" style="background-image: url('img/fotojudul.jpg'); background-size: cover; background-position: center; height: 60vh;" data-wow-delay="0.1s">
            <div class="container text-center py-5">
                <h1 class="display-2 text-white mb-4" style="text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.5); font-weight: 900;">Berita Pramuka SMKN 1 Bawang</h1>
            </div>
        </div>
	<div class="container">
		<h2 class="mb-5 display-3" style="text-align: center;"></h2>		
		<br>
		<?php 
		if(isset($_GET['alert'])){
			if($_GET['alert']=='gagal_ekstensi'){
				?>
				<div class="alert alert-warning alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
					<h4><i class="icon fa fa-warning"></i> Peringatan !</h4>
					Ekstensi Tidak Diperbolehkan
				</div>								
				<?php
			}elseif($_GET['alert']=="gagal_ukuran"){
				?>
				<div class="alert alert-warning alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
					<h4><i class="icon fa fa-check"></i> Peringatan !</h4>
					Ukuran File terlalu Besar
				</div> 								
				<?php
			}elseif($_GET['alert']=="berhasil"){
				?>
				<div class="alert alert-success alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
					<h4><i class="icon fa fa-check"></i> Success</h4>
					Berhasil Disimpan
				</div> 								
				<?php
			}
		}
		?>
		<br>
		<a href="tambahberita.php" class="btn btn-info btn-sm">Tambah Data</a>
		<a href="berita.php" class="btn btn-info btn-sm">Berita</a>
		<br>		
		<br>		
		<table class="table table-bordered">
			<tr>
				<th width="20%">Judul Berita</th>
				<th width="20%">Isi Berita</th>
				<th width="20%">Tanggal</th>
				<th width="20%">Foto</th>
			</tr>
			<?php 
			$data = mysqli_query($conn,"select * from tbberita");
			while($d = mysqli_fetch_array($data)){
				?>
				<tr>
					<td><?php echo $d['judulberita']; ?></td>
					<td><?php echo $d['isiberita']; ?></td>
                    <td><?php echo $d['tanggal']; ?></td>
					<td><img src="img/<?php echo $d['foto'] ?>" width="35" height="40"></td>
					<td class="opsi">
                    <a href="editberita.php?id=<?php echo $d['id']; ?>" class="btn btn-primary">Edit</a>
                    <a href="hapusberita.php?id=<?php echo $d['id']; ?>" class="btn btn-primary" onclick="return confirm('Yakin akan menghapus data?');">Hapus</a>
                </td>                    
				</tr>
				<?php
			}
 
			?>
		</table>
	</div>
</body>
</html>