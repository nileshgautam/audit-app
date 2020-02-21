<div class="content-wrapper" style="min-height:0px !important">
    <?php $method = $this->router->fetch_method();
    if ($method == 'edit_client') {
        $client_dtl = $client_details[0];
    }
    if (!empty($id)) {
        $processId = array_keys($id);
    }
    ?>
    <div style="padding:10px 50px">
        <h3 style="margin:0">
            <?php echo $method != 'edit_client' ? "Add Client" : "Edit Client" ?>
        </h3>
    </div>
    <section class="content">
        <div class="box">
            <div class="box-body">
                <div class="client-form">
                    <form role="form" action="<?php if ($method != 'edit_client') {
                                                    echo base_url('Auditapp/clientPost');
                                                } else {
                                                    echo base_url('Auditapp/saveEditedClient');
                                                } ?>" method="POST">
                        <!-- text input -->
                        <div class="row">
                            <div class="col-sm-6">
                                <label for="client-name" class="col-sm-4">Client Name</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" placeholder="Enter ..." name="client-name" value="<?php if ($method == 'edit_client') {
                                                                                                                                    echo $client_dtl['client_name'];
                                                                                                                                } ?>" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label for="gst-number" class="col-sm-4">GST Number</label>
                                <div class="form-group col-sm-8">
                                    <input type="text" class="form-control" placeholder="Enter GST number..." name="gst-number" value="<?php if ($method == 'edit_client') {
                                                                                                                                            echo $client_dtl['gst_number'];
                                                                                                                                        } ?>" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <label for="country" class="col-sm-4">Select Country</label>
                                <div class="form-group col-sm-8">
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
                            <div class="col-sm-6">
                                <label for="state" class="col-sm-4">Select State</label>
                                <div class="form-group col-sm-8">

                                    <select class="form-control" placeholder="Select State *" name="state" id="state" required>
                                        <option>Select State</option>
                                    </select>
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <label for="state" class="col-sm-4">Select City</label>
                                <div class="form-group col-sm-8">

                                    <select class="form-control" placeholder="Select city *" name="city" id="city" required>
                                        <option>Select City</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label for="address" class="col-sm-4">Address</label>
                                <div class="form-group col-sm-8">

                                    <input type="text" class="form-control" placeholder=" Address *" name="address" value="<?php if ($method == 'edit_client') {
                                                                                                                                echo $client_dtl['address'];
                                                                                                                            } ?>" required />
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <label for="email" class="col-sm-4">Email</label>
                                <div class="form-group col-sm-8">
                                    <input type="email" class="form-control" placeholder="email *" name="email" value="<?php if ($method == 'edit_client') {
                                                                                                                            echo $client_dtl['email'];
                                                                                                                        } ?>" required />
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label for="mobile-number" class="col-sm-4">Mobile number</label>
                                <div class="form-group col-sm-8">

                                    <input type="text" class="form-control" placeholder="Mobile Number *" name="mobile-number" value="<?php if ($method == 'edit_client') {
                                                                                                                                            echo $client_dtl['contact_no'];
                                                                                                                                        } ?>" required />
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <label for="zip" class="col-sm-4">Zip/Pin/Code</label>
                                <div class="form-group col-sm-8">

                                    <input type="text" class="form-control" placeholder="Zip/Pin/Code" name="zip" value="<?php if ($method == 'edit_client') {
                                                                                                                                echo $client_dtl['zip_pin_code'];
                                                                                                                            } ?>" />
                                </div>
                            </div>
                        </div>

                        <?php if ($method == 'edit_client') { ?>
                            <div>
                                <div class="mt-30">
                                    <h4>Choose Process</h4>
                                </div>
                                <div id="accordion">
                                    <?php
                                    // print_r($services);die;
                                    foreach ($services as $process) {
                                        if (!empty($id)) {
                                            $idIndex = array_search($process['process_id'], $processId);
                                        }
                                        // print_r($idIndex);
                                    ?>
                                        <div class="card">
                                            <div class="card-header" id="headingOne<?php echo $process['id'] ?>">
                                                <h5 class="mb-0">
                                                    <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne<?php echo $process['id'] ?>" aria-expanded="true" aria-controls="collapseOne<?php echo $process['id'] ?>">
                                                        <!-- <input type="checkbox" data-id="<?php echo $process['process_id'] ?>" class="">--> <?php echo $process['process_name'] ?>
                                                    </button>
                                                </h5>
                                            </div>
                                            <div id="collapseOne<?php echo $process['id'] ?>" class="collapse show" aria-labelledby="headingOne<?php echo $process['id'] ?>" data-parent="#accordion">
                                                <div class="card-body">
                                                    <?php
                                                    $subprocess = $this->MainModel->selectAllWhere('tbl_sub_process', array('process_id' => $process['process_id']));
                                                    if (!empty($subprocess)) {
                                                        // print_r($subprocess);die;
                                                        foreach ($subprocess as $sbprocess) {
                                                            if (!empty($id)) {
                                                                $spIndex = in_array($sbprocess['sub_process_id'], $id[$processId[$idIndex]]);
                                                            } else {
                                                                $spIndex = 0;
                                                            }
                                                            // print_r($spIndex);
                                                            // print_r($sbprocess);
                                                    ?>
                                                            <ul>
                                                                <li><input type="checkbox" <?php if ($spIndex == 1) {
                                                                                                echo 'checked';
                                                                                            } ?> name="subprocess" data-sub-id="<?php echo $sbprocess['sub_process_id'] ?>" data-process-id="<?php echo $sbprocess['process_id'] ?>" class=""><label><?php echo $sbprocess['sub_process_name']; ?></label> </li>
                                                            </ul>

                                                    <?php }
                                                    } ?>
                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>
                            <input hidden name="method" value='<?php echo $method ?>'>
                            <input hidden name="client_id" value='<?php echo $client_dtl['id'] ?>'>
                            <input hidden name="process" id='process' value=''>
                        <?php } ?>
                        <div class="row">
                            <button type="submit" class="btnSubmit right"><?php echo $method != 'edit_client' ? "Submit" : "Update" ?></button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
    process = {};
    $('.btnSubmit').click(function() {
        $('input[name="subprocess"]:checked').each(function() {
            if (process[$(this).attr('data-process-id')] === undefined) {
                process = {
                    [$(this).attr('data-process-id')]: [$(this).attr('data-sub-id')],
                    ...process
                };
            } else {
                process[$(this).attr('data-process-id')] = [...process[$(this).attr('data-process-id')], $(this).attr('data-sub-id')];
            }

        });

        $('#process').val(JSON.stringify(process))

    })
</script>