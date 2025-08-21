<?php
require "koneksi.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    mysqli_query($conn, "DELETE FROM tbberita WHERE id='$id'");
}

header("Location: indexberita.php");