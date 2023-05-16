<?php $empid = $_GET["view"];

if (empty($empid)) {
  header("Location: error-404.php");
} ?>

<?php $parent_page = "emp"; ?>
<?php $page = "view_emps"; ?>
<?php include "config.php"; ?>
<?php include "header.php"; ?>

<?php

if ($_SESSION["user_type"] == 3 && ($_SESSION["username"] != $empid)) {
  $redirectPg = 1;
} else {
  $redirectPg = 0;
}

if (isset($_GET["view"])) {
  $id = $_GET["view"];

  $sql = "SELECT * FROM gs_employees WHERE emp_id = '" . $id . "' AND country_type = 'In'";


  // $sql = "SELECT * FROM gs_employees WHERE emp_id = '" . $id . "'";

  $res = mysqli_query($link, $sql);

  $row = mysqli_fetch_assoc($res);

  $empid = $row["emp_id"];

  $sqlid = "SELECT * FROM users WHERE username = '" . $id . "'";

  $resid = mysqli_query($link, $sqlid);

  $rowid = mysqli_fetch_assoc($resid);


  $sal_details_query = "SELECT * FROM gs_emp_salary WHERE employee_id = '" . $id . "' AND country_type = 'In' ORDER BY month_yr DESC";

  // $sal_details_query = "SELECT * FROM gs_emp_salary WHERE employee_id = '" . $id . "' ORDER BY month_yr DESC";

  $sal_d_run = mysqli_query($link, $sal_details_query);
}

?>

