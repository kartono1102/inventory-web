<?php 
	include('class/database.php');
	$db = new Database();
	$data = $db->get_data_json("SELECT nama_kota,id_kota FROM tbl_kota");
?>
<div class="row">
	<div class="col-sm-12">
		<table class="table table-bordered table-stripe table-hover" id="tblKota"></table>
	</div>
</div>

<script>
	$(document).ready(function(){
		var table = $('#tblKota').DataTable({
			data: <?php echo $data; ?>,
			columns: [
				{ title: "Nama Kota" },
				{ title: "Action", 
				  bSortable: false, 
				  data: "id_kota", 
				  defaultContent: 
				  	"<button id='edit' class='btn btn-primary btn-xs'>Edit</button>&nbsp;&nbsp;" + 
				  	"<button id='delete' class='btn btn-danger btn-xs'>Delete</button>"
				}
			]
		});

		$('#tblKota tbody').on('click', '#edit', function(){
			var data = table.row($(this).parents('tr')).data();
			alert('Edit : ' + data[1]);
		});

		$('#tblKota tbody').on('click', '#delete', function(){
			var data = table.row($(this).parents('tr')).data();
			alert('Delete : ' + data[1]);
		});		
	});
</script>