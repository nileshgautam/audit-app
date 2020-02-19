<h4 class="heading headspace" id="education_qualification"> Education Qualification :</h4>

<table id="qualification" class="table table-bordered">
    <thead>
        <tr>

            <th>Qualification(UG/PG)</th>
            <th>University</th>
            <th>College</th>
            <th>Passout Year</th>
            <th>Percentage(%)</th>
            <th>Certificate</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody id="selected_qualification_Table">
        <!-- <tr>
                                                <td>2019</td>
                                                <td>MCA</td>
                                                <td>AKTU</td>
                                                <td>HIMT</td>
                                                <td> 
                                                <a href="#" class="btn btn-xs btn-warning">
                                                <i class="fa fa-edit " aria-hidden="true"></i>
                                                </a>
                                                <a href="#" class="btn btn-xs btn-danger">
                                                <i class="fa fa-trash " aria-hidden="true"></i>
                                                </a> 
                                            
                                            </td>
                                            </tr> -->
    </tbody>

</table>
<div class="form-group table-responsive col-sm-12">
    <div class="row col-sm-12">
        <div style="text-align:right;">
            <button type="button" id="add_degree" class="btn btn-xs btn-primary">
                <i class="fa fa-plus" aria-hidden="true"></i>
                More degree </button>
        </div>
    </div>
</div>

