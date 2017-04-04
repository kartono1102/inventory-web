<?php 
if(isset($_GET['r'])){
	
	include('class/database.php');
	$db = new Database();

	$tipe = $_GET['r'];
	$result = "0";

	switch($tipe){
		case 'GetDataKota':
			$result = $db->get_data_json("SELECT nama_kota,id_kota FROM tbl_kota");
			break;
		case 'AddKota':
			$nama = $_POST['nama-add'];
			$result = $db->insert_data("tbl_kota", "nama_kota", "'$nama'");
			break;
		case 'EditKota':
			$kode = $_POST['kode-edit'];
			$nama = $_POST['nama-edit'];
			$result = $db->update_data("tbl_kota", "nama_kota='$nama'", "id_kota='$kode'");
			break;
		case 'DeleteKota':
			$kode = $_POST['kode-delete'];
			$result = $db->delete_data("tbl_kota", "id_kota='$kode'");
			break;
	}

	echo $result;
}
?>