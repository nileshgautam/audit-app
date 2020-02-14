<div class="content-wrapper">

    <div class="box-body">
        <div class="client-form">

 
        <form role="form" action="<?php echo base_url('Auditapp/clientPost') ?>" method="POST">
            <!-- text input -->
            <div class="row">
                <div class="col-sm-4">
                    <div class="">
                        <label for="client-name">Client Name</label>
                        <input type="text" class="form-control" placeholder="Enter ..." name="client-name" required>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="gst-number">GST Number</label>
                        <input type="text" class="form-control" placeholder="Enter GST number..." name="gst-number" required>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="country">Select Country</label>
                        <select class="form-control" placeholder="Select Country *" name="country" id="country" required>
                            <option>Select Country</option>
                            <?php if (isset($country)) {
                                foreach ($country as $countries) { ?>
                                    <option id="<?php echo $countries['id']; ?>"> <?php echo $countries['name'] ?></option>
                            <?php   }
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="form-group">
                        <label for="state">Select State</label>
                        <select class="form-control" placeholder="Select State *" name="state" id="state" required>
                            <option>Select State</option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-3">

                    <div class="form-group">
                        <label for="state">Select City</label>
                        <select class="form-control" placeholder="Select city *" name="city" id="city" required>
                            <option>Select City</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" placeholder=" Address *" name="address" required />
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" placeholder="email *" name="email" required />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="mobile-number">Mobile number</label>
                        <input type="text" class="form-control" placeholder="Mobile Number *" name="mobile-number" required />
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="zip">Zip/Pin/Code</label>
                        <input type="text" class="form-control" placeholder="Zip/Pin/Code" name="zip" />
                    </div>
                </div>
            </div>
            <button type="submit" class="btnSubmit">Submit</button>
        </form>
        </div>
    </div>
</div>
