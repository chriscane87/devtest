
var output_html = "";
function addpackage() {
	
	var package_name =  $("#package_name").val(); 
	var package_weight = $("#package_weight").val(); 

	if(package_weight > 2){
		alert("Max weight limit is 2");
	}else if(package_name.trim() != "" && 
				package_weight.trim() != "" && 
					(!isNaN(package_weight.trim()))){ //only process numeric input in weight field
				
		
		$("#package_name").val(""); 
		$("#package_weight").val("");
		
		output_html += (package_name + " -> " + package_weight + "kg</br>");
		output_html += ('<input type="hidden" id="package_list" name="package_list['+package_name+']" value='+package_weight+' />');
		
		
		$("#output_div").html(output_html); 

	}
}

