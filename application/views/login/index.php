
<section class="loginpage">
    <div class="card-wrapper">
        <div class="login-card">
            <div class="head">
                <img src="<?php echo base_url(); ?>assets/images/logo.png" alt="logo" width="64">
            </div>
            <div class="base">
                <form class="login-from" method="POST">
                    <div class="input-control">
                        <i class="input-box-icon fa fa-user">
                            <input id="email_address" name="email" class="input-box" type="text" placeholder="Email address" autocomplete="off"></i>
                    </div>
                    <div class="input-control">
                        <i class="input-box-icon fa fa-lock">
                            <input id="password" name="password" class="input-box" type="password" placeholder="Password" autocomplete="off"></i>
                    </div>
                    <div class="button-control">
                        <button type="submit">Log in</button>
                    </div>
                </form>
            </div>
            <div class="forget-pass-wrapper">
                <a href="<?php echo base_url('forget_password'); ?>">
                    Forget Password ?
                </a>
            </div>
            <hr>
            <div class="bottom">
                <div class="title">
                    Login with
                </div>
                <div class="social-btn">
                    <button><i class="fa fa-google"></i> &nbsp;Google</button>
                    <button><i class="fa fa-facebook"></i> &nbsp;Facebook</button>
                </div>
                <hr>
                <div class="new-account">
                    <a class="new-account-mask" href="<?php echo base_url('CenNerSys/signup'); ?>">
                        New Account <i class="fa fa-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>