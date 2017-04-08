<?php 
if(isset($_GET['p'])){
	$kode = base64_decode($_GET['p']);
	$judul = "";

	switch($kode){
		case 'mdKota': 
			$judul = "Data Kota";
			include("master-data/page-kota.php");
			break;
		case 'mdCustomer': 
			$judul = "Data Customer";
			include("master-data/page-pelanggan.php");
			break;
		case 'mdSupplier': 
			$judul = "Data Supplier";
			echo "Halaman Data Supplier"; 
			break;
		case 'msCategory':
			$judul = "Data Category";
			include("master-stock/page-kategori.php");
			break;
		case 'msBrand':
			$judul = "Data Merk";
			include("master-stock/page-merk.php");
			break;
		default:
			echo "Halaman tidak dikenal";
	}
}
?>
<script>
	$(document).ready(function(){
		$('#judul').html('<?php echo $judul; ?>');
	});
</script>