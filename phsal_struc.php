<?php $page = "phsal_struc"; ?>
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
            Enter Details
          </h2>
        </div>
      </div>
    </div>
  </div>
  <div class="page-body">
    <div class="container-xl mb-3">
      <div class="row g-2 align-items-center d-print-none">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <form action="#" method="post">
                <div class="row g-2 align-items-center">
                  <div class="col-md-2">
                    <label class="form-label required">Full Name</label>
                    <input type="text" class="form-control" name="full_name" id="full_name" autocomplete="off" required/>
                  </div>
                  <div class="col-md-2">
                    <label class="form-label required">Designation</label>
                    <input type="text" class="form-control" name="desg" id="desg" autocomplete="off" required/>
                  </div>
                  <div class="col-md-2">
                    <label class="form-label required">Gross Salary</label>
                    <input type="text" class="form-control" name="gross_sal" id="gross_salary" autocomplete="off" required/>
                  </div>
                  <div class="col-md-2">
                    <label class="form-label required">Food Allowance</label>
                    <input type="text" class="form-control" id="food_allowance" value="2200" autocomplete="off" required/>
                  </div>
                  <div class="col-md-2">
                    <label class="form-label required">Travel Allowance</label>
                    <input type="text" class="form-control" id="travel_allowance" value="2200" autocomplete="off" required/>
                  </div>
                  <div class="col-md-2">
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
    <div id="sal_struct" class="container-xl">
      <div class="row g-2 align-items-center d-print-none">
        <div class="col">
        <div class="card card-lg">
          <div class="card-body mt-0" id="converttoPDF">
          <div class="row">
                <div class="col-md-6">
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
                <img src="./static/logo.png" width="50%">
                </div>
                <hr style="margin: 0;">
            </div>
            <div class="row justify-content-center justify-content-around">
              <div class="col-md-6">
                <div class="table-responsive">
                  <table
                    class="table table-vcenter">
                    <thead>
                      <tr>
                        <th style="font-size: .775rem;">Earnings</th>
                        <th style="text-align:right; font-size: .775rem;">Monthly</th>
                        <th style="text-align:right; font-size: .775rem;">Annually</th>
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
                      <tr>
                        <td >13th Month Pay</td>
                        <td class="text-muted gs" style="text-align:right;"></td>
                        <td class="text-muted annual_gs" style="text-align:right;"></td>
                      </tr>
                      <tr>
                        <td >HMO PhilCare - Employee</td>
                        <td class="text-muted gs" style="text-align:right;"></td>
                        <td class="text-muted annual_gs" style="text-align:right;"></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
              <div class="col-md-6">
                <div class="table-responsive">
                  <table
                    class="table table-vcenter">
                    <thead>
                      <tr>
                        <th style="font-size: .775rem;">Contributions</th>
                        <th style="text-align:right; font-size: .775rem;">Monthly</th>
                        <th style="text-align:right; font-size: .775rem;">Annually</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td >SSS - Employer</td>
                        <td class="text-muted pfempr" style="text-align:right;"></td>
                        <td class="text-muted annual_pfempr" style="text-align:right;"></td>
                      </tr>
                      <tr>
                        <td >SSS - Employee</td>
                        <td class="text-muted pfemp" style="text-align:right;"></td>
                        <td class="text-muted annual_pfemp" style="text-align:right;"></td>
                      </tr>
                      <tr>
                        <td >PHIC - Employer</td>
                        <td class="text-muted esiempr" style="text-align:right;"></td>
                        <td class="text-muted annual_esiempr" style="text-align:right;"></td>
                      </tr>
                      <tr>
                        <td >PHIC - Employee</td>
                        <td class="text-muted esiemp" style="text-align:right;"></td>
                        <td class="text-muted annual_esiemp" style="text-align:right;"></td>
                      </tr>
                      <tr>
                        <td >HDMF - Employer</td>
                        <td class="text-muted esiempr" style="text-align:right;"></td>
                        <td class="text-muted annual_esiempr" style="text-align:right;"></td>
                      </tr>
                      <tr>
                        <td >HDMF - Employee</td>
                        <td class="text-muted esiemp" style="text-align:right;"></td>
                        <td class="text-muted annual_esiemp" style="text-align:right;"></td>
                      </tr>
                      <tr>
                        <td >Total Contributions</td>
                        <td class="text-muted tolduc" style="text-align:right;"></td>
                        <td class="text-muted annual_tolduc" style="text-align:right;"></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
              <div class="col-md-6">
                <div class="table-responsive">
                  <table
                    class="table table-vcenter">
                    <thead>
                      <tr class="bg-dark-lt">
                        <th colspan="3" class="text-center" style="font-size: .775rem;">Others</th>
                      </tr>
                      </thead>
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
                      <tr>
                        <td><strong class="in-hand">In Hand</strong></td>
                        <td class="text-muted inhand" style="text-align:right; font-weight: 600;"></td>
                        <td class="text-muted annual_inhand" style="text-align:right; font-weight: 600;"></td>
                      </tr>
                      <tr>
                        <td ><strong>CTC</strong></td>
                        <td class="text-muted ctc" style="text-align:right; font-weight: 600;"></td>
                        <td class="text-muted annual_ctc" style="text-align:right; font-weight: 600;"></td>
                      </tr>
                      <tr>
                        <td colspan="3"><em>*No Cash Reimbursement (Availed as Service)</em></td>
                      </tr>
                      <tr class="stack_info">
                        <td colspan="3"><em>**Only applicable for SEC Position</em></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
              <div class="col-md-6">
              </div>
            </div>
          </div>
        </div>
        </div>
      </div>
    </div>
    <div class="container-xl mt-3">
      <div class="row g-2 align-items-center d-print-none">
      <div class="col-md-12 text-center">
          <button type="button" class="btn btn-outline-primary" onclick="javascript:window.print();">
                <!-- Download SVG icon from http://tabler-icons.io/i/printer -->
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M17 17h2a2 2 0 0 0 2 -2v-4a2 2 0 0 0 -2 -2h-14a2 2 0 0 0 -2 2v4a2 2 0 0 0 2 2h2"></path><path d="M17 9v-4a2 2 0 0 0 -2 -2h-6a2 2 0 0 0 -2 2v4"></path><rect x="7" y="13" width="10" height="8" rx="2"></rect></svg>
                Print Salary Slip
            </button>
          <button type="button" class="btn btn-primary" onclick="generatePDF();">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-file-download" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M14 3v4a1 1 0 0 0 1 1h4"></path><path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z"></path><path d="M12 17v-6"></path><path d="M9.5 14.5l2.5 2.5l2.5 -2.5"></path></svg>
                Download Salary Structure
            </button>
        </div>
      </div>
    </div>
  <?php include "footer.php"; ?>

  <script src="./dist/js/phcustom.js"></script>
  
  <script>
  var redir = '<?php echo $redirectPg ?>';
  if(redir == 1) {
    window.location.replace("error-404.php");
  }
</script>