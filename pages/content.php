<div class="content-wrapper">
    <section class="content-header">
      <h1 id="judul">Content Header</h1>
    </section>

    <section class="content">
		<div class="row">
			<div class="col-sm-12">
				<div class="box box-primary">
					<div class="box-body" id="konten">
						Content
					</div>
				</div>
			</div>
		</div>
	</section>
</div>

<script>
	function loadHalaman(sumber){
		$('#konten').html('<center><img src="img/ajax-loader.gif" /></center>');
		$.ajax({
			url: "pages/page-loader.php?kode=" + sumber,
			type: "GET",
			success: function(result){
				$('#konten').html(result);
			}
		});
	}

	$('#mdKota').click(function(){
		$('#judul').html('Data Kota');
		loadHalaman('mdKota');
	});

	$('#mdCustomer').click(function(){
		$('#judul').html('Data Customer');
		loadHalaman('mdCustomer');
	});

	$('#mdSupplier').click(function(){
		$('#judul').html('Data Supplier');
		loadHalaman('mdSupplier');
	});
</script>