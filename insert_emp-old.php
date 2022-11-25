<?php
require_once "config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $target_dir = "profiles/";
  $empNamePic = $_POST["full_name"];
  $target_file = $target_dir . trim($empNamePic) . trim(basename($_FILES["profile_pic"]["name"]));
  $target_file = strtolower($target_file);

  $uploadOk = 1;
  if ($_FILES["profile_pic"]["name"] == "" || $_FILES["profile_pic"]["name"] == "null") {
    $target_file = "NULL";
  } else {
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    if (isset($_POST["submit"])) {
      $check = getimagesize($_FILES["profile_pic"]["tmp_name"]);
      if ($check !== false) {
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
    if (
      $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
      && $imageFileType != "gif" && $imageFileType != "PNG" && $imageFileType != "JPEG"
      && $imageFileType != "JPG"
    ) {
      $file_error_msg = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
      $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
      $file_error_msg = "Sorry, your file was not uploaded.";
      // if everything is ok, try to upload file
    } else {
      if (move_uploaded_file($_FILES["profile_pic"]["tmp_name"], $target_file)) {
        echo "The file " . htmlspecialchars(basename($_FILES["profile_pic"]["name"])) . " has been uploaded.";
      } else {
        $file_error_msg = "Sorry, there was an error uploading your file.";
      }
    }
  }


  if ($uploadOk == 1) {
    print_r($_POST);
    var_dump($_POST);
    $password = $_POST["emp_pswd"];

    $param_password = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO gs_employees (emp_id, emp_name, emp_desg, emp_mail, doj, emp_dept, emp_pan, emp_uan, emp_esi, emp_pic, emp_paymode, emp_bank, emp_ifsc, emp_acc, emp_gsal, emp_food, emp_travel, emp_spl, emp_meal, emp_cab, emp_stinc, emp_inc, emp_other, emp_exitdate, emp_desp, emp_status, country_type, nick_name, line_manager, joining_month, date_of_hitting, ageing, rejoing_on, date_of_confirmation, exit_formalities, fnf, reason_of_leaving, type_of_attrition, annual_ctc_in, annual_ctc_new, in_hand_salary_with_stack, final_ctc_all, transport_r_a, father_name, gender, dob, marital_status, present_address_h_no, lacality_building, area, district, state, post_code, permanent_address_h_no, per_lacality_building, per_area, per_district, per_state, per_post_code, phone, mobile, primary_email, aadhaar, nominee_details, relation, address, emy_contact_no, emy_contact_relation, emy_contact_email, no_of_bank, no_of_family_member, mob_link_uan_no, blood_group, performer_month, verbal_warning, reason_of_verbal_warning, date_of_verbal_warning, no_of_warning, reason_of_warning, date_of_written_warning, pip_issue_date, appraisal_letter, appraisal_1, appraisal_2, appraisal_3, appraisal_4, ssc, hsc, graduation, experience_relieving, salary_slip, bank_statement, cancel_cheque ) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
// var_dump($sql);
    $stmt = $link->prepare($sql);
    var_dump($stmt);
    $stmt->bind_param("ssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss", $_POST["emp_id"], $_POST["full_name"], $_POST["emp_designation"], $_POST["email"], $_POST["doj"], $_POST["department"], $_POST["pan"], $_POST["uan"], $_POST["esi"], $target_file, $_POST["payment_mode"], $_POST["bank"], $_POST["ifsc"], $_POST["ac_no"], $_POST["gross"], $_POST["food_allw"], $_POST["travel_allw"], $_POST["spl_allowance"], $_POST["msa"], $_POST["tsa"], $_POST["stack"], $_POST["inc"], $_POST["others"], $_POST["eed"], $_POST["desc"], $_POST["emp_status"], $_POST["country_type"], $_POST["nick_name"], $_POST["line_manager"], $_POST["joining_month"], $_POST["date_of_hitting"], $_POST["ageing"], $_POST["rejoing_on"], $_POST["date_of_confirmation"], $_POST["exit_formalities"], $_POST["fnf"], $_POST["reason_of_leaving"], $_POST["type_of_attrition"], $_POST["annual_ctc_in"], $_POST["annual_ctc_new"], $_POST["in_hand_salary_with_stack"], $_POST["final_ctc_all"], $_POST["transport_r_a"], $_POST["father_name"], $_POST["gender"], $_POST["dob"], $_POST["marital_status"], $_POST["present_address_h_no"], $_POST["lacality_building"], $_POST["area"], $_POST["district"], $_POST["state"], $_POST["post_code"], $_POST["permanent_address_h_no"], $_POST["per_lacality_building"], $_POST["per_area"], $_POST["per_district"], $_POST["per_state"], $_POST["per_post_code"], $_POST["phone"], $_POST["mobile"], $_POST["primary_email"], $_POST["aadhaar"], $_POST["nominee_details"], $_POST["relation"], $_POST["address"], $_POST["emy_contact_no"], $_POST["emy_contact_relation"], $_POST["emy_contact_email"], $_POST["no_of_bank"], $_POST["no_of_family_member"], $_POST["mob_link_uan_no"], $_POST["blood_group"], $_POST["performer_month"], $_POST["verbal_warning"], $_POST["reason_of_verbal_warning"], $_POST["graduation"], $_POST["experience_relieving"], $_POST["salary_slip"], $_POST["bank_statement"], $_POST["cancel_cheque"]);
    $stmt->execute();

    $usersql = "INSERT INTO users (username, password, user_type, user_status, country_type) VALUES (?,?,?,?)";
    $userstmt = $link->prepare($usersql);
    $userstmt->bind_param("ssss", $_POST["emp_user_id"], $param_password, $_POST["user_type"], $_POST["emp_status"], $_POST["country_type"]);
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