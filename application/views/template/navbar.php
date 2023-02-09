<nav class="main-header navbar navbar-expand navbar-primary navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <!-- <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li> -->
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">

          <i class="far fa-user"> <?php echo $this->session->userdata('nama'); ?></i>
        </a>
        <div class="dropdown-menu dropdown-menu-md dropdown-menu-right">
          <?php if($this->session->userdata('akses')=="admin"){ ?>
          <div class="dropdown-divider"></div>
          <a href="<?php echo base_url('Admin/profil');?>" class="dropdown-item">
            <i class="fas fa-user mr-2"></i> &nbspLihat Profil
          </a>
        <?php } ?>
          <div class="dropdown-divider"></div>
          <a href="<?php echo base_url('Auth/logout');?>" class="dropdown-item">
            <i class="fas fa-sign-out-alt mr-2"></i> Keluar
          </a>
        </div>
      </li>
      <!-- <li class="nav-item">
        <a href="<?php echo base_url('Auth/logout');?>" class="nav-link"><i class="fa fa-sign-out-alt"> Logout</i></a>
      </li> -->

      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
    </ul>
  </nav>