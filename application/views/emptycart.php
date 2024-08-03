<section id="cart" class="py-3 my-5  ">
    <div class="container-fluid w-75 h-100">
        <h5 class="font-Montse font-size-20">Shopping Cart</h5>

        <div class="row">
            <div class="col-sm-9 ">
                
             <h5 class="border-top mt-3 py-3">Your cart is empty...</h5>
            </div>
     
            <div class="col-sm-3">
                <div class="sub-total border text-center mt-2">
                    <h6 class="font-size-10 font-Montse  text-success py-3"><i class="fas fa-check"></i> Your order is eligible for FREE Delivery.</h6>
                    <span class="font-montse font-size-20"><strong>Grandtotal :</strong></span>
                    <div class="border-top py-3">
                        
                        <span class="text "><h3><strong></strong></h3></span>
                    </div>
                    <div class="my-2 ">
                    <button id="myBtn" class="btn btn-secondary  ">Proceed Checkout</button>

 
                    <div id="myModal" class="modal">
                      <!-- Modal content -->
                      <div class="modal-content">
                        <div class="modal-header">
                          <span class="close">&times;</span>
                          <text class='text'><h4 class="">Payment Option</h4></text>
                        </div>
                        <div class="modal-body">
                          <p>Please add item</p>
                           
                        </div>

                        <div class="modal-footer">
                          
                        </div>
                    
                      </div>

                    </div>
                    <?php echo form_close(); ?>

                    </div>
                </div>
        
            </div>
        </div>
    </div>
</section>

