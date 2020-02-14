<?php
function process_menu($companyid)
{
  $CI=&get_instance();
$process = $CI->MainModel->selectAll('tbl_process');
$company_services = $CI->MainModel->selectAllFromWhere('tbl_client_details', array('id' => $companyid));
$services = json_decode($company_services[0]['process'], true);
$services_process = array_keys($services);
$id = join(",", $services_process);
$servicesResult = $CI->MainModel->selectAllbyMultipleId('tbl_process', $id);

$html = '<ul class="treeview-menu">';
  if (!empty($servicesResult)) {
    foreach ($servicesResult as $process) {
      $sub_process = $services[$process['id']];
      $sub_id = join(",", $sub_process);
    $html .= '<li class="active"> <a class="collapse-item" href="'.base_url('Auditapp/sub_process/'). base64_encode($sub_id).'">'.$process['process_name'].'</a></li>';
  } 
}
$html .= '</ul>';
return $html;
}
?>