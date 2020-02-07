  /////show cutting jobs to managers
  function show_cutting_jobs() {
  	var xhttp = new XMLHttpRequest();
  	xhttp.onreadystatechange = function () {
  		if (this.readyState == 4 && this.status == 200) {
  			var obj = JSON.parse(this.responseText);
  			//console.log(obj)
  			$('#cutting').append(mangaerJobCard(obj));
  			let status = $('#cutting div:first').attr('card_status');
  			if (status != undefined) {
  				$('#show_status_Cutting').text(status);
  				// mangaerJobCard(obj);
  			} else {
  				$('#show_status_Cutting').text('0');

  			}
  		}
  	};
  	xhttp.open("GET", baseUrl + "Management/jc_cuttingState", true);
  	xhttp.send();

  }

  /////show stitching jobs to managers

  function show_stitching_jobs() {
  	var xhttp = new XMLHttpRequest();
  	xhttp.onreadystatechange = function () {
  		if (this.readyState == 4 && this.status == 200) {
  			var obj = JSON.parse(this.responseText);
  			$('#stiching').append(mangaerJobCard(obj));
  			let status = $('#stiching div:first').attr('card_status')
  			if (status != undefined) {
  				$('#show_status_Stitching').text(status);
  				// // 	//  console.log(obj);
  				// 	mangaerJobCard(obj);
  			} else {
  				$('#show_status_Stitching').text('0');
  			}
  			// //  console.log(obj);
  			// mangaerJobCard(obj);

  		}
  	};
  	xhttp.open("GET", baseUrl + "Management/Management_jc_stitching", true);
  	xhttp.send();

  }

  /////show packing jobs to managers
  function show_packing_jobs() {
  	var xhttp = new XMLHttpRequest();
  	xhttp.onreadystatechange = function () {
  		if (this.readyState == 4 && this.status == 200) {
  			var obj = JSON.parse(this.responseText);
  			$('#packing').append(mangaerJobCard(obj));
  			let status = $('#packing div:first').attr('card_status');
  			if (status != undefined) {
  				$('#show_status_Packing').text(status);
  				//  console.log(obj);
  				// 	mangaerJobCard(obj);
  			} else {
  				$('#show_status_Packing').text('0');
  			}
  		}
  	};
  	xhttp.open("GET", baseUrl + "Management/Management_jc_packing", true);
  	xhttp.send();

  }


  ///show deleverd jobs to managers
  function show_delevered_jobs() {
  	var xhttp = new XMLHttpRequest();
  	xhttp.onreadystatechange = function () {
  		if (this.readyState == 4 && this.status == 200) {
  			var obj = JSON.parse(this.responseText);
  			$('#delevered').append(mangaerJobCard(obj));
  			let status = $('#delevered div:first').attr('card_status');
  			// 		 console.log(status);
  			if (status != undefined) {
  				$('#show_status_Delevery').text(status);
  				//  console.log(obj);
  				// 	mangaerJobCard(obj);
  			} else {
  				$('#show_status_Delevery').text('0');
  			}

  		}
  	};
  	xhttp.open("GET", baseUrl + "Management/packed_jc", true);
  	xhttp.send();

  }

  function mangaerJobCard(json) {
  	if (json != '') {
  		let html = "";
  		for (let i = 0; i < json.length; i++) {
  			let date = json[i]['jc_created_date'].split(" ");
  			html += `<div class="col-xl-12 col-md-6 " style="font-size:12px; font-weight: 800; padding:2px;" card_status="${json.length != "" ? json.length : '0'}" data-toggle="modal" data-target="#transactionModal" onclick="viewTransaction('${json[i]['internal_order_id']}')">
  <div class="card border-left-info shadow h-80 py-2 px-2">
      <div class="row">
      <div class="col-sm-6">Job card No.:</div>
      <div class="col-sm-6">${json[i]['internal_order_id']}</div>
      </div>
    <div class="row" >
        <div class="col-sm-6">Order date: </div>
        <div class="col-sm-6">${format_Date(json[i]['jc_created_date'])}</div>
    </div> 
    <div class="col text-right" style="height:40px; font-size:12px; font-weight:800;" >
        <i class="fa fa-eye" title="View" aria-hidden="true" style="color:#36b9cc;" onclick="event.stopPropagation();$('#viewModal').modal('show');viewJobCard('${json[i]['internal_order_id']}')" ></i>
    </div>
  </div>
</div>`
  		}
  		return html;

  	}
  }
