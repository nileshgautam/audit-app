
/*   Full Name Validation   */
$(document).ready(function() {

    $("#full_name").keyup(function(){

        var fullName = $("#full_name").val();

        if(fullName != 0)
        {
            if(isValidFullName(fullName))
            {
                $("#full_name").css({
                    "border-bottom": "1.2px solid #06A94D",
                    "color": "#06A94D"
                });
            } else {
                $("#full_name").css({
                    "border-bottom": "1.2px solid #D0312D",
                    "color": "#D0312D"
                });
            }
        } else {
            $("#full_name").css({
                "border-bottom": "1.2px solid #D0312D",
                "color": "#D0312D"
            });
        }

    });

});

/*   Full Name Validation end  */

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
            } else {
                $("#email_address").css({
                    "border-bottom": "1.2px solid #D0312D",
                    "color": "#D0312D"
                });
            }
        } else {
            $("#email_address").css({
                "border-bottom": "1.2px solid #D0312D",
                "color": "#D0312D"
            });
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
        if(hasLowerCase(password)){ $('#letter').css("color","lightseagreen"); }else{ $('#letter').css('color','#222'); }
        if(hasUpperCase(password)){ $('#capital').css("color","lightseagreen"); }else{ $('#capital').css('color','#222'); }
        if(hasSpecialChar(password)){ $('#special').css("color","lightseagreen"); }else{ $('#special').css('color','#222'); }
        if(hasNumber(password)){ $('#number').css("color","lightseagreen"); }else{ $('#number').css('color','#222'); }
        if(hasLength(password)){ $('#length').css("color","lightseagreen"); }else{ $('#length').css('color','#222'); }

        if(password != 0)
        {
            if(isValidPassword(password))
            {
                $('#pswd_info').hide();
                $("#password").css({
                    "border-bottom": "1.2px solid #06A94D",
                    "color": "#06A94D"
                });
            } else {
                $("#password").css({
                    "border-bottom": "1.2px solid #D0312D",
                    "color": "#D0312D"
                });
            }
        } else {
            $("#password").css({
                "border-bottom": "1.2px solid #D0312D",
                "color": "#D0312D"
            });
        }

    }).focus(function() {
        $('#pswd_info').show();
    }).blur(function() {
        $('#pswd_info').hide();
    });

});


function hasLowerCase(str) {
    return (/[a-z]/.test(str));
}
function hasUpperCase(str) {
    return (/[A-Z]/.test(str));
}
function hasSpecialChar(str){
    return (/[!@#$%^&*(),.?":{}|<>]/.test(str));
}
function hasNumber(str){
    return (/[0-9]/.test(str));
}
function hasLength(str){
    if(str.length == 8){ return true; }else { return false; }
}


function isValidPassword(password) {
    var pattern = new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})");
    return pattern.test(password);
}

/*   Password Validation End  */

function isValidFullName(fullName) {
    if(fullName.length >=3){
        return true;
    }
    else {
        return false;
    }
}


$(document).ready(function(){
    $('.register-from').on('submit', function(e){
        e.preventDefault();
        var fullName = $("#full_name").val();
        var emailAddress = $("#email_address").val();
        var password = $('#password').val();
        if(isValidFullName(fullName) && isValidEmailAddress(emailAddress) && isValidPassword(password)){
            var form_data = $(this).serialize();
            var button_content = $(this).find('button[type=submit]');
            button_content.html('please wait..');

            $.ajax({
                url: BASE_URL+"CenNerSys/userRegister",
                type: "POST",
                data: form_data,
                success: function(response){
                    console.log(response);
                if(response == "user_exist")
                {
                    swal("The user is alreay exist!"); 
                    button_content.html('register');
                }
                else if(response == "registered")
                {
                    button_content.html('register');
                    swal("success","You are successfully registered!").then(() =>{
                        window.location = BASE_URL+"account/account";
                    });
                }
                else
                {
                    swal("Failure", "Item is not added to cart", "error");  
                    button_content.html('register');
                }
                }
            });
        }
        else{
            alert("invalid data");
        }
    });
});