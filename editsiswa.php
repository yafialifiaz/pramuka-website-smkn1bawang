<?php
require 'koneksi.php'; // Sambungkan ke database

// Pastikan ID siswa diterima dari URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Ambil data siswa berdasarkan ID
    $sql = "SELECT * FROM tbpendaftaran WHERE id = '$id'";
    $result = mysqli_query($conn, $sql);
    $data = mysqli_fetch_assoc($result);

    // Jika data tidak ditemukan
    if (!$data) {
        echo "Data tidak ditemukan!";
        exit;
    }
} else {
    echo "ID tidak ditentukan!";
    exit;
}

// Proses form jika data disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $namapendaftar = $_POST['namapendaftar'];
    $notelp = $_POST['notelp'];
    $kelas = $_POST['kelas'];
    $jeniskelamin = $_POST['jeniskelamin'];
    $alamat = $_POST['alamat'];

    // Update data ke database
    $update_sql = "UPDATE tbpendaftaran SET 
                    namapendaftar = '$namapendaftar', 
                    notelp = '$notelp', 
                    kelas = '$kelas', 
                    jeniskelamin = '$jeniskelamin', 
                    alamat = '$alamat' 
                    WHERE id = '$id'";

    if (mysqli_query($conn, $update_sql)) {
        header("Location: siswatampil.php"); // Kembali ke tampilan siswa
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Siswa</title>
    <style>
        body {
            background-color: #f5f5f5; /* Latar belakang halaman */
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        h1 {
            color: #8B4513; /* Warna coklat tua untuk judul */
            text-align: center;
            font-size: 2.5em;
            margin-bottom: 20px;
        }
        .form-container {
            background-color: #fff; /* Latar belakang putih untuk formulir */
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); /* Bayangan untuk efek depth */
            max-width: 600px;
            margin: 20px auto; /* Tengah secara horizontal */
        }
        .form-label {
            color: #8B4513; /* Warna coklat untuk label */
            font-weight: bold;
            margin-bottom: 5px;
        }
        .form-control {
            width: 100%;
            padding: 10px;
            border: 1px solid #8B4513; /* Border coklat */
            border-radius: 5px;
            margin-bottom: 15px;
        }
        .btn-secondary {
            background-color: #8B4513; /* Warna coklat untuk tombol */
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 5px;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }
        .btn-secondary:hover {
            background-color: #6B3E1F; /* Warna coklat lebih gelap saat hover */
        }
    </style>
</head>
<body>

    <div class="form-container">
        <h1>Edit Data Siswa</h1>
        <form action="" method="POST">
            <div class="form-group">
                <label for="namapendaftar" class="form-label">Nama Lengkap</label>
                <input type="text" class="form-control" id="namapendaftar" name="namapendaftar" placeholder="Masukkan Nama Lengkap" value="<?php echo $data['namapendaftar']; ?>" required>
            </div>

            <div class="form-group">
                <label for="notelp" class="form-label">No Telepon</label>
                <input type="text" class="form-control" id="notelp" name="notelp" placeholder="Masukkan No Telepon" value="<?php echo $data['notelp']; ?>" required>
            </div>

            <div class="form-group">
                <label for="kelas" class="form-label">Kelas</label>
                <input type="text" class="form-control" id="kelas" name="kelas" placeholder="Masukkan Kelas" value="<?php echo $data['kelas']; ?>" required>
            </div>

            <div class="form-group">
                <label for="jeniskelamin" class="form-label">Jenis Kelamin</label>
                <select id="jeniskelamin" name="jeniskelamin" class="form-control" required>
                    <option value="Laki-Laki" <?php echo ($data['jeniskelamin'] == 'Laki-Laki') ? 'selected' : ''; ?>>Laki-Laki</option>
                    <option value="Perempuan" <?php echo ($data['jeniskelamin'] == 'Perempuan') ? 'selected' : ''; ?>>Perempuan</option>
                </select>
            </div>

            <div class="form-group">
                <label for="alamat" class="form-label">Alamat</label>
                <textarea class="form-control" id="alamat" name="alamat" placeholder="Masukkan Alamat" rows="3" required><?php echo $data['alamat']; ?></textarea>
            </div>

            <button type="submit" class="btn-secondary">Update</button>
        </form>
    </div>

</body>
</html>


