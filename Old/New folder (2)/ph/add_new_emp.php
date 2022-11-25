<?php $parent_page = "emp"; ?>
<?php $page = "add_emp"; ?>
<?php include "header.php"; ?>
<?php include "insert_emp.php"; ?>

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
            Enter Details of New Employee
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
              <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
              <fieldset class="form-fieldset">
                <legend>Employee Details</legend>
                    <div class="row g-2 align-items-center">
                        <div class="col-md-2" id="empid_div">
                            <label class="form-label required">Employee Id</label>
                            <input type="text" class="form-control" name="emp_id" id="empid" value="<?php if(isset($_POST["emp_id"])){echo $_POST["emp_id"];} ?>" autocomplete="off" onchange="create_id();" required/>
                        </div>
                        <div class="col-md-2">
                            <label class="form-label required">Full Name</label>
                            <input type="text" class="form-control" name="full_name" value="<?php if(isset($_POST["full_name"])){echo $_POST["full_name"];} ?>" id="empname" autocomplete="off" required/>
                        </div>
                        <div class="col-md-2">
                            <label class="form-label required">Designation</label>
                            <input type="text" class="form-control" name="emp_designation" value="<?php if(isset($_POST["emp_designation"])){echo $_POST["emp_designation"];} ?>" id="empdesg" autocomplete="on" required/>
                        </div>
                        <div class="col-md-2">
                            <label class="form-label required">Email Id</label>
                            <input type="email" class="form-control" name="email" value="<?php if(isset($_POST["email"])){echo $_POST["email"];} ?>" id="emp_email" autocomplete="off" required/>
                        </div>
                        <div class="col-md-2">
                            <label class="form-label required">Date of Join</label>
                            <input type="date" class="form-control" name="doj" value="<?php if(isset($_POST["doj"])){echo $_POST["doj"];} ?>" autocomplete="off" required/>
                        </div>
                        <div class="col-md-2">
                            <label class="form-label required">Department</label>
                            <input type="text" class="form-control" name="department" value="<?php if(isset($_POST["department"])){echo $_POST["department"];} ?>" id="empdept" autocomplete="on" required/>
                        </div>
                        <div class="col-md-2">
                            <label class="form-label required">PAN No.</label>
                            <input type="text" class="form-control" name="pan" value="<?php if(isset($_POST["pan"])){echo $_POST["pan"];} ?>" id="emppan" autocomplete="off" required/>
                        </div>
                        <div class="col-md-2">
                            <label class="form-label">UAN NO.</label>
                            <input type="text" class="form-control" name="uan" value="<?php if(isset($_POST["uan"])){echo $_POST["uan"];} ?>" id="empuan" autocomplete="off"/>
                        </div>
                        <div class="col-md-2">
                            <label class="form-label">ESI No.</label>
                            <input type="text" class="form-control" name="esi" value="<?php if(isset($_POST["esi"])){echo $_POST["esi"];} ?>" id="empesi" autocomplete="off"/>
                        </div>
                        <div class="col-md-2" id="emppp_div">
                            <label class="form-label">Profile Photo</label>
                            <input type="file" class="form-control" name="profile_pic" id="emppp"/>
                            <?php if(isset($file_error_msg)){echo "<div class='invalid-feedback has-error-email' style='display: inline-block;'>$file_error_msg</div>";} ?>
                        </div>
                        <div class="col-md-4 align-items-center pt-3" id="emppp_div">
                            <code>File format allowed .jpg .jpeg .png .gif .PNG .JPG .JPEG</code> <br />
                            <code>Max file size allowed 500 KB.</code>
                        </div>
                    </div>
                </fieldset>
                <fieldset class="form-fieldset">
                <legend>Payment Details</legend>
                    <div class="row g-2 align-items-center">
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
                            <input type="text" class="form-control" name="bank" value="<?php if(isset($_POST["bank"])){echo $_POST["bank"];} ?>" id="empbank" autocomplete="on"/>
                        </div>
                        <div class="col-md-2">
                            <label class="form-label">IFSC</label>
                            <input type="text" class="form-control" name="ifsc" value="<?php if(isset($_POST["ifsc"])){echo $_POST["ifsc"];} ?>" id="empifsc" autocomplete="off"/>
                        </div>
                        <div class="col-md-2">
                            <label class="form-label">Account No.</label>
                            <input type="text" class="form-control" name="ac_no" value="<?php if(isset($_POST["ac_no"])){echo $_POST["ac_no"];} ?>" id="empacc" autocomplete="off"/>
                        </div>
                        <div class="col-md-2">
                            <label class="form-label required">Gross Salary</label>
                            <input type="text" class="form-control" name="gross" value="<?php if(isset($_POST["gross"])){echo $_POST["gross"];} ?>" id="empgrssal" autocomplete="off" required/>
                        </div>
                    </div>
                </fieldset>
                <fieldset class="form-fieldset">
                    <legend>Allowances</legend>
                    <div class="row g-2 align-items-center mt-3">
                        <div class="col-md-2">
                            <label class="form-label required">Food Allowance</label>
                            <input type="text" class="form-control" name="food_allw" value="<?php if(isset($_POST["food_allw"])){echo $_POST["food_allw"];} else {echo "2200";} ?>" id="empfoodallw" autocomplete="off" required/>
                        </div>
                        <div class="col-md-2">
                            <label class="form-label required">Travel Allowance</label>
                            <input type="text" class="form-control" name="travel_allw" value="<?php if(isset($_POST["travel_allw"])){echo $_POST["travel_allw"];} else {echo "2200";} ?>" id="emptravelallw" value="2200" autocomplete="off" required/>
                        </div>
                        <div class="col-md-2">
                            <label class="form-label">Special Allowances</label>
                            <input type="text" class="form-control" name="spl_allowance" value="<?php if(isset($_POST["spl_allowance"])){echo $_POST["spl_allowance"];} else {echo "0";}?>" id="empsplallw" autocomplete="off" />
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
                            <input type="text" class="form-control" name="stack" id="empstack" value="<?php if(isset($_POST["stack"])){echo $_POST["stack"];} else {echo "0";} ?>" autocomplete="off" required/>
                        </div>
                        <div class="col-md-2">
                            <label class="form-label required">Incentive</label>
                            <input type="text" class="form-control" name="inc" value="<?php if(isset($_POST["inc"])){echo $_POST["inc"];} else {echo "0";} ?>" id="empincentive" autocomplete="off" required/>
                        </div>
                        <div class="col-md-2">
                            <label class="form-label">Others <span class="form-help" data-bs-toggle="popover" data-bs-placement="top" data-bs-html="true" data-bs-content="<p>Others is adjustments in positive amount or in negative amount. Positive and Negative amount will add in earnings and deductions respectively. E.g 2000 (+ve amt), -2000 (-ve amt). </p>">?</span></label>
                            <input type="text" class="form-control" name="others" value="<?php if(isset($_POST["others"])){echo $_POST["others"];} else {echo "0";} ?>" id="empothers" autocomplete="off"/>
                        </div>
                    </div>
                </fieldset>
                <fieldset class="form-fieldset">
                <legend>Employee Credentials</legend>
                    <div class="row g-2 align-items-center">
                        <div class="col-md-2" id="userid_div">
                            <label class="form-label required">Employee User Id</label>
                            <input type="text" class="form-control" name="emp_user_id" value="<?php if(isset($_POST["emp_user_id"])){echo $_POST["emp_user_id"];} ?>" id="emp_u_id" autocomplete="off" onchange="checkuserid();" readonly/>
                        </div>
                        <div class="col-md-2">
                            <label class="form-label required">Employee Password</label>
                            <input type="password" class="form-control" name="emp_pswd" id="emp_pass" autocomplete="off" required/>
                        </div>
                    </div>
                </fieldset>
                <fieldset class="form-fieldset">
                <legend>Employee Exit & Description</legend>
                    <div class="row g-2 align-items-center">
                        <div class="col-md-2">
                            <label class="form-label">Employee Exit Date</label>
                            <input type="date" class="form-control" name="eed" onchange="deactivateemp();" autocomplete="off"/>
                        </div>
                    </div>
                    <div class="row g-2 align-items-center mt-3">
                        <div class="col-md-2 mb-3">
                            <label class="form-label">Description</label>
                            <textarea class="form-control" name="desc" data-bs-toggle="autosize" placeholder="Type something…">NA</textarea>
                        </div>
                    </div>
                </fieldset>
                <fieldset class="form-fieldset">
                <legend>Employee Status</legend>
                    <div class="row g-2 align-items-center">
                        <div class="col-md-2">
                            <div class="form-label">
                                Employee Status
                            </div>
                            <select class="form-select" name="emp_status" id="empstate">
                                <option value="0">Inactive</option>
                                <option value="1">Active</option>
                            </select>
                        </div>
                    </div>
                </fieldset>
                <input type="hidden" value="3" name="user_type"/>
                <div class="row g-2 justify-content-center align-items-center mt-3">
                    <div class="col-md-4 text-center">
                        <a href="view_emps.php" class="btn btn-danger w-100">Cancel</a>
                    </div>
                    <div class="col-md-4 text-center">
                        <button type="submit" class="btn btn-primary w-100" id="sub_btnid">Submit Details</button>
                    </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="modal modal-blur fade" id="modal-danger" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
        <div class="modal-content">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          <div class="modal-status bg-danger"></div>
          <div class="modal-body text-center py-4">
            <!-- Download SVG icon from http://tabler-icons.io/i/alert-triangle -->
            <svg xmlns="http://www.w3.org/2000/svg" class="icon mb-2 text-danger icon-lg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 9v2m0 4v.01" /><path d="M5 19h14a2 2 0 0 0 1.84 -2.75l-7.1 -12.25a2 2 0 0 0 -3.5 0l-7.1 12.25a2 2 0 0 0 1.75 2.75" /></svg>
            <h3>Oops... something went wrong</h3>
            <div class="text-muted">This may due to internet connectivity or developer forgot to fix something. Try adding Employee Details again.</div>
          </div>
          <div class="modal-footer">
            <div class="w-100">
              <div class="row">
                <div class="col"><a href="#" class="btn w-100" data-bs-dismiss="modal" onclick="location.reload(true);">
                    Ok
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

