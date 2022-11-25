<?php
require_once "config.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){

$target_dir = "/ph/profiles/";
$empNamePic = $_POST["full_name"];
$target_file = $target_dir . trim($empNamePic) . trim(basename($_FILES["profile_pic"]["name"]));
$target_file = strtolower($target_file);

$uploadOk = 1;
if($_FILES["profile_pic"]["name"] == "" || $_FILES["profile_pic"]["name"] == "null"){
  $target_file = "NULL";
} else {
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["profile_pic"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    $file_error_msg = "File is not an image.";
    $uploadOk = 0;
  }
}

// Check file size
if ($_FILES["profile_pic"]["size"] > 500000) {
    $file_error_msg = "Sorry, your file is too large. Max 500 KB allowed.";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" && $imageFileType != "PNG" && $imageFileType != "JPEG"
&& $imageFileType != "JPG" ) {
    $file_error_msg = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    $file_error_msg = "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["profile_pic"]["tmp_name"], $target_file)) {
    echo "The file ". htmlspecialchars( basename( $_FILES["profile_pic"]["name"])). " has been uploaded.";
  } else {
    $file_error_msg = "Sorry, there was an error uploading your file.";
  }
}
}

if($uploadOk == 1){

    $password = $_POST["emp_pswd"];

    $param_password = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO ph_employees (emp_id, emp_name, emp_desg, emp_mail, doj, emp_dept, emp_pan, emp_uan, emp_esi, emp_pic, emp_paymode, emp_bank, emp_ifsc, emp_acc, emp_gsal, emp_food, emp_travel, emp_spl, emp_meal, emp_cab, emp_stinc, emp_inc, emp_other, emp_exitdate, emp_desp, emp_status) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
    $stmt= $link->prepare($sql);
    $stmt->bind_param("ssssssssssssssssssssssssss", $_POST["emp_id"], $_POST["full_name"], $_POST["emp_designation"], $_POST["email"], $_POST["doj"], $_POST["department"], $_POST["pan"], $_POST["uan"], $_POST["esi"], $target_file, $_POST["payment_mode"], $_POST["bank"], $_POST["ifsc"], $_POST["ac_no"], $_POST["gross"], $_POST["food_allw"], $_POST["travel_allw"], $_POST["spl_allowance"], $_POST["msa"], $_POST["tsa"], $_POST["stack"], $_POST["inc"], $_POST["others"], $_POST["eed"], $_POST["desc"], $_POST["emp_status"]);
    $stmt->execute();

    $usersql = "INSERT INTO ph_users (username, password, user_type, user_status) VALUES (?,?,?,?)";
    $userstmt= $link->prepare($usersql);
    $userstmt->bind_param("ssss", $_POST["emp_user_id"], $param_password, $_POST["user_type"], $_POST["emp_status"]);
    $userstmt->execute();

    $_SESSION["dataUpdate"] = "0";
    $_SESSION["dataIns"] = "1";
    $_SESSION["message"] = "0";

    ?>

    <script>
      window.location.replace("view_emps.php");
    </script>

    <?php

    header("Location: view_emps.php");

    } else { ?>
        <script>
        $('#modal-danger').modal('show');
        </script>
 <?php   }

}

?>