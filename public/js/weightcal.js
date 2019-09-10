function inputWeight(){

	var check = document.getElementById("weightInput");

	var checker = /^[0-9]*$/;
	var toCheck = checker.test(check.value);

		console.log(check);
		if(check.value < 1) {
			document.getElementById("weightErrorMsg").innerHTML = "Value cannot be less than 1";
			document.getElementById("valueForWeight").innerHTML = "";
		}

		else if(toCheck != true){
			document.getElementById("weightErrorMsg").innerHTML = "Please enter a valid value for your weight";
			document.getElementById("valueForWeight").innerHTML = "";
		}

		else if(toCheck == true && check.value > 0) {
			document.getElementById("weightErrorMsg").innerHTML = "";
			weight = document.getElementById("weightInput").value; 

			$.ajaxSetup({
    		headers: {
        		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		        }
		    });

		    $.ajax({
		        url: "/home/weightCal",
		        type: "post",
		        data: {weight:weight},
		        dataType: 'json',
		        success: function(data){

		        	console.log(data);
		        	var para = document.createElement("P");
		        	var textOut = document.createTextNode(data.weight);
		        	console.log(textOut);
		            para.appendChild(textOut);
		            document.getElementById("weightList").appendChild;

		            location.reload();

				},
		        error: function(error){
		             console.log(error);
		        }
		    })
		}

}