<div class="container-fluid pt-4 px-4">
    <div class="color-primary-bg text-center rounded p-4">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h2 class="mb-0">Products</h2>
            <a class="btn btn-success" href="<?php echo site_url('admin/newProduct');?>"><i class="fas fa-plus"></i>Add Product</a> 
        </div>
        <div class="table-responsive">
            <table class="table text-center table-hover mb-0">
                <thead>
                    <tr class="th">
                        <th scope="col">Status</th>
                        <th scope="col">ID</th>
                        <th scope="col">Category</th>
                        <th scope="col">Name</th>
                        <th scope="col">Image</th>
                        <th scope="col">Price</th>
                        <th scope="col">On sale</th>
                        <th scope="col">New price</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Action</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php if($product1): ?>
                    <?php foreach ($product1 as $row): ?>
                    <tr>
                        <td class="th" ><?php echo $row->status ?></td>
                        <td class="th" ><?php echo $row->id ?></td>
                        <td class="th" ><?php echo $row->categories_id ?></td>
                        <td class="th" width="10"><?php echo $row->name ?></td>
                        <td class="th" ><img src="<?php echo base_url('assets/images/products/'.$row->image) ?>" style="width: 30%;height: 30%;"></td>
                        <td class="th" >P<?php echo $row->price ?></td>
                        <td class="th" ><?php echo $row->sale ?></td>
                        <td class="th" >P<?php echo $row->last_price ?></td>
                        <td class="th" ><?php echo $row->qty ?></td>
                         <td style="width:300px">
                            <?php if($row->status > 0): ?>
                                 <a class='btn btn-secondary' href="<?php echo site_url('admin/deactprod/'.$row->id)?>">Deactivate</a>
                            <?php else:?>
                                <a class='btn btn-primary' href="<?php echo site_url('admin/actprod/'.$row->id)?>">Activate</a>
                            <?php endif; ?>

                            <a class='btn btn-success' href="<?php echo site_url('admin/editprod/'.$row->id)?>">Edit</a>

                            <a href="<?php echo site_url('admin/product/'.$row->name).'.is.Deleted'?>" class="btn btn-danger delprod" data-id="<?php echo $row->id; ?>" data-text="<?php echo $this->encryption->encrypt($row->id) ?>"> Delete </a>
                        </td>
                    </tr>
                    <?php endforeach; ?> 
                <?php echo $link; ?>
                <?php else: ?>
                <?php endif; ?>
                </tbody>  
            </table>
        </div>
    </div>
</div>