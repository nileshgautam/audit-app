// $('#create-client').on('click',function(){

//     alert('hi');
//     $.ajax({
// url:base_url+'Auditapp/',
// method:post,
// data:{id:clientId},
// success:function(data, success){
// alert(data);
// }
//     });

// });

$("#country").change(function () {

    let id = $(this).children("option:selected").attr('id');
    country_id = {
        c_id: id
    }
    $.ajax({
        type: "POST",
        url: baseUrl + "Auditapp/select_state",
        data: country_id,
        success: function (comp_responce) {
            obj = JSON.parse(comp_responce)
            if (obj) {
                // console.log(obj)
                let data = populate_option(obj);
                //  console.log(data);
                $('#state').append(data);
                // company_responce = obj;
            }
        },
        error: function () {
            console.log("error logind data")
        }
    });
    // alert(id);
});


$("#state").change(function () {
    let id = $(this).children("option:selected").attr('id');
    country_id = {
        c_id: id
    }

    $.ajax({
        type: "POST",
        url: baseUrl + "Auditapp/select_cities",
        data: country_id,
        success: function (comp_responce) {
            obj = JSON.parse(comp_responce)
            if (obj) {
                console.log(obj)
                let data = populate_cities(obj);
                //  console.log(data);
                $('#city').append(data);
                // company_responce = obj;
            }
        },
        error: function () {
            console.log("error logind data")
        }
    });
    // alert(id);
});

function populate_option(obj) {
    let html = '';
    for (let i = 0; i < obj.length; i++) {
        html += `<option id="${obj[i]['id']}" >${obj[i]['name']}</option>`
    }
    return html;
}

function populate_cities(obj) {
    let html = '';
    for (let i = 0; i < obj.length; i++) {
        html += `<option id="${obj[i]['state_id']}" >${obj[i]['name']}</option>`
    }
    return html;
}


$('#client').change(function () {

    let client = $(this).children("option:selected").attr('data');
    $('#company-id').val(client);
});
$('#role').change(function () {
    let client = $(this).children("option:selected").attr('data');
    $('#user-role').val(client);

});

let processArr = [];
let subProcessArr = [];

$('.sub_process').on('change', function () {
    // alert($('.sub_process').val());
    if ($(this).prop('checked')) {

        let subProcessId = $(this).attr('data-sub-id');
        subProcessArr.push(subProcessId);
    } else {
        subProcessId = $(this).attr('data-sub-id');
        let subIndex = subProcessArr.indexOf(subProcessId);
        subProcessArr.splice(subIndex, 1);
    }

});

$('.main-process').on('change', function () {
    if ($(this).prop('checked')) {
        let processId = $(this).attr('data-id');
        processArr.push(processId);
    } else {
        let processId = $(this).attr('data-id');
        let processIndex = processArr.indexOf(processId);
        processArr.splice(processIndex, 1);
    }

});

$('.submit-services').on('click', function () {
    let companyId = $('#company_id').val();
    let formData = { id: companyId, process: processArr, subProcess: subProcessArr }
    $.ajax({
        type: 'POST',
        url: baseUrl + '/Auditapp/update_company',
        data: formData,
        success: function (data, success) {
            // console.log(data);
            window.location=baseUrl+"Auditapp/company";
        }

    });
});

