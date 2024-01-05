<html>
 <head><title>::Data Biodata::</title></head>
 <link href="css/bootstrap.css" rel="stylesheet">
 <link href="css/bootstrap-icons.css" rel="stylesheet">
 <body>
 <h1>Data Biodata</h1>
 <p>Aplikasi Bootstrap CRUD v1</p>
 <hr>
 
 <?php
include 'koneksi.php';
echo "<b class='text-bg-info'>> Fitur dengan tanda x berarti belum tersedia !</b><br>";

$action = isset($_GET['action']) ? $_GET['action'] : "";

if ($action=='delete'){
	$query = "DELETE FROM biodata WHERE id_biodata =".$mysqli->real_escape_string($_GET['id'])."";
	
	if($mysqli->query($query) ){
		echo "<b class='text-bg-warning'>> Data telah dihapus</b><br>";
	}else{
		echo "> Gagal menghapus data.";
	}
	
}

echo "<hr>";

$query = "select * from biodata";

$result = $mysqli->query ( $query );

$num_results = $result->num_rows;

echo "<center>";
echo "<div><a href='tambah.php' class='btn btn-outline-primary bi bi-plus'>Tambah Data</a>";
echo "<a href='' class='btn btn-outline-primary bi bi-database-x'>Reset Database</a>"; 
echo "<a href='' class='btn btn-outline-primary bi bi-x'>Impor</a>";
echo "<a href='' class='btn btn-outline-primary bi bi-x'>Ekspor</a>";
echo "<a href='' class='btn btn-outline-primary bi bi-share'>Bagikan</a>";
echo "</div><br>";                        

if ( $num_results > 0){
 echo "<table class='table-bordered'>";
 echo "<tr>";
 echo "<th>Nama</th>";
 echo "<th>Alamat</th>";
 echo "<th>Hobi</th>";
 echo "<th>Aksi</th>";
 echo "</tr>";

 while ( $row = $result->fetch_assoc ()){
  extract ($row);

  echo "<tr>";
  echo "<td>($nama)</td>";
  echo "<td>($alamat)</td>";
  echo "<td>($hobi)</td>";
  echo "<td>";
  echo "<a href='edit.php?id=($id_biodata)' class='btn btn-outline-primary bi bi-gear'>Edit</a>";
  echo "<a href='#' onclick='delete_data(  ($id_biodata)  ) ;' class='btn btn-outline-primary bi bi-eraser'>Hapus</a>";
  echo "</td>";
  echo "</tr>";
 }
 echo "</table>";
 echo "</center>";

 }else {
  echo "Data tidak ditemukan";
 }

 $result->free ();
 $mysqli->close ();

 ?>
 
 <script type='text/javascript'>
 
 function delete_data(id_biodata){
	 var answer = confirm('Apakah anda yakin ?');
	 
	 if ( answer){
		 window.location = 'index.php?action=delete&id=' + id_biodata;
	 }
 }
 </script>

 </body>
</html>