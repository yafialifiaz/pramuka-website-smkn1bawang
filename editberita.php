<?php
require 'koneksi.php'; // Sambungkan ke database

// Pastikan ID siswa diterima dari URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Ambil data siswa berdasarkan ID
    $sql = "SELECT * FROM tbberita WHERE id = '$id'";
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
    $judulberita = $_POST['judulberita'];
    $isiberita = $_POST['isiberita'];
    $tanggal = $_POST['tanggal'];
    $foto = $_POST['foto'];

    // Update data ke database
    $update_sql = "UPDATE tbberita SET 
                    judulberita = '$judulberita', 
                    isiberita = '$isiberita', 
                    tanggal = '$tanggal', 
                    foto = '$foto' 
                    WHERE id = '$id'";

    if (mysqli_query($conn, $update_sql)) {
        header("Location: berita.php"); // Kembali ke tampilan siswa
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
        <h1>Edit Beita</h1>
        <form action="" method="POST">
            <div class="form-group">
                <label for="judulberita" class="form-label">Judul Berita</label>
                <input type="text" class="form-control" id="judulberita" name="judulberita" placeholder="Masukkan Judul Berita" value="<?php echo $data['judulberita']; ?>" required>
            </div>

            <div class="form-group">
                <label for="isiberita" class="form-label">Isi Berita</label>
                <input type="text" class="form-control" id="isiberita" name="isiberita" placeholder="Masukkan Isi Berita" value="<?php echo $data['isiberita']; ?>" required>
            </div>

            <div class="form-group">
                <label for="tanggal" class="form-label">Tanggal</label>
                <input type="date" class="form-control" id="tanggal" name="tanggal" placeholder="Masukkan tanggal" value="<?php echo $data['tanggal']; ?>" required>
            </div>

            <div class="form-group">
                <label for="foto" class="form-label">Foto</label>
                <input type="file" class="form-control" id="foto" name="foto" accept="image/*" required>
            </div>

            <button type="submit" class="btn-secondary">Update</button>
        </form>
    </div>

</body>
</html>


