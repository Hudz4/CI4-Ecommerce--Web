
<body>

<style type="text/css">
    
    #floater {
/*    background-color: var(--secondary);*/
    color: white;
    position: fixed;
    top: 110px;
    height: 100px;
    left: 0;
    width: 100px;
    }


</style>

    <nav class="navbar navbar-expand navbar-dark sticky-top shadow-lg" style="background-color:#231F20;">
        <a class="nav-link " style=" justify-content: center;" href="<?php echo base_url('home') ?>"></i><span class=" "><img src="<?php echo base_url('assets/TH logo.png') ?>" style="height: 30px;width: 100px;"></a>
        <?php if($category1): ?>
          <?php foreach ($category1 as $list): ?>
             <a class="nav-link font-montse text-center" style=" justify-content: center;" href="<?php echo site_url('home/cateprod/'.$list->cat_id)?>"></i><span class="d-none d-lg-inline-flex"><?php echo $list->category?></a>
            <?php endforeach; ?>
          <?php else: ?>
        <?php endif; ?>
        <div class="navbar-nav align-items-center ms-auto">

            <!-- if user is logged in lods -->
            <?php if($this->session->userdata('id')): ?>
            <?php foreach($results as $row ) :?>
            <div class="nav-item dropdown">
                <a href="<?php echo site_url('chat') ?>" class="nav-link" >
                    <i class='fas fa-comments me-lg-2' style='font-size:22px'></i>
                </a>
            </div>
            <div class="nav-item dropdown">
                 <a href="<?php echo site_url('home/cart') ?>" class="nav-link" >
                    <i class="fa fa-shopping-cart me-lg-2" ></i>
                    <?php if ($count): ?>
                     <span class="font-size-16 text-white d-none d-lg-inline-flex"><?php echo $count ?></span>
                     <?php endif; ?>
                </a>
            </div>
            <div class="x`nav-item dropdown">
                <a href="" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                    <img class="rounded-circle me-lg-2" src="<?php echo base_url('assets/images/users/'.$row->image); ?>" alt="" style="width: 40px; height: 40px;">
                    <span class="d-none d-lg-inline-flex"><?php echo $row->name ?></span>
                </a>
                <div class="dropdown-menu dropdown-menu-end border-0 rounded-0 rounded-bottom m-0" style="background-color:#231F20">
                    <a href="<?php echo base_url('home/profile'); ?>" class="dropdown-item">Profile</a>
                    <a href="<?php echo base_url('home/Signout');?>" class="dropdown-item">Log Out</a>
                </div>
 
            </div>
            <?php endforeach; ?>

            <!-- if user is logged out lods -->
            <?php else:  ?>
            <div class="nav-item dropdown">
                 <a href="#" class="nav-link" data-bs-toggle="dropdown">
                    <i class="fa fa-shopping-cart me-lg-2" ></i>
                     <span class="font-size-16 text-white d-none d-lg-inline-flex"></span>
                </a>
            </div>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                    <img class="rounded-circle me-lg-2" src="<?php echo base_url('assets/user.png') ?>" alt="" style="width: 40px; height: 40px;">
                    <span class="d-none d-lg-inline-flex">Account</span>
                </a>
                <div class="dropdown-menu dropdown-menu-end border-0 rounded-0 rounded-bottom m-0" style="background-color:#231F20">
                    <a href="<?php echo base_url('home/Signup'); ?>" class="dropdown-item">Sign up</a>
                    <a href="<?php echo base_url('home/Signin'); ?>" class="dropdown-item">Sign in</a>
                </div>
            </div>
            <?php endif; ?>
        </div>
      </nav>
      <div class="col-md-6" id="floater">
        <div class="row">
        <div class="d-flex align-items-center justify-content-center">
            <a href="<?php echo base_url('home/flash_sale') ?>"><img class="img-fluid " href="sdds" style=" padding-right:50px;" src="<?php echo base_url('assets/side.png') ?>"></a>
        </div>
        </div>

      </div>
