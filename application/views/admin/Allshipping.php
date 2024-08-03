
<div class="container-fluid pt-4 px-4">
    <div class="color-primary-bg text-center rounded p-4">
        <div class=" mb-2">
            <h2 class="mb-2">Orders</h2>
                <a class="btn btn-primary" href="<?php echo site_url('admin');?>"><i class="far fa-file-alt me-2"></i>Orders</a>
              <a class="btn btn-secondary" href="<?php echo site_url('admin/approved_Orders');?>"><i class="far fa-file-alt me-2"></i>Approved Orders</a>
        </div>
        <div class="table-responsive">
            <div class="table text-start table-hover mb-0">
            <table class="table text-center">
                <thead>
                    <tr class="th">
                        <th scope="col">Cart id</th>
                        <th scope="col">Customer id</th>
                        <th scope="col">Payment id</th>
                        <th scope="col">Status</th>
                        <th scope="col">Order total</th>
                        <th scope="col">Action</th>

                    </tr>
                </thead>
                <tbody>
                    <?php if($shipping): ?>
                    <?php foreach ($shipping as $row): ?>
                    <tr>
                        <td class="th" ><?php echo $row->cart_id ?></td>
                        <td class="th" ><?php echo $row->user_id ?></td>
                        <td class="th" ><?php echo $row->payment_id ?></td>
                        <td class="th" ><?php echo $row->actions ?></td>
                        <td class="th" ><?php echo $row->order_total ?></td>
                        <td>
                            <?php if($row->actions == 'Pending'): ?>
                             <a class='btn btn-primary' href="<?php echo site_url('admin/activate_Ord/'.$row->cart_details_id)?>">Deliver</a>
                             <?php else:?>
                             <a class='btn btn-secondary' href="<?php echo site_url('admin/deactivate_Ord/'.$row->cart_details_id)?>">Disapprove</a>
                             <?php endif; ?>

             


                             <a class='btn btn-success' href="<?php echo site_url('admin/shipping_details/'.$row->cart_details_id)?>">Details</a>

                            <a href="<?php echo site_url('admin/index/'.$row->cart_details_id).'.is.Deleted'?>" class="btn btn-danger delcart" data-id="<?php echo $row->cart_details_id; ?>" data-text="<?php echo $this->encryption->encrypt($row->cart_details_id) ?>"> Delete </a>
                        </td>
                    </tr>
                    <?php endforeach; ?> 
                </tbody>
                <tfoot>
                </tfoot>
                <?php echo $link; ?>
                <?php else: ?>
                <?php endif; ?>
            </table>   
            </div>
        </div>
    </div>
</div>