
<div class="content-wrapper" style="min-height:0px !important">
<div class="container-fluid">
<div class="row" style="margin-top:100px;">
    <div class="col-sm-4">
    </div>
    <div class="col-sm-4">
    <form class="form-group" action="<?php echo base_url("MainWebsite/excel_reader");?>" method="POST" enctype="multipart/form-data">
    <h2> Upload Excel File </h2>
    <div>
    <input type="file" name="sample_file" id="sample_file"  style="padding-bottom:20px;"> 
    </div>
    <div>
    <input type="submit" value="Upload" class="btn btn-success">
    
    <?php

    if($this->session->flashdata("error")){ 
        ?>
    <span class="text-danger">
    <?php echo $this->session->flashdata("error"); ?>
    </span>
    <?php 
    }
    if($this->session->flashdata("success")){
        ?>
        <span class="text-success">
    <?php echo $this->session->flashdata("success"); ?>
    </span>
    <?php }
   
   ?>
   </div>
    </form>
    </div>
    <div class="col-sm-4">
    </div>

</div>

</div>
</div>