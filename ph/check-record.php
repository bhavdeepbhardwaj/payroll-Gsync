<?php

require_once "config.php";

$usr = $_POST['uservar'];

$sql = "SELECT * FROM ph_users WHERE username = '".$usr."'";

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