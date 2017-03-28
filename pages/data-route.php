<?php 
if(isset($_GET['r'])){
	
	include('class/database.php');
	$db = new Database();

	$tipe = $_GET['r'];
	$result = "0";

	switch($tipe){
		case 'AddKota':
			$nama = $_POST['nama-add'];
			$result = $db->insert_data('tbl_kota', 'nama_kota', "'$nama'");
			break;
	}

	echo $result;
}
?>