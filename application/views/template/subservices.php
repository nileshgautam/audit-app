<div class="container">


    <h4 style="text-align: center">Scope</h4>

    <div class="accordion" id="subservices">
        <?php
        // print_r($risk);
        if (isset($subServices)) {
            foreach ($subServices as $subServices) { ?>
                <div class="card">
                    <div class="card-header" id="heading<?php echo $subServices['id'] ?>">
                        <h2 class="mb-0">
                            <a class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse<?php echo $subServices['id'] ?>" aria-expanded="true" aria-controls="collapse<?php echo $subServices['id'] ?>">
                            <i class="fa fa-angle-down"></i>
                                <?php echo $subServices['sub_process_name'] ?>
                            </a>
                        </h2>
                    </div>
                    <div id="collapse<?php echo $subServices['id'] ?>" class="collapse show" aria-labelledby="heading<?php echo $subServices['id'] ?>" data-parent="#subservices">
                        <div class="card-body">
                            <div class="container risk-info">
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <div class="accordion" id="risk">
                                            <div class="card">
                                                <div class="card-header" id="heading-risk">
                                                    <h2 class="mb-0">
                                                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse-risk" aria-expanded="true" aria-controls="collapse-risk">
                                                            Risk
                                                        </button>
                                                    </h2>
                                                </div>
                                                <div id="collapse-risk" class="collapse show" aria-labelledby="heading-risk" data-parent="#risk">
                                                    <div class="card-body">
                                                        <div class="container risk-info">
                                                            <div class="panel panel-default">
                                                                <div class="panel-body">
                                                                    <ul>
                                                                        <?php
                                                                        $risk = $this->MainModel->selectAllFromWhere('tbl_risk', array('sub_process_id' => $subServices['id']));
                                                                        // print_r($risk);
                                                                        if (isset($risk)) {
                                                                            foreach ($risk as $iter_risk) { ?>
                                                                                <li><?php echo $iter_risk['risk_name'] ?></li>
                                                                        <?php }
                                                                        } ?>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <div class="card-header" id="heading-work-steps">
                                                    <h2 class="mb-0">
                                                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseWorkSteps" aria-expanded="true" aria-controls="collapseWorkSteps">
                                                            Work steps
                                                        </button>
                                                    </h2>
                                                </div>
                                                <div id="collapseWorkSteps" class="collapse show" aria-labelledby="heading-work-steps" data-parent="#risk">
                                                    <div class="card-body">
                                                        <div class="container risk-info">
                                                            <div class="panel panel-default">
                                                                <div class="panel-body">
                                                                    <ul>
                                                                        <?php
                                                                        $work_steps = $this->MainModel->selectAllFromWhere('tbl_work_steps', array('sub_process_id' => $subServices['id']));
                                                                        // print_r($risk);
                                                                        if (isset($work_steps)) {
                                                                            foreach ($work_steps as $work_steps) { ?>
                                                                                <li><?php echo $work_steps['steps_name'] ?></li>
                                                                        <?php }
                                                                        } ?>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        <?php }
        } ?>
    </div>
</div>