<?php include "footer.php"; ?>

<script>

$(document).ready(function() {
    let fieldValid = false;

    bootstrapValidate('#empname','alpha:Please enter valid Employee Name', function (isValid) {
        if(isValid) {
            fieldValid = true;
        } else {
            fieldValid = false;
        }
    });

    bootstrapValidate('#empdesg','alpha:Please enter valid Employee Designation', function (isValid) {
        if(isValid) {
            fieldValid = true;
        } else {
            fieldValid = false;
        }
    });

    bootstrapValidate('#emp_email','email:Please enter valid email id', function (isValid) {
        if(isValid) {
            fieldValid = true;
        } else {
            fieldValid = false;
        }
    });

    bootstrapValidate('#empdept','alphanum:Please enter valid Employee Department', function (isValid) {
        if(isValid) {
            fieldValid = true;
        } else {
            fieldValid = false;
        }
    });

    bootstrapValidate('#emppan','alphanum:Please enter valid Employee PAN No.', function (isValid) {
        if(isValid) {
            fieldValid = true;
        } else {
            fieldValid = false;
        }
    });

    bootstrapValidate('#empuan','alphanum:Please enter valid Employee UAN No.', function (isValid) {
        if(isValid) {
            fieldValid = true;
        } else {
            fieldValid = false;
        }
    });

    bootstrapValidate('#empesi','alphanum:Please enter valid Employee ESI No.', function (isValid) {
        if(isValid) {
            fieldValid = true;
        } else {
            fieldValid = false;
        }
    });

    bootstrapValidate('#empbank','alphanum:Please enter valid Bank Name', function (isValid) {
        if(isValid) {
            fieldValid = true;
        } else {
            fieldValid = false;
        }
    });

    bootstrapValidate('#empifsc','alphanum:Please enter valid IFS Code', function (isValid) {
        if(isValid) {
            fieldValid = true;
        } else {
            fieldValid = false;
        }
    });

    bootstrapValidate('#empacc','integer:Please enter valid Account No.', function (isValid) {
        if(isValid) {
            fieldValid = true;
        } else {
            fieldValid = false;
        }
    });

    bootstrapValidate('#empgrssal','numeric:Please enter valid Gross Salary', function (isValid) {
        if(isValid) {
            fieldValid = true;
        } else {
            fieldValid = false;
        }
    });

    bootstrapValidate('#empfoodallw','numeric:Please enter valid Food Allowance Amount', function (isValid) {
        if(isValid) {
            fieldValid = true;
        } else {
            fieldValid = false;
        }
    });

    bootstrapValidate('#emptravelallw','numeric:Please enter valid Travel Allowance Amount', function (isValid) {
        if(isValid) {
            fieldValid = true;
        } else {
            fieldValid = false;
        }
    });

    bootstrapValidate('#empsplallw','numeric:Please enter valid Special Allowance Amount', function (isValid) {
        if(isValid) {
            fieldValid = true;
        } else {
            fieldValid = false;
        }
    });

    bootstrapValidate('#empstack','numeric:Please enter valid Stack Incentive Amount', function (isValid) {
        if(isValid) {
            fieldValid = true;
        } else {
            fieldValid = false;
        }
    });

    bootstrapValidate('#empincentive','numeric:Please enter valid Incentive Amount', function (isValid) {
        if(isValid) {
            fieldValid = true;
        } else {
            fieldValid = false;
        }
    });

    bootstrapValidate('#empothers','numeric:Please enter valid Others Amount', function (isValid) {
        if(isValid) {
            fieldValid = true;
        } else {
            fieldValid = false;
        }
    });

    bootstrapValidate('#emp_pass','min:6:Enter at least 6 characters', function (isValid) {
        if(isValid) {
            fieldValid = true;
        } else {
            fieldValid = false;
        }
    });
});

    function create_id() {
        $('#emp_u_id').val($('#empid').val());
        checkempid();
    }

    function deactivateemp() {
        $('#empstate').val(0);
    }

    function checkuserid() {
        $("#emp_u_id").removeClass("is-invalid");
        $("#usererr").remove();
        var useridData = {
            uservar: $("#emp_u_id").val(),
        };

        $.ajax({
            type: 'post',
            url: 'check-record.php',
            data: useridData,
            dataType: "text",
            statusCode: {
                200: function (response) {
                            if(response == 1){
                                $("#emp_u_id").addClass("is-invalid");
                                $("#userid_div").append('<div class="invalid-feedback has-error-email" id="usererr" style="display: inline-block;">User Id already exists</div>');
                            } else {
                                $("#emp_u_id").removeClass("is-invalid");
                                $("#usererr").remove();
                            }
                        }
                }
        });
    }

    function checkempid() {
        $("#empid").removeClass("is-invalid");
        $("#emperr").remove();
        var empidData = {
            empvar: $("#empid").val(),
        };

        $.ajax({
            type: 'post',
            url: 'check-emprecord.php',
            data: empidData,
            dataType: "text",
            statusCode: {
                200: function (response) {
                            if(response == 1){
                                $("#empid").addClass("is-invalid");
                                $("#empid_div").append('<div class="invalid-feedback has-error-email" id="emperr" style="display: inline-block;">Employee Id already exists</div>');
                                document.getElementById("sub_btnid").disabled = true;
                            } else {
                                $("#empid").removeClass("is-invalid");
                                $("#emperr").remove();
                                document.getElementById("sub_btnid").disabled = false;
                            }
                        }
                }
        });
    }
</script>

<script>
  var redir = '<?php echo $redirectPg ?>';
  if(redir == 1) {
    window.location.replace("error-404.php");
  }
</script>