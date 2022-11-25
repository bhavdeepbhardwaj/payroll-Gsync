<?php $parent_page = "emp"; ?>
<?php $page = "view_emps"; ?>
<?php include "config.php"; ?>
<?php include "header.php"; ?>

<?php

if($_SESSION["user_type"] == 3){
    $redirectPg = 1;
  } else {
    $redirectPg = 0;
  }

?>

<?php
    $id = $_GET["edit"];
    $row = array();
    $sql = "SELECT * FROM gs_employees WHERE emp_id = '".$id."'";

    $res = mysqli_query($link, $sql);

    $row = mysqli_fetch_assoc($res);

    $empid = $row["emp_id"];

    $sqlid = "SELECT * FROM users WHERE username = '".$empid."'";

    $resid = mysqli_query($link, $sqlid);

    $rowid = mysqli_fetch_assoc($resid);


?>

<div class="page-wrapper">
  <div class="container-xl">
    <!-- Page title -->
    <div class="page-header d-print-none">
      <div class="row g-2 align-items-center">
        <div class="col">
          <h2 class="page-title">
            Edit Details of Employee
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
              <fieldset class="form-fieldset">
                <legend>Employee Details</legend>
                    <div class="row g-2 align-items-center">
                        <div class="col-md-2 text-center">
                        <?php if(file_exists($row['emp_pic'])){ ?>
                        <span class="avatar avatar-2xl" style="background-image: url(./<?php echo $row['emp_pic']; ?>)"></span>
                <?php } else { ?>
                    <span class="avatar avatar-2xl"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><circle cx="12" cy="7" r="4"></circle><path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path></svg></span>
                <?php } ?>
                        <a href="#" class="btn mt-2" data-bs-toggle="modal" data-bs-target="#modal-changepp">
                          <!-- Download SVG icon from http://tabler-icons.io/i/brand-vk -->
                          <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1"></path><path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z"></path><path d="M16 5l3 3"></path></svg>
                          Change Picture
                        </a>
                        </div>
                        <div class="col-md-10">
              <form name="update_form" action="update_emp.php" method="POST">
                            <div class="row g-2">
                                <div class="col-md-2" id="empid_div">
                                    <label class="form-label required">Employee Id</label>
                                    <input type="text" class="form-control" name="emp_id" id="empid" value="<?php echo $row["emp_id"]; ?>" autocomplete="off" onchange="create_id();" readonly />
                                </div>
                                <div class="col-md-2">
                                    <label class="form-label required">Full Name</label>
                                    <input type="text" class="form-control" name="full_name" value="<?php echo $row["emp_name"]; ?>" id="empname" autocomplete="off" required/>
                                </div>
                                <div class="col-md-2">
                                    <label class="form-label required">Designation</label>
                                    <input type="text" class="form-control" name="emp_designation" value="<?php echo $row["emp_desg"]; ?>" id="empdesg" autocomplete="on" required/>
                                </div>
                                <div class="col-md-2">
                                    <label class="form-label required">Email Id</label>
                                    <input type="email" class="form-control" name="email" value="<?php echo $row["emp_mail"]; ?>" id="emp_email" autocomplete="off" required/>
                                </div>
                                <div class="col-md-2">
                                    <label class="form-label required">Date of Join</label>
                                    <input type="date" class="form-control" name="doj" value="<?php echo $row["doj"]; ?>" autocomplete="off" required/>
                                </div>
                                <div class="col-md-2">
                                    <label class="form-label required">Department</label>
                                    <input type="text" class="form-control" name="department" value="<?php echo $row["emp_dept"]; ?>" id="empdept" autocomplete="on" required/>
                                </div>
                                <div class="col-md-2">
                                    <label class="form-label required">PAN No.</label>
                                    <input type="text" class="form-control" name="pan" value="<?php echo $row["emp_pan"]; ?>" id="emppan" autocomplete="off" required/>
                                </div>
                                <div class="col-md-2">
                                    <label class="form-label">UAN NO.</label>
                                    <input type="text" class="form-control" name="uan" value="<?php echo $row["emp_uan"]; ?>" id="empuan" autocomplete="off"/>
                                </div>
                                <div class="col-md-2">
                                    <label class="form-label">ESI No.</label>
                                    <input type="text" class="form-control" name="esi" value="<?php echo $row["emp_esi"]; ?>" id="empesi" autocomplete="off"/>
                                </div>
                            </div>
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
                                <option value="Bank Transfer" <?php if ($row["emp_paymode"] == 'Bank Transfer') echo ' selected="selected"'; ?>>Bank Transfer</option>
                                <option value="Wire Transfer" <?php if ($row["emp_paymode"] == 'Wire Transfer') echo ' selected="selected"'; ?>>Wire Transfer</option>
                                <option value="Cash" <?php if ($row["emp_paymode"] == 'Cash') echo ' selected="selected"'; ?>>Cash</option>
                                <option value="Cheque" <?php if ($row["emp_paymode"] == 'Cheque') echo ' selected="selected"'; ?>>Cheque</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <label class="form-label">Bank</label>
                            <input type="text" class="form-control" name="bank" value="<?php echo $row["emp_bank"]; ?>" id="empbank" autocomplete="on"/>
                        </div>
                        <div class="col-md-2">
                            <label class="form-label">IFSC</label>
                            <input type="text" class="form-control" name="ifsc" value="<?php echo $row["emp_ifsc"]; ?>" id="empifsc" autocomplete="off"/>
                        </div>
                        <div class="col-md-2">
                            <label class="form-label">Account No.</label>
                            <input type="text" class="form-control" name="ac_no" value="<?php echo $row["emp_acc"]; ?>" id="empacc" autocomplete="off"/>
                        </div>
                        <div class="col-md-2">
                            <label class="form-label required">Gross Salary</label>
                            <input type="text" class="form-control" name="gross" value="<?php echo $row["emp_gsal"]; ?>" id="empgrssal" autocomplete="off" required/>
                        </div>
                    </div>
                </fieldset>
                <fieldset class="form-fieldset">
                    <legend>Allowances</legend>
                    <div class="row g-2 align-items-center mt-3">
                        <div class="col-md-2">
                            <label class="form-label required">Food Allowance</label>
                            <input type="text" class="form-control" name="food_allw" value="<?php echo $row["emp_food"]; ?>" id="empfoodallw" autocomplete="off" required/>
                        </div>
                        <div class="col-md-2">
                            <label class="form-label required">Travel Allowance</label>
                            <input type="text" class="form-control" name="travel_allw" value="<?php echo $row["emp_travel"]; ?>" id="emptravelallw" value="2200" autocomplete="off" required/>
                        </div>
                        <div class="col-md-2">
                            <label class="form-label">Special Allowances</label>
                            <input type="text" class="form-control" name="spl_allowance" value="<?php echo $row["emp_spl"]; ?>" id="empsplallw" autocomplete="off" />
                        </div>
                        <div class="col-md-2">
                            <label class="form-check" style="margin-bottom: 0; margin-top: 1rem;">
                                <input type="hidden" value="0" name="msa"/>
                                <input type="checkbox" class="form-check-input" value="1" name="msa" <?= $row["emp_meal"] == '1' ? 'checked' : ''; ?>/>
                                <span class="form-check-label">Meal Service Availed</span>
                            </label>
                        </div>
                        <div class="col-md-2">
                            <label class="form-check" style="margin-bottom: 0; margin-top: 1rem;">
                                <input type="hidden" value="0" name="tsa"/>
                                <input type="checkbox" class="form-check-input" value="1" name="tsa" <?= $row["emp_cab"] == '1' ? 'checked' : ''; ?>/>
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
                            <input type="text" class="form-control" name="stack" id="empstack" value="<?php echo $row["emp_stinc"]; ?>" autocomplete="off" required/>
                        </div>
                        <div class="col-md-2">
                            <label class="form-label required">Incentive</label>
                            <input type="text" class="form-control" name="inc" value="<?php echo $row["emp_inc"]; ?>" id="empincentive" autocomplete="off" required/>
                        </div>
                        <div class="col-md-2">
                            <label class="form-label">Others <span class="form-help" data-bs-toggle="popover" data-bs-placement="top" data-bs-html="true" data-bs-content="<p>Others is adjustments in positive amount or in negative amount. Positive and Negative amount will add in earnings and deductions respectively. E.g 2000 (+ve amt), -2000 (-ve amt). </p>">?</span></label>
                            <input type="text" class="form-control" name="others" value="<?php echo $row["emp_other"]; ?>" id="empothers" autocomplete="off"/>
                        </div>
                    </div>
                </fieldset>
                <fieldset class="form-fieldset">
                <legend>Employee Credentials</legend>
                    <div class="row g-2 align-items-center">
                        <div class="col-md-2" id="userid_div">
                            <label class="form-label required">Employee User Id</label>
                            <input type="text" class="form-control" name="emp_user_id" value="<?php echo $rowid["username"]; ?>" id="emp_u_id" autocomplete="off" onchange="checkuserid();" readonly/>
                        </div>
                        <div class="col-md-2">
                            <label class="form-label required">Employee Password</label>
                            <input type="password" class="form-control" name="emp_pswd" id="emp_pass" autocomplete="off"/>
                        </div>
                    </div>
                </fieldset>
                <fieldset class="form-fieldset">
                <legend>Employee Exit & Description</legend>
                    <div class="row g-2 align-items-center">
                        <div class="col-md-2">
                            <label class="form-label">Employee Exit Date</label>
                            <input type="date" class="form-control" name="eed" value="<?php if($row['emp_exitdate'] != 0000-00-00) { echo $row['emp_exitdate']; } ?>" onchange="deactivateemp();" autocomplete="off"/>
                        </div>
                    </div>
                    <div class="row g-2 align-items-center mt-3">
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Description</label>
                            <textarea class="form-control" name="desc" data-bs-toggle="autosize" placeholder="Type something…"><?php echo $row["emp_desp"]; ?></textarea>
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
                                <option value="0" <?php if ($row["emp_status"] == '0') echo ' selected="selected"'; ?>>Deactive</option>
                                <option value="1" <?php if ($row["emp_status"] == '1') echo ' selected="selected"'; ?>>Active</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <div class="form-label">
                                Employee Role
                            </div>
                            <select class="form-select" name="emp_role">
                                <option value="1" <?php if ($rowid["user_type"] == '1') echo ' selected="selected"'; ?>>Admin</option>
                                <option value="2" <?php if ($rowid["user_type"] == '2') echo ' selected="selected"'; ?>>Moderator</option>
                                <option value="3" <?php if ($rowid["user_type"] == '3') echo ' selected="selected"'; ?>>User</option>
                            </select>
                        </div>
                    </div>
                </fieldset>
                <input type="hidden" value="3" name="user_type"/>
                <div class="row g-2 justify-content-center align-items-center mt-3">
                    <div class="col-md-4 text-center">
                        <a href="view_emps.php" class="btn btn-danger w-100">Cancel Update</a>
                    </div>
                    <div class="col-md-4 text-center">
                        <button type="submit" name="update" class="btn btn-primary w-100">Update Details</button>
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

    <div class="modal modal-blur fade" id="modal-changepp" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Change Profile Picture</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="row mb-3 align-items-center" id="change_pp_div">
                <div class="form-label">File Input</div>
                <input type="file" class="form-control mb-3" name="pp" id="change_pp" required />
                <code>File format allowed .jpg .jpeg .png .gif .PNG .JPG .JPEG</code> <br />
                <code>Max file size allowed 500 KB.</code>
                <input type="hidden" name="e_name" id="e_nameid" value="<?php echo $row["emp_id"]; ?>" />
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn me-auto" data-bs-dismiss="modal" onclick="clr_fileerr();">Close</button>
            <button type="button" class="btn btn-primary" id="change_confirm">Change Profile Picture</button>
          </div>
        </div>
      </div>
    </div>

    <div class="toast pp-toast position-absolute p-3 top-0 end-0" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header bg-blue">
        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-bell-ringing me-2" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
   <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
   <path d="M10 5a2 2 0 0 1 4 0a7 7 0 0 1 4 6v3a4 4 0 0 0 2 3h-16a4 4 0 0 0 2 -3v-3a7 7 0 0 1 4 -6"></path>
   <path d="M9 17v1a3 3 0 0 0 6 0v-1"></path>
   <path d="M21 6.727a11.05 11.05 0 0 0 -2.794 -3.727"></path>
   <path d="M3 6.727a11.05 11.05 0 0 1 2.792 -3.727"></path>
