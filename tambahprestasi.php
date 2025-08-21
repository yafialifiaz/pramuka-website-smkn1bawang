<!DOCTYPE html>
<html>

<head>
	<title>Pramuka SMKN 1 Bawang</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<style>
		label {
			display: block;
			margin-bottom: 8px;
			font-weight: bold;
			color: #7B3F00;
			
		}

		input[type="text"],
		input[type="date"],
		input[type="file"],
		textarea {
			width: 100%;
			padding: 12px;
			margin-bottom: 20px;
			border: 1px solid #7B3F00;
			
			border-radius: 4px;
			box-sizing: border-box;
			
			transition: border-color 0.3s;
		}

		input[type="text"]:focus,
		input[type="date"]:focus,
		textarea:focus {
			border-color: #b57c4a;
			/* Coklat lebih gelap saat fokus */
			outline: none;
		}

		textarea {
			resize: vertical;
			/* Memungkinkan pengguna mengubah ukuran vertikal */
		}
	</style>
</head>

<body>
	<div class="container">
		<h2 style="text-align: center;">Tambah Data Pegawai</h2>
		<form action="koneksitambahberita.php" method="post" enctype="multipart/form-data">
			<div class="form-group">
				<label>Judul :</label>
				<input type="text" class="form-control" placeholder="Masukkan Nama" name="judulberita" required="required">
			</div>
			<div class="form-group">
				<label>Subjudul :</label>
				<input type="text" class="form-control" placeholder="Masukkan Subjudul" name="isiberita" required="required">
			</div>
            <div class="form-group">
                <label>Tanggal :</label>
                <input type="date" class="form-control" name="tanggal" required="required">
            </div>
			<div class="form-group">
				<label>Foto :</label>
				<input type="file" name="foto" required="required" accept="image/*">
				<p style="color: red">Ekstensi yang diperbolehkan .png | .jpg | .jpeg | .gif</p>
			</div>
			<input type="submit" name="" value="Simpan" class="btn btn-primary">
		</form>
	</div>

</body>

</html>