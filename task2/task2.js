
var output_html = "";
function addentry() {
	
	
	var person_weight = $("#person_weight").val(); 

	
	if(person_weight.trim() != "" && 
					(!isNaN(person_weight.trim()))){ //only process numeric input in weight field
				
		
	 
		$("#person_weight").val("");
		
		output_html += (person_weight + "kg</br>");
		output_html += ('<input type="hidden" id="person_weight" name="person_weight[]" value='+person_weight+' />');
		
		
		$("#output_div").html(output_html); 

	}
}

