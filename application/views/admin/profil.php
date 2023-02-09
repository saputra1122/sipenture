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
			<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Profil Admin</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Profil Admin</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
			<section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="col-md-12">
          <div class="card">
            <div class="card-body">
              <div class="row">
                <div class="col-md-3">
                  <div class="card card-primary">
                    <div class="card-header">
                      <h3 class="card-title"></h3>
                    </div>
                    <!-- form start -->
                    <form>
                      <div class="card-body">
                        <div class="user-panel pb-3 d-flex">
                          <div class="image">
                            <img src="<?php echo base_url();?>assets/img/admin.png" class="profile_user-img img-circle" style="width: 40%; margin-left: 50px;" alt="User Image"> <h4 class="container-fluid"><?php echo $this->session->userdata('nama'); ?></h4>
                          </div>
                        </div>
                        <ul class="list-group list-group-unbordered">
                          <li class="list-group-item">
                            <b>Penjualan</b> <a class="float-right text-muted text-md"><?php echo $jml_penjualan ?></a>
                          </li>
                        </ul>

                        <ul class="list-group list-group-unbordered">
                          <li class="list-group-item">
                            <b>Pembelian</b> <a class="float-right text-muted text-md"><?php echo $jml_pembelian ?></a>
                          </li>
                        </ul>
                        <!-- /.card-body -->
                      </div>
                    </form>
                  </div>
                </div>
                <div class="col-md-9">
                <table id="table" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Pemilik</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Level</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php $nomor=1; foreach($profil as $data) { ?>
                    <tr>
                      <td><?php echo $nomor++; ?></td>
                      <td><?php echo $data->nama ?></td>
                      <td><?php echo $data->username ?></td>
                      <td><?php echo $data->password ?></td>
                      <td><?php echo $data->akses ?></td>
                      <td>
                          <button class="btn btn-success btn-sm" onclick="return edit(
                          `<?php echo $data->id ?>`,
                          `<?php echo $data->username ?>`,
                          `<?php echo $data->password ?>`,
                          `<?php echo $data->nama ?>`,
                          `<?php echo $data->akses ?>`,
                          )" style="margin: 10px;">
                            <i class="fa fa-edit"></i>
                              Edit
                          </button>
                      </td>
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
            <!-- /.card -->
          </div>
          </div>
        </div>
      </div>
      </div>
    </section>
      	</div><!-- /.content-wrapper -->
			<?php $this->load->view('template/footer') ?>
	    </div>
	</body>
	<?php $this->load->view('template/script') ?>
	<script>
      var myTable = $('#table').DataTable({});

      function edit(id,username,password,nama,akses){
        $('#Modal').modal('show');
        
        $('#modal-header').html('<i class="fa fa-pencil"></i> Edit Data');
        $('#modal-body-update-or-create').removeClass('d-none');
        $('#modal-body-delete').addClass('d-none');
        $('#modal-button').html('Edit');
        $('#modal-button').removeClass('btn-danger');
        $('#modal-button').addClass('btn-success');
        
        $('[name="id"]').val(id);
        $('[name="username"]').val(username);
        $('[name="password"]').val(password);
        $('[name="nama"]').val(nama);
        $('[name="akses"]').val(akses);
        
        document.form.action = '<?php echo base_url();?>Admin/edit_profil';
      };
      
  </script>
<!--Modal Tambah-->
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
              <div class="form-group">
                <label>Nama Pemilik</label>
                  <input type="text" class="form-control" name="nama" size="15">
              </div>
              <div class="form-group">
                <label>Username</label>
                  <input type="text" class="form-control" name="username">
              </div>
              <div class="form-group">
                <label>Password</label>
                  <input type="password" class="form-control" name="password">
              </div>
              <div class="form-group">
                <label>Akses</label>
                  <input type="text" class="form-control" name="akses" readonly>
              </div>

            </span>
            
            <span id="modal-body-delete">
              Anda yakin akan menghapus data <b id="name-delete"></b> pada tabel ini?
            </span>
            
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-dismiss="modal" aria-hidden="true">Kembali</button>
            <button type="submit" class="btn btn-success" id="modal-button">Simpan</button>
          </div>
        </div>
      </div>
    </div>
  </form>
  <!--Modal-->
</html>