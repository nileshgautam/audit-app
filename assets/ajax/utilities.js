
//   start lenth action function
function delete_length(id) {
// 	console.log(id)
	let conf = confirm('Warning! Are you sure wants to delete it?, it will affect all the saved product.');

	var form = new FormData();
	form.append('id', id)
	if (conf == true) {
		let xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function () {
			if (this.readyState == 4 && this.status == 200) {
				showAlert(this.responseText, "success");
				setTimeout(() => {
					location.reload();
				}, 1000);
			};
		}
		xmlhttp.open("post", baseUrl + 'Utilities/deletelength', true);
		xmlhttp.send(form);

	}
}

function getlengthid(id) {
let conf = confirm('Warning! Are you sure wants to edit it? It will affect all the saved product.');
	let form = new FormData();
	form.append('id', id)
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function () {
		if (this.readyState == 4 && this.status == 200) {
			var arryobj = JSON.parse(this.responseText);

// 			console.log(arryobj);

			$('#lg_name').val(arryobj[0]['value']);
			$('#txt_hidden').val(arryobj[0]['id']);
		}
	};
	xhttp.open("POST", baseUrl + 'Utilities/getLengthDetails', true);
	xhttp.send(form);

}
//   ends lenth action function

//   start Inlay action function

function delete_inlay(id) {
	// console.log(id)
// 	let conf = confirm('Are you sure wants to delete');
	let conf = confirm('Warning! Are you sure wants to delete it? It will affect all the saved product.');
	var form = new FormData();
	form.append('id', id)
	if (conf == true) {
		let xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function () {
			if (this.readyState == 4 && this.status == 200) {
				showAlert(this.responseText, "success");
				setTimeout(() => {
					location.reload();
				}, 1000);
			};
		}
		xmlhttp.open("post", baseUrl + 'Utilities/deleteInlay', true);
		xmlhttp.send(form);

	}
}

function get_inlay_id(id) {

let conf = confirm('Warning! Are you sure wants to edit it? It will affect all the saved product.');
	let form = new FormData();
	form.append('id', id)
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function () {
		if (this.readyState == 4 && this.status == 200) {
			var arryobj = JSON.parse(this.responseText);

// 			console.log(arryobj);

			$('#ly_uid').val(arryobj[0]['name']);
			$('#txt_hidden').val(arryobj[0]['id']);
		}
	};
	xhttp.open("POST", baseUrl + 'Utilities/get_InlayDetails', true);
	xhttp.send(form);

}

//  Ends Inlay action function

//  start  action function

function delete_wc(id) {
	// console.log(id)

	let conf = confirm('Warning! Are you sure wants to delete it? It will affect all the saved product.');
	var form = new FormData();
	form.append('id', id)
	if (conf == true) {
		let xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function () {
			if (this.readyState == 4 && this.status == 200) {
				showAlert(this.responseText, "success");
				setTimeout(() => {
					location.reload();
				}, 1000);
			};
		}
		xmlhttp.open("post", baseUrl + 'Utilities/delete_showwashcare', true);
		xmlhttp.send(form);

	}
}

function get_wc_id(id) {
let conf = confirm('Warning! Are you sure wants to edit it? It will affect all the saved product.');
	let form = new FormData();
	form.append('id', id)
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function () {
		if (this.readyState == 4 && this.status == 200) {
			var arryobj = JSON.parse(this.responseText);

// 			console.log(arryobj);

			$('#wash_id').val(arryobj[0]['name']);
			$('#txt_hidden').val(arryobj[0]['id']);
		}
	};
	xhttp.open("POST", baseUrl + 'Utilities/get_showwashcare', true);
	xhttp.send(form);

}

//  Ends Inlay action function

//  start fabric action function

function delete_fabric(id) {
	// console.log(id)
// 	let conf = confirm('Are you sure wants to delete');
	let conf = confirm('Warning! Are you sure wants to delete it? It will affect all the saved product.');
	var form = new FormData();
	form.append('id', id)
	if (conf == true) {
		let xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function () {
			if (this.readyState == 4 && this.status == 200) {
				showAlert(this.responseText, "success");
				setTimeout(() => {
					location.reload();
				}, 1000);
			};
		}
		xmlhttp.open("post", baseUrl + 'Utilities/delete_fabric_data', true);
		xmlhttp.send(form);

	}
}

