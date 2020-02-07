
/* define constant variables */
const QC_One_Alter='RejectedbyQC1';
const QC_Two_Alter='RejectedbyQC2';
const QC_Three_Alter='RejectedbyQC3'; //for packing rejection
const Dispatched_Alter='dispatched_Alter'; 
const store_Alter='store_responce'; 
const send_back_to_seller='remark_by_backend';
/* add product json */


$("#submit").click(function () {
    var item_arr = [];
    $("#form div input").each(function () {
        var label1 = $(this).siblings().text()
        console.log(label1);
        var input = $(this).val();
        item_arr.push({
            [label1]: input
        });
    });
    console.log(item_arr);
});

var ar = {};

$("#ok").click(function () {
    var fName = $("#myInput").val()
    var check = $("#append_area div label").text().split('*')
    var check1 = check.indexOf(fName)
    if (check1 != '-1') {
        alert('Attribute is already exist')
    }
    else {
        //     var data = `<div class="form-group row col-sm-6" style="padding:0px 30px">
        // <label for="text" class="col-sm-4">` + fName + `</label>
        // <input type="text" class="form-control col-sm-8" id="` + fName + `"name="` + fName + `">
        // </div>`;
        var div = $(`<div class="form-group row col-sm-6" style="padding:0px 30px">
    <label for="text" class="col-sm-4">` + fName + `</label>
   
    </div>`);
        var input = $(`<input type="text" class="form-control col-sm-8" id="` + fName + `"name="` + fName + `">`);

        input.keyup(function () {
            var key = $(this).attr('name');
            ar[key] = $(this).val();
            $('#json').val(JSON.stringify(ar));
            //$('#json').val(JSON.stringify(ar));
            console.log(ar)
        })

        div.append(input);

        $("#append_area").append(div);
        ar = { ...ar, [fName]: "" };
        $('#json').val(JSON.stringify(ar));

    }
    $("#add_attr").css('display', 'inline-block')
    $(".shw").css('display', 'none');


});
$("#nav-active li a").click(function () {
    $("#nav-active li a").removeClass('active')
    $(this).addClass('active');

})
$(document).ready(function () {
    $(".dropdown-toggle").dropdown();
});

$(document).ready(function () {
    $("tbody").on("keyup", '#myInput', function () {
        var value = $(this).val().toLowerCase();
        $("#myTable a").filter(function () {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });
});

$("#myTable a").click(function () {

    // alert(val)
})


/* add Attribute json */
$('#sub').click(function () {
    if ($("#testName").attr('checked')) {
        $('#testNameHidden').disabled = true;
    }
    else {
        $('#testNameHidden').disabled = false;
    }
});


$("tbody").on('click', '#rmv_itm', function () {
    $(this).parent().parent().remove();

})
$(document).ready(function () {

    $('.toast').toast('show');

});
$('#add_attr').click(function () {
    $(".shw").css('display', 'block');
    $(this).css('display', 'none')
});

$('#gen').click(function () {
    $("#attr_form").css('display', 'none')
    $("#append_area").css('display', 'flex')
});

$('#attr').click(function () {
    $("#append_area").css('display', 'none')
    $("#attr_form").css('display', 'block')
});

function validateInput(inp) {
    let val = inp.trim();
    val = escapeHtml(inp);
    val = val.replace('\\', '');
    return val;
}
function escapeHtml(text) {
    return text
        .replace(/&/g, "&amp;")
        .replace(/</g, "&lt;")
        .replace(/>/g, "&gt;")
        .replace(/"/g, "&quot;")
        .replace(/'/g, "&#039;");
}

function escapeHtml_decode(text) {
    //console.log(text)
    return text
        .replace(/&amp;/g, '&')
        .replace(/&lt;/g, '<')
        .replace(/&gt;/g, '>')
        .replace(/&quot;/g, '"')
        .replace(/&#039;/g, "'");

}

function short_Name(text) {
   //console.log(text)
    let name = text.split(" ");
    let s_name = "";
    let r_name = "";
   if (name.length == "1") {
        let nam = name[0];
        return nam;
    } else {
        for(let i=0;i<name.length;i++){
            s_name = name[i].split("");
            r_name += s_name[0]
           
          }
        return r_name;
    } 
}


