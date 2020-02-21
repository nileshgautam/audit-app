<?php $process = $this->MainModel->selectAll('process_master'); ?>

<header class="main-header">
  <!-- Logo -->
  <a href="#" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini"><b>G</b>NXT</span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg"><?php echo $_SESSION['userInfo']['username']; ?></span>
  </a>

  <!-- Header Navbar: style can be found in header.less -->
  <nav class="navbar navbar-static-top">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
      <span class="sr-only">Nav</span>
    </a>
    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">

        <!-- User Account: style can be found in dropdown.less -->
        <li class="dropdown user user-menu">
          <a href="<?php echo base_url('Login/logout') ?>">
            <span class="hidden-xs">Sign out</span>
            <!-- <a href="<?php echo base_url('Login/logout') ?>" class="hidden-xs">Sign out</a> -->
          </a>
        </li>
        <!-- Control Sidebar Toggle Button -->
        <!-- <li>
          <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
        </li> -->
      </ul>
    </div>
  </nav>

</header>

<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="<?php echo base_url('assets/') ?>dist/img/avatar5.png" class="img-circle" alt="User Image">
      </div>
    </div>
    <ul class="sidebar-menu" data-widget="tree">
      <?php if ($_SESSION['userInfo']['user_role'] === 'Admin') : ?>
        <li class="active treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a class="" href="<?php echo base_url('Auditapp/company') ?>">Clients</a></li>
            <li><a class="" href="<?php echo base_url('Auditapp/user_tab') ?>">Users</a></li>
            <li><a class="" href="<?php echo base_url('MainWebsite/upload_excel') ?>">Manage Master File</a></li>
          </ul>
        </li>
      <?php elseif ($_SESSION['userInfo']['user_role'] === '20') : ?>
        <li class="active treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Process List</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <?php
          print_r(process_menu($_SESSION['userInfo']['company']));
          ?>
        </li>
      <?php elseif ($_SESSION['userInfo']['user_role'] === '30') : ?>
        <li class="active treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Process List</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <?php
          $method = $this->router->fetch_method();          
          print_r(process_menu($_SESSION['userInfo']['company'],$method));
          ?>
        </li>
      <?php elseif ($_SESSION['userInfo']['user_role'] === '40') : ?>
        <li class="active treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Process List</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <?php
          print_r(process_menu($_SESSION['userInfo']['company']));
          ?>
    </ul>
    </li>
  <?php elseif ($_SESSION['userInfo']['user_role'] === '50') : ?>
    <li class="active treeview">
      <a href="#">
        <i class="fa fa-dashboard"></i> <span>Process List</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <?php
        print_r(process_menu($_SESSION['userInfo']['company']));
      ?>
      </ul>
    </li>
  <?php endif; ?>




  <!-- <li class="treeview">
        <a href="#">
          <i class="fa fa-files-o"></i>
          <span>Layout Options</span>
          <span class="pull-right-container">
            <span class="label label-primary pull-right">4</span>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="pages/layout/top-nav.html"><i class="fa fa-circle-o"></i> Top Navigation</a></li>
          <li><a href="pages/layout/boxed.html"><i class="fa fa-circle-o"></i> Boxed</a></li>
          <li><a href="pages/layout/fixed.html"><i class="fa fa-circle-o"></i> Fixed</a></li>
          <li><a href="pages/layout/collapsed-sidebar.html"><i class="fa fa-circle-o"></i> Collapsed Sidebar</a></li>
        </ul>
      </li> -->


  </ul>
  </section>
  <!-- /.sidebar -->
</aside>