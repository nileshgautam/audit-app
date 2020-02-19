
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
                $('#state').empty();
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
                $('#city').empty();
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

let processArr = {};
// let subProcessArr = [];

// $('.sub_process').on('change', function () {
//     // alert($('.sub_process').val());
//     let subProcessId = $(this).attr('data-sub-id');
//     let ProcessId = $(this).attr('data-process-id');
//     if ($(this).prop('checked')) {
//         // processArr[ProcessId]=[subProcessId, ...processArr[ProcessId]];

//         processArr[ProcessId].push(subProcessId);
//     } else {

//         let subIndex = processArr[ProcessId].indexOf(subProcessId);
//         processArr[ProcessId].splice(subIndex, 1);
//     }
//     console.log(processArr);
// });

// $('.main-process').on('change', function () {
//     let processId = $(this).attr('data-id');
//     if ($(this).prop('checked')) {
//         processArr = { [processId]: [], ...processArr };

//         //processArr.push(processId);
//     } else {
//         delete processArr[processId];

//         //let processIndex = processArr.indexOf(processId);
//         //processArr.splice(processIndex, 1);
//     }
//     // console.log(processArr);

// });


$('.submit-services').on('click', function () {
    process = {};

    $('input[name="subprocess"]:checked').each(function () {
        if (process[$(this).attr('data-process-id')] === undefined) {
            process = {
                [$(this).attr('data-process-id')]: [$(this).attr('data-sub-id')],
                ...process
            };
        } else {
            process[$(this).attr('data-process-id')] = [...process[$(this).attr('data-process-id')], $(this).attr('data-sub-id')];
        }



        // $('#process').val(JSON.stringify(process))

    })
    let companyId = $('#company_id').val();
    // console.log(companyId);
    // console.log(process);
    let formData = { id: companyId, process: JSON.stringify(process) }
    $.ajax({
        type: 'POST',
        url: baseUrl + '/Auditapp/update_company',
        data: formData,
        success: function (data, success) {
            // console.log(data);
            window.location = baseUrl + "Auditapp/company";
        }

    });
});

let setModelData = (companyId, userId, userRole, processId, subProcessId, workSteps, mandatory, mandatoryDataId) => {
    $('#company-id').val(companyId),
        $('#user-id').val(userId),
        $('#user-id').val(userRole),
        $('#process-id').val(processId),
        $('#sub-process-id').val(subProcessId),
        $('#work-steps-id').val(workSteps)
    $('#mandatory-id').val(mandatoryDataId)

    mandatory == 'yes' ? $('#mandatory').val(1) : $('#mandatory').val(0)
    // $('#status').val(1)
    // return

}

$('.upload-file').on('click', function () {
    let mandatory = $(this).attr('mandatory');
    let companyId = $(this).attr('data-company-id');
    let userId = $(this).attr('data-user-id');
    let userRole = $(this).attr('data-user-role');
    let processId = $(this).attr('data-process-id');
    let subProcessId = $(this).attr('data-sub-process-id');
    let workSteps = $(this).attr('data-work-steps-id');
    let mandatoryDataId = $(this).attr('mandatory-data-id');

    let data = setModelData(companyId, userId, userRole, processId, subProcessId, workSteps, mandatory, mandatoryDataId);

});

$("#upload-data").on('submit', function (e) {
    e.preventDefault();
    // var Data = $(this).serializeArray();
    let files = $('#files')[0].files;
    // console.log(files);
    let error = '';
    let form_data = new FormData(this);
    for (let count = 0; count < files.length; count++) {
        let name = files[count].name;
        let extension = name.split('.').pop().toLowerCase();
        if (jQuery.inArray(extension, ['png', 'jpg', 'jpeg', 'csv', 'xlsx']) == -1) {
            error += "Invalid " + count + "File"
        }
        else {
            form_data.append("files[]", files[count]);
        }
    }
    if (error == '') {
        $.ajax({
            method: "POST",
            url: baseUrl + "Upload_Files/upload_file",
            data: form_data,
            contentType: false,
            cache: false,
            processData: false,
            success: function (data) {
                // console.log(JSON.parse(data));
                if (data) {
                    $('#myModal').modal('hide');
                    setTimeout(function () { location.reload(true); }, 1000);
                }
                // alert("Save Complete");
            }
        });
    }

});
// function to show uploaded files in mandatory
$('.view-upload-data').click(function (e) {
    e.preventDefault();
    let companyid = $(this).attr('data-company-id');
    let mandatorydataid = $(this).attr('mandatory-data-id');
    let form_data = new FormData();
    let html = '';
    form_data.append('companyid', companyid);
    form_data.append('mandatorydataid', mandatorydataid);
    $.ajax({
        type: 'POST',
        url: baseUrl + '/Auditapp/mandatory_file',
        data: form_data,
        contentType: false,
        cache: false,
        processData: false,
        success: function (data, success) {
            let fileData = JSON.parse(data);
            console.log(fileData);
            html += ` <table class="table table-striped">
                <thead>
                    <tr>
                        <th>File name</th>
                        <th>Remark</th>
                        <th>Uploads on </th>
                    </tr>
                </thead>
                <tbody>`
            for (const uploedfile of fileData) {
                html += `
                <tr>
            <td><a href="${baseUrl + `upload/files/${uploedfile.file_name}`}">  ${uploedfile.file_name}</a></td>
            <td>${uploedfile.remark}</td> 
            <td>${uploedfile.uploaded_on}</td>`
            }

            html += `  
             </tr>
    </tbody>
</table>
`
            $('#view-file').html(html);




        }

    });
    // console.log(companyid);
});
// function to show uploaded files in Work steps

$('.view-upload-work-steps-files').click(function (e) {
    e.preventDefault();

    let companyid = $(this).attr('data-company-id');
    let workstepsid = $(this).attr('data-work-steps-id');
    let form_data = new FormData();
    let html = '';
    form_data.append('companyid', companyid);
    form_data.append('workstepsid', workstepsid);
    $.ajax({
        type: 'POST',
        url: baseUrl + '/Auditapp/worksteps_file',
        data: form_data,
        contentType: false,
        cache: false,
        processData: false,
        success: function (data, success) {
            let fileData = JSON.parse(data);
            console.log(fileData);
            html += ` <table class="table table-striped">
                <thead>
                    <tr>
                        <th>File name</th>
                        <th>Remark</th>
                        <th>Uploads on </th>
                        
                    </tr>
                </thead>
                <tbody>`
            for (const uploedfile of fileData) {
                html += `
                <tr>
            <td><a href="${baseUrl + `upload/files/${uploedfile.file_name}`}">  ${uploedfile.file_name}</a></td>
            <td>${uploedfile.remark}</td>
            <td>${uploedfile.uploaded_on}</td>`
            }
            html += `   </tr>
    </tbody>
</table>
`
            $('#view-file').html(html);




        }

    });
    // console.log(companyid);
});

// $('form').submit(function (e) {
//     $('input[type=checkbox]').each(function () {
//         var sThisVal = (this.checked ? $(this).attr('data-id') : "");
//         console.log(sThisVal);
//     });
//     e.preventDefault();
//     let data1 = $(this).find('input[type="checked"]').attr('data-id');
//     let formData = $(this).serialize();
//     // console.log(sThisVal);
// });
