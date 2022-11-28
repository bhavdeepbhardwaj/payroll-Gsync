<?php
require_once "config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $target_dir = "profiles/";
  $empNamePic = $_POST["full_name"];
  $target_file = $target_dir . trim($empNamePic) .' - '. trim(basename($_FILES["profile_pic"]["name"]));
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

  // Appraisal Letter PDF 

  $appraisal_letter_dir = "profiles/Appraisal/";
  // $appraisal_letter_emp = $_POST["full_name"];
  $appraisal_letter = $appraisal_letter_dir . trim($empNamePic) .' - '. trim(basename($_FILES["appraisal_letter"]["name"]));
  $appraisal_letter = strtolower($appraisal_letter);


  $uploadokApp = 1;
  if ($_FILES["appraisal_letter"]["name"] == "" || $_FILES["appraisal_letter"]["name"] == "null") {
    $appraisal_letter = "NULL";
  } else {
    $fileType = strtolower(pathinfo($appraisal_letter, PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    if (isset($_POST["submit"])) {
      $check = getimagesize($_FILES["appraisal_letter"]["tmp_name"]);
      if ($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadokApp = 1;
      } else {
        $file_error_msgapp = "File is not an image.";
        $uploadokApp = 0;
      }
    }

    // Check file size
    if ($_FILES["appraisal_letter"]["size"] > 5242880) {
      $file_error_msgapp = "Sorry, your file is too large. Max 500 KB allowed.";
      $uploadokApp = 0;
    }

    // Allow certain file formats
    if (
      $fileType != "jpg" && $fileType != "png" && $fileType != "jpeg"
      && $fileType != "pdf" && $fileType != "PNG" && $fileType != "JPEG"
      && $fileType != "JPG"
    ) {
      $file_error_msgapp = "Sorry, only JPG, JPEG, PNG & PDF files are allowed.";
      $uploadokApp = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadokApp == 0) {
      $file_error_msgapp = "Sorry, your file was not uploaded.";
      // if everything is ok, try to upload file
    } else {
      if (move_uploaded_file($_FILES["appraisal_letter"]["tmp_name"], $appraisal_letter)) {
        echo "The file " . htmlspecialchars(basename($_FILES["appraisal_letter"]["name"])) . " has been uploaded.";
      } else {
        $file_error_msgapp = "Sorry, there was an error uploading your file.";
      }
    }
  }

  // Appraisal 1 Letter PDF 


  $appraisal_1_dir = "profiles/Appraisal 1/";
  // $appraisal_letter_emp = $_POST["full_name"];
  $appraisal_1 = $appraisal_1_dir . trim($empNamePic) .' - '. trim(basename($_FILES["appraisal_1"]["name"]));
  $appraisal_1 = strtolower($appraisal_1);


  $uploadokApp1 = 1;
  if ($_FILES["appraisal_1"]["name"] == "" || $_FILES["appraisal_1"]["name"] == "null") {
    $appraisal_1 = "NULL";
  } else {
    $fileType = strtolower(pathinfo($appraisal_1, PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    if (isset($_POST["submit"])) {
      $check = getimagesize($_FILES["appraisal_1"]["tmp_name"]);
      if ($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadokApp1 = 1;
      } else {
        $file_error_msgaap1 = "File is not an image.";
        $uploadokApp1 = 0;
      }
    }

    // Check file size
    if ($_FILES["appraisal_1"]["size"] > 5242880) {
      $file_error_msgaap1 = "Sorry, your file is too large. Max 500 KB allowed.";
      $uploadokApp1 = 0;
    }

    // Allow certain file formats
    if (
      $fileType != "jpg" && $fileType != "png" && $fileType != "jpeg"
      && $fileType != "pdf" && $fileType != "PNG" && $fileType != "JPEG"
      && $fileType != "JPG"
    ) {
      $file_error_msgaap1 = "Sorry, only JPG, JPEG, PNG & PDF files are allowed.";
      $uploadokApp1 = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadokApp1 == 0) {
      $file_error_msgaap1 = "Sorry, your file was not uploaded.";
      // if everything is ok, try to upload file
    } else {
      if (move_uploaded_file($_FILES["appraisal_1"]["tmp_name"], $appraisal_1)) {
        echo "The file " . htmlspecialchars(basename($_FILES["appraisal_1"]["name"])) . " has been uploaded.";
      } else {
        $file_error_msgaap1 = "Sorry, there was an error uploading your file.";
      }
    }
  }

  // Appraisal 2 Letter PDF 


  $appraisal_2_dir = "profiles/Appraisal 2/";
  // $appraisal_letter_emp = $_POST["full_name"];
  $appraisal_2 = $appraisal_2_dir . trim($empNamePic) .' - '. trim(basename($_FILES["appraisal_2"]["name"]));
  $appraisal_2 = strtolower($appraisal_2);


  $uploadokApp2 = 1;
  if ($_FILES["appraisal_2"]["name"] == "" || $_FILES["appraisal_2"]["name"] == "null") {
    $appraisal_2 = "NULL";
  } else {
    $fileType = strtolower(pathinfo($appraisal_2, PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    if (isset($_POST["submit"])) {
      $check = getimagesize($_FILES["appraisal_2"]["tmp_name"]);
      if ($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadokApp2 = 1;
      } else {
        $file_error_msgaap2 = "File is not an image.";
        $uploadokApp2 = 0;
      }
    }

    // Check file size
    if ($_FILES["appraisal_2"]["size"] > 5242880) {
      $file_error_msgaap2 = "Sorry, your file is too large. Max 500 KB allowed.";
      $uploadokApp2 = 0;
    }

    // Allow certain file formats
    if (
      $fileType != "jpg" && $fileType != "png" && $fileType != "jpeg"
      && $fileType != "pdf" && $fileType != "PNG" && $fileType != "JPEG"
      && $fileType != "JPG"
    ) {
      $file_error_msgaap2 = "Sorry, only JPG, JPEG, PNG & PDF files are allowed.";
      $uploadokApp2 = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadokApp2 == 0) {
      $file_error_msgaap2 = "Sorry, your file was not uploaded.";
      // if everything is ok, try to upload file
    } else {
      if (move_uploaded_file($_FILES["appraisal_2"]["tmp_name"], $appraisal_2)) {
        echo "The file " . htmlspecialchars(basename($_FILES["appraisal_2"]["name"])) . " has been uploaded.";
      } else {
        $file_error_msgaap2 = "Sorry, there was an error uploading your file.";
      }
    }
  }


  // Appraisal 3 Letter PDF 


  $appraisal_3_dir = "profiles/Appraisal 3/";
  // $appraisal_letter_emp = $_POST["full_name"];
  $appraisal_3 = $appraisal_3_dir . trim($empNamePic) .' - '. trim(basename($_FILES["appraisal_3"]["name"]));
  $appraisal_3 = strtolower($appraisal_3);


  $uploadokApp3 = 1;
  if ($_FILES["appraisal_3"]["name"] == "" || $_FILES["appraisal_3"]["name"] == "null") {
    $appraisal_3 = "NULL";
  } else {
    $fileType = strtolower(pathinfo($appraisal_3, PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    if (isset($_POST["submit"])) {
      $check = getimagesize($_FILES["appraisal_3"]["tmp_name"]);
      if ($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadokApp3 = 1;
      } else {
        $file_error_msgaap3 = "File is not an image.";
        $uploadokApp3 = 0;
      }
    }

    // Check file size
    if ($_FILES["appraisal_3"]["size"] > 5242880) {
      $file_error_msgaap3 = "Sorry, your file is too large. Max 500 KB allowed.";
      $uploadokApp3 = 0;
    }

    // Allow certain file formats
    if (
      $fileType != "jpg" && $fileType != "png" && $fileType != "jpeg"
      && $fileType != "pdf" && $fileType != "PNG" && $fileType != "JPEG"
      && $fileType != "JPG"
    ) {
      $file_error_msgaap3 = "Sorry, only JPG, JPEG, PNG & PDF files are allowed.";
      $uploadokApp3 = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadokApp3 == 0) {
      $file_error_msgaap3 = "Sorry, your file was not uploaded.";
      // if everything is ok, try to upload file
    } else {
      if (move_uploaded_file($_FILES["appraisal_3"]["tmp_name"], $appraisal_3)) {
        echo "The file " . htmlspecialchars(basename($_FILES["appraisal_3"]["name"])) . " has been uploaded.";
      } else {
        $file_error_msgaap3 = "Sorry, there was an error uploading your file.";
      }
    }
  }

  // Appraisal 4 Letter PDF 


  $appraisal_4_dir = "profiles/Appraisal 4/";
  // $appraisal_letter_emp = $_POST["full_name"];
  $appraisal_4 = $appraisal_4_dir . trim($empNamePic) .' - '. trim(basename($_FILES["appraisal_4"]["name"]));
  $appraisal_4 = strtolower($appraisal_4);


  $uploadokApp4 = 1;
  if ($_FILES["appraisal_4"]["name"] == "" || $_FILES["appraisal_4"]["name"] == "null") {
    $appraisal_4 = "NULL";
  } else {
    $fileType = strtolower(pathinfo($appraisal_4, PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    if (isset($_POST["submit"])) {
      $check = getimagesize($_FILES["appraisal_4"]["tmp_name"]);
      if ($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadokApp4 = 1;
      } else {
        $file_error_msgaap4 = "File is not an image.";
        $uploadokApp4 = 0;
      }
    }

    // Check file size
    if ($_FILES["appraisal_4"]["size"] > 5242880) {
      $file_error_msgaap4 = "Sorry, your file is too large. Max 500 KB allowed.";
      $uploadokApp4 = 0;
    }

    // Allow certain file formats
    if (
      $fileType != "jpg" && $fileType != "png" && $fileType != "jpeg"
      && $fileType != "pdf" && $fileType != "PNG" && $fileType != "JPEG"
      && $fileType != "JPG"
    ) {
      $file_error_msgaap4 = "Sorry, only JPG, JPEG, PNG & PDF files are allowed.";
      $uploadokApp4 = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadokApp4 == 0) {
      $file_error_msgaap4 = "Sorry, your file was not uploaded.";
      // if everything is ok, try to upload file
    } else {
      if (move_uploaded_file($_FILES["appraisal_4"]["tmp_name"], $appraisal_4)) {
        echo "The file " . htmlspecialchars(basename($_FILES["appraisal_4"]["name"])) . " has been uploaded.";
      } else {
        $file_error_msgaap4 = "Sorry, there was an error uploading your file.";
      }
    }
  }

  // Secondary School Certificate PDF 


  $ssc_dir = "profiles/SSC/";
  // $appraisal_letter_emp = $_POST["full_name"];
  $ssc = $ssc_dir . trim($empNamePic) .' - '. trim(basename($_FILES["ssc"]["name"]));
  $ssc = strtolower($ssc);


  $sscok = 1;
  if ($_FILES["ssc"]["name"] == "" || $_FILES["ssc"]["name"] == "null") {
    $ssc = "NULL";
  } else {
    $fileType = strtolower(pathinfo($ssc, PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    if (isset($_POST["submit"])) {
      $check = getimagesize($_FILES["ssc"]["tmp_name"]);
      if ($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $sscok = 1;
      } else {
        $file_error_msgssc = "File is not an image.";
        $sscok = 0;
      }
    }

    // Check file size
    if ($_FILES["ssc"]["size"] > 5242880) {
      $file_error_msgssc = "Sorry, your file is too large. Max 500 KB allowed.";
      $sscok = 0;
    }

    // Allow certain file formats
    if (
      $fileType != "jpg" && $fileType != "png" && $fileType != "jpeg"
      && $fileType != "pdf" && $fileType != "PNG" && $fileType != "JPEG"
      && $fileType != "JPG"
    ) {
      $file_error_msgssc = "Sorry, only JPG, JPEG, PNG & PDF files are allowed.";
      $sscok = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($sscok == 0) {
      $file_error_msgssc = "Sorry, your file was not uploaded.";
      // if everything is ok, try to upload file
    } else {
      if (move_uploaded_file($_FILES["ssc"]["tmp_name"], $ssc)) {
        echo "The file " . htmlspecialchars(basename($_FILES["ssc"]["name"])) . " has been uploaded.";
      } else {
        $file_error_msgssc = "Sorry, there was an error uploading your file.";
      }
    }
  }

  // Higher Secondary School Certificate PDF 


  $hssc_dir = "profiles/HSSC/";
  // $appraisal_letter_emp = $_POST["full_name"];
  $hssc = $hssc_dir . trim($empNamePic) .' - '. trim(basename($_FILES["hsc"]["name"]));
  $hssc = strtolower($hssc);


  $hsscok = 1;
  if ($_FILES["hsc"]["name"] == "" || $_FILES["hsc"]["name"] == "null") {
    $hssc = "NULL";
  } else {
    $fileType = strtolower(pathinfo($hssc, PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    if (isset($_POST["submit"])) {
      $check = getimagesize($_FILES["hsc"]["tmp_name"]);
      if ($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $hsscok = 1;
      } else {
        $file_error_msghssc = "File is not an image.";
        $hsscok = 0;
      }
    }

    // Check file size
    if ($_FILES["hsc"]["size"] > 5242880) {
      $file_error_msghssc = "Sorry, your file is too large. Max 500 KB allowed.";
      $hsscok = 0;
    }

    // Allow certain file formats
    if (
      $fileType != "jpg" && $fileType != "png" && $fileType != "jpeg"
      && $fileType != "pdf" && $fileType != "PNG" && $fileType != "JPEG"
      && $fileType != "JPG"
    ) {
      $file_error_msghssc = "Sorry, only JPG, JPEG, PNG & PDF files are allowed.";
      $hsscok = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($hsscok == 0) {
      $file_error_msghssc = "Sorry, your file was not uploaded.";
      // if everything is ok, try to upload file
    } else {
      if (move_uploaded_file($_FILES["hsc"]["tmp_name"], $hssc)) {
        echo "The file " . htmlspecialchars(basename($_FILES["hsc"]["name"])) . " has been uploaded.";
      } else {
        $file_error_msghssc = "Sorry, there was an error uploading your file.";
      }
    }
  }

  // Graduation Certificate PDF 


  $grad_dir = "profiles/Graduation/";
  // $appraisal_letter_emp = $_POST["full_name"];
  $grad = $grad_dir . trim($empNamePic) .' - '. trim(basename($_FILES["graduation"]["name"]));
  $grad = strtolower($grad);


  $gradok = 1;
  if ($_FILES["graduation"]["name"] == "" || $_FILES["graduation"]["name"] == "null") {
    $grad = "NULL";
  } else {
    $fileType = strtolower(pathinfo($grad, PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    if (isset($_POST["submit"])) {
      $check = getimagesize($_FILES["graduation"]["tmp_name"]);
      if ($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $gradok = 1;
      } else {
        $file_error_msgg = "File is not an image.";
        $gradok = 0;
      }
    }

    // Check file size
    if ($_FILES["graduation"]["size"] > 5242880) {
      $file_error_msgg = "Sorry, your file is too large. Max 500 KB allowed.";
      $gradok = 0;
    }

    // Allow certain file formats
    if (
      $fileType != "jpg" && $fileType != "png" && $fileType != "jpeg"
      && $fileType != "pdf" && $fileType != "PNG" && $fileType != "JPEG"
      && $fileType != "JPG"
    ) {
      $file_error_msgg = "Sorry, only JPG, JPEG, PNG & PDF files are allowed.";
      $gradok = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($gradok == 0) {
      $file_error_msgg = "Sorry, your file was not uploaded.";
      // if everything is ok, try to upload file
    } else {
      if (move_uploaded_file($_FILES["graduation"]["tmp_name"], $grad)) {
        echo "The file " . htmlspecialchars(basename($_FILES["graduation"]["name"])) . " has been uploaded.";
      } else {
        $file_error_msgg = "Sorry, there was an error uploading your file.";
      }
    }
  }

  // Experience Relieving Certificate PDF 


  $er_dir = "profiles/Experience Relieving/";
  // $appraisal_letter_emp = $_POST["full_name"];
  $er = $er_dir . trim($empNamePic) .' - '. trim(basename($_FILES["experience_relieving"]["name"]));
  $er = strtolower($er);


  $erok = 1;
  if ($_FILES["experience_relieving"]["name"] == "" || $_FILES["experience_relieving"]["name"] == "null") {
    $er = "NULL";
  } else {
    $fileType = strtolower(pathinfo($er, PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    if (isset($_POST["submit"])) {
      $check = getimagesize($_FILES["experience_relieving"]["tmp_name"]);
      if ($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $erok = 1;
      } else {
        $file_error_msger = "File is not an image.";
        $erok = 0;
      }
    }

    // Check file size
    if ($_FILES["experience_relieving"]["size"] > 5242880) {
      $file_error_msger = "Sorry, your file is too large. Max 500 KB allowed.";
      $erok = 0;
    }

    // Allow certain file formats
    if (
      $fileType != "jpg" && $fileType != "png" && $fileType != "jpeg"
      && $fileType != "pdf" && $fileType != "PNG" && $fileType != "JPEG"
      && $fileType != "JPG"
    ) {
      $file_error_msger = "Sorry, only JPG, JPEG, PNG & PDF files are allowed.";
      $erok = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($erok == 0) {
      $file_error_msger = "Sorry, your file was not uploaded.";
      // if everything is ok, try to upload file
    } else {
      if (move_uploaded_file($_FILES["experience_relieving"]["tmp_name"], $er)) {
        echo "The file " . htmlspecialchars(basename($_FILES["experience_relieving"]["name"])) . " has been uploaded.";
      } else {
        $file_error_msger = "Sorry, there was an error uploading your file.";
      }
    }
  }

  // Salary Ship Csstificate PDF 


  $ss_dir = "profiles/Salary Ship/";
  // $appraisal_lettss_emp = $_POST["full_name"];
  $ss = $ss_dir . trim($empNamePic) .' - '. trim(basename($_FILES["salary_slip"]["name"]));
  $ss = strtolower($ss);


  $ssok = 1;
  if ($_FILES["salary_slip"]["name"] == "" || $_FILES["salary_slip"]["name"] == "null") {
    $ss = "NULL";
  } else {
    $fileType = strtolower(pathinfo($ss, PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    if (isset($_POST["submit"])) {
      $check = getimagesize($_FILES["salary_slip"]["tmp_name"]);
      if ($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $ssok = 1;
      } else {
        $file_error_msgss = "File is not an image.";
        $ssok = 0;
      }
    }

    // Check file size
    if ($_FILES["salary_slip"]["size"] > 5242880) {
      $file_error_msgss = "Sorry, your file is too large. Max 500 KB allowed.";
      $ssok = 0;
    }

    // Allow csstain file formats
    if (
      $fileType != "jpg" && $fileType != "png" && $fileType != "jpeg"
      && $fileType != "pdf" && $fileType != "PNG" && $fileType != "JPEG"
      && $fileType != "JPG"
    ) {
      $file_error_msgss = "Sorry, only JPG, JPEG, PNG & PDF files are allowed.";
      $ssok = 0;
    }

    // Check if $uploadOk is set to 0 by an ssror
    if ($ssok == 0) {
      $file_error_msgss = "Sorry, your file was not uploaded.";
      // if evssything is ok, try to upload file
    } else {
      if (move_uploaded_file($_FILES["salary_slip"]["tmp_name"], $ss)) {
        echo "The file " . htmlspecialchars(basename($_FILES["salary_slip"]["name"])) . " has been uploaded.";
      } else {
        $file_error_msgss = "Sorry, thsse was an ssror uploading your file.";
      }
    }
  }


  // Bank Statement PDF 


  $bs_dir = "profiles/Bank Statement/";
  // $appraisal_lettss_emp = $_POST["full_name"];
  $bs = $bs_dir . trim($empNamePic) .' - '. trim(basename($_FILES["bank_statement"]["name"]));
  $bs = strtolower($bs);


  $bsok = 1;
  if ($_FILES["bank_statement"]["name"] == "" || $_FILES["bank_statement"]["name"] == "null") {
    $bs = "NULL";
  } else {
    $fileType = strtolower(pathinfo($bs, PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    if (isset($_POST["submit"])) {
      $check = getimagesize($_FILES["bank_statement"]["tmp_name"]);
      if ($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $bsok = 1;
      } else {
        $file_error_msgbs = "File is not an image.";
        $bsok = 0;
      }
    }

    // Check file size
    if ($_FILES["bank_statement"]["size"] > 5242880) {
      $file_error_msgbs = "Sorry, your file is too large. Max 500 KB allowed.";
      $bsok = 0;
    }

    // Allow csstain file formats
    if (
      $fileType != "jpg" && $fileType != "png" && $fileType != "jpeg"
      && $fileType != "pdf" && $fileType != "PNG" && $fileType != "JPEG"
      && $fileType != "JPG"
    ) {
      $file_error_msgbs = "Sorry, only JPG, JPEG, PNG & PDF files are allowed.";
      $bsok = 0;
    }

    // Check if $uploadOk is set to 0 by an ssror
    if ($bsok == 0) {
      $file_error_msgbs = "Sorry, your file was not uploaded.";
      // if evssything is ok, try to upload file
    } else {
      if (move_uploaded_file($_FILES["bank_statement"]["tmp_name"], $bs)) {
        echo "The file " . htmlspecialchars(basename($_FILES["bank_statement"]["name"])) . " has been uploaded.";
      } else {
        $file_error_msgbs = "Sorry, thsse was an ssror uploading your file.";
      }
    }
  }

  // Cancel Cheque PDF 


  $cc_dir = "profiles/Cancel Cheque/";
  // $appraisal_lettss_emp = $_POST["full_name"];
  $cc = $cc_dir . trim($empNamePic) .' - '. trim(basename($_FILES["cancel_cheque"]["name"]));
  $cc = strtolower($cc);


  $ccok = 1;
  if ($_FILES["cancel_cheque"]["name"] == "" || $_FILES["cancel_cheque"]["name"] == "null") {
    $cc = "NULL";
  } else {
    $fileType = strtolower(pathinfo($cc, PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    if (isset($_POST["submit"])) {
      $check = getimagesize($_FILES["cancel_cheque"]["tmp_name"]);
      if ($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $ccok = 1;
      } else {
        $file_error_msgcc = "File is not an image.";
        $ccok = 0;
      }
    }

    // Check file size
    if ($_FILES["cancel_cheque"]["size"] > 5242880) {
      $file_error_msgcc = "Sorry, your file is too large. Max 500 KB allowed.";
      $ccok = 0;
    }

    // Allow csstain file formats
    if (
      $fileType != "jpg" && $fileType != "png" && $fileType != "jpeg"
      && $fileType != "pdf" && $fileType != "PNG" && $fileType != "JPEG"
      && $fileType != "JPG"
    ) {
      $file_error_msgcc = "Sorry, only JPG, JPEG, PNG & PDF files are allowed.";
      $ccok = 0;
    }

    // Check if $uploadOk is set to 0 by an ssror
    if ($ccok == 0) {
      $file_error_msgcc = "Sorry, your file was not uploaded.";
      // if evssything is ok, try to upload file
    } else {
      if (move_uploaded_file($_FILES["cancel_cheque"]["tmp_name"], $cc)) {
        echo "The file " . htmlspecialchars(basename($_FILES["cancel_cheque"]["name"])) . " has been uploaded.";
      } else {
        $file_error_msgcc = "Sorry, thsse was an ssror uploading your file.";
      }
    }
  }





  if ($uploadOk == 1 && $uploadokApp == 1 && $uploadokApp1 == 1 && $uploadokApp2 == 1 && $uploadokApp3 == 1 && $uploadokApp4 == 1 && $sscok == 1 && $hsscok == 1 && $gradok == 1 && $ssok == 1 && $bsok == 1 && $ccok == 1) {
    // print_r($_POST);
    // var_dump($_POST);
    $password = $_POST["emp_pswd"];

    $param_password = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO gs_employees (emp_id, emp_name, emp_desg, emp_mail, doj, emp_dept, emp_pan, emp_uan, emp_esi, emp_pic, emp_paymode, emp_bank, emp_ifsc, emp_acc, emp_gsal, emp_food, emp_travel, emp_spl, emp_meal, emp_cab, emp_stinc, emp_inc, emp_other, emp_exitdate, emp_desp, emp_status, country_type, nick_name, line_manager, joining_month, date_of_hitting, ageing, rejoing_on, date_of_confirmation, exit_formalities, fnf, reason_of_leaving, type_of_attrition, annual_ctc_in, annual_ctc_new, in_hand_salary_with_stack, final_ctc_all, transport_r_a, father_name, gender, dob, marital_status, present_address_h_no, lacality_building, area, district, state, post_code, permanent_address_h_no, per_lacality_building, per_area, per_district, per_state, per_post_code, phone, mobile, primary_email, aadhaar, nominee_details, relation, address, emy_contact_no, emy_contact_relation, emy_contact_email, no_of_bank, no_of_family_member, mob_link_uan_no, blood_group, performer_month, verbal_warning, reason_of_verbal_warning, date_of_verbal_warning, no_of_warning, reason_of_warning, date_of_written_warning, pip_issue_date, appraisal_letter, appraisal_1, appraisal_2, appraisal_3, appraisal_4, ssc, hsc, graduation, experience_relieving, salary_slip, bank_statement, cancel_cheque ) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
    // var_dump($sql);
    // echo "<pre>";
    // print_r($sql);
    // echo "</pre>";
    $stmt = $link->prepare($sql);
    // var_dump($stmt);
    $stmt->bind_param("sssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss", $_POST["emp_id"], $_POST["full_name"], $_POST["emp_designation"], $_POST["email"], $_POST["doj"], $_POST["department"], $_POST["pan"], $_POST["uan"], $_POST["esi"], $target_file, $_POST["payment_mode"], $_POST["bank"], $_POST["ifsc"], $_POST["ac_no"], $_POST["gross"], $_POST["food_allw"], $_POST["travel_allw"], $_POST["spl_allowance"], $_POST["msa"], $_POST["tsa"], $_POST["stack"], $_POST["inc"], $_POST["others"], $_POST["eed"], $_POST["desc"], $_POST["emp_status"], $_POST["country_type"], $_POST["nick_name"], $_POST["line_manager"], $_POST["joining_month"], $_POST["date_of_hitting"], $_POST["ageing"], $_POST["rejoing_on"], $_POST["date_of_confirmation"], $_POST["exit_formalities"], $_POST["fnf"], $_POST["reason_of_leaving"], $_POST["type_of_attrition"], $_POST["annual_ctc_in"], $_POST["annual_ctc_new"], $_POST["in_hand_salary_with_stack"], $_POST["final_ctc_all"], $_POST["transport_r_a"], $_POST["father_name"], $_POST["gender"], $_POST["dob"], $_POST["marital_status"], $_POST["present_address_h_no"], $_POST["lacality_building"], $_POST["area"], $_POST["district"], $_POST["state"], $_POST["post_code"], $_POST["permanent_address_h_no"], $_POST["per_lacality_building"], $_POST["per_area"], $_POST["per_district"], $_POST["per_state"], $_POST["per_post_code"], $_POST["phone"], $_POST["mobile"], $_POST["primary_email"], $_POST["aadhaar"], $_POST["nominee_details"], $_POST["relation"], $_POST["address"], $_POST["emy_contact_no"], $_POST["emy_contact_relation"], $_POST["emy_contact_email"], $_POST["no_of_bank"], $_POST["no_of_family_member"], $_POST["mob_link_uan_no"], $_POST["blood_group"], $_POST["performer_month"], $_POST["verbal_warning"], $_POST["reason_of_verbal_warning"], $_POST["date_of_verbal_warning"], $_POST["	no_of_warning"], $_POST["	reason_of_warning"], $_POST["date_of_written_warning"], $_POST["pip_issue_date"], $appraisal_letter, $appraisal_1, $appraisal_2, $appraisal_3, $appraisal_4, $ssc, $hsc, $grad, $er, $ss, $bs, $cc);
    $stmt->execute();

    $usersql = "INSERT INTO users (username, password, user_type, user_status, country_type) VALUES (?,?,?,?,?)";
    $userstmt = $link->prepare($usersql);
    // var_dump($_POST["emp_user_id"], $param_password, $_POST["user_type"], $_POST["emp_status"], $_POST["country_type"]);
    $userstmt->bind_param("sssss", $_POST["emp_user_id"], $param_password, $_POST["user_type"], $_POST["emp_status"], $_POST["country_type"]);
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