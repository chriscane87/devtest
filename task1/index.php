<?php include('../header.php'); ?>
<!doctype html>
<script src="/task1/task1.js"></script> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
<html>
<head>

</head
<body>
<div style="left: 30%;position: absolute;width: 500px;">
<h4>Task 1</h4>
<i>Enter Package name and weight, and press add more</i>
<form id="form_edit_priority"  name="form_edit_priority" method="POST" action="/task1/index.php">
	<div class="container" >
		<table style="width: 100%;" border = '1'>
			<tr>
			<td >
				<div >
					<table>
						<tr>
							<td>Enter package name:</td>
							<td><input id="package_name"  type="text" maxlength="128" value="" /></td>
						</tr>
						<tr>
							<td>Enter package weight:</td>
							<td><input id="package_weight"  type="text" maxlength="128" value="" /></td>
							<td> <a type="button" class="button" onclick="addpackage();">Add more</a> </td>
							
						</tr>
						
						<tr>
							<td></td>
						</tr>
					</table>
				</div>
			</td>
				
			</tr>
		<table>
		<button type="submit" name="submit" class="button" >Sort Packages</button>
		<div id="output_div" style="margin-top: 10px;margin-bottom: 10px;margin-left: 2px;">
					<input type="hidden" id="package_list" name="package_list[]" value='' />
		</div>
		
		
	</div>
</form>
</body>
</html



<?php
	 if(isset($_POST["submit"]))
	 {
		unset($_POST["submit"]);
		$weight_arr = $_POST['package_list'];

		$kg_limit = 2;       // lets define limit for package
        
        //-- printing sample input -- //
		 echo "</br></br>";
        foreach($weight_arr as $item_name => $item_weight){
            echo $item_name . " -> " . $item_weight . "</br>";
        }
        //-- end print -- //
        
        
        arsort($weight_arr); //sort values 
      
        
        $optimizepackage = array();
        foreach($weight_arr as $key => $item){
            
            $is_added = false;
            
            if(count($optimizepackage)){
            foreach($optimizepackage as $op_key => $op_data){
               $temp_kg_sum = array_sum($op_data);
                if(((float)($temp_kg_sum) +  (float)($item)) <= $kg_limit){ //try to add more value to the same package
                    $optimizepackage[$op_key][$key] = ($item);
                    $is_added = true;
                    break;
                }
            }
            
            if(!$is_added) // create new package
                $optimizepackage[count($optimizepackage)][$key] = ($item);

            }else{ //1st entry
                $optimizepackage[0] = array($key =>$item);

            } 
            
        }
        
        //printing output --------------------------
       
        echo("</br></br>" . (count($optimizepackage)) . " packages");
       
        foreach($optimizepackage as $package_index => $package_data){
            $package_string_output = "";
            $package_kg_output = 0;
            foreach($package_data as $package_name => $package_value){
                $package_string_output .= $package_name . ", ";
                $package_kg_output += $package_value;
            }
            
          
            echo("</br>" . "Package " . ($package_index+1) . " : " . $package_string_output . " total weight " . $package_kg_output . "kg");
           

        }
        // end printing-------------------------------


	 }
?>
</div>