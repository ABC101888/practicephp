<?php
  	if (isset($_POST['Delete']))
	{			
		$acno = mysqli_real_escape_string($conn, $_POST['acno']);
		
		$sql2 = "DELETE FROM records WHERE acno='$acno'";
		
		$results = mysqli_query($conn, $sql2);
			
		header("Location: jan.php");
		exit();
	}
?>