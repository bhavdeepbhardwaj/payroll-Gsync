<?php $page = "add_payslip"; ?>
<?php include "header.php"; ?>

<?php

if($_SESSION["user_type"] == 3){
    $redirectPg = 1;
  } else {
    $redirectPg = 0;
  }

?>

<div class="page-wrapper">
  <div class="container-xl">
    <!-- Page title -->
    <div class="page-header d-print-none">
      <div class="row g-2 align-items-center">
        <div class="col">
          <h2 class="page-title">
            Enter Details to Generate Pay Slip
          </h2>
        </div>
      </div>
    </div>
  </div>
  <div class="page-body">
    <div class="container-xl">
      <div class="row g-2 align-items-center">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <form action="pay_slip.php" method="post">
              <fieldset class="form-fieldset">
                <legend>Employee Details</legend>
                    <div class="row g-2 align-items-center">
                        <div class="col-md-2">
                            <label class="form-label required">Pay Slip Month</label>
                            <input type="month" class="form-control" name="pay_month" id="pay_slip_month" value="<?php echo date("Y-m", strtotime("-1 month")); ?>" onchange="monthHandler(event);" autocomplete="off" required/>
                        </div>
                        <div class="col-md-2">
                            <label class="form-label required">Employee Id</label>
                            <input type="text" class="form-control" name="emp_id" autocomplete="off" required/>
                        </div>
                        <div class="col-md-2">
                            <label class="form-label required">Full Name</label>
                            <input type="text" class="form-control" name="full_name" autocomplete="off" required/>
                        </div>
                        <div class="col-md-2">
                            <label class="form-label">Date of Join</label>
                            <input type="date" class="form-control" name="doj" autocomplete="off"/>
                        </div>
                        <div class="col-md-2">
                            <label class="form-label">Department</label>
                            <input type="text" class="form-control" name="department" autocomplete="off"/>
                        </div>
                        <div class="col-md-2">
                            <div class="form-label">
                                Payment Mode
                            </div>
                            <select class="form-select" name="payment_mode">
                                <option value="Bank Transfer">Bank Transfer</option>
                                <option value="Wire Transfer">Wire Transfer</option>
                                <option value="Cash">Cash</option>
                                <option value="Cheque">Cheque</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <label class="form-label">Bank</label>
                            <input type="text" class="form-control" name="bank" autocomplete="off"/>
                        </div>
                        <div class="col-md-2">
                            <label class="form-label">IFSC</label>
                            <input type="text" class="form-control" name="ifsc" autocomplete="off"/>
                        </div>
                        <div class="col-md-2">
                            <label class="form-label">Account No.</label>
                            <input type="text" class="form-control" name="ac_no" autocomplete="off"/>
                        </div>
                        <div class="col-md-2">
                            <label class="form-label">PAN No.</label>
                            <input type="text" class="form-control" name="pan" autocomplete="off"/>
                        </div>
                        <div class="col-md-2">
                            <label class="form-label">UAN NO.</label>
                            <input type="text" class="form-control" name="uan" autocomplete="off"/>
                        </div>
                        <div class="col-md-2">
                            <label class="form-label required">Gross Salary</label>
                            <input type="text" class="form-control" name="gross" autocomplete="off" required/>
                        </div>
                    </div>
                </fieldset>
                <fieldset class="form-fieldset">
                    <legend>Leaves & Pay Days</legend>
                    <div class="row g-2 align-items-center mt-3">
                        <div class="col-md-2">
                            <label class="form-label required">Calendar Days</label>
                            <input type="text" class="form-control" name="cal_days" id="calendar_days" autocomplete="off" required/>
                        </div>
                        <div class="col-md-2">
                            <label class="form-label required">Present Days</label>
                            <input type="text" class="form-control" name="present_days" id="pst_days" onchange="update_payable_pst();" autocomplete="off" required/>
                        </div>
                        <div class="col-md-2">
                            <label class="form-label">Leaves Adjusted</label>
                            <input type="text" class="form-control" name="lv_adj" value="0" id="leave_adj" onchange="update_payable_lvad();" autocomplete="off"/>
                        </div>
                        <div class="col-md-2">
                            <label class="form-label required">Total Payable Days</label>
                            <input type="text" class="form-control" name="pay_days" value="0" id="payable_day" autocomplete="off" required/>
                        </div>
                        <div class="col-md-2">
                            <label class="form-label">Loss of Pay</label>
                            <input type="text" class="form-control" name="lop" id="lossofpay" autocomplete="off"/>
                        </div>
                        <div class="col-md-2">
                            <label class="form-label">Sandwich Leaves Deduction</label>
                            <input type="text" class="form-control" name="sandwich" id="sndwch_lv" value="0" autocomplete="off" />
                        </div>
                        <div class="col-md-2">
                            <label class="form-label">Leaves Balance</label>
                            <input type="text" class="form-control" name="lv_bal" id="leave_bal" value="0" autocomplete="off"/>
                        </div>
                    </div>
                </fieldset>
                <fieldset class="form-fieldset">
                    <legend>Allowances</legend>
                    <div class="row g-2 align-items-center mt-3">
                        <div class="col-md-2">
                            <label class="form-label required">Food Allowance</label>
                            <input type="text" class="form-control" name="food_allw" value="2200" autocomplete="off" required/>
                        </div>
                        <div class="col-md-2">
                            <label class="form-label required">Travel Allowance</label>
                            <input type="text" class="form-control" name="travel_allw" value="2200" autocomplete="off" required/>
                        </div>
                        <div class="col-md-2">
                            <label class="form-label">Special Allowances</label>
                            <input type="text" class="form-control" name="spl_allowance" value="0" autocomplete="off" />
                        </div>
                        <div class="col-md-2">
                            <label class="form-check" style="margin-bottom: 0; margin-top: 1rem;">
                                <input type="hidden" value="0" name="msa"/>
                                <input type="checkbox" class="form-check-input" value="1" name="msa" checked/>
                                <span class="form-check-label">Meal Service Availed</span>
                            </label>
                        </div>
                        <div class="col-md-2">
                            <label class="form-check" style="margin-bottom: 0; margin-top: 1rem;">
                                <input type="hidden" value="0" name="tsa"/>
                                <input type="checkbox" class="form-check-input" value="1" name="tsa" checked/>
                                <span class="form-check-label">Travel Service Availed</span>
                            </label>
                        </div>
                    </div>
                </fieldset>
                <fieldset class="form-fieldset">
                    <legend>Incentives & Deductions</legend>
                    <div class="row g-2 align-items-center mt-3">
                        <div class="col-md-2">
                            <label class="form-label required">Stack Incentive</label>
                            <input type="text" class="form-control" name="stack" value="0" autocomplete="off" required/>
                        </div>
                        <div class="col-md-2">
                            <label class="form-label required">Incentive</label>
                            <input type="text" class="form-control" name="inc" value="0" autocomplete="off" required/>
                        </div>
                        <div class="col-md-2">
                            <label class="form-label required">Others <span class="form-help" data-bs-toggle="popover" data-bs-placement="top" data-bs-html="true" data-bs-content="<p>Others is adjustments in positive amount or in negative amount. Positive and Negative amount will add in earnings and deductions respectively. E.g 2000 (+ve amt), -2000 (-ve amt). </p>">?</span></label>
                            <input type="text" class="form-control" name="others" value="0" autocomplete="off" required/>
                        </div>
                        <div class="col-md-2">
                            <label class="form-label required">Arrears</label>
                            <input type="text" class="form-control" name="arrears" value="0" autocomplete="off" required/>
                        </div>
                        <div class="col-md-2">
                            <label class="form-label required">TDS (Tax)</label>
                            <input type="text" class="form-control" name="tds" value="0" autocomplete="off" required/>
                        </div>
                        <div class="col-md-2">
                            <label class="form-label required">Advance</label>
                            <input type="text" class="form-control" name="adv" value="0" autocomplete="off" required/>
                        </div>
                        <div class="col-md-2">
                            <label class="form-label required">Penalties</label>
                            <input type="text" class="form-control" name="penalties" value="0" autocomplete="off" required/>
                        </div>
                        <div class="col-md-2">
                            <label class="form-label">Incentive (Referral Bonus)</label>
                            <input type="text" class="form-control" name="ref_bonus" value="0" autocomplete="off" />
                        </div>
                        <div class="col-md-2">
                            <label class="form-label">Qualified Appoinments</label>
                            <input type="text" class="form-control" name="percent_appt" value="0" id="qua_appointments" autocomplete="off" onchange="calc_quaincentive();"/>
                        </div>
                        <div class="col-md-2">
                            <label class="form-label">Qualified Incentive</label>
                            <input type="text" class="form-control" name="qua_incentive" value="0" id="qua_incentive" autocomplete="off" />
                        </div>
                        
                        <div class="col-md-2">
                            <label class="form-label">KW Installed</label>
                            <input type="text" class="form-control" name="kw_install" id="kw_ins" value="0" autocomplete="off" onchange="calc_installinc();"/>
                        </div>
                        <div class="col-md-2">
                            <label class="form-label">KW Installed Rate</label>
                            <input type="text" class="form-control" name="kw_install_rate" value="0" id="kw_ins_rate" autocomplete="off" onchange="calc_installinc();"/>
                        </div>
                        <div class="col-md-2">
                            <label class="form-label">Installed Incentive</label>
                            <input type="text" class="form-control" name="inc_install" id="inc_installed" value="0" autocomplete="off" />
                        </div>

                        <div class="col-md-2">
                            <label class="form-label">OTP Installed</label>
                            <input type="text" class="form-control" name="otp_install" id="otp_ins" value="0" autocomplete="off" onchange="calc_installinc_otp();"/>
                        </div>
                        <div class="col-md-2">
                            <label class="form-label">OTP Installed Rate</label>
                            <input type="text" class="form-control" name="otp_install_rate" value="0" id="otp_ins_rate" autocomplete="off" onchange="calc_installinc_otp();"/>
                        </div>
                        <div class="col-md-2">
                            <label class="form-label">OTP Installed Incentive</label>
                            <input type="text" class="form-control" name="otp_inc_install" id="otp_inc_installed" value="0" autocomplete="off" />
                        </div>
                    </div>
                </fieldset>
                <div class="row g-2 justify-content-center align-items-center mt-3">
                    <div class="col-md-4 text-center">
                        <button type="submit" class="btn btn-primary w-100">Generate Pay Slip</button>
                    </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

