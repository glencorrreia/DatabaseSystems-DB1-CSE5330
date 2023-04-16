<!-- Project Phase 3 by Parshva Shah(ID: 1001838879) and Glen Correia(ID: 1001980331) -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artist Table</title>

    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<div class="form-group col-lg-6 offset-lg-3">
        <form action="" method="POST" class="form-group mb-3 mt-3">
            <div class="form-group">
                <label for="name" class="col-md-3 control-label">Enter Name</label>
                <input type="text" name="name" placeholder="Enter Name">
            </div>
            <button type="submit" class="btn btn-primary" name="submitName">Submit</button>
        </form>

        <form action="" method="POST" class="form-group mb-3 mt-3">
            <div class="form-group">
                <label for="city" class="col-md-3 control-label">Enter City</label>
                <input type="text" name="city" placeholder="Enter City">
            </div>
            <button type="submit" class="btn btn-primary" name="submitCity">Submit</button>
        </form>

        <form action="" method="POST" class="form-group mb-3 mt-3">
            <div class="form-group">
                <label for="commission" class="col-md-3 control-label">Enter Commission</label>
                <input type="text" name="commission" placeholder="Enter Commission">
            </div>
            <button type="submit" class="btn btn-primary" name="submitCom">Submit</button>
        </form>

    <?php

    require_once 'config.php';

    $mysqli = new mysqli($servername, $username, $password, $database) or die(mysqli_error($mysqli));

    // To search details by Artist Name
    if (isset($_POST['submitName'])) {
        $name = $_POST['name'];

        $nameQuery = "SELECT * FROM ARTIST WHERE name='{$name}'";
        $result = $mysqli->query($nameQuery) or die($mysqli->error);

        echo $nameQuery;
    }

    // To search details by the city Artist belongs to
    if (isset($_POST['submitCity'])) {
        $city = $_POST['city'];

        $cityQuery = "SELECT * FROM ARTIST WHERE city='{$city}'";
        $result = $mysqli->query($cityQuery) or die($mysqli->error);

        echo $cityQuery;
    }

    // To search details by Commission rate
    if (isset($_POST['submitCom'])) {
        $commission = $_POST['commission'];

        $commissionQuery = "SELECT * FROM ARTIST WHERE comission='{$commission}'";
        $result = $mysqli->query($commissionQuery) or die($mysqli->error);

        echo $commissionQuery;
    }
    ?>

<div class="table-responsive">
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
				</tr>
			<?php endwhile; ?>
		</table>
	</div>
</div>
</body>
</html>