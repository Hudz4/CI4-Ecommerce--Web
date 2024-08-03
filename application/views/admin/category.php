
<div class="container-fluid pt-4 px-4">
    <div class="color-primary-bg text-center rounded p-4">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h2 class="mb-0">Categories</h2>
            <h6 class="mb-0">You can only display 4 categories</h6>
            <a class="btn btn-success" href="<?php echo site_url('admin/newCategory');?>"><i class="fas fa-plus"></i>Add Category</a> 
        </div>
        <div class="table-responsive">
            <div class="table text-start mb-0">
            <table class="table table-hover text-center">
                <thead>
                    <tr class="th">
                        <th scope="col">Status</th>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Action</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php if($category1): ?>
                    <?php foreach ($category1 as $row): ?>
                    <tr>
                        <td class="th" ><?php echo $row->status ?></td>
                        <td class="th" ><?php echo $row->cat_id ?></td>
                        <td class="th" ><?php echo $row->category ?></td>

                        <td>
                            <?php if($row->status > 0): ?>
                                 <a class='btn btn-secondary' href="<?php echo site_url('admin/deactcat/'.$row->cat_id)?>">Deactivate</a>
                            <?php else:?>
                                <a class='btn btn-primary' href="<?php echo site_url('admin/actcat/'.$row->cat_id)?>">Activate</a>
                            <?php endif; ?>

                            <a class='btn btn-success' href="<?php echo site_url('admin/editcategory/'.$row->cat_id)?>">Edit</a>

                            <a href="<?php echo site_url('admin/category/'.$row->category).'.is.Deleted'?>" class="btn btn-danger delcat" data-id="<?php echo $row->cat_id; ?>" data-text="<?php echo $this->encryption->encrypt($row->cat_id) ?>"> Delete </a>
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