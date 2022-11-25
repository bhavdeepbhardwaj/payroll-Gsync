<?php
$id = $_GET["id"];
$empid = $_GET["empid"];

if (empty($id) || empty($empid)) {
    header("Location: error-404.php");
}
$parent_page = "emp";
$page = "view_emps";
include "config.php";
include "header.php";

if ($_SESSION["user_type"] == 3 && ($_SESSION["username"] != $empid)) {
    $redirectPg = 1;
} else {
    $redirectPg = 0;
}

$sal_sql = "SELECT * FROM gs_emp_salary WHERE sal_id = '" . $id . "' AND employee_id = '" . $empid . "'";

$sal_res = mysqli_query($link, $sal_sql);

$sal_row = mysqli_fetch_assoc($sal_res);

// echo "<pre>";
// print_r($sal_row);
// echo "</pre>";

$emp_sql = "SELECT * FROM gs_employees WHERE emp_id = '" . $empid . "'";

$emp_res = mysqli_query($link, $emp_sql);

$emp_row = mysqli_fetch_assoc($emp_res);

// echo "<pre>";
// print_r($emp_row);
// echo "</pre>";

if (empty($sal_row) || empty($emp_row)) {
    $redirectPg = 1;
} else {
    $redirectPg = 0;
}

$pay_month = $sal_row['month_yr'];
$emp_id = $sal_row['employee_id'];
$full_name = $emp_row['emp_name'];
$doj = $emp_row['doj'];
$department = $emp_row['emp_dept'];
$payment_mode = $emp_row['emp_paymode'];
$bank = $emp_row['emp_bank'];
$ifsc = $emp_row['emp_ifsc'];
$ac_no = $emp_row['emp_acc'];
$pan = $emp_row['emp_pan'];
$uan = $emp_row['emp_uan'];
$net_sal = $sal_row['net_salary'];
$present_days = floatval($sal_row['total_p']) + floatval($sal_row['wo_ph']);
$lv_adj = $sal_row['leaves_adjusted'];
$pay_days = floatval($present_days) + floatval($lv_adj);

$sandwich = $sal_row['sandwhich_leave_deduction'];
$lv_bal = $sal_row['pre_leave_bal'];
// $food_allw = $_POST['food_allw'];
// $travel_allw = $_POST['travel_allw'];
$spl_allowance = $sal_row['spl_allowance'];
// $msa_check = $_POST['msa'];
// $tsa_check = $_POST['tsa'];
$stack = $sal_row['stack_inc'];
$inc = $sal_row['inc'];
$others = $sal_row['other_inc_dues'];
$arrears = $sal_row['arrears'];
$tds = $sal_row['tds_deduction'];
$penalty_adj = $sal_row['penalty_adj'];
$penalties = 0;
$ref_bonus = $sal_row['inc_refferal'];
$qua_incentive = $sal_row['inc_qualified'];
$inc_install = $sal_row['install_inc'];
$payslip_date = date_create($pay_month);
$ddoj = date_create($doj);
$cal_days = cal_days_in_month(CAL_GREGORIAN, date("m", strtotime($pay_month)), date("Y", strtotime($pay_month)));
$lop = floatval($cal_days) - floatval($pay_days);
$adv_adj = $sal_row['adv_adj'];

$emp_esi = $emp_row['emp_uan'];

// echo "<pre>";
// print_r($emp_esi);
// echo "</pre>";

?>
<!-- <style>
    *{
        font-size: 12px;
    }
</style> -->

