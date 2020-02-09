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
 
