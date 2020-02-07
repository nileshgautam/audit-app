function readRecord() {
    
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var obj = JSON.parse(this.responseText);
            $('#jbcard').append(create_pa_ProcessJobCard(obj));
        }
    };
    xhttp.open("GET", baseUrl + `Backend/read_pa_jobcard_data`, true);
    xhttp.send();
}
// readRecord();
//View JobCard data in Current Stage
function jobCardCompleteStage() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var obj = JSON.parse(this.responseText);
            //console.log(obj);
            $('#jbcard').append(create_PA_CompleteJobCard(obj));
            
            // createCompleteJobCard(obj);
        }
    };
    xhttp.open("GET", baseUrl + "Backend/pa_jc_CompleteState", true);
    xhttp.send();
}
//jobCardCompleteStage();//  calling function to show records in current jobCard View

