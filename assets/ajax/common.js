
function create_PA_JCqc1(json) {
	if (json != '') {
		// console.log("Process", json);
		let rows = json.map((ob, index) => {
			let date = ob.created_date.split(" ");
			let actionHtml = `<i class="fa fa-eye " title="View Job Card" aria-hidden="true" style="color:#4e73df ;right:16px" data-toggle="modal"data-target="#viewModal" onclick="view_PA_JobCard('${ob.card_id}')"></i>
           <i class="fa fa-check-circle" style="color:green;right:16px; aria-hidden="true" title="Pick to next process" onclick="PA_acceptQC_1('${ob.card_id}')"></i>
           <i class="fa fa-ban" aria-hidden="true" title="Alter" style="color:red;" onclick="rejectbyqc1('${ob.card_id}')" data-toggle="modal" data-target="#rejctModal"></i>`;
			let row = [ob.pa_no, ob.card_id, date[0], ob.m_sku, ob.title, ob.quantity, ob.size, ob.colour, ob.remark, actionHtml];
			// let row = [(index + 1), ob.internal_order_id, date[0], ob.title, ob.quantity, ob.remark, ob.sp_remark, actionHtml];
			return row;
		})
		// console.log(rows);
		table = $('#pa_card_table').DataTable();
		table.destroy();
		$('#pa_card_table').DataTable({
			data: rows,
		});
	}
}


