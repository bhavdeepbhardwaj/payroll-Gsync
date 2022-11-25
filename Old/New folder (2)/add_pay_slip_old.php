<?php $page = "add_payslip"; ?>
<?php include "header.php"; ?>

<div class="page-wrapper">
  <div class="container-xl">
    <!-- Page title -->
    <div class="page-header d-print-none">
      <div class="row g-2 align-items-center">
        <div class="col">
          <h2 class="page-title">
            Enter Details
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
                <div class="row g-2 align-items-center">
                    <div class="col-2">
                        <label class="form-label required">Employee Id</label>
                        <input type="text" class="form-control" name="emp_id" autocomplete="off" required/>
                    </div>
                    <div class="col-2">
                        <label class="form-label required">Full Name</label>
                        <input type="text" class="form-control" name="full_name" autocomplete="off" required/>
                    </div>
                    <div class="col-2">
                        <label class="form-label">Date of Join</label>
                        <input type="date" class="form-control" name="doj" autocomplete="off"/>
                    </div>
                    <div class="col-2">
                        <label class="form-label">Designation</label>
                        <input type="text" class="form-control" name="designation" autocomplete="off"/>
                    </div>
                    <div class="col-2">
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
                    <div class="col-2">
                        <label class="form-label">Bank</label>
                        <input type="text" class="form-control" name="bank" autocomplete="off"/>
                    </div>
                </div>
                <div class="row g-2 align-items-center mt-3">
                    <div class="col-2">
                        <label class="form-label">IFSC</label>
                        <input type="text" class="form-control" name="ifsc" autocomplete="off"/>
                    </div>
                    <div class="col-2">
                        <label class="form-label">Account No.</label>
                        <input type="text" class="form-control" name="ac_no" autocomplete="off"/>
                    </div>
                    <div class="col-2">
                        <label class="form-label">PAN No.</label>
                        <input type="text" class="form-control" name="pan" autocomplete="off"/>
                    </div>
                    <div class="col-2">
                        <label class="form-label">UAN NO.</label>
                        <input type="text" class="form-control" name="uan" autocomplete="off"/>
                    </div>
                    <div class="col-2">
                        <label class="form-label required">Payable Days</label>
                        <input type="text" class="form-control" name="pay_days" autocomplete="off" required/>
                    </div>
                    <div class="col-2">
                        <label class="form-label required">Total Working Days</label>
                        <input type="text" class="form-control" name="work_days" autocomplete="off" required/>
                    </div>
                </div>
                <div class="row g-2 align-items-center mt-3">
                    <div class="col-2">
                        <label class="form-label">Loss of Pay</label>
                        <input type="text" class="form-control" name="lop" autocomplete="off"/>
                    </div>
                    <div class="col-2">
                        <label class="form-label">Leaves Adjusted</label>
                        <input type="text" class="form-control" name="lv_adj" value="0" autocomplete="off"/>
                    </div>
                    <div class="col-2">
                        <label class="form-label">Leaves Balance</label>
                        <input type="text" class="form-control" name="lv_bal" value="0" autocomplete="off"/>
                    </div>
                    <div class="col-2">
                        <label class="form-label required">Food Allowance</label>
                        <input type="text" class="form-control" name="food_allw" value="2200" autocomplete="off" required/>
                    </div>
                    <div class="col-2">
                        <label class="form-label required">Travel Allowance</label>
                        <input type="text" class="form-control" name="travel_allw" value="2200" autocomplete="off" required/>
                    </div>
                    <div class="col-2">
                        <label class="form-label required">Stack Incentive</label>
                        <input type="text" class="form-control" name="stack" value="0" autocomplete="off" required/>
                    </div>
                </div>
                <div class="row g-2 align-items-center mt-3">
                    <div class="col-2">
                        <label class="form-label required">Incentive</label>
                        <input type="text" class="form-control" name="inc" value="0" autocomplete="off" required/>
                    </div>
                    <div class="col-2">
                        <label class="form-label required">Others</label>
                        <input type="text" class="form-control" name="others" value="0" autocomplete="off" required/>
                    </div>
                    <div class="col-2">
                        <label class="form-label required">Arrears</label>
                        <input type="text" class="form-control" name="arrears" value="0" autocomplete="off" required/>
                    </div>
                    <div class="col-2">
                        <label class="form-label required">TDS (Tax)</label>
                        <input type="text" class="form-control" name="tds" value="0" autocomplete="off" required/>
                    </div>
                    <div class="col-2">
                        <label class="form-label required">Advance</label>
                        <input type="text" class="form-control" name="adv" value="0" autocomplete="off" required/>
                    </div>
                    <div class="col-2">
                        <label class="form-label required">Penalties</label>
                        <input type="text" class="form-control" name="penalties" value="0" autocomplete="off" required/>
                    </div>
                </div>
                <div class="row g-2 align-items-center justify-content-center mt-3">
                    <div class="col-3">
                        <label class="form-check">
                            <input type="hidden" value="0" name="msa"/>
                            <input type="checkbox" class="form-check-input" value="1" name="msa" checked/>
                            <span class="form-check-label">Meal Service Availed</span>
                        </label>
                    </div>
                    <div class="col-3">
                        <label class="form-check">
                            <input type="hidden" value="0" name="tsa"/>
                            <input type="checkbox" class="form-check-input" value="1" name="tsa" checked/>
                            <span class="form-check-label">Travel Service Availed</span>
                        </label>
                    </div>
                    <div class="col-3">
                        <label class="form-label required">Gross Salary</label>
                        <input type="text" class="form-control" name="gross" autocomplete="off" required/>
                    </div>
                    <div class="mt-4 col-3 text-center">
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