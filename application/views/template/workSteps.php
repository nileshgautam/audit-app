<!-- <?php print_r($work_steps) ?> -->
<h2 class="heading">Risk</h2>
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
<h2 class="heading">Work Steps</h2>
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