function get_fab_id(id) {
    // let conf = confirm('Are you sure wants to edit , warring');
    let conf = confirm('Warning! Are you sure wants to edit it? It will affect all the saved product.');
	let form = new FormData();
	form.append('id', id)
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function () {
		if (this.readyState == 4 && this.status == 200) {
			var arryobj = JSON.parse(this.responseText);

			// console.log(arryobj);

			$('#utxt_brand_name').val(arryobj[0]['brand_name']);
			$('#utxtFabric').val(arryobj[0]['name']);
			$('#utxt_print_pattern').val(arryobj[0]['print_and_pattern']);
			$('#utxt_color').val(arryobj[0]['color']);
			$('#utxt_thread_count').val(arryobj[0]['thread_count']);
			$('#utxt_blend').val(arryobj[0]['blend']);

			$('#txt_hidden').val(arryobj[0]['id']);
		}
	};
	xhttp.open("POST", baseUrl + 'Utilities/get_fabric_Details', true);
	xhttp.send(form);

}

//  Ends fabric action function

//  start unit action function

function delete_unit(id) {
	// console.log(id)
// 	let conf = confirm('Are you sure wants to delete');
	let conf = confirm('Warning! Are you sure wants to delete it? It will affect all the saved product.');
	var form = new FormData();
	form.append('id', id)
	if (conf == true) {
		let xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function () {
			if (this.readyState == 4 && this.status == 200) {
				showAlert(this.responseText, "success");
				setTimeout(() => {
					location.reload();
				}, 1000);
			};
		}
		xmlhttp.open("post", baseUrl + 'Utilities/delete_unit', true);
		xmlhttp.send(form);

	}
}

function get_unit(id) {
    // let conf = confirm('Warring!, Are you sure wants to edit,');
    let conf = confirm('Warning! Are you sure wants to edit it? It will affect all the saved product.');
	let form = new FormData();
	form.append('id', id)
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function () {
		if (this.readyState == 4 && this.status == 200) {
			var arryobj = JSON.parse(this.responseText);

// 			console.log(arryobj);

			$('#txtunit').val(arryobj[0]['unit_name']);
			$('#selunit').val(arryobj[0]['unit_role']);
			$('#txt_hidden').val(arryobj[0]['id']);
		}
	};
	xhttp.open("POST", baseUrl + 'Utilities/get_unit', true);
	xhttp.send(form);

}

//  Ends unit action function

//  start Thread_cound action function
function delete_Thread_cound(id) {
	// console.log(id)
// 	let conf = confirm('Are you sure wants to delete');
	let conf = confirm('Warning! Are you sure wants to delete it? It will affect all the saved product.');
	var form = new FormData();
	form.append('id', id)
	if (conf == true) {
		let xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function () {
			if (this.readyState == 4 && this.status == 200) {
				showAlert(this.responseText, "success");
				setTimeout(() => {
					location.reload();
				}, 1000);
			};
		}
		xmlhttp.open("post", baseUrl + 'Utilities/delete_thread_count', true);
		xmlhttp.send(form);

	}
}

function get_Thread_cound(id) {
    // let conf = confirm('Are you sure wants to edit , warring');
    let conf = confirm('Warning! Are you sure wants to edit it? It will affect all the saved product.');
	let form = new FormData();
	form.append('id', id)
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function () {
		if (this.readyState == 4 && this.status == 200) {
			var arryobj = JSON.parse(this.responseText);

			// console.log(arryobj);

			$('#tc_id').val(arryobj[0]['name']);
			$('#txt_hidden').val(arryobj[0]['id']);
		}
	};
	xhttp.open("POST", baseUrl + 'Utilities/get_thread_count', true);
	xhttp.send(form);

}
//  end Thread cound action function

