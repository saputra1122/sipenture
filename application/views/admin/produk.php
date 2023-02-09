<!DOCTYPE html>
<html lang="en">
	<?php $this->load->view('template/head') ?>

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
						<h3 class="card-title">DATA PRODUK</h3>
						<button class="btn btn-info btn-sm float-right" onclick="return tambah()">Tambah <i class="fas fa-plus-circle"></i></button>
					  </div>
					  <!-- /.card-header -->
					  <div class="card-body">
						<table id="example1" class="table table-bordered table-striped">
						  <thead>
						  <tr align="center">
							<th>No</th>
							<th>NAMA PRODUK</th>
							<th>MERK</th>
							<th>KUANTITAS</th>
							<th>HARGA BELI</th>
							<th>HARGA JUAL</th>
							<th>MARGIN</th>
							<th>AKSI</th>
						  </tr>
						  </thead>
						  <tbody>
						  <?php $no=1; foreach($read as $d) {
							  $margin = $d->harga_jual-$d->harga_beli;
							  ?>
								<tr align="center">
									<td><?php echo $no++; ?></td>
									<td align="left"><?= $d->nama_produk ?></td>
									<td align="left"><?= $d->merk ?></td>
									<td><?= $d->kuantitas ?></td>
                                    <td>Rp. <?= number_format($d->harga_beli, 0, ".", ".") ?></td>
                                    <td>Rp. <?= number_format($d->harga_jual, 0, ".", ".") ?></td>
                                    <td>Rp. <?= number_format($margin, 0, ".", ".") ?></td>
									<td class="text-center">
										
										<button class="btn btn-success btn-sm" title="Edit" onclick="return ubah(`<?= $d->id ?>`, `<?= $d->id_kategori ?>`, `<?= $d->nama_produk ?>`, `<?= $d->kuantitas ?>`, `<?= $d->harga_beli ?>`, `<?= $d->harga_jual ?>`
										)"><i class="fas fa-edit"></i></button>
										
										<button class="btn btn-danger btn-sm" title="Hapus" onclick="return hapus(`<?= $d->id ?>`,`<?= $d->nama_produk ?>`)"><i class="fas fa-trash-alt"></i></button>
										
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
			$('#lbl_update_date').attr('disabled',true);
			$('#update_date').attr('disabled',true);
			$('#lbl_update_date').hide();
			$('#update_date').hide();
            
            $('#modal-header').html('<i class="fa fa-plus"></i> Tambah Produk');
            $('#modal-body-update-or-create').removeClass('d-none');
            $('#modal-body-delete').addClass('d-none');
            $('#modal-button').html('Save');
            $('#modal-button').removeClass('btn-danger');
            $('#modal-button').addClass('btn-success swalDefaultSuccess');
            
            $('[name="id"]').val("");
			$('[name="id_kategori"]').val("");
            $('[name="nama_produk"]').val("");
            $('[name="kuantitas"]').val("");
            $('[name="harga_beli"]').val("");
			$('[name="harga_jual"]').val("");
            
            
            document.form.action = '<?php echo base_url();?>Admin/produk_add';
    };

    function ubah(id, id_kategori, nama_produk, kuantitas, harga_beli, harga_jual) {
        $('#Modal').modal('show');
        $('#modal-header').html('Ubah Produk');
        $('#batal').removeClass('bg-gradient-success').addClass('bg-gradient-danger');
        $('#modal-button').removeClass('bg-gradient-danger').addClass('bg-gradient-success');
        $('#modal-body-update-or-create').removeClass('d-none');
        $('#modal-body-delete').addClass('d-none');
        $('[name="id"]').val(id);
        $('[name="id_kategori"]').val(id_kategori).trigger('change');
        $('[name="nama_produk"]').val(nama_produk);
        $('[name="kuantitas"]').val(kuantitas);
        $('[name="harga_beli"]').val(harga_beli);
        $('[name="harga_jual"]').val(harga_jual);
        document.form.action = '<?= base_url('Admin/produk_update'); ?>';
    }

	function hapus(id,nama_produk){
				$('#Modal').modal('show');
				$('#update_date').attr('disabled',true);
				$('#modal-button').html('Delete');
				$('#modal-button').removeClass('btn-success');
				$('#modal-button').addClass('btn-danger');
				$('#modal-body-update-or-create').addClass('d-none');
				$('#modal-body-delete').removeClass('d-none');
				$('#modal-header').html('<i class="fa fa-trash"></i> Delete');
				
				$('[name="id"]').val(id);
				$('#name-delete').html(nama_produk);
				
				document.form.action = '<?= base_url('Admin/produk_delete'); ?>';
			};

</script>
<!--Modal-->
<form name="form" action="" method="post" enctype="multipart/form-data" accept-charset="UTF-8">
		<div id="Modal" class="modal fade" tabindex="-1">
			<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
				<div class="modal-content">
					<div class="modal-header" style="text-align:center">
						<h3 id="modal-header"></h3>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">
						
						<input type="hidden" name="id">
							
						<span id="modal-body-update-or-create">
							<div class="form-group">
								<div class="form-group">
								<label>Pilih Kategori</label>
									<select name="id_kategori" class="form-control" >
										<option value="" >Pilih Kategori</option>
										<?php foreach($nama_kategori as $k){ ?>
										<option value="<?= $k->id ?>"><?= $k->nama_kategori ?></option>
										<?php } ?>
									</select>
								</div>
								<label>Nama Produk</label>
								<input type="text" name="nama_produk" class="form-control" placeholder="Nama Produk">
								<label>Kuantitas</label>
								<input type="number" name="kuantitas" id="kuantitas" class="form-control" placeholder="Kuantitas">
	                            <label>Harga Beli</label>
								<input type="text" name="harga_beli" class="form-control" placeholder="Harga Beli">
								<label>Harga Jual</label>
								<input type="text" name="harga_jual" class="form-control" placeholder="Harga Jual">
					
								<label id="lbl_update_date">Update Date</label>
								<input type="datetime-local" name="update_date" id="update_date" class="form-control" required>
							</div>
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