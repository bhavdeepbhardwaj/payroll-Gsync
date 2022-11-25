<?php

require_once "config.php";

$id = $_POST['name'];
$filetype = array('jpeg','jpg','png','gif','PNG','JPEG','JPG');

   foreach ($_FILES as $key )
    {
        $name =$key['name'];
        $target_dir = "profiles/";
        $empNamePic = $_POST['name'];
        $target_file = $target_dir . $empNamePic . basename($key['name']);
        $file_ext =  pathinfo($name, PATHINFO_EXTENSION);

        if(in_array(strtolower($file_ext), $filetype))
        {
            move_uploaded_file($key['tmp_name'], $target_file);
            $sql = "UPDATE ph_employees SET emp_pic = '".$target_file."' WHERE emp_id = '".$id."'";

            $link -> query($sql);

            if($link -> affected_rows > 0){
                echo "1";
            } else {
                echo "Something went wrong. Try again.";
            }

            mysqli_close($link);
        }
    }

?>