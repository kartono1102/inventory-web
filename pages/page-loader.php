<?php 
if(isset($_GET['kode'])){
	$kode = $_GET['kode'];

	switch($kode){
		case 'mdKota': 
			//echo "Halaman Data Kota";
			include("master-data/page-kota.php");
			break;
		case 'mdCustomer': 
			echo "Halaman Data Customer"; 
			break;
		case 'mdSupplier': 
			echo "Halaman Data Supplier"; 
			break;
		default:
			echo "Halaman tidak dikenal";
	}
}
?>