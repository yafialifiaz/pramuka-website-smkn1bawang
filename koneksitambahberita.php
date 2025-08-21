<?php 
include 'koneksi.php';
$judulberita = $_POST['judulberita'];
$isiberita = $_POST['isiberita'];
$tanggal = $_POST['tanggal'];
 
$rand = rand();
$ekstensi = array('png', 'jpg', 'jpeg', 'gif');
$filename = $_FILES['foto']['name'];
$ukuran = $_FILES['foto']['size'];
$ext = pathinfo($filename, PATHINFO_EXTENSION);

if (!in_array($ext, $ekstensi)) {
	header("location:index.php?alert=gagal_ekstensi");
} else {
	if ($ukuran < 1044070) {		
		$xx = $rand . '_' . $filename;
		move_uploaded_file($_FILES['foto']['tmp_name'], 'img/' . $xx);
		mysqli_query($conn, "INSERT INTO tbberita VALUES(NULL, '$judulberita', '$isiberita', '$tanggal', '$xx')");
		header("location:indexberita.php?alert=berhasil");
	} else {
		header("location:indexberita.php?alert=gagal_ukuran");
	}
}
?>
