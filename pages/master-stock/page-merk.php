<?php 
	include('pages/class/database.php');
	$db = new Database();
	$data = $db->get_data_json('SELECT id_merk, nama_merk FROM tbl_merk');
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
		<table class="table table-bordered table-stripe table-hover" id="tblMerk"></table>
	</div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="modalAdd">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
		<form action="#" id="formAdd" method="post" class="form-horizontal">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Add New Merk</h4>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<label class="control-label col-sm-3" for="nama-add">Nama Merk</label>
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
				<h4 class="modal-title">Edit Data Merk</h4>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<label class="control-label col-sm-3" for="nama-edit">Nama Merk</label>
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
		var table = $('#tblMerk').DataTable({
			data: <?php echo $data; ?>,
			columns: [
				{ title: "Nama Merk", data : "nama_merk" },
				{ title: "Action", 
				  bSortable: false, 
				  data: null, 
				  defaultContent: 
				  	"<button id='edit' class='btn btn-primary btn-xs'>Edit</button>&nbsp;&nbsp;<button id='delete' class='btn btn-danger btn-xs'>Delete</button>"
				}
			]
		});

		$('#tblMerk tbody').on('click', '#edit', function(){
			var data = table.row($(this).parents('tr')).data();
			$('#kode-edit').val(data.id_merk);
			$('#nama-edit').val(data.nama_merk);
			$('#modalEdit').modal({ backdrop: 'static' });
		});

		$('#tblMerk tbody').on('click', '#delete', function(){
			var data = table.row($(this).parents('tr')).data();
			swal({
				title: "Hapus Data",
				text: "Hapus Data Merk : " + data.nama_merk + " ?",
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
						url: "pages/data-route.php?r=DeleteMerk",
						type: "POST",
						data: "kode-delete=" + data.id_merk,
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
				url: "pages/data-route.php?r=AddMerk",
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
				url: "pages/data-route.php?r=EditMerk",
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