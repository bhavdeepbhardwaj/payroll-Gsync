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
                    <div class="col-lg-4 p-2">
                      <p class="text-muted mb-0">DOJ</p>
                      <h3 class="m-0 mb-1"><?php echo date('d-M-Y', strtotime($row['doj'])); ?></h3>
                    </div>
                    <div class="col-lg-4 p-2">
                      <p class="text-muted mb-0">Department</p>
                      <h3 class="m-0 mb-1"><?php echo $row['emp_dept']; ?></h3>
                    </div>
                    <div class="col-lg-4 p-2">
                      <p class="text-muted mb-0">PAN No.</p>
                      <h3 class="m-0 mb-1"><?php echo $row['emp_pan']; ?></h3>
                    </div>
                    <div class="col-lg-4 p-2">
                      <p class="text-muted mb-0">UAN No.</p>
                      <h3 class="m-0 mb-1"><?php echo $row['emp_uan']; ?></h3>
                    </div>
                    <div class="col-lg-4 p-2">
                      <p class="text-muted mb-0">ESI No.</p>
                      <h3 class="m-0 mb-1"><?php echo $row['emp_esi']; ?></h3>
                    </div>
                    <div class="col-lg-4 p-2">
                      <p class="text-muted mb-0">Payment Mode</p>
                      <h3 class="m-0 mb-1"><?php echo $row['emp_paymode']; ?></h3>
                    </div>
                    <div class="col-lg-4 p-2">
                      <p class="text-muted mb-0">Bank</p>
                      <h3 class="m-0 mb-1"><?php echo $row['emp_bank']; ?></h3>
                    </div>
                    <div class="col-lg-4 p-2">
                      <p class="text-muted mb-0">IFS Code</p>
                      <h3 class="m-0 mb-1"><?php echo $row['emp_ifsc']; ?></h3>
                    </div>
                    <div class="col-lg-4 p-2">
                      <p class="text-muted mb-0">Account No.</p>
                      <h3 class="m-0 mb-1"><?php echo $row['emp_acc']; ?></h3>
                    </div>
                    <div class="col-lg-4 p-2">
                      <p class="text-muted mb-0">Gross Salary</p>
                      <h3 class="m-0 mb-1"><?php echo "₹ " . inrFormat($row['emp_gsal']); ?></h3>
                    </div>
                    <div class="col-lg-4 p-2">
                      <p class="text-muted mb-0">Food Allowance</p>
                      <h3 class="m-0 mb-1"><?php echo "₹ " . inrFormat($row['emp_food']); ?></h3>
                    </div>
                    <div class="col-lg-4 p-2">
                      <p class="text-muted mb-0">Travel Allowance</p>
                      <h3 class="m-0 mb-1"><?php echo "₹ " . inrFormat($row['emp_travel']); ?></h3>
                    </div>
                    <div class="col-lg-4 p-2">
                      <p class="text-muted mb-0">Special Allowance</p>
                      <h3 class="m-0 mb-1"><?php echo "₹ " . inrFormat($row['emp_spl']); ?></h3>
                    </div>
                    <div class="col-lg-4 p-2">
                      <p class="text-muted mb-0">Meal Service Availed</p>
                      <?php if (!$row['emp_meal']) { ?>
                        <h3 class="m-0 mb-1">No</h3>
                      <?php } else { ?>
                        <h3 class="m-0 mb-1">Yes</h3>
                      <?php } ?>
                    </div>
                    <div class="col-lg-4 p-2">
                      <p class="text-muted mb-0">Travel Service Availed</p>
                      <?php if (!$row['emp_cab']) { ?>
                        <h3 class="m-0 mb-1">No</h3>
                      <?php } else { ?>
                        <h3 class="m-0 mb-1">Yes</h3>
                      <?php } ?>
                    </div>
                    <div class="col-lg-4 p-2">
                      <p class="text-muted mb-0">Stack Incentive</p>
                      <h3 class="m-0 mb-1"><?php echo "₹ " . inrFormat($row['emp_stinc']); ?></h3>
                    </div>
                    <div class="col-lg-4 p-2">
                      <p class="text-muted mb-0">Incentive</p>
                      <h3 class="m-0 mb-1"><?php echo "₹ " . inrFormat($row['emp_inc']); ?></h3>
                    </div>
                    <div class="col-lg-4 p-2">
                      <p class="text-muted mb-0">Others</p>
                      <h3 class="m-0 mb-1"><?php echo "₹ " . inrFormat($row['emp_other']); ?></h3>
                    </div>
                    <div class="col-lg-4 p-2">
                      <p class="text-muted mb-0">Nick Name</p>
                      <?php if ($row['nick_name'] != Null) { ?>
                        <h3 class="m-0 mb-1"><?php echo $row['nick_name']; ?></h3>
                      <?php } else { ?>
                        <h3 class="m-0 mb-1">NA</h3>
                      <?php } ?>
                    </div>
                    <div class="col-lg-4 p-2">
                      <p class="text-muted mb-0">Line Manager</p>
                      <?php if ($row['line_manager'] != Null) { ?>
                        <h3 class="m-0 mb-1"><?php echo $row['line_manager']; ?></h3>
                      <?php } else { ?>
                        <h3 class="m-0 mb-1">NA</h3>
                      <?php } ?>
                    </div>
                    <div class="col-lg-4 p-2">
                      <p class="text-muted mb-0">Joining Month</p>
                      <?php if ($row['joining_month'] != Null) { ?>
                        <h3 class="m-0 mb-1"><?php echo $row['joining_month']; ?></h3>
                      <?php } else { ?>
                        <h3 class="m-0 mb-1">NA</h3>
                      <?php } ?>
                    </div>

                    <div class="col-lg-4 p-2">
                      <p class="text-muted mb-0">DFH <span class="form-help" data-bs-toggle="popover" data-bs-placement="top" data-bs-html="true" data-bs-content="<p>Date Of Hitting </p>">?</span></p>
                      <?php if ($row['date_of_hitting'] != Null) { ?>
                        <h3 class="m-0 mb-1"><?php echo $row['date_of_hitting']; ?></h3>
                      <?php } else { ?>
                        <h3 class="m-0 mb-1">NA</h3>
                      <?php } ?>
                    </div>
                    <div class="col-lg-4 p-2">
                      <p class="text-muted mb-0">Ageing</p>
                      <?php if ($row['ageing'] != Null) { ?>
                        <h3 class="m-0 mb-1"><?php echo $row['ageing']; ?></h3>
                      <?php } else { ?>
                        <h3 class="m-0 mb-1">NA</h3>
                      <?php } ?>
                    </div>
                    <div class="col-lg-4 p-2">
                      <p class="text-muted mb-0">Rejoing On</p>
                      <?php if ($row['rejoing_on'] != Null) { ?>
                        <h3 class="m-0 mb-1"><?php echo $row['rejoing_on']; ?></h3>
                      <?php } else { ?>
                        <h3 class="m-0 mb-1">NA</h3>
                      <?php } ?>
                    </div>
                    <div class="col-lg-4 p-2">
                      <p class="text-muted mb-0">DFC <span class="form-help" data-bs-toggle="popover" data-bs-placement="top" data-bs-html="true" data-bs-content="<p>Date Of Confirmation </p>">?</span></p>
                      <?php if ($row['date_of_confirmation'] != Null) { ?>
                        <h3 class="m-0 mb-1"><?php echo $row['date_of_confirmation']; ?></h3>
                      <?php } else { ?>
                        <h3 class="m-0 mb-1">NA</h3>
                      <?php } ?>
                    </div>
                    <div class="col-lg-4 p-2">
                      <p class="text-muted mb-0">Exit Formalities</p>
                      <?php if ($row['exit_formalities'] != Null) { ?>
                        <h3 class="m-0 mb-1"><?php echo $row['exit_formalities']; ?></h3>
                      <?php } else { ?>
                        <h3 class="m-0 mb-1">NA</h3>
                      <?php } ?>
                    </div>
                    <div class="col-lg-4 p-2">
                      <p class="text-muted mb-0">FNF</p>
                      <?php if ($row['fnf'] != Null) { ?>
                        <h3 class="m-0 mb-1"><?php echo $row['fnf']; ?></h3>
                      <?php } else { ?>
                        <h3 class="m-0 mb-1">NA</h3>
                      <?php } ?>
                    </div>
                    <div class="col-lg-4 p-2">
                      <p class="text-muted mb-0">Reason For Leaving</p>
                      <?php if ($row['reason_of_leaving'] != Null) { ?>
                        <h3 class="m-0 mb-1"><?php echo $row['reason_of_leaving']; ?></h3>
                      <?php } else { ?>
                        <h3 class="m-0 mb-1">NA</h3>
                      <?php } ?>
                    </div>
                    <div class="col-lg-4 p-2">
                      <p class="text-muted mb-0">Type Of Attrition</p>
                      <?php if ($row['type_of_attrition'] != Null) { ?>
                        <h3 class="m-0 mb-1"><?php echo $row['type_of_attrition']; ?></h3>
                      <?php } else { ?>
                        <h3 class="m-0 mb-1">NA</h3>
                      <?php } ?>
                    </div>
                    <div class="col-lg-4 p-2">
                      <p class="text-muted mb-0">Annual CTC IN</p>
                      <?php if ($row['annual_ctc_in'] != Null) { ?>
                        <h3 class="m-0 mb-1"><?php echo $row['annual_ctc_in']; ?></h3>
                      <?php } else { ?>
                        <h3 class="m-0 mb-1">NA</h3>
                      <?php } ?>
                    </div>
                    <div class="col-lg-4 p-2">
                      <p class="text-muted mb-0">Annual CTC New</p>
                      <?php if ($row['annual_ctc_new'] != Null) { ?>
                        <h3 class="m-0 mb-1"><?php echo $row['annual_ctc_new']; ?></h3>
                      <?php } else { ?>
                        <h3 class="m-0 mb-1">NA</h3>
                      <?php } ?>
                    </div>
                    <div class="col-lg-4 p-2">
                      <p class="text-muted mb-0">in_hand_salary_with_stack</p>
                      <?php if ($row['in_hand_salary_with_stack'] != Null) { ?>
                        <h3 class="m-0 mb-1"><?php echo $row['in_hand_salary_with_stack']; ?></h3>
                      <?php } else { ?>
                        <h3 class="m-0 mb-1">NA</h3>
                      <?php } ?>
                    </div>
                    <div class="col-lg-4 p-2">
                      <p class="text-muted mb-0">Final CTC All</p>
                      <?php if ($row['final_ctc_all'] != Null) { ?>
                        <h3 class="m-0 mb-1"><?php echo $row['final_ctc_all']; ?></h3>
                      <?php } else { ?>
                        <h3 class="m-0 mb-1">NA</h3>
                      <?php } ?>
                    </div>
                    <div class="col-lg-4 p-2">
                      <p class="text-muted mb-0">TRA <span class="form-help" data-bs-toggle="popover" data-bs-placement="top" data-bs-html="true" data-bs-content="<p>Transport Reimbursement Applicable </p>">?</span></p>
                      <?php if ($row['transport_r_a'] != Null) { ?>
                        <h3 class="m-0 mb-1"><?php echo $row['transport_r_a']; ?></h3>
                      <?php } else { ?>
                        <h3 class="m-0 mb-1">NA</h3>
                      <?php } ?>
                    </div>
                    <div class="col-lg-4 p-2">
                      <p class="text-muted mb-0">Father Name</p>
                      <?php if ($row['father_name'] != Null) { ?>
                        <h3 class="m-0 mb-1"><?php echo $row['father_name']; ?></h3>
                      <?php } else { ?>
                        <h3 class="m-0 mb-1">NA</h3>
                      <?php } ?>
                    </div>
                    <div class="col-lg-4 p-2">
                      <p class="text-muted mb-0">Gender</p>
                      <?php if ($row['gender'] != Null) { ?>
                        <h3 class="m-0 mb-1"><?php echo $row['gender']; ?></h3>
                      <?php } else { ?>
                        <h3 class="m-0 mb-1">NA</h3>
                      <?php } ?>
                    </div>
                    <div class="col-lg-4 p-2">
                      <p class="text-muted mb-0">dob</p>
                      <?php if ($row['dob'] != Null) { ?>
                        <h3 class="m-0 mb-1"><?php echo $row['dob']; ?></h3>
                      <?php } else { ?>
                        <h3 class="m-0 mb-1">NA</h3>
                      <?php } ?>
                    </div>
                    <div class="col-lg-4 p-2">
                      <p class="text-muted mb-0">Marital Status</p>
                      <?php if ($row['marital_status'] != Null) { ?>
                        <h3 class="m-0 mb-1"><?php echo $row['marital_status']; ?></h3>
                      <?php } else { ?>
                        <h3 class="m-0 mb-1">NA</h3>
                      <?php } ?>
                    </div>
                    <div class="col-lg-4 p-2">
                      <p class="text-muted mb-0">Present Address H No.</p>
                      <?php if ($row['present_address_h_no'] != Null) { ?>
                        <h3 class="m-0 mb-1"><?php echo $row['present_address_h_no']; ?></h3>
                      <?php } else { ?>
                        <h3 class="m-0 mb-1">NA</h3>
                      <?php } ?>
                    </div>
                    <div class="col-lg-4 p-2">
                      <p class="text-muted mb-0">lacality_building</p>
                      <?php if ($row['lacality_building'] != Null) { ?>
                        <h3 class="m-0 mb-1"><?php echo $row['lacality_building']; ?></h3>
                      <?php } else { ?>
                        <h3 class="m-0 mb-1">NA</h3>
                      <?php } ?>
                    </div>
                    <div class="col-lg-4 p-2">
                      <p class="text-muted mb-0">area</p>
                      <?php if ($row['area'] != Null) { ?>
                        <h3 class="m-0 mb-1"><?php echo $row['area']; ?></h3>
                      <?php } else { ?>
                        <h3 class="m-0 mb-1">NA</h3>
                      <?php } ?>
                    </div>
                    <div class="col-lg-4 p-2">
                      <p class="text-muted mb-0">district</p>
                      <?php if ($row['district'] != Null) { ?>
                        <h3 class="m-0 mb-1"><?php echo $row['district']; ?></h3>
                      <?php } else { ?>
                        <h3 class="m-0 mb-1">NA</h3>
                      <?php } ?>
                    </div>
                    <div class="col-lg-4 p-2">
                      <p class="text-muted mb-0">state</p>
                      <?php if ($row['gender'] != Null) { ?>
                        <h3 class="m-0 mb-1"><?php echo $row['state']; ?></h3>
                      <?php } else { ?>
                        <h3 class="m-0 mb-1">NA</h3>
                      <?php } ?>
                    </div>
                    <div class="col-lg-4 p-2">
                      <p class="text-muted mb-0">post_code</p>
                      <?php if ($row['post_code'] != Null) { ?>
                        <h3 class="m-0 mb-1"><?php echo $row['post_code']; ?></h3>
                      <?php } else { ?>
                        <h3 class="m-0 mb-1">NA</h3>
                      <?php } ?>
                    </div>
                    <div class="col-lg-4 p-2">
                      <p class="text-muted mb-0">permanent_address_h_no</p>
                      <?php if ($row['permanent_address_h_no'] != Null) { ?>
                        <h3 class="m-0 mb-1"><?php echo $row['permanent_address_h_no']; ?></h3>
                      <?php } else { ?>
                        <h3 class="m-0 mb-1">NA</h3>
                      <?php } ?>
                    </div>
                    <div class="col-lg-4 p-2">
                      <p class="text-muted mb-0">per_lacality_building</p>
                      <?php if ($row['per_lacality_building'] != Null) { ?>
                        <h3 class="m-0 mb-1"><?php echo $row['per_lacality_building']; ?></h3>
                      <?php } else { ?>
                        <h3 class="m-0 mb-1">NA</h3>
                      <?php } ?>
                    </div>
                    <div class="col-lg-4 p-2">
                      <p class="text-muted mb-0">per_area</p>
                      <?php if ($row['per_area'] != Null) { ?>
                        <h3 class="m-0 mb-1"><?php echo $row['per_area']; ?></h3>
                      <?php } else { ?>
                        <h3 class="m-0 mb-1">NA</h3>
                      <?php } ?>
                    </div>
                    <div class="col-lg-4 p-2">
                      <p class="text-muted mb-0">per_district</p>
                      <?php if ($row['per_district'] != Null) { ?>
                        <h3 class="m-0 mb-1"><?php echo $row['per_district']; ?></h3>
                      <?php } else { ?>
                        <h3 class="m-0 mb-1">NA</h3>
                      <?php } ?>
                    </div>
                    <div class="col-lg-4 p-2">
                      <p class="text-muted mb-0">per_state</p>
                      <?php if ($row['per_state'] != Null) { ?>
                        <h3 class="m-0 mb-1"><?php echo $row['per_state']; ?></h3>
                      <?php } else { ?>
                        <h3 class="m-0 mb-1">NA</h3>
                      <?php } ?>
                    </div>
                    <div class="col-lg-4 p-2">
                      <p class="text-muted mb-0">per_post_code</p>
                      <?php if ($row['per_post_code'] != Null) { ?>
                        <h3 class="m-0 mb-1"><?php echo $row['per_post_code']; ?></h3>
                      <?php } else { ?>
                        <h3 class="m-0 mb-1">NA</h3>
                      <?php } ?>
                    </div>
                    <div class="col-lg-4 p-2">
                      <p class="text-muted mb-0">phone</p>
                      <?php if ($row['phone'] != Null) { ?>
                        <h3 class="m-0 mb-1"><?php echo $row['phone']; ?></h3>
                      <?php } else { ?>
                        <h3 class="m-0 mb-1">NA</h3>
                      <?php } ?>
                    </div>
                    <div class="col-lg-4 p-2">
                      <p class="text-muted mb-0">mobile</p>
                      <?php if ($row['mobile'] != Null) { ?>
                        <h3 class="m-0 mb-1"><?php echo $row['mobile']; ?></h3>
                      <?php } else { ?>
                        <h3 class="m-0 mb-1">NA</h3>
                      <?php } ?>
                    </div>
                    <div class="col-lg-4 p-2">
                      <p class="text-muted mb-0">primary_email</p>
                      <?php if ($row['primary_email'] != Null) { ?>
                        <h3 class="m-0 mb-1"><?php echo $row['primary_email']; ?></h3>
                      <?php } else { ?>
                        <h3 class="m-0 mb-1">NA</h3>
                      <?php } ?>
                    </div>
                    <div class="col-lg-4 p-2">
                      <p class="text-muted mb-0">aadhaar</p>
                      <?php if ($row['aadhaar'] != Null) { ?>
                        <h3 class="m-0 mb-1"><?php echo $row['aadhaar']; ?></h3>
                      <?php } else { ?>
                        <h3 class="m-0 mb-1">NA</h3>
                      <?php } ?>
                    </div>
                    <div class="col-lg-4 p-2">
                      <p class="text-muted mb-0">nominee_details</p>
                      <?php if ($row['nominee_details'] != Null) { ?>
                        <h3 class="m-0 mb-1"><?php echo $row['nominee_details']; ?></h3>
                      <?php } else { ?>
                        <h3 class="m-0 mb-1">NA</h3>
                      <?php } ?>
                    </div>
                    <div class="col-lg-4 p-2">
                      <p class="text-muted mb-0">relation</p>
                      <?php if ($row['relation'] != Null) { ?>
                        <h3 class="m-0 mb-1"><?php echo $row['relation']; ?></h3>
                      <?php } else { ?>
                        <h3 class="m-0 mb-1">NA</h3>
                      <?php } ?>
                    </div>
                    <div class="col-lg-4 p-2">
                      <p class="text-muted mb-0">address</p>
                      <?php if ($row['address'] != Null) { ?>
                        <h3 class="m-0 mb-1"><?php echo $row['address']; ?></h3>
                      <?php } else { ?>
                        <h3 class="m-0 mb-1">NA</h3>
                      <?php } ?>
                    </div>
                    <div class="col-lg-4 p-2">
                      <p class="text-muted mb-0">emy_contact_no</p>
                      <?php if ($row['emy_contact_no'] != Null) { ?>
                        <h3 class="m-0 mb-1"><?php echo $row['emy_contact_no']; ?></h3>
                      <?php } else { ?>
                        <h3 class="m-0 mb-1">NA</h3>
                      <?php } ?>
                    </div>
                    <div class="col-lg-4 p-2">
                      <p class="text-muted mb-0">emy_contact_relation</p>
                      <?php if ($row['emy_contact_relation'] != Null) { ?>
                        <h3 class="m-0 mb-1"><?php echo $row['emy_contact_relation']; ?></h3>
                      <?php } else { ?>
                        <h3 class="m-0 mb-1">NA</h3>
                      <?php } ?>
                    </div>
                    <div class="col-lg-4 p-2">
                      <p class="text-muted mb-0">emy_contact_email</p>
                      <?php if ($row['emy_contact_email'] != Null) { ?>
                        <h3 class="m-0 mb-1"><?php echo $row['emy_contact_email']; ?></h3>
                      <?php } else { ?>
                        <h3 class="m-0 mb-1">NA</h3>
                      <?php } ?>
                    </div>
                    <div class="col-lg-4 p-2">
                      <p class="text-muted mb-0">no_of_bank</p>
                      <?php if ($row['no_of_bank'] != Null) { ?>
                        <h3 class="m-0 mb-1"><?php echo $row['no_of_bank']; ?></h3>
                      <?php } else { ?>
                        <h3 class="m-0 mb-1">NA</h3>
                      <?php } ?>
                    </div>
                    <div class="col-lg-4 p-2">
                      <p class="text-muted mb-0">no_of_family_member</p>
                      <?php if ($row['no_of_family_member'] != Null) { ?>
                        <h3 class="m-0 mb-1"><?php echo $row['no_of_family_member']; ?></h3>
                      <?php } else { ?>
                        <h3 class="m-0 mb-1">NA</h3>
                      <?php } ?>
                    </div>
                    <div class="col-lg-4 p-2">
                      <p class="text-muted mb-0">mob_link_uan_no</p>
                      <?php if ($row['mob_link_uan_no'] != Null) { ?>
                        <h3 class="m-0 mb-1"><?php echo $row['mob_link_uan_no']; ?></h3>
                      <?php } else { ?>
                        <h3 class="m-0 mb-1">NA</h3>
                      <?php } ?>
                    </div>
                    <div class="col-lg-4 p-2">
                      <p class="text-muted mb-0">blood_group</p>
                      <?php if ($row['blood_group'] != Null) { ?>
                        <h3 class="m-0 mb-1"><?php echo $row['blood_group']; ?></h3>
                      <?php } else { ?>
                        <h3 class="m-0 mb-1">NA</h3>
                      <?php } ?>
                    </div>
                    <div class="col-lg-4 p-2">
                      <p class="text-muted mb-0">performer_month</p>
                      <?php if ($row['performer_month'] != Null) { ?>
                        <h3 class="m-0 mb-1"><?php echo $row['performer_month']; ?></h3>
                      <?php } else { ?>
                        <h3 class="m-0 mb-1">NA</h3>
                      <?php } ?>
                    </div>
                    <div class="col-lg-4 p-2">
                      <p class="text-muted mb-0">verbal_warning</p>
                      <?php if ($row['verbal_warning'] != Null) { ?>
                        <h3 class="m-0 mb-1"><?php echo $row['verbal_warning']; ?></h3>
                      <?php } else { ?>
                        <h3 class="m-0 mb-1">NA</h3>
                      <?php } ?>
                    </div>
                    <div class="col-lg-4 p-2">
                      <p class="text-muted mb-0">reason_of_verbal_warning</p>
                      <?php if ($row['reason_of_verbal_warning'] != Null) { ?>
                        <h3 class="m-0 mb-1"><?php echo $row['reason_of_verbal_warning']; ?></h3>
                      <?php } else { ?>
                        <h3 class="m-0 mb-1">NA</h3>
                      <?php } ?>
                    </div>
                    <div class="col-lg-4 p-2">
                      <p class="text-muted mb-0">date_of_verbal_warning</p>
                      <?php if ($row['date_of_verbal_warning'] != Null) { ?>
                        <h3 class="m-0 mb-1"><?php echo $row['date_of_verbal_warning']; ?></h3>
                      <?php } else { ?>
                        <h3 class="m-0 mb-1">NA</h3>
                      <?php } ?>
                    </div>
                    <div class="col-lg-4 p-2">
                      <p class="text-muted mb-0">no_of_warning</p>
                      <?php if ($row['no_of_warning'] != Null) { ?>
                        <h3 class="m-0 mb-1"><?php echo $row['no_of_warning']; ?></h3>
                      <?php } else { ?>
                        <h3 class="m-0 mb-1">NA</h3>
                      <?php } ?>
                    </div>
                    <div class="col-lg-4 p-2">
                      <p class="text-muted mb-0">reason_of_warning</p>
                      <?php if ($row['reason_of_warning'] != Null) { ?>
                        <h3 class="m-0 mb-1"><?php echo $row['reason_of_warning']; ?></h3>
                      <?php } else { ?>
                        <h3 class="m-0 mb-1">NA</h3>
                      <?php } ?>
                    </div>
                    <div class="col-lg-4 p-2">
                      <p class="text-muted mb-0">date_of_written_warning</p>
                      <?php if ($row['date_of_written_warning'] != Null) { ?>
                        <h3 class="m-0 mb-1"><?php echo $row['date_of_written_warning']; ?></h3>
                      <?php } else { ?>
                        <h3 class="m-0 mb-1">NA</h3>
                      <?php } ?>
                    </div>
                    <div class="col-lg-4 p-2">
                      <p class="text-muted mb-0">pip_issue_date</p>
                      <?php if ($row['pip_issue_date'] != Null) { ?>
                        <h3 class="m-0 mb-1"><?php echo $row['pip_issue_date']; ?></h3>
                      <?php } else { ?>
                        <h3 class="m-0 mb-1">NA</h3>
                      <?php } ?>
                    </div>
                    <div class="col-lg-4 p-2">
                      <p class="text-muted mb-0">appraisal_letter</p>
                      <?php if ($row['appraisal_letter'] != Null) { ?>
                        <h3 class="m-0 mb-1"><?php echo $row['appraisal_letter']; ?></h3>
                      <?php } else { ?>
                        <h3 class="m-0 mb-1">NA</h3>
                      <?php } ?>
                    </div>
                    <div class="col-lg-4 p-2">
                      <p class="text-muted mb-0">appraisal_1</p>
                      <?php if ($row['appraisal_1'] != Null) { ?>
                        <h3 class="m-0 mb-1"><?php echo $row['appraisal_1']; ?></h3>
                      <?php } else { ?>
                        <h3 class="m-0 mb-1">NA</h3>
                      <?php } ?>
                    </div>
                    <div class="col-lg-4 p-2">
                      <p class="text-muted mb-0">appraisal_2</p>
                      <?php if ($row['appraisal_2'] != Null) { ?>
                        <h3 class="m-0 mb-1"><?php echo $row['appraisal_2']; ?></h3>
                      <?php } else { ?>
                        <h3 class="m-0 mb-1">NA</h3>
                      <?php } ?>
                    </div>
                    <div class="col-lg-4 p-2">
                      <p class="text-muted mb-0">appraisal_3</p>
                      <?php if ($row['appraisal_3'] != Null) { ?>
                        <h3 class="m-0 mb-1"><?php echo $row['appraisal_3']; ?></h3>
                      <?php } else { ?>
                        <h3 class="m-0 mb-1">NA</h3>
                      <?php } ?>
                    </div>
                    <div class="col-lg-4 p-2">
                      <p class="text-muted mb-0">appraisal_4</p>
                      <?php if ($row['appraisal_4'] != Null) { ?>
                        <h3 class="m-0 mb-1"><?php echo $row['appraisal_4']; ?></h3>
                      <?php } else { ?>
                        <h3 class="m-0 mb-1">NA</h3>
                      <?php } ?>
                    </div>
                    <div class="col-lg-4 p-2">
                      <p class="text-muted mb-0">Secondary School Certificate</p>
                      <?php if ($row['ssc'] != Null) { ?>
                        <h3 class="m-0 mb-1"><?php echo $row['ssc']; ?></h3>
                      <?php } else { ?>
                        <h3 class="m-0 mb-1">NA</h3>
                      <?php } ?>
                    </div>
                    <div class="col-lg-4 p-2">
                      <p class="text-muted mb-0">Higher Secondary Certificate</p>
                      <?php if ($row['hsc'] != Null) { ?>
                        <h3 class="m-0 mb-1"><?php echo $row['hsc']; ?></h3>
                      <?php } else { ?>
                        <h3 class="m-0 mb-1">NA</h3>
                      <?php } ?>
                    </div>
                    <div class="col-lg-4 p-2">
                      <p class="text-muted mb-0">graduation</p>
                      <?php if ($row['graduation'] != Null) { ?>
                        <h3 class="m-0 mb-1"><?php echo $row['graduation']; ?></h3>
                      <?php } else { ?>
                        <h3 class="m-0 mb-1">NA</h3>
                      <?php } ?>
                    </div>
                    <div class="col-lg-4 p-2">
                      <p class="text-muted mb-0">experience_relieving</p>
                      <?php if ($row['experience_relieving'] != Null) { ?>
                        <h3 class="m-0 mb-1"><?php echo $row['experience_relieving']; ?></h3>
                      <?php } else { ?>
                        <h3 class="m-0 mb-1">NA</h3>
                      <?php } ?>
                    </div>
                    <div class="col-lg-4 p-2">
                      <p class="text-muted mb-0">salary_slip</p>
                      <?php if ($row['salary_slip'] != Null) { ?>
                        <h3 class="m-0 mb-1"><?php echo $row['salary_slip']; ?></h3>
                      <?php } else { ?>
                        <h3 class="m-0 mb-1">NA</h3>
                      <?php } ?>
                    </div>
                    <div class="col-lg-4 p-2">
                      <p class="text-muted mb-0">bank_statement</p>
                      <?php if ($row['bank_statement'] != Null) { ?>
                        <h3 class="m-0 mb-1"><?php echo $row['bank_statement']; ?></h3>
                      <?php } else { ?>
                        <h3 class="m-0 mb-1">NA</h3>
                      <?php } ?>
                    </div>
                    <div class="col-lg-4 p-2">
                      <p class="text-muted mb-0">cancel_cheque</p>
                      <?php if ($row['cancel_cheque'] != Null) { ?>
                        <h3 class="m-0 mb-1"><?php echo $row['cancel_cheque']; ?></h3>
                      <?php } else { ?>
                        <h3 class="m-0 mb-1">NA</h3>
                      <?php } ?>
                    </div>

                    <div class="col-lg-4 p-2">
                      <p class="text-muted mb-0">Exit Date</p>
                      <?php if ($row['emp_exitdate'] != 0000 - 00 - 00) { ?>
                        <h3 class="m-0 mb-1"><?php echo date('d-M-Y', strtotime($row['emp_exitdate'])); ?></h3>
                      <?php } else { ?>
                        <h3 class="m-0 mb-1">NA</h3>
                      <?php } ?>
                    </div>
                  </div>
                </div>
              </div>
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