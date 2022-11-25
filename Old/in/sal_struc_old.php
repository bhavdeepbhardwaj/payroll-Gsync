<?php $page = "sal_struc"; ?>
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
      <div class="row g-2 align-items-center d-print-none">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <form action="#" method="post">
                <div class="row g-2 align-items-center">
                  <div class="col-2">
                    <label class="form-label required">Full Name</label>
                    <input type="text" class="form-control" name="full_name" id="full_name" autocomplete="off" required/>
                  </div>
                  <div class="col-2">
                    <label class="form-label required">Designation</label>
                    <input type="text" class="form-control" name="desg" id="desg" autocomplete="off" required/>
                  </div>
                  <div class="col-2">
                    <label class="form-label required">Gross Salary</label>
                    <input type="text" class="form-control" name="gross_sal" id="gross_salary" autocomplete="off" required/>
                  </div>
                  <div class="col-2">
                    <label class="form-label required">Food Allowance</label>
                    <input type="text" class="form-control" id="food_allowance" value="2200" autocomplete="off" required/>
                  </div>
                  <div class="col-2">
                    <label class="form-label required">Travel Allowance</label>
                    <input type="text" class="form-control" id="travel_allowance" value="2200" autocomplete="off" required/>
                  </div>
                  <div class="col-2">
                    <label class="form-label required">Stack Incentives</label>
                    <input type="text" class="form-control" id="stack_incentives" autocomplete="off" required/>
                  </div>
                </div>
                <div class="row g-2">
                  <div class="mt-4 col-12 text-center">
                    <a href="#sal_struct" class="btn btn-primary" id="gen_sal">Generate Salary Structure</a>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container-xl">
    <div class="page-header d-print-none">
      <div class="row g-2 align-items-center">
        <div class="col-6">
          <h2 class="page-title">
            Enter Details
          </h2>
        </div>
        <div class="col-6 text-end">
          <button type="button" class="btn btn-success" onclick="javascript:window.print();">
              <!-- Download SVG icon from http://tabler-icons.io/i/printer -->
              <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M17 17h2a2 2 0 0 0 2 -2v-4a2 2 0 0 0 -2 -2h-14a2 2 0 0 0 -2 2v4a2 2 0 0 0 2 2h2" /><path d="M17 9v-4a2 2 0 0 0 -2 -2h-6a2 2 0 0 0 -2 2v4" /><rect x="7" y="13" width="10" height="8" rx="2" /></svg>
              Download Salary Structure
          </button>
        </div>
      </div>
    </div>
  </div>
    <div id="sal_struct" class="container-xl mt-3">
      <div class="row g-2 align-items-center">
        <div class="col">
        <div class="card">
          <div class="card-body">
          <div class="row">
                <div class="col-6">
                <p class="h2">GLOBALSYNC PRIVATE LIMITED</p>
                <address>
                    Unit-2, Ground Floor,<br>
                    Okaya Center, Sector-62,<br>
                    Noida, UP, India 201309<br>
                </address>
                <p class="candidate_name h2 mb-0"><strong></strong></p>
                <p class="designation fs-3"><em></em></p>
                </div>
                <div class="col-6 text-end">
                <img src="./static/GlobalSync.png" width="50%">
                </div>
                <hr style="margin: 0;">
            </div>
            <div class="row justify-content-center justify-content-around">
              <div class="col-6">
                <div class="table-responsive">
                  <table
                    class="table table-vcenter">
                    <thead>
                      <tr>
                        <th>Earnings</th>
                        <th style="text-align:right;">Monthly</th>
                        <th style="text-align:right;">Annually</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td >Basic</td>
                        <td class="text-muted basic" style="text-align:right;"></td>
                        <td class="text-muted annual_basic" style="text-align:right;"></td>
                      </tr>
                      <tr>
                        <td >HRA</td>
                        <td class="text-right text-muted hra" style="text-align:right;"></td>
                        <td class="text-right text-muted annual_hra" style="text-align:right;"></td>
                      </tr>
                      <tr>
                        <td >Statutory Allowance</td>
                        <td class="text-muted sa" style="text-align:right;"></td>
                        <td class="text-muted annual_sa" style="text-align:right;"></td>
                      </tr>
                      <tr>
                        <td >Other Allowance</td>
                        <td class="text-muted oa" style="text-align:right;"></td>
                        <td class="text-muted annual_oa" style="text-align:right;"></td>
                      </tr>
                      <tr>
                        <td >Gross Salary</td>
                        <td class="text-muted gs" style="text-align:right;"></td>
                        <td class="text-muted annual_gs" style="text-align:right;"></td>
                      </tr>
                      <!-- <tr>
                        <td >Food Alowance</td>
                        <td class="text-muted fa" style="text-align:right;">
                          
                        </td>
                      </tr>
                      <tr>
                        <td >Travel Allowance</td>
                        <td class="text-muted ta" style="text-align:right;">
                          
                        </td>
                      </tr> -->
                      <tr class="bg-dark-lt">
                        <td colspan="3" class="text-center">Others</td>
                      </tr>
                      <tr class="food_allow">
                        <td >Food Allowance*</td>
                        <td class="text-muted fa" style="text-align:right;"></td>
                        <td class="text-muted annual_fa" style="text-align:right;"></td>
                      </tr>
                      <tr class="travel_allow">
                        <td >Travel Allowance*</td>
                        <td class="text-muted ta" style="text-align:right;"></td>
                        <td class="text-muted annual_ta" style="text-align:right;"></td>
                      </tr>
                      <tr class="stack_in">
                        <td >Stack Incentives**</td>
                        <td class="text-muted si" style="text-align:right;"></td>
                        <td class="text-muted annual_si" style="text-align:right;"></td>
                      </tr>
                      <!-- <tr>
                        <td >Earnings</td>
                        <td class="text-muted earn" style="text-align:right;"></td>
                        <td class="text-muted annual_earn" style="text-align:right;"></td>
                      </tr> -->
                    </tbody>
                  </table>
                </div>
              </div>
              <div class="col-6">
                <div class="table-responsive">
                  <table
                    class="table table-vcenter">
                    <thead>
                      <tr>
                        <th>Deductions</th>
                        <th style="text-align:right;">Monthly</th>
                        <th style="text-align:right;">Annually</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td >PF - Employer</td>
                        <td class="text-muted pfempr" style="text-align:right;"></td>
                        <td class="text-muted annual_pfempr" style="text-align:right;"></td>
                      </tr>
                      <tr>
                        <td >PF - Employee</td>
                        <td class="text-muted pfemp" style="text-align:right;"></td>
                        <td class="text-muted annual_pfemp" style="text-align:right;"></td>
                      </tr>
                      <tr>
                        <td >ESI - Employer</td>
                        <td class="text-muted esiempr" style="text-align:right;"></td>
                        <td class="text-muted annual_esiempr" style="text-align:right;"></td>
                      </tr>
                      <tr>
                        <td >ESI - Employee</td>
                        <td class="text-muted esiemp" style="text-align:right;"></td>
                        <td class="text-muted annual_esiemp" style="text-align:right;"></td>
                      </tr>
                      <tr>
                        <td >Total Deductions</td>
                        <td class="text-muted tolduc" style="text-align:right;"></td>
                        <td class="text-muted annual_tolduc" style="text-align:right;"></td>
                      </tr>
                      <tr>
                        <td >In Hand</td>
                        <td class="text-muted inhand" style="text-align:right;"></td>
                        <td class="text-muted annual_inhand" style="text-align:right;"></td>
                      </tr>
                      <tr>
                        <td >CTC</td>
                        <td class="text-muted ctc" style="text-align:right;"></td>
                        <td class="text-muted annual_ctc" style="text-align:right;"></td>
                      </tr>
                      <tr>
                        <td colspan="3"><em>*No Cash Reimbursement</em></td>
                      </tr>
                      <tr class="stack_info">
                        <td colspan="3"><em>**Only applicable for SEC Position</em></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <!-- <div class="row g-5">
              <div class="col-12">
                <p></p>
                <p><em>*No Cash Reimbursement</em></p>
                <p><em>**Only applicable for SEC Position</em></p>
              </div>
            </div> -->
          </div>
        </div>
        </div>
      </div>
    </div>
  <?php include "footer.php"; ?>

  <script src="./dist/js/custom.js"></script>