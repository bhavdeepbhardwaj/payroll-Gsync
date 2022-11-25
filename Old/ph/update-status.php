<?php

require_once "config.php";

$status = $_POST['userSt'];
$id = $_POST['id'];

$sql = "UPDATE ph_users, ph_employees SET ph_users.user_status = '".$status."', ph_employees.emp_status = '".$status."' WHERE ph_users.username = '".$id."' AND ph_employees.emp_id = '".$id."'";

$link -> query($sql);

if($link -> affected_rows > 0){
    echo "Employee status have been updated.";
} else {
    echo "Something went wrong.";
}

mysqli_close($link);
?>