<div class="content-wrapper">
  <div class="pa-10" style="align-self: auto;height:100%">
    <!-- heading section -->
    <div>
      <?php
      if (isset($_SESSION['company_data'])) {
        $c_name =  $_SESSION['company_data']['company_name'];
      ?>
        <h4 class="ma-0 pa-10">Create Work Order for <?php echo $c_name ?></h4>
        <!-- <span><?php echo $_SESSION['company_data']['email']; ?></span> -->
      <?php } ?>
    </div>
    <!-- Processes Section -->
    <div id="accordion">
      <?php
      foreach ($services as $process) {
      ?>
        <div class="box box-default collapsed-box mb-8">
          <div class="card">
            <div class="card-header" id="headingOne<?php echo $process['id'] ?>">
              <h5 class="ma-0 collapse_heading" data-toggle="collapse" data-target="#collapseOne<?php echo $process['id'] ?>" aria-expanded="true" aria-controls="collapseOne<?php echo $process['id'] ?>">
                <a>
                  <?php echo $process['process_name'] ?>
                </a>
              </h5>
            </div>
            <div id="collapseOne<?php echo $process['id'] ?>" class="collapse" aria-labelledby="headingOne<?php echo $process['id'] ?>" data-parent="#accordion">
              <div class="card-body c_body">
                <?php
                $subprocess = $this->MainModel->selectAllWhere('sub_process_master', array('process_id' => $process['process_id']));
                if (!empty($subprocess)) {
                  foreach ($subprocess as $sbprocess) {
                ?>
                    <div class="">
                      <input type="checkbox" name="subprocess" data-sub-id="<?php echo $sbprocess['sub_process_id'] ?>" data-process-id="<?php echo $sbprocess['process_id'] ?>" class="sub_process">&nbsp;&nbsp;&nbsp;<label><?php echo $sbprocess['sub_process_name']; ?></label>
                    </div>

                <?php }
                } ?>
              </div>
            </div>
          </div>
        </div>
      <?php
      }
      ?>
    </div>
    <div class="row ma-0">
    <input type="hidden" id="client_id" name="client_id" value="<?php echo $_SESSION['company_data']['client_id']; ?>">
      <input type="hidden" id="company_id" name="company_id" value="<?php echo $_SESSION['company_data']['company_id']; ?>">
      <button class="btn btn-primary submit-services" style="float:right; margin:5px;">Apply</button>
      <a href="<?php echo base_url('Auditapp/company').'#'.$c_name?>" class="btn btn-primary" style="float:right; margin:5px;">Back</a>
    </div>
  </div>
</div>