$(document).on("click",".addToDoButton",deleteButton);

function buttonMake(){

		var check = document.getElementById("formToDo");

			if(check.elements[0].value == "") {
				//
			}
			else {
				var content = document.getElementById("newToDo").value; 

				$.ajaxSetup({
        		headers: {
            		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			        }
			    });

			    $.ajax({
			        url: "/home/addList",
			        type: "post",
			        data: {content:content},
			        dataType: 'json',
			        success: function(data){
			        	console.log(data[0].id);
			        	var text = document.createTextNode(document.getElementById("newToDo").value); 
			            var buttonNew = document.createElement("BUTTON");

						buttonNew.appendChild(text);   

						newParent = document.getElementById("toDoList");
						buttonNew.id = (data[0].id).toString();
						buttonNew.className = "btn btn-success addToDoButton";
						buttonNew.setAttribute("onmouseover", "turnRed(this);");
						buttonNew.setAttribute("onmouseout", "turnGreen(this);");
						buttonNew.onclick = deleteButton;

						newParent.appendChild(buttonNew);
						location.reload();

					},
			        error: function(error){
			             console.log(error);
			        }
			    })
			}

		}




			function turnRed(btnElement){
				btnElement.setAttribute("class", "btn btn-danger");
			}
			function turnGreen(btnElement){
				btnElement.className = "btn btn-success addToDoButton";
			}
			function deleteButton(btnElement){

				var list_id = $(this).attr("id");

				console.log(list_id);

				if (confirm("Are you sure you Delete?")){
					$.ajaxSetup({
		        	headers: {
		            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				    		}
				    });

				    $.ajax({
				        url: "/home/deleteList",
				        type: "post",
				        data: {id:list_id},
				        dataType: 'json',
				        
				        success: function(data){
				            console.log(data);
				            var btnElement = document.getElementById(list_id);
				            btnElement.parentNode.removeChild(btnElement);
				        },

				        error: function(error){
				             console.log(error);
				        }

				    })

					
				}
			}

