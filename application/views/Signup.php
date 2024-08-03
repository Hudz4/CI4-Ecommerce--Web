
<style type="text/css">
    label{
        color: grey;
        padding: 5px;
    }
    .form-control{
        width: 100%;
    }
    .jcrop-holder div {
      -webkit-border-radius: 50% !important;
      -moz-border-radius: 50% !important;
      border-radius: 50% !important;
      margin: -1px;
    }
</style>

<div class="container-fluid position-relative d-flex p-0" style="background-color:var(--secondary);">
    <div id="spinner" class="show position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center" >
          <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status" >
              <span class="sr-only" >Loading...</span>
          </div>
      </div>
    <!-- Sign Up Start -->
    <div class="container-fluid ">
        <div class="row h-100 align-items-center justify-content-center "style="min-height: 100vh;">
            <div class="col-12 col-sm-6 " >
                <div class="rounded p-4 p-sm-5 my-4 mx-3 shadow-lg" style="background-color:white;">
                    <a href="<?php echo base_url('home') ?>" class=" mt-2">Go back to Homepage</a>
                    <div class="row">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h2 class="text-center " style="color:var(--secondary);">Sign up Form</h2>
                             <img class="img-fluid"  src="" style="color:grey;">Image
                        </div>
                        <?php echo form_open_multipart('create/adduser','','') ?>
                        <div class="form">
                            <label for="floatingText">Name</label>
                             <?php echo form_input('name','',array('placeholder'=>'','class'=>'form-control','required'=>'required','id'=>'floatingText')); ?>
                        </div>
                        <div class="form ">
                            <label for="floatingText">Username</label>
                             <?php echo form_input('username','',array('placeholder'=>'','class'=>'form-control','required'=>'required','id'=>'floatingText')); ?>
                        </div>
                        <div class="form ">
                            <label for="floatingInput">Email address (name@example.com) </label>
                            <?php echo form_input('email','',array('placeholder'=>'','class'=>'form-control','required'=>'required','id'=>'floatingInput')); ?>
                        </div>
                        <div class="form  ">
                            <label for="floatingPassword">Password</label>
                            <?php echo form_password('password','',array('placeholder'=>'Password','class'=>'form-control','required'=>'required','id'=>'floatingPassword')); ?>
                        </div>
                        <div class="form -group mb-4">
                            <label class="text " for="floatingImg">Profile picture ( Image should be 1 : 1 ratio) </label>
                            <?php echo form_upload('image','','type="file" class="form-control" id="image"'); ?>
                        </div>
                        <div class='file-path-wrapper'>
                            <?php echo form_hidden('path','image','type="file" id="path" class="file-path validate"') ?>
                        </div>
                        <div class="form-group mb-4 text-center">
                            <div class="d-flex align-items-center justify-content-center mt-4">
                                <div style='overflow: hidden;' class='row'>
                                    <div class='col s12'>
                                        <img src="" class="crop" id="dp_preview" />
                                        <input type="hidden" id="x" name="x" />
                                        <input type="hidden" id="y" name="y" />
                                        <input type="hidden" name="x2" id="x2" />
                                        <input type="hidden" name="y2" id="y2" />
                                        <input type="hidden" id="w" name="w" />
                                        <input type="hidden" id="h" name="h" />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex align-items-center justify-content-center mb-2">
                            <h2 style="color:var(--secondary);">  Shipping Address </h2>
                        </div>

                        <div class="form ">
                            <label for="floatingText">Email for Shipping</label>
                             <?php echo form_input('email','',array('placeholder'=>' ','class'=>'form-control','required'=>'required','id'=>'floatingText')); ?>
                        </div>

                        <div class="form ">
                            <label for="floatingText">Street / Village</label>
                             <?php echo form_input('street','',array('placeholder'=>' ','class'=>'form-control','required'=>'required','id'=>'floatingText')); ?>
                        </div>
                        <div class="form ">
                            <label for="floatingText">City</label>
                             <?php echo form_input('city','',array('placeholder'=>' ','class'=>'form-control','required'=>'required','id'=>'floatingText')); ?>
                        </div>
                        <div class="form ">
                            <label for="floatingText">Region / State</label>
                             <?php echo form_input('region','',array('placeholder'=>' ','class'=>'form-control','required'=>'required','id'=>'floatingText')); ?>
                        </div>
                        <div class="form ">
                            <label for="floatingText">Country</label>
                             <?php echo form_input('country','',array('placeholder'=>' ','class'=>'form-control','required'=>'required','id'=>'floatingText')); ?>
                        </div>
                        <div class="form ">
                            <label for="floatingText">Phone number</label>
                             <?php echo form_input('phone','',array('placeholder'=>' ','class'=>'form-control','required'=>'required','id'=>'floatingText')); ?>
                        </div>
                        <div class="form  mb-4">
                            <label for="floatingText">Zipcode</label>
                             <?php echo form_input('zipcode','',array('placeholder'=>' ','class'=>'form-control','required'=>'required','id'=>'floatingText')); ?>
                        </div>
 
                        <?php echo form_submit('Sign up','Sign up','href="" onclick="myFunction()" class="btn btn-success py-3 w-100 mb-4"','style="background-color: var(--primary);"');
                        ?>
                        <p class="text-center mb-4" style="color:var(--seconndary);">Already have an Account? <a href="<?php echo base_url('home/Signin') ?>">Sign In</a></p>
                    <?php echo form_close(); ?>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>