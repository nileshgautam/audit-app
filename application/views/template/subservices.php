<div class="content-wrapper">

    <h4 style="text-align: center">Scope</h4>
    <div class="accordion" id="subservices">

        <?php
        // print_r($subServices);
        if (isset($subServices)) {
            foreach ($subServices as $subServices) { ?>

                <div class="col-md-12">
                    <div class="box box-default collapsed-box">
                        <div class="box-header with-border">
                            <h3 class="box-title"><?php echo $subServices['sub_process_name'] ?></h3>
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
                                        <table class="table table-bordered">
                                            <tr>
                                                <!-- <th style="width: 10px">#</th> -->
                                                <th style="width:200px">Risk</th>
                                                <th>Work Steps</th>
                                                <th>Data Required</th>
                                            </tr>
                                            <tr>
                                                <!-- <td>1.</td> -->
                                                <td>
                                                    <?php $risk = $this->MainModel->selectAllFromWhere('tbl_risk', array('sub_process_id' => $subServices['id']));
                                                    if (isset($risk)) {
                                                        foreach ($risk as $iter_risk) { ?>
                                                        <li><?php echo $iter_risk['risk_name'] ?></li>
                                                    <?php }
                                                    } ?>

                                                </td>
                                                <td>
                                                    <table>
                                                        

                                                 
                                                    <?php
                                                    $work_steps = $this->MainModel->selectAllFromWhere('tbl_work_steps', array('sub_process_id' => $subServices['id']));
                                                    // print_r($risk);
                                                    if (isset($work_steps)) {
                                                        foreach ($work_steps as $work_steps) { ?>
                                                              <tr>
                                                            <td> <input type="checkbox"><?php echo $work_steps['steps_name'] ?></td>
                                                            </tr>    
                                                    <?php }
                                                    } ?>
                                                                                                                          
                                                    </table>
                                                </td>
                                                <td><span class="badge bg-red">55%</span></td>
                                            </tr>

                                        </table>
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


</div>