// show all job card

function readRecord() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var obj = JSON.parse(this.responseText);
            $('#jbcard').append(backend_job_card(obj));
        }
    };
    xhttp.open("GET", baseUrl + 'backend/read/jc', true);
    xhttp.send();
}
//readRecord();
////View JobCard data in Current Stage//////////
function jobCardCompleteStage() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var obj = JSON.parse(this.responseText);
            $('#CompleteJbcard').append(createCompleteJobCard(obj));
            //  console.log(obj);
            // createCompleteJobCard(obj);
        }
    };
    xhttp.open("GET", baseUrl + "backend/complete/jc", true);
    xhttp.send();
}

// loading job card in backend process
function backend_job_card(json) {
	if (json != '') {
		let rows = json.map((ob, index) => {
			let date = format_Date(ob.jc_created_date);
			let actionHtml = `<i class="fa fa-eye " title="View Job Card" aria-hidden="true" style="color:#4e73df ;right:16px" data-toggle="modal"data-target="#viewModal" onclick="viewJobCard('${ob.internal_order_id}')"></i>
							  <i class="fa fa-check-circle text-success" aria-hidden="true"  title="Pass" onclick="update('${ob.internal_order_id}')"></i>
	   						  <i class="fa fa-ban" aria-hidden="true" title=" Send back to seller" style="color:red;" onclick="rejectbyqc1('${ob.internal_order_id}')" data-toggle="modal" data-target="#rejctModal"></i>`;
			let row = [(index + 1), date, ob.internal_order_id, ob.title, ob.quantity, ob.remark, ob.sp_remark, actionHtml];
			return row;
		})
		table = $('#dataTable1').DataTable();
		table.destroy();
		$('#dataTable1').DataTable({
			data: rows,
		});
	}

}

// reject seller order 
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

// function to load rejected jobcard into the table view 
function backend_alterd_job() {
	let form = new FormData();
	form.append('status', send_back_to_seller);
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function () {
		if (this.readyState == 4 && this.status == 200) {
			var obj = JSON.parse(this.responseText);
			$('#backend_altred_job_card_view').append(loadAlterdJobCard(obj));
		}
	};
	xhttp.open("POST", baseUrl + "Qc2/rejcted_job_card_list", true);
	xhttp.send(form);
}