function PackingjobCard() {
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function () {
		if (this.readyState == 4 && this.status == 200) {
			var obj = JSON.parse(this.responseText);
			$('#Packingjobcards').append(createJCPacking(obj));
			//  console.log(obj);
		}
	};
	xhttp.open("GET", baseUrl + "Packing/Packing_jc_list", true);
	xhttp.send();

}

// PackingjobCard();

function acceptQC_3(id,value,unit) {

	let unit_value = $(value).val();
	let w_unit = $(unit).val();
	let weight_unit=unit_value+w_unit;

	// console.log(weight_unit);
	let form = new FormData();
	if(unit_value!=""){
	form.append('id', id);
	form.append('weight_unit', weight_unit);
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function () {
		if (this.readyState == 4 && this.status == 200) {

			showAlert("succeessfuly moved");
			setTimeout(() => {
				location.reload();
			}, 1000);

		}
	};
	xhttp.open("POST", baseUrl + "Packing/updatePackingjobCardState", true);
	xhttp.send(form);
}
else{
		showAlert('order weight required');
}
	// showRecord();
}


function PackingjobCardComplteStage() {
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function () {
		if (this.readyState == 4 && this.status == 200) {
			var obj = JSON.parse(this.responseText);
			$('#PackingCompleteJbcard').append(createCompleteJobCard(obj));
		}
	};
	xhttp.open("GET", baseUrl + "Packing/Packing_jc_CompleteState", true);
	xhttp.send();

}


function rejectbyPackingjobCardState(id) {

	let array = []
	let checkboxes = document.querySelectorAll('input[type=checkbox]:checked')
	for (let i = 0; i < checkboxes.length; i++) {
		array.push(checkboxes[i].value)
	}

	// let remaekbyqc1 = $('#txtremarkbyqc2').val();
	if (array != '') {
		let form = new FormData();
		form.append('id', id);
		form.append('val', array);
		var xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function () {
			if (this.readyState == 4 && this.status == 200) {
				showAlert("succeessfuly moved");
				setTimeout(() => {
					location.reload();
				}, 1000);
				// alert(this.responseText);

			}
		};
		xhttp.open("POST", baseUrl + "Packing/rejectbyPackingjobCardState", true);
		xhttp.send(form);
	} else {
		showAlert('Kindly provide reason move to alter');
	}
}


/**************************************PA Packing card functionality*********************************************/

function Packing_PA_jobCard() {
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function () {
		if (this.readyState == 4 && this.status == 200) {
			var obj = JSON.parse(this.responseText);
			$('#Packingjobcards').append(create_PA_JCPacking(obj));
			console.log(obj);
		}
	};
	xhttp.open("GET", baseUrl + "Packing/Packing_PA_jc_list", true);
	xhttp.send();

}

// PackingjobCard();

function acceptPacking_PA(id) {
	let form = new FormData();
	form.append('id', id);

	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function () {
		if (this.readyState == 4 && this.status == 200) {

			showAlert("succeessfuly moved");
			setTimeout(() => {
				location.reload();
			}, 1000);

		}
	};
	xhttp.open("POST", baseUrl + "Packing/updatePacking_PA_jobCardState", true);
	xhttp.send(form);
	// showRecord();
}


function Packing_PA_jobCardComplteStage() {
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function () {
		if (this.readyState == 4 && this.status == 200) {
			var obj = JSON.parse(this.responseText);
			$('#PackingCompleteJbcard').append(create_PA_CompleteJobCard(obj));
		}
	};
	xhttp.open("GET", baseUrl + "Packing/Packing_PA_jc_CompleteState", true);
	xhttp.send();

}


function rejectbyPacking_PA_jobCardState(id) {

	// 	console.log(id);

	let remaekbyqc1 = $('#txtremarkbyPacking').val();
	if (remaekbyqc1 != '') {
		let form = new FormData();
		form.append('id', id);
		form.append('val', remaekbyqc1);
		var xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function () {
			if (this.readyState == 4 && this.status == 200) {
				showAlert("succeessfuly moved");
				setTimeout(() => {
					location.reload();
				}, 1000);
				// alert(this.responseText);

			}
		};
		xhttp.open("POST", baseUrl + "Packing/rejectbyPacking_PA_jobCardState", true);
		xhttp.send(form);
	} else {
		showAlert('Kindly provide reason move to alter');
	}
}

// load job card views to job card table
function createJCPacking(json) {

	if (json['data'] != '') {
		// console.log("Process", json);
		let rows = json['data'].map((ob, index) => {
			let date = format_Date(ob.jc_created_date);

			let actionHtml = `<i class="fa fa-eye " title="View Job Card" aria-hidden="true" style="color:#4e73df ;right:16px" data-toggle="modal"data-target="#viewModal" onclick="viewJobCard('${ob.internal_order_id}')"></i>

		   <i class="fa fa-check-circle" aria-hidden="true" title="Accept" style="color:green;right:16px" onclick="acceptQC_3('${ob.internal_order_id}','${"#weight_input" + (index + 1)}','${"#weight_sunit" + (index + 1)}')"></i>
		   
           <i class="fa fa-ban" aria-hidden="true" title="Alter" style="color:red;" onclick="rejectbyqc1('${ob.internal_order_id}')" data-toggle="modal" data-target="#rejctModal"></i>`;
			let unit = json['unit'];
			// console.log(unit)
			let input = `<div class="input-group">
			<input type="text" class="form-control" id='weight_input${index + 1}'>
 			 <select class="form-control" id="weight_sunit${index + 1}" name="unit">`

			   	for (let i = 0; i < unit.length; i++) {
					input += `<option>${unit[i]['unit_name']}</option>`
			}
			input += `</select>
		</div>`
			let row = [(index + 1), ob.internal_order_id, date, ob.title, ob.quantity, ob.remark, input, actionHtml];
			return row;
		})
		// console.log(rows);
		table = $('#dataTable').DataTable();
		table.destroy();
		$('#dataTable').DataTable({
			data: rows,
		});
	}
}

// function to load rejected jobcard into the table view 
function packing_alterd_job() {
	let form = new FormData();
	form.append('status', QC_Three_Alter);

	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function () {
		if (this.readyState == 4 && this.status == 200) {
			var obj = JSON.parse(this.responseText);
			$('#packing_altred_job_card_view').append(loadAlterdJobCard(obj));
		}
	};
	xhttp.open("POST", baseUrl + "Qc2/rejcted_job_card_list", true);
	xhttp.send(form);
}