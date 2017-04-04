<?php 
	include('pages/class/database.php');
	$db = new Database();
	$data = $db->get_data_json('SELECT nama_kota, id_kota FROM tbl_kota');
?>
<div class="row">
	<div class="col-sm-12">
		<button class="btn btn-success" id="add">Add New</button>
		<button class="btn btn-info" id="refresh">Refresh</button>
	</div>
</div>
<br>
<div class="row">
	<div class="col-sm-12">
		<table class="table table-bordered table-stripe table-hover" id="tblKota"></table>
	</div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="modalAdd">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
		<form action="#" id="formAdd" method="post" class="form-horizontal">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Add New Kota</h4>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<label class="control-label col-sm-3" for="nama-add">Nama Kota</label>
					<div class="col-sm-6">
						<input type="text" name="nama-add" id="nama-add" class="form-control">
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="reset" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary">Save</button>
			</div>
		</form>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" tabindex="-1" role="dialog" id="modalEdit">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
		<form action="#" id="formEdit" method="post" class="form-horizontal">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Edit Data Kota</h4>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<label class="control-label col-sm-3" for="nama-add">Nama Kota</label>
					<div class="col-sm-6">
						<input type="hidden" name="kode-edit" id="kode-edit" class="form-control">
						<input type="text" name="nama-edit" id="nama-edit" class="form-control">
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="reset" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary">Update</button>
			</div>
		</form>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script>
	$(document).ready(function(){
		var table = $('#tblKota').DataTable({
			data: <?php echo $data; ?>,
			columns: [
				{ title: "ID Kota", data : "id_kota" },
				{ title: "Nama Kota", data : "nama_kota" },
				{ title: "Action", 
				  bSortable: false, 
				  data: null, 
				  defaultContent: 
				  	"<button id='edit' class='btn btn-primary btn-xs'>Edit</button>&nbsp;&nbsp;<button id='delete' class='btn btn-danger btn-xs'>Delete</button>"
				}
			]
		});

		$('#tblKota tbody').on('click', '#edit', function(){
			var data = table.row($(this).parents('tr')).data();
			$('#kode-edit').val(data.id_kota);
			$('#nama-edit').val(data.nama_kota);
			$('#modalEdit').modal({ backdrop: 'static' });
		});

		$('#tblKota tbody').on('click', '#delete', function(){
			var data = table.row($(this).parents('tr')).data();
			swal({
				title: "Hapus Data",
				text: "Hapus Data Kota : " + data.nama_kota + " ?",
				type: "warning",
				showCancelButton: true,
				confirmButtonColor: "#DD6B55",
				confirmButtonText: "Hapus",
				cancelButtonText: "Cancel",
				closeOnConfirm: false,
				closeOnCancel: true
			},
			function(isConfirm){
				if (isConfirm) {
					$.ajax({
						url: "pages/data-route.php?r=DeleteKota",
						type: "POST",
						data: "kode-delete=" + data.id_kota,
						success: function(result){
							if(result === "1"){
								swal({
									title: "Hapus Data", 
									text: "Data telah terhapus !", 
									type: "success"
								},
								function(isConfirm2){
									if(isConfirm2){
										location.reload();
									}
								});
							}
						}
					});
				}
			});
		});

		$('#add').click(function(){
			$('#modalAdd').modal({ backdrop: 'static' });
		});

		$('#refresh').click(function(){
			location.reload();
		});

		$('#formAdd').submit(function(e){
			$.ajax({
				url: "pages/data-route.php?r=AddKota",
				type: "POST",
				data: $(this).serialize(),
				success: function(result){
					if(result === "1"){
						location.reload();
					}
				}
			});
			e.preventDefault();
		});

		$('#formEdit').submit(function(e){
			$.ajax({
				url: "pages/data-route.php?r=EditKota",
				type: "POST",
				data: $(this).serialize(),
				success: function(result){
					if(result === "1"){
						location.reload();
					}
				}
			});
			e.preventDefault();
		});
	});
</script>