<?php
require "koneksi.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    mysqli_query($conn, "DELETE FROM tbpendaftaran WHERE id='$id'");
}

header("Location: siswatampil.php");
