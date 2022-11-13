<?php
// Initialize the session
session_start();

// Check if the user is already logged in, if yes then redirect him to welcome page
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true && $_SESSION["user_type"] == 3) {
  header("location: view_details.php?view=" . $_SESSION['username'] . "");
} else if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true && $_SESSION["user_type"] != 3) {
  header("location: sal_struc.php");
}

// Include config file
require_once "config.php";

// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = $login_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  // Check if username is empty
  if (empty(trim($_POST["username"]))) {
    $username_err = "Please enter username.";
  } else {
    $username = trim($_POST["username"]);
  }

  // Check if password is empty
  if (empty(trim($_POST["password"]))) {
    $password_err = "Please enter your password.";
  } else {
    $password = trim($_POST["password"]);
  }

  // Validate credentials
  if (empty($username_err) && empty($password_err)) {
    // Prepare a select statement
    $sql = "SELECT id, username, password, user_type, user_status FROM users WHERE username = ?";

    if ($stmt = mysqli_prepare($link, $sql)) {
      // Bind variables to the prepared statement as parameters
      mysqli_stmt_bind_param($stmt, "s", $param_username);

      // Set parameters
      $param_username = $username;

      // Attempt to execute the prepared statement
      if (mysqli_stmt_execute($stmt)) {
        // Store result
        mysqli_stmt_store_result($stmt);

        // Check if username exists, if yes then verify password
        if (mysqli_stmt_num_rows($stmt) == 1) {
          // Bind result variables
          mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password, $user_type, $user_status);
          if (mysqli_stmt_fetch($stmt)) {
            if (password_verify($password, $hashed_password) && $user_status == 1) {

              $sqlpp = "SELECT emp_pic FROM gs_employees WHERE emp_id = '" . $username . "'";
              $resultpp = $link->query($sqlpp);
              $rowpp = $resultpp->fetch_assoc();

              // Password is correct, so start a new session
              session_start();

              // Store data in session variables
              $_SESSION["loggedin"] = true;
              $_SESSION["id"] = $id;
              $_SESSION["username"] = $username;
              $_SESSION["user_type"] = $user_type;
              $_SESSION["user_pp"] = $rowpp["emp_pic"];
              $_SESSION["dataUpdate"] = "0";
              $_SESSION["dataIns"] = "0";
              $_SESSION["message"] = "0";
              // Redirect user to welcome page

              if ($user_type == 3) {
                header("location: view_details.php?view=" . $username . "");
              } else {
                header("location: sal_struc.php");
              }
              $resultpp->free_result();
            } else {
              // Password is not valid, display a generic error message
              $login_err = "Invalid username or password or your account have been deactivated.";
            }
          }
        } else {
          // Username doesn't exist, display a generic error message
          $login_err = "Invalid username or password.";
        }
      } else {
        echo "Oops! Something went wrong. Please try again later.";
      }

      // Close statement
      mysqli_stmt_close($stmt);
    }
  }

  // Close connection
  mysqli_close($link);
}
?>

<!doctype html>
<!--
* Tabler - Premium and Open Source dashboard template with responsive and high quality UI.
* @version 1.0.0-beta10
* @link https://tabler.io
* Copyright 2018-2022 The Tabler Authors
* Copyright 2018-2022 codecalm.net Paweł Kuna
* Licensed under MIT (https://github.com/tabler/tabler/blob/master/LICENSE)
-->
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>Globalsync Pvt. Ltd. - Payroll System | Sign In</title>
  <!-- CSS files -->
  <link href="./dist/css/tabler.min.css" rel="stylesheet" />
  <link href="./dist/css/tabler-flags.min.css" rel="stylesheet" />
  <link href="./dist/css/tabler-payments.min.css" rel="stylesheet" />
  <link href="./dist/css/tabler-vendors.min.css" rel="stylesheet" />
  <link href="./dist/css/demo.min.css" rel="stylesheet" />
</head>

<body class=" border-top-wide border-primary d-flex flex-column">
  <div class="page page-center">
    <div class="container-tight py-4">
      <div class="text-center mb-4">
        <a href="." class="navbar-brand navbar-brand-autodark"><img src="./static/logo.png" height="100" alt=""><span class="text-dark h1 mb-0"></span></a>
      </div>

      <?php
      if (!empty($login_err)) {
        echo '<div class="alert alert-danger">' . $login_err . '</div>';
      }
      ?>



      <div class="card-body">
        <h1 class="card-title text-center mb-4"><span class="text-dark h1 mb-0"> Payroll System</span></h1>
        <div class="mb-3">
          <div class="row">
            <div class=" col-md-6 col-sm-6 col-lg-6">
              <a href="./in/index.php" class="btn btn-primary w-100">India</a>
            </div>
            <div class=" col-md-6 col-sm-6 col-lg-6">
              <a href="./ph/index.php" class="btn btn-primary w-100">Philippines</a>

            </div>
          </div>
        </div>
      </div>

      <!-- <form class="card card-md" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" autocomplete="off">
        <div class="card-body">
          <h2 class="card-title text-center mb-4">Login to your account</h2>
          <div class="mb-3">
            <label class="form-label">Username</label>
            <input type="text" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" placeholder="Username" value="<?php echo $username; ?>" name="username" autocomplete="off" />
            <span class="invalid-feedback"><?php echo $username_err; ?></span>
          </div>
          <div class="mb-2">
            <label class="form-label">
              Password
            </label>
            <input type="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" placeholder="Password" name="password" autocomplete="off" />
            <span class="invalid-feedback"><?php echo $password_err; ?></span>
          </div>
          <div class="form-footer">
            <button type="submit" class="btn btn-primary w-100">Sign in</button>
          </div>
        </div>
      </form> -->
    </div>
  </div>
  <!-- Libs JS -->
  <!-- Tabler Core -->
  <script src="./dist/js/tabler.min.js" defer></script>
  <script src="./dist/js/demo.min.js" defer></script>
  <script>
  var redir = '<?php echo $redirectPg ?>';
  if(redir == 1) {
    window.location.replace("error-404.php");
  }
</script>
</body>

</html>