<div class="container mt-30">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row m-0 p-0">
                <h6 class="m-0 font-weight-bold text-primary col-sm-11">User Administration</h6>
                <div>
                   <a href="<?php echo base_url('Auditapp/user_view');?>"> <i class="fa fa-plus-square" id="create-client" aria-hidden="true" title="Create Client"></i></a>
                </div>
            </div>
        </div>
        <div class="card-body ">
            <div class="table-responsive">
                <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="">#</th>
                            <th class="">Name</th>
                            <th class="">Company Name</th>
                            <th class="">Role</th>
                            <th class="">Action</th>
                        </tr>
                    </thead>
                    <tbody id="users">
                        <?php
                        if (!empty($users)) {

                            for ($i = 0; $i < count($users); $i++) {
                        ?>
                                <tr>
                                    <td class="as-44"><?php echo $i + 1 ?></td>
                                    <td class=""><?php echo $users[$i]['user_first_name']." ".$users[$i]['user_last_name'] ?></td>
                                    <td class=""><?php echo $users[$i]['client_name']?></td>
                                    <td class=""><?php echo $users[$i]['role'] ?></td>
                                    <td class="as-44">
                                        <div class="administration">
                                            <div><a href="<?php echo base_url('Auditapp/edit_user/') . $users[$i]['id']; ?>"> <i class="fas fa-edit" title="Edit"></i></a></div>
                                            <div><a href="<?php echo base_url('Auditapp/delete_user/') . $users[$i]['id']; ?>"> <i class="fa fa-trash text-danger" aria-hidden="true" title="Delete"></i></a></div>
                                        </div>
                                    </td>
                                </tr>
                        <?php }
                        } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('.dataTable').DataTable();
    });
</script>