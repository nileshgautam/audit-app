<!-- <div class="container mt-30">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row m-0 p-0">
                <h6 class="m-0 font-weight-bold text-primary col-sm-11">Client Administration</h6>
                <div>
                   <a href="<?php echo base_url('Auditapp/client_registration_form'); ?>"> <i class="fa fa-plus-square" id="create-client" aria-hidden="true" title="Create Client"></i></a>
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
                            <th class="">Location</th>
                            <!-- <th class="">SPOC</th> 
                            <th class="" style="text-align: center">Action</th>
                        </tr>
                    </thead>
                    <tbody id="client_list">
                        <?php
                        if (!empty($client_list)) {

                            for ($i = 0; $i < count($client_list); $i++) {
                        ?>
                                <tr>
                                    <td class="as-44"><?php echo $i + 1 ?></td>
                                    <td class=""><a href="<?php echo base_url('Auditapp/comp_dashboard/' . $client_list[$i]['id']) ?>"><?php echo $client_list[$i]['client_name'] ?></td>
                                    <td class=""><?php echo $client_list[$i]['city'] ?></td>
                                    <!-- <td class=""><?php echo $client_list[$i]['city'] ?></td>
                                    <td class="as-44">
                                        <div class="administration">
                                            <div><a href="#"> <i class="fas fa-edit" title="Edit"></i></a></div>
                                            <div><a href="#"> <i class="fa fa-trash text-danger" aria-hidden="true" title="Delete"></i></a></div>
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
</div> -->

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
                        <h3 class="box-title">Client Administration</h3>
                        <a class="offset-9" href="<?php echo base_url('Auditapp/client_registration_form'); ?>"> <i class="fa fa-plus-square" id="create-client" aria-hidden="true" title="Create Client"></i></a>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="client" class="table table-bordered table-hover dataTable">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Location</th>
                                    <th>Action</th>
                                  
                                </tr>
                            </thead>
                            <tbody>
                            <?php if (!empty($client_list)) {
                            for ($i = 0; $i < count($client_list); $i++) { ?>
                                <tr>
                                    <td><?php echo $client_list[$i]['client_name'] ?></td>
                                    <td><?php echo $client_list[$i]['city'] ?>
                                    </td>
                               
                                    <td> 
                                  
                                          <a href="#"> <i class="fas fa-pencil" title="Edit"></i></a>
                                            <a href="#"> <i class="fa fa-trash text-danger" aria-hidden="true" title="Delete"></i></a>
                                     
                                    </td>
                    
                                </tr>
                            <?php }} ?>
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
