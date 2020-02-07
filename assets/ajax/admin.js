
  ///get details recodrs by id in edit model
  function getDetails(id) {
    // $('#hidden_user_id').val(id);
    let form = new FormData();
    form.append('id', id)
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        var arryobj = JSON.parse(this.responseText);
        // console.log(arryobj);
        $('#FirstName').val(arryobj[0]['f_name']);
        $('#LastName').val(arryobj[0]['l_name']);
        $('#InputEmail').val(arryobj[0]['email']);
        $('#InputPassword').val(arryobj[0]['password']);
        $('#RepeatPassword').val(arryobj[0]['password']);
        $('#update_sel1').val(arryobj[0]['role_status']);
        $('#us_name').val(arryobj[0]['short_name']);
        // $('#read').val(arryobj[0]['read']);
        // $('#write').val(arryobj[0]['add']);
        // $('#update').val(arryobj[0]['edit']);
        // $('#delete').val(arryobj[0]['remove']);
        $('#hidden_user_id').val(arryobj[0]['id']);
      }
    };
    xhttp.open("POST", baseUrl + 'Admin/read_records', true);
    xhttp.send(form);
    // showRecord();
  }


  ////////////////Add Records recoeds from table////////////////// by AJAX
  function addRecord() {
    var form = new FormData(document.getElementById('addUser'));
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        // alert($this.responseText)
        var obj = JSON.parse(this.responseText);
        $tablerow = '';
        iconColor = 'green';

        for (var i = 0; i < obj.length; i++) {

          (obj[i]['read'] == 'on' ? readIconColor = 'green' : readIconColor = 'red');
          (obj[i]['edit'] == 'on' ? updateIconColor = 'green' : updateIconColor = 'red');
          (obj[i]['add'] == 'on' ? writeIconColor = 'green' : writeIconColor = 'red');
          (obj[i]['remove'] == 'on' ? deleteIconColor = 'green' : deleteIconColor = 'red');

          $tablerow += `<tr role="row" class="odd">
                        <td class="sorting_1">` + i + `</td>
                        <td>` + obj[i]['user_name'] + `</td>
                        <td>` + obj[i]['username'] + `</td>
                        <td>` + obj[i]['password'] + `</td>
                        <td>` + obj[i]['role_status'] + `</td>
                        <td class="center">
                          <a data-toggle="modal" data-target="#myModal2" attr_id=` + obj[i]['id'] + `  onclick="getDetails('` + obj[i]['id'] + `')"> <i class="fa fa-edit" style="font-size:10px;color:blue" title="Edit"> </i> </a>
                          <a onclick="deleteRecord('` + obj[i]['id'] + `')"> <i class="fa fa-times" style="font-size:10px;color:red" aria-hidden="true" title="Delete"></i></a>
                        </td>
                      </tr>`;
        }

        $('#userdata').html('');

        $('#userdata').append($tablerow);
        // showRecord();
      }
    };
    xmlhttp.open("post", baseUrl + 'Admin/get_ajax_data', true);
    xmlhttp.send(form);
  }

  // showRecord();
  ////////////////Show recoeds from database table////////////////// by AJAX
  function showRecord() {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {

      if (this.readyState == 4 && this.status == 200) {

        var obj = JSON.parse(this.responseText);
        $('#userdata').append(userdata(obj));
      }
    };
    xmlhttp.open("get", baseUrl + "Admin/get_ajaxmy_data", true);
    xmlhttp.send();
  }


  ////////////////Delete recoeds from table////////////////// by AJAX
  function deleteRecord(deleteid) {
    // console.log(deleteid)
    let conf = confirm('Are you sure wants to delete');
    var form = new FormData();
    form.append('id', deleteid)
    if (conf == true) {
      let xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          showAlert(this.responseText,"success");
          setTimeout(() => {
            location.reload();
        }, 1000);
        };
      }
      xmlhttp.open("post", baseUrl + 'Admin/delete_records', true);
      xmlhttp.send(form);
      // showRecord();
    }
  }
  //////////////////////Update recodords/////////
  function updateRecord() {
    let id = document.getElementById('hidden_user_id').value;
    var form = new FormData(document.getElementById('updateuser'));
    form.append('id', id);
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        showAlert(this.responseText,"success");
        setTimeout(() => {
          location.reload();
      }, 1000);
      }
    };
    xhttp.open("POST", baseUrl + 'Admin/update_user_records', true);
    xhttp.send(form);
    // showRecord();
  }
  
// display employee records in tabular format using ajax
  function userdata(json) {
    if (json != '') {
      // console.log("Admin", json);
      let rows = json.map((ob, index) => {
        // let date = ob.jc_created_date.split(" ");
        let actionHtml = `
      <a data-toggle="modal" data-target="#myModal2" attr_id="${ob.id}" onclick="getDetails('${ob.id}')"> <i class="fa fa-edit" style="font-size:10px;color:blue" title="Edit"> </i> </a>
      <a onclick="deleteRecord('${ob.id}')"> <i class="fa fa-trash text-danger" style="font-size:10px" aria-hidden="true" title="Delete"></i>
      `;
        let row = [(index + 1), ob.f_name + " " + ob.l_name, ob.email, ob.password, ob.role_status, actionHtml];
  
        // let row = [(index + 1), ob.internal_order_id, date[0], ob.title, ob.quantity, ob.remark, ob.sp_remark, actionHtml];
        return row;
      })
      // console.log(rows);
      table = $('#dataTableuser').DataTable();
      table.destroy();
      $('#dataTableuser').DataTable({
        data: rows,
      });
    }
  }
 