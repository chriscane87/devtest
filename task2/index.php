<?php include('../header.php'); ?>
<!doctype html>
<script src="/task2/task2.js"></script> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
<html>
<head>

</head
<body>
<div style="left: 30%;position: absolute;width: 500px;">
<h4>Task 2</h4>
<i>Enter people's weight, and press add more</i>
<form id="form_edit_priority"  name="form_edit_priority" method="POST" action="/task2/index.php">
	<div class="container" >
		<table style="width: 100%;" border = '1'>
			<tr>
			<td >
				<div >
					<table>
						
						<tr>
							<td>Enter person's weight:</td>
							<td><input id="person_weight"  type="text" maxlength="128" value="" /></td>
							<td> <a type="button" class="button" onclick="addentry();">Add more</a> </td>
						</tr>
						
						<tr>
							<td></td>
						</tr>
					</table>
				</div>
			</td>
				
			</tr>
		<table>
		
		<button type="submit" name="submit" class="button" >Sort Boat</button>
		<div id="output_div" style="margin-top: 10px;margin-bottom: 10px;margin-left: 2px;">
					<input type="hidden" id="person_weight" name="person_weight[]" value='' />
		</div>
		
		
	</div>
</form>
</body>
</html
</body>
</html



<?php
	 if(isset($_POST["submit"]))
	 {
		unset($_POST["submit"]);
		
		$people_weight_arr = $_POST['person_weight'];


        arsort($people_weight_arr); //sort values 
        $boatA = array();
        $boatB = array();
        $max_weight_diff = 1;
       
        foreach($people_weight_arr as $person_weight){
           
            $boatA_kg_sum = array_sum($boatA);
            $boatB_kg_sum = array_sum($boatB);
            $boat_diff = ($boatB_kg_sum+$person_weight) - ($boatA_kg_sum);
          
           
            if( ($boatB_kg_sum <= $boatA_kg_sum || (($boat_diff) <= $max_weight_diff))){ //segregate equally as much as possible
                $boatB[] = $person_weight;
            }else{
                $boatA[] = $person_weight;
            }
            
        }
        
        //printing output --------------------------
		$boatA_string = "";
		$boatA_total = 0;
		 foreach($boatA as $personA_weight){
			  $boatA_string .=  $personA_weight . ", ";
			  $boatA_total += $personA_weight;
		 }
		 
		$boatB_string = "";
		$boatB_total = 0;
		 foreach($boatB as $personB_weight){
			  $boatB_string .=  $personB_weight . ", ";
			  $boatB_total += $personB_weight;
		 }
		 echo "</br></br></br>";
		 echo "Boat A: " . $boatA_string . "  Total " . $boatA_total;
		 echo "</br>Boat B: " . $boatB_string . "  Total " . $boatB_total;
       

        // end printing-------------------------------

	 }

?>
</div>