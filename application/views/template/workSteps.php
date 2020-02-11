
<div class="accordion" id="accordionExample">
    <div class="card">
        <div class="card-header" id="headingOne">
            <h2 class="mb-0">
                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                   Risk
                </button>
            </h2>
        </div>
        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
            <div class="card-body">
                <div class="container risk-info">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <ul>
                                <?php
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
        <div class="card-header" id="headingTwo">
            <h2 class="mb-0">
                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    Work Steps
                </button>
            </h2>
        </div>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
            <div class="card-body">
                <div class="container risk-info">
                    <div class="panel panel-default">
                        <!-- <div class="panel-heading">Panel Heading</div> -->
                        <div class="panel-body">
                            <ul>
                                <?php
                                // print_r($risk);
                                if (isset($work_steps)) {
                                    foreach ($work_steps as $iter_work) { ?>
                                        <li><?php echo $iter_work['steps_name'] ?></li>
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
        <div class="card-header" id="headingThree">
            <h2 class="mb-0">
                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                   Data Required
                </button>
            </h2>
        </div>
        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
            <div class="card-body">
                <div class="container risk-info">
                    <div class="panel panel-default">
                        <!-- <div class="panel-heading">Panel Heading</div> -->
                        <div class="panel-body">
                            <ul>
                                <?php
                                // print_r($risk);
                                if (isset($data_required)) {
                                    foreach ( $data_required as $iter_datarequired) { ?>
                                        <li><?php echo $iter_datarequired['data_required'] ?><input type="file" value="" ></li>
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