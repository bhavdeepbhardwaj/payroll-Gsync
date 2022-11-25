<?php

require_once "config.php";

$emp = $_POST['empvar'];

$sql = "SELECT * FROM ph_employees WHERE emp_id = '".$emp."'";

$result = $link -> query($sql);

if($row = $result -> fetch_row() > 0){
    echo "1";
    $result -> free_result();
} else {
    echo "0";
    $result -> free_result();
}

mysqli_close($link);

?>