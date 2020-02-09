<div class="container mt-30">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row m-0 p-0">
                <h6 class="m-0 font-weight-bold text-primary col-sm-11">Client List</h6>
                <div>
                   <a href="<?php echo base_url('Auditapp/client_registration_form');?>"> <i class="fa fa-plus-square" id="create-client" aria-hidden="true" title="Create Client"></i></a>
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
                            <th class="">City</th>
                            <th class="">SPOC</th>
                            <th class="">Action</th>
                        </tr>
                    </thead>
                    <tbody id="client_list">
                        <?php
                        if (!empty($client_list)) {

                            for ($i = 0; $i < count($client_list); $i++) {
                        ?>
                                <tr>
                                    <td class="as-44"><?php echo $i + 1 ?></td>
                                    <td class=""><a href="<?php echo base_url('Home/comp_dashboard/' . $client_list[$i]['id']) ?>"><?php echo $client_list[$i]['client_name'] ?></td>
                                    <td class=""><?php echo $client_list[$i]['city'] ?></td>
                                    <td class="">SPOC</td>
                                    <td class="as-44">
                                        <div class="administration">
                                            <div><a href="<?php echo base_url('Home/audit_view/') . $client_list[$i]['id']; ?>"> <i class="fa fa-power-off text-success" aria-hidden="true" title="Start Audit"></i></a></div>
                                            <div><a href="<?php echo base_url('Home/audit_view/') . $client_list[$i]['id']; ?>"> <i class="fas fa-edit" title="Edit"></i></a></div>
                                            <div><a href="<?php echo base_url('Home/audit_view/') . $client_list[$i]['id']; ?>"> <i class="fa fa-trash text-danger" aria-hidden="true" title="Delete"></i></a></div>
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