<?php $page = "add_payslip"; ?>
<?php include "header.php";

$pay_month = $_POST['pay_month'];
$emp_id = $_POST['emp_id'];
$full_name = $_POST['full_name'];
$doj = $_POST['doj'];
$department = $_POST['department'];
$payment_mode = $_POST['payment_mode'];
$bank = $_POST['bank'];
$ifsc = $_POST['ifsc'];
$ac_no = $_POST['ac_no'];
$pan = $_POST['pan'];
$uan = $_POST['uan'];
$gross = $_POST['gross'];
$cal_days = $_POST['cal_days'];
$present_days = $_POST['present_days'];
$lv_adj = $_POST['lv_adj'];
$pay_days = $_POST['pay_days'];
$lop = $_POST['lop'];
$sandwich = $_POST['sandwich'];
$lv_bal = $_POST['lv_bal'];
$food_allw = $_POST['food_allw'];
$travel_allw = $_POST['travel_allw'];
$spl_allowance = $_POST['spl_allowance'];
$msa_check = $_POST['msa'];
$tsa_check = $_POST['tsa'];
$stack = $_POST['stack'];
$inc = $_POST['inc'];
$others = $_POST['others'];
$arrears = $_POST['arrears'];
$tds = $_POST['tds'];
$adv = $_POST['adv'];
$penalties = $_POST['penalties'];
$ref_bonus = $_POST['ref_bonus'];
$qua_incentive = $_POST['qua_incentive'];
$inc_install = $_POST['inc_install'];
$payslip_date = date_create($pay_month);
$ddoj = date_create($doj);


