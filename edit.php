<?php
include 'koneksi.php';

$action = isset( $_POST['action']) ? $_POST['action'] : "";

if ($action == "update"){
	$query = "update biodata set
	                nama   = '".$mysqli->real_escape_string($_POST['nama'])."',
					alamat = '".$mysqli->real_escape_string($_POST['alamat'])."',
					hobi   = '".$mysqli->real_escape_string($_POST['hobi'])."'
			  where id_biodata = '".$mysqli->real_escape_string($_REQUEST['id_biodata'])."'";
			  
			  if ( $mysqli->query($query) ){
				  echo "Data berhasil diubah";
			  }else{
				  echo "Data gagal diubah";
			  }
}

$query = "select id_biodata, nama, alamat, hobi
            from biodata
			where id_biodata='".$mysqli->real_escape_string($_REQUEST['id_biodata'])."'
			limit 0,1";
			
$result = $mysqli->query( $query ); #29
$row = $result->fetch_assoc();

$id_biodata = $row['id_biodata'];
$nama = $row['nama'];
$alamat = $row['alamat'];
$hobi = $row['hobi'];			
?>

<form action='#' method='post' border='0'>
<table>
<tr>
<td>Nama</td>
<td><input type='text' name='nama' value='<?php echo $nama; ?>'/></td>
</tr>
<tr>
<td>Alamat</td>
<td><input type='text' name='alamat' value='<?php echo $alamat; ?>'/></td>
</tr>
<tr>
<td>Hobi</td>
<td><input type='text' name='hobi' value='<?php echo $hobi; ?>'/></td>
</tr>
<tr>
<td></td>
<td>
<input type='hidden' name='id_biodata' value='<?php echo $id_biodata ?>'/>

<input type='hidden' name='action' value='update'/>
<input type='submit' value='Edit'/>

<a href='index.php,>Back to index</a>
</td>
</tr>
</table>
</form>