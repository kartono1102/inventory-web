<?php 
if(isset($_GET['r'])){
	
	include('class/database.php');
	$db = new Database();

	$tipe = $_GET['r'];
	$result = "0";

	switch($tipe){
		//page kota
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

		//page pelanggan
		case 'GetKota':
			$result = $db->get_data_json("SELECT id_kota, nama_kota FROM tbl_kota ORDER BY nama_kota ASC");
			break;
		case 'GetSales':
			$result = $db->get_data_json("SELECT id_sales, nama_sales FROM tbl_sales ORDER BY nama_sales ASC");
			break;
		case 'AddPelanggan':
			$nama 		= $_POST['nama-add'];
			$alamat 	= $_POST['alamat-add'];
			$telp1 		= $_POST['telp1-add'];
			$telp2 		= $_POST['telp2-add'];
			$kota 		= $_POST['kota-add'];
			$sales 		= $_POST['sales-add'];
			$keterangan = $_POST['keterangan-add'];
			$result = $db->insert_data("tbl_customer", "nama_customer, alamat_customer, telp_customer, telp2_customer, id_kota, id_sales, keterangan_customer", "'$nama', '$alamat', '$telp1', '$telp2', '$kota', '$sales', '$keterangan'");
			break;
		case 'EditPelanggan':
			$kode 		= $_POST['kode-edit'];
			$nama 		= $_POST['nama-edit'];
			$alamat 	= $_POST['alamat-edit'];
			$telp1 		= $_POST['telp1-edit'];
			$telp2 		= $_POST['telp2-edit'];
			$kota 		= $_POST['kota-edit'];
			$sales 		= $_POST['sales-edit'];
			$keterangan = $_POST['keterangan-edit'];
			$result = $db->update_data("tbl_customer", "nama_customer='$nama', alamat_customer='$alamat', telp_customer='$telp1', telp2_customer='$telp2', id_kota='$kota', id_sales='$sales', keterangan_customer='$keterangan'", "id_customer='$kode'");
			break;
		case 'DeletePelanggan':
			$kode = $_POST['kode-delete'];
			$result = $db->delete_data("tbl_customer", "id_customer='$kode'");
			break;

		//page kategori
		case 'AddKategori':
			$nama = $_POST['nama-add'];
			$result = $db->insert_data("tbl_kategori", "nama_kategori", "'$nama'");
			break;
		case 'EditKategori':
			$kode = $_POST['kode-edit'];
			$nama = $_POST['nama-edit'];
			$result = $db->update_data("tbl_kategori", "nama_kategori='$nama'", "id_kategori='$kode'");
			break;
		case 'DeleteKategori':
			$kode = $_POST['kode-delete'];
			$result = $db->delete_data("tbl_kategori", "id_kategori='$kode'");
			break;

		//page merk
		case 'AddMerk':
			$nama = $_POST['nama-add'];
			$result = $db->insert_data("tbl_merk", "nama_merk", "'$nama'");
			break;
		case 'EditMerk':
			$kode = $_POST['kode-edit'];
			$nama = $_POST['nama-edit'];
			$result = $db->update_data("tbl_merk", "nama_merk='$nama'", "id_merk='$kode'");
			break;
		case 'DeleteMerk':
			$kode = $_POST['kode-delete'];
			$result = $db->delete_data("tbl_merk", "id_merk='$kode'");
			break;
	}

	echo $result;
}
?>