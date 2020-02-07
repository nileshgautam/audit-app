///load data from db using ajax
function seller_uploaded_order() {
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function () {
		if (this.readyState == 4 && this.status == 200) {
			var obj = JSON.parse(this.responseText);
			$('#seller_upload_file').append(seller_uploaded_order_data(obj));
		}
	};
	xhttp.open("GET", baseUrl + "seller/order", true);
	xhttp.send();
}

// display data in seller order window
function seller_uploaded_order_data(json) {
	if (json != '') {
		let rows = json.map((ob, index) => {
			let date = format_Date(ob.jc_created_date);
			let actionHtml = `<i class="fa fa-eye " title="View Job Card" aria-hidden="true" style="color:#4e73df ;right:16px" data-toggle="modal"data-target="#viewModal" onclick="viewJobCard('${ob.internal_order_id}')"></i>
                              <i class="fa fa-check-circle" style="color:green;right:16px; aria-hidden="true" title="Send to production" onclick="sent('${ob.internal_order_id}','${"#remark_input" + (index + 1)}')"></i>`;
			let input = `<input class='form-control' type='text' id='remark_input${index + 1}'>`
			let row = [(index + 1), date, ob.order_id, ob.title, ob.quantity, ob.remark, input, actionHtml];
			return row;
		})
		table = $('#seller_order').DataTable();
		table.destroy();
		$('#seller_order').DataTable({
			data: rows,
		});

	}
}

// send order to production department...
function sent(id, text) {

	let remark = $(text).val()

	var form = new FormData();
	form.append('id', id);
	form.append('remark', remark);
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function () {
		if (this.readyState == 4 && this.status == 200) {
			showAlert("Successfully sent to production");
			setTimeout(() => {
				location.reload();
			}, 1000);
		}
	};
	xhttp.open("POST", baseUrl + "seller/update/order", true);
	xhttp.send(form);

}

// view order stauts in number 
function order_in_production() {
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function () {
		if (this.readyState == 4 && this.status == 200) {
			var obj = JSON.parse(this.responseText);
			let status = obj[0]['NumberOforder'];
			if (status != undefined) {
				$('#show_status_in_production').text(status);
			} else {
				$('#show_status_in_production').text('0');
			}
		}
	};
	xhttp.open("GET", baseUrl + "seller/order/in/production", true);
	xhttp.send();

}

//showing total orders count of delievered in seller dashboard window
function order_delivered() {
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function () {
		if (this.readyState == 4 && this.status == 200) {
			var obj = JSON.parse(this.responseText);
			let status = obj[0]['NumberOforder'];
			if (status != undefined) {
				$('#show_status_Delevery').text(status);
			} else {
				$('#show_status_Delevery').text('0');
			}
		}
	};
	xhttp.open("GET", baseUrl + "seller/order/delivered", true);
	xhttp.send();

}

//showing total orders count of uploaded order in seller dashboard window
function recent_order() {
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function () {
		if (this.readyState == 4 && this.status == 200) {
			var obj = JSON.parse(this.responseText);
			let status = obj[0]['NumberOforder'];
			if (status != undefined) {
				$('#show_status_order').text(status);

			} else {
				$('#show_status_order').text('0');
			}
		}
	};
	xhttp.open("GET", baseUrl + "seller/order/recent/uploaded", true);
	xhttp.send();

}

