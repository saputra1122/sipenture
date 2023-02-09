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
                                    <h3 class="card-title">DATA PEMBELIAN</h3>
                                    <button id="tambahkan" class="btn btn-info float-right ml-2 mb-2" onclick="return tambah()">
                                        <i class="fas fa-plus-circle"></i> Tambah
                                    </button>
                                    <div class="float-right">
                                        <div class="form-group float-right">
                                            <input type="date" name="sampai" class="form-control">
                                        </div>
                                        <div class="form-group float-right p-2">
                                            Sampai :
                                        </div>
                                        <div class="form-group float-right">
                                            <input type="date" name="dari" class="form-control">
                                        </div>
                                        <div class="form-group float-right p-2">
                                            Dari :
                                        </div>
                                    </div>
                                </div>
					  <!-- /.card-header -->
					  <div class="card-body">
						<table id="example1" class="table table-bordered table-striped">
						    <thead>
						        <tr align="center">
    							    <th class="text-center">NO</th>
                                    <th class="text-center">SUPPLIER</th>
                                    <th class="text-center">NAMA PRODUK</th>
                                    <th class="text-center">TANGGAL</th>
                                    <th class="text-center">TOTAL BAYAR</th>
                                    <th class="text-center">AKSI</th>
						        </tr>
						    </thead>
						    <tbody>
                                <?php
                                $no = 1;
                                foreach ($read as $d) {
                                ?>
                                <tr align="center">
                                    <td class="text-center"><?= $no++; ?>.</td>
                                    <td><?= $d->nama_supplier ?></td>
                                    <td><?= $d->nama_produk ?></td>
                                    <td><?= format_indo($d->waktu) ?></td>
                                    <!-- <td><?= date('H:i', strtotime($d->waktu)) ?></td> -->
                                    <td align="left">
                                        Rp
                                        <span class="float-right">
                                            <?= number_format($d->total_bayar, 0, ".", "."); ?>
                                        </span>
                                    </td>
                                    <td class="text-center">
                                        <button class="btn btn-danger btn-sm" title="Hapus" onclick="return hapus(`<?= $d->id ?>`, `<?= $d->nama_supplier ?>`)"><i class="fas fa-trash"></i></button>
                                        <a class="btn btn-warning btn-sm" title="Cetak" href="<?= base_url() ?>Admin/CetakFakturPembelian/<?= $d->id ?>" target="_blank"><i class="fas fa-print"></i></a>
                                    </td>
                                </tr>
                                <?php } ?>
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
                            <label>Supplier</label>
                            <select name="id_supplier" class="form-control selectpicker" data-live-search="true">
                                <option value="" data-tokens="">Pilih</option>
                                <?php foreach ($supplier as $s) { ?>
                                    <option value="<?= $s->id ?>" data-tokens="<?= $s->nama_supplier ?>"><?= $s->nama_supplier ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Produk</label>
                            <select name="id_produk" class="form-control selectpicker" data-live-search="true" onchange="return getProduk()">
                                <option value="" data-tokens="">Pilih</option>
                                <?php foreach ($produk as $p) { ?>
                                    <option value="<?= $p->id ?>" data-tokens="<?= $p->nama_produk ?>">
                                        <?= $p->nama_produk ?>
                                    </option>
                                <?php } ?>

                            </select>
                        </div>
                        <span id="data-produk">
                            <input type="text" name="nama_produk" class="form-control d-none" readonly>
                            <div class="form-group">
                                <label>Harga</label>
                                <input type="number" name="harga_beli" class="form-control" placeholder="Harga Beli" readonly>
                            </div>
                        </span>
                        <div class="form-group">
                            <label>Qty</label>
                            <input type="number" name="qty" class="form-control" placeholder="Qty" onkeydown="return simpan()">
                        </div>
                        <div class="form-group">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                    <th class="text-center">No</th>
                                        <th class="text-center">Produk</th>
                                        <th class="text-center">Harga</th>
                                        <th class="text-center">QTY</th>
                                        <th class="text-center">Total Harga</th>
                                        <th class="text-center">Aksi</th>
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
                    <button type="submit" class="btn btn-success" id="modal-button" onclick="return save()">Save</button>
                </div>
            </div>
        </div>
    </div>
    <!--Modal-->
	</body>
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

	    function simpan() {
            var id = $('[name="id_produk"]').val();
            var qty = $('[name="qty"]').val();
            if (event.key === "Enter") {
                $('#keranjang').load("AddCartt/" + id + "/" + qty);
            }
        }

        function save() {
            var id_supplier = $('[name="id_supplier"]').val();
            $.ajax({
                url: "<?= base_url() ?>Admin/SaveTransaksiPembelian",
                method: "POST",
                data: {
                    id_supplier: id_supplier
                },
                success: function(data) {
                    window.location = "<?= base_url() ?>Admin/pembelian";
                }
            });
        }

        function batal(row_id) {
            $('#keranjang').load("DeleteCartt/" + row_id);
        }

		function tambah(){
			
            $('#Modal').modal('show');
            
            $('#modal-header').html('<i class="fa fa-plus"></i> Tambah Pembelian');
            $('#modal-body-update-or-create').removeClass('d-none');
            $('#modal-body-delete').addClass('d-none');
            $('#modal-button').html('Add');
            $('#modal-button').removeClass('btn-danger');
            $('#modal-button').addClass('btn-success swalDefaultSuccess');
            
            $('[name="id"]').val("");
            $('[name="id_produk"]').val("");
			$('[name="id_supplier"]').val("");
            $('[name="nama_produk"]').val("");
            $('[name="kuantitas"]').val("");
            $('[name="harga_beli"]').val("");
			$('[name="harga_jual"]').val("");
            
            $('#keranjang').load("ShowCartt");
    	};

    	function hapus(id, nama_produk) {
            $('#Modal').modal('show');
            $('#modal-button').html('Delete');
            $('#modal-button').removeClass('btn-success');
            $('#modal-button').addClass('btn-danger');
            $('#modal-body-update-or-create').addClass('d-none');
            $('#modal-body-delete').removeClass('d-none');
            $('#modal-header').html('<i class="fa fa-trash"></i> Delete');
            $('#modal-button').attr('onclick', 'return hapuss()');

            $('[name="id"]').val(id);
            $('#name-delete').html(nama_produk);
        };

		function hapuss() {
            var id = $('[name="id"]').val();
			var id_produk = $('[name="id_produk"]').val();
			var qty = $('[name="qty"]').val();
			$.ajax({
				url: "<?= base_url() ?>Admin/DeleteTransaksiPembelian",
				method: "POST",
				data: {
					id: id,
					id_produk: id_produk,
					kuantitas: qty
				},
				success: function(data) {
					window.location = "<?= base_url() ?>Admin/pembelian";
				}
			});
        }

</script>
</html>