<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <div class="container">


        <div style="padding:10px 50px">
            <h3 style="margin:0">
                <?php echo (isset($user)) ? 'Edit User' : 'User Registration' ?>
            </h3>
        </div>
        <form action="<?php echo (isset($user)) ? base_url('Auditapp/user_editpost') : base_url('Auditapp/user_post') ?>" method="post">
            <input type="hidden" name="id" value="<?php echo (isset($user) ? $user[0]['id'] : '') ?>">
            <div class="form-content">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="first-name" class="col-md-4">First Name</label>
                            <div class="form-group col-md-8">
                                <input type="text" class="form-control" placeholder="First Name *" name="first-name" value="<?php echo (isset($user)) ? $user[0]['first_name'] : "" ?>" required />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="last-name" class="col-md-4">Last Name</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" placeholder="Last Name*" name="last-name" value="<?php echo (isset($user)) ? $user[0]['last_name'] : "" ?>" required />
                            </div>

                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- <div class="col-md-6">
                        <div class="form-group">
                            <label for="client" class="col-md-4">Mangaer</label>
                            <div class="col-md-8 form-group">
                                <select class="form-control" placeholder="Select Client*" name="client" id="client" value="<?php echo (isset($user)) ? $user[0]['first_name'] : "" ?>" required>
                                    <option>Manager</option>
                                    <?php if (isset($client_list)) {
                                        foreach ($client_list as $clients) { ?>
                                            <option data="<?php echo $clients['id']; ?>"><?php echo $clients['client_name'] ?></option>
                                    <?php   }
                                    }
                                    ?>
                                </select>
                            </div>

                        </div>
                        <?php echo (isset($user)) ? $user[0]['role'] : "Select role" ?> 
                    </div> -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="client" class="col-md-4">Role</label>
                            <div class="col-md-8 form-group">
                                <select class="form-control" placeholder="Select Role *" name="role" id="role" value="" required>
                                    <option>Select role</option>
                                    <?php if (!empty($role)) {
                                        foreach ($role as $user_role) {
                                    ?>
                                            <option <?php if (isset($user)) {
                                                        echo ($user_role['role'] ==  $user[0]['role']) ? ' selected="selected"' : '';
                                                    } ?>><?php echo $user_role['role'] ?></option>
                                    <?php }
                                    } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="email" class="col-md-4">Email</label>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Email" name="email" value="<?php echo (isset($user)) ? $user[0]['email'] . 'disabled' : '' ?>" required <?php echo (isset($user)) ? 'disabled' : '' ?> />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="password" class="col-md-4">Password</label>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <input type="password" class="form-control" placeholder="Password *" value="<?php echo (isset($user)) ? $user[0]['password'] : '' ?>" name="password" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- <input type="hidden" name="company-id" id="company-id">
                <input type="hidden" name="user-role" id="user-role"> -->
                <button type="submit" class="btnSubmit float-right">Submit</button>
            </div>
        </form>
    </div>
</div>