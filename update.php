<!-- Project Phase 3 by Parshva Shah(ID: 1001838879) and Glen Correia(ID: 1001980331) -->

<?php

include_once 'config.php';

if (isset($_POST['update'])) {
    $aID = $_POST['id'];
    $name = $_POST['name'];
    $birthDate = $_POST['birthdate'];
    $deathDate = $_POST['deathdate'];
    $commission = $_POST['commission'];
    $street = $_POST['street'];
    $city = $_POST['city'];
    $stateAb = $_POST['stateAb'];
    $zipCode = $_POST['zipcode'];

    $updateQuery = "UPDATE ARTIST SET name='$name', birthdate='$birthDate', deathDate=" . ($deathdate==NULL ? "NULL" : "'$deathdate'") . ", comission='$commission', street='$street', city='$city', stateAb='$stateAb', zipcode='$zipCode' WHERE aID='$aID'";

    if (mysqli_query($mysqli, $updateQuery)) {
        echo "SQL Query: ", $updateQuery;
        echo "<br>";
        echo "Artist updated Successfully.<a type='button' class='btn btn-outline-secondary' href='index.php'>View Artists</a>";
    } else {
        echo "Error: " . $updateQuery . "<br>" . mysqli_error($mysqli);
    }

}
?>
<?php
    // Parsing the edit url to get aID. 
    $parts = parse_url($_SERVER['REQUEST_URI'], PHP_URL_QUERY);
    parse_str($parts, $query);
    $id = $query['edit'];

    $selectSQL = "SELECT * FROM ARTIST WHERE aID='$id'";


    $result = mysqli_query($mysqli, $selectSQL) or die(mysqli_error($mysqli));

    while ($row = mysqli_fetch_array($result)) {
        $aID = $row['aID'];
        $name = $row['name'];
        $birthDate = $row['birthdate'];
        $deathDate = $row['deathDate'];
        $commission = $row['comission'];
        $street = $row['street'];
        $city = $row['city'];
        $stateAb = $row['stateAb'];
        $zipCode = $row['zipcode'];
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Record</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
<div class="col-lg-6 offset-lg-3">
    <h1>Update Record</h1>
    <form action="update.php" class="row justify-content-center" method="POST">
        
            <div class="form-group">
                <label for="id" class="col-md-3 control-label">Enter ID</label>
                <input type="text" name="id" value='<?php echo $aID; ?>' placeholder="Enter ID"
                           readonly>
            </div>
        

        
            <div class="form-group">
                <label for="name" class="col-md-3 control-label">Enter Name</label>
                
                <input type="text" name="name" placeholder="Enter Name" value="<?php echo $name; ?>">
                
            </div>
       

            <div class="form-group">
                <label for="birthdate" class="col-md-3 control-label">Enter Birth Date</label>
                <input type="date" name="birthdate" placeholder="Enter Birth Date"
                           value="<?php echo $birthDate; ?>">
            </div>

            <div class="form-group">
                <label for="deathdate" class="col-md-3 control-label">Enter Death Date</label>
                <input type="date" name="deathdate" placeholder="Enter Death Date"
                           value="<?php echo $deathDate; ?>">
            </div>

            <div class="form-group">
                <label for="commission" class="col-md-3 control-label">Enter Commission</label>
                <input type="text" name="commission" placeholder="Enter Commission"
                           value="<?php echo $commission; ?>">
            </div>

            <div class="form-group">
                <label for="street" class="col-md-3 control-label">Enter Street</label>
                <input type="text" name="street" placeholder="Enter Street" value="<?php echo $street; ?>">
            </div>

        <div class="form-group">
                <label for="city" class="col-md-3 control-label">Enter City</label>
                <input type="text" name="city" placeholder="Enter City" value="<?php echo $city; ?>">
        </div>

        <div class="form-group">
            <label for="stateAb" class="col-md-3 control-label">Enter State</label>
            <select name="stateAb" id="stateAb">
            <?php
            
            require_once 'config.php';

            $result = $mysqli->query("SELECT stateAb FROM STATE") or die($mysqli->error);

            while ($row = $result->fetch_array()) : ?>
                    <option value=<?php echo $row['stateAb']?> <?php if ($row['stateAb'] == $stateAb) echo 'selected="selected"'; ?> ><?php echo $row['stateAb']?></option>
            <?php endwhile; ?>
            </select>
        </div>

        <div class="form-group">
            <label for="zipcode" class="col-md-3 control-label">Enter Zip Code</label>
            <input type="text" name="zipcode" placeholder="Enter Zip Code" value="<?php echo $zipCode; ?>">
        </div>
        <div class="form-group">
            <div class="col-md-12">
                <button type="submit" class="btn btn-primary" name="update">Update Records</button>
            </div>
        </div>
    </form>
</div>
</body>

</html>