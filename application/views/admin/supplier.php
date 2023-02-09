<!DOCTYPE html>
<html lang="en">
	<?php $this->load->view('template/head') ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

	<body class="hold-transition sidebar-mini layout-fixed">
		<div class="wrapper">
			<?php $this->load->view('template/preloader') ?>
			<?php $this->load->view('template/sidebar') ?>
			<?php $this->load->view('template/navbar') ?>

		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<section class="content">
      		<div class="container-fluid">
	        <!-- Small boxes (Stat box) -->
	        <div class="row">
				<div class="col-12 mt-2">
					<div class="card">
					  <div class="card-header">
						<h3 class="card-title">DATA SUPPLIER</h3>
						<button class="btn btn-info btn-sm float-right" onclick="return tambah()">Tambah <i class="fas fa-plus-circle"></i></button>
					  </div>
					  <!-- /.card-header -->
					  <div class="card-body">
						<table id="example1" class="table table-bordered table-striped">
						  <thead>
						  <tr align="center">
							<th>No</th>
							<th>NAMA SUPLIER</th>
							<th>NOMOR HP</th>
							<th>ALAMAT</th>
                            <th>AKSI</th>
						  </tr>
						  </thead>
						  <tbody>
						  <?php $no=1; foreach($read as $d) {?>
								<tr align="center">
									<td><?php echo $no++; ?></td>
									<td align="left"><?= $d->nama_supplier ?></td>
									<td><?= $d->no_hp_supplier ?></td> 
									<td><?= $d->alamat_supplier ?></td>                       
									<td class="text-center">
										
										<button class="btn btn-success btn-sm" title="Edit" onclick="return ubah(
                                            `<?= $d->id ?>`,
                                            `<?= $d->nama_supplier ?>`,
                                            `<?= $d->no_hp_supplier ?>`,
                                            `<?= $d->alamat_supplier ?>`
                                            )"><i class="fas fa-edit"></i></button>
										
										<button class="btn btn-danger btn-sm" title="Hapus" onclick="return hapus(`<?= $d->id ?>`,`<?= $d->nama_supplier ?>`)"><i class="fas fa-trash-alt"></i></button>
										
									</td>
								</tr>
								<?php
								}
								?>
						</tbody>
						</table>
						</div>
					</div>
					</div>
				</div>
        	</div><!-- /.container-fluid -->
          	</section>
      	</div><!-- /.content-wrapper -->
			<?php $this->load->view('template/footer') ?>
	    </div>
	</body>
	<?php $this->load->view('template/script') ?>
	<script>
		$(function () {
			$("#example1").DataTable({
			"responsive": true, "lengthChange": false, "autoWidth": false,
			"buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
			}).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
		});
        function tambah(){
			
            $('#Modal').modal('show');
            
            $('#modal-header').html('<i class="fa fa-plus"></i> Tambah Supplier');
            $('#modal-body-update-or-create').removeClass('d-none');
            $('#modal-body-delete').addClass('d-none');
            $('#modal-button').html('Save');
            $('#modal-button').removeClass('btn-danger');
            $('#modal-button').addClass('btn-success swalDefaultSuccess');
			
            $('[name="id"]').val("");
            $('[name="nama_supplier"]').val("");
            $('[name="no_hp_supplier"]').val("");
            $('[name="alamat_supplier"]').val("");
            
            
            document.form.action = '<?php echo base_url();?>Admin/supplier_add';
    };
    function ubah(id,nama_supplier,no_hp_supplier,alamat_supplier){
			
            $('#Modal').modal('show');
            
            $('#modal-header').html('<i class="fas fa-edit"></i> Update Supplier');
            $('#modal-body-update-or-create').removeClass('d-none');
            $('#modal-body-delete').addClass('d-none');
            $('#modal-button').html('Save');
            $('#modal-button').removeClass('btn-danger');
            $('#modal-button').addClass('btn-success swalDefaultSuccess');
            
            $('[name="id"]').val(id);
            $('[name="nama_supplier"]').val(nama_supplier);
            $('[name="no_hp_supplier"]').val(no_hp_supplier);
            $('[name="alamat_supplier"]').val(alamat_supplier);
            
            
            document.form.action = '<?php echo base_url();?>Admin/supplier_update';
    };
    function hapus(id,nama_supplier){
				$('#Modal').modal('show');
				$('#modal-button').html('Delete');
				$('#modal-button').removeClass('btn-success');
				$('#modal-button').addClass('btn-danger');
				$('#modal-body-update-or-create').addClass('d-none');
				$('#modal-body-delete').removeClass('d-none');
				$('#modal-header').html('<i class="fa fa-trash"></i> Delete');
				
				$('[name="id"]').val(id);
				$('#name-delete').html(nama_supplier);
				
				document.form.action = '<?php echo base_url();?>Admin/supplier_delete';
			};

	document.addEventListener("keydown", function click(event) {
    if (event.altKey && (event.key === 't' || event.key === 'T'))
    {
		tambah().click
        event.preventDefault();
		$('name=nama_supplier').focus;
    }
});
</script>
<!--Modal-->
<form name="form" action="" method="post" enctype="multipart/form-data" accept-charset="UTF-8">
		<div id="Modal" class="modal fade" tabindex="-1">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header" style="text-align:center">
						<h3 id="modal-header"></h3>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">
						
						<input type="hidden" name="id">
						
						<span id="modal-body-update-or-create">
							<label>Nama Supplier</label>
							<input type="text" id="nama_supplier" name="nama_supplier" class="form-control" placeholder="Nama" autofocus>
                            <label>Nomor Telepon</label>
							<input type="text" name="no_hp_supplier" maxlength="13" class="form-control" placeholder="No Telepon">
							<label>Alamat</label>
							<input type="text" name="alamat_supplier" class="form-control" placeholder="Alamat">
						</span>	
						
						<span id="modal-body-delete">
							Are you sure want to delete <b id="name-delete"></b> from this table?
						</span>
						
						
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-primary" data-dismiss="modal" aria-hidden="true">Back</button>
						<button type="submit" class="btn btn-success" id="modal-button">Save</button>
					</div>
				</div>
			</div>
		</div>
	</form>
	<!--Modal-->
</html>