</svg>
            <strong class="me-auto">Notification</strong>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body bg-blue-lt">
            Employee Picture Updated.
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
                                $("#userid_div").append('<div class="invalid-feedback has-error-email" id="usererr" style="display: inline-block;">User Id already exists</div>')
                            } else {
                                $("#emp_u_id").removeClass("is-invalid");
                                $("#usererr").remove();
                            }
                        }
                }
        });
    }

    function checkempid() {
        var presentid = '<?php echo $row['emp_id']; ?>';
        var typeId = $("#empid").val();
        if (presentid != typeId) {
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
                                $("#empid_div").append('<div class="invalid-feedback has-error-email" id="emperr" style="display: inline-block;">Employee Id already exists</div>')
                            } else {
                                $("#empid").removeClass("is-invalid");
                                $("#emperr").remove();
                            }
                        }
                }
        });

        }
    }

    $( "#change_confirm" ).click(function(){

        $('#modal-changepp').modal('toggle');
        data = new FormData();
        data.append('file', $('#change_pp')[0].files[0]);
        data.append('name', $('#e_nameid').val());

        var imgname  =  $('input[type=file]').val();
        var size  =  $('#change_pp')[0].files[0].size;

        var ext =  imgname.substr( (imgname.lastIndexOf('.') +1) );
    if(ext=='jpg' || ext=='jpeg' || ext=='png' || ext=='gif' || ext=='PNG' || ext=='JPG' || ext=='JPEG')
    {
    $("#change_pp").removeClass("is-invalid");
    $("#ch_pperr").remove();
     if(size<=500000)
     {
        $("#change_pp").removeClass("is-invalid");
        $("#ch_pperr").remove();
        $.ajax({
            url: 'update_profilepic.php',
            type: 'POST',
            data: data,
            enctype: 'multipart/form-data',
            processData: false,  // tell jQuery not to process the data
            contentType: false,   // tell jQuery not to set contentType
            statusCode: {
                200: function (response) {
                            if(response == 1){
                                show_toast();
                            } else {
                                alert(response);
                            }
                        }
                }
        });
      } else {
        $("#change_pp").addClass("is-invalid");
        $("#change_pp_div").append('<div class="invalid-feedback has-error-email" id="ch_pperr" style="display: inline-block;">File size too large. Max 500 KB allowed</div>')
    }
    } else {
        $("#change_pp").addClass("is-invalid");
        $("#change_pp_div").append('<div class="invalid-feedback has-error-email" id="ch_pperr" style="display: inline-block;">File type not allowed on .jpg .jpeg .png .gif .PNG .JPG .JPEG</div>')
    }
    });

    function clr_fileerr() {
        $("#change_pp").removeClass("is-invalid");
        $("#ch_pperr").remove();
    }

    function show_toast() {
        $('.pp-toast').toast('show');
        setTimeout(function() {
            location.reload();
        }, 4000);
    }
</script>

<script>
  var redir = '<?php echo $redirectPg ?>';
  if(redir == 1) {
    window.location.replace("error-404.php");
  }
</script>