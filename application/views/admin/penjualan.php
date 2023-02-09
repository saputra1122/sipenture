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
						<h3 class="card-title">DATA PENJUALAN</h3>
						<button class="btn btn-info float-right ml-2 mb-2" onclick="return tambah()">Tambah <i class="fas fa-plus-circle"></i></button>
						<form class="float-right" method="POST">
							<button type="submit" name="cari" class="btn btn-info float-right ml-2 mb-2">
								<i class="fas fa-search"></i> Cari
							</button>
                            <div class="form-group float-right">
                                <input type="date" name="sampai" class="form-control" value="<?= $sampai ?>">
                            </div>
                            <div class="form-group float-right p-2">
                                Sampai :
                            </div>
                            <div class="form-group float-right">
                                <input type="date" name="dari" class="form-control" value="<?= $dari ?>">
                            </div>
                            <div class="form-group float-right p-2">
                                Dari :
                            </div>
                        </form>
					  </div>
					  <!-- /.card-header -->
					  <div class="card-body">
					  	<div class="mb-3" style="font-size: 17px;">
					  		<span class="mr-2">
					  			Total Bayar : <b>Rp. <?= number_format($total_bayar,0, ".", "."); ?></b>
					  		</span>
					  		<span class="mr-2">
					  			Total Piutang : <b>Rp. <?= number_format($total_piutang,0, ".", "."); ?></b>
					  		</span>
					  		<span>
					  			Total Omset : <b>Rp. <?= number_format($total_omset,0, ".", "."); ?></b>
					  		</span>
					  	</div>
						<table id="example1" class="table table-bordered table-striped">
						  <thead>
						  <tr align="center">
							<th>No</th>
							<th>NAMA CUSTOMER</th>
							<th>NAMA PRODUK</th>
							<th>KUANTITAS</th>
							<th>TANGGAL</th>
							<th>TOTAL</th>
							<th>BAYAR</th>
							<th>AKSI</th>
						  </tr>
						  </thead>
						  <tbody>
						  <?php $no=1; foreach($read as $d) { ?>
								<tr align="center">
									<td><?php echo $no++; ?></td>
									<td align="left"><?= $d->nama_cust ?></td>
									<td align="left"><?= $d->nama_produk ?></td>
									<td align="center"><?= $d->kuantitas ?></td>
									<td><?= format_indo(date($d->waktu)) ?></td>
									<!-- <td><?= date ('H:i', strtotime( $d->waktu)) ?></td> -->
                                    <td align="left">
				                    	Rp.
				                      <span class="float-right">
				                      	<?= number_format($d->total_omset, 0, ".", "."); ?>
				                      </span>
				                    </td>
				                    <td align="left">
				                    	Rp.
				                      <span class="float-right">
				                      	<?= number_format($d->total_bayar, 0, ".", "."); ?>
				                      </span>
				                    </td>
									<td class="text-center">
										
										<!-- <button class="btn btn-success" onclick="return ubah(
											`<?= $d->id ?>`,
                                            `<?= $d->id_customer ?>`,
                                            `<?= $d->nama_cust ?>`,
                                            `<?= $d->waktu ?>`,
                                            `<?= $d->total_bayar ?>`
										)"><i class="fas fa-edit"></i></button> -->
										
									<button class="btn btn-danger btn-sm" title="Hapus" onclick="return hapus(`<?= $d->id ?>`, `<?= $d->nama_cust ?>`, `<?= $d->id_produk ?>`, `<?= $d->kuantitas ?>`)"><i class="fas fa-trash-alt"></i>
									</button>
									<a href="<?= base_url()?>Admin/CetakFakturPenjualan/<?= $d->id ?>" class="btn btn-success btn-sm" title="Cetak" target="_blank"><i class="fas fa-print"></i></a>
										
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
	    <!--Modal-->