<div class="page-wrapper">
    <div class="container-xl">
        <!-- Page title -->
        <div class="page-header d-print-none">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        Salary Slip
                    </h2>
                </div>
                <!-- Page title actions -->
                <div class="col-12 col-md-auto ms-auto d-print-none">
                    <button type="button" class="btn btn-outline-primary" onclick="javascript:window.print();">
                        <!-- Download SVG icon from http://tabler-icons.io/i/printer -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M17 17h2a2 2 0 0 0 2 -2v-4a2 2 0 0 0 -2 -2h-14a2 2 0 0 0 -2 2v4a2 2 0 0 0 2 2h2" />
                            <path d="M17 9v-4a2 2 0 0 0 -2 -2h-6a2 2 0 0 0 -2 2v4" />
                            <rect x="7" y="13" width="10" height="8" rx="2" />
                        </svg>
                        Print Salary Slip
                    </button>
                    <button type="button" class="btn btn-primary" onclick="generatePDF();">
                        <!-- Download SVG icon from http://tabler-icons.io/i/printer -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-file-download" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M14 3v4a1 1 0 0 0 1 1h4"></path>
                            <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z"></path>
                            <path d="M12 17v-6"></path>
                            <path d="M9.5 14.5l2.5 2.5l2.5 -2.5"></path>
                        </svg>
                        Download Salary Slip
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="page-body">
        <div class="container-xl">
            <?php if ($_SESSION['country_type'] == 'In') { ?>
                <div class="card card-lg">
                    <div class="card-body" id="convertPDF">
                        <div class="row">
                            <div class="col-6">
                                <h1>PAYSLIP <span class="text-muted"><?php echo strtoupper(date_format($payslip_date, "M Y")); ?></span></h1>
                                <p class="h3">GLOBALSYNC PRIVATE LIMITED</p>
                                <address>
                                    Unit-2, Ground Floor,<br>
                                    Okaya Center, Sector-62,<br>
                                    Noida, UP, India 201309<br>
                                </address>
                                <p><strong><?php echo $full_name; ?></strong></p>
                            </div>
                            <div class="col-6 text-end">
                                <img src="./static/logo.png" width="50%">
                            </div>
                            <hr style="margin: 0;">
                        </div>
                        <table class="table table-transparent table-responsive">
                            <tr>
                                <td>
                                    <div class="text-muted">Employee ID</div>
                                    <p class="strong mb-1"><?php echo $emp_id; ?></p>
                                </td>
                                <td>
                                    <div class="text-muted">Date Joined</div>
                                    <p class="strong mb-1"><?php echo strtoupper(date_format($ddoj, "d M Y")); ?></p>
                                </td>
                                <td>
                                    <div class="text-muted">Department</div>
                                    <p class="strong mb-1"><?php echo $department; ?></p>
                                </td>
                                <td>
                                    <div class="text-muted">PAN</div>
                                    <p class="strong mb-1"><?php echo $pan; ?></p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="text-muted">Payment Mode</div>
                                    <p class="strong mb-1"><?php echo $payment_mode; ?></p>
                                </td>
                                <td>
                                    <div class="text-muted">Bank</div>
                                    <p class="strong mb-1"><?php echo $bank; ?></p>
                                </td>
                                <td>
                                    <div class="text-muted">Bank IFSC</div>
                                    <p class="strong mb-1"><?php echo $ifsc; ?></p>
                                </td>
                                <td>
                                    <div class="text-muted">Bank Account</div>
                                    <p class="strong mb-1"><?php echo $ac_no; ?></p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="text-muted">UAN No.</div>
                                    <p class="strong mb-1"><?php echo $uan; ?></p>
                                </td>
                                <td>
                                    <div class="text-muted"></div>
                                    <p class="strong mb-1"></p>
                                </td>
                                <td>
                                    <div class="text-muted"></div>
                                    <p class="strong mb-1"></p>
                                </td>
                                <td>
                                    <div class="text-muted"></div>
                                    <p class="strong mb-1"></p>
                                </td>
                            </tr>
                        </table>

                        <table class="table table-transparent table-responsive my-table mb-0">
                            <tr>
                                <td colspan="4">
                                    <span class="strong">SALARY DETAILS</span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="text-muted fs-5">CALENDAR DAYS</div>
                                    <p class="strong mb-1"><?php echo $cal_days; ?></p>
                                </td>
                                <td>
                                    <div class="text-muted fs-5">PRESENT DAYS</div>
                                    <p class="strong mb-1"><?php echo $present_days; ?></p>
                                </td>
                                <td>
                                    <div class="text-muted fs-5">LEAVE ADJUSTED</div>
                                    <p class="strong mb-1"><?php echo $lv_adj; ?></p>
                                </td>
                                <td>
                                    <div class="text-muted fs-5">DAYS PAYABLE</div>
                                    <p class="strong mb-1"><?php echo $pay_days; ?></p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="text-muted fs-5">LOSS OF PAY DAYS</div>
                                    <p class="strong mb-1"><?php echo $lop; ?></p>
                                </td>
                                <td>
                                    <div class="text-muted fs-5">LEAVE BALANCE</div>
                                    <p class="strong mb-1"><?php echo $lv_bal; ?></p>
                                </td>
                                <td>
                                    <div class="text-muted fs-5"></div>
                                    <p class="strong mb-1"></p>
                                </td>
                                <td>
                                    <div class="text-muted fs-5"></div>
                                    <p class="strong mb-1"></p>
                                </td>
                            </tr>
                        </table>
                        <div class="row">
                            <div class="col-6 p-0">
                                <table class="table table-transparent table-responsive my-table">
                                    <tr>
                                        <td colspan="2" class="border_right text-center">
                                            <p class="strong my-2">EARNINGS</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p class="mb-0">Basic</p>
                                        </td>
                                        <td class="border_right">
                                            <p class="mb-0 text-end"><?php echo "₹ " . inrFormat($sal_row['sal_month_basic']); ?></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p class="mb-0">HRA</p>
                                        </td>
                                        <td class="border_right">
                                            <p class="mb-0 text-end"><?php echo "₹ " . inrFormat($sal_row['sal_month_hra']); ?></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p class="mb-0">Statutory Allowance</p>
                                        </td>
                                        <td class="border_right">
                                            <p class="mb-0 text-end"><?php echo "₹ " . inrFormat($sal_row['sal_month_sa']); ?></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p class="mb-0">Other Allowance</p>
                                        </td>
                                        <td class="border_right">
                                            <p class="mb-0 text-end"><?php echo "₹ " . inrFormat($sal_row['sal_month_oa']); ?></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p class="mb-0">Food Allowance*</p>
                                        </td>
                                        <td class="border_right">
                                            <p class="mb-0 text-end"><?php echo "₹ " . inrFormat($sal_row['food']); ?></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p class="mb-0">Travel Allowance*</p>
                                        </td>
                                        <td class="border_right">
                                            <p class="mb-0 text-end"><?php echo "₹ " . inrFormat($sal_row['transport']); ?></p>
                                        </td>
                                    </tr>
                                    <?php if ($sal_row['spl_allowance'] && $sal_row['spl_allowance'] != 0) { ?>
                                        <tr class="spl_tr">
                                            <td>
                                                <p class="mb-0">Special Allowance</p>
                                            </td>
                                            <td class="border_right">
                                                <p class="mb-0 text-end"><?php echo "₹ " . inrFormat($sal_row['spl_allowance']); ?></p>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                    <?php if ($sal_row['stack_inc'] && $sal_row['stack_inc'] != 0) { ?>
                                        <tr class="stack_tr">
                                            <td>
                                                <p class="mb-0">Stack Incentive**</p>
                                            </td>
                                            <td class="border_right">
                                                <p class="mb-0 text-end"><?php echo "₹ " . inrFormat($sal_row['stack_inc']); ?></p>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                    <?php if ($sal_row['inc'] && $sal_row['inc'] != 0) { ?>
                                        <tr class="inc_tr">
                                            <td>
                                                <p class="mb-0">Incentives</p>
                                            </td>
                                            <td class="border_right">
                                                <p class="mb-0 text-end"><?php echo "₹ " . inrFormat($sal_row['inc']); ?></p>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                    <?php if ($sal_row['inc_refferal'] && $sal_row['inc_refferal'] != 0) { ?>
                                        <tr class="refinc_tr">
                                            <td>
                                                <p class="mb-0">Incentive (Referral Bonus)</p>
                                            </td>
                                            <td class="border_right">
                                                <p class="mb-0 text-end"><?php echo "₹ " . inrFormat($sal_row['inc_refferal']); ?></p>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                    <?php if ($sal_row['other_inc_dues'] > 0 && $sal_row['other_inc_dues'] != 0) { ?>
                                        <tr class="others_tr">
                                            <td>
                                                <p class="mb-0">Others</p>
                                            </td>
                                            <td class="border_right">
                                                <p class="mb-0 text-end"><?php echo "₹ " . inrFormat($sal_row['other_inc_dues']); ?></p>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                    <?php if ($sal_row['empr_pf_cont'] && $sal_row['empr_pf_cont'] != 0) { ?>
                                        <tr>
                                            <td>
                                                <p class="mb-0">Employer PF Share</p>
                                            </td>
                                            <td class="border_right">
                                                <p class="mb-0 text-end"><?php echo "₹ " . inrFormat($sal_row['empr_pf_cont']); ?></p>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                    <?php if ($sal_row['empr_esic_cont'] && $sal_row['empr_esic_cont'] != 0) { ?>
                                        <tr>
                                            <td>
                                                <p class="mb-0">Employer ESIC Share</p>
                                            </td>
                                            <td class="border_right">
                                                <p class="mb-0 text-end"><?php echo "₹ " . inrFormat($sal_row['empr_esic_cont']); ?></p>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                    <?php if ($sal_row['arrears'] && $sal_row['arrears'] != 0) { ?>
                                        <tr>
                                            <td>
                                                <p class="mb-0">Arrears</p>
                                            </td>
                                            <td class="border_right">
                                                <p class="mb-0 text-end"><?php echo "₹ " . inrFormat($sal_row['arrears']); ?></p>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                    <tr>
                                        <td>
                                            <p class="mb-0 strong">Total Earnings (A)</p>
                                        </td>
                                        <td class="border_right strong">
                                            <p class="mb-0 text-end tot_earn"><?php echo "₹ " . inrFormat($sal_row['earnings']); ?></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="strong">
                                            <p class="mb-0">Net Salary Payable (A-B)</p>
                                        </td>
                                        <td class="border_right strong">
                                            <p class="mb-0 text-end"><?php echo "₹ " . inrFormat($sal_row['net_salary']); ?></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="strong">
                                            <p class="mb-0">Net Salary in Words</p>
                                        </td>
                                        <td colspan="2" class="border_right strong">
                                            <p class="mb-0 strong pay_word text-end"></p>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-6 p-0">
                                <table class="table table-transparent table-responsive my-table">
                                    <tr>
                                        <td colspan="2" class="text-center">
                                            <p class="strong my-2">DEDUCTIONS</p>
                                        </td>
                                    </tr>
                                    <?php if ($sal_row['empr_pf_cont'] && $sal_row['empr_pf_cont'] != 0) { ?>
                                        <tr>
                                            <td>
                                                <p class="mb-0">Employer PF Contribution</p>
                                            </td>
                                            <td>
                                                <p class="mb-0 text-end pfempr"><?php echo "₹ " . inrFormat($sal_row['empr_pf_cont']); ?></p>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                    <?php if ($sal_row['empr_esic_cont'] && $sal_row['empr_esic_cont'] != 0) { ?>
                                        <tr>
                                            <td>
                                                <p class="mb-0">Employer ESIC Contribution</p>
                                            </td>
                                            <td>
                                                <p class="mb-0 text-end esiempr"><?php echo "₹ " . inrFormat($sal_row['empr_esic_cont']); ?></p>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                    <?php if ($sal_row['emp_pf_cont'] && $sal_row['emp_pf_cont'] != 0) { ?>
                                        <tr>
                                            <td>
                                                <p class="mb-0">Employee PF Payable</p>
                                            </td>
                                            <td>
                                                <p class="mb-0 text-end pfemp"><?php echo "₹ " . inrFormat($sal_row['emp_pf_cont']); ?></p>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                    <?php if ($sal_row['emp_esic_cont'] && $sal_row['emp_esic_cont'] != 0) { ?>
                                        <tr>
                                            <td>
                                                <p class="mb-0">Employee ESIC Payable</p>
                                            </td>
                                            <td>
                                                <p class="mb-0 text-end esiemp"><?php echo "₹ " . inrFormat($sal_row['emp_esic_cont']); ?></p>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                    <?php if ($sal_row['tds_deduction'] && $sal_row['tds_deduction'] != 0) { ?>
                                        <tr>
                                            <td>
                                                <p class="mb-0">TDS (Tax)</p>
                                            </td>
                                            <td>
                                                <p class="mb-0 text-end tds"><?php echo "₹ " . inrFormat($sal_row['tds_deduction']); ?></p>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                    <?php if ($sal_row['penalty_adj'] && $sal_row['penalty_adj'] != 0) { ?>
                                        <tr>
                                            <td>
                                                <p class="mb-0">Penalties</p>
                                            </td>
                                            <td>
                                                <p class="mb-0 text-end penalty"><?php echo "₹ " . inrFormat($sal_row['penalty_adj']); ?></p>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                    <?php if ($sal_row['adv_adj'] && $sal_row['adv_adj'] != 0) { ?>
                                        <tr>
                                            <td>
                                                <p class="mb-0">Advance</p>
                                            </td>
                                            <td>
                                                <p class="mb-0 text-end adv_data"><?php echo "₹ " . inrFormat($sal_row['adv_adj']); ?></p>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                    <?php if ($sal_row['food_redeem'] && $sal_row['food_redeem'] != 0) { ?>
                                        <tr>
                                            <td>
                                                <p class="mb-0">Meal Service Availed*</p>
                                            </td>
                                            <td>
                                                <p class="mb-0 text-end meal"><?php echo "₹ " . inrFormat($sal_row['food_redeem']); ?></p>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                    <?php if ($sal_row['transport_redeem'] && $sal_row['transport_redeem'] != 0) { ?>
                                        <tr>
                                            <td>
                                                <p class="mb-0">Travel Service Availed*</p>
                                            </td>
                                            <td>
                                                <p class="mb-0 text-end travel"><?php echo "₹ " . inrFormat($sal_row['transport_redeem']); ?></p>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                    <?php if ($sal_row['sandwhich_leave_deduction'] && $sal_row['sandwhich_leave_deduction'] != 0) { ?>
                                        <tr>
                                            <td>
                                                <p class="mb-0">Sandwich Leaves</p>
                                            </td>
                                            <td>
                                                <p class="mb-0 text-end sandwich"><?php echo "₹ " . inrFormat($sal_row['sandwhich_leave_deduction']); ?></p>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                    <?php if ($sal_row['other_inc_dues'] < 0) { ?>
                                        <tr>
                                            <td>
                                                <p class="mb-0">Others</p>
                                            </td>
                                            <td>
                                                <p class="mb-0 text-end"><?php echo "₹ " . inrFormat(substr($sal_row['other_inc_dues'], 1)); ?></p>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                    <tr>
                                        <td>
                                            <p class="mb-0 strong">Total Deductions (B)</p>
                                        </td>
                                        <td>
                                            <p class="mb-0 text-end tolduc strong"><?php echo "₹ " . inrFormat($sal_row['deductions']); ?></p>
                                        </td>
                                    </tr>
                                    <?php if ($sal_row['transport_redeem'] || $sal_row['food_redeem']) { ?>
                                        <tr>
                                            <td colspan="2">
                                                <p class="mb-0"><em>*No Cash Reimbursement (Availed as Service)</em></p>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                    <?php if ($sal_row['stack_inc'] && $sal_row['stack_inc'] != 0) { ?>
                                        <tr class="con_tr">
                                            <td colspan="2">
                                                <p class="mb-0"><em>**Only applicable for SEC Position</em></p>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </table>
                            </div>
                        </div>
                        <p><strong>Note:</strong><em> All amounts displayed in this pay slip are in <strong>INR</strong></em></p>
                    </div>
                </div>
            <?php } else if ($_SESSION['country_type'] == 'Ph') { ?>
                <div class="card card-lg">
                    <div class="card-body" id="convertPDF">
                        <div class="row">
                            <div class="col-6">
                                <h1>PAYSLIP <span class="text-muted"><?php echo strtoupper(date_format($payslip_date, "M Y")); ?></span></h1>
                                <p class="h3">GLOBALSYNC PRIVATE LIMITED</p>
                                <address>
                                    Unit-2, Ground Floor,<br>
                                    Okaya Center, Sector-62,<br>
                                    Noida, UP, India 201309<br>
                                </address>
                                <p><strong><?php echo $full_name; ?></strong></p>
                            </div>
                            <div class="col-6 text-end">
                                <img src="./static/logo.png" width="50%">
                            </div>
                            <hr style="margin: 0;">
                        </div>
                        <table class="table table-transparent table-responsive">
                            <tr>
                                <td>
                                    <div class="text-muted">Employee ID</div>
                                    <p class="strong mb-1"><?php echo $emp_id; ?></p>
                                </td>
                                <td>
                                    <div class="text-muted">Date Joined</div>
                                    <p class="strong mb-1"><?php echo strtoupper(date_format($ddoj, "d M Y")); ?></p>
                                </td>
                                <td>
                                    <div class="text-muted">Department</div>
                                    <p class="strong mb-1"><?php echo $department; ?></p>
                                </td>
                                <td>
                                    <div class="text-muted">PAN</div>
                                    <p class="strong mb-1"><?php echo $pan; ?></p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="text-muted">Payment Mode</div>
                                    <p class="strong mb-1"><?php echo $payment_mode; ?></p>
                                </td>
                                <td>
                                    <div class="text-muted">Bank</div>
                                    <p class="strong mb-1"><?php echo $bank; ?></p>
                                </td>
                                <td>
                                    <div class="text-muted">Bank IFSC</div>
                                    <p class="strong mb-1"><?php echo $ifsc; ?></p>
                                </td>
                                <td>
                                    <div class="text-muted">Bank Account</div>
                                    <p class="strong mb-1"><?php echo $ac_no; ?></p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="text-muted">SSS No.</div>
                                    <p class="strong mb-1"><?php echo $uan; ?></p>
                                </td>
                                <td>
                                    <div class="text-muted">PHIC No.</div>
                                    <p class="strong mb-1"><?php echo $emp_esi; ?></p>
                                </td>
                                <td>
                                    <div class="text-muted"></div>
                                    <p class="strong mb-1"></p>
                                </td>
                                <td>
                                    <div class="text-muted"></div>
                                    <p class="strong mb-1"></p>
                                </td>
                            </tr>
                        </table>
                        <div class="row">
                            <div class="col-6 p-0">
                                <table class="table table-transparent table-responsive my-table">
                                    <tr>
                                        <td colspan="2" class="border_right text-center">
                                            <p class="strong my-2">EARNINGS</p>
                                        </td>
                                        <?php if ($sal_row['ph_sss_emy'] && $sal_row['ph_sss_emy'] != 0) { ?>
                                    <tr>
                                        <td>
                                            <p class="mb-0">Employer SSS Contribution</p>
                                        </td>
                                        <td class="border_right">
                                            <p class="mb-0 text-end"><?php echo "₹ " . inrFormat($sal_row['ph_sss_emy']); ?></p>
                                        </td>
                                    </tr>
                                <?php } ?>
                                <?php if ($sal_row['ph_phic_emy'] && $sal_row['ph_phic_emy'] != 0) { ?>
                                    <tr>
                                        <td>
                                            <p class="mb-0">Employer PHIC Contribution</p>
                                        </td>
                                        <td class="border_right">
                                            <p class="mb-0 text-end"><?php echo "₹ " . inrFormat($sal_row['ph_phic_emy']); ?></p>
                                        </td>
                                    </tr>
                                <?php } ?>
                                <?php if ($sal_row['ph_hdmf_emy'] && $sal_row['ph_hdmf_emy'] != 0) { ?>
                                    <tr>
                                        <td>
                                            <p class="mb-0">Employer HDMF Contribution</p>
                                        </td>
                                        <td class="border_right">
                                            <p class="mb-0 text-end"><?php echo "₹ " . inrFormat($sal_row['ph_hdmf_emy']); ?></p>
                                        </td>
                                    </tr>
                                <?php } ?>
                                <?php if ($sal_row['ph_hmo_emp'] && $sal_row['ph_hmo_emp'] != 0) { ?>
                                    <tr>
                                        <td>
                                            <p class="mb-0">Employer HMO Contribution</p>
                                        </td>
                                        <td class="border_right">
                                            <p class="mb-0 text-end"><?php echo "₹ " . inrFormat($sal_row['ph_hmo_emp']); ?></p>
                                        </td>
                                    </tr>
                                <?php } ?>
                                <tr>
                                    <td>
                                        <p class="mb-0 strong">Total Earnings (A)</p>
                                    </td>
                                    <td class="border_right strong">
                                        <p class="mb-0 text-end tot_earn"><?php echo "₹ " . inrFormat($sal_row['earnings']); ?></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="strong">
                                        <p class="mb-0">Net Salary Payable (A-B)</p>
                                    </td>
                                    <td class="border_right strong">
                                        <p class="mb-0 text-end"><?php echo "₹ " . inrFormat($sal_row['net_salary']); ?></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="strong">
                                        <p class="mb-0">Net Salary in Words</p>
                                    </td>
                                    <td colspan="2" class="border_right strong">
                                        <p class="mb-0 strong pay_word text-end"></p>
                                    </td>
                                </tr>
                                </table>
                            </div>
                            <div class="col-6 p-0">
                                <table class="table table-transparent table-responsive my-table">
                                    <tr>
                                        <td colspan="2" class="text-center">
                                            <p class="strong my-2">DEDUCTIONS</p>
                                        </td>
                                    </tr>
                                    <?php if ($sal_row['ph_sss_emp'] && $sal_row['ph_sss_emp'] != 0) { ?>
                                        <tr>
                                            <td>
                                                <p class="mb-0">Employee SSS Contribution</p>
                                            </td>
                                            <td class="border_right">
                                                <p class="mb-0 text-end"><?php echo "₹ " . inrFormat($sal_row['ph_sss_emp']); ?></p>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                    <?php if ($sal_row['ph_phic_emp'] && $sal_row['ph_phic_emp'] != 0) { ?>
                                        <tr>
                                            <td>
                                                <p class="mb-0">Employee PHIC Contribution</p>
                                            </td>
                                            <td class="border_right">
                                                <p class="mb-0 text-end"><?php echo "₹ " . inrFormat($sal_row['ph_phic_emp']); ?></p>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                    <?php if ($sal_row['ph_hdmf_emp'] && $sal_row['ph_hdmf_emp'] != 0) { ?>
                                        <tr>
                                            <td>
                                                <p class="mb-0">Employee HDMF Contribution</p>
                                            </td>
                                            <td class="border_right">
                                                <p class="mb-0 text-end"><?php echo "₹ " . inrFormat($sal_row['ph_hdmf_emp']); ?></p>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                    <?php if ($sal_row['ph_tax'] && $sal_row['ph_tax'] != 0) { ?>
                                        <tr>
                                            <td>
                                                <p class="mb-0">TDS (Tax)</p>
                                            </td>
                                            <td>
                                                <p class="mb-0 text-end tds"><?php echo "₹ " . inrFormat($sal_row['ph_tax']); ?></p>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                    <tr>
                                        <td>
                                            <p class="mb-0 strong">Total Deductions (B)</p>
                                        </td>
                                        <td>
                                            <p class="mb-0 text-end tolduc strong"><?php echo "₹ " . inrFormat($sal_row['deductions']); ?></p>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <p><strong>Note:</strong><em> All amounts displayed in this pay slip are in <strong>PH</strong></em></p>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>

    <?php include "footer.php"; ?>

    <script>
        var full_name = '<?php echo $full_name; ?>';
        var slip_month = '<?php echo strtoupper(date_format($payslip_date, "M Y")); ?>';
        var cal_day = '<?php echo $cal_days; ?>';
        var pay_days = '<?php echo $pay_days; ?>';
        var net = '<?php echo $net_sal; ?>';

        var splittedNum = net.toString().split('.');
        var nonDecimal = splittedNum[0];
        var decimal = splittedNum[1];
        if (decimal == 00 || decimal == null || decimal == "") {
            var value = price_in_words(Number(nonDecimal));
        } else {
            var value = price_in_words(Number(nonDecimal)) + " and " + price_in_words(Number(decimal)) + " paise";
        }

        $(".pay_word").text(value + " Only");

        final_basic = hra = final_hra = final_stack = gross_sal = food_allw = final_food_allw = travel_allw = final_travel_allw = stack_inc = basic_calc = hra_calc = sa_calc = oa_calc = final_gross = total_earnings = final_pf_employer = final_pf_employee = final_esi_employer = final_esi_employee = total_deduction = in_hand = ctc_calc = 0;

        annual_final_basic = annual_final_stack = annual_gross_sal = annual_stack_inc = annual_food_allw = annual_travel_allw = annual_basic_calc = annual_hra_calc = annual_sa_calc = annual_oa_calc = annual_final_gross = annual_total_earnings = annual_final_pf_employer = annual_final_pf_employee = annual_final_esi_employer = annual_final_esi_employee = annual_total_deduction = annual_in_hand = annual_ctc_calc = 0;

        function addCommas(nStr) {
            var inr_amt = nStr.toLocaleString('en-IN', {
                maximumFractionDigits: 2,
                style: 'currency',
                currency: 'INR'
            });
            return inr_amt;
        }

        function price_in_words(price) {
            var sglDigit = ["Zero", "One", "Two", "Three", "Four", "Five", "Six", "Seven", "Eight", "Nine"],
                dblDigit = ["Ten", "Eleven", "Twelve", "Thirteen", "Fourteen", "Fifteen", "Sixteen", "Seventeen", "Eighteen", "Nineteen"],
                tensPlace = ["", "Ten", "Twenty", "Thirty", "Forty", "Fifty", "Sixty", "Seventy", "Eighty", "Ninety"],
                handle_tens = function(dgt, prevDgt) {
                    return 0 == dgt ? "" : " " + (1 == dgt ? dblDigit[prevDgt] : tensPlace[dgt])
                },
                handle_utlc = function(dgt, nxtDgt, denom) {
                    return (0 != dgt && 1 != nxtDgt ? " " + sglDigit[dgt] : "") + (0 != nxtDgt || dgt > 0 ? " " + denom : "")
                };

            var str = "",
                digitIdx = 0,
                digit = 0,
                nxtDigit = 0,
                words = [];
            if (price += "", isNaN(parseInt(price))) str = "";
            else if (parseInt(price) > 0 && price.length <= 10) {
                for (digitIdx = price.length - 1; digitIdx >= 0; digitIdx--) switch (digit = price[digitIdx] - 0, nxtDigit = digitIdx > 0 ? price[digitIdx - 1] - 0 : 0, price.length - digitIdx - 1) {
                    case 0:
                        words.push(handle_utlc(digit, nxtDigit, ""));
                        break;
                    case 1:
                        words.push(handle_tens(digit, price[digitIdx + 1]));
                        break;
                    case 2:
                        words.push(0 != digit ? " " + sglDigit[digit] + " Hundred" + (0 != price[digitIdx + 1] && 0 != price[digitIdx + 2] ? " and" : "") : "");
                        break;
                    case 3:
                        words.push(handle_utlc(digit, nxtDigit, "Thousand"));
                        break;
                    case 4:
                        words.push(handle_tens(digit, price[digitIdx + 1]));
                        break;
                    case 5:
                        words.push(handle_utlc(digit, nxtDigit, "Lakh"));
                        break;
                    case 6:
                        words.push(handle_tens(digit, price[digitIdx + 1]));
                        break;
                    case 7:
                        words.push(handle_utlc(digit, nxtDigit, "Crore"));
                        break;
                    case 8:
                        words.push(handle_tens(digit, price[digitIdx + 1]));
                        break;
                    case 9:
                        words.push(0 != digit ? " " + sglDigit[digit] + " Hundred" + (0 != price[digitIdx + 1] || 0 != price[digitIdx + 2] ? " and" : " Crore") : "")
                }
                str = words.reverse().join("")
            } else str = "";
            return str

        }

        var doc_name = full_name + "_" + slip_month + "_Salary_Slip.pdf";

        function generatePDF() {
            // Choose the element that our invoice is rendered in.
            const element = document.getElementById('convertPDF');
            // Choose the element and save the PDF for our user.
            html2pdf().set({
                html2canvas: {
                    scale: 4
                }
            }).from(element).save(doc_name);
        }
    </script>

    <script>
        var redir = '<?php echo $redirectPg ?>';
        if (redir == 1) {
            window.location.replace("error-404.php");
        }
    </script>

    <?php

    function inrFormat($num)
    {
        $num = preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $num);
        return $num;
    }

    ?>