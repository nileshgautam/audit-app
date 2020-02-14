<?php if ($this->session->flashdata('msg') != "") { ?>
  <script>
    showAlert("<?php echo $this->session->flashdata('msg'); ?>", 'danger');
  </script>
<?php } ?>

<div class="conatiner">
  <div class="box ">
    <div class="box-header with-border" style="text-align:center">
      <h3 class="box-title" >Login</h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <form class="form-horizontal" action="<?php echo base_url('Login/auth') ?>" method="post">
      <div class="box-body">
        <div class="form-group">
          <label for="inputEmail" class="col-sm-2 control-label">Email</label>
          <div class="col-sm-10">
            <input type="email" name="email" required class="form-control" id="inputEmail" placeholder="Email" autocomplete="off">
          </div>
        </div>
        <div class="form-group">
          <label for="inputPassword" class="col-sm-2 control-label">Password</label>
          <div class="col-sm-10">
            <input type="password" required class="form-control" id="inputPassword" name='password' placeholder="Password">
          </div>
        </div>
       
      </div>
      <!-- /.box-body -->
      <div class="box-footer">
        <!-- <button type="submit" class="btn btn-default">Cancel</button> -->
        <input type="submit" value="Log In" class="btn btn-info pull-right">
        <!-- <button type="submit" class="btn btn-info pull-right">Sign in</button> -->
      </div>
      <!-- /.box-footer -->
    </form>
  </div>
</div>


<style>
.conatiner{
width: 400px;
margin: 149px 500px 75px 500px;
}
</style>
