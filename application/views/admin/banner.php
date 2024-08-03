

    <div class="container-fluid pt-4 px-4">
        <div class="color-primary-bg text-center rounded p-4">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h2 class="mb-0">Banners</h2>
                <a class="btn btn-success" href="<?php echo site_url('admin/newBanner');?>"><i class="fas fa-plus"></i>Add Banner</a> 
            </div>
            <div class="table-responsive">
                <div class="table text-start ">
                <table class="table table-hover text-center">
                    <thead>
                        <tr class="th">
                            <th scope="col">Status</th>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Image</th>
                            <th scope="col">Action</th> 
                        </tr>
                    </thead>
                    <tbody>
                        <?php if($banner1): ?>
                        <?php
                        foreach ($banner1 as $row): ?>
                        <tr>
                            <td class="th" ><?php echo $row->status ?></td>
                            <td class="th" ><?php echo $row->banner_id ?></td>
                            <td class="th" ><?php echo $row->bName ?></td>
                            <td class="th" ><img src="<?php echo base_url('assets/images/banners/'.$row->image) ?>" style="width: 400;height: 200;"></td>

                            <td>
                                <?php if($row->status > 0): ?>
                                     <a class='btn btn-secondary' href="<?php echo site_url('admin/deactban/'.$row->banner_id)?>">Deactivate</a>
                                <?php else:?>
                                    <a class='btn btn-primary' href="<?php echo site_url('admin/actban/'.$row->banner_id)?>">Activate</a>
                                <?php endif; ?>

                                <a class='btn btn-success' href="<?php echo site_url('admin/editban/'.$row->banner_id)?>">Edit</a>

                                <a href="<?php echo site_url('admin/banner/'.$row->bName).'.is.Deleted'?>" class="btn btn-danger delban" data-id="<?php echo $row->banner_id; ?>" data-text="<?php echo $this->encryption->encrypt($row->banner_id) ?>"> Delete </a>
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
    </div>