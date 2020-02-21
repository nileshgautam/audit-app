<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Client Administration
            <!-- <small>advanced tables</small> -->
        </h1>



        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">client</a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <!-- <h3 class="box-title">Client Administration</h3> -->
                        <a class="offset-9 btn btn-primary float-right" href="<?php echo base_url('Auditapp/client_registration_form'); ?>"> Add Client &nbsp;&nbsp;<i class="fa fa-plus-square" id="create-client" aria-hidden="true" title="Create Client"></i></a>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="client" class="table table-bordered table-hover dataTable">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>City</th>
                                    <th>Address</th>
                                    <th>Email</th>
                                    <th>Phone No.</th>
                                    <th>Gst No.</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($client_list)) {
                                    for ($i = 0; $i < count($client_list); $i++) {
                                        $c_name = $client_list[$i]['client_name'];
                                ?>
                                        <tr>
                                            <td id="<?php echo $c_name ?>"><?php echo $c_name ?></td>
                                            <td><?php echo $client_list[$i]['city'] ?>
                                            </td>
                                            <td><?php echo $client_list[$i]['address'] ?></td>
                                            <td><?php echo $client_list[$i]['email'] ?></td>
                                            <td><?php echo $client_list[$i]['contact_no'] ?></td>
                                            <td><?php echo $client_list[$i]['gst_number'] ?></td>
                                            <td>

                                                <a href="<?php echo base_url('Auditapp/edit_client/') . base64_encode($client_list[$i]['id']); ?>"> <i class=" fa fa-pencil" title="Edit"></i></a>

                                                <a title="Create Work Order" href="<?php echo base_url('Auditapp/choose_services/') . base64_encode($client_list[$i]['client_id']); ?>"> <img style="height:20px" src="<?php echo base_url('assets/dist/img') . "/workorder.png"; ?>" alt=""></a>

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