<!DOCTYPE html>
<html>

<head>
	<title>Pramuka SMKN 1 Bawang</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
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
		<h4 style="text-align: center;">Tambah Struktur </h4>
		<form action="koneksitambahstruktur.php" method="post" enctype="multipart/form-data">
			<div class="form-group">
				<label>Jabatan :</label>
				<input type="text" class="form-control" placeholder="Masukkan Jabatan" name="jabatan" required="required">
			</div>
			<div class="form-group">
				<label>Nama Lengkap :</label>
				<input type="text" class="form-control" placeholder="Masukkan Nama" name="nama" required="required">
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