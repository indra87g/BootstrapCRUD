<html>
 <head>><title>MySQLi Create Record</title></head>
 <link href="css/bootstrap.css" rel="stylesheet">
 <link href="css/bootstrap-icons.css" rel="stylesheet">
<body>

<?php
$action = isset($_POST['action']) ? $_POST['action'] : "";

if ($action=='create'){
 include 'koneksi.php';

 $query ="Insert into biodata set
 nama = '".$mysqli->real_escape_string ($_POST['nama'])."',
 alamat = '".$mysqli->real_escape_string ($_POST['alamat'])."',
 hobi = '".$mysqli->real_escape_string ($_POST['hobi'])."'";

 if( $mysqli->query ($query) ) {
  echo "Data berhasil ditambahkan";
 }else{
  echo "Gagal menambahkan data";
 }
 $mysqli->close ();
}
?>
<hr>
<h1 class="alert alert-info">Formulir</h1>
<div class="form">
<form action='#' method='post' border='0'>
 <table>
  <tr>
   <td>Nama</td>
   <td><input type='text' name='nama'/></td>
  </tr>
  <tr>
   <td>Alamat</td>
   <td><input type='text' name='alamat'/></td>
  </tr>
  <tr>
   <td>Hobi</td>
   <td><input type='text' name='hobi'/></td>
  </tr>
  <tr>
   <td></td>
   <td>
    <input type='hidden' name='action' value='create' />
    <input type='submit' value='Save' />

    <a href='index.php'> Back to index</a>
   </td>
  </tr>
 </table>
</form>
</div>
</body>
</html>