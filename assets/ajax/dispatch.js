function packedJobs() {
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function () {
		if (this.readyState == 4 && this.status == 200) {
			var obj = JSON.parse(this.responseText);
			$('#PackingJbcard').append(packedjobscard(obj));
		}
	};
	xhttp.open("GET", baseUrl + "Dispatch/pack_jc", true);
	xhttp.send();

}
// QC3jobCardComplteStage();


function packed(id) {
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
	xhttp.open("POST", baseUrl + "Dispatch/packed_jc_CompleteState", true);
	xhttp.send(form);
	// showRecord();
}


function packedjobCardComplteStage() {
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function () {
		if (this.readyState == 4 && this.status == 200) {
			var obj = JSON.parse(this.responseText);
			$('#packedJbcard').append(createCompleteJobCard(obj));
		}
	};
	xhttp.open("GET", baseUrl + "Dispatch/packed_jc_CompleteState", true);
	xhttp.send();
}
//

/**********************************PA cards functionality***********************************/

function PA_packedJobs() {
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function () {
		if (this.readyState == 4 && this.status == 200) {
			var obj = JSON.parse(this.responseText);

			$('#jbcard').append(packed_PA_jobscard(obj));
		}
	};
	xhttp.open("GET", baseUrl + "Qc3/Qc3_PA_jc_CompleteState", true);
	xhttp.send();

}
// QC3jobCardComplteStage();


function PA_packed(id) {
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
	xhttp.open("POST", baseUrl + "Dispatch/updatePackedjobCardState", true);
	xhttp.send(form);
	// showRecord();
}


function packed_PA_jobCardComplteStage() {
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function () {
		if (this.readyState == 4 && this.status == 200) {
			var obj = JSON.parse(this.responseText);
			$('#packedJbcard').append(createCompleteJobCard(obj));
		}
	};
	xhttp.open("GET", baseUrl + "Dispatch/packed_jc_CompleteState", true);
	xhttp.send();
}
//
function packedjobscard(json) {
	if (json != '') {
		// console.log("Process", json);
		let rows = json.map((ob, index) => {
			let date = format_Date(ob.jc_created_date);
			let actionHtml = `<i class="fa fa-eye " title="View Job Card" aria-hidden="true" style="color:#4e73df ;right:16px" data-toggle="modal"data-target="#viewModal" onclick="viewJobCard('${ob.internal_order_id}')"></i>

		   <a href="${baseUrl + "Dispatch/dispatchclicked"}/${window.btoa(`${ob.internal_order_id},${ob.order_id}`)}"> <i class="fa fa-plus" aria-hidden="true" title="Add TCI Values" style="color:green" ></i></a>
		   
		   <i class="fa fa-ban" aria-hidden="true" title="Send back to rework" style="color:red;" onclick="rejectbyqc1('${ob.internal_order_id}')" data-toggle="modal" data-target="#rejctModal"></i>`;
			// let row = [(index + 1), ob.internal_order_id, date, ob.product_name, ob.quantity, actionHtml];

			let row = [(index + 1), date, ob.order_id, ob.internal_order_id, ob.title, ob.quantity, actionHtml];
			return row;
		})
		console.log(rows);
		table = $('#dataTable').DataTable();
		table.destroy();
		$('#dataTable').DataTable({
			data: rows,
		});
	}
}

// function to load rejected jobcard into the table view 
function dispatched_alterd_job() {
	let form = new FormData();

	form.append('status', Dispatched_Alter);

	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function () {
		if (this.readyState == 4 && this.status == 200) {

			var obj = JSON.parse(this.responseText);

			console.log(obj);

			$('#dispatched_altred_job_card_view').append(loadAlterdJobCard(obj));
		}
	};
	xhttp.open("POST", baseUrl + "Qc2/rejcted_job_card_list", true);
	xhttp.send(form);
}
// reject seller order 
function sendToPacking() {
	let form = new FormData();
	let id = $('#jobcardid').text();
	let remark = $('#send_remark').val();
	if (remark != '') {
		form.append('id', id);
		form.append('remark', remark);
		let xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function () {
			if (this.readyState == 4 && this.status == 200) {
				showAlert("Order sent back to packing department")
				setTimeout(() => {
					location.reload();;
				}, 1000)
			}
		};
		xhttp.open("POST", baseUrl + "Dispatch/backto_packing", true);
		xhttp.send(form);
	} else {
		showAlert('Remark required')
	}
}
