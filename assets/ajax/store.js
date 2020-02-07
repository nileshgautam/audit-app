///load data from db using ajax
function store_orders() {
	//alert('hellow')
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function () {
		if (this.readyState == 4 && this.status == 200) {
			//console.log(this.responseText);
			var obj = JSON.parse(this.responseText);
			//console.log(obj)
			$('#store_jobcards').append(store_order(obj));
			
		}
	};
	xhttp.open("GET", baseUrl + "store/order-list", true);
	xhttp.send();
}

function store_order(json) {
	if (json != '') {

		//console.log(json);

		let rows = json.map((ob, index) => {

			let date = format_Date(ob.jc_created_date);

			let actionHtml = `
		
			
			<a href="${baseUrl + "store/store_clicked"}/${window.btoa(`${ob.internal_order_id}`)}"> <i class="fa fa-plus" aria-hidden="true" title="Assign raw materials" style="color:green" ></i></a>

			<i class="fa fa-ban" aria-hidden="true" title="Alter" style="color:red;" onclick="rejectbyqc1('${ob.internal_order_id}')" data-toggle="modal" data-target="#rejctModal"></i> `;
			// let input = `<input class='form-control' type='text' id='remark_input${index + 1}'>
			// `
			let row = [(index + 1), date, ob.order_id, ob.internal_order_id, ob.title, ob.quantity, ob.remark, ob.sp_remark, actionHtml];
			return row;
			// console.log(row);
		})
		// console.log(rows);
		table = $('#store_order').DataTable();
		table.destroy();
		$('#store_order').DataTable({
			data: rows,
		});

	}
}

function store_reject(id){

	let val=$('#store_rejcet_value').val();

	console.log(val);

	let form = new FormData();
	form.append('id', id);
	form.append('remark', val);

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            location.reload();
        }
    };
    xhttp.open("POST", baseUrl + "Store/rejectby_store", true);
    xhttp.send(form);

}


// function to load rejected jobcard into the table view 
function store_alterd_job() {
	let form = new FormData();
	form.append('status', store_Alter);

	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function () {
		if (this.readyState == 4 && this.status == 200) {
			var obj = JSON.parse(this.responseText);
			$('#store_altred_job_card_view').append(loadAlterdJobCard(obj));
		}
	};
	xhttp.open("POST", baseUrl + "Qc2/rejcted_job_card_list", true);
	xhttp.send(form);
}