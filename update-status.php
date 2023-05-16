<?php

require_once "config.php";

$status = $_POST['userSt'];
$id = $_POST['id'];

$sql = "UPDATE users, gs_employees SET users.user_status = '" . $status . "', gs_employees.emp_status = '" . $status . "' WHERE users.username = '" . $id . "' AND gs_employees.emp_id = '" . $id . "'";

// echo "<pre>";
// print_r($sql);
// die;
$link->query($sql);

if ($link->affected_rows > 0) {
    echo "Employee status have been updated.";
} else {
    echo "Something went wrong.";
}

mysqli_close($link);
