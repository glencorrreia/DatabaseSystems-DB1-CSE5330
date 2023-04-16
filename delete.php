<!-- Project Phase 3 by Parshva Shah(ID: 1001838879) and Glen Correia(ID: 1001980331) -->

<?php

require_once 'config.php';

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];

    $mysqli->query("DELETE FROM ARTIST WHERE aID='$id'") or die($mysqli->error);
   
    // Redirects to index.php after deleting a record
    header("location:index.php");

}

?>