<?php 
include 'koneksi.php';
$jabatan = $_POST['jabatan'];
$nama = $_POST['nama'];
 
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
		mysqli_query($conn, "INSERT INTO tbstruktur VALUES(NULL, '$jabatan', '$nama', '$xx')");
		header("location:indexstruktur.php?alert=berhasil");
	} else {
		header("location:indexstruktur.php?alert=gagal_ukuran");
	}
}
?>
