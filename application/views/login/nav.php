<!-- Page Wrapper -->
 <div id="wrapper">
   <!-- Sidebar -->
   <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
     <!-- Sidebar - Brand -->
     <!-- Access menu for Admin -->
     <?php if ($_SESSION['userInfo']['user_role'] === '10') : ?>
       <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
         <div class="sidebar-brand-icon rotate-n-0">
           <i class="fas fa-user"></i>
         </div>
         <div class="sidebar-brand-text mx-3"><?php echo $_SESSION['userInfo']['username']; ?></div>
       </a>

       <!-- Divider -->
       <hr class="sidebar-divider">

       <li class="nav-item">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseusers" aria-expanded="true" aria-controls="collapseusers">
           <i class="fa fa-user" aria-hidden="true"></i>
           <span>List Process</span>
         </a>
         <?php $process = $this->MainModel->selectAll('tbl_process'); ?>
         <div id="collapseusers" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
           <div class="bg-white py-2 collapse-inner rounded">
             <h6 class="collapse-header">List Process</h6>
             <?php if (!empty($process)) {
                foreach ($process as $process) { ?>
                 <a class="collapse-item" href="#"><?php echo $process['process_name'] ?></a>

             <?php }
              } ?>

           </div>
         </div>
       </li>

       <hr class="sidebar-divider">
       <!-- Nav Item - Utilities Collapse Menu -->
       <li class="nav-item">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
           <i class="fas fa-fw fa-table"></i>
           <span>Client List</span>
         </a>
         <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
           <div class="bg-white py-2 collapse-inner rounded">
             <h6 class="collapse-header">Client list</h6>
             <a class="collapse-item" href="<?php echo base_url('Auditapp/company') ?>">Client list</a>
             <a class="collapse-item" href="<?php echo base_url('Auditapp/user_tab') ?>">User list</a>
           </div>
         </div>
       </li>
       <!--ACCESS MENUS FOR Process-->

     <?php elseif ($_SESSION['userInfo']['user_role'] === '20') : ?>
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
         <div class="sidebar-brand-icon rotate-n-0">
           <i class="fas fa-user"></i>
         </div>
         <div class="sidebar-brand-text mx-3"><?php echo $_SESSION['userInfo']['username']; ?></div>
         <!-- <div class="sidebar-brand-text mx-3"><?php echo $_SESSION['userInfo']['company']; ?></div> -->
       </a>
       <!-- Nav Item - Dashboard -->
       <?php

        $process = $this->MainModel->selectAll('tbl_process');
        $company_services = $this->MainModel->selectAllFromWhere('tbl_client_details', array('id' => $_SESSION['userInfo']['company']));
        // echo '
        //  <pre>';
        $services = json_decode($company_services[0]['process'], true);
        $services_process = array_keys($services);
        $id = join(",", $services_process);
        $servicesResult = $this->MainModel->selectAllbyMultipleId('tbl_process', $id);
        ?>
       <!-- Divider -->
       <hr class="sidebar-divider">
       <li class="nav-item">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseusers" aria-expanded="true" aria-controls="collapseusers">
           <i class="fa fa-user" aria-hidden="true"></i>
           <span>List Process</span>
         </a>
         <div id="collapseusers" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
           <div class="bg-white py-2 collapse-inner rounded">
             <h6 class="collapse-header">List Process</h6>
             <?php if (!empty($servicesResult)) {
                foreach ($servicesResult as $process) {
                  $sub_process = $services[$process['id']];
                  $sub_id = join(",", $sub_process);
                  // print_r($sub_id);
              ?>
                 <a class="collapse-item" href="<?php echo base_url('Auditapp/sub_process/') . base64_encode($sub_id) ?>"><?php echo $process['process_name'] ?></a>
             <?php }
              } ?>
           </div>
         </div>
       </li>

     <?php elseif ($_SESSION['userInfo']['user_role'] === '30') : ?>
       <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
         <div class="sidebar-brand-icon rotate-n-0">
           <i class="fas fa-user"></i>
         </div>
         <div class="sidebar-brand-text mx-3"><?php echo $_SESSION['userInfo']['username']; ?></div>
         <!-- <div class="sidebar-brand-text mx-3"><?php echo $_SESSION['userInfo']['company']; ?></div> -->
       </a>
       <!-- Nav Item - Dashboard -->
       <?php

        $process = $this->MainModel->selectAll('tbl_process');
        $company_services = $this->MainModel->selectAllFromWhere('tbl_client_details', array('id' => $_SESSION['userInfo']['company']));
        // echo '
        //  <pre>';
        $services = json_decode($company_services[0]['process'], true);
        $services_process = array_keys($services);
        $id = join(",", $services_process);
        $servicesResult = $this->MainModel->selectAllbyMultipleId('tbl_process', $id);
        ?>
       <!-- Divider -->
       <hr class="sidebar-divider">
       <li class="nav-item">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseusers" aria-expanded="true" aria-controls="collapseusers">
           <i class="fa fa-user" aria-hidden="true"></i>
           <span>List Process</span>
         </a>
         <div id="collapseusers" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
           <div class="bg-white py-2 collapse-inner rounded">
             <h6 class="collapse-header">List Process</h6>
             <?php if (!empty($servicesResult)) {
                foreach ($servicesResult as $process) {
                  $sub_process = $services[$process['id']];
                  $sub_id = join(",", $sub_process);
                  // print_r($sub_id);
              ?>
                 <a class="collapse-item" href="<?php echo base_url('Auditapp/sub_process/') . base64_encode($sub_id) ?>"><?php echo $process['process_name'] ?></a>
             <?php }
              } ?>
           </div>
         </div>
       </li>

     <?php elseif ($_SESSION['userInfo']['user_role'] === '40') : ?>
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
         <div class="sidebar-brand-icon rotate-n-0">
           <i class="fas fa-user"></i>
         </div>
         <div class="sidebar-brand-text mx-3"><?php echo $_SESSION['userInfo']['username']; ?></div>
         <!-- <div class="sidebar-brand-text mx-3"><?php echo $_SESSION['userInfo']['company']; ?></div> -->
       </a>
       <!-- Nav Item - Dashboard -->
       <?php

        $process = $this->MainModel->selectAll('tbl_process');
        $company_services = $this->MainModel->selectAllFromWhere('tbl_client_details', array('id' => $_SESSION['userInfo']['company']));
        // echo '
        //  <pre>';
        $services = json_decode($company_services[0]['process'], true);
        $services_process = array_keys($services);
        $id = join(",", $services_process);
        $servicesResult = $this->MainModel->selectAllbyMultipleId('tbl_process', $id);
        ?>
       <!-- Divider -->
       <hr class="sidebar-divider">
       <li class="nav-item">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseusers" aria-expanded="true" aria-controls="collapseusers">
           <i class="fa fa-user" aria-hidden="true"></i>
           <span>List Process</span>
         </a>
         <div id="collapseusers" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
           <div class="bg-white py-2 collapse-inner rounded">
             <h6 class="collapse-header">List Process</h6>
             <?php if (!empty($servicesResult)) {
                foreach ($servicesResult as $process) {
                  $sub_process = $services[$process['id']];
                  $sub_id = join(",", $sub_process);
                  // print_r($sub_id);
              ?>
                 <a class="collapse-item" href="<?php echo base_url('Auditapp/sub_process/') . base64_encode($sub_id) ?>"><?php echo $process['process_name'] ?></a>
             <?php }
              } ?>
           </div>
         </div>
       </li>

     <?php elseif ($_SESSION['userInfo']['user_role'] === '50') : ?>
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
         <div class="sidebar-brand-icon rotate-n-0">
           <i class="fas fa-user"></i>
         </div>
         <div class="sidebar-brand-text mx-3"><?php echo $_SESSION['userInfo']['username']; ?></div>
         <!-- <div class="sidebar-brand-text mx-3"><?php echo $_SESSION['userInfo']['company']; ?></div> -->
       </a>
       <!-- Nav Item - Dashboard -->
       <?php

        $process = $this->MainModel->selectAll('tbl_process');
        $company_services = $this->MainModel->selectAllFromWhere('tbl_client_details', array('id' => $_SESSION['userInfo']['company']));
        // echo '
        //  <pre>';
        $services = json_decode($company_services[0]['process'], true);
        $services_process = array_keys($services);
        $id = join(",", $services_process);
        $servicesResult = $this->MainModel->selectAllbyMultipleId('tbl_process', $id);
        ?>
       <!-- Divider -->
       <hr class="sidebar-divider">
       <li class="nav-item">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseusers" aria-expanded="true" aria-controls="collapseusers">
           <i class="fa fa-user" aria-hidden="true"></i>
           <span>List Process</span>
         </a>
         <div id="collapseusers" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
           <div class="bg-white py-2 collapse-inner rounded">
             <h6 class="collapse-header">List Process</h6>
             <?php if (!empty($servicesResult)) {
                foreach ($servicesResult as $process) {
                  $sub_process = $services[$process['id']];
                  $sub_id = join(",", $sub_process);
                  // print_r($sub_id);
              ?>
                 <a class="collapse-item" href="<?php echo base_url('Auditapp/sub_process/') . base64_encode($sub_id) ?>"><?php echo $process['process_name'] ?></a>
             <?php }
              } ?>
           </div>
         </div>
       </li>
     <?php endif; ?>
     <!-- Divider -->
     <hr class="sidebar-divider d-none d-md-block">

     <!-- Sidebar Toggler (Sidebar) -->
     <div class="text-center d-none d-md-inline">
       <button class="rounded-circle border-0" id="sidebarToggle"></button>
     </div>
   </ul>
   <!-- End of Sidebar -->
   <!-- Content Wrapper -->
   <div id="content-wrapper" class="d-flex flex-column">

     <!-- Main Content -->
     <div id="content">

       <!-- Topbar -->
       <nav id="navbar" class="navbar navbar-expand navbar-dark text-white bg-dark topbar static-top shadow ">

         <!-- Sidebar Toggle (Topbar) -->
         <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
           <i class="fa fa-bars"></i>
         </button>

         <!-- Topbar Search -->
         <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0  navbar-search">
           <div class="input-group">
             <a href="<?php echo base_url('admin') ?>"> <img class="h-25" src="<?php echo base_url('assets/img/logoiso27001.png') ?>" alt="Logo"></a>
           </div>
         </form>
         <!-- Topbar Navbar -->
         <ul class="navbar-nav ml-auto">

           <div class="topbar-divider d-none d-sm-block"></div>
           <!-- Nav Item - User Information -->
           <li class="nav-item dropdown no-arrow">

             <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['userInfo']['username'];; ?></span>
               <img class="img-profile rounded-circle" src="<?php echo base_url('assets/img/admin.png') ?>">
             </a>
             <!-- Dropdown - User Information -->
             <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
               <a class="dropdown-item" href="<?php echo base_url('Login/logout') ?>">
                 <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                 Logout
               </a>
             </div>
           </li>
         </ul>
       </nav>