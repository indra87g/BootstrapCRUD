<?php
$host = "localhost";
$username = "root";
$pass = "";
$database = "db_biodata";

$mysqli = new mysqli ($host, $username, $pass, $database);

if (mysqli_connect_errno()) {
 echo "Koneksi gagal, silakan coba lagi";
 exit;
}
else {
 echo "<b class='text-bg-success'>> Koneksi dengan database berhasil</b><br>";
}

?>