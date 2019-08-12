<?php
include_once("db_connect.php");
$input = filter_input_array(INPUT_POST);
if ($input['action'] == 'edit') 
{	
	$update_field='';
	if(isset($input['acno'])) 
	{
		$update_field.= "acno='".$input['acno']."'";
	} 
	else if(isset($input['name'])) 
	{
		$update_field.= "name='".$input['name']."'";
	} 
	else if(isset($input['col_date'])) 
	{
		$update_field.= "col_date='".$input['col_date']."'";
	} 
	else if(isset($input['test'])) 
	{
		$update_field.= "test='".$input['test']."'";
	} 
	else if(isset($input['fax'])) 
	{
		$update_field.= "fax='".$input['fax']."'";
	} 
	else if(isset($input['col_loc'])) 
	{
		$update_field.= "col_loc='".$input['col_loc']."'";
	}	
	else if(isset($input['initials'])) 
	{
		$update_field.= "initials='".$input['initials']."'";
	}	
	
	if($update_field && $input['id']) {
		$sql_query = "UPDATE records SET $update_field WHERE id='" . $input['id'] . "'";
		
		mysqli_query($conn, $sql_query) or die("database error:". mysqli_error($conn));
	}
}

?>