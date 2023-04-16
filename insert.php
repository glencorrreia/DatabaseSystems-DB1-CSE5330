<!-- Project Phase 3 by Parshva Shah(ID: 1001838879) and Glen Correia(ID: 1001980331) -->

<?php
require_once 'config.php';

$mysqli = new mysqli($servername, $username, $password, $database) or die(mysqli_error($mysqli));
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Record</title>

     <!-- Latest compiled and minified CSS -->
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script>

    </script>
</head>
<body>
<div class="col-lg-6 offset-lg-3">
    <h1>Insert Record</h1>
    <form action="insert.php" method="POST" class="row justify-content-center">
        <div class="form-group mb-3 mt-3">
            <label for="id" class="col-md-3 control-label">Enter ID</label>
            <input type="text" name="id" placeholder="Enter ID">
        </div>
        <div class="form-group mb-3 mt-3">
            <label for="name" class="col-md-3 control-label">Enter Name</label>
            <input type="text" name="name" placeholder="Enter Name">
        </div>
        <div class="form-group mb-3 mt-3">
            <label for="birthdate" class="col-md-3 control-label">Enter Birth Date</label>
            <input type="date" name="birthdate" placeholder="Enter Birth Date">
        </div>
        <div class="form-group mb-3 mt-3">
            <label for="deathdate" class="col-md-3 control-label">Enter Death Date</label>
            <input type="date" name="deathdate" placeholder="Enter Death Date">
        </div>
        <div class="form-group mb-3 mt-3">
            <label for="commission" class="col-md-3 control-label">Enter Commission</label>
            <input type="text" name="commission" placeholder="Enter Commission">
        </div>
        <div class="form-group mb-3 mt-3">
            <label for="street" class="col-md-3 control-label">Enter Street</label>
            <input type="text" name="street" placeholder="Enter Street">
        </div>
        <div class="form-group mb-3 mt-3">
            <label for="city" class="col-md-3 control-label">Enter City</label>
            <input type="text" name="city" placeholder="Enter City">
        </div>
        <div class="form-group mb-3 mt-3">
            <label for="stateAb" class="col-md-3 control-label">Enter State</label>
            <select name="stateAb" id="stateAb">
            <?php
            // Fetch state Abbreviation from the State table so that we can enter the state only allowed by Art Gallery Database
            require_once 'config.php';

            $result = $mysqli->query("SELECT stateAb FROM STATE") or die($mysqli->error);

            while ($row = $result->fetch_array()) : ?>
                    <option value=<?php echo $row['stateAb']; ?>><?php echo $row['stateAb']; ?></option>
            <?php endwhile; ?>
            </select>
        </div>
        <div class="form-group mb-3 mt-3">
            <label for="zipcode" class="col-md-3 control-label">Enter Zip Code</label>
            <input type="text" name="zipcode" placeholder="Enter Zip Code">
        </div>
        <div class="form-group">
            <div class="col-md-12">
            <button type="submit" class="btn btn-primary" name="submit">Insert Record</button>
            </div>
        </div>
    </form>

    <?php

    require_once 'config.php';

    $mysqli = new mysqli($servername, $username, $password, $database) or die(mysqli_error($mysqli));

    if (isset($_POST['submit'])) {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $birthdate = $_POST['birthdate'];
        $deathdate = $_POST['deathdate'];
        $commission = $_POST['commission'];
        $street = $_POST['street'];
        $city = $_POST['city'];
        $state = $_POST['stateAb'];
        $zipcode = $_POST['zipcode'];

        $query = "INSERT INTO `ARTIST`(`aID`, `name`, `birthdate`, `deathDate`, `comission`, `street`, `city`, `stateAb`, `zipcode`) 
                VALUES ('$id', '$name', '$birthdate', " . ($deathdate==NULL ? "NULL" : "'$deathdate'") . ", '$commission', '$street', '$city', '$state', '$zipcode')";

        if (mysqli_query($mysqli, $query)) {
            echo "SQL Query:", $query;
            echo "<br>";
            echo "Artist added Successfully.<a type='button' class='btn btn-outline-secondary' href='index.php'>View Artists</a>";
        } else {
            echo "Error: " . $query . "<br>" . mysqli_error($mysqli);
        }
    
        mysqli_close($mysqli);

    }
    ?>
</div>
</body>
</html>