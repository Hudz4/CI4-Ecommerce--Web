<section id="cart" class="  my-5 ">
    <div class="container-fluid h-100 w-75">
        <h5 class="font-Montse font-size-20">Shopping Cart (<?php echo $count ?>)</h5>
        <?php echo $link; ?>
        <div class="row">
            <div class="col-sm-9 ">
            <?php echo form_open_multipart('home/cartOption','','') ?>
            <?php if($usercart):?>
            <?php
            $grand_total = 0; 
            foreach($usercart->result() as $row):
                $user=$this->session->userdata('id');
                $id = $row->product_id;
                $total = $row->price * $row->quantity;
                $grand_total = $total + $grand_total;
            ?>
                <div class="row border-top py-3 mt-6">
                <?php echo form_hidden('cart_details_id',$row->id); ?>
                <?php echo form_hidden('pid',$id); ?>
                    <div class="col-sm-2">
                        <img src="<?php echo base_url('assets/images/products/'.$row->image) ?>" style="height: 120px;" alt="cart1" class="img-fluid">
                    </div>
                    <div class="col-sm-7">
                        <h5 class="font-Montse font-size-20" style="color: var(--secondary);"><strong><?php echo $row->name ?></strong></h5>
                        <small class="font-Montse font-size-12"></small>
                        <div class="d-flex">
                            <div class="rating text-warning font-size-12">
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="far fa-star"></i></span>
                            </div>
                            <a href="#" class="px-2 font-rale font-size-14">20,534 ratings</a>
                        </div>


                        <div class="qty d-flex ">
                            <div class="md-5">
                                <input type="hidden" name="cart_id" value="<?php echo $row->id ?>">
                                <div class="py-3">
                                <div class="label font-Montse">Quantity</div>
                                <?php echo form_input('qid',$row->quantity,'class="form-control"','type="number"','style="width:500px"'); ?>
                                </div>
                                <?php echo form_submit('updatequantity','updatequantity','href="admin/updatequantity" onclick="myFunction()" class="btn btn-success"');
                                ?>
                                <a href="<?php echo site_url('home/deleteitem/'.$row->id).'.is.Deleted'?>" class="btn btn-secondary del_item" data-id="<?php echo $row->id; ?>" data-text="<?php echo $this->encryption->encrypt($row->id) ?>" onclick="return confirm('remove item from cart?');">Delete</a>

                                <?php echo form_submit('singleCheckout','Checkout',' onclick="myFunction()" class="btn btn-danger"');?>

                                <?php 
                                  $PaymentOptions = array();
                                  foreach ($paymOpt->result() as $payment) {
                                    $PaymentOptions[$payment->payment_id]=$payment->payment_type;
                                    
                                  }
                                  echo form_dropdown('payment',$PaymentOptions,'','class=""');
                                  ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-2 text">
                        <div class="font-size-18  font-Montse text-danger">
                            <strong>
                            <?php echo form_hidden('total',$total,'class="form-label"'); ?>
                            <span class="text-danger" data-id="">P <?php echo $this->cart->format_number($total) ?></span>
                            </strong>

                        </div>
                        <div class="col">
                            <span class="font-size-12 font-Montse" style ="color: var(--dark);"> Price : P <?php echo $this->cart->format_number($row->price) ?> </span>
                        </div>
                    </div>
                </div>
                 <?php endforeach; ?>
                <?php else:?>
                <?php endif; ?>
               <?php echo form_close(); ?>
            </div>

     
            <div class="col-sm-3">
                <div class="sub-total border text-center mt-2">
                    <h6 class="font-size-10 font-Montse  text-success py-3"><i class="fas fa-check"></i> Your order is eligible for FREE Delivery.</h6>
                    <span class="font-montse font-size-20"><strong>Grandtotal :</strong></span>
                    <div class="border-top py-3">
                        <?php echo form_hidden('grandtotal',$grand_total,'class="form-label"'); ?>
                        <?php if($grandtotal): ?>
                        <span class="text "><h3><strong>P <?php echo $this->cart->format_number($grandtotal) ?></strong></h3></span>
                        <?php endif; ?>
                    </div>
                    <div class="my-2 ">
                        <button id="myBtn" class="btn btn-secondary  ">Proceed All Checkout</button>
                        <?php echo form_open_multipart('home/allcheckout','','') ?>
                        <?php foreach($usercart->result() as $row): 

                            $total = $row->price * $row->quantity;
                            ?>
                        <?php echo form_hidden('cart_details_id[]',$row->id); ?>
                        <?php echo form_hidden('total[]',$total); ?>
                        <?php echo form_hidden('pid[]',$row->product_id); ?>
                            <div id="myModal" class="modal">
                              <!-- Modal content -->
                              <div class="modal-content">
                                <div class="modal-header">
                                  <span class="close">&times;</span>
                                  <text class='text'><h4 class="">Payment Option</h4></text>
                                </div>
                                <div class="modal-body">
                                  <p>Please select type of payment</p>
                                  <p>
                                      <?php 
                                      $PaymentOptions = array();
                                      foreach ($paymOpt->result() as $payment) {
                                        $PaymentOptions[$payment->payment_id]=$payment->payment_type;
                                        
                                      }
                                      echo form_dropdown('payment[]',$PaymentOptions,'','class="form-control"');
                                      ?>
                                  </p>
                                </div>
                                <div class="modal-footer">
                                  <?php echo form_submit('Checkout','Checkout','class="btn btn-secondary"') ?>
                                </div>
                              </div>
                            </div>
                        <?php endforeach; ?>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
