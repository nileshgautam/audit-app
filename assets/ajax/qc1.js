///load data from db using ajax
function QC1jobCardStage() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var obj = JSON.parse(this.responseText);
            $('#jobcards').append(createJCqc1(obj));
        }
    };
    xhttp.open("GET", baseUrl + "Qc1/Qc1_jc_jobcardState", true);
    xhttp.send();
}


////////////Qc_Complte_job////////////////////
function QC1jobCardComplteStage() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var obj = JSON.parse(this.responseText);
            $('#Qc1CompleteJbcard').append(createCompleteJobCard(obj));
        }
    };
    xhttp.open("GET", baseUrl + "Qc1/Qc1_jc_CompleteState", true);
    xhttp.send();
    
}

//////////////end of QC_Complete_Job


function rejectbyqc1(id){
    var form = new FormData();
    form.append('id', id);

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            location.reload();
        }
    };
    xhttp.open("POST", baseUrl + "Qc1/rejectQC1JCbyQC1", true);
    xhttp.send(form);
    // showRecord();
}

function rejectedJobCard(id){

// console.log(id);
let array = []
let checkboxes = document.querySelectorAll('input[type=checkbox]:checked')
for (let i = 0; i < checkboxes.length; i++) {
  array.push(checkboxes[i].value)
}
// console.log(array);

if(array!=''){
 let form = new FormData();
form.append('id',id);
form.append('val',array);
var xhttp = new XMLHttpRequest();
 xhttp.onreadystatechange = function () {
if (this.readyState == 4 && this.status == 200) {
            
 showAlert("Back to the previous process");
           setTimeout(() => {
            location.reload();
        }, 1000);
        }
    };
    xhttp.open("POST", baseUrl + "Qc1/rejectbyQC1jobCardState", true);
    xhttp.send(form);
}
else{
    showAlert("Kindly provide reason, for alter")
}
}


//PA qc cards functionality

///load data from db using ajax
function QC1_PA_jobCardStage() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var obj = JSON.parse(this.responseText);
            // console.log(obj)
            $('#jobcards').append(create_PA_JCqc1(obj));
        }
    };
    xhttp.open("GET", baseUrl + "Qc1/Qc1_pa_jobcardState", true);
    xhttp.send();
}

function rejected_PA_JobCard(id){
    // console.log(id);
    let remaekbyqc1=$('#txtremarkbyqc1').val();
    if(remaekbyqc1!=''){
    let form = new FormData();
    form.append('id',id);
    form.append('val',remaekbyqc1);
    var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                
            showAlert("succeessfuly moved");
               setTimeout(() => {
                location.reload();
            }, 1000);
            }
        };
        xhttp.open("POST", baseUrl + "Qc1/rejectbyQC1_PA_jobCardState", true);
        xhttp.send(form);
    }
    else{
        showAlert("Kindly provide reason, move to alter")
    }
    }

    ////////////PA_Qc_Complte_job////////////////////
function QC1_PA_jobCardComplteStage() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var obj = JSON.parse(this.responseText);
            
            $('#Qc1CompleteJbcard').append(create_PA_CompleteJobCard(obj));
        }
    };
    xhttp.open("GET", baseUrl + "Qc1/Qc1_PA_jc_CompleteState", true);
    xhttp.send();
    
}
// load job card data in into the table view using ajax
function createJCqc1(json) {
	if (json != '') {
		// console.log("Process", json);
		let rows = json.map((ob, index) => {
			let date = format_Date(ob.jc_created_date);
			let actionHtml = `<i class="fa fa-eye " title="View Job Card" aria-hidden="true" style="color:#4e73df ;right:16px" data-toggle="modal"data-target="#viewModal" onclick="viewJobCard('${ob.internal_order_id}')"></i>
           <i class="fa fa-check-circle" style="color:green;right:16px; aria-hidden="true" title="Pick to next process" onclick="acceptQC_1('${ob.internal_order_id}')"></i>
           <i class="fa fa-ban" aria-hidden="true" title="Alter" style="color:red;" onclick="rejectbyqc1('${ob.internal_order_id}')" data-toggle="modal" data-target="#rejctModal"></i>`;
			// let row = [(index + 1), ob.internal_order_id, date[0], ob.product_name, ob.quantity, ob.remark, actionHtml];

			let row = [(index + 1), ob.internal_order_id, date, ob.title, ob.quantity, ob.remark, ob.sp_remark, actionHtml];
			return row;
		})
		// console.log(rows);
		table = $('#dataTable1').DataTable();
		table.destroy();
		$('#dataTable1').DataTable({
			data: rows,
		});
	}
}

// function to load rejected jobcard into the table view 
function QC1_alterd_job() {
	let form = new FormData();
	form.append('status', QC_One_Alter);
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function () {
		if (this.readyState == 4 && this.status == 200) {
			var obj = JSON.parse(this.responseText);
			$('#Qc1_altred_job_card_view').append(loadAlterdJobCard(obj));
		}
	};
	xhttp.open("POST", baseUrl + "Qc2/rejcted_job_card_list", true);
	xhttp.send(form);
}