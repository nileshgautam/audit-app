 /* $(".input-control").children('input').focusin(function(){
    $(".input-box-icon").css("color","#3ca2e0");
    $(this).css("color", "#3ca2e0");
    $(this).css("border-bottom", "1.2px solid #3ca2e0");
});
$(".input-box").focusout(function(){
    $(".input-box-icon").css("color","#999");
    $(this).css("color", "#999");
    $(this).css("border-bottom", "1px solid #999");
}); */

/*   Email Address Validation   */

$(document).ready(function() {

    $("#email_address").keyup(function(){

        var email = $("#email_address").val();

        if(email != 0)
        {
            if(isValidEmailAddress(email))
            {
                $("#email_address").css({
                    "border-bottom": "1.2px solid #06A94D",
                    "color": "#06A94D"
                });
                return true;
            } else {
                $("#email_address").css({
                    "border-bottom": "1.2px solid #D0312D",
                    "color": "#D0312D"
                });
                return false;
            }
        } else {
            $("#email_address").css({
                "border-bottom": "1.2px solid #D0312D",
                "color": "#D0312D"
            });
            return false;
        }

    });

});

function isValidEmailAddress(emailAddress) {
    var pattern = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
    return pattern.test(emailAddress);
}
/*   Email Address Validation End  */

/*   Password Validation  */
$(document).ready(function() {

    $("#password").keyup(function(){

        var password = $("#password").val();

        if(password != 0)
        {
            if(isValidPassword(password))
            {
                $("#password").css({
                    "border-bottom": "1.2px solid #06A94D",
                    "color": "#06A94D"
                });
                return true;
            } else {
                $("#password").css({
                    "border-bottom": "1.2px solid #D0312D",
                    "color": "#D0312D"
                });
                return false;
            }
        } else {
            $("#password").css({
                "border-bottom": "1.2px solid #D0312D",
                "color": "#D0312D"
            });
            return false;
        }

    }).focus(function() {
        $('#pswd_info').show();
    }).blur(function() {
        $('#pswd_info').hide();
    });

});

function isValidPassword(password) {
    var pattern = new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})");
    return pattern.test(password);
}

/*   Password Validation End  */


$(document).ready(function(){
    $('.login-from').on('submit', function(e){
        e.preventDefault();
        var emailAddress = $("#email_address").val();
        var password = $('#password').val();
        if(isValidEmailAddress(emailAddress) && isValidPassword(password)){
            var form_data = $(this).serialize();
            $.ajax({
                url: BASE_URL+"Login/auth",
                type: "POST",
                data: form_data,
                success: function(response){
                    if(MOVE_TO == "address")
                        window.location = BASE_URL+"Login/auth";
                    else
                        window.location = BASE_URL+"CenNerSys/account/user";

                }
            });
        }
        else{
            alert("invalid data");
        }
    });
});