<script>
    let selected_qualification_Table = $('#selected_qualification_Table');
    let setected_qualification_list = [];

    <?php
    if (isset($userDetail[0]['qualification']) && !empty($userDetail[0]['qualification'])) {
    ?>

        setected_qualification_list = <?php echo $userDetail[0]['qualification'] . ";" ?>;

    <?php
    }
    ?>

    let qualification_id = 1;

    $('#add_degree').click(function(e) {
        e.preventDefault();
        let ob = getobj();
        setected_qualification_list.push(ob);
        loadTable(setected_qualification_list);
    });

    function getobj() {
        let ob = {
            qual_id: qualification_id,
            qual_Year: "",
            qual_degree: "",
            qual_university: "",
            qual_college: "",
            qual_certificate: "",
            qual_percentage: ""
        };
        qualification_id++;
        return ob;
    }

    $('document').ready(function() {


        <?php if (isset($userDetail) && !empty($userDetail[0]['passport_id'])) { ?>
            $('#passport_check').prop('checked', true)
            $('#passport_head').show();
            $('#passport_details').show();
            $('#passport_start_date').val('<?php echo $userDetail[0]['passport_start_date'] ?>');
            $('#passport_end_date').val('<?php echo $userDetail[0]['passport_end_date'] ?>');
            $('#passport_id').val('<?php echo $userDetail[0]['passport_id'] ?>');

        <?php
        } else { ?>
            $('#passport_check').prop('checked', false)
            $('#passport_head').hide();
            $('#passport_details').hide();
        <?php }
        ?>

        if (setected_qualification_list.length == 0) {
            let ob = getobj()
            setected_qualification_list.push(ob);
            loadTable(setected_qualification_list);
        } else {

            qualification_id = setected_qualification_list.reduce(function(max, num) {
                return (max.qual_id < num.qual_id) ? num : max;
            }).qual_id + 1;
            loadTable(setected_qualification_list);
        }
        if (localStorage.getItem('qualification')) {
            setected_qualification_list = JSON.parse(localStorage.getItem('qualification'));
            loadTable(setected_qualification_list);
        } else {

            localStorage.setItem('qualification', JSON.stringify(setected_qualification_list));
            loadTable(setected_qualification_list);
        }

    });

    function loadTable(list) {
        // console.log(list)
        let len = list.length;
        selected_qualification_Table.empty();
        for (let i = 0; i < len; i++) {

            let rowTemplate = $(`
      <tr>
      
     <td><input class="form-control degree-input" type="text" onChange="temp_store(this)" value="${list[i].qual_degree}"></td>
            <td><input class="form-control university-input" onChange="temp_store(this)"  type="text" value="${list[i].qual_university}"></td>
         
         <td><input class="form-control college-input" onChange="temp_store(this)" type="text" value="${list[i].qual_college}"></td>
         
         <td><input class="form-control year-input" type="text" onkeypress="return isNumber(event);" value="${list[i].qual_Year}"/></td>      
         <td><input class="form-control percentage-input" onkeypress="return isNumber(event);" type="text" value="${list[i].qual_percentage}"></td>  
             <td>${ list[i].qual_certificate===undefined||list[i].qual_certificate==""? `Not uploaded
                 `:"<i class='fa fa-check' style='color:green' aria-hidden='true'></i>" }</td>
             <td> 
             ${ list[i].qual_certificate===undefined||list[i].qual_certificate==""? ``:`<button type="button" id="view_certificate" data-toggle="modal" title="view certificate" class="btn btn-xs btn-primary view_certificate" data-target="#view_certificate" >
             <i class="fa fa-eye"  aria-hidden="true"></i>
                  </button>` }
            ${ list[i].qual_certificate===undefined||list[i].qual_certificate==""? `<button type="button" data-toggle="modal" title="Upload Certificate" class="btn btn-xs btn-primary upload_row" data-target="#upload_certificate" >
             <i class="fa fa-cloud-upload" aria-hidden="true"></i>
                  </button>`:`<button type="button" data-toggle="modal" title="Upload Certificate" class="btn btn-xs btn-primary upload_row" data-target="#upload_certificate" >
             <i class="fa fa-edit" aria-hidden="true"></i>
                  </button>` }
             <button type="button"  class="btn btn-xs btn-danger delete_row" >
             <i class="fa fa-trash " aria-hidden="true"></i>
                  </button>                      
             </td>
         </tr>`);

            var yearInput = rowTemplate.find('.year-input');
            yearInput.data("id", list[i].qual_id);
            yearInput.data("item-key", 'qual_Year');
            yearInput.keyup(Input_keyup);

            var percentageInput = rowTemplate.find('.percentage-input');
            percentageInput.data("id", list[i].qual_id);
            percentageInput.data("item-key", 'qual_percentage');
            percentageInput.keyup(Input_keyup);

            var deletebtn = rowTemplate.find('.delete_row');
            deletebtn.data("id", list[i].qual_id);
            deletebtn.click(deletebtn_click);

            var viewbtn = rowTemplate.find('.view_certificate');
            viewbtn.data("id", list[i].qual_id);
            viewbtn.data("item-key", 'qual_certificate');
            viewbtn.click(viewbtn_click);

            var uploadbtn = rowTemplate.find('.upload_row');
            uploadbtn.data("id", list[i].qual_id);
            uploadbtn.data("item-key", 'qual_certificate');
            uploadbtn.click(uploadbtn_click);


            var degreeInput = rowTemplate.find('.degree-input');
            degreeInput.data("id", list[i].qual_id);
            degreeInput.data("item-key", 'qual_degree');
            degreeInput.keyup(Input_keyup);

            var universityInput = rowTemplate.find('.university-input');
            universityInput.data("item-key", 'qual_university');
            universityInput.data("id", list[i].qual_id);
            universityInput.keyup(Input_keyup);

            var collegeInput = rowTemplate.find('.college-input');
            collegeInput.data("id", list[i].qual_id);
            collegeInput.data("item-key", 'qual_college');
            collegeInput.keyup(Input_keyup);
            selected_qualification_Table.append(rowTemplate);

        }
    }

    function deletebtn_click() {
        let yearInput = $(this);
        let test_id = yearInput.data('id');
        let itemIndex = setected_qualification_list.findIndex((item) => item.qual_id == test_id);
        setected_qualification_list.splice(itemIndex, 1);
        loadTable(setected_qualification_list)
        localStorage.setItem('qualification', JSON.stringify(setected_qualification_list));
        // console.log(test_id);
    }

    function uploadbtn_click() {
        let yearInput = $(this);
        let test_id = yearInput.data('id');
        $('#row_id').val(test_id)
        localStorage.setItem('qualification', JSON.stringify(setected_qualification_list));
    }

    function viewbtn_click() {
        let yearInput = $(this);
        let test_id = yearInput.data('id');
        let item = setected_qualification_list.find((item) => item.qual_id == test_id);
        console.log(item);
        let image_path = "<?php echo base_url('uploads/images/') ?>" + item.qual_certificate;
        $('#show_certificate').attr('src', image_path);
        localStorage.setItem('qualification', JSON.stringify(setected_qualification_list));
    }

    function Input_keyup() {
        let yearInput = $(this);
        let test_id = yearInput.data('id');
        let item_key = yearInput.data('item-key');
        let item = setected_qualification_list.find((item) => item.qual_id == test_id);
        item[item_key] = yearInput.val();
        localStorage.setItem('qualification', JSON.stringify(setected_qualification_list));
    }

    $("#upload_degree_pics").click(function(e) {
        let id = $('#row_id').val()
        var formData = new FormData(form_certificate);
        formData.append('image_file', 'image_file');
        var url = "<?php echo base_url('Career/img_upload'); ?>";
        AjaxPost(formData, url, certificate_Success, AjaxError, id);
    });

    function certificate_Success(content, id) {
        var result = JSON.parse(content);
        if (result.success) {
            let item = setected_qualification_list.find((item) => item.qual_id == id);
            item.qual_certificate = result.imgName;
            loadTable(setected_qualification_list)
            $('#image_file').val('');
            $('#upload_certificate').modal("hide");
            showAlert("Image uploade successfully")
        } else {

            showAlert(result.error, 'danger');
        }
    }
</script>