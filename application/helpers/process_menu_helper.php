<?php
function process_menu($companyid, $method = null)
{
  if (!empty($companyid)) {
    $CI = &get_instance();
    $process = $CI->MainModel->selectAll('tbl_process');
    $company_services = $CI->MainModel->selectAllFromWhere('tbl_client_details', array('id' => $companyid));
    $services = json_decode($company_services[0]['process'], true);
    $services_process = array_keys($services);
    $id = "'" . join("','", $services_process) . "'";
    if (!empty($id)) {
      $servicesResult = $CI->MainModel->selectAllbyMultipleId('tbl_process', $id, "process_id");

      $html = '<ul class="treeview-menu">';
      if (!empty($servicesResult)) {
        foreach ($servicesResult as $process) {
          $sub_process = $services[$process['process_id']];
          $ids = json_encode(array('p_id' => $process['process_id'], 'sp_id' => "'" . join("','", $sub_process) . "'"));
          // print_r($method);die;
          if($method != 'manager'){
            $html .= '<li class="active"> <a class="collapse-item" href="' . base_url('Auditapp/sub_process/') . base64_encode($ids) . '">' . $process['process_name'] . '</a></li>';
          }else{
            $html .= '<li class="active"> <a class="collapse-item" href="' . base_url('Auditapp/manager_process/') . base64_encode($ids) . '">' . $process['process_name'] . '</a></li>';
          }
          
        }
      }
      $html .= '</ul>';
      return $html;
    } else {
      $CI->session->set_flashdata("error", "There is no Process chosen for this client, Please choose Process First ");
    }
  } else {
    $CI->session->set_flashdata("error", "System Error Contact to IT.");
  }
}