?>

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
                    <a href="./add_pay_slip.php" class="btn btn-ghost-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <line x1="12" y1="5" x2="12" y2="19"></line>
                            <line x1="5" y1="12" x2="19" y2="12"></line>
                        </svg>
                        Create Another Payslip
                    </a>
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
                            <img src="./static/GlobalSync.png" width="50%">
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
                            <?php if ($_SESSION["user_type"] == 2 && $_SESSION["country_type"] == 'In') { ?>
                                <td>
                                    <div class="text-muted">PAN</div>
                                    <p class="strong mb-1"><?php echo $pan; ?></p>
                                </td>
                            <?php } else { ?>
                                <td>
                                    <div class="text-muted">SSS No.</div>
                                    <p class="strong mb-1"><?php echo $pan; ?></p>
                                </td>
                            <?php } ?>
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
                            <?php if ($_SESSION["user_type"] == 2 && $_SESSION["country_type"] == 'In') { ?>
                                <td>
                                    <div class="text-muted">UAN No.</div>
                                    <p class="strong mb-1"><?php echo $uan; ?></p>
                                </td>
                            <?php } else { ?>
                                <td>
                                    <div class="text-muted">PHIC No.</div>
                                    <p class="strong mb-1"><?php echo $uan; ?></p>
                                </td>
                            <?php } ?>
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
                                        <p class="mb-0 text-end basic"></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p class="mb-0">HRA</p>
                                    </td>
                                    <td class="border_right">
                                        <p class="mb-0 text-end hra"></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p class="mb-0">Statutory Allowance</p>
                                    </td>
                                    <td class="border_right">
                                        <p class="mb-0 text-end sa"></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p class="mb-0">Other Allowance</p>
                                    </td>
                                    <td class="border_right">
                                        <p class="mb-0 text-end oa"></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p class="mb-0">Food Allowance*</p>
                                    </td>
                                    <td class="border_right">
                                        <p class="mb-0 text-end fa"></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p class="mb-0">Travel Allowance*</p>
                                    </td>
                                    <td class="border_right">
                                        <p class="mb-0 text-end ta"></p>
                                    </td>
                                </tr>
                                <tr class="spl_tr">
                                    <td>
                                        <p class="mb-0">Special Allowance</p>
                                    </td>
                                    <td class="border_right">
                                        <p class="mb-0 text-end spl_allw"></p>
                                    </td>
                                </tr>
                                <tr class="stack_tr">
                                    <td>
                                        <p class="mb-0">Stack Incentive**</p>
                                    </td>
                                    <td class="border_right">
                                        <p class="mb-0 text-end si"></p>
                                    </td>
                                </tr>
                                <tr class="inc_tr">
                                    <td>
                                        <p class="mb-0">Incentives</p>
                                    </td>
                                    <td class="border_right">
                                        <p class="mb-0 text-end inc"></p>
                                    </td>
                                </tr>
                                <tr class="refinc_tr">
                                    <td>
                                        <p class="mb-0">Incentive (Referral Bonus)</p>
                                    </td>
                                    <td class="border_right">
                                        <p class="mb-0 text-end ref_inc"></p>
                                    </td>
                                </tr>
                                <tr class="others_tr">
                                    <td>
                                        <p class="mb-0">Others</p>
                                    </td>
                                    <td class="border_right">
                                        <p class="mb-0 text-end other"></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p class="mb-0">Employer PF Share</p>
                                    </td>
                                    <td class="border_right">
                                        <p class="mb-0 text-end pfempr"></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p class="mb-0">Employer ESIC Share</p>
                                    </td>
                                    <td class="border_right">
                                        <p class="mb-0 text-end esiempr"></p>
                                    </td>
                                </tr>
                                <tr class="arrears_tr">
                                    <td>
                                        <p class="mb-0">Arrears</p>
                                    </td>
                                    <td class="border_right">
                                        <p class="mb-0 text-end arrear"></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p class="mb-0 strong">Total Earnings (A)</p>
                                    </td>
                                    <td class="border_right strong">
                                        <p class="mb-0 text-end tot_earn"></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="strong">
                                        <p class="mb-0">Net Salary Payable (A-B)</p>
                                    </td>
                                    <td class="border_right strong">
                                        <p class="mb-0 text-end net_pay"></p>
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
                                <tr>
                                    <td>
                                        <p class="mb-0">Employer PF Contribution</p>
                                    </td>
                                    <td>
                                        <p class="mb-0 text-end pfempr"></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p class="mb-0">Employer ESIC Contribution</p>
                                    </td>
                                    <td>
                                        <p class="mb-0 text-end esiempr"></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p class="mb-0">Employee PF Payable</p>
                                    </td>
                                    <td>
                                        <p class="mb-0 text-end pfemp"></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p class="mb-0">Employee ESIC Payable</p>
                                    </td>
                                    <td>
                                        <p class="mb-0 text-end esiemp"></p>
                                    </td>
                                </tr>
                                <tr class="tds_tr">
                                    <td>
                                        <p class="mb-0">TDS (Tax)</p>
                                    </td>
                                    <td>
                                        <p class="mb-0 text-end tds"></p>
                                    </td>
                                </tr>
                                <tr class="adv_trr">
                                    <td>
                                        <p class="mb-0">Advance</p>
                                    </td>
                                    <td>
                                        <p class="mb-0 text-end adv_data"></p>
                                    </td>
                                </tr>
                                <tr class="penalties_tr">
                                    <td>
                                        <p class="mb-0">Penalties</p>
                                    </td>
                                    <td>
                                        <p class="mb-0 text-end penalty"></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p class="mb-0">Meal Service Availed*</p>
                                    </td>
                                    <td>
                                        <p class="mb-0 text-end meal"></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p class="mb-0">Travel Service Availed*</p>
                                    </td>
                                    <td>
                                        <p class="mb-0 text-end travel"></p>
                                    </td>
                                </tr>
                                <tr class="sandwich_tr">
                                    <td>
                                        <p class="mb-0">Sandwich Leaves</p>
                                    </td>
                                    <td>
                                        <p class="mb-0 text-end sandwich"></p>
                                    </td>
                                </tr>
                                <tr class="nothers_tr">
                                    <td>
                                        <p class="mb-0">Others</p>
                                    </td>
                                    <td>
                                        <p class="mb-0 text-end nothers"></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p class="mb-0 strong">Total Deductions (B)</p>
                                    </td>
                                    <td>
                                        <p class="mb-0 text-end tolduc strong"></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <p class="mb-0"><em>*No Cash Reimbursement (Availed as Service)</em></p>
                                    </td>
                                </tr>
                                <tr class="con_tr">
                                    <td colspan="2">
                                        <p class="mb-0"><em>**Only applicable for SEC Position</em></p>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <p><strong>Note:</strong><em> All amounts displayed in this pay slip are in <strong>INR</strong></em></p>
                </div>
            </div>
        </div>
    </div>

    <?php include "footer.php"; ?>

    <script>
        var full_name = '<?php echo $full_name; ?>';
        var slip_month = '<?php echo strtoupper(date_format($payslip_date, "M Y")); ?>';
        var cal_day = '<?php echo $cal_days; ?>';
        var pay_days = '<?php echo $pay_days; ?>';
        var inc = '<?php echo $inc; ?>';
        var others = '<?php echo $others; ?>';
        var arrears = '<?php echo $arrears; ?>';
        var tds = '<?php echo $tds; ?>';
        var adv = '<?php echo $adv; ?>';
        var penalties = '<?php echo $penalties; ?>';
        var msa_check = '<?php echo $msa_check; ?>';
        var tsa_check = '<?php echo $tsa_check; ?>';
        var refl_bonus = '<?php echo $ref_bonus; ?>';
        var qua_inc = '<?php echo $qua_incentive; ?>';
        var ins_inc = '<?php echo $inc_install; ?>';
        var sandwch = '<?php echo $sandwich; ?>';

        var gross_sal = 0;
        var basic_calc = 0;
        var final_basic = 0;
        var final_hra = 0;
        var final_stack = 0;
        var hra = 0;
        var hra_calc = 0;
        var final_food_allw = 0;
        var final_travel_allw = 0;
        var msa = 0;
        var tsa = 0;
        var nother = 0;
        var final_inc = 0;

        var gross_sal = '<?php echo $gross; ?>';
        var stack_inc = '<?php echo $stack; ?>';
        var food_allw = '<?php echo $food_allw; ?>';
        var travel_allw = '<?php echo $travel_allw; ?>';
        var spl_allowance = '<?php echo $spl_allowance; ?>';

        var ratio = parseFloat(pay_days) / parseFloat(cal_day);

        if (gross_sal == 0 || gross_sal == null) {
            final_basic = 0;
            $(".basic").text(addCommas(final_basic));
        } else {
            basic_calc = gross_sal * 0.4;
            basic_calc <= 12000 ? final_basic = 12000 * ratio : final_basic = basic_calc * ratio;
            $(".basic").text(addCommas(final_basic));
        }

        hra_calc = final_basic * 1.5;
        if (hra_calc < (gross_sal * ratio)) {
            final_hra = final_basic * 0.5;
            $(".hra").text(addCommas(final_hra));
        } else {
            final_hra = (gross_sal * ratio) - final_basic;
            $(".hra").text(addCommas(final_hra));
        }

        var sa_calculation = (gross_sal * ratio) - final_basic - final_hra;

        if (sa_calculation > final_hra) {
            var sa_calc = final_basic * 0.5;
            $(".sa").text(addCommas(sa_calc));

        } else {
            var sa_calc = sa_calculation;
            $(".sa").text(addCommas(sa_calc));
        }

        var oa_calc = (gross_sal * ratio) - final_basic - final_hra - sa_calc;
        $(".oa").text(addCommas(oa_calc));

        var final_gross = final_basic + final_hra + sa_calc + oa_calc;
        $(".gs").text(addCommas(final_gross));

        if (food_allw == null || food_allw == "" || food_allw == 0) {
            $(".fa").text(addCommas(final_food_allw));
        } else {
            $(".food_allow").show();
            final_food_allw = parseFloat(food_allw) * ratio;
            $(".fa").text(addCommas(final_food_allw));
        }

        if (travel_allw == null || travel_allw == "" || travel_allw == 0) {
            $(".ta").text(addCommas(final_travel_allw));
        } else {
            $(".travel_allow").show();
            final_travel_allw = parseFloat(travel_allw) * ratio;
            $(".ta").text(addCommas(final_travel_allw));
        }

        if (stack_inc == null || stack_inc == "" || stack_inc == 0) {
            $(".stack_tr").hide();
            $(".con_tr").hide();
        } else {
            final_stack = parseFloat(stack_inc);
            $(".si").text(addCommas(final_stack));
        }

        if (refl_bonus == null || refl_bonus == "" || refl_bonus == 0) {
            $(".refinc_tr").hide();
        } else {
            $(".ref_inc").text(addCommas(parseFloat(refl_bonus)));
        }

        final_inc = parseFloat(inc) + parseFloat(qua_inc) + parseFloat(ins_inc);
        if (final_inc == null || final_inc == "" || final_inc == 0) {
            $(".inc_tr").hide();
        } else {
            $(".inc").text(addCommas(parseFloat(final_inc)));
        }

        if (others == null || others == "" || others == 0) {
            $(".others_tr").hide();
            $(".nothers_tr").hide();
        } else if (others > 0) {
            $(".other").text(addCommas(parseFloat(others)));
            $(".nothers_tr").hide();
        } else {
            rw_other = others.replace(/-/g, "");
            nother = parseFloat(rw_other);
            $(".nothers").text(addCommas(parseFloat(nother)));
            $(".others_tr").hide();
        }

        if (arrears == null || arrears == "" || arrears == 0) {
            $(".arrears_tr").hide();
        } else {
            $(".arrear").text(addCommas(parseFloat(arrears)));
        }

        if (spl_allowance == null || spl_allowance == "" || spl_allowance == 0) {
            $(".spl_tr").hide();
        } else {
            $(".spl_allw").text(addCommas(parseFloat(spl_allowance)));
        }

        if (tds == null || tds == "" || tds == 0) {
            $(".tds_tr").hide();
        } else {
            $(".tds").text(addCommas(parseFloat(tds)));
        }

        if (adv == null || adv == "" || adv == 0) {
            $(".adv_trr").hide();
        } else {
            $(".adv_data").text(addCommas(parseFloat(adv)));
        }

        if (penalties == null || penalties == "" || penalties == 0) {
            $(".penalties_tr").hide();
        } else {
            $(".penalty").text(addCommas(parseFloat(penalties)));
        }

        if (sandwch == null || sandwch == "" || sandwch == 0) {
            $(".sandwich_tr").hide();
        } else {
            $(".sandwich").text(addCommas(parseFloat(sandwch)));
        }

        if (ratio == 1) {
            var pf_calc = (gross_sal * ratio) - final_hra;
            if (pf_calc >= 15000) {
                var final_pf_employer = (15000 * 0.13) * ratio;
                var final_pf_employee = (15000 * 0.12) * ratio;
            } else {
                var final_pf_employer = (pf_calc * 0.13) * ratio;
                var final_pf_employee = (pf_calc * 0.12) * ratio;
            }
        } else if (((ratio < 1) && ((gross_sal * ratio) < 15000)) || ((ratio < 1) && ((gross_sal * ratio) >= 15000))) {
            var pf_calc = (gross_sal * ratio) - final_hra;
            if (pf_calc >= 15000) {
                var final_pf_employer = 15000 * 0.13;
                var final_pf_employee = 15000 * 0.12;
            } else {
                var final_pf_employer = pf_calc * 0.13;
                var final_pf_employee = pf_calc * 0.12;
            }
        } else {
            var pf_calc = gross_sal - (final_hra * 2);
            if (pf_calc >= 15000) {
                var final_pf_employer = (15000 * 0.13) * ratio;
                var final_pf_employee = (15000 * 0.12) * ratio;
            } else {
                pf_calc = final_basic;
                var final_pf_employer = pf_calc * 0.13;
                var final_pf_employee = pf_calc * 0.12;
            }
        }

        // var pf_calc = gross_sal - final_hra;
        // if(pf_calc >= 15000) {
        //     var final_pf_employer = (15000 * 0.13) * ratio;
        //     var final_pf_employee = (15000 * 0.12) * ratio;
        // } else {
        //     var final_pf_employer = (pf_calc * 0.13) * ratio;
        //     var final_pf_employee = (pf_calc * 0.12) * ratio;
        // }

        $(".pfempr").text(addCommas(final_pf_employer));
        $(".pfemp").text(addCommas(final_pf_employee));

        if (gross_sal >= 21001) {
            var final_esi_employer = 0;
            var final_esi_employee = 0;
        } else {
            var final_esi_employer = final_gross * 0.0325;
            var final_esi_employee = final_gross * 0.0075;
        }

        $(".esiempr").text(addCommas(final_esi_employer));
        $(".esiemp").text(addCommas(final_esi_employee));

        msa_check == 1 ? msa = final_food_allw : msa = 0;
        $(".meal").text(addCommas(parseFloat(msa)));

        tsa_check == 1 ? tsa = final_travel_allw : tsa = 0;
        $(".travel").text(addCommas(parseFloat(tsa)));

        var ctc_calc = final_gross + final_stack + final_pf_employer + final_esi_employer + final_food_allw + final_travel_allw + parseFloat(others) + parseFloat(arrears) + parseFloat(spl_allowance) + parseFloat(refl_bonus) + final_inc;
        $(".tot_earn").text(addCommas(ctc_calc));

        var total_deduction = final_pf_employer + final_pf_employee + final_esi_employer + final_esi_employee + parseFloat(tds) + parseFloat(adv) + parseFloat(penalties) + parseFloat(msa) + parseFloat(tsa) + parseFloat(nother) + parseFloat(sandwch);
        $(".tolduc").text(addCommas(total_deduction));

        var net = ctc_calc.toFixed(2) - total_deduction.toFixed(2);
        $(".net_pay").text(addCommas(net));
        net = net.toFixed(2);

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