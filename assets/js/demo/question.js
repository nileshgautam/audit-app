$(document).ready(function () {

    $('.main_heading').click(function () {
        let id = $(this).attr('id')
        let question = {
            qid: id
        }
        $.ajax({
            type: "POST",
            url: baseUrl + "Home/get_data",
            data: question,
            success: function (newquestion) {

                obj = JSON.parse(newquestion)
                // console.log(obj)
                populate_data(obj)
            },
            error: function () {
                console.log("error logind data")
            }
        });

    });

    function populate_data(obj) {
        // console.log(obj)
        let html = ""
        html = `<ul>`
        for (let i = 0; i < obj.length; i++) {
            html += `<a href="<?php echo base_url('Home/question_view/') ?>${obj[i]['sub_title_code']}"  attr="${obj[i]['sub_title_code']}"><li class="btn-link anchr" ><span>${obj[i]['sub_title_code']}</span> ${obj[i]['sub_title']}</li>`
        }
        html += `</ul>`
        $(".subsection").html(html)
    }

    $("#accordionExample").on('click', 'li', function () {
        let id = $(this).parent().attr('attr')
    });

});