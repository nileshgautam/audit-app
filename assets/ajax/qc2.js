function QC2jobCard() {
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function () {
		if (this.readyState == 4 && this.status == 200) {
			var obj = JSON.parse(this.responseText);
			$('#Qc2QJbcard').append(createJCqc2(obj));
		}
	};
	xhttp.open("GET", baseUrl + "Qc2/Qc2_jc_list", true);
	xhttp.send();

}

/////QC@ accepted///

function QC2jobCardComplteStage() {
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function () {
		if (this.readyState == 4 && this.status == 200) {
			var obj = JSON.parse(this.responseText);
			$('#Qc2ComplteJbcard').append(createCompleteJobCard(obj));
		}
	};
	xhttp.open("GET", baseUrl + "Qc2/Qc2_jc_CompleteState", true);
	xhttp.send();
}

// QC2jobCardComplteStage();

function acceptQC_2(id) {
	var form = new FormData();
	form.append('id', id);

	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function () {
		if (this.readyState == 4 && this.status == 200) {
			showAlert("Pass to next process");
			setTimeout(() => {
				location.reload();
			}, 1000);

		}
	};
	xhttp.open("POST", baseUrl + "Qc2/updateQC2jobCardState", true);
	xhttp.send(form);

}

function rejectedJobCardByQC2(id) {

	// console.log(id);

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

			}
		};
		xhttp.open("POST", baseUrl + "Qc2/rejectbyQC2jobCardState", true);
		xhttp.send(form);
	} else {
		showAlert('Kindly provide reason move to alter');
	}
}
// function ShowReworkJobCardByQC2() {
// 	// let form = new FormData();
// 	// form.append('id', id);
// 	let xhttp = new XMLHttpRequest();
// 	xhttp.onreadystatechange = function () {
// 		if (this.readyState == 4 && this.status == 200) {
// 			let obj = JSON.parse(this.responseText);
// 			// console.log(obj);
// 			$tablerow = '';
// 			let d = new Date();
// 			for (var i = 0; i < obj.length; i++) {
// 				$tablerow += `<div class="row border">
// 				<div class="col-sm-1 p-0 center fs-12">` + (i + 1) + `</div>
// 				<div class="col-sm-2 p-0  fs-12 ">` + d + `</div>
// 				<div class="col-sm-2 p-0  fs-12 ">` + obj[i]['internal_order_id'] + `</div>
//                 <div class="col-sm-5 p-0  fs-12 ">` + obj[i]['product_name'] + `</div>
//                 <div class="col-sm-1 p-0  fs-12 center">` + obj[i]['quantity'] + `</div>
// 				<div class="col-sm-1 p-0  fs-12 center">
// 				  <a data-toggle="modal" data-target="#reworkModal" attr_id=` + obj[i]['id'] + `  onclick="viewJobCard('` + obj[i]['internal_order_id'] + `')"> <i class="fa fa-edit" style="font-size:10px;color:blue" title="Edit"> </i> </a>

// 				</div>
// 			  </div>`;
// 				$('#jobcardid').text(obj[i]['internal_order_id']);
// 			}
// 			$('#reworkqc2').html('');

// 			$('#reworkqc2').append($tablerow);

// 		}
// 	};
// 	xhttp.open("GET", baseUrl + "Qc2/qc2ReworkJobcard", true);
// 	xhttp.send();
// }
// ShowReworkJobCardByQC2();

// function updateRework(id) {
// 	let form = new FormData();
// 	// 	console.log(id);
// 	let spotting = $('#spotting').val();
// 	let mending = $('#mending').val();
// 	let touching = $('#touching').val();
// 	form.append('id', id);
// 	form.append('spotting', spotting);
// 	form.append('mending', mending);
// 	form.append('touching', touching);

// 	var xhttp = new XMLHttpRequest();
// 	xhttp.onreadystatechange = function () {
// 		if (this.readyState == 4 && this.status == 200) {
// 			location.reload();
// 		}
// 	};
// 	xhttp.open("POST", baseUrl + "Qc2/updateReworktable", true);
// 	xhttp.send(form);

// }