<div class="page-wrapper">
  <div class="container-xl">
    <!-- Page title -->
    <div class="page-header d-print-none">
      <div class="row g-2 align-items-center">
        <div class="col">
          <h2 class="page-title">
            <?php echo $row['emp_name']; ?>
          </h2>
        </div>
      </div>
    </div>
  </div>
  <div class="page-body">
    <div class="container-xl">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Basic Info</h3>
          <?php if ($_SESSION["user_type"] != 3) { ?>

            <div class="card-actions">
              <a href="edit_details.php?edit=<?php echo $id; ?>" class="btn btn-primary">
                <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                  <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1"></path>
                  <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z"></path>
                  <path d="M16 5l3 3"></path>
                </svg>
                Edit Details
              </a>
            </div>

          <?php } ?>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-6 col-lg-3">
              <div class="card">
                <div class="card-body p-4 text-center">
                  <?php if (file_exists($row['emp_pic'])) { ?>
                    <!-- <span class="avatar avatar-2xl mb-3" style="background-image: url(./<?php echo $row['emp_pic']; ?>)"></span> -->
                    <img src="./<?php echo $row['emp_pic']; ?>" class="avatar avatar-2xl" />

                  <?php } else { ?>
                    <span class="avatar avatar-2xl mb-3"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <circle cx="12" cy="7" r="4"></circle>
                        <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
                      </svg></span>
                  <?php } ?>
                  <h3 class="m-0 mb-1"><?php echo $row['emp_name']; ?></h3>
                  <div class="text-muted"><?php echo $row['emp_mail']; ?></div>
                  <div class="text-muted"><?php echo $row['emp_desg']; ?></div>
                  <div class=""><?php
                                if ($row['country_type'] == 'In') {
                                  echo "India";
                                }
                                if ($row['country_type'] == 'Ph') {
                                  echo "Philippines";
                                } ?></div>
                  <div class="mt-3">
                    <?php if ($row['emp_status'] != 0) {
                      echo '<span class="badge bg-green-lt">Active</span>';
                    } else {
                      echo '<span class="badge bg-red-lt">Deactive</span>';
                    } ?>
                  </div>
                </div>
                <div class="ribbon ribbon-bookmark bg-orange">
                  <?php if ($rowid["user_type"] == 1) {
                    echo "Admin";
                  }
                  if ($rowid["user_type"] == 2) {
                    echo "Moderator";
                  }
                  if ($rowid["user_type"] == 3) {
                    echo "User";
                  }
                  ?>
                </div>
              </div>
              <div class="card my-3">
                <div class="card-body p-4 text-center">
                  <p class="text-muted mb-0">Description</p>
                  <h3 class="m-0 mb-1"><?php echo $row['emp_desp']; ?></h3>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-lg-9">
              <div class="card">
                <!-- <div class="card-body text-center"> -->
                <div class="card-body">
                  <div class="row">

                    <div class="col-lg-4 p-2">
                      <p class="text-muted mb-0">Employee Id</p>
                      <h3 class="m-0 mb-1"><?php echo $row['emp_id']; ?></h3>
                    </div>

                    <?php if ($row['doj'] != NULL && $row['doj'] != 0 && $row['doj'] != 'NA' && $row['doj'] != '') { ?>
                      <div class="col-lg-4 p-2">
                        <p class="text-muted mb-0">DOJ</p>
                        <h3 class="m-0 mb-1"><?php echo $row['doj']; ?></h3>
                      </div>
                    <?php } else { ?>

                    <?php } ?>

                    <!-- <div class="col-lg-4 p-2">
                      <p class="text-muted mb-0">DOJ</p>
                      <h3 class="m-0 mb-1"><?php echo date('d-M-Y', strtotime($row['doj'])); ?></h3>
                    </div> -->

                    <?php if ($row['emp_dept'] != NULL && $row['emp_dept'] != 0 && $row['emp_dept'] != 'NA' && $row['emp_dept'] != '') { ?>
                      <div class="col-lg-4 p-2">
                        <p class="text-muted mb-0">Department</p>
                        <h3 class="m-0 mb-1"><?php echo $row['emp_dept']; ?></h3>
                      </div>
                    <?php } else { ?>

                    <?php } ?>

                    <?php if ($row['emp_pan'] != NULL && $row['emp_pan'] != 0 && $row['emp_pan'] != 'NA' && $row['emp_pan'] != '') { ?>
                      <div class="col-lg-4 p-2">
                        <p class="text-muted mb-0">PAN No.</p>
                        <h3 class="m-0 mb-1"><?php echo $row['emp_pan']; ?></h3>
                      </div>
                    <?php } else { ?>

                    <?php } ?>

                    <?php if ($row['emp_uan'] != NULL && $row['emp_uan'] != 0 && $row['emp_uan'] != 'NA' && $row['emp_uan'] != '') { ?>
                      <div class="col-lg-4 p-2">
                        <p class="text-muted mb-0">UAN No.</p>
                        <h3 class="m-0 mb-1"><?php echo $row['emp_uan']; ?></h3>
                      </div>
                    <?php } else { ?>

                    <?php } ?>

                    <?php if ($row['emp_esi'] != NULL && $row['emp_esi'] != 0 && $row['emp_esi'] != 'NA' && $row['emp_esi'] != '') { ?>
                      <div class="col-lg-4 p-2">
                        <p class="text-muted mb-0">ESI No.</p>
                        <h3 class="m-0 mb-1"><?php echo $row['emp_esi']; ?></h3>
                      </div>
                    <?php } else { ?>

                    <?php } ?>

                    <?php if ($row['emp_paymode'] != NULL && $row['emp_paymode'] != 0 && $row['emp_paymode'] != 'NA' && $row['emp_paymode'] != '') { ?>
                      <div class="col-lg-4 p-2">
                        <p class="text-muted mb-0">Payment Mode</p>
                        <h3 class="m-0 mb-1"><?php echo $row['emp_paymode']; ?></h3>
                      </div>
                    <?php } else { ?>

                    <?php } ?>

                    <?php if ($row['emp_bank'] != NULL && $row['emp_bank'] != 0 && $row['emp_bank'] != 'NA' && $row['emp_bank'] != '') { ?>
                      <div class="col-lg-4 p-2">
                        <p class="text-muted mb-0">Bank</p>
                        <h3 class="m-0 mb-1"><?php echo $row['emp_bank']; ?></h3>
                      </div>
                    <?php } else { ?>

                    <?php } ?>

                    <?php if ($row['emp_ifsc'] != NULL && $row['emp_ifsc'] != 0 && $row['emp_ifsc'] != 'NA' && $row['emp_ifsc'] != '') { ?>
                      <div class="col-lg-4 p-2">
                        <p class="text-muted mb-0">IFS Code</p>
                        <h3 class="m-0 mb-1"><?php echo $row['emp_ifsc']; ?></h3>
                      </div>
                    <?php } else { ?>

                    <?php } ?>

                    <?php if ($row['emp_acc'] != NULL && $row['emp_acc'] != 0 && $row['emp_acc'] != 'NA' && $row['emp_acc'] != '') { ?>
                      <div class="col-lg-4 p-2">
                        <p class="text-muted mb-0">Account No.</p>
                        <h3 class="m-0 mb-1"><?php echo $row['emp_acc']; ?></h3>
                      </div>
                    <?php } else { ?>

                    <?php } ?>

                    <?php if ($row['emp_gsal'] != NULL && $row['emp_gsal'] != 0 && $row['emp_gsal'] != 'NA' && $row['emp_gsal'] != '') { ?>
                      <div class="col-lg-4 p-2">
                        <p class="text-muted mb-0">Gross Salary</p>
                        <h3 class="m-0 mb-1"><?php echo "₹ " . inrFormat($row['emp_gsal']); ?></h3>
                      </div>
                    <?php } else { ?>

                    <?php } ?>

                    <?php if ($row['emp_food'] != NULL && $row['emp_food'] != 0 && $row['emp_food'] != 'NA' && $row['emp_food'] != '') { ?>
                      <div class="col-lg-4 p-2">
                        <p class="text-muted mb-0">Food Allowance</p>
                        <h3 class="m-0 mb-1"><?php echo "₹ " . inrFormat($row['emp_food']); ?></h3>
                      </div>
                    <?php } else { ?>

                    <?php } ?>

                    <?php if ($row['emp_travel'] != NULL && $row['emp_travel'] != 0 && $row['emp_travel'] != 'NA' && $row['emp_travel'] != '') { ?>
                      <div class="col-lg-4 p-2">
                        <p class="text-muted mb-0">Travel Allowance</p>
                        <h3 class="m-0 mb-1"><?php echo "₹ " . inrFormat($row['emp_travel']); ?></h3>
                      </div>
                    <?php } else { ?>

                    <?php } ?>

                    <?php if ($row['emp_spl'] != NULL && $row['emp_spl'] != 0 && $row['emp_spl'] != 'NA' && $row['emp_spl'] != '') { ?>
                      <div class="col-lg-4 p-2">
                        <p class="text-muted mb-0">Special Allowance</p>
                        <h3 class="m-0 mb-1"><?php echo "₹ " . inrFormat($row['emp_spl']); ?></h3>
                      </div>
                    <?php } else { ?>

                    <?php } ?>

                    <?php if ($row['emp_meal'] != NULL && $row['emp_meal'] != 'NA' && $row['emp_meal'] != '') { ?>
                      <div class="col-lg-4 p-2">
                        <p class="text-muted mb-0">Meal Service Availed</p>
                        <?php if (!$row['emp_meal']) { ?>
                          <h3 class="m-0 mb-1">No</h3>
                        <?php } else { ?>
                          <h3 class="m-0 mb-1">Yes</h3>
                        <?php } ?>
                      </div>
                    <?php } else { ?>

                    <?php } ?>

                    <?php if ($row['emp_cab'] != NULL && $row['emp_cab'] != 'NA' && $row['emp_cab'] != '') { ?>
                      <div class="col-lg-4 p-2">
                        <p class="text-muted mb-0">Travel Service Availed</p>
                        <?php if (!$row['emp_cab']) { ?>
                          <h3 class="m-0 mb-1">No</h3>
                        <?php } else { ?>
                          <h3 class="m-0 mb-1">Yes</h3>
                        <?php } ?>
                      </div>
                    <?php } else { ?>

                    <?php } ?>

                    <?php if ($row['emp_stinc'] != NULL && $row['emp_stinc'] != 0 && $row['emp_stinc'] != 'NA' && $row['emp_stinc'] != '') { ?>
                      <div class="col-lg-4 p-2">
                        <p class="text-muted mb-0">Stack Incentive</p>
                        <h3 class="m-0 mb-1"><?php echo "₹ " . inrFormat($row['emp_stinc']); ?></h3>
                      </div>
                    <?php } else { ?>

                    <?php } ?>

                    <?php if ($row['emp_inc'] != NULL && $row['emp_inc'] != 0 && $row['emp_inc'] != 'NA' && $row['emp_inc'] != '') { ?>
                      <div class="col-lg-4 p-2">
                        <p class="text-muted mb-0">Incentive</p>
                        <h3 class="m-0 mb-1"><?php echo "₹ " . inrFormat($row['emp_inc']); ?></h3>
                      </div>
                    <?php } else { ?>

                    <?php } ?>

                    <?php if ($row['emp_other'] != NULL && $row['emp_other'] != 0 && $row['emp_other'] != 'NA' && $row['emp_other'] != '') { ?>
                      <div class="col-lg-4 p-2">
                        <p class="text-muted mb-0">Others</p>
                        <h3 class="m-0 mb-1"><?php echo "₹ " . inrFormat($row['emp_other']); ?></h3>
                      </div>
                    <?php } else { ?>

                    <?php } ?>

                    <?php if ($row['nick_name'] != NULL && $row['nick_name'] != 0 && $row['nick_name'] != 'NA' && $row['nick_name'] != '') { ?>
                      <div class="col-lg-4 p-2">
                        <p class="text-muted mb-0">Nick Name</p>
                        <h3 class="m-0 mb-1"><?php echo $row['nick_name']; ?></h3>
                      </div>
                    <?php } else { ?>

                    <?php } ?>

                    <?php if ($row['line_manager'] != NULL && $row['line_manager'] != 0 && $row['line_manager'] != 'NA' && $row['line_manager'] != '') { ?>
                      <div class="col-lg-4 p-2">
                        <p class="text-muted mb-0">Line Manager</p>
                        <h3 class="m-0 mb-1"><?php echo $row['line_manager']; ?></h3>
                      </div>
                    <?php } else { ?>

                    <?php } ?>

                    <?php if ($row['joining_month'] != NULL && $row['joining_month'] != 0 && $row['joining_month'] != 'NA' && $row['joining_month'] != '') { ?>
                      <div class="col-lg-4 p-2">
                        <p class="text-muted mb-0">Joining Month</p>
                        <h3 class="m-0 mb-1"><?php echo $row['joining_month']; ?></h3>
                      </div>
                    <?php } else { ?>

                    <?php } ?>

                    <?php if ($row['date_of_hitting'] != Null && $row['date_of_hitting'] != 0 && $row['date_of_hitting'] != 'NA' && $row['date_of_hitting'] != '') { ?>
                      <div class="col-lg-4 p-2">
                        <p class="text-muted mb-0">DFH <span class="form-help" data-bs-toggle="popover" data-bs-placement="top" data-bs-html="true" data-bs-content="<p>Date Of Hitting </p>">?</span></p>
                        <h3 class="m-0 mb-1"><?php echo $row['date_of_hitting']; ?></h3>
                        <h3 class="m-0 mb-1">NA</h3>
                      </div>
                    <?php } else { ?>

                    <?php } ?>

                    <?php if ($row['ageing'] != Null && $row['ageing'] != 0 && $row['ageing'] != 'NA' && $row['ageing'] != '') { ?>
                      <div class="col-lg-4 p-2">
                        <p class="text-muted mb-0">Ageing</p>
                        <h3 class="m-0 mb-1"><?php echo $row['ageing']; ?></h3>
                      </div>
                    <?php } else { ?>

                    <?php } ?>

                    <?php if ($row['rejoing_on'] != Null && $row['rejoing_on'] != 0 && $row['rejoing_on'] != 'NA' && $row['rejoing_on'] != '') { ?>
                      <div class="col-lg-4 p-2">
                        <p class="text-muted mb-0">Rejoing On</p>
                        <h3 class="m-0 mb-1"><?php echo $row['rejoing_on']; ?></h3>
                      </div>
                    <?php } else { ?>

                    <?php } ?>

                    <?php if ($row['date_of_confirmation'] != Null && $row['date_of_confirmation'] != 0 && $row['date_of_confirmation'] != 'NA' && $row['date_of_confirmation'] != '') { ?>
                      <div class="col-lg-4 p-2">
                        <p class="text-muted mb-0">DFC <span class="form-help" data-bs-toggle="popover" data-bs-placement="top" data-bs-html="true" data-bs-content="<p>Date Of Confirmation </p>">?</span></p>
                        <h3 class="m-0 mb-1"><?php echo $row['date_of_confirmation']; ?></h3>
                      </div>
                    <?php } else { ?>

                    <?php } ?>

                    <?php if ($row['exit_formalities'] != Null && $row['exit_formalities'] != 0 && $row['exit_formalities'] != 'NA' && $row['exit_formalities'] != '') { ?>
                      <div class="col-lg-4 p-2">
                        <p class="text-muted mb-0">Exit Formalities</p>
                        <h3 class="m-0 mb-1"><?php echo $row['exit_formalities']; ?></h3>
                      </div>
                    <?php } else { ?>

                    <?php } ?>

                    <?php if ($row['fnf'] != Null && $row['fnf'] != 0 && $row['fnf'] != 'NA' && $row['fnf'] != '') { ?>
                      <div class="col-lg-4 p-2">
                        <p class="text-muted mb-0">FNF</p>
                        <h3 class="m-0 mb-1"><?php echo $row['fnf']; ?></h3>
                      </div>
                    <?php } else { ?>

                    <?php } ?>

                    <?php if ($row['reason_of_leaving'] != Null && $row['reason_of_leaving'] != 0 && $row['reason_of_leaving'] != 'NA' && $row['reason_of_leaving'] != '') { ?>
                      <div class="col-lg-4 p-2">
                        <p class="text-muted mb-0">Reason For Leaving</p>
                        <h3 class="m-0 mb-1"><?php echo $row['reason_of_leaving']; ?></h3>
                      </div>
                    <?php } else { ?>

                    <?php } ?>

                    <?php if ($row['type_of_attrition'] != Null && $row['type_of_attrition'] != 0 && $row['type_of_attrition'] != 'NA' && $row['type_of_attrition'] != '') { ?>
                      <div class="col-lg-4 p-2">
                        <p class="text-muted mb-0">Type Of Attrition</p>
                        <h3 class="m-0 mb-1"><?php echo $row['type_of_attrition']; ?></h3>
                      </div>
                    <?php } else { ?>

                    <?php } ?>

                    <?php if ($row['annual_ctc_in'] != Null && $row['annual_ctc_in'] != 0 && $row['annual_ctc_in'] != 'NA' && $row['annual_ctc_in'] != '') { ?>
                      <div class="col-lg-4 p-2">
                        <p class="text-muted mb-0">Annual CTC IN</p>
                        <h3 class="m-0 mb-1"><?php echo $row['annual_ctc_in']; ?></h3>
                      </div>
                    <?php } else { ?>

                    <?php } ?>

                    <?php if ($row['annual_ctc_new'] != Null && $row['annual_ctc_new'] != 0 && $row['annual_ctc_new'] != 'NA' && $row['annual_ctc_new'] != '') { ?>
                      <div class="col-lg-4 p-2">
                        <p class="text-muted mb-0">Annual CTC New</p>
                        <h3 class="m-0 mb-1"><?php echo $row['annual_ctc_new']; ?></h3>
                      </div>
                    <?php } else { ?>

                    <?php } ?>


                    <?php if ($row['in_hand_salary_with_stack'] != Null && $row['in_hand_salary_with_stack'] != 0 && $row['in_hand_salary_with_stack'] != 'NA' && $row['in_hand_salary_with_stack'] != '') { ?>
                      <div class="col-lg-4 p-2">
                        <p class="text-muted mb-0">IHSS <span class="form-help" data-bs-toggle="popover" data-bs-placement="top" data-bs-html="true" data-bs-content="<p>In Hand Salary With Stack </p>">?</span></p>
                        <h3 class="m-0 mb-1"><?php echo $row['in_hand_salary_with_stack']; ?></h3>
                      </div>
                    <?php } else { ?>

                    <?php } ?>

                    <?php if ($row['final_ctc_all'] != Null && $row['final_ctc_all'] != 0 && $row['final_ctc_all'] != 'NA' && $row['final_ctc_all'] != '') { ?>
                      <div class="col-lg-4 p-2">
                        <p class="text-muted mb-0">Final CTC All</p>
                        <h3 class="m-0 mb-1"><?php echo $row['final_ctc_all']; ?></h3>
                      </div>
                    <?php } else { ?>

                    <?php } ?>

                    <?php if ($row['transport_r_a'] != Null && $row['transport_r_a'] != 0 && $row['transport_r_a'] != 'NA' && $row['transport_r_a'] != '') { ?>
                      <div class="col-lg-4 p-2">
                        <p class="text-muted mb-0">TRA <span class="form-help" data-bs-toggle="popover" data-bs-placement="top" data-bs-html="true" data-bs-content="<p>Transport Reimbursement Applicable </p>">?</span></p>
                        <h3 class="m-0 mb-1"><?php echo $row['transport_r_a']; ?></h3>
                      </div>
                    <?php } else { ?>

                    <?php } ?>

                    <?php if ($row['father_name'] != Null && $row['father_name'] != 0 && $row['father_name'] != 'NA' && $row['father_name'] != '') { ?>
                      <div class="col-lg-4 p-2">
                        <p class="text-muted mb-0">Father Name</p>
                        <h3 class="m-0 mb-1"><?php echo $row['father_name']; ?></h3>
                      </div>
                    <?php } else { ?>

                    <?php } ?>

                    <?php if ($row['gender'] != Null && $row['gender'] != 0 && $row['gender'] != 'NA' && $row['gender'] != '') { ?>
                      <div class="col-lg-4 p-2">
                        <p class="text-muted mb-0">Gender</p>
                        <h3 class="m-0 mb-1"><?php echo $row['gender']; ?></h3>
                      </div>
                    <?php } else { ?>

                    <?php } ?>

                    <?php if ($row['dob'] != '0000-00-00' && $row['dob'] != Null && $row['dob'] != 0 && $row['dob'] != 'NA' && $row['dob'] != '') { ?>
                      <div class="col-lg-4 p-2">
                        <p class="text-muted mb-0">DOB</p>
                        <h3 class="m-0 mb-1"><?php echo $row['dob']; ?></h3>
                      </div>
                    <?php } else { ?>

                    <?php } ?>

                    <?php if ($row['marital_status'] != Null && $row['marital_status'] != 0 && $row['marital_status'] != 'NA' && $row['marital_status'] != '') { ?>
                      <div class="col-lg-4 p-2">
                        <p class="text-muted mb-0">Marital Status</p>
                        <h3 class="m-0 mb-1"><?php echo $row['marital_status']; ?></h3>
                      </div>
                    <?php } else { ?>

                    <?php } ?>

                    <?php if ($row['present_address_h_no'] != Null && $row['present_address_h_no'] != 0 && $row['present_address_h_no'] != 'NA' && $row['present_address_h_no'] != '') { ?>
                      <div class="col-lg-4 p-2">
                        <p class="text-muted mb-0">Present Address H No.</p>
                        <h3 class="m-0 mb-1"><?php echo $row['present_address_h_no']; ?></h3>
                      </div>
                    <?php } else { ?>

                    <?php } ?>

                    <?php if ($row['present_address_h_no'] != Null && $row['lacality_building'] != 0 && $row['lacality_building'] != 'NA' && $row['lacality_building'] != '') { ?>
                      <div class="col-lg-4 p-2">
                        <p class="text-muted mb-0">Lacality Building</p>
                        <h3 class="m-0 mb-1"><?php echo $row['lacality_building']; ?></h3>
                      </div>
                    <?php } else { ?>

                    <?php } ?>


                    <?php if ($row['area'] != Null && $row['area'] != 0 && $row['area'] != 'NA' && $row['area'] != '') { ?>
                      <div class="col-lg-4 p-2">
                        <p class="text-muted mb-0">Area</p>
                        <h3 class="m-0 mb-1"><?php echo $row['area']; ?></h3>
                      </div>
                    <?php } else { ?>

                    <?php } ?>

                    <?php if ($row['district'] != Null && $row['district'] != 0 && $row['district'] != 'NA' && $row['district'] != '') { ?>
                      <div class="col-lg-4 p-2">
                        <p class="text-muted mb-0">District</p>
                        <h3 class="m-0 mb-1"><?php echo $row['district']; ?></h3>
                      </div>
                    <?php } else { ?>

                    <?php } ?>

                    <?php if ($row['gender'] != Null && $row['state'] != 0 && $row['state'] != 'NA' && $row['state'] != '') { ?>
                      <div class="col-lg-4 p-2">
                        <p class="text-muted mb-0">State</p>
                        <h3 class="m-0 mb-1"><?php echo $row['state']; ?></h3>
                      </div>
                    <?php } else { ?>

                    <?php } ?>

                    <?php if ($row['post_code'] != Null && $row['post_code'] != 0 && $row['post_code'] != 'NA' && $row['post_code'] != '') { ?>
                      <div class="col-lg-4 p-2">
                        <p class="text-muted mb-0">Post Code</p>
                        <h3 class="m-0 mb-1"><?php echo $row['post_code']; ?></h3>
                      </div>
                    <?php } else { ?>

                    <?php } ?>

                    <?php if ($row['permanent_address_h_no'] != Null && $row['permanent_address_h_no'] != 0 && $row['permanent_address_h_no'] != 'NA' && $row['permanent_address_h_no'] != '') { ?>
                      <div class="col-lg-4 p-2">
                        <p class="text-muted mb-0">Permanent Address House No.</p>
                        <h3 class="m-0 mb-1"><?php echo $row['permanent_address_h_no']; ?></h3>
                      </div>
                    <?php } else { ?>

                    <?php } ?>

                    <?php if ($row['per_lacality_building'] != Null && $row['per_lacality_building'] != 0 && $row['per_lacality_building'] != 'NA' && $row['per_lacality_building'] != '') { ?>
                      <div class="col-lg-4 p-2">
                        <p class="text-muted mb-0">Permanent Lacality Building</p>
                        <h3 class="m-0 mb-1"><?php echo $row['per_lacality_building']; ?></h3>
                      </div>
                    <?php } else { ?>

                    <?php } ?>

                    <?php if ($row['per_area'] != Null && $row['per_area'] != 0 && $row['per_area'] != 'NA' && $row['per_area'] != '') { ?>
                      <div class="col-lg-4 p-2">
                        <p class="text-muted mb-0">Permanent Area</p>
                        <h3 class="m-0 mb-1"><?php echo $row['per_area']; ?></h3>
                      </div>
                    <?php } else { ?>

                    <?php } ?>

                    <?php if ($row['per_district'] != Null && $row['per_district'] != 0 && $row['per_district'] != 'NA' && $row['per_district'] != '') { ?>
                      <div class="col-lg-4 p-2">
                        <p class="text-muted mb-0">Permanent District</p>
                        <h3 class="m-0 mb-1"><?php echo $row['per_district']; ?></h3>
                      </div>
                    <?php } else { ?>

                    <?php } ?>

                    <?php if ($row['per_state'] != Null && $row['per_state'] != 0 && $row['per_state'] != 'NA' && $row['per_state'] != '') { ?>
                      <div class="col-lg-4 p-2">
                        <p class="text-muted mb-0">Permanent State</p>
                        <h3 class="m-0 mb-1"><?php echo $row['per_state']; ?></h3>
                      </div>
                    <?php } else { ?>

                    <?php } ?>

                    <?php if ($row['per_post_code'] != Null && $row['per_post_code'] != 0 && $row['per_post_code'] != 'NA' && $row['per_post_code'] != '') { ?>
                      <div class="col-lg-4 p-2">
                        <p class="text-muted mb-0">Permanent Post Code</p>
                        <h3 class="m-0 mb-1"><?php echo $row['per_post_code']; ?></h3>
                      </div>
                    <?php } else { ?>

                    <?php } ?>

                    <?php if ($row['phone'] != Null && $row['phone'] != 0 && $row['phone'] != 'NA' && $row['phone'] != '') { ?>
                      <div class="col-lg-4 p-2">
                        <p class="text-muted mb-0">Phone No.</p>
                        <h3 class="m-0 mb-1"><?php echo $row['phone']; ?></h3>
                      </div>
                    <?php } else { ?>

                    <?php } ?>

                    <?php if ($row['mobile'] != Null && $row['mobile'] != 0 && $row['mobile'] != 'NA' && $row['mobile'] != '') { ?>
                      <div class="col-lg-4 p-2">
                        <p class="text-muted mb-0">Mobile No.</p>
                        <h3 class="m-0 mb-1"><?php echo $row['mobile']; ?></h3>
                      </div>
                    <?php } else { ?>

                    <?php } ?>

                    <?php if ($row['primary_email'] != Null && $row['primary_email'] != 0 && $row['primary_email'] != 'NA' && $row['primary_email'] != '') { ?>
                      <div class="col-lg-4 p-2">
                        <p class="text-muted mb-0">Primary Email</p>
                        <h3 class="m-0 mb-1"><?php echo $row['primary_email']; ?></h3>
                      </div>
                    <?php } else { ?>

                    <?php } ?>

                    <?php if ($row['aadhaar'] != Null && $row['aadhaar'] != 0 && $row['aadhaar'] != 'NA' && $row['aadhaar'] != '') { ?>
                      <div class="col-lg-4 p-2">
                        <p class="text-muted mb-0">Aadhaar No.</p>
                        <h3 class="m-0 mb-1"><?php echo $row['aadhaar']; ?></h3>
                      </div>
                    <?php } else { ?>

                    <?php } ?>

                    <?php if ($row['nominee_details'] != Null && $row['nominee_details'] != 0 && $row['nominee_details'] != 'NA' && $row['nominee_details'] != '') { ?>
                      <div class="col-lg-4 p-2">
                        <p class="text-muted mb-0">Nominee Details</p>
                        <h3 class="m-0 mb-1"><?php echo $row['nominee_details']; ?></h3>
                      </div>
                    <?php } else { ?>

                    <?php } ?>

                    <?php if ($row['relation'] != Null && $row['relation'] != 0 && $row['relation'] != 'NA' && $row['relation'] != '') { ?>
                      <div class="col-lg-4 p-2">
                        <p class="text-muted mb-0">Relation</p>
                        <h3 class="m-0 mb-1"><?php echo $row['relation']; ?></h3>
                      </div>
                    <?php } else { ?>

                    <?php } ?>

                    <?php if ($row['address'] != Null && $row['address'] != 0 && $row['address'] != 'NA' && $row['address'] != '') { ?>
                      <div class="col-lg-4 p-2">
                        <p class="text-muted mb-0">Address</p>
                        <h3 class="m-0 mb-1"><?php echo $row['address']; ?></h3>
                      </div>
                    <?php } else { ?>

                    <?php } ?>

                    <?php if ($row['emy_contact_no'] != Null && $row['emy_contact_no'] != 0 && $row['emy_contact_no'] != 'NA' && $row['emy_contact_no'] != '') { ?>
                      <div class="col-lg-4 p-2">
                        <p class="text-muted mb-0">Emergency Contact No.</p>
                        <h3 class="m-0 mb-1"><?php echo $row['emy_contact_no']; ?></h3>
                      </div>
                    <?php } else { ?>

                    <?php } ?>

                    <?php if ($row['emy_contact_relation'] != Null && $row['emy_contact_relation'] != 0 && $row['emy_contact_relation'] != 'NA' && $row['emy_contact_relation'] != '') { ?>
                      <div class="col-lg-4 p-2">
                        <p class="text-muted mb-0">Emergency Contact Relation</p>
                        <h3 class="m-0 mb-1"><?php echo $row['emy_contact_relation']; ?></h3>
                      </div>
                    <?php } else { ?>

                    <?php } ?>

                    <?php if ($row['emy_contact_email'] != Null && $row['emy_contact_email'] != 0 && $row['emy_contact_email'] != 'NA' && $row['emy_contact_email'] != '') { ?>
                      <div class="col-lg-4 p-2">
                        <p class="text-muted mb-0">Emergency Contact Email</p>
                        <h3 class="m-0 mb-1"><?php echo $row['emy_contact_email']; ?></h3>
                      </div>
                    <?php } else { ?>

                    <?php } ?>

                    <?php if ($row['no_of_bank'] != Null && $row['no_of_bank'] != 0 && $row['no_of_bank'] != 'NA' && $row['no_of_bank'] != '') { ?>
                      <div class="col-lg-4 p-2">
                        <p class="text-muted mb-0">Total No of Bank</p>
                        <h3 class="m-0 mb-1"><?php echo $row['no_of_bank']; ?></h3>
                      </div>
                    <?php } else { ?>

                    <?php } ?>

                    <?php if ($row['no_of_family_member'] != Null && $row['no_of_family_member'] != 0 && $row['no_of_family_member'] != 'NA' && $row['no_of_family_member'] != '') { ?>
                      <div class="col-lg-4 p-2">
                        <p class="text-muted mb-0">Total family Member</p>
                        <h3 class="m-0 mb-1"><?php echo $row['no_of_family_member']; ?></h3>
                      </div>
                    <?php } else { ?>

                    <?php } ?>

                    <?php if ($row['mob_link_uan_no'] != Null && $row['mob_link_uan_no'] != 0 && $row['mob_link_uan_no'] != 'NA' && $row['mob_link_uan_no'] != '') { ?>
                      <div class="col-lg-4 p-2">
                        <p class="text-muted mb-0">Mobile Link UAN No</p>
                        <h3 class="m-0 mb-1"><?php echo $row['mob_link_uan_no']; ?></h3>
                      </div>
                    <?php } else { ?>

                    <?php } ?>

                    <?php if ($row['blood_group'] != Null && $row['blood_group'] != 0 && $row['blood_group'] != 'NA' && $row['blood_group'] != '') { ?>
                      <div class="col-lg-4 p-2">
                        <p class="text-muted mb-0">Blood Group</p>
                        <h3 class="m-0 mb-1"><?php echo $row['blood_group']; ?></h3>
                      </div>
                    <?php } else { ?>

                    <?php } ?>

                    <?php if ($row['performer_month'] != Null && $row['performer_month'] != 0 && $row['performer_month'] != 'NA' && $row['performer_month'] != '') { ?>
                      <div class="col-lg-4 p-2">
                        <p class="text-muted mb-0">Performer Month</p>
                        <h3 class="m-0 mb-1"><?php echo $row['performer_month']; ?></h3>
                      </div>
                    <?php } else { ?>

                    <?php } ?>

                    <?php if ($row['verbal_warning'] != Null && $row['verbal_warning'] != 0 && $row['verbal_warning'] != 'NA' && $row['verbal_warning'] != '') { ?>
                      <div class="col-lg-4 p-2">
                        <p class="text-muted mb-0">Verbal Warning</p>
                        <h3 class="m-0 mb-1"><?php echo $row['verbal_warning']; ?></h3>
                      </div>
                    <?php } else { ?>

                    <?php } ?>

                    <?php if ($row['reason_of_verbal_warning'] != Null && $row['reason_of_verbal_warning'] != 0 && $row['reason_of_verbal_warning'] != 'NA' && $row['reason_of_verbal_warning'] != '') { ?>
                      <div class="col-lg-4 p-2">
                        <p class="text-muted mb-0">Reason of Verbal Warning</p>
                        <h3 class="m-0 mb-1"><?php echo $row['reason_of_verbal_warning']; ?></h3>
                      </div>
                    <?php } else { ?>

                    <?php } ?>

                    <?php if ($row['date_of_verbal_warning'] != '0000-00-00' && $row['date_of_verbal_warning'] != Null && $row['date_of_verbal_warning'] != 0 && $row['date_of_verbal_warning'] != 'NA' && $row['date_of_verbal_warning'] != '') { ?>
                      <div class="col-lg-4 p-2">
                        <p class="text-muted mb-0">Date of Verbal Warning</p>
                        <h3 class="m-0 mb-1"><?php echo $row['date_of_verbal_warning']; ?></h3>
                      </div>
                    <?php } else { ?>

                    <?php } ?>

                    <?php if ($row['no_of_warning'] != Null && $row['no_of_warning'] != 0 && $row['no_of_warning'] != 'NA' && $row['no_of_warning'] != '') { ?>
                      <div class="col-lg-4 p-2">
                        <p class="text-muted mb-0">Total of Warning</p>
                        <h3 class="m-0 mb-1"><?php echo $row['no_of_warning']; ?></h3>
                      </div>
                    <?php } else { ?>

                    <?php } ?>

                    <?php if ($row['reason_of_warning'] != Null && $row['reason_of_warning'] != 0 && $row['reason_of_warning'] != 'NA' && $row['reason_of_warning'] != '') { ?>
                      <div class="col-lg-4 p-2">
                        <p class="text-muted mb-0">Reason of Warning</p>
                        <h3 class="m-0 mb-1"><?php echo $row['reason_of_warning']; ?></h3>
                      </div>
                    <?php } else { ?>

                    <?php } ?>

                    <?php if ($row['date_of_written_warning'] != '0000-00-00' && $row['date_of_written_warning'] != Null && $row['date_of_written_warning'] != 0 && $row['date_of_written_warning'] != 'NA' && $row['date_of_written_warning'] != '') { ?>
                      <div class="col-lg-4 p-2">
                        <p class="text-muted mb-0">Date of Written Warning</p>
                        <h3 class="m-0 mb-1"><?php echo $row['date_of_written_warning']; ?></h3>
                      </div>
                    <?php } else { ?>

                    <?php } ?>

                    <?php if ($row['pip_issue_date'] != Null && $row['pip_issue_date'] != 0 && $row['pip_issue_date'] != 'NA' && $row['pip_issue_date'] != '') { ?>
                      <div class="col-lg-4 p-2">
                        <p class="text-muted mb-0">PIP Issue Date</p>
                        <h3 class="m-0 mb-1"><?php echo $row['pip_issue_date']; ?></h3>
                      </div>
                    <?php } else { ?>

                    <?php } ?>

                    <?php if ($row['appraisal_letter'] != Null && $row['appraisal_letter'] != 0 && $row['appraisal_letter'] != 'NA' && $row['appraisal_letter'] != '') { ?>
                      <div class="col-lg-4 p-2">
                        <p class="text-muted mb-0">Appraisal Letter</p>
                        <h3 class="m-0 mb-1">
                          <a href="<?php echo $row['appraisal_letter'];  ?>" class="btn" target='_blank' download>
                            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-file-symlink" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                              <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                              <path d="M4 21v-4a3 3 0 0 1 3 -3h5"></path>
                              <path d="M9 17l3 -3l-3 -3"></path>
                              <path d="M14 3v4a1 1 0 0 0 1 1h4"></path>
                              <path d="M5 11v-6a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2h-9.5"></path>
                            </svg>
                            Open
                          </a>
                        </h3>
                      </div>
                    <?php } else { ?>

                    <?php } ?>

                    <?php if ($row['appraisal_1'] != Null && $row['appraisal_1'] != 0 && $row['appraisal_1'] != 'NA' && $row['appraisal_1'] != '') { ?>
                      <div class="col-lg-4 p-2">
                        <p class="text-muted mb-0">Appraisal 1</p>
                        <h3 class="m-0 mb-1">
                          <a href="<?php echo $row['appraisal_1'];  ?>" class="btn" target='_blank' download>
                            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-file-symlink" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                              <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                              <path d="M4 21v-4a3 3 0 0 1 3 -3h5"></path>
                              <path d="M9 17l3 -3l-3 -3"></path>
                              <path d="M14 3v4a1 1 0 0 0 1 1h4"></path>
                              <path d="M5 11v-6a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2h-9.5"></path>
                            </svg>
                            Open
                          </a>
                        </h3>
                      </div>
                    <?php } else { ?>

                    <?php } ?>

                    <?php if ($row['appraisal_2'] != Null && $row['appraisal_2'] != 0 && $row['appraisal_2'] != 'NA' && $row['appraisal_2'] != '') { ?>
                      <div class="col-lg-4 p-2">
                        <p class="text-muted mb-0">Appraisal 2</p>
                        <h3 class="m-0 mb-1">
                          <a href="<?php echo $row['appraisal_2'];  ?>" class="btn" target='_blank' download>
                            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-file-symlink" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                              <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                              <path d="M4 21v-4a3 3 0 0 1 3 -3h5"></path>
                              <path d="M9 17l3 -3l-3 -3"></path>
                              <path d="M14 3v4a1 1 0 0 0 1 1h4"></path>
                              <path d="M5 11v-6a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2h-9.5"></path>
                            </svg>
                            Open
                          </a>
                        </h3>
                      </div>
                    <?php } else { ?>

                    <?php } ?>

                    <?php if ($row['appraisal_3'] != Null && $row['appraisal_3'] != 0 && $row['appraisal_3'] != 'NA' && $row['appraisal_3'] != '') { ?>
                      <div class="col-lg-4 p-2">
                        <p class="text-muted mb-0">Appraisal 3</p>
                        <h3 class="m-0 mb-1">
                          <a href="<?php echo $row['appraisal_3'];  ?>" class="btn" target='_blank' download>
                            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-file-symlink" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                              <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                              <path d="M4 21v-4a3 3 0 0 1 3 -3h5"></path>
                              <path d="M9 17l3 -3l-3 -3"></path>
                              <path d="M14 3v4a1 1 0 0 0 1 1h4"></path>
                              <path d="M5 11v-6a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2h-9.5"></path>
                            </svg>
                            Open
                          </a>
                        </h3>
                      </div>
                    <?php } else { ?>

                    <?php } ?>

                    <?php if ($row['appraisal_4'] != Null && $row['appraisal_4'] != 0 && $row['appraisal_4'] != 'NA' && $row['appraisal_4'] != '') { ?>
                      <div class="col-lg-4 p-2">
                        <p class="text-muted mb-0">Appraisal 4</p>
                        <h3 class="m-0 mb-1">
                          <a href="<?php echo $row['appraisal_4'];  ?>" class="btn" target='_blank' download>
                            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-file-symlink" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                              <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                              <path d="M4 21v-4a3 3 0 0 1 3 -3h5"></path>
                              <path d="M9 17l3 -3l-3 -3"></path>
                              <path d="M14 3v4a1 1 0 0 0 1 1h4"></path>
                              <path d="M5 11v-6a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2h-9.5"></path>
                            </svg>
                            Open
                          </a>
                        </h3>
                      </div>
                    <?php } else { ?>

                    <?php } ?>

                    <?php if ($row['ssc'] != Null && $row['ssc'] != 0 && $row['ssc'] != 'NA' && $row['ssc'] != '') { ?>
                      <div class="col-lg-4 p-2">
                        <p class="text-muted mb-0">Secondary School Certificate</p>
                        <h3 class="m-0 mb-1">
                          <a href="<?php echo $row['ssc'];  ?>" class="btn" target='_blank' download>
                            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-file-symlink" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                              <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                              <path d="M4 21v-4a3 3 0 0 1 3 -3h5"></path>
                              <path d="M9 17l3 -3l-3 -3"></path>
                              <path d="M14 3v4a1 1 0 0 0 1 1h4"></path>
                              <path d="M5 11v-6a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2h-9.5"></path>
                            </svg>
                            Open
                          </a>
                        </h3>
                      </div>
                    <?php } else { ?>

                    <?php } ?>

                    <?php if ($row['hsc'] != Null && $row['hsc'] != 0 && $row['hsc'] != 'NA' && $row['hsc'] != '') { ?>
                      <div class="col-lg-4 p-2">
                        <p class="text-muted mb-0">Higher Secondary Certificate</p>
                        <h3 class="m-0 mb-1">
                          <a href="<?php echo $row['hsc'];  ?>" class="btn" target='_blank' download>
                            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-file-symlink" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                              <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                              <path d="M4 21v-4a3 3 0 0 1 3 -3h5"></path>
                              <path d="M9 17l3 -3l-3 -3"></path>
                              <path d="M14 3v4a1 1 0 0 0 1 1h4"></path>
                              <path d="M5 11v-6a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2h-9.5"></path>
                            </svg>
                            Open
                          </a>
                        </h3>
                      </div>
                    <?php } else { ?>

                    <?php } ?>

                    <?php if ($row['graduation'] != Null && $row['graduation'] != 0 && $row['graduation'] != 'NA' && $row['graduation'] != '') { ?>
                      <div class="col-lg-4 p-2">
                        <p class="text-muted mb-0">Graduation</p>
                        <h3 class="m-0 mb-1">
                          <a href="<?php echo $row['graduation'];  ?>" class="btn" target='_blank' download>
                            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-file-symlink" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                              <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                              <path d="M4 21v-4a3 3 0 0 1 3 -3h5"></path>
                              <path d="M9 17l3 -3l-3 -3"></path>
                              <path d="M14 3v4a1 1 0 0 0 1 1h4"></path>
                              <path d="M5 11v-6a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2h-9.5"></path>
                            </svg>
                            Open
                          </a>
                        </h3>
                      </div>
                    <?php } else { ?>

                    <?php } ?>

                    <?php if ($row['experience_relieving'] != Null && $row['experience_relieving'] != 0 && $row['experience_relieving'] != 'NA' && $row['experience_relieving'] != '') { ?>
                      <div class="col-lg-4 p-2">
                        <p class="text-muted mb-0">Experience Relieving</p>
                        <h3 class="m-0 mb-1">
                          <a href="<?php echo $row['experience_relieving'];  ?>" class="btn" target='_blank' download>
                            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-file-symlink" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                              <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                              <path d="M4 21v-4a3 3 0 0 1 3 -3h5"></path>
                              <path d="M9 17l3 -3l-3 -3"></path>
                              <path d="M14 3v4a1 1 0 0 0 1 1h4"></path>
                              <path d="M5 11v-6a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2h-9.5"></path>
                            </svg>
                            Open
                          </a>
                        </h3>
                      </div>
                    <?php } else { ?>

                    <?php } ?>

                    <?php if ($row['salary_slip'] != Null && $row['salary_slip'] != 0 && $row['salary_slip'] != 'NA' && $row['salary_slip'] != '') { ?>
                      <div class="col-lg-4 p-2">
                        <p class="text-muted mb-0">Salary Slip</p>
                        <h3 class="m-0 mb-1">
                          <a href="<?php echo $row['salary_slip'];  ?>" class="btn" target='_blank' download>
                            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-file-symlink" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                              <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                              <path d="M4 21v-4a3 3 0 0 1 3 -3h5"></path>
                              <path d="M9 17l3 -3l-3 -3"></path>
                              <path d="M14 3v4a1 1 0 0 0 1 1h4"></path>
                              <path d="M5 11v-6a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2h-9.5"></path>
                            </svg>
                            Open
                          </a>
                        </h3>
                      </div>
                    <?php } else { ?>

                    <?php } ?>

                    <?php if ($row['bank_statement'] != Null && $row['bank_statement'] != 0 && $row['bank_statement'] != 'NA' && $row['bank_statement'] != '') { ?>
                      <div class="col-lg-4 p-2">
                        <p class="text-muted mb-0">Bank Statement</p>
                        <h3 class="m-0 mb-1">
                          <a href="<?php echo $row['bank_statement'];  ?>" class="btn" target='_blank' download>
                            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-file-symlink" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                              <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                              <path d="M4 21v-4a3 3 0 0 1 3 -3h5"></path>
                              <path d="M9 17l3 -3l-3 -3"></path>
                              <path d="M14 3v4a1 1 0 0 0 1 1h4"></path>
                              <path d="M5 11v-6a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2h-9.5"></path>
                            </svg>
                            Open
                          </a>
                        </h3>
                      </div>
                    <?php } else { ?>

                    <?php } ?>

                    <?php if ($row['cancel_cheque'] != Null && $row['cancel_cheque'] != 0 && $row['cancel_cheque'] != 'NA' && $row['cancel_cheque'] != '') { ?>
                      <div class="col-lg-4 p-2">
                        <p class="text-muted mb-0">Cancel Cheque</p>
                        <h3 class="m-0 mb-1">
                          <a href="<?php echo $row['cancel_cheque'];  ?>" class="btn" target='_blank' download>
                            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-file-symlink" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                              <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                              <path d="M4 21v-4a3 3 0 0 1 3 -3h5"></path>
                              <path d="M9 17l3 -3l-3 -3"></path>
                              <path d="M14 3v4a1 1 0 0 0 1 1h4"></path>
                              <path d="M5 11v-6a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2h-9.5"></path>
                            </svg>
                            Open
                          </a>
                        </h3>
                      </div>
                    <?php } else { ?>

                    <?php } ?>

                    <?php if ($row['emp_exitdate'] != 0000 - 00 - 00 && $row['cancel_cheque'] != Null && $row['cancel_cheque'] != 0 && $row['cancel_cheque'] != 'NA' && $row['cancel_cheque'] != '') { ?>
                      <div class="col-lg-4 p-2">
                        <p class="text-muted mb-0">Exit Date</p>
                        <h3 class="m-0 mb-1"><?php echo date('d-M-Y', strtotime($row['emp_exitdate'])); ?></h3>
                      </div>
                    <?php } else { ?>

                    <?php } ?>

                  </div>
                </div>
                <!-- </div> -->
              </div>
            </div>

          </div>

          <?php
          $tmpCount = 0;
          while ($sal_dts = mysqli_fetch_assoc($sal_d_run)) {
            $tmpCount++;
            $sal_mo = date_create($sal_dts['month_yr']);
          ?>
            <div class="card mt-3">
              <div class="card-header">
                <h3 class="card-title"><?php echo strtoupper(date_format($sal_mo, "M Y")); ?> Details</h3>
                <div class="card-actions btn-actions">
                  <a href="download_payslip.php?id=<?php echo $sal_dts['sal_id']; ?>&empid=<?php echo $sal_dts['employee_id']; ?>" class="btn-action" data-bs-toggle="tooltip" data-bs-placement="top" title="Download Pay Slip">
                    <!-- Download SVG icon from http://tabler-icons.io/i/dots-vertical -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-download" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                      <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                      <path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2"></path>
                      <polyline points="7 11 12 16 17 11"></polyline>
                      <line x1="12" y1="4" x2="12" y2="16"></line>
                    </svg>
                  </a>
                  <a class="btn-action collapseArrow" role="button" data-bs-toggle="collapse" href="#collapseExample<?php echo $tmpCount; ?>" ria-expanded="false" aria-controls="collapseExample<?php echo $tmpCount; ?>">
                    <!-- Download SVG icon from http://tabler-icons.io/i/chevron-up -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                      <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                      <polyline points="6 15 12 9 18 15" />
                    </svg>
                  </a>
                </div>
              </div>
              <div class="card-body collapse" id="collapseExample<?php echo $tmpCount; ?>">
                <div class="row g-3">
                  <div class="col-md-12">
                    <div class="card">
                      <div class="card-body p-4 text-center">
                        <p class="text-muted"><?php echo strtoupper(date_format($sal_mo, "M Y")); ?> - Attendance Sheet</p>
                        <div class="table-responsive">
                          <table class="table table-vcenter card-table">
                            <thead>
                              <tr>
                                <th style="font-size: .775rem;">Date 01</th>
                                <th style="font-size: .775rem;">02</th>
                                <th style="font-size: .775rem;">03</th>
                                <th style="font-size: .775rem;">04</th>
                                <th style="font-size: .775rem;">05</th>
                                <th style="font-size: .775rem;">06</th>
                                <th style="font-size: .775rem;">07</th>
                                <th style="font-size: .775rem;">08</th>
                                <th style="font-size: .775rem;">09</th>
                                <th style="font-size: .775rem;">10</th>
                                <th style="font-size: .775rem;">11</th>
                                <th style="font-size: .775rem;">12</th>
                                <th style="font-size: .775rem;">13</th>
                                <th style="font-size: .775rem;">14</th>
                                <th style="font-size: .775rem;">15</th>
                                <th style="font-size: .775rem;">16</th>
                                <th style="font-size: .775rem;">17</th>
                                <th style="font-size: .775rem;">18</th>
                                <th style="font-size: .775rem;">19</th>
                                <th style="font-size: .775rem;">20</th>
                                <th style="font-size: .775rem;">21</th>
                                <th style="font-size: .775rem;">22</th>
                                <th style="font-size: .775rem;">23</th>
                                <th style="font-size: .775rem;">24</th>
                                <th style="font-size: .775rem;">25</th>
                                <th style="font-size: .775rem;">26</th>
                                <th style="font-size: .775rem;">27</th>
                                <th style="font-size: .775rem;">28</th>
                                <?php if ($sal_dts['ac']) {
                                  echo '<th style="font-size: .775rem;">29</th>';
                                } ?>

                                <?php if ($sal_dts['ad']) {
                                  echo '<th style="font-size: .775rem;">30</th>';
                                } ?>

                                <?php if ($sal_dts['ae']) {
                                  echo '<th style="font-size: .775rem;">31</th>';
                                } ?>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td><?php echo $sal_dts['a']; ?></td>
                                <td><?php echo $sal_dts['b']; ?></td>
                                <td><?php echo $sal_dts['c']; ?></td>
                                <td><?php echo $sal_dts['d']; ?></td>
                                <td><?php echo $sal_dts['e']; ?></td>
                                <td><?php echo $sal_dts['f']; ?></td>
                                <td><?php echo $sal_dts['g']; ?></td>
                                <td><?php echo $sal_dts['h']; ?></td>
                                <td><?php echo $sal_dts['i']; ?></td>
                                <td><?php echo $sal_dts['j']; ?></td>
                                <td><?php echo $sal_dts['k']; ?></td>
                                <td><?php echo $sal_dts['l']; ?></td>
                                <td><?php echo $sal_dts['m']; ?></td>
                                <td><?php echo $sal_dts['n']; ?></td>
                                <td><?php echo $sal_dts['o']; ?></td>
                                <td><?php echo $sal_dts['p']; ?></td>
                                <td><?php echo $sal_dts['q']; ?></td>
                                <td><?php echo $sal_dts['r']; ?></td>
                                <td><?php echo $sal_dts['s']; ?></td>
                                <td><?php echo $sal_dts['t']; ?></td>
                                <td><?php echo $sal_dts['u']; ?></td>
                                <td><?php echo $sal_dts['v']; ?></td>
                                <td><?php echo $sal_dts['w']; ?></td>
                                <td><?php echo $sal_dts['x']; ?></td>
                                <td><?php echo $sal_dts['y']; ?></td>
                                <td><?php echo $sal_dts['z']; ?></td>
                                <td><?php echo $sal_dts['aa']; ?></td>
                                <td><?php echo $sal_dts['ab']; ?></td>
                                <?php if ($sal_dts['ac']) { ?>
                                  <td><?php echo $sal_dts['ac']; ?></td>
                                <?php } ?>
                                <?php if ($sal_dts['ad']) { ?>
                                  <td><?php echo $sal_dts['ad']; ?></td>
                                <?php } ?>
                                <?php if ($sal_dts['ae']) { ?>
                              <tr>
                                <td><?php echo $sal_dts['ae']; ?></td>
                              </tr>
                            <?php } ?>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-12">
                    <div class="card">
                      <div class="card-body text-center">
                        <div class="row">
                          <div class="col-lg-3 p-2">
                            <p class="text-muted mb-1">Leave Bal. at <?php echo strtoupper(date_format($sal_mo, "M")); ?> End</p>
                            <h3 class="m-0 mb-1"><?php echo $sal_dts['pre_leave_bal']; ?></h3>
                          </div>
                          <div class="col-lg-3 p-2">
                            <p class="text-muted mb-1">Total Absence</p>
                            <h3 class="m-0 mb-1"><?php echo $sal_dts['total_ab']; ?></h3>
                          </div>
                          <div class="col-lg-3 p-2">
                            <p class="text-muted mb-1">Total Unplanned Leave</p>
                            <h3 class="m-0 mb-1"><?php echo $sal_dts['total_upl']; ?></h3>
                          </div>
                          <div class="col-lg-3 p-2">
                            <p class="text-muted mb-1">Total Present</p>
                            <h3 class="m-0 mb-1"><?php echo $sal_dts['total_p']; ?></h3>
                          </div>
                          <div class="col-lg-3 p-2">
                            <p class="text-muted mb-1">Total Half Days</p>
                            <h3 class="m-0 mb-1"><?php echo $sal_dts['total_hd']; ?></h3>
                          </div>
                          <div class="col-lg-3 p-2">
                            <p class="text-muted mb-1">W/O + PH.</p>
                            <h3 class="m-0 mb-1"><?php echo $sal_dts['wo_ph']; ?></h3>
                          </div>
                          <div class="col-lg-3 p-2">
                            <p class="text-muted mb-1">Late Coming</p>
                            <h3 class="m-0 mb-1"><?php echo $sal_dts['late_coming']; ?></h3>
                          </div>
                          <div class="col-lg-3 p-2">
                            <p class="text-muted mb-1">Half Day(s) Because of Late</p>
                            <h3 class="m-0 mb-1"><?php echo $sal_dts['hd_bcoz_late']; ?></h3>
                          </div>
                          <div class="col-lg-3 p-2">
                            <p class="text-muted mb-1">Leaves Adjusted</p>
                            <h3 class="m-0 mb-1"><?php echo $sal_dts['leaves_adjusted']; ?></h3>
                          </div>
                          <div class="col-lg-3 p-2">
                            <p class="text-muted mb-1">Basic</p>
                            <h3 class="m-0 mb-1"><?php echo "₹ " . inrFormat($sal_dts['sal_month_basic']); ?></h3>
                          </div>
                          <div class="col-lg-3 p-2">
                            <p class="text-muted mb-1">HRA</p>
                            <h3 class="m-0 mb-1"><?php echo "₹ " . inrFormat($sal_dts['sal_month_hra']); ?></h3>
                          </div>
                          <div class="col-lg-3 p-2">
                            <p class="text-muted mb-1">Statutory Allowance</p>
                            <h3 class="m-0 mb-1"><?php echo "₹ " . inrFormat($sal_dts['sal_month_sa']); ?></h3>
                          </div>
                          <div class="col-lg-3 p-2">
                            <p class="text-muted mb-1">Other Allowance</p>
                            <h3 class="m-0 mb-1"><?php echo "₹ " . inrFormat($sal_dts['sal_month_oa']); ?></h3>
                          </div>
                          <div class="col-lg-3 p-2">
                            <p class="text-muted mb-1">Employee PF Contribution</p>
                            <h3 class="m-0 mb-1"><?php echo "₹ " . inrFormat($sal_dts['emp_pf_cont']); ?></h3>
                          </div>
                          <div class="col-lg-3 p-2">
                            <p class="text-muted mb-1">Employer PF Contribution</p>
                            <h3 class="m-0 mb-1"><?php echo "₹ " . inrFormat($sal_dts['empr_pf_cont']); ?></h3>
                          </div>
                          <div class="col-lg-3 p-2">
                            <p class="text-muted mb-1">Employee ESIC Contribution</p>
                            <h3 class="m-0 mb-1"><?php echo "₹ " . inrFormat($sal_dts['emp_esic_cont']); ?></h3>
                          </div>
                          <div class="col-lg-3 p-2">
                            <p class="text-muted mb-1">Daily Pay</p>
                            <h3 class="m-0 mb-1"><?php echo "₹ " . inrFormat($sal_dts['daily_pay']); ?></h3>
                          </div>
                          <div class="col-lg-3 p-2">
                            <p class="text-muted mb-1">Leave Bal. at Beginning of <?php echo strtoupper(date_format($sal_mo, "M")); ?></p>
                            <h3 class="m-0 mb-1"><?php echo $sal_dts['leave_bal_at_start']; ?></h3>
                          </div>
                          <div class="col-lg-3 p-2">
                            <p class="text-muted mb-1">Fixed <?php echo strtoupper(date_format($sal_mo, "M")); ?> Pay</p>
                            <h3 class="m-0 mb-1"><?php echo "₹ " . inrFormat($sal_dts['fix_sal_month_pay']); ?></h3>
                          </div>
                          <?php if ($sal_dts['tds_deduction']) { ?>
                            <div class="col-lg-3 p-2">
                              <p class="text-muted mb-1">TDS Deduction</p>
                              <h3 class="m-0 mb-1"><?php echo "₹ " . inrFormat($sal_dts['tds_deduction']); ?></h3>
                            </div>
                          <?php } ?>
                          <?php if ($sal_dts['penalty_adj']) { ?>
                            <div class="col-lg-3 p-2">
                              <p class="text-muted mb-1">Penalties Adjustment</p>
                              <h3 class="m-0 mb-1"><?php echo "₹ " . inrFormat($sal_dts['penalty_adj']); ?></h3>
                            </div>
                          <?php } ?>
                          <?php if ($sal_dts['sandwhich_leave_deduction']) { ?>
                            <div class="col-lg-3 p-2">
                              <p class="text-muted mb-1">Sandwhich Leave Deduction</p>
                              <h3 class="m-0 mb-1"><?php echo "₹ " . inrFormat($sal_dts['sandwhich_leave_deduction']); ?></h3>
                            </div>
                          <?php } ?>
                          <?php if ($sal_dts['other_inc_dues']) { ?>
                            <div class="col-lg-3 p-2">
                              <p class="text-muted mb-1">Other Incentives / Dues</p>
                              <h3 class="m-0 mb-1"><?php echo "₹ " . inrFormat($sal_dts['other_inc_dues']); ?></h3>
                            </div>
                          <?php } ?>
                          <?php if ($sal_dts['arrears']) { ?>
                            <div class="col-lg-3 p-2">
                              <p class="text-muted mb-1">Arrears</p>
                              <h3 class="m-0 mb-1"><?php echo "₹ " . inrFormat($sal_dts['arrears']); ?></h3>
                            </div>
                          <?php } ?>
                          <?php if ($sal_dts['inc_refferal']) { ?>
                            <div class="col-lg-3 p-2">
                              <p class="text-muted mb-1">Incentive (Referral Bonus) </p>
                              <h3 class="m-0 mb-1"><?php echo "₹ " . inrFormat($sal_dts['inc_refferal']); ?></h3>
                            </div>
                          <?php } ?>
                          <?php if ($sal_dts['pre_month_qualified_app_ach']) { ?>
                            <div class="col-lg-3 p-2">
                              <p class="text-muted mb-1">Qualified App. Achieved in <?php echo Date('F', strtotime($sal_dts['month_yr'] . " last month")); ?></p>
                              <h3 class="m-0 mb-1"><?php echo $sal_dts['pre_month_qualified_app_ach']; ?></h3>
                            </div>
                          <?php } ?>
                          <?php if ($sal_dts['qualified_percentage_pre_month']) { ?>
                            <div class="col-lg-3 p-2">
                              <p class="text-muted mb-1">Qualified % Achieved in <?php echo Date('F', strtotime($sal_dts['month_yr'] . " last month")); ?></p>
                              <h3 class="m-0 mb-1"><?php echo $sal_dts['qualified_percentage_pre_month']; ?> %</h3>
                            </div>
                          <?php } ?>
                          <?php if ($sal_dts['inc_qualified']) { ?>
                            <div class="col-lg-3 p-2">
                              <p class="text-muted mb-1">Incentive Qualified</p>
                              <h3 class="m-0 mb-1"><?php echo "₹ " . inrFormat($sal_dts['inc_qualified']); ?></h3>
                            </div>
                          <?php } ?>
                          <?php if ($sal_dts['spl_allowance']) { ?>
                            <div class="col-lg-3 p-2">
                              <p class="text-muted mb-1">Special Allowance</p>
                              <h3 class="m-0 mb-1"><?php echo "₹ " . inrFormat($sal_dts['spl_allowance']); ?></h3>
                            </div>
                          <?php } ?>
                          <?php if ($sal_dts['kw_installed']) { ?>
                            <div class="col-lg-3 p-2">
                              <p class="text-muted mb-1">kW Installed</p>
                              <h3 class="m-0 mb-1"><?php echo $sal_dts['kw_installed']; ?></h3>
                            </div>
                          <?php } ?>
                          <?php if ($sal_dts['install_inc']) { ?>
                            <div class="col-lg-3 p-2">
                              <p class="text-muted mb-1">KW Installation Incentive</p>
                              <h3 class="m-0 mb-1"><?php echo "₹ " . inrFormat($sal_dts['install_inc']); ?></h3>
                            </div>
                          <?php } ?>
                          <?php if ($sal_dts['otp_install']) { ?>
                            <div class="col-lg-3 p-2">
                              <p class="text-muted mb-1">OTP Installed</p>
                              <h3 class="m-0 mb-1"><?php echo $sal_dts['otp_install']; ?></h3>
                            </div>
                          <?php } ?>
                          <?php if ($sal_dts['otp_inc_install']) { ?>
                            <div class="col-lg-3 p-2">
                              <p class="text-muted mb-1">OTP Installation Incentive</p>
                              <h3 class="m-0 mb-1"><?php echo "₹ " . inrFormat($sal_dts['otp_inc_install']); ?></h3>
                            </div>
                          <?php } ?>
                          <?php if ($sal_dts['adjustment']) { ?>
                            <div class="col-lg-3 p-2">
                              <p class="text-muted mb-1">Adjustment</p>
                              <h3 class="m-0 mb-1"><?php echo "₹ " . inrFormat($sal_dts['adjustment']); ?></h3>
                            </div>
                          <?php } ?>
                          <?php if ($sal_dts['net_salary']) { ?>
                            <div class="col-lg-3 p-2">
                              <p class="text-muted mb-1">Net Salary</p>
                              <h3 class="m-0 mb-1"><?php echo "₹ " . inrFormat($sal_dts['net_salary']); ?></h3>
                            </div>
                          <?php } ?>
                          <?php if ($sal_dts['status']) { ?>
                            <div class="col-lg-3 p-2">
                              <p class="text-muted mb-1">Status</p>
                              <h3 class="m-0 mb-1"><?php $sal_dts['status']; ?></h3>
                            </div>
                          <?php } ?>
                          <?php if ($sal_dts['inc_amt']) { ?>
                            <div class="col-lg-3 p-2">
                              <p class="text-muted mb-1">Incentive Amount</p>
                              <h3 class="m-0 mb-1"><?php echo "₹ " . inrFormat($sal_dts['inc_amt']); ?></h3>
                            </div>
                          <?php } ?>
                          <?php if ($sal_dts['clawback']) { ?>
                            <div class="col-lg-3 p-2">
                              <p class="text-muted mb-1">Clawback</p>
                              <h3 class="m-0 mb-1"><?php echo "₹ " . inrFormat($sal_dts['clawback']); ?></h3>
                            </div>
                          <?php } ?>
                          <?php if ($sal_dts['inc']) { ?>
                            <div class="col-lg-3 p-2">
                              <p class="text-muted mb-1">Incentive</p>
                              <!-- <h3 class="m-0 mb-1"><?php echo "₹ " . inrFormat($sal_dts['inc']); ?></h3> -->
                              <h3 class="m-0 mb-1">₹ 0.00</h3>
                            </div>
                          <?php } ?>
                          <?php if ($sal_dts['deductions']) { ?>
                            <div class="col-lg-3 p-2">
                              <p class="text-muted mb-1">Deductions</p>
                              <!-- <h3 class="m-0 mb-1"><?php echo "₹ " . inrFormat($sal_dts['deductions']); ?></h3> -->
                              <h3 class="m-0 mb-1">₹ 0.00</h3>
                            </div>
                          <?php } ?>
                          <?php if ($sal_dts['adv_adj']) { ?>
                            <div class="col-lg-3 p-2">
                              <p class="text-muted mb-1">Advance Adjustment</p>
                              <h3 class="m-0 mb-1"><?php echo "₹ " . inrFormat($sal_dts['adv_adj']); ?></h3>
                            </div>
                          <?php } ?>
                          <?php if ($sal_dts['stack_inc']) { ?>
                            <div class="col-lg-3 p-2">
                              <p class="text-muted mb-1">Stack Incentive</p>
                              <h3 class="m-0 mb-1"><?php echo "₹ " . inrFormat($sal_dts['stack_inc']); ?></h3>
                            </div>
                          <?php } ?>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          <?php } ?>
        </div>
      </div>

      <?php include "footer.php"; ?>

      <script>
        $(".collapseArrow").click(function() {
          $(this).toggleClass("rot");
        });
      </script>
      <!-- 
  <script>
    var redir = '<?php echo $redirectPg ?>';
    if (redir == 1) {
      window.location.replace("error-404.php");
    }
  </script> -->

      <?php

      function inrFormat($num)
      {
        $num = preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $num);
        return $num;
      }

      ?>