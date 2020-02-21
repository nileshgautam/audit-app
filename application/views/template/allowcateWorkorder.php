<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Work Order Administration
            <!-- <small>advanced tables</small> -->
        </h1>
      
        <?php
              if ($this->session->flashdata('success')) {
                ?>
               <div class="row">
                 <div class="" align="center" style="color:green;">
                   <?php echo $this->session->flashdata('success'); ?>
                 </div>
               </div>
               <br>
             <?php
              }
              ?>

             <?php
              if ($this->session->flashdata('error')) {
                ?>
               <div class="row">
                 <div class="" align="center" style="color:red;">
                   <?php echo $this->session->flashdata('error'); ?>
                 </div>
               </div>
               <br>
             <?php
              }
              ?>
        
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
            <li><a href="#">Work Order</a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <!-- <h3 class="box-title">Client Administration</h3> -->
                        <!-- <a class="offset-9 btn btn-primary float-right" href="<?php echo base_url('Auditapp/client_registration_form'); ?>"> Add Client <i class="fa fa-plus-square" id="create-client" aria-hidden="true" title="Create Client"></i></a> -->
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="client" class="table table-bordered table-hover dataTable">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Role</th>
                                    <th>Action</th>
                                  
                                </tr>
                            </thead>
                            <tbody>
                            <?php if (!empty($users)) {
                            for ($i = 0; $i < count($users); $i++) { ?>
                                <tr>
                                    <td><?php echo $users[$i]['first_name']." ". $users[$i]['last_name']?></td>
                                    <td><?php echo $users[$i]['role'] ?>
                                    </td>
                               
                                    <td> 
                                  
                                          <!-- <a href="<?php echo base_url('Auditapp/edit_client/') . base64_encode($users[$i]['id']); ?>""> <i class="fa fa-pencil" title="Edit"></i></a> -->
                                          <a href="<?php echo base_url('Auditapp/edit_client/') . base64_encode($users[$i]['id']); ?>">Projects</a>
                                            <!-- <a href="#"> <i class="fa fa-trash text-danger" aria-hidden="true" title="Delete"></i></a> -->
                                     
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