//  start  size action function
function delete_size(id) {
	// console.log(id)
// 	let conf = confirm('Are you sure wants to delete');
	let conf = confirm('Warning! Are you sure wants to delete it? It will affect all the saved product.');
	var form = new FormData();
	form.append('id', id)
	if (conf == true) {
		let xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function () {
			if (this.readyState == 4 && this.status == 200) {
				showAlert(this.responseText, "success");
				setTimeout(() => {
					location.reload();
				}, 1000);
			};
		}
		xmlhttp.open("post", baseUrl + 'Utilities/delete_size', true);
		xmlhttp.send(form);

	}
}

function get_size(id) {
    // let conf = confirm('Warring! Are you sure wants to edit');
    let conf = confirm('Warning! Are you sure wants to edit it? It will affect all the saved product.');
	let form = new FormData();
	form.append('id', id)
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function () {
		if (this.readyState == 4 && this.status == 200) {
			var arryobj = JSON.parse(this.responseText);

			// console.log(arryobj);

			$('#txtid_size').val(arryobj[0]['name']);
			$('#txtidu').val(arryobj[0]['dimension']);
			$('#useltag').val(arryobj[0]['tag_name']);
			$('#Uselcountry').val(arryobj[0]['country']);
			$('#txt_hidden').val(arryobj[0]['id']);
		}
	};
	xhttp.open("POST", baseUrl + 'Utilities/get_size', true);
	xhttp.send(form);

}
//  end size action function

//  start  size action function
function delete_shipcomp(id) {
	// console.log(id)
// 	let conf = confirm('Are you sure wants to delete');
	let conf = confirm('Warning! Are you sure wants to delete it? It will affect all the saved product.');
	var form = new FormData();
	form.append('id', id)
	if (conf == true) {
		let xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function () {
			if (this.readyState == 4 && this.status == 200) {
				showAlert(this.responseText, "success");
				setTimeout(() => {
					location.reload();
				}, 1000);
			};
		}
		xmlhttp.open("post", baseUrl + 'Utilities/delete_shipcomp', true);
		xmlhttp.send(form);

	}
}

function get_shipcomp(id) {
    // let conf = confirm('Warring! Are you sure wants to edit');
    let conf = confirm('Warning! Are you sure wants to edit it? It will affect all the saved product.');
	let form = new FormData();
	form.append('id', id)
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function () {
		if (this.readyState == 4 && this.status == 200) {
			var arryobj = JSON.parse(this.responseText);

			// console.log(arryobj);

			$('#shipcomp_id1').val(arryobj[0]['shipping_com_Name']);
			$('#txt_hidden').val(arryobj[0]['id']);
		}
	};
	xhttp.open("POST", baseUrl + 'Utilities/get_shipcomp', true);
	xhttp.send(form);

}
//  end size action function

// common for extrcting detils by id from ajax

function getid(id) {
    // let conf = confirm('Warring! Are you sure wants to edit');
    let conf = confirm('Warning! Are you sure wants to edit it? It will affect all the saved product.');
	let form = new FormData();
	form.append('id', id)
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function () {
		if (this.readyState == 4 && this.status == 200) {
			var arryobj = JSON.parse(this.responseText);

			// console.log(arryobj);

			$('#txt_udata').val(arryobj[0]['name']);
			$('#txt_data_type').val(arryobj[0]['attribute']);
			$('#txt_hidden').val(arryobj[0]['id']);
		}
	};
	xhttp.open("POST", baseUrl + 'Utilities/get_data', true);
	xhttp.send(form);

}
// common for delete function to delete records by id.
function delete_records(id) {
	// console.log(id)
// 	let conf = confirm('Are you sure wants to delete');
	let conf = confirm('Warning! Are you sure wants to delete it? It will affect all the saved product.');
	var form = new FormData();
	form.append('id', id)
	if (conf == true) {
		let xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function () {
			if (this.readyState == 4 && this.status == 200) {
				showAlert(this.responseText, "success");
				setTimeout(() => {
					location.reload();
				}, 1000);
			};
		}
		xmlhttp.open("post", baseUrl + 'Utilities/delete', true);
		xmlhttp.send(form);

	}
}
