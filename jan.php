<?php 
include("db_connect.php");
include("jan_action.php");
include("jan_del_action.php");
?>

<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
		<!-- jQuery -->
		<script type="text/javascript" src="dist/jquery.tabledit.min.js"></script>

		<title>Patient Results</title>
	</head>
		
	<body class="">
		<div role="navigation" class="navbar navbar-default navbar-static-top">
			<div class="container">
				<div class="navbar-header">
					<span style="font-size:24px; color: grey">Records</span>
				</div>
				<div class="navbar-collapse collapse">
					<ul class="nav navbar-nav">
				  	</ul>
				</div><!--/.nav-collapse -->
			 </div>
		</div>
		
		<div>
			<span style="font-size: 22px">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;</span>
			<a href="calendar.php" style="text-decoration: none; font-size: 22px">&laquo; Back</a>
		</div>

		<div class="container" style="min-height:500px;">
			<div class="container home">	
				<h1 align="center">Patient Results</h1>		 
				<table id="data_table" class="table table-bordered table-hover">
					<thead>
						<tr>
							<th>ID</th>
							<th>Accession#</th>
							<th>Patient Name</th>
							<th>Collection Date</th>
							<th>Test Ordered</th>	
							<th>Results Released & Faxed Destination</th>
							<th>Collection Location</th>
							<th>Initials</th>
						</tr>
					</thead>
					<tbody>
						<?php 
							$sql = "select * from records where extract(month from col_date) = 1 AND extract(year from col_date) = YEAR(CURDATE())";
								
							$result = mysqli_query($conn, $sql);
							$row = mysqli_fetch_array($result);
							$count = mysqli_num_rows($result);
							
							if($count>0)
							{
								if($result = mysqli_query($conn, $sql))
								{
									if(mysqli_num_rows($result) > 0)
									{
										while($row = mysqli_fetch_array($result))
										{
											

											if($row['fax'] == NULL)
											{
						?>
											<tr id="<?php echo $row['id'] ?>" style="background: yellow">
											   	<td><?php echo $row['id']; ?></td>
												<td><?php echo $row['acno']; ?></td>
											   	<td><?php echo $row ['name']; ?></td>
											   	<td><?php echo $row ['col_date']; ?></td>
											   	<td><?php echo $row ['test']; ?></td>   
											   	<td><?php echo $row ['fax']; ?></td>
											   	<td><?php echo $row ['col_loc']; ?></td>
											   	<td><?php echo $row ['initials']; ?></td>    
											</tr>
						<?php
											}
											else
											{
						?>
											<tr id="<?php echo $row['id'] ?>" ?>
												<td><?php echo $row['id']; ?></td>
												<td><?php echo $row['acno']; ?></td>
											   	<td><?php echo $row ['name']; ?></td>
											   	<td><?php echo $row ['col_date']; ?></td>
											   	<td><?php echo $row ['test']; ?></td>   
											   	<td><?php echo $row ['fax']; ?></td>
											   	<td><?php echo $row ['col_loc']; ?></td>
											   	<td><?php echo $row ['initials']; ?></td>   
											</tr>
						<?php
											}
										}
									}
								}
							}
						?>
					</tbody>
				</table>

				<div>
					<button style="float:left" type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#add">Record</button>
					<button style="float:right" type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#del">Delete</button>
				</div>

				<div class="modal fade" id="add" role="dialog">
					<div class="modal-dialog">

						<!-- Modal content-->
						<div class="modal-content">
							<form action="" method="post">
								<div class="modal-header">
								  <button type="button" class="close" data-dismiss="modal">&times;</button>
								  <h4 class="modal-title">Modal Header</h4>
								</div>

								<div class="modal-body">
									<div>
										Accession #
										<input type="text" name="acno"/>
									</div>
									<br>
									<div>
										Patient Name	
										<input type="text" name="name"/>
									</div>
									<br>
									<div>
										Collection Date
										<input type="text" name="col_date"/>
									</div>
									<br>
									<div>
										Test Ordered 
										<input type="text" name="test"/>
									</div>
									<br>
									<div>
										Results Released & Faxed Destination 
										<input type="text" name="fax" />
									</div>
									<br>
									<div>
										Collection Location	
										<input type="text" name="col_loc"/>
									</div>
									<br>
									<div>
										Initials	
										<input type="text" name="initials"/>
									</div>
								</div>

								<div class="modal-footer">
								  <button type="button" style="float: right" class="btn btn-default" data-dismiss="modal">Close</button>
								  <input type="submit" style="float: left" name="submit">
								</div>
							</form>
						</div>
					</div>
				</div>

				<div class="modal fade" id="del" role="dialog">
					<div class="modal-dialog">

						<!-- Modal content-->
						<div class="modal-content">
							<form action="" method="post">
								<div class="modal-header">
								  <button type="button" class="close" data-dismiss="modal">&times;</button>
								  <h4 class="modal-title">Delete Record</h4>
								</div>

								<div class="modal-body">
									<div>
										Accession #
										<input type="text" name="acno"/>
									</div>
								</div>

								<div class="modal-footer">
								  <button type="button" style="float: left" class="btn btn-default" data-dismiss="modal">Close</button>
								  <input type="submit" style="float: right" name="Delete">
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
			
		<div class="footer insert-post-ads1" style="margin-top:20px;">
			<div style="text-align:center">
				<p style="font-size: 14px; margin:4px;">Delaware Diagnostic Labs</p>
				<span class="footer_text" style="font-size: 10px;">Copyright © 2019 All Rights Reserved. </span>
			</div>
		</div>
	<script type="text/javascript" src="custom_table_edit.js"></script>
</body>
</html>



                                                                                                       