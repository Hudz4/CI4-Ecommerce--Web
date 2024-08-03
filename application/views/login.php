<div class="container-fluid position-relative d-flex p-0" style=" background-color: ghostwhite;">
        <div id="spinner" class="show bg-light position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center" >
              <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status" >
                  <span class="sr-only" >Loading...</span>
              </div>
          </div>

        <div class="container-fluid ">
            <div class="row h-100 align-items-center justify-content-center "style="min-height: 100vh;background-color: var(--primary);">
                <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4 ">
                    <div class="rounded p-4 p-sm-5 my-4 mx-3 shadow-lg  " style="background-color:white">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <a href="<?php echo base_url('home') ?>" class="mb-2">Go back to Homepage</a>
                        </div>
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <a href="index.html" class="">
                                <h3 class="text-primary font-montse"  ><i class="fa fa-user-edit me-2 "></i>thriftHub</h3>
                            </a>
                            <h3 class="text ">Sign In</h3>
                        </div>
                        <?php echo form_open_multipart('login/checkuser','','') ?>
                        <div class="form-floating mb-3">
                             <?php echo form_input('username','',array('class'=>'form-control','required'=>'required','id'=>'floatingText')); ?>
                             <label for="floatingText">Username</label>
                        </div>
                        <div class="form-floating mb-4">
                            <?php echo form_password('password','',array('placeholder'=>'','class'=>'form-control','required'=>'required','id'=>'floatingPassword')); ?>
                            <label for="floatingPassword">Password</label>
                        </div>
                        <div class="d-flex align-items-center justify-content-between mb-4">
 
                            <a href="">Forgot Password</a>
                        </div>

                        <?php echo form_submit('Sign in','Sign in','href="" class="btn btn-success py-3 w-100 mb-4 font-montse" style="background-color: var(--primary);color:white" ');

                        ?>
                        <p class="text-center mb-0" style=" color:var(--secondary);">Don't have an Account? <a href="<?php echo base_url('home/Signup') ?>">Sign up</a></p>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
    </div>