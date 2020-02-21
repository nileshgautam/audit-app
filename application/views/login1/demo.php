 <!-- <?php if (!empty($process)) {
            foreach ($process as $process) { ?>
                    <a class="collapse-item" href="#"><?php echo $process['process_name'] ?></a>
                    <ul>
                      <?php
                        $sub_process = $this->MainModel->selectAllFromWhere('tbl_sub_process', array('process_id' => $process['id']));

                        if (!empty($sub_process)) {
                            foreach ($sub_process as $subprocess) { ?>
                          <li class="nav-item"><a href="<?php echo base_url('Auditapp/work_steps/') . $subprocess['id'] ?>"><?php echo $subprocess['sub_process_name'] ?></a></li>
                        <?php }
                        } ?>
                        </ul>
                  <?php
                }
            } ?> -->

 $process = $this->MainModel->selectAll('tbl_process');
 $company_services=$this->MainModel->selectAllFromWhere('tbl_client_details', array('id'=>$_SESSION['userInfo']['company']));

         $services=json_decode($company_services[0]['process'],true);
         $services_process=array_keys($services);
         $id=join(",",$services_process);
         $servicesResult = $this->MainModel->selectAllbyMultipleId('tbl_process', $id);