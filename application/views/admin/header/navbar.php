
<body style="background-color: #231F20;">
 
    <div id="spinner" class="show  position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
 
<div class="container-fluid position-relative d-flex p-0">
  <div class="sidebar pe-4 pb-3 shadow-lg">
      <nav class="navbar  ">
          <a href="<?php echo base_url('admin/index'); ?>" class="navbar-brand mx-4 mb-3"  >
             <img src="<?php echo base_url('assets/TH logo.png') ?>" style="height: 40px;width: 130px;">
          </a>
          <div class="d-flex align-items-center ms-4 mb-4" >
              <div class="position-relative">
                  <img class="rounded-circle" src="<?php echo base_url('assets/wow.png') ?>" alt="" style="width: 40px; height: 40px;">
                  <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
              </div>
              <div class="ms-3" >
                  <h6 class="mb-0"  style="color:white;">User</h6>
                  <span style="color:var(--primary);">Admin</span>
              </div>
          </div>
          <div class="navbar-nav w-100">
              <a href="<?php echo base_url('admin/index');?>" class="nav-item nav-link"><i class="fa fa-table me-2"></i>Orders Section</a>
              <a href="<?php echo base_url('admin/banner');?>" class="nav-item nav-link"><i class="fa fa-table me-2"></i>Banner Section</a>
              <a href="<?php echo base_url('admin/category');?>" class="nav-item nav-link"><i class="fa fa-table me-2"></i>Category Section</a>
              <a href="<?php echo base_url('admin/product');?>" class="nav-item nav-link "><i class="fa fa-table me-2"></i>Product Section</a>
              <a href="<?php echo base_url('admin/users');?>" class="nav-item nav-link"><i class="fa fa-user-edit me-2"></i>Account Section</a>
       
         
          </div>
      </nav>
  </div>

  <!-- Navbar Start -->
  <div class="content">
      <nav class="navbar navbar-expand navbar-dark sticky-top px-4 py-0 shadow-sm" style="background-color:#231F20;">
          <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
              <h2 class="text-primary mb-0"><i class="fa fa-user-edit"></i></h2>
          </a>
          <div class="navbar-nav align-items-center ms-auto">
              <div class="nav-item dropdown">
                  <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                      <img class="rounded-circle me-lg-2" src="<?php echo base_url('assets/wow.png') ?>" alt="" style="width: 40px; height: 40px;">
                      <span class="d-none d-lg-inline-flex">Admin</span>
                  </a>
                  <div class="dropdown-menu dropdown-menu-end border-0 rounded-0 rounded-bottom m-0" style="background-color: #231F20;">
                      <!-- <a href="#" class="dropdown-item">My Profile</a>
                      <a href="#" class="dropdown-item">Settings</a> -->
                      <a href="<?php echo base_url('admin/logout');?>" class="dropdown-item">Log Out</a>
                  </div>
              </div>
          </div>
      </nav>
      <!-- Navbar End -->
      