<!-- <form name="form" action="" method="post" enctype="multipart/form-data" accept-charset="UTF-8"> -->
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
								<div class="form-group">
									<label>Customer</label>
								<select name="id_customer" class="form-control selectpicker" data-live-search="true">
									<option value="" >Pilih Customer</option>
									<?php foreach($customer as $c){ ?>
									<option value="<?= $c->id ?>" data-tokens="<?= $c->nama_cust ?>"><?= $c->nama_cust ?></option>
									<?php } ?>
								</select>
								</div>
								<div class="form-group">
									<label>Produk</label>
										<select name="id_produk" class="form-control selectpicker" data-live-search="true" onchange="return getProduk2()" >
											<option value="" >Pilih Produk</option>
											<?php foreach($produk as $p){ ?>
											<option value="<?= $p->id ?>"data-tokens="<?= $p->nama_produk ?>"><?= $p->nama_produk ?></option>
											<?php } ?>
										</select>
								</div>
                            	<span id="data-produk">
										<div class="form-group">
											<input type="text" name="nama_produk" class="form-control d-none" placeholder="Nama Produk" readonly>
										</div>
										<div class="form-group">
											<label>HARGA</label>
											<input type="number" class="form-control" name="harga_jual" id="harga_jual" placeholder="Harga" readonly >
										</div>
								</span>
                                    <label>Qty</label>
                                    <input type="number" name="qty" class="form-control" placeholder="Qty" onkeydown="return simpan()">
                                <div class="form-group">	
									<label>Total Bayar</label>
									<input type="number" name="total_bayar" class="form-control" placeholder="Total Bayar">
								</div>
                                <div class="form-group m-2">
									<table class="table table-bordered table-striped">
										<thead>
											<tr>
												<th class="text-center">No.</th>
												<th class="text-center">Produk</th>
												<th class="text-center">Harga</th>
												<th class="text-center">Qty</th>
												<th class="text-center">Total</th>
												<th class="text-center">Opsi</th>
											</tr>
										</thead>
										<tbody id="keranjang">
										</tbody>
									</table>
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
	<?php $this->load->view('template/script') ?>
	<script>
		$(function () {
			$("#example1").DataTable({
			"responsive": true, "lengthChange": false, "autoWidth": false,
			"buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
			}).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
		});

		function getProduk(){
		var id = $('[name="id_produk"]').val();
		$('#data-produk').load("getProduk?id=" + id);
		};

		function getProduk2(){
		var id = $('[name="id_produk"]').val();
		$('#data-produk').load("getProduk2?id=" + id);
		};

		// function cekCustomer() {
		// 	var id = $('[name="id_customer"]').val();
		// 	$('.total-bayar').addClass("d-none");
		// 	if(id!="1"){
		// 		$('.total-bayar').removeClass("d-none");
		// 	}
		// };

		function tambah() {
			$('#Modal').modal('show');

			$('#modal-header').html('<i class="fa fa-plus"></i> Create');
			$('#modal-body-update-or-create').removeClass('d-none');
			$('#modal-body-delete').addClass('d-none');
			$('#modal-button').html('Create');
			$('#modal-button').removeClass('bg-pink');
			$('#modal-button').addClass('btn-success');

			$('.total-bayar').addClass("d-none");

			$('[name="id"]').val("");
			$('[name="id_customer"]').val(null).trigger('change');
			$('[name="id_produk"]').val(null).trigger('change');
			$('[name="nama_produk"]').val("");
			$('[name="harga_beli"]').val("");
			$('[name="harga_jual"]').val("");
			$('[name="qty"]').val("");
			//$('[name="total_bayar"]').val("");
			$('[name="tanggal"]').val("");

			$('#keranjang').load("ShowCart");
			$("#modal-button").removeAttr('onclick');
			$("#modal-button").attr('onclick', 'return save()');
		};

    function hapus(id, nama_produk, id_produk, kuantitas) {
			$('#Modal').modal('show');
			$('#modal-button').html('Delete');
			$('#modal-button').removeClass('btn-success');
			$('#modal-button').addClass('btn-primary');
			$('#modal-body-update-or-create').addClass('d-none');
			$('#modal-body-delete').removeClass('d-none');
			$('#modal-header').html('<i class="fa fa-trash"></i> Delete');

			$('[name="id"]').val(id);
			$('#name-delete').html(nama_produk);
			$('[name="id_produk"]').val(id_produk).trigger('change');
			$('[name="qty"]').val(kuantitas);
			$("#modal-button").removeAttr('onclick');
			$("#modal-button").attr('onclick', 'return deletes()');
		};

	function simpan(){
			var id = $('[name="id_produk"]').val();
			var qty = $('[name="qty"]').val();
			if (event.key ==="Enter") { 
				$('#keranjang').load("AddCart/"+id+"/"+qty);
			}
		}

	function batal(row_id){
		$('#keranjang').load("DeleteCart/"+row_id);
	}
	
	function save(){
		var id_customer = $('[name="id_customer"]').val();
		var total_bayar = $('[name="total_bayar"]').val();
		$.ajax({
				url : "<?= base_url() ?>Admin/SaveTransaksiPenjualan",
				method : "POST",
				data : { id_customer: id_customer, total_bayar: total_bayar},
				success : function(data){
					window.location = "<?= base_url() ?>Admin/penjualan";
				}
			});
	}

	function deletes() {
			var id = $('[name="id"]').val();
			var id_produk = $('[name="id_produk"]').val();
			var qty = $('[name="qty"]').val();
			$.ajax({
				url: "<?= base_url() ?>Admin/DeleteTransaksiPenjualan",
				method: "POST",
				data: {
					id: id,
					id_produk: id_produk,
					kuantitas: qty
				},
				success: function(data) {
					window.location = "<?= base_url() ?>Admin/penjualan";
				}
			});
		}
	</script>
</body>
</html>