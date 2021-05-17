<?php include('../header.php'); ?>
<!doctype html>
<script src="/task3/task3.js"></script> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
<html>
<head>

</head
<body>
<div style="left: 30%;position: absolute;width: 500px;">
<h4>Task 3</h4>
<i>Upload user info here</i>
</br><i>Sample File Format, saved as Comma-Separated Value (.csv) </i>
<form enctype="multipart/form-data" method="post" role="form">
	<div style="margin-top: 10px;margin-bottom: 15px;">                                            
               <input type="file" name="file-user-upload" id="file" size="150" onchange="getfilename(this.value);">
               
    </div>
	
	
	<button id="saveuploaded" type="submit" name="submit" class="button" style="display: none;">Upload File</button>

</form>




</body>
</html
</body>
</html> 
 
<?php
if(isset($_POST["submit"]))
{
unset($_POST["submit"]);
$file_user_upload = $_FILES['file-user-upload']['tmp_name'];
$file_open_upload = fopen($file_user_upload, "r");


$url='localhost';
$username='root';
$password='';
$db_name = "devdb";
$table_name = "users";
$db_connect=mysqli_connect($url,$username,$password,$db_name); //cooenct to db

if(!$db_connect){
	die(mysqli_error());
}
$header_flag = 0;
while(($users = fgetcsv($file_open_upload, 1000, ",")) !== false){
	$users = array_map("utf8_encode", $users);
  
	
	if($header_flag > 0){
		
		$query = "select id from users where username = '". $users[0]."' OR user_identification_id = '" . $users[1]."'";
		$result = mysqli_query($db_connect, $query);

		$userid_fetch = 0;
		$userid_dup_fetch = 0;
		$userid_result_arr = array();
		while ($row = mysqli_fetch_row($result)) {
			$userid_result_arr[] =  $row[0];
		}
		
		if(isset($userid_result_arr[0]))
			$userid_fetch = $userid_result_arr[0];
		
		if(isset($userid_result_arr[1])) 
			$userid_dup_fetch = $userid_result_arr[1];
				

		if($userid_fetch > 0){ //update entry ** for scenario #1
			$sql_update = "UPDATE `$table_name` SET username = '$users[0]' , user_identification_id = '$users[1]' , user_name = '$users[2]' , user_age = '$users[3]'";
			$sql_update .= " WHERE id = " . $userid_fetch;
			$sql_stmt = mysqli_prepare($db_connect,$sql_update);
			mysqli_stmt_execute($sql_stmt);
		}
		else if(trim($users[0]) != "" && trim($users[1]) != "" ){ //insert new entry ** for scenario #2
			$sql_insert = "INSERT INTO `$table_name` (`username`, `user_identification_id`, `user_name`, `user_age`) VALUES ('$users[0]', '$users[1]', '$users[2]', '$users[3]')";
			$sql_stmt = mysqli_prepare($db_connect,$sql_insert);
			mysqli_stmt_execute($sql_stmt);
		}
		
		if($userid_dup_fetch > 0){ //update entry ** for scenario #3
			$sql_delete = "DELETE FROM  `$table_name` WHERE id = " . $userid_dup_fetch;
			$sql_stmt = mysqli_prepare($db_connect,$sql_delete);
			mysqli_stmt_execute($sql_stmt);
		}
	}
	
	if($header_flag == 0) //checked once to skip excel header
		$header_flag = 1;
	
	

}

	echo "<pre>";
	print_r("Files uploaded successfully..");
	echo "</pre>";

	$query = "select * from users";
	$result = mysqli_query($db_connect, $query);
?>		
	<table width="100%" border="1">
		<tr>
			<td>Userid</td>
			<td>Username</td>
			<td>User Identification id</td>
			<td>Name</td>
			<td>Age</td>
		</tr>
<?php		
		while ($row = mysqli_fetch_row($result)) {
?>
			<tr>
				<td><?php echo $row[0] ?></td>
				<td><?php echo $row[1] ?></td>
				<td><?php echo $row[2] ?></td>
				<td><?php echo $row[3] ?></td>
				<td><?php echo $row[4] ?></td>
			</tr>
<?php	
			
		}
?>		
	</table>
<?php		
}
?>
<div>