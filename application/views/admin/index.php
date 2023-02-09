<!DOCTYPE html>
<html lang="en">
<title>Eliy's Furniture</title>
	<?php $this->load->view('template/head') ?>

	<body class="hold-transition sidebar-mini layout-fixed">
		<div class="wrapper">
			<?php $this->load->view('template/preloader') ?>
			<?php $this->load->view('template/sidebar') ?>
			<?php $this->load->view('template/navbar') ?>

		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper" style="min-height: 430px;">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <?php include ("koneksi.php"); ?>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php echo $jml_ktg ?></h3>

                <p>
                   Kategori
                </p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <?php if($this->session->userdata('akses')=="admin"){ ?>
              <a href="<?php echo base_url('Admin/kategori');?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              <?php } ?>
            </div>
          </div>
          
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo $jml_produk ?></h3>

                <p>Produk</p>
              </div>
              <div class="icon">
                <i class="ion ion-bookmark"></i>
              </div>
              <?php if($this->session->userdata('akses')=="admin"){ ?>
              <a href="<?php echo base_url('Admin/produk');?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              <?php } ?>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php echo $jml_penjualan ?></h3>

                <p>Penjualan</p>
              </div>
              <div class="icon">
                <i class="ion ion-pricetag"></i>
              </div>
              <?php if($this->session->userdata('akses')=="admin"){ ?>
              <a href="<?php echo base_url('Admin/penjualan');?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              <?php } ?>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?php echo $jml_pembelian ?></h3>

                <p>Pembelian</p>
              </div>
              <div class="icon">
                <i class="ion ion-pricetags"></i>
              </div>
              <?php if($this->session->userdata('akses')=="admin"){ ?>
              <a href="<?php echo base_url('Admin/pembelian');?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              <?php } ?>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <div class="col-md-6">
            <!-- BAR CHART -->
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Data Penjualan & Pembelian</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <div class="chart">
                  <canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <div class="col-md-6">
            <!-- DONUT CHART -->
            <div class="card card-danger">
              <div class="card-header">
                <h3 class="card-title">Data Kategori & Produk</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <canvas id="donutChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div><!-- /.content-wrapper -->
			<?php $this->load->view('template/footer') ?>
	    </div>
	</body>
	<?php $this->load->view('template/script') ?>
	<script>
  $(function () {
    var areaChartData = {
      labels  : ['Penjualan', 'Pembelian'],
      datasets: [
        {
          label               : 'Data',
          backgroundColor     : '#00c0ef',
          borderColor         : '#974063',
          pointRadius          : false,
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : [<?= count($penjualan)?>, <?= count($pembelian)?>]
        }
      ]
    }

    //- BAR CHART -
    //-------------
    var barChartCanvas = $('#barChart').get(0).getContext('2d')
    var barChartData = $.extend(true, {}, areaChartData)
    var temp0 = areaChartData.datasets[0]
    barChartData.datasets[0] = temp0

    var barChartOptions = {
      responsive              : true,
      maintainAspectRatio     : false,
      datasetFill             : false,

      scales: {
        yAxes: [{
          ticks: {
            beginAtZero: true
          }
        }]
      }
    }

    new Chart(barChartCanvas, {
      type: 'bar',
      data: barChartData,
      options: barChartOptions
    })
  })

  //- DONUT CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
    var donutData        = {
      labels: [
          'Kategori',
          'Produk',
      ],
      datasets: [
        {
          data: [<?= count($kategori)?>, <?= count($produk)?>],
          //'#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'
          backgroundColor : ['#f56954','#f39c12'],
        }
      ]
    }
    var donutOptions     = {
      maintainAspectRatio : false,
      responsive : true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    new Chart(donutChartCanvas, {
      type: 'doughnut',
      data: donutData,
      options: donutOptions
    })
</script>
</html>
		
		
