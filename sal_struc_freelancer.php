<?php $page = "sal_struc"; ?>
<?php include "header.php"; ?>
<?php

if ($_SESSION["user_type"] == 3) {
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
                  <div class="col-md-3">
                    <label class="form-label required">Full Name</label>
                    <input type="text" class="form-control" name="full_name" id="full_name" autocomplete="off" required />
                  </div>
                  <div class="col-md-3">
                    <label class="form-label required">Designation</label>
                    <input type="text" class="form-control" name="desg" id="desg" autocomplete="off" required />
                  </div>
                  <div class="col-md-3">
                    <label class="form-label required">Service Unit</label>
                    <input type="text" class="form-control" name="ser_unt" id="ser_unt" value="500" autocomplete="off" required />
                  </div>
                  <div class="col-md-3">
                    <label class="form-label required">Service Units sold</label>
                    <input type="text" class="form-control" name="ser_unt_sold" value="0" id="ser_unt_sold" autocomplete="off" required />
                  </div>
                </div>
                <div class="row g-2">
                  <div class="mt-4 col-12 text-center">
                    <a href="#sal_struct" class="btn btn-primary" id="gen_salfreelancer" onchange="calc_sercice_unit();">Freelancer Salary Structure</a>
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
                  <p class="h2">GLOBALSYNC HUB PTY LTD</p>
                  <address>
                    16/82 Makland Drive,<br>
                    Derrimut, VICTORIA,<br>
                   3026<br>
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
                <div class="col-md-12">
                  <div class="table-responsive">
                    <table class="table table-vcenter">
                      <thead>
                        <tr>
                          <th style="font-size: .775rem;">Earnings</th>
                          <th style="text-align:right; font-size: .775rem;">Amount</th>
                          <!--<th style="text-align:right; font-size: .775rem;">Annually</th>-->
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>Each Service Unit</td>
                          <td class="text-muted service_unit" style="text-align:right;"></td>
                          <!--<td class="text-muted annual_service_unit" style="text-align:right;"></td>-->
                        </tr>
                        <tr>
                          <td>Service Units sold</td>
                          <td class="text-muted service_unit_sold" style="text-align:right;"></td>
                          <!--<td class="text-muted annual_service_unit_sold" style="text-align:right;"></td>-->
                        </tr>
                        <tr>
                          <td>Total Revenue</td>
                          <td class="text-muted total_revenue" style="text-align:right;"></td>
                          <!--<td class="text-muted annual_total_revenue" style="text-align:right;"></td>-->
                        </tr>
                        <tr>
                          <td>Commision</td>
                          <td class="text-muted freelanc_comm" style="text-align:right;"></td>
                          <!--<td class="text-muted annual_freelanc_comm" style="text-align:right;"></td>-->
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="table-responsive">
                    <table class="table table-vcenter">
                      <thead>
                        <tr class="bg-dark-lt">
                          <th colspan="3" class="" style="font-size: .775rem;">Others</th>
                        </tr>
                      </thead>
                      <tr class="">
                        <td colspan="3"><em>*All figures are mentioned above in AUD</em></td>
                      </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
                <!-- <div class="col-md-6">
                </div> -->
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container-xl mt-3">
      <div class="row g-2 align-items-center d-print-none">
        <div class="col-md-12 text-center">
          <!-- <button type="button" class="btn btn-outline-primary" onclick="javascript:window.print();"> -->
            <!-- Download SVG icon from http://tabler-icons.io/i/printer -->
            <!-- <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
              <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
              <path d="M17 17h2a2 2 0 0 0 2 -2v-4a2 2 0 0 0 -2 -2h-14a2 2 0 0 0 -2 2v4a2 2 0 0 0 2 2h2"></path>
              <path d="M17 9v-4a2 2 0 0 0 -2 -2h-6a2 2 0 0 0 -2 2v4"></path>
              <rect x="7" y="13" width="10" height="8" rx="2"></rect>
            </svg>
            Print Salary Slip
          </button> -->
          <button type="button" class="btn btn-primary" onclick="generatePDF();">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-file-download" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
              <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
              <path d="M14 3v4a1 1 0 0 0 1 1h4"></path>
              <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z"></path>
              <path d="M12 17v-6"></path>
              <path d="M9.5 14.5l2.5 2.5l2.5 -2.5"></path>
            </svg>
            Download Salary Structure
          </button>
        </div>
      </div>
    </div>
    <?php include "footer.php"; ?>

    <script src="./dist/js/sal_struc_freelancer.js"></script>

    <script>
      function calc_sercice_unit() {
        if ($("#ser_unt").val() && $("#ser_unt_sold").val() != null) {
          var total_rev = parseFloat($("#ser_unt").val()) * parseFloat($("#ser_unt_sold").val());
          console.log(total_rev);

          $("#otp_inc_installed").val(total_rev);
        }
      }
      var redir = '<?php echo $redirectPg ?>';
      if (redir == 1) {
        window.location.replace("error-404.php");
      }
    </script>