<?php include "footer.php"; ?>

<script>

    $(document).ready(function() {
        const get_month = $("#pay_slip_month").val();
        const init_month = new Date(get_month);
        const date_year = init_month.getFullYear();
        const date_month = init_month.getMonth() + 1; // 👈️ months are 0-based
        const month_days = getDaysInMonth(date_year, date_month);
        $("#calendar_days").val(month_days);
    });

    function monthHandler(e){
        const date = new Date(e.target.value);
        const currentYear = date.getFullYear();
        const currentMonth = date.getMonth() + 1; // 👈️ months are 0-based
        const daysInMonth = getDaysInMonth(currentYear, currentMonth);
        $("#calendar_days").val(daysInMonth);
    }

    function getDaysInMonth(year, month) {
    return new Date(year, month, 0).getDate();
    }

    function update_payable_pst() {
        var total_payable = parseFloat($("#pst_days").val()) + parseFloat($("#leave_adj").val());
        $("#payable_day").val(total_payable);
        update_lop();
    }

    function update_payable_lvad() {
        var total_payableone = parseFloat($("#pst_days").val()) + parseFloat($("#leave_adj").val());
        $("#payable_day").val(total_payableone);
        update_lop();
    }

    function update_lop() {
        var total_lop = parseFloat($("#calendar_days").val()) - parseFloat($("#payable_day").val());
        $("#lossofpay").val(total_lop);
    }

    function calc_quaincentive() {
        var qua_app = $("#qua_appointments").val();

        if(qua_app >= 5) {
            var total_qua_inc = qua_app * 300;
            $("#qua_incentive").val(total_qua_inc);
        } else {
            $("#qua_incentive").val(0);
        }
    }

    function calc_installinc() {
        if($("#kw_ins").val() && $("#kw_ins_rate").val() != null){
        var kw_inc = parseFloat($("#kw_ins").val()) * parseFloat($("#kw_ins_rate").val());
        $("#inc_installed").val(kw_inc);
        }
    }

    function calc_installinc_otp() {
        if($("#otp_ins").val() && $("#otp_ins_rate").val() != null){
        var otp_inc = parseFloat($("#otp_ins").val()) * parseFloat($("#otp_ins_rate").val());
        $("#otp_inc_installed").val(otp_inc);
        }
    }
</script>

<script>
  var redir = '<?php echo $redirectPg ?>';
  if(redir == 1) {
    window.location.replace("error-404.php");
  }
</script>