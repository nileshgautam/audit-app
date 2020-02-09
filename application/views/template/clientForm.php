<div class="container register-form mt-30">
    <div class="form">
        <div class="note">
            <p>Client Registration</p>
        </div>
        <form action="<?php echo base_url('Auditapp/clientPost')?>" method="post">
            <div class="form-content">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Client Name *"  name="client-name" required/>
                        </div>
                        <div class="form-group">
                            <select class="form-control" placeholder="Select Country *" name="country" id="country" required>
                                <option >Select Country</option>
                                <?php if (isset($country)) {
                                    foreach ($country as $countries) { ?>
                                        <option id="<?php echo $countries['id']; ?>"> <?php echo $countries['name'] ?></option>
                                <?php   }
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">

                            <input type="text" class="form-control" placeholder=" Address *"  name="address" required/>
                            <!-- <input type="text" class="form-control" placeholder="Coun *" /> -->
                        </div>
                        <div class="form-group">
                            <select class="form-control" placeholder="Select State *" name="state" id="state" required>
                                <option >Select State</option>
                            </select>
                            <!-- <input type="text" class="form-control" placeholder="Confirm Password *" /> -->
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">

                            <select class="form-control" placeholder="Select city *" name="city" id="city" required>
                                <option >Select City</option>
                            </select>
                            <!-- <input type="text" class="form-control" placeholder="Client Name *" /> -->
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Phone Number *"  name="phone-number" required/>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="email" class="form-control" placeholder="email *"  />
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Mobile Number *"  required/>
                        </div>
                    </div>
                </div>
                <!-- <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder=""  />
                        </div>
                        <div class="form-group">
                           
                        </div>
                    </div>
                    <div class="col-md-6">
                      
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder=""  name="confirm-password" />
                        </div>
                    </div>
                </div> -->
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">

                        <select class="form-control" placeholder="Select SPOC *" name="role" id="role">
                                <option>Select Role</option>
                                <?php if(isset($role)){
                                    foreach($role as $client_role){?>
                                        <option><?php echo $client_role['role']; ?></option>  
                                   <?php }}
                                    ?>
                        </select>
                            <!-- <input type="text" class="form-control" placeholder="Client Name *" /> -->
                        </div>
                        <div class="form-group">
                        <input type="password" class="form-control" placeholder=" Confirm Password *" name="confirm-password"  />
                        </div>
                    </div>
                    <div class="col-md-6">
                    
                        <div class="form-group">
                            <input type="password" class="form-control" placeholder="Password*"  name="password"  />
                        </div>
                    </div>
                </div>
                <button type="submit" class="btnSubmit">Submit</button>
            </div>
        </form>
    </div>
</div>