function create_PA_JCqc2(json) {
	if (json != '') {


		//console.log(json);
		let rows = json.map((ob, index) => {

			let date = ob.created_date.split(" ");

			let actionHtml = `<i class="fa fa-eye " title="View Job Card" aria-hidden="true" style="color:#4e73df ;right:16px" data-toggle="modal"data-target="#viewModal" onclick="view_PA_JobCard('${ob.card_id}')"></i>

		   <i class="fa fa-check-circle" aria-hidden="true" title="Accept" style="color:green; right:16px;" onclick="accept_PA_QC_2('${ob.card_id}')"></i>
		   <i class="fa fa-ban" aria-hidden="true" title="Alter" style="color:red;" onclick="rejectbyqc1('${ob.card_id}')" data-toggle="modal" data-target="#rejctModal"></i>`;

			 let row = [ob.pa_no, ob.card_id, date[0], ob.m_sku, ob.title, ob.quantity, ob.size, ob.colour, ob.remark, actionHtml];

			//let row = [(index + 1), ob.internal_order_id, date[0], ob.title, ob.quantity, ob.remark, ob.sp_remark, actionHtml];
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

function create_pa_ProcessJobCard(json) {
	if (json != '') {
		//console.log("Process", json);
		let rows = json.map((ob, index) => {
			let date = ob.created_date.split(" ");
			let actionHtml = `<i class="fa fa-eye " title="View Job Card" aria-hidden="true" style="color:#4e73df ;right:16px" data-toggle="modal"data-target="#viewModal" onclick="view_PA_JobCard('${ob.card_id}')"></i>
       <i class="fa fa-check-circle" aria-hidden="true"  style="color:green;right:16px; title="Pick to next process" onclick="update_PA('${ob.card_id}')"></i>`;
			let row = [ob.pa_no, ob.card_id, date[0], ob.m_sku, ob.title, ob.quantity, ob.size, ob.colour, ob.remark, actionHtml];
			return row;
		})
		// console.log(rows);
		table = $('#pa_card_table').DataTable();
		table.destroy();
		$('#pa_card_table').DataTable({
			data: rows,
		});
	}

}
// common functon to load records into the table from database in all complete online job cards
function createCompleteJobCard(json) {
	// console.log("Complete", json);
	if (json != '') {
		let rows = json.map((ob, index) => {
			let date = format_Date(ob.jc_created_date);
			let actionHtml = `<i class="fa fa-eye " title="View Job Card" aria-hidden="true" style="color:#4e73df ;right:16px" data-toggle="modal"data-target="#viewModal" onclick="viewJobCard('${ob.internal_order_id}')"></i>`;;
			// let row = [(index + 1), ob.internal_order_id, date[0], ob.product_name, ob.quantity, actionHtml];

			let row = [(index + 1), date, ob.order_id, ob.internal_order_id, ob.title, ob.quantity, actionHtml];
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
// common functon to load records into the table from database in all PA complete job cards
function create_PA_CompleteJobCard(json) {
	// console.log("Complete", json);
	if (json != '') {
		let rows = json.map((ob, index) => {
			let date = ob.created_date.split(" ");
			let actionHtml = `<i class="fa fa-eye " title="View Job Card" aria-hidden="true" style="color:#4e73df ;right:16px" data-toggle="modal"data-target="#viewModal" onclick="view_PA_JobCard('${ob.card_id}')"></i>`;;
			let row = [ob.pa_no, ob.card_id, date[0], ob.m_sku, ob.title, ob.quantity, ob.size, ob.colour, ob.remark, actionHtml];
			return row;
		})
		// console.log(rows);
		table = $('#dataTable_PA').DataTable();
		table.destroy();
		$('#dataTable_PA').DataTable({
			data: rows,
		});
	}
}

// common functon to load records into the table from database in all complete job cards
function loadAlterdJobCard(json) {
	// console.log("Complete", json);
	if (json != '') {
		let rows = json.map((ob, index) => {
			let date = format_Date(ob.jc_created_date);
			let actionHtml = `<i class="fa fa-eye " title="View Job Card" aria-hidden="true" style="color:#4e73df ;right:16px" data-toggle="modal"data-target="#viewModal" onclick="viewJobCard('${ob.internal_order_id}')"></i>`;;
			// let row = [(index + 1), ob.internal_order_id, date[0], ob.product_name, ob.quantity, actionHtml];

			let row = [(index + 1), date, ob.order_id, ob.internal_order_id, ob.title, ob.quantity, ob.remark, actionHtml];
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


function create_PA_JCPacking(json) {

	if (json != '') {
		// console.log("Process", json);
		let rows = json.map((ob, index) => {
			let date = ob.created_date.split(" ");
			let actionHtml = `<i class="fa fa-eye " title="View Job Card" aria-hidden="true" style="color:#4e73df ;right:16px" data-toggle="modal"data-target="#viewModal" onclick="view_PA_JobCard('${ob.card_id}')"></i>
           <i class="fa fa-check-circle" aria-hidden="true" title="Accept" style="color:green;right:16px" onclick="acceptPacking_PA('${ob.card_id}')"></i>
           <i class="fa fa-ban" aria-hidden="true" title="Alter" style="color:red;" onclick="rejectbyqc1('${ob.card_id}')" data-toggle="modal" data-target="#rejctModal"></i>`;
			let row = [ob.pa_no, ob.card_id, date[0], ob.m_sku, ob.title, ob.quantity, ob.size, ob.colour, ob.remark, actionHtml];
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

function packed_PA_jobscard(json) {
	if (json != '') {

		// console.log("Process", json);
		let rows = json.map((ob, index) => {
			let date = ob.created_date.split(" ");
			let actionHtml = `<i class="fa fa-eye " title="View Job Card" aria-hidden="true" style="color:#4e73df ;right:16px" data-toggle="modal"data-target="#viewModal" onclick="view_PA_JobCard('${ob.card_id}')"></i>

        
          `;
			let row = [ob.pa_no, ob.card_id, date[0], ob.m_sku, ob.asin, ob.fnsku, ob.quantity, ob.boxes, ob.size, ob.colour, actionHtml];
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

function viewTransaction(id) {
	if (id != '') {
		let form = new FormData();
		form.append('id', id);
		// console.log(id)
		let xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function () {
			if (this.readyState == 4 && this.status == 200) {
				let arryobj = JSON.parse(this.responseText);
				//console.log(arryobj);

				function filtered_DateTime(status) {
					let filtered = arryobj.filter(ob => {
						return ob.status == status
					});
					if (filtered != "") {
						let maxObj = filtered.reduce((max, ob) => {
							let date1 = new Date(max.date_time);
							let obdate = new Date(ob.date_time);
							return date1 > obdate ? max : ob;
						});
						return maxObj;
					}
				}
				//console.log(filtered);
				$('td').next().empty();



				$('#transactionModalLabel').text((arryobj[0] !== undefined) ? arryobj[0]['Job_card_id'] : "");

				let process = (arryobj[0] !== undefined && filtered_DateTime("O_Ready_For_QC1") !== undefined) ? jobdate = dateTimeValue(arryobj[0]['date_time'], filtered_DateTime("O_Ready_For_QC1")['date_time']) : "NA";
				if (process != " ") {


					($('#processingdays').text(process['days']));
					$('#processinghours').text(process['hours']);
					$('#processingminutes').text(process['minutes']);
					$('#processingSeconds').text(process['seconds']);
				}

				let qcone = (filtered_DateTime("O_Ready_For_QC1") !== undefined && filtered_DateTime("QC1_Accepted") !== undefined) ? jobdate = dateTimeValue(filtered_DateTime("O_Ready_For_QC1")['date_time'], filtered_DateTime("QC1_Accepted")['date_time']) : "NA";
				if (qcone != " ") {

					$('#qc1days').text(qcone['days']);
					$('#qc1hours').text(qcone['hours']);
					$('#qc1minutes').text(qcone['minutes']);
					$('#qc1Seconds').text(qcone['seconds']);
				}

				let qctwo = (filtered_DateTime("QC1_Accepted") !== undefined && filtered_DateTime("QC2_Accepted") !== undefined) ? jobdate = dateTimeValue(filtered_DateTime("QC1_Accepted")['date_time'], filtered_DateTime("QC2_Accepted")['date_time']) : "NA";
				if (qctwo != " ") {

					$('#qc2days').text(qctwo['days']);
					$('#qc2hours').text(qctwo['hours']);
					$('#qc2minutes').text(qctwo['minutes']);
					$('#qc2Seconds').text(qctwo['seconds']);
				}

				let qcthree = (filtered_DateTime("QC2_Accepted") !== undefined && filtered_DateTime("QC3_Accepted") !== undefined) ? jobdate = dateTimeValue(filtered_DateTime("QC2_Accepted")['date_time'], filtered_DateTime("QC3_Accepted")['date_time']) : "NA";
				if (qcthree != " ") {

					$('#Packingdays').text(qcthree['days']);
					$('#Packinghours').text(qcthree['hours']);
					$('#Packingminutes').text(qcthree['minutes']);
					$('#PackingSeconds').text(qcthree['seconds']);
				}

				let packing = (filtered_DateTime("QC3_Accepted") !== undefined && filtered_DateTime("Job_Closed") !== undefined) ? jobdate = dateTimeValue(filtered_DateTime("QC3_Accepted")['date_time'], filtered_DateTime("Job_Closed")['date_time']) : "NA";
				
				if (packing != " ") {

					$('#packingdays').text(packing['days']);
					$('#packinghours').text(packing['hours']);
					$('#packingminutes').text(packing['minutes']);
					$('#packingSeconds').text(packing['seconds']);
				}
			
			}
		}
		xhttp.open("POST", baseUrl + "Backend/viewJobCardTransaction", true);
		xhttp.send(form);
	}
}

// common function to
function viewJobCard(id) {
	if (id != '') {
		let form = new FormData();
		form.append('id', id)
		let xhttp = new XMLHttpRequest();

		xhttp.onreadystatechange = function () {
			if (this.readyState == 4 && this.status == 200) {
				let arryobj = JSON.parse(this.responseText);

				let sku = arryobj[0]['sku'].split("-") //Ckeck product is combo or not
				if (sku[0] == "COM") {
					let details = JSON.parse(arryobj[0]['details']);
					$('.remove').remove()
					let product_name = arryobj[0]['product_name'].split("+");
					for (data of details) {
						//console.log(product_name)
						let date = arryobj[0]['jc_created_date'].split(" ");
						$('#orderNo').text(arryobj[0]['order_id']);
						$('#createDate').text(format_Date(date[0]));
						$('#jobCardId').text(arryobj[0]['internal_order_id']);
						$('#qty').append(`<div class="col-sm-3 border remove">${data['quantity']}</div>`);
						$('#sizes').append(`<div class="col-sm-3 border remove">${escapeHtml_decode(data['Size'])}</div>`);
						$('#shades').append(`<div class="col-sm-3 border remove">${data['Color']}</div>`);
						$('#sellerName').text(arryobj[0]['merchant_id']);
						$('#title').text(arryobj[0]['title']);
						$('#ship_service_level').text(arryobj[0]['ship_service_level']);
						$('#special_remark').text(arryobj[0]['sp_remark']);
						$('#remark').text(arryobj[0]['remark']);
						// $('#jobcardid').text(arryobj[0]['remark']);
						jobcid = arryobj[0]['id'];
					} 
					for(let i=0;i<product_name.length;i++){
						$('#Item').append(`<div class="col-sm-3 border remove">${product_name[i]}</div>`);}
					if (sku.length - 2 == "2") {
						$('#Item').append(`<div class="col-sm-2 border remove"></div>`);
						$('#sizes ').append(`<div class="col-sm-2 border remove"></div>`);
						$('#qty ').append(`<div class="col-sm-2 border remove"></div>`);
						$('#shades ').append(`<div class="col-sm-2 border remove"></div>`);
					}
				} else {
				
					let details = (JSON.parse(arryobj[0]['details']));
					append_card_column()
					let date = arryobj[0]['jc_created_date'].split(" ");
					$('#orderNo').text(arryobj[0]['order_id']);
					$('#createDate').text(format_Date(date[0]));
					$('#jobCardId').text(arryobj[0]['internal_order_id']);
					$('#quantity').text(arryobj[0]['quantity']);
					$('#Size').text(escapeHtml_decode(details['Size']));
					$('#Items').text(arryobj[0]['product_name']);
					$('#Shade').text(details['Color']);
					$('#sellerName').text(arryobj[0]['merchant_id']);
					$('#title').text(arryobj[0]['title']);
					$('#ship_service_level').text(arryobj[0]['ship_service_level']);
					$('#special_remark').text(arryobj[0]['sp_remark']);
					$('#remark').text(arryobj[0]['remark']);
					$('#jobcardid').text(arryobj[0]['remark']);
					jobcid = arryobj[0]['id'];
				}


			}
		};

		xhttp.open("POST", baseUrl + "Backend/viewJobCard", true);
		xhttp.send(form);
	}
}

function append_card_column(length1){
	$('.remove').remove()
	$('#Item').append(`<div class="col-sm-3 border remove" id="Items"></div>
	<div class="col-sm-3 border remove"></div>
	<div class="col-sm-2 border remove"></div>`);
	$('#sizes ').append(`<div class="col-sm-3 border remove" id="Size"></div>
	<div class="col-sm-3 border remove"></div>
	<div class="col-sm-2 border remove"></div>`);
	$('#qty ').append(`<div class="col-sm-3 border remove" id="quantity"></div>
	<div class="col-sm-3 border remove"></div>
	<div class="col-sm-2 border remove"></div>`);
	$('#shades ').append(`<div class="col-sm-3 border remove" id="Shade"></div>
	<div class="col-sm-3 border remove"></div>
	<div class="col-sm-2 border remove"></div>`);

}

function view_PA_JobCard(id) {
	//console.log(id)
	if (id != '') {
		let form = new FormData();
		form.append('id', id)
		let xhttp = new XMLHttpRequest();

		xhttp.onreadystatechange = function () {
			if (this.readyState == 4 && this.status == 200) {
				let arryobj1 = JSON.parse(this.responseText);
				//console.log(arryobj1['pa_data']);
				let arryobj = arryobj1['pa_data']
				let date = arryobj[0]['created_date'].split(" ");
				$('#pa_no').text(arryobj[0]['pa_no']);
				$('#title').text(arryobj[0]['title']);
				$('#orderNo').text(arryobj[0]['order_id']);
				$('#createDate').text(date[0]);
				$('#jobCardId').text(arryobj[0]['card_id']);
				$('#quantity').text(arryobj[0]['quantity']);
				$('#Size').text(arryobj[0]['size']);
				$('#w_care').text(arryobj1['pa_data2'][0]['washcare'])
				$('#Shade').text(arryobj[0]['colour']);
				$('#sellerName').text(arryobj[0]['merchant_id']);
				jobcid = arryobj[0]['id'];
			}
		};

		xhttp.open("POST", baseUrl + `Backend/view_PA_JobCard/${btoa($("#jbcard tr:first td:first").text())}`, true);
		xhttp.send(form);
	}
}

function dateTimeValue(startDateTime, endDateTime) {

	let d = new Date(startDateTime);
	let d1 = new Date(endDateTime);
	let delta = Math.abs(d1 - d) / 1000;

	// calculate (and subtract) whole days
	let days = Math.floor(delta / 86400);
	delta -= days * 86400;

	// calculate (and subtract) whole hours
	let hours = Math.floor(delta / 3600) % 24;
	delta -= hours * 3600;

	// calculate (and subtract) whole minutes
	let minutes = Math.floor(delta / 60) % 60;
	delta -= minutes * 60;

	// what's left is seconds
	let seconds = delta % 60;

	let completeDateTime = {
		"days": days,
		"hours": hours,
		"minutes": minutes,
		"seconds": seconds
	};
	return completeDateTime;

}
//pick jobcard to next process
function update(id) {
	if (id != '') {
		let form = new FormData();
		form.append('id', id);
		let xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function () {
			if (this.readyState == 4 && this.status == 200) {
				// alert(this.responseText);
				showAlert(this.responseText, "success");
				setTimeout(() => {
					location.reload();
				}, 250);



			}
		};
		xhttp.open("POST", baseUrl + "Backend/updateStatejobCard", true);
		xhttp.send(form);
		//showRecord();
	}
}

//pick PA_jobcard to next process
function update_PA(id) {
	if (id != '') {
		let form = new FormData();
		form.append('id', id);
		let xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function () {
			if (this.readyState == 4 && this.status == 200) {
				// alert(this.responseText);
				showAlert(this.responseText, "success");
				setTimeout(() => {
					location.reload();
				}, 250);



			}
		};
		xhttp.open("POST", baseUrl + "Backend/update_PA_jobCard", true);
		xhttp.send(form);
	}

}

let jobcid = null;
// ////view job card /////
function openWin() {
	//if (id != '') {
	//alert(jobid);
	let url = "../jobCard/?id=" + jobcid;
	console.log(url)
	let mywindow = window.open(url, "", "width=1000,height=700%");

	mywindow.print();

	setTimeout(() => {
		mywindow.close();
	}, 1000)

	//}
}
//Accected by QC11 to change job state

function acceptQC_1(id) {
	if (id != '') {
		let form = new FormData();
		form.append('id', id);
		let xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function () {
			if (this.readyState == 4 && this.status == 200) {

				showAlert("Job card Successfully sent to the next process.")
				setTimeout(() => {
					location.reload();
				}, 1000)

			}
		};
		xhttp.open("POST", baseUrl + "Qc1/updateQCjobCardState", true);
		xhttp.send(form);
	}
	// showRecord();
}

function send_All_processJC_to_stiching() {

	xhttp.onreadystatechange = function () {
		if (this.readyState == 4 && this.status == 200) {

			showAlert("All Job card Successfully sent to the next process.")
			setTimeout(() => {
				location.reload();
			}, 1000)
		}
	};
	xhttp.open("POST", baseUrl + "Backend/sendAll_JC_to_Stitching", true);
	// xhttp.send(form);
	// // showRecord();
}

function PA_acceptQC_1(id) {
	if (id != '') {
		let form = new FormData();
		form.append('id', id);
		let xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function () {
			if (this.readyState == 4 && this.status == 200) {

				showAlert("Job card Successfully sent to the next process.")
				setTimeout(() => {
					location.reload();
				}, 1000)

			}
		};
		xhttp.open("POST", baseUrl + "Qc1/updateQC_PA_jobCardState", true);
		xhttp.send(form);
	}
	// showRecord();
}

//Accected by QC1 to update job card status
function updateQC1JobState(id) {
	if (id != '') {
		let form = new FormData();
		form.append('id', id);
		let xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function () {
			if (this.readyState == 4 && this.status == 200) {

				showAlert("Successfully accepted")
				setTimeout(() => {
					location.reload();;
				}, 1000)

			}
		};
		xhttp.open("POST", baseUrl + "Qc1/updateCurrentQC1jobCardState", true);
		xhttp.send(form);


	}

}
// rejected by QC1....
function rejectbyqc1(id) {
	if (id != '') {
		let form = new FormData();
		form.append('id', id);

		let xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function () {
			if (this.readyState == 4 && this.status == 200) {
				location.reload();
			}
		};
		xhttp.open("POST", baseUrl + "Qc1/rejectbyQC1jobCardState", true);
		xhttp.send(form);
	}
	// showRecord();
}

// rejected by QC1_PA....
function PA_rejectbyqc1(id) {
	if (id != '') {
		let form = new FormData();
		form.append('id', id);

		let xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function () {
			if (this.readyState == 4 && this.status == 200) {
				location.reload();
			}
		};
		xhttp.open("POST", baseUrl + "Qc1/rejectbyQC1_PA_jobCardState", true);
		xhttp.send(form);
	}
	// showRecord();
}


function rejectbyqc1(id) {
	if (id != '') {

		// 	console.log(id);

		$('#jobcardid').text(id);
	}

}

function validation() {
	let fname = document.forms["adduser"]["f_name"];
	let lname = document.forms["adduser"]["l_name"];
	let email = document.forms["adduser"]["email"];
	let sname = document.forms["adduser"]["s_s_name"];
	let pass = document.forms["adduser"]["pass"];
	let repass = document.forms["adduser"]["repass"];
	// let read = document.forms["adduser"]["Read"];
	let what = document.forms["adduser"]["role"];
	// let add = document.forms["adduser"]["Insert"];
	// let edit = document.forms["adduser"]["Update"];
	// let remove = document.forms["adduser"]["Delete"];


	if (fname.value == "") {
		showAlert("Please enter your First name.", 'danger');
		fname.focus();
		return false;
	}
	if (lname.value == "") {
		window.alert("Please enter your Last name.");
		lname.focus();
		return false;
	}

	if (email.value == "") {
		window.alert("Please enter a valid e-mail address.");
		email.focus();
		return false;
	}

	if (email.value.indexOf("@", 0) < 0) {
		window.alert("Please enter a valid e-mail address.");
		email.focus();
		return false;
	}

	if (email.value.indexOf(".", 0) < 0) {
		window.alert("Please enter a valid e-mail address.");
		email.focus();
		return false;
	}

	if (pass.value == "") {
		window.alert("Please enter your password");
		pass.focus();
		return false;
	}

	if (repass.value == "") {
		window.alert(" Re-enter Password.");
		repass.focus();
		return false;
	}


	if (pass.value != repass.value) {
		// 		console.log(pass.value);
		// 		console.log(repass.value);
		window.alert("Password not matched.");
		repass.focus();
		return false;
	}

	if (what.selectedIndex < 1) {
		alert("Please select user role .");
		what.focus();
		return false;
	}
	if (sname.value == "") {
		window.alert("Please enter your user short Name.");
		sname.focus();
		return false;
	}
	// (?:);
	(read == '' ? read = 'off' : read = 'on');
	(add == '' ? read = 'off' : read = 'on');
	(edit == '' ? read = 'off' : read = 'on');
	(remove == '' ? read = 'off' : read = 'on');

	return true;
}

// function validate_QC_2_rejction() {
// 	let spoting = document.forms["qc2form"]["Soting"];
// 	let mending = document.forms["qc2form"]["Mending"];
// 	let touching = document.forms["qc2form"]["Tuching"];
// 	let sname = document.forms["qc2form"]["s_s_name"];
// 	let pass = document.forms["qc2form"]["pass"];



// 	if (fname.value == "") {
// 		window.alert("Please enter your  First name.");
// 		fname.focus();
// 		return false;
// 	}
// 	if (lname.value == "") {
// 		showAlert("Please enter your Last name.", 'danger');
// 		lname.focus();
// 		return false;
// 	}

// 	if (email.value == "") {
// 		window.alert("Please enter a valid e-mail address.");
// 		email.focus();
// 		return false;
// 	}

// 	if (email.value.indexOf("@", 0) < 0) {
// 		window.alert("Please enter a valid e-mail address.");
// 		email.focus();
// 		return false;
// 	}

// 	if (email.value.indexOf(".", 0) < 0) {
// 		window.alert("Please enter a valid e-mail address.");
// 		email.focus();
// 		return false;
// 	}

// 	if (pass.value == "") {
// 		window.alert("Please enter your password");
// 		pass.focus();
// 		return false;
// 	}

// 	if (repass.value == "") {
// 		window.alert(" Re-enter Password.");
// 		repass.focus();
// 		return false;
// 	}


// 	if (pass.value != repass.value) {
// 		// 		console.log(pass.value);
// 		// 		console.log(repass.value);
// 		showAlert("Password not matched.", 'danger');
// 		// window.alert("Password not matched."); 
// 		repass.focus();
// 		return false;
// 	}

// 	if (what.selectedIndex < 1) {
// 		alert("Please select user role .");
// 		what.focus();
// 		return false;
// 	}
// 	if (sname.value == "") {
// 		window.alert("Please enter your user short Name.");
// 		sname.focus();
// 		return false;
// 	}
// 	// (?:);
// 	(read == '' ? read = 'off' : read = 'on');
// 	(add == '' ? read = 'off' : read = 'on');
// 	(edit == '' ? read = 'off' : read = 'on');
// 	(remove == '' ? read = 'off' : read = 'on');

// 	return true;
// }

function insertTciRecord() {
	let spotting = $('#spotting').val();
	let mending = $('#mending').val();
	let touching = $('#touching').val();
	form.append('id', id);
	form.append('spotting', spotting);
	form.append('mending', mending);
	form.append('touching', touching);
	let xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function () {
		if (this.readyState == 4 && this.status == 200) {
			location.reload();
		}
	};
	xhttp.open("POST", baseUrl + "Qc2/updateReworktable", true);
	xhttp.send(form);

}

function addtci(id) {
	if (id != '') {
		window.location.href = baseUrl + 'Dispatch/dispatchclicked/' + window.btoa(id);
	}
}

function printallprocessjob() {
	// let form = new FormData();
	// form.append('id', id);
	let xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function () {
		if (this.readyState == 4 && this.status == 200) {
			// alert(this.responseText);
			showAlert(this.responseText, "success");
			setTimeout(() => {
				location.reload();
			}, 250);

		}
	};
	xhttp.open("get", baseUrl + "Backend/printallProcessJob", true);
	// xhttp.send(form);
	// showRecord();


}


function getSize() {
	let form = new FormData();
	let country = $("#country_size").val();
	let tag_name = $("#tag_name").val();

	// alert(country);
	form.append('country', country);
	form.append('tag_name', tag_name);
	let xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function () {
		if (this.readyState == 4 && this.status == 200) {
			let row = JSON.parse(this.responseText);
			//console.log(row);
			$('#size_country').empty();
			$('#size_country').append(`<Option>Select Size</Option>`)
			for (let i = 0; i < row['size'].length; i++) {

				$('#size_country').append(`<Option>${row['size'][i]["name"] + " (" + row['dimension'][i]["dimension"] + ")"}</Option>`)

			}

			// showAlert(row);
			// 		 console.log(row);



		}
	};
	xhttp.open("POST", baseUrl + "Products/get_country_size", true);
	xhttp.send(form);



}

$(function () {

	let start = typeof (st_date) != "undefined" ? st_date : ""; //.subtract(29, 'days');
	let end = typeof (ed_date) != "undefined" ? ed_date : "";
	if (start != "") {
		function cb(start, end) {
			let date = $('#reportrange span').text().split('-');

			// $('#start_date').val(date[0].format('YYYY-MMM-D'));
			// $('#end_date').val(date[1]);

			$('#reportrange span').html(start.format('D MMMM, Y') + ' - ' + end.format('D MMMM, Y'));
			$('#start_date').val(start.format('YYYY-MM-D'));
			$('#end_date').val(end.format('YYYY-MM-D'));
			// }
		}
		$('#reportrange').daterangepicker({
			startDate: start,
			endDate: end,
			ranges: {
				'Today': [moment(), moment()],
				'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
				'Last 7 Days': [moment().subtract(6, 'days'), moment()],
				'Last 30 Days': [moment().subtract(29, 'days'), moment()],
				'This Month': [moment().startOf('month'), moment().endOf('month')],
				'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
			}
		}, cb);

		cb(start, end);
	}

});


$('#show_date_range').click(() => {
	let date = $('#reportrange span').text().split('-');
	let sdate = date[0];
	let edate = date[1];
	// console.log(sdate)
	// console.log(edate)
	form = new FormData()
	form.append('sdate', sdate);
	form.append('edate', edate);
	let xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function () {
		if (this.readyState == 4 && this.status == 200) {

		}
	};
	xhttp.open("POST", baseUrl + "Dispatch/reports", true);
	xhttp.send(form);
})

function sendBacktoSeller() {

	let form = new FormData();
	let id = $('#jobcardid').text();
	let remark = $('#send_remark').val();

	form.append('id', id);
	form.append('remark', remark);
	let xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function () {
		if (this.readyState == 4 && this.status == 200) {
			showAlert("order sent back to seller")
			setTimeout(() => {
				location.reload();;
			}, 1000)
		}
	};
	xhttp.open("POST", baseUrl + "Backend/backto_seller", true);
	xhttp.send(form);
}

function format_Date(date) {
	let r_date = date.split(" ");
	let f_date = r_date[0].split('-');
	let date1 = f_date[2] + '/' + f_date[1] + '/' + f_date[0];
	return date1;

}