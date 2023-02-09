<!-- Main Sidebar Container -->
<style>
  [class*=sidebar-light-] .nav-sidebar>.nav-item.menu-open>.nav-link, [class*=sidebar-light-] .nav-sidebar>.nav-item:hover>.nav-link, [class*=sidebar-light-] .nav-sidebar>.nav-item>.nav-link:focus
  {
    background-color: #007bff;
    color: #fff;
  }
  </style>
  <aside class="main-sidebar sidebar-light-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= base_url() ?>Admin" class="brand-link">
      <img src="<?= base_url() ?>assets/img/logosipenture.png" alt="Sipenture Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text">Eliy's Furniture</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?= base_url() ?>assets/img/admin.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?= $this->session->userdata('nama') ?></a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

          <?php if ($this->session->userdata('akses')=="admin"){ ?>

          <li class="nav-item menu">
              <a href="<?= base_url() ?>Admin" class="nav-link <?= $this->session->userdata('dashboard') ?>">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Dashboard
                </p>
              </a>
            </li>
            <li class="nav-item menu-<?= $this->session->userdata('master') ?>">
              <a href="#" class="nav-link">
              <i class="nav-icon fas fa-solid fa-database"></i>
                <p>
                  Master
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <!-- <ul class="nav nav-treeview">
                <li class="nav-item">
                <a href="<?= base_url() ?>Admin/owner" class="nav-link <?= $this->session->userdata('owner') ?>" >
                  <i class="far fa-circle nav-icon"></i>
                  <p>Owner</p>
                </a>
                </li>
              </ul> -->
              <ul class="nav nav-treeview">
                <li class="nav-item">
                <a href="<?= base_url() ?>Admin/kategori" class="nav-link <?= $this->session->userdata('kategori') ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Kategori</p>
                </a>
                </li>
              </ul>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                <a href="<?= base_url() ?>Admin/produk" class="nav-link <?= $this->session->userdata('produk') ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Produk</p>
                </a>
                </li>
              </ul>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                <a href="<?= base_url() ?>Admin/customer" class="nav-link <?= $this->session->userdata('customer') ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Customer</p>
                </a>
                </li>
              </ul>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                <a href="<?= base_url() ?>Admin/supplier" class="nav-link  <?= $this->session->userdata('supplier') ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Supplier</p>
                </a>
                </li>
              </ul>
          </li>
          <?php } ?>

          <li class="nav-item menu-<?= $this->session->userdata('transaksi') ?>">
            <a href="#" class="nav-link">
            <i class="nav-icon fas fa-comments-dollar"></i>
              <p>
                Transaksi
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
              <a href="<?= base_url() ?>Admin/pembelian" class="nav-link <?= $this->session->userdata('pembelian') ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Pembelian</p>
              </a>
             </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
              <a href="<?= base_url() ?>Admin/penjualan" class="nav-link <?= $this->session->userdata('penjualan') ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Penjualan</p>
              </a>
             </li>
            </ul>
            
          </li>

          <li class="nav-item menu-<?= $this->session->userdata('laporan') ?>">
            <a href="#" class="nav-link">
            <i class="nav-icon fas fa-solid fa-file-powerpoint"></i>
              <p>
                Laporan
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <!-- <ul class="nav nav-treeview">
              <li class="nav-item">
              <a href="<?= base_url() ?>Admin/LaporanPenjualanOwner" class="nav-link <?= $this->session->userdata('laporan_penjualan_owner') ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Laporan Owner</p>
              </a>
             </li>
            </ul> -->
            <ul class="nav nav-treeview">
              <li class="nav-item">
              <a href="<?= base_url() ?>Admin/LaporanPenjualanRE" class="nav-link <?= $this->session->userdata('laporan_penjualan') ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Laporan Penjualan</p>
              </a>
             </li>
            </ul>
            <!-- <ul class="nav nav-treeview">
              <li class="nav-item">
              <a href="<?= base_url() ?>Admin/invoice" class="nav-link <?= $this->session->userdata('laporan pembelian') ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Laporan Pembelian</p>
              </a>
             </li>
            </ul> -->
            <ul class="nav nav-treeview">
              <li class="nav-item">
              <a href="<?= base_url() ?>Admin/LaporanAllSupplier" class="nav-link <?= $this->session->userdata('laporan_all_supplier') ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Laporan All Supplier</p>
              </a>
             </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
              <a href="<?= base_url() ?>Admin/LaporanPerSupplier" class="nav-link <?= $this->session->userdata('laporan_PER_supplier') ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Laporan Per Supplier</p>
              </a>
             </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
              <a href="<?= base_url() ?>Admin/LaporanPiutangPerTanggal" class="nav-link <?= $this->session->userdata('laporan_piutang') ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Laporan Piutang</p>
              </a>
             </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>