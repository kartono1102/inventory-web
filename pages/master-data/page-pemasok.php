<?php 
	include('pages/class/database.php');
	$db = new Database();
	$data = $db->get_data_json('SELECT * FROM tbl_supplier a JOIN tbl_kota b ON a.id_kota = b.id_kota');
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
		<table class="table table-bordered table-stripe table-hover" id="tblPemasok"></table>
	</div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="modalAdd">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
		<form action="#" id="formAdd" method="post" class="form-horizontal">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Add New Pemasok</h4>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<label class="control-label col-sm-3" for="nama-add">Nama Pemasok</label>
					<div class="col-sm-6">
						<input type="text" name="nama-add" id="nama-add" class="form-control">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-3" for="alamat-add">Alamat</label>
					<div class="col-sm-9">
						<textarea id="alamat-add" name="alamat-add" class="form-control" rows="3"></textarea>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-3" for="telp1-add">Telepon 1</label>
					<div class="col-sm-6">
						<input type="text" name="telp1-add" id="telp1-add" class="form-control">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-3" for="telp2-add">Telepon 2</label>
					<div class="col-sm-6">
						<input type="text" name="telp2-add" id="telp2-add" class="form-control">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-3" for="kota-add">Kota</label>
					<div class="col-sm-6">
						<select id="kota-add" name="kota-add" class="form-control"></select>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-3" for="keterangan-add">Keterangan</label>
					<div class="col-sm-9">
						<textarea id="keterangan-add" name="keterangan-add" class="form-control" rows="4"></textarea>
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
				<h4 class="modal-title">Edit Data Pemasok</h4>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<label class="control-label col-sm-3" for="nama-edit">Nama Pemasok</label>
					<div class="col-sm-6">
						<input type="hidden" name="kode-edit" id="kode-edit" class="form-control">
						<input type="text" name="nama-edit" id="nama-edit" class="form-control">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-3" for="alamat-edit">Alamat</label>
					<div class="col-sm-9">
						<textarea id="alamat-edit" name="alamat-edit" class="form-control" rows="3"></textarea>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-3" for="telp1-edit">Telepon 1</label>
					<div class="col-sm-6">
						<input type="text" name="telp1-edit" id="telp1-edit" class="form-control">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-3" for="telp2-edit">Telepon 2</label>
					<div class="col-sm-6">
						<input type="text" name="telp2-edit" id="telp2-edit" class="form-control">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-3" for="kota-edit">Kota</label>
					<div class="col-sm-6">
						<select id="kota-edit" name="kota-edit" class="form-control"></select>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-3" for="keterangan-edit">Keterangan</label>
					<div class="col-sm-9">
						<textarea id="keterangan-edit" name="keterangan-edit" class="form-control" rows="4"></textarea>
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
		var table = $('#tblPemasok').DataTable({
			data: <?php echo $data; ?>,
			columns: [
				{ title: "Nama Pemasok", data : "nama_supplier" },
				{ title: "Alamat", data : "alamat_supplier" },
				{ title: "Telepon", data : "telp_supplier" },
				{ title: "Kota", data : "nama_kota" },
				{ title: "Action", 
				  bSortable: false, 
				  data: null, 
				  defaultContent: 
				  	"<button id='edit' class='btn btn-primary btn-xs'>Edit</button>&nbsp;&nbsp;<button id='delete' class='btn btn-danger btn-xs'>Delete</button>"
				}
			]
		});

		$.ajax({
			url: "pages/data-route.php?r=GetKota",
			type: "GET",
			success: function(result){
				var xx = JSON.parse(result);
				var opt = "";
				$.each(xx, function(i, item){
					opt += "<option value='" + item.id_kota + "'>" + item.nama_kota + "</option>";
				});
				$('#kota-add').html(opt);
				$('#kota-edit').html(opt);
			}
		});

		$('#tblPemasok tbody').on('click', '#edit', function(){
			var data = table.row($(this).parents('tr')).data();
			$('#kode-edit').val(data.id_supplier);
			$('#nama-edit').val(data.nama_supplier);
			$('#alamat-edit').val(data.alamat_supplier);
			$('#telp1-edit').val(data.telp_supplier);
			$('#telp2-edit').val(data.telp2_supplier);
			$('#kota-edit').val(data.id_kota);
			$('#keterangan-edit').val(data.keterangan_supplier);
			$('#modalEdit').modal({ backdrop: 'static' });
		});

		$('#tblPemasok tbody').on('click', '#delete', function(){
			var data = table.row($(this).parents('tr')).data();
			swal({
				title: "Hapus Data",
				text: "Hapus Data Pemasok : " + data.nama_supplier + " ?",
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
						url: "pages/data-route.php?r=DeletePemasok",
						type: "POST",
						data: "kode-delete=" + data.id_supplier,
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
				url: "pages/data-route.php?r=AddPemasok",
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
				url: "pages/data-route.php?r=EditPemasok",
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