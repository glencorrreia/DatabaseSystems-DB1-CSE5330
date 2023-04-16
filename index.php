<!-- Project Phase 3 by Parshva Shah(ID: 1001838879) and Glen Correia(ID: 1001980331) -->

<?php include 'config.php';
?>

<?php
	$mysqli = new mysqli($servername, $username, $password, $database) or die(mysqli_error($mysqli));

	$sql = "SELECT * FROM ARTIST";
	$result = $mysqli->query($sql) or die($mysqli->error);
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Artist Table</title>

	<!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
	<div class='container'>
	<div class='form-group'>
		<div class='row'>
			<div class='col-md-4'>
				<h2>Artist Table</h2>
			</div>
			<div class='col-md-4 text-right'>
				<a type="button" class="btn btn-primary" href="insert.php" style="margin-top: 20px;">Add a new record</a>
			</div>
			<div class='col-md-4 text-right'>
				<a type="button" class="btn btn-primary" href="display.artist.php" style="margin-top: 20px;">Search a record</a>
			</div>
		</div>
	</div>
	
	<div class="table-responsive">
		<h4><?php echo "SQL Query: ", $sql;?></h4>
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>aID</th>
					<th>Name</th>
					<th>Birth Date</th>
					<th>Death Date</th>
					<th>Commission</th>
					<th>Street</th>
					<th>City</th>
					<th>StateAb</th>
					<th>ZipCode</th>
					<th colspan="2">Action</th>
				</tr>
			</thead>
			<?php
			while ($row = $result->fetch_assoc()) : ?>
				<tr>
					<td><?php echo $row['aID']; ?></td>
					<td><?php echo $row['name']; ?></td>
					<td><?php echo $row['birthdate']; ?></td>
					<td><?php echo $row['deathDate'] ?? 'null' ?></td>
					<td><?php echo $row['comission']; ?></td>
					<td><?php echo $row['street']; ?></td>
					<td><?php echo $row['city']; ?></td>
					<td><?php echo $row['stateAb']; ?></td>
					<td><?php echo $row['zipcode']; ?></td>
					<td>
						<a href="update.php?edit=<?php echo $row['aID'];?>" class="btn btn-info">Edit</a>
						<a class="btn btn-danger" data-toggle="modal" data-target="#deleteModal-<?php echo $row['aID'];?>">Delete</a>

						<!-- Shows a popup to confirm if you want to delete a record or not -->
						<div class="modal" tabindex="-1" role="dialog" id="deleteModal-<?php echo $row['aID'];?>">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title">Delete Artist</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
									<p>Are you sure you want to delete the record?</p>
									<p>Perform "DELETE FROM ARTIST WHERE aID=<?php echo $row['aID']?>"
								</div>
								<div class="modal-footer">
									<a href="delete.php?delete=<?php echo $row['aID']; ?>"  type="button" class="btn btn-primary">Delete</a>
									<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
								</div>
								</div>
							</div>
							</div>
						</td>
				</tr>
		
			<?php endwhile; ?>
		</table>
	</div>

	<h4>
		<?php 
			echo "Language used: PHP";
			echo "<br>";
			echo "PHP Version: ", phpversion(); 
		?>
	</h4>
	
	</div>
</body>
</html>