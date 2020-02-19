  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
      <?php
      if ($this->session->flashdata('success')) {
      ?>
        <div class="row">
          <div class="" align="center" style="color:green;">
            <?php echo $this->session->flashdata('success'); ?>
          </div>
        </div>
        <br>
      <?php
      }
      ?>

      <?php
      if ($this->session->flashdata('error')) {
      ?>
        <div class="row">
          <div class="" align="center" style="color:red;">
            <?php echo $this->session->flashdata('error'); ?>
          </div>
        </div>
        <br>
      <?php
      }
      ?>
    </section>

    

    <!-- Main content -->

    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->