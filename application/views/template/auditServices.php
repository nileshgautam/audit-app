<div class="content-wrapper">
  <div class="container mt-30" style="align-self: auto">

    <div>
      <?php
      if (isset($_SESSION['company_data'])) {
      ?>
        <h4><?php echo $_SESSION['company_data']['company_name']; ?></h4>
        <span><?php echo $_SESSION['company_data']['email']; ?></span>
      <?php } ?>
      <div class="mt-30">
        <h4>Choose Process</h4>
      </div>
    </div>

    <div id="accordion">
      <?php
      // print_r($services);die;
      foreach ($services as $process) {

        // echo '<pre>';
        // print_r($process); 
      ?>
        <div class="card">
          <div class="card-header" id="headingOne<?php echo $process['id'] ?>">
            <h5 class="mb-0">
              <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne<?php echo $process['id'] ?>" aria-expanded="true" aria-controls="collapseOne<?php echo $process['id'] ?>">
                <!-- <input type="checkbox" data-id="<?php echo $process['process_id'] ?>" class="main-process">--> <?php echo $process['process_name'] ?>
              </button>
            </h5>
          </div>
          <div id="collapseOne<?php echo $process['id'] ?>" class="collapse show" aria-labelledby="headingOne<?php echo $process['id'] ?>" data-parent="#accordion">
            <div class="card-body">
              <?php
              $subprocess = $this->MainModel->selectAllWhere('tbl_sub_process', array('process_id' => $process['process_id']));
              if (!empty($subprocess)) {
                // print_r($subprocess);die;
                foreach ($subprocess as $sbprocess) {
                  // print_r($sbprocess);
              ?>
                  <ul>
                    <li><input type="checkbox" name="subprocess" data-sub-id="<?php echo $sbprocess['sub_process_id'] ?>" data-process-id="<?php echo $sbprocess['process_id'] ?>" class="sub_process"><label><?php echo $sbprocess['sub_process_name']; ?></label> </li>
                  </ul>

              <?php }
              } ?>
            </div>
          </div>
        </div>
      <?php
      }
      ?>
    </div>
    <div>
      <input type="hidden" id="company_id" name="company_id" value="<?php echo $_SESSION['company_data']['company_id']; ?>">
      <button class="btn btn-primary submit-services" style="float:right; margin:5px;">Apply</button>
    </div>
  </div>
</div>