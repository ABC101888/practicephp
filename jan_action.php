<?php
  	if (isset($_POST['submit']))
	{			
		$acno = mysqli_real_escape_string($conn, $_POST['acno']);
		$name = mysqli_real_escape_string($conn, $_POST['name']);
		$col_date = mysqli_real_escape_string($conn, $_POST['col_date']);
		$test = mysqli_real_escape_string($conn, $_POST['test']);			
		$fax = mysqli_real_escape_string($conn, $_POST['fax']);
		$col_loc = mysqli_real_escape_string($conn, $_POST['col_loc']);
		$initial = mysqli_real_escape_string($conn, $_POST['initials']);
			
		$sql1 = "INSERT INTO `records`(id, acno, `name`, col_date, test, fax, col_loc, initials) VALUES ('$id', '$acno', '$name', '$col_date', '$test', '$fax', '$col_loc', '$initial')";
		
		$results = mysqli_query($conn, $sql1);
			
		header("Location: jan.php");
		exit();
	}
?>

