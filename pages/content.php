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