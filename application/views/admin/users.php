<div class="container-fluid pt-4 px-4">
    <div class="color-primary-bg text-center rounded p-4">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h2 class="mb-0">Accounts</h2>
        </div>
        <div class="table-responsive">
            <table class="table text-center table-hover mb-0">
                <thead>
                    <tr class="th">
                        <th scope="col">Status</th>
                        <th scope="col">Chat</th>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Image</th>
                        <th scope="col">Email</th>
                        <th scope="col">Date</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if($users): ?>
                    <?php foreach ($users as $row): ?>
                    <tr>
                        <td class="th" ><?php echo $row->status ?></td>
                        <td><?php echo form_open_multipart('admin/chat_backend','','') ?>
                             <?php echo form_hidden('uid',$row->id); ?>
                             <?php echo form_submit('submit','Message','class="btn btn-success"') ?>
                             <?php echo form_close(); ?></td>
                        <td class="th" ><?php echo $row->id ?></td>
                        <td class="th" ><?php echo $row->name ?></td>
                        <td class="th" ><img src="<?php echo base_url('assets/images/users/'.$row->image) ?>" style="width: 30%;height: 30%;"></td>
                        <td class="th" >P<?php echo $row->email ?></td>
                        <td><?php echo $row->date ?></td>
                        <td  style="width:300px">
                            <?php if($row->status > 0): ?>
                                 <a class='btn btn-secondary' href="<?php echo site_url('admin/deactuser/'.$row->id)?>">Block</a>
                            <?php else:?>
                                <a class='btn btn-primary' href="<?php echo site_url('admin/actuser/'.$row->id)?>">Unblock</a>
                            <?php endif; ?>


                            <a href="<?php echo site_url('admin/users/'.$row->name).'.is.Deleted'?>" class="btn btn-danger deluser" data-id="<?php echo $row->id; ?>" data-text="<?php echo $this->encryption->encrypt($row->id) ?>"> Delete </a>
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