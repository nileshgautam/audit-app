<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Users Administration
            <!-- <small>advanced tables</small> -->
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Users</a></li>

        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <!-- <h3 class="box-title">Users Administration</h3> -->
                        <a class="offset-9 btn btn-primary float-right" href="<?php echo base_url('Auditapp/user_view'); ?>"> Add Users <i class="fa fa-plus-square" id="create-client" aria-hidden="true" title="Create new user"></i></a>
                        <!-- <a class="offset-9" href="<?php echo base_url('Auditapp/user_view'); ?>"> <i class="fa fa-plus-square" id="create-client" aria-hidden="true" title="Create new user"></i></a> -->
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="client" class="table table-bordered table-hover dataTable">
                            <thead>
                                <tr>
                                    <th class="">#</th>
                                    <th class="">Name</th>
                                    <!-- <th class="">Company Name</th> -->
                                    <th class="">Role</th>
                                    <th class="" style="text-align: center">Action</th>
                                </tr>
                            </thead>
                            <tbody id="users">
                                <?php
                                if (!empty($users)) {

                                    for ($i = 0; $i < count($users); $i++) {
                                ?>
                                        <tr>
                                            <td class=""><?php echo $i + 1 ?></td>
                                            <td class=""><?php echo $users[$i]['first_name'] . " " . $users[$i]['last_name'] ?></td>
                                            <!-- <td class=""><?php echo $users[$i]['client_name'] ?></td> -->
                                            <td class=""><?php echo $users[$i]['role'] ?></td>
                                            <td class="">

                                                <a href="<?php echo base_url('Auditapp/edit_user/') . $users[$i]['id']; ?>"> <i class="fa fa-edit" title="Edit"></i></a>
                                                <a href="<?php echo base_url('Auditapp/delete_user/') . $users[$i]['id']; ?>"> <i class="fa fa-trash text-danger" aria-hidden="true" title="Delete"></i></a>

                                            </td>
                                        </tr>
                                <?php }
                                } ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->