<div class="content-wrapper">

    <h4 style="text-align: center">Scope</h4>
    <div class="accordion" id="subservices">

        <?php
        // print_r($subServices);
        if (isset($subProcess)) {
            // echo '<pre>';
            // print_r($subProcess);
            foreach ($subProcess as $subProcess) { ?>
                <div class="col-md-12">
                    <div class="box box-default collapsed-box">
                        <div class="box-header with-border">
                            <h3 class="box-title"><?php echo $subProcess['sub_process_name'] ?></h3>
                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                                </button>
                            </div>
                            <!-- /.box-tools -->
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="col-md-12">
                                <div class="box">
                                    <div class="box-header with-border">
                                        <!-- <h3 class="box-title">Bordered Table</h3> -->
                                    </div>
                                    <!-- /.box-header -->
                                    <div class="box-body">
                                    <form class="work-steps-form">
                                        <table class="table">
                                          
                                            <tr>
                                                <th style="width:200px">Risk</th>
                                                <td>
                                                    <?php $risk = $this->MainModel->selectAllFromWhere('tbl_risk', array('sub_process_id' => $subProcess['id']));
                                                    if (isset($risk)) {
                                                        foreach ($risk as $iter_risk) { ?>
                                                            <li><?php echo $iter_risk['risk_name'] ?></li>
                                                    <?php }
                                                    } ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Work Steps</th>
                                                <td>
                                                    <table class="table">
                                                        <?php
                                                        // $this->load->model('Files');
                                                        $count = 1;
                                                        $work_steps = $this->Files->get_subprocess_uploads_file($subProcess['id'], $_SESSION['userInfo']['company']);
                                                        // echo '<pre>';
                                                        // print_r($work_steps);
                                                        if (empty($work_steps)) {
                                                            $work_steps = [];
                                                        }
                                                        $uploaded_files = array_column($work_steps, 'work_seteps_id');
                                                        // print_r($uploaded_files);
                                                        // echo '<pre>';
                                                        // print_r($work_steps);
                                                        $work_stepsData = $this->MainModel->selectAllFromWhere('tbl_work_steps', array('sub_process_id' => $subProcess['id']));
                                                        if (!empty($work_stepsData)) {
                                                            // print_r($risk);
                                                            foreach ($work_stepsData as $work_steps) { ?>

                                                                <tr>
                                                                    <td>

                                                                        <?php echo  $count++ . ' : ' . $work_steps['steps_name']; ?>


                                                                    </td>
                                                                    <td><input type="checkbox" name="worksteps[]" data-id="<?php echo $work_steps["work_seteps_id"]?>"></td>
                                                                    <td><i class="fa fa-upload btn btn-info upload-file" mandatory="no" data-user-role="<?php echo $_SESSION['userInfo']['user_role'] ?>" data-company-id="<?php echo $_SESSION['userInfo']['company'] ?>" data-process-id="<?php echo $subProcess['id'] ?>" data-sub-process-id="<?php echo $work_steps['sub_process_id'] ?>" data-work-steps-id="<?php echo $work_steps['work_seteps_id'] ?>" aria-hidden="true" data-toggle="modal" data-target="#myModal"> </i></td>
                                                                    <td>
                                                                        <?php if (in_array($work_steps["work_seteps_id"], $uploaded_files)) { ?>
                                                                            <i class="fa fa-eye view-upload-work-steps-files" data-company-id="<?php echo $_SESSION['userInfo']['company'] ?>" data-work-steps-id="<?php echo $work_steps['work_seteps_id'] ?>" aria-hidden="true" data-toggle="modal" data-target="#myModalViewFile"></i>
                                                                        <?php } ?>
                                                                    </td>
                                                                </tr>
                                                        <?php }
                                                        } ?>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Required Data</th>
                                                <td>
                                                    <table class="table ">
                                                        <?php
                                                        $uploaded_mandatory_file = $this->Files->get_data_required_uploads_file($subProcess['id'], $_SESSION['userInfo']['company']);
                                                        // echo '<pre>';
                                                        // print_r($uploaded_mandatory_file);
                                                        if (empty($uploaded_mandatory_file)) {
                                                            $uploaded_mandatory_file = [];
                                                        }
                                                        $uploaded_mandatory_files = array_column($uploaded_mandatory_file, 'file_mf');

                                                        $mandatory_data = $this->MainModel->selectAllFromWhere('tbl_data_required', array('sub_process_id' => $subProcess['id']));
                                                        if (isset($mandatory_data)) {
                                                            // echo '<pre>';
                                                            // print_r($mandatory_data);
                                                            $count2 = 1;
                                                            foreach ($mandatory_data as $required_data) { ?>
                                                                <tr>
                                                                    <td>
                                                                        <?php echo $count2++ . ' : ' . '<lable class="text-danger">' . $required_data['data_required'] . '</lable>' ?>
                                                                    </td>
                                                                    <td></td>

                                                                    <td>
                                                                        <i class="fa fa-upload btn btn-info upload-file" mandatory="yes" mandatory-data-id="<?php echo $required_data['id'] ?>" data-user-role="<?php echo $_SESSION['userInfo']['user_role'] ?>" data-company-id="<?php echo $_SESSION['userInfo']['company'] ?>" data-process-id="<?php echo $subProcess['id'] ?>" data-sub-process-id="<?php echo $required_data['sub_process_id'] ?>" area-hidden="true" data-toggle="modal" data-target="#myModal"> </i>
                                                                    </td>

                                                                    <td>
                                                                        <?php if (in_array($required_data['id'], $uploaded_mandatory_files)) { ?>
                                                                            <i class="fa fa-eye view-upload-data" data-user-role="<?php echo $_SESSION['userInfo']['user_role'] ?>" data-company-id="<?php echo $_SESSION['userInfo']['company'] ?>" mandatory-data-id="<?php echo $required_data['id'] ?>" aria-hidden="true" data-toggle="modal" data-target="#myModalViewFile" mandatory="true"> </i>
                                                                        <?php } ?>
                                                                    </td>
                                                                </tr>
                                                        <?php }
                                                        } ?>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="3"><input type="submit" value="Save" class="btn btn-info pull-right"></td>
                                            </tr>
                                         
                                        </table>
                                        </form>
                                    </div>
                                </div>
                                <!-- /.box -->


                                <!-- /.box -->
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>

        <?php }
        } ?>
    </div>

    <div class="container">
        <!-- Modal -->
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog modal-lg">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Upload file</h4>
                    </div>
                    <form id="upload-data" enctype="multipart/form-data">
                        <div class="modal-body">
                            <input type="file" id="files" name="files" multiple class="col-sm-4">
                            <textarea name="remark" id="" placeholder="Remark if any..." class="col-sm-4"></textarea>
                            <input type="hidden" id="company-id" name="company-id">
                            <input type="hidden" id="user-id" name="user-id">
                            <input type="hidden" id="process-id" name="process-id">
                            <input type="hidden" id="sub-process-id" name="sub-process-id">
                            <input type="hidden" id="work-steps-id" name="work-steps-id">
                            <input type="hidden" id="mandatory" name="mandatory">
                            <input type="hidden" id="mandatory-id" name="mandatory-id">
                            <input type="submit" class="btn btn-info col-sm-2" value="Upload">
                        </div>
                    </form>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>

            </div>
        </div>

    </div>


</div>

<div class="container" id='view-uploaded-file'>
    <!-- Modal -->
    <div class="modal fade" id="myModalViewFile" role="dialog">
        <div class="modal-dialog modal-lg">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Uploaded file</h4>
                </div>

                <div class="modal-body">
                    <div id="view-file">

                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>

</div>