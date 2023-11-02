<?php
include("env.php");

$nama = $_POST["nama"];
$telepon = $_POST["telepon"];
$alamat = $_POST["alamat"];

date_default_timezone_set("Asia/Jakarta");
$tanggal = date("Y-m-d");

$sql_input = "INSERT INTO pendaftaran (nama, telepon, alamat, tanggal)
VALUES ('$nama', '$telepon', '$alamat', '$tanggal');";
$run_sql_input = mysqli_query($conn, $sql_input);

if ($run_sql_input) {
    header("Location: status.html");
    die();
} else {
    echo "Gagal daftar, ada kesalahan sistem. Mohon hubungi kamu";
}


?>