<div class="bg-gradient-primary" style="padding:86px 0px">
  <div class="container">
    <!-- Outer Row -->
    <div class="row justify-content-center" style="padding:40px">
      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
              <div class="col-lg-6">

                <div class="p-5">
                  <div class="text-center">
                    <?php if ($this->session->flashdata('msg') != "") { ?>
                      <script>
                        showAlert("<?php echo $this->session->flashdata('msg'); ?>", 'danger');
                      </script>
                    <?php } ?>
                    <img class="h-25 " src="<?php echo base_url('assets/img/logoiso27001.png') ?>" alt="Logo">
                    <h3 class="text-gray-900">Login</h3>
                  </div>
                  <form class="user" action="<?php echo base_url('Login/auth') ?>" method="post">
                    <div class="form-group">
                      <input type="email" class="form-control form-control-user" id="InputEmail" name="email" aria-describedby="emailHelp" placeholder="Enter Email Address...">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" name="password" id="InputPassword" placeholder="Password">
                    </div>
                    <input type="submit" value="Log In" class="btn btn-primary btn-user btn-block">
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>
</div>