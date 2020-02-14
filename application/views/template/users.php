<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="form">
        <div class="note">
            <p><?php echo (isset($user)) ? 'Edit User' : 'User Registration' ?></p>
        </div>
        <form action="<?php echo (isset($user)) ? base_url('Auditapp/user_editpost') : base_url('Auditapp/user_post') ?>" method="post">
            <input type="hidden" name="id" value="<?php echo (isset($user) ? $user[0]['id'] : '') ?>">
            <div class="form-content">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="first-name">First Name</label>
                            <input type="text" class="form-control" placeholder="First Name *" name="first-name" value="<?php echo (isset($user)) ? $user[0]['user_first_name'] : "" ?>" required />
                        </div>
                        <div class="form-group">
                            <label for="last-name">Last Name</label>
                            <input type="text" class="form-control" placeholder="Last Name*" name="last-name" value="<?php echo (isset($user)) ? $user[0]['user_last_name'] : "" ?>" required />
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="client">Select Company</label>
                            <select class="form-control" placeholder="Select Client*" name="client" id="client" value="<?php echo (isset($user)) ? $user[0]['user_first_name'] : "" ?>" required>
                                <option>Select Company</option>
                                <?php if (isset($client_list)) {
                                    foreach ($client_list as $clients) { ?>
                                        <option data="<?php echo $clients['id']; ?>"><?php echo $clients['client_name'] ?></option>
                                <?php   }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="client">Select Role</label>
                            <select class="form-control" placeholder="Select Role *" name="role" id="role" value="" required>
                                <option>Select role</option>
                                <?php if (!empty($role)) {
                                    foreach ($role as $role) { ?>
                                        <option data="<?php echo $role['role_id'] ?>"><?php echo $role['role'] ?></option>
                                <?php  }
                                } ?>
                            </select>

                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="email">Email</label>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Email" name="email" value="<?php echo (isset($user)) ? $user[0]['user_email'] : '' ?>" required />
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" placeholder="Password *" value="<?php echo (isset($user)) ? $user[0]['user_password'] : '' ?>" name="password" />
                        </div>
                    </div>
                </div>
                <input type="hidden" name="company-id" id="company-id">
                <input type="hidden" name="user-role" id="user-role">
                <button type="submit" class="btnSubmit">Submit</button>
            </div>
        </form>
    </div>
</div>