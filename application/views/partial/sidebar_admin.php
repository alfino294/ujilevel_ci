   <!-- Sidebar -->
   <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
  <div class="sidebar-brand-icon rotate-n-15">
  <i class="fas fa-utensils"></i>
  </div>
  <div class="sidebar-brand-text mx-3">  Starbhak Mart</div>
</a>

<!-- Divider -->
<hr class="sidebar-divider">

<div class="sidebar-heading">
Dashboard
</div>

<!-- Nav Item - Dashboard -->
<li class="nav-item">
<a class="nav-link" href="<?php echo site_url('dashboard/homeadmin');?>">
<i class="fas fa-fw fa-database"></i>
<span>Data Pemesanan</span></a>
</li>

<li class="nav-item">
<a class="nav-link" href="<?php echo site_url('dashboard/datatransaksi');?>">
<i class="fas fa-fw fa-database"></i>
<span>Data Transaksi</span></a>
</li>

<li class="nav-item ">
<a class="nav-link" href="<?php echo site_url('dashboard/daftarmakanan');?>">
<i class="fas fa-fw fa-database"></i>
<span>Daftar Masakan</span></a>
</li>



<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
Account
</div>

<!-- Nav Item - Tables -->
<li class="nav-item">
<a class="nav-link" data-toggle="modal" data-target="#logoutModal">
<i class="fa fa-minus-circle"></i>
<span>Sign Out</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->