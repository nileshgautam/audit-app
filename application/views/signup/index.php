        <section class="void">

        </section>
        <div class="signuppage">
            <div class="register-card">
                <div class="head">
                    <img src="<?php echo base_url(); ?>images/logo.png" alt="logo" width="64">
                </div>
                <div class="base">
                    <form class="register-from" method="POST">
                    <div class="input-control">
                        <i class="fa fa-user">
                        <input name="c_name" id="full_name" type="text" placeholder="Company Name *" autocomplete="off" required></i>
                    </div>
                    <div class="input-control">
                        <i class="fa fa-envelope" style="font-size: 0.79rem">
                        <input name="email" id="email_address" type="text" placeholder="Email Address *" autocomplete="off" required></i>
                    </div>
                    <div class="input-control">
                        <i class="fa fa-lock">
                        <input name="password" id="password" type="password" placeholder="Set A Password *" autocomplete="off" required></i>
                    </div>
                    <div class="pswd-info-wrapper">
                    <div id="pswd_info">
                        <h4>Password must meet the following requirements:</h4>
                        <ul>
                            <li id="letter" class="invalid">At least <strong>one small letter</strong></li>
                            <li id="capital" class="invalid">At least <strong>one capital letter</strong></li>
                            <li id="special" class="invalid">At least <strong>one special letter</strong></li>
                            <li id="number" class="invalid">At least <strong>one number</strong></li>
                            <li id="length" class="invalid">Be at least <strong>8 characters</strong></li>
                        </ul>
                    </div>
                    </div>
                    <div class="button-control">
                        <button>Sign up</button>
                    </div>
                    </form>
                </div>
                <div class="bottom">
                    <div class="new-account">
                        <a class="new-account-mask" href="<?php echo base_url('login/account');?>">
                            <i class="fa fa-arrow-left"></i> have an account ?
                        </a>
                    </div>
                </div>
            </div>
        </div>