// function ShowOutReworkJobCardByQC2() {
// 	// let form = new FormData();
// 	// form.append('id', id);
// 	let xhttp = new XMLHttpRequest();
// 	xhttp.onreadystatechange = function () {
// 		if (this.readyState == 4 && this.status == 200) {
// 			let obj = JSON.parse(this.responseText);
// 			// console.log(obj);
// 			$tablerow = '';
// 			let d = new Date();
// 			for (var i = 0; i < obj.length; i++) {
// 				$tablerow += `<div class="row border">
// 				<div class="col-sm-1 p-0 center fs-12">` + (i + 1) + `</div>
// 				<div class="col-sm-2 p-0  fs-12 ">` + d + `</div>
// 				<div class="col-sm-2 p-0  fs-12 ">` + obj[i]['internal_order_id'] + `</div>
//                 <div class="col-sm-2 p-0  fs-12 ">` + obj[i]['spotting'] + `</div>
// 				<div class="col-sm-2 p-0  fs-12 center">` + obj[i]['mending'] + `</div>
// 				<div class="col-sm-2 p-0  fs-12 center">` + obj[i]['touching'] + `</div>
// 				<div class="col-sm-1 p-0  fs-12 center">
// 				  <a data-toggle="modal" data-target="#reworkModal" attr_id=` + obj[i]['id'] + `  onclick="viewJobCard('` + obj[i]['internal_order_id'] + `')"> <i class="fa fa-edit" style="font-size:10px;color:blue" title="Edit"> </i> </a>

// 				</div>
// 			  </div>`;
// 				//   $('#jobcardid').text(obj[i]['internal_order_id']);
// 			}
// 			$('#out').html('');

// 			$('#out').append($tablerow);
// 			// showRecord();
// 		}
// 	};
// 	xhttp.open("GET", baseUrl + "Qc2/ShowQc2ReworkJobcard", true);
// 	xhttp.send();
// }
// ShowOutReworkJobCardByQC2();



//PA Qc2 job card functionality
function QC2_PA_jobCard() {
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function () {
		if (this.readyState == 4 && this.status == 200) {
			var obj = JSON.parse(this.responseText);
			$('#Qc2QJbcard').append(create_PA_JCqc2(obj));
		}
	};
	xhttp.open("GET", baseUrl + "Qc2/Qc2_PA_jc_list", true);
	xhttp.send();

}

/////QC@ accepted///

function QC2_PA_jobCardComplteStage() {
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function () {
		if (this.readyState == 4 && this.status == 200) {
			var obj = JSON.parse(this.responseText);
			$('#Qc2ComplteJbcard').append(create_PA_CompleteJobCard(obj));
		}
	};
	xhttp.open("GET", baseUrl + "Qc2/Qc2_PA_jc_CompleteState", true);
	xhttp.send();
}
//QC2jobCardComplteStage();

function accept_PA_QC_2(id) {
	var form = new FormData();
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
	xhttp.open("POST", baseUrl + "Qc2/updateQC2_PA_jobCardState", true);
	xhttp.send(form);
	// 	showRecord();
}

function rejected_PA_JobCardByQC2(id) {

	// console.log(id);
	let remaekbyqc1 = $('#txtremarkbyqc2').val();
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

			}
		};
		xhttp.open("POST", baseUrl + "Qc2/rejectbyQC2_PA_jobCardState", true);
		xhttp.send(form);
	} else {
		showAlert('Kindly provide reason move to alter');
	}
}

// load jobcard table view 
function createJCqc2(json) {
	if (json != '') {

		// console.log("Process", json);
		let rows = json.map((ob, index) => {

			let date = format_Date(ob.jc_created_date);

			let actionHtml = `<i class="fa fa-eye " title="View Job Card" aria-hidden="true" style="color:#4e73df ;right:16px" data-toggle="modal"data-target="#viewModal" onclick="viewJobCard('${ob.internal_order_id}')"></i>

		   <i class="fa fa-check-circle" aria-hidden="true" title="Pass" style="color:green; right:16px;" onclick="acceptQC_2('${ob.internal_order_id}')"></i>

		   <i class="fa fa-ban" aria-hidden="true" title="Fail" style="color:red;" onclick="rejectbyqc1('${ob.internal_order_id}')" data-toggle="modal" data-target="#rejctModal"></i>`;

			// let row = [(index + 1), ob.internal_order_id, date[0], ob.product_name, ob.quantity, ob.remark, actionHtml];

			let row = [(index + 1), ob.internal_order_id, date, ob.title, ob.quantity, ob.remark, actionHtml];

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
function QC2_alterd_job() {
	let form = new FormData();
	form.append('status', QC_Two_Alter);
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function () {
		if (this.readyState == 4 && this.status == 200) {
			var obj = JSON.parse(this.responseText);
			$('#Qc2_altred_job_card_view').append(loadAlterdJobCard(obj));
		}
	};
	xhttp.open("POST", baseUrl + "Qc2/rejcted_job_card_list", true);
	xhttp.send(form);
}
