<?php $parent_page = "emp"; ?>
<?php $page = "add_emp"; ?>
<?php include "header.php"; ?>
<?php include "insert_emp.php"; ?>

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
                        Enter Details of New Employee
                    </h2>
                </div>
                <div class="col">
                    <h2 class="page-title float-end">
                        <a href="./bulk_employee.php" class="btn" target='__blank'>
                            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-files" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M15 3v4a1 1 0 0 0 1 1h4"></path>
                                <path d="M18 17h-7a2 2 0 0 1 -2 -2v-10a2 2 0 0 1 2 -2h4l5 5v7a2 2 0 0 1 -2 2z"></path>
                                <path d="M16 17v2a2 2 0 0 1 -2 2h-7a2 2 0 0 1 -2 -2v-10a2 2 0 0 1 2 -2h2"></path>
                            </svg>&nbsp;
                            Generate Bulk Employee
                        </a>
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
                                            <input type="text" class="form-control" name="emp_id" id="empid" value="<?php if (isset($_POST["emp_id"])) {
                                                                                                                        echo $_POST["emp_id"];
                                                                                                                    } ?>" autocomplete="off" onchange="create_id();" required />
                                        </div>
                                        <div class="col-md-2">
                                            <label class="form-label required">Full Name</label>
                                            <input type="text" class="form-control" name="full_name" value="<?php if (isset($_POST["full_name"])) {
                                                                                                                echo $_POST["full_name"];
                                                                                                            } ?>" id="empname" autocomplete="off" required />
                                        </div>
                                        <div class="col-md-2">
                                            <label class="form-label required">Designation</label>
                                            <input type="text" class="form-control" name="emp_designation" value="<?php if (isset($_POST["emp_designation"])) {
                                                                                                                        echo $_POST["emp_designation"];
                                                                                                                    } ?>" id="empdesg" autocomplete="on" required />
                                        </div>
                                        <div class="col-md-2">
                                            <label class="form-label required">Email Id</label>
                                            <input type="email" class="form-control" name="email" value="<?php if (isset($_POST["email"])) {
                                                                                                                echo $_POST["email"];
                                                                                                            } ?>" id="emp_email" autocomplete="off" required />
                                        </div>
                                        <div class="col-md-2">
                                            <label class="form-label required">Date of Join</label>
                                            <input type="date" class="form-control" name="doj" value="<?php if (isset($_POST["doj"])) {
                                                                                                            echo $_POST["doj"];
                                                                                                        } ?>" autocomplete="off" required />
                                        </div>
                                        <div class="col-md-2">
                                            <label class="form-label required">Department</label>
                                            <input type="text" class="form-control" name="department" value="<?php if (isset($_POST["department"])) {
                                                                                                                    echo $_POST["department"];
                                                                                                                } ?>" id="empdept" autocomplete="on" required />
                                        </div>
                                        <!-- <div class="col-md-2">
                                            <label class="form-label required">PAN No.</label>
                                            <input type="text" class="form-control" name="pan" value="<?php if (isset($_POST["pan"])) {
                                                                                                            echo $_POST["pan"];
                                                                                                        } ?>" id="emppan" autocomplete="off" required />
                                        </div> -->
                                        <?php
                                        if ($_SESSION['country_type'] == "In") { ?>
                                            <div class="col-md-2">
                                            <label class="form-label required">PAN No.</label>
                                            <input type="text" class="form-control" name="pan" value="<?php if (isset($_POST["pan"])) {
                                                                                                            echo $_POST["pan"];
                                                                                                        } ?>" id="emppan" autocomplete="off" required />
                                        </div>
                                        <?php } else if ($_SESSION['country_type'] == "Ph") { ?>
                                            <div class="col-md-2">
                                            <label class="form-label required">TIN No.</label>
                                            <input type="text" class="form-control" name="pan" value="<?php if (isset($_POST["pan"])) {
                                                                                                            echo $_POST["pan"];
                                                                                                        } ?>" id="emppan" autocomplete="off" required />
                                        </div>
                                        <?php } ?>

                                        <!-- <div class="col-md-2">
                                            <label class="form-label">UAN NO.</label>
                                            <input type="text" class="form-control" name="uan" value="<?php if (isset($_POST["uan"])) {
                                                                                                            echo $_POST["uan"];
                                                                                                        } ?>" id="empuan" autocomplete="off" />
                                        </div> -->
                                        <?php
                                        if ($_SESSION['country_type'] == "In") { ?>
                                           <div class="col-md-2">
                                            <label class="form-label required">UAN NO.</label>
                                            <input type="text" class="form-control" name="uan" value="<?php if (isset($_POST["uan"])) {
                                                                                                            echo $_POST["uan"];
                                                                                                        } ?>" id="empuan" autocomplete="off" />
                                        </div>
                                        <?php } else if ($_SESSION['country_type'] == "Ph") { ?>
                                            <div class="col-md-2">
                                            <label class="form-label required">SSS NO.</label>
                                            <input type="text" class="form-control" name="uan" value="<?php if (isset($_POST["uan"])) {
                                                                                                            echo $_POST["uan"];
                                                                                                        } ?>" id="empuan" autocomplete="off" />
                                        </div>
                                        <?php } ?>

                                        <!-- <div class="col-md-2">
                                            <label class="form-label">ESI No.</label>
                                            <input type="text" class="form-control" name="esi" value="<?php if (isset($_POST["esi"])) {
                                                                                                            echo $_POST["esi"];
                                                                                                        } ?>" id="empesi" autocomplete="off" />
                                        </div> -->
                                        <?php
                                        if ($_SESSION['country_type'] == "In") { ?>
                                           <div class="col-md-2">
                                            <label class="form-label required">ESI No.</label>
                                            <input type="text" class="form-control" name="esi" value="<?php if (isset($_POST["esi"])) {
                                                                                                            echo $_POST["esi"];
                                                                                                        } ?>" id="empesi" autocomplete="off" />
                                        </div>
                                        <?php } else if ($_SESSION['country_type'] == "Ph") { ?>
                                            <div class="col-md-2">
                                            <label class="form-label required">PHILIHEALTH No.</label>
                                            <input type="text" class="form-control" name="esi" value="<?php if (isset($_POST["esi"])) {
                                                                                                            echo $_POST["esi"];
                                                                                                        } ?>" id="empesi" autocomplete="off" />
                                        </div>
                                        <?php } ?>

                                        <div class="col-md-2" id="emppp_div">
                                            <label class="form-label">Profile Photo</label>
                                            <input type="file" class="form-control" name="profile_pic" id="emppp" />
                                            <?php if (isset($file_error_msg)) {
                                                echo "<div class='invalid-feedback has-error-email' style='display: inline-block;'>$file_error_msg</div>";
                                            } ?>
                                        </div>
                                        <div class="col-md-4 align-items-center pt-3" id="emppp_div">
                                            <code>File format allowed .jpg .jpeg .png .gif .PNG .JPG .JPEG</code> <br />
                                            <code>Max file size allowed 500 KB.</code>
                                        </div>
                                        <div class="col-md-2">
                                            <label class="form-label ">Nick Name</label>
                                            <input type="test" class="form-control" name="nick_name" value="<?php if (isset($_POST["nick_name"])) {
                                                                                                                echo $_POST["nick_name"];
                                                                                                            } ?>" id="emp_nick_name" autocomplete="off"  />
                                        </div>
                                        <div class="col-md-2">
                                            <label class="form-label ">Joining Month</label>
                                            <input type="test" class="form-control" name="joining_month" value="<?php if (isset($_POST["joining_month"])) {
                                                                                                                    echo $_POST["joining_month"];
                                                                                                                } ?>" id="emp_joining_month" autocomplete="off"  />
                                        </div>
                                        <div class="col-md-2">
                                            <label class="form-label ">Date of Hitting</label>
                                            <input type="date" class="form-control" name="date_of_hitting" value="<?php if (isset($_POST["date_of_hitting"])) {
                                                                                                                        echo $_POST["date_of_hitting"];
                                                                                                                    } ?>" id="emp_date_of_hitting" autocomplete="off"  />
                                        </div>
                                        <div class="col-md-2">
                                            <label class="form-label ">Ageing</label>
                                            <input type="test" class="form-control" name="ageing" value="<?php if (isset($_POST["ageing"])) {
                                                                                                                echo $_POST["ageing"];
                                                                                                            } ?>" id="emp_ageing" autocomplete="off"  />
                                        </div>
                                        <div class="col-md-2">
                                            <label class="form-label ">Rejoin on</label>
                                            <input type="date" class="form-control" name="rejoing_on" value="<?php if (isset($_POST["rejoing_on"])) {
                                                                                                                    echo $_POST["rejoing_on"];
                                                                                                                } ?>" id="emp_rejoing_on" autocomplete="off"  />
                                        </div>
                                        <div class="col-md-2">
                                            <label class="form-label ">Date of Confirmation</label>
                                            <input type="date" class="form-control" name="date_of_confirmation" value="<?php if (isset($_POST["date_of_confirmation"])) {
                                                                                                                            echo $_POST["date_of_confirmation"];
                                                                                                                        } ?>" id="emp_date_of_confirmation" autocomplete="off"  />
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
                                            <input type="text" class="form-control" name="bank" value="<?php if (isset($_POST["bank"])) {
                                                                                                            echo $_POST["bank"];
                                                                                                        } ?>" id="empbank" autocomplete="on" />
                                        </div>
                                        <div class="col-md-2">
                                            <label class="form-label">IFSC</label>
                                            <input type="text" class="form-control" name="ifsc" value="<?php if (isset($_POST["ifsc"])) {
                                                                                                            echo $_POST["ifsc"];
                                                                                                        } ?>" id="empifsc" autocomplete="off" />
                                        </div>
                                        <div class="col-md-2">
                                            <label class="form-label">Account No.</label>
                                            <input type="text" class="form-control" name="ac_no" value="<?php if (isset($_POST["ac_no"])) {
                                                                                                            echo $_POST["ac_no"];
                                                                                                        } ?>" id="empacc" autocomplete="off" />
                                        </div>
                                        <div class="col-md-2">
                                            <label class="form-label required">Gross Salary</label>
                                            <input type="text" class="form-control" name="gross" value="<?php if (isset($_POST["gross"])) {
                                                                                                            echo $_POST["gross"];
                                                                                                        } ?>" id="empgrssal" autocomplete="off" required />
                                        </div>
                                        <div class="col-md-2">
                                            <label class="form-label ">Annual CTC</label>
                                            <input type="text" class="form-control" name="annual_ctc_in" value="<?php if (isset($_POST["annual_ctc_in"])) {
                                                                                                                    echo $_POST["annual_ctc_in"];
                                                                                                                } ?>" id="emp_annual_ctc_in" autocomplete="off"  />
                                        </div>
                                        <div class="col-md-2">
                                            <label class="form-label ">IN Hand <span class="form-help" data-bs-toggle="popover" data-bs-placement="top" data-bs-html="true" data-bs-content="<p>Salary with stack. </p>">?</span></label>
                                            <input type="text" class="form-control" name="in_hand_salary_with_stack" value="<?php if (isset($_POST["in_hand_salary_with_stack"])) {
                                                                                                                                echo $_POST["in_hand_salary_with_stack"];
                                                                                                                            } ?>" id="emp_in_hand_salary_with_stack" autocomplete="off"  />
                                        </div>
                                        <div class="col-md-2">
                                            <label class="form-label ">Annual CTC NEW</label>
                                            <input type="text" class="form-control" name="annual_ctc_new" value="<?php if (isset($_POST["annual_ctc_new"])) {
                                                                                                                        echo $_POST["annual_ctc_new"];
                                                                                                                    } ?>" id="emp_annual_ctc_new" autocomplete="off"  />
                                        </div>
                                        <div class="col-md-2">
                                            <label class="form-label ">Final CTC</label>
                                            <input type="text" class="form-control" name="final_ctc_all" value="<?php if (isset($_POST["final_ctc_all"])) {
                                                                                                                    echo $_POST["final_ctc_all"];
                                                                                                                } ?>" id="emp_final_ctc_all" autocomplete="off" />
                                        </div>
                                        <div class="col-md-2">
                                            <label class="form-label ">TRA <span class="form-help" data-bs-toggle="popover" data-bs-placement="top" data-bs-html="true" data-bs-content="<p>Transport Reimbursement Applicable. </p>">?</span></label>
                                            <input type="text" class="form-control" name="transport_r_a" value="<?php if (isset($_POST["transport_r_a"])) {
                                                                                                                    echo $_POST["transport_r_a"];
                                                                                                                } ?>" id="emp_transport_r_a" autocomplete="off"  />
                                        </div>
                                    </div>
                                </fieldset>
                                <fieldset class="form-fieldset">
                                    <legend>Employee Journey</legend>
                                    <div class="row g-2 align-items-center">
                                        <div class="col-md-2" id="userid_div">
                                            <label class="form-label ">Performer Month</label>
                                            <input type="text" class="form-control" name="performer_month" />
                                        </div>
                                        <div class="col-md-2">
                                            <label class="form-label ">Verbal Warning</label>
                                            <input type="text" class="form-control" name="verbal_warning" id="" autocomplete="off"  />
                                        </div>
                                        <div class="col-md-2">
                                            <label class="form-label ">Date Of Verbal Warning</label>
                                            <input type="date" class="form-control" name="date_of_verbal_warning" id="" autocomplete="off"  />
                                        </div>
                                        <div class="col-md-2">
                                            <label class="form-label ">Total Verbal Warning</label>
                                            <input type="text" class="form-control" name="no_of_warning" id="" autocomplete="off"  />
                                        </div>

                                        <div class="col-md-2">
                                            <label class="form-label required">Line Manager</label>
                                            <input type="text" class="form-control" name="line_manager" id="" autocomplete="off"  required/>
                                        </div>

                                        <div class="col-md-2">
                                            <label class="form-label ">Type Of Attrition</label>
                                            <input type="text" class="form-control" name="type_of_attrition" id="" autocomplete="off"  />
                                        </div>

                                        <div class="row g-2 align-items-center mt-3">
                                            <div class="col-md-4">
                                                <label class="form-label ">Reason Of Verbal Warning</label>
                                                <!-- <input type="text" class="form-control" name="reason_of_verbal_warning" id="" autocomplete="off" required /> -->
                                                <textarea class="form-control" name="reason_of_verbal_warning" data-bs-toggle="autosize" placeholder="Type something…"></textarea>
                                            </div>
                                            <div class="col-md-4">
                                                <label class="form-label ">Reasson of Warning</label>
                                                <textarea class="form-control" name="reason_of_warning" data-bs-toggle="autosize" placeholder="Type something…"></textarea>
                                                <!-- <input type="text" class="form-control" name="reason_of_warning" id="" autocomplete="off" required /> -->
                                            </div>
                                            <div class="col-md-4">
                                                <label class="form-label ">Date Of Written Warning</label>
                                                <input type="date" class="form-control" name="date_of_written_warning" id="" autocomplete="off"  />
                                            </div>
                                        </div>


                                        <div class="col-md-4">
                                            <label class="form-label ">PIP Issue Date</label>
                                            <input type="date" class="form-control" name="pip_issue_date" id="" autocomplete="off"  />
                                        </div>

                                        <div class="row g-2 align-items-center mt-3">
                                            <div class="col-md-6" id="emppp_appraisal_letter">
                                                <label class="form-label">Appraisal Letter</label>
                                                <input type="file" class="form-control" name="appraisal_letter" id="emppp" />
                                                <?php if (isset($file_error_msgapp)) {
                                                    echo "<div class='invalid-feedback has-error-email' style='display: inline-block;'>$file_error_msgapp</div>";
                                                } ?>
                                            </div>
                                            <div class="col-md-6 align-items-center pt-3" id="emppp_appraisal_letter">
                                                <code>File format allowed .jpg .jpeg .png .gif .PNG .JPG .JPEG</code> <br />
                                                <code>Max file size allowed 500 KB.</code>
                                            </div>
                                        </div>

                                        <div class="row g-2 align-items-center mt-3">
                                            <div class="col-md-6" id="emppp_appraisal_letter1">
                                                <label class="form-label">Appraisal 1</label>
                                                <input type="file" class="form-control" name="appraisal_1" id="emppp" />
                                                <?php if (isset($file_error_msgaap1)) {
                                                    echo "<div class='invalid-feedback has-error-email' style='display: inline-block;'>$file_error_msgaap1</div>";
                                                } ?>
                                            </div>
                                            <div class="col-md-6 align-items-center pt-3" id="emppp_appraisal_letter1">
                                                <code>File format allowed .jpg .jpeg .png .gif .PNG .JPG .JPEG</code> <br />
                                                <code>Max file size allowed 500 KB.</code>
                                            </div>
                                        </div>

                                        <div class="row g-2 align-items-center mt-3">
                                            <div class="col-md-6" id="emppp_appraisal_letter2">
                                                <label class="form-label">Appraisal 2</label>
                                                <input type="file" class="form-control" name="appraisal_2" id="emppp" />
                                                <?php if (isset($file_error_msgaap2)) {
                                                    echo "<div class='invalid-feedback has-error-email' style='display: inline-block;'>$file_error_msgaap2</div>";
                                                } ?>
                                            </div>
                                            <div class="col-md-6 align-items-center pt-3" id="emppp_appraisal_letter2">
                                                <code>File format allowed .jpg .jpeg .png .gif .PNG .JPG .JPEG</code> <br />
                                                <code>Max file size allowed 500 KB.</code>
                                            </div>
                                        </div>

                                        <div class="row g-2 align-items-center">
                                            <div class="col-md-6" id="emppp_appraisal_letter3">
                                                <label class="form-label">Appraisal 3</label>
                                                <input type="file" class="form-control" name="appraisal_3" id="emppp" />
                                                <?php if (isset($file_error_msgaap3)) {
                                                    echo "<div class='invalid-feedback has-error-email' style='display: inline-block;'>$file_error_msgaap3</div>";
                                                } ?>
                                            </div>
                                            <div class="col-md-6 align-items-center pt-3" id="emppp_appraisal_letter3">
                                                <code>File format allowed .jpg .jpeg .png .gif .PNG .JPG .JPEG</code> <br />
                                                <code>Max file size allowed 500 KB.</code>
                                            </div>
                                        </div>

                                        <div class="row g-2 align-items-center">
                                            <div class="col-md-6" id="emppp_appraisal_letter4">
                                                <label class="form-label">Appraisal 4</label>
                                                <input type="file" class="form-control" name="appraisal_4" id="emppp" />
                                                <?php if (isset($file_error_msgaap4)) {
                                                    echo "<div class='invalid-feedback has-error-email' style='display: inline-block;'>$file_error_msgaap4</div>";
                                                } ?>
                                            </div>
                                            <div class="col-md-6 align-items-center pt-3" id="emppp_appraisal_letter4">
                                                <code>File format allowed .jpg .jpeg .png .gif .PNG .JPG .JPEG</code> <br />
                                                <code>Max file size allowed 500 KB.</code>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>

                                <fieldset class="form-fieldset">
                                    <legend>Employee Education</legend>
                                    <div class="row g-2 align-items-center mt-3">
                                        <div class="col-md-6" id="emppp_ssc">
                                            <label class="form-label">Secondary School Certificate</label>
                                            <input type="file" class="form-control" name="ssc" id="emppp" />
                                            <?php if (isset($file_error_msgssc)) {
                                                echo "<div class='invalid-feedback has-error-email' style='display: inline-block;'>$file_error_msgssc</div>";
                                            } ?>
                                        </div>
                                        <div class="col-md-6 align-items-center pt-3" id="emppp_ssc">
                                            <code>File format allowed .jpg .jpeg .png .gif .PNG .JPG .JPEG</code> <br />
                                            <code>Max file size allowed 500 KB.</code>
                                        </div>
                                    </div>

                                    <div class="row g-2 align-items-center mt-3">
                                        <div class="col-md-6" id="emppp_hsc">
                                            <label class="form-label">Higher Secondary School Certificate</label>
                                            <input type="file" class="form-control" name="hsc" id="emppp" />
                                            <?php if (isset($file_error_msghssc)) {
                                                echo "<div class='invalid-feedback has-error-email' style='display: inline-block;'>$file_error_msghssc</div>";
                                            } ?>
                                        </div>
                                        <div class="col-md-6 align-items-center pt-3" id="emppp_hsc">
                                            <code>File format allowed .jpg .jpeg .png .gif .PNG .JPG .JPEG</code> <br />
                                            <code>Max file size allowed 500 KB.</code>
                                        </div>
                                    </div>

                                    <div class="row g-2 align-items-center mt-3">
                                        <div class="col-md-6" id="emppp_graduation">
                                            <label class="form-label">Graduation</label>
                                            <input type="file" class="form-control" name="graduation" id="emppp" />
                                            <?php if (isset($file_error_msgg)) {
                                                echo "<div class='invalid-feedback has-error-email' style='display: inline-block;'>$file_error_msgg</div>";
                                            } ?>
                                        </div>
                                        <div class="col-md-6 align-items-center pt-3" id="emppp_graduation">
                                            <code>File format allowed .jpg .jpeg .png .gif .PNG .JPG .JPEG</code> <br />
                                            <code>Max file size allowed 500 KB.</code>
                                        </div>
                                    </div>

                                    <div class="row g-2 align-items-center mt-3">
                                        <div class="col-md-6" id="emppp_experience_relieving">
                                            <label class="form-label">Experience Relieving</label>
                                            <input type="file" class="form-control" name="experience_relieving" id="emppp" />
                                            <?php if (isset($file_error_msger)) {
                                                echo "<div class='invalid-feedback has-error-email' style='display: inline-block;'>$file_error_msger</div>";
                                            } ?>
                                        </div>
                                        <div class="col-md-6 align-items-center pt-3" id="emppp_experience_relieving">
                                            <code>File format allowed .jpg .jpeg .png .gif .PNG .JPG .JPEG</code> <br />
                                            <code>Max file size allowed 500 KB.</code>
                                        </div>
                                    </div>
                                </fieldset>

                                <fieldset class="form-fieldset">
                                    <legend>Employee Family Details</legend>
                                    <div class="row g-2 align-items-center mt-3">
                                        <div class="col-md-2" id="father_name">
                                            <label class="form-label">Father Name</label>
                                            <input type="text" class="form-control" name="father_name" id="emp_father_name" />
                                        </div>

                                        <div class="col-md-2" id="emppp_nominee_details">
                                            <label class="form-label">Nominee Details</label>
                                            <input type="text" class="form-control" name="nominee_details" id="emp_nominee_details" />
                                        </div>

                                        <div class="col-md-2" id="emppp_relation">
                                            <label class="form-label">Relation</label>
                                            <input type="text" class="form-control" name="relation" id="emp_relation" />
                                        </div>

                                        <div class="col-md-2" id="emppp_address">
                                            <label class="form-label">Address</label>
                                            <input type="text" class="form-control" name="address" id="emp_address" />
                                        </div>

                                        <div class="col-md-2" id="emppp_no_of_family_member">
                                            <label class="form-label">No Of Family Member</label>
                                            <input type="text" class="form-control" name="no_of_family_member" id="emp_no_of_family_member" />
                                        </div>
                                    </div>
                                </fieldset>

                                <fieldset class="form-fieldset">
                                    <legend>Employee Personal Details</legend>
                                    <div class="row g-2 align-items-center mt-3">
                                        <div class="col-md-2" id="gender">
                                            <label class="form-label">Gender</label>
                                            <input type="text" class="form-control" name="gender" id="emp_gender" />
                                        </div>

                                        <div class="col-md-2" id="emppp_marital_status">
                                            <label class="form-label">Marital Status</label>
                                            <input type="text" class="form-control" name="marital_status" id="emp_marital_status" />
                                        </div>

                                        <div class="col-md-2" id="emppp_dob">
                                            <label class="form-label">Date Of Birthday</label>
                                            <input type="text" class="form-control" name="dob" id="emp_dob" />
                                        </div>

                                        <div class="col-md-2" id="emppp_phone">
                                            <label class="form-label">Phone</label>
                                            <input type="text" class="form-control" name="phone" id="emp_phone" />
                                        </div>

                                        <div class="col-md-2" id="emppp_mobile">
                                            <label class="form-label">Mobile</label>
                                            <input type="text" class="form-control" name="mobile" id="emp_mobile" />
                                        </div>

                                        <div class="col-md-2" id="emppp_primary_email">
                                            <label class="form-label">Primary Email</label>
                                            <input type="text" class="form-control" name="primary_email" id="emp_primary_email" />
                                        </div>

                                        <div class="row g-2 align-content-center">
                                            <div class="col-md-2" id="emppp_present_address_h_no">
                                                <label class="form-label">Present Aaddress H.no</label>
                                                <input type="text" class="form-control" name="present_address_h_no" id="emp_present_address_h_no" />
                                            </div>

                                            <div class="col-md-2" id="emppp_lacality_building">
                                                <label class="form-label">Lacality Building</label>
                                                <input type="text" class="form-control" name="lacality_building" id="emp_lacality_building" />
                                            </div>

                                            <div class="col-md-2" id="emppp_area">
                                                <label class="form-label">Area</label>
                                                <input type="text" class="form-control" name="area" id="emp_area" />
                                            </div>

                                            <div class="col-md-2" id="emppp_district">
                                                <label class="form-label">District</label>
                                                <input type="text" class="form-control" name="district" id="emp_district" />
                                            </div>

                                            <div class="col-md-2" id="emppp_state">
                                                <label class="form-label">State</label>
                                                <input type="text" class="form-control" name="state" id="emp_state" />
                                            </div>

                                            <div class="col-md-2" id="emppp_post_code">
                                                <label class="form-label">Post Code</label>
                                                <input type="text" class="form-control" name="post_code" id="emp_post_code" />
                                            </div>
                                        </div>

                                        <div class="row g-2 align-content-center">
                                            <div class="col-md-2" id="emppp_permanent_address_h_no">
                                                <label class="form-label">Permanent Address H.no</label>
                                                <input type="text" class="form-control" name="permanent_address_h_no" id="emp_permanent_address_h_no" />
                                            </div>

                                            <div class="col-md-2" id="emppp_per_lacality_building">
                                                <label class="form-label">Permanent Lacality Building</label>
                                                <input type="text" class="form-control" name="per_lacality_building" id="emp_per_lacality_building" />
                                            </div>

                                            <div class="col-md-2" id="emppp_per_area">
                                                <label class="form-label">Permanent Area</label>
                                                <input type="text" class="form-control" name="per_area" id="emp_per_area" />
                                            </div>

                                            <div class="col-md-2" id="emppp_per_district">
                                                <label class="form-label">Permanent District</label>
                                                <input type="text" class="form-control" name="per_district" id="emp_per_district" />
                                            </div>

                                            <div class="col-md-2" id="emppp_per_state">
                                                <label class="form-label">Permanent State</label>
                                                <input type="text" class="form-control" name="per_state" id="emp_per_state" />
                                            </div>

                                            <div class="col-md-2" id="emppp_per_post_code">
                                                <label class="form-label">Permanent Post Code</label>
                                                <input type="text" class="form-control" name="per_post_code" id="emp_per_post_code" />
                                            </div>
                                        </div>

                                        <div class="col-md-2" id="emppp_aadhaar">
                                            <label class="form-label">Aadhaar No</label>
                                            <input type="text" class="form-control" name="aadhaar" id="emp_aadhaar" />
                                        </div>

                                        <div class="col-md-2" id="emppp_blood_group">
                                            <label class="form-label">Blood Group</label>
                                            <input type="text" class="form-control" name="blood_group" id="emp_blood_group" />
                                        </div>

                                        <div class="col-md-2" id="emppp_emy_contact_no">
                                            <label class="form-label">Emy No</label>
                                            <input type="text" class="form-control" name="emy_contact_no" id="emp_emy_contact_no" />
                                        </div>

                                        <div class="col-md-2" id="emppp_emy_contact_relation">
                                            <label class="form-label">Emy Contact Relation</label>
                                            <input type="text" class="form-control" name="emy_contact_relation" id="emp_emy_contact_relation" />
                                        </div>

                                        <div class="col-md-2" id="emppp_emy_contact_email">
                                            <label class="form-label">Emy Contact Email</label>
                                            <input type="text" class="form-control" name="emy_contact_email" id="emp_emy_contact_email" />
                                        </div>

                                        <div class="col-md-2" id="emppp_no_of_bank">
                                            <label class="form-label">Total Bank</label>
                                            <input type="text" class="form-control" name="no_of_bank" id="emp_no_of_bank" />
                                        </div>

                                        <div class="col-md-2" id="emppp_no_of_family_member">
                                            <label class="form-label">Total family Member</label>
                                            <input type="text" class="form-control" name="no_of_family_member" id="emp_no_of_family_member" />
                                        </div>

                                        <div class="col-md-2" id="emppp_mob_link_uan_no">
                                            <label class="form-label">Mobile Link UAN No</label>
                                            <input type="text" class="form-control" name="mob_link_uan_no" id="emp_mob_link_uan_no" />
                                        </div>
                                    </div>

                                    <div class="row g-2 align-content-center">
                                        <div class="col-md-6" id="emppp_salary_slip">
                                            <label class="form-label">Salary Ship</label>
                                            <input type="file" class="form-control" name="salary_slip" id="emp_salary_slip" />
                                            <?php if (isset($file_error_msgss)) {
                                                echo "<div class='invalid-feedback has-error-email' style='display: inline-block;'>$file_error_msgss</div>";
                                            } ?>
                                        </div>
                                        <div class="col-md-6 align-items-center pt-3" id="emppp_experience_relieving">
                                            <code>File format allowed .jpg .jpeg .png .gif .PNG .JPG .JPEG</code> <br />
                                            <code>Max file size allowed 500 KB.</code>
                                        </div>
                                    </div>

                                    <div class="row g-2 align-content-center">
                                        <div class="col-md-6" id="emppp_bank_statement">
                                            <label class="form-label">Bank Statement</label>
                                            <input type="file" class="form-control" name="bank_statement" id="emp_bank_statement" />
                                            <?php if (isset($file_error_msgbs)) {
                                                echo "<div class='invalid-feedback has-error-email' style='display: inline-block;'>$file_error_msgbs</div>";
                                            } ?>
                                        </div>
                                        <div class="col-md-6 align-items-center pt-3" id="emppp_experience_relieving">
                                            <code>File format allowed .jpg .jpeg .png .gif .PNG .JPG .JPEG</code> <br />
                                            <code>Max file size allowed 500 KB.</code>
                                        </div>
                                    </div>

                                    <div class="row g-2 align-content-center">
                                        <div class="col-md-6" id="emppp_cancel_cheque">
                                            <label class="form-label">Cancel Cheque</label>
                                            <input type="file" class="form-control" name="cancel_cheque" id="emp_cancel_cheque" />
                                            <?php if (isset($file_error_msgcc)) {
                                                echo "<div class='invalid-feedback has-error-email' style='display: inline-block;'>$file_error_msgcc</div>";
                                            } ?>
                                        </div>
                                        <div class="col-md-6 align-items-center pt-3" id="emppp_experience_relieving">
                                            <code>File format allowed .jpg .jpeg .png .gif .PNG .JPG .JPEG</code> <br />
                                            <code>Max file size allowed 500 KB.</code>
                                        </div>
                                    </div>


                                </fieldset>

                                <fieldset class="form-fieldset">
                                    <legend>Allowances</legend>
                                    <div class="row g-2 align-items-center mt-3">
                                        <div class="col-md-2">
                                            <label class="form-label required">Food Allowance</label>
                                            <input type="text" class="form-control" name="food_allw" value="<?php if (isset($_POST["food_allw"])) {
                                                                                                                echo $_POST["food_allw"];
                                                                                                            } else {
                                                                                                                echo "2200";
                                                                                                            } ?>" id="empfoodallw" autocomplete="off" required />
                                        </div>
                                        <div class="col-md-2">
                                            <label class="form-label required">Travel Allowance</label>
                                            <input type="text" class="form-control" name="travel_allw" value="<?php if (isset($_POST["travel_allw"])) {
                                                                                                                    echo $_POST["travel_allw"];
                                                                                                                } else {
                                                                                                                    echo "2200";
                                                                                                                } ?>" id="emptravelallw" value="2200" autocomplete="off" required />
                                        </div>
                                        <div class="col-md-2">
                                            <label class="form-label">Special Allowances</label>
                                            <input type="text" class="form-control" name="spl_allowance" value="<?php if (isset($_POST["spl_allowance"])) {
                                                                                                                    echo $_POST["spl_allowance"];
                                                                                                                } else {
                                                                                                                    echo "0";
                                                                                                                } ?>" id="empsplallw" autocomplete="off" />
                                        </div>
                                        <div class="col-md-2">
                                            <label class="form-check" style="margin-bottom: 0; margin-top: 1rem;">
                                                <input type="hidden" value="0" name="msa" />
                                                <input type="checkbox" class="form-check-input" value="1" name="msa" checked />
                                                <span class="form-check-label">Meal Service Availed</span>
                                            </label>
                                        </div>
                                        <div class="col-md-2">
                                            <label class="form-check" style="margin-bottom: 0; margin-top: 1rem;">
                                                <input type="hidden" value="0" name="tsa" />
                                                <input type="checkbox" class="form-check-input" value="1" name="tsa" checked />
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
                                            <input type="text" class="form-control" name="stack" id="empstack" value="<?php if (isset($_POST["stack"])) {
                                                                                                                            echo $_POST["stack"];
                                                                                                                        } else {
                                                                                                                            echo "0";
                                                                                                                        } ?>" autocomplete="off" required />
                                        </div>
                                        <div class="col-md-2">
                                            <label class="form-label required">Incentive</label>
                                            <input type="text" class="form-control" name="inc" value="<?php if (isset($_POST["inc"])) {
                                                                                                            echo $_POST["inc"];
                                                                                                        } else {
                                                                                                            echo "0";
                                                                                                        } ?>" id="empincentive" autocomplete="off" required />
                                        </div>
                                        <div class="col-md-2">
                                            <label class="form-label">Others <span class="form-help" data-bs-toggle="popover" data-bs-placement="top" data-bs-html="true" data-bs-content="<p>Others is adjustments in positive amount or in negative amount. Positive and Negative amount will add in earnings and deductions respectively. E.g 2000 (+ve amt), -2000 (-ve amt). </p>">?</span></label>
                                            <input type="text" class="form-control" name="others" value="<?php if (isset($_POST["others"])) {
                                                                                                                echo $_POST["others"];
                                                                                                            } else {
                                                                                                                echo "0";
                                                                                                            } ?>" id="empothers" autocomplete="off" />
                                        </div>
                                    </div>
                                </fieldset>

                                <fieldset class="form-fieldset">
                                    <legend>Employee Credentials</legend>
                                    <div class="row g-2 align-items-center">
                                        <div class="col-md-2" id="userid_div">
                                            <label class="form-label required">Employee User Id</label>
                                            <input type="text" class="form-control" name="emp_user_id" value="<?php if (isset($_POST["emp_user_id"])) {
                                                                                                                    echo $_POST["emp_user_id"];
                                                                                                                } ?>" id="emp_u_id" autocomplete="off" onchange="checkuserid();" readonly />
                                        </div>
                                        <div class="col-md-2">
                                            <label class="form-label required">Employee Password</label>
                                            <input type="password" class="form-control" name="emp_pswd" id="emp_pass" autocomplete="off" required />
                                        </div>
                                    </div>
                                </fieldset>
                                
                                <fieldset class="form-fieldset">
                                    <legend>Employee Exit & Description</legend>
                                    <div class="row g-2 align-items-center">
                                        <div class="col-md-2">
                                            <label class="form-label">Employee Exit Date</label>
                                            <input type="date" class="form-control" name="eed" onchange="deactivateemp();" autocomplete="off" />
                                        </div>
                                        <div class="col-md-2">
                                            <label class="form-label">Exit Formalities</label>
                                            <input type="text" class="form-control" name="exit_formalities" autocomplete="off" />
                                        </div>
                                        <div class="col-md-2">
                                            <label class="form-label">Full and Final Settlement</label>
                                            <input type="text" class="form-control" name="fnf" autocomplete="off" />
                                        </div>
                                        <div class="col-md-2">
                                            <label class="form-label">Reason Of Leaving</label>
                                            <input type="text" class="form-control" name="reason_of_leaving" autocomplete="off" />
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
                                    <legend class="">Employee Status</legend>
                                    <div class="row g-2 align-items-center">
                                        <div class="col-md-2">
                                            <div class="form-label required">
                                                Employee Status
                                            </div>
                                            <select class="form-select" name="emp_status" id="empstate">
                                                <option value="0">Inactive</option>
                                                <option value="1">Active</option>
                                            </select>
                                        </div>
                                        <?php
                                        if ($_SESSION["user_type"] == 2 && $_SESSION["country_type"] == 'In') {
                                            echo '<div class="col-md-2">
                            <div class="form-label required">
                                Country Status
                            </div>
                            <select class="form-select " name="country_type" id="">
                                <option value="In">India</option>
                            </select>
                        </div>';
                                        } else if ($_SESSION["user_type"] == 2 && $_SESSION["country_type"] == 'Ph') {
                                            echo '<div class="col-md-2">
                            <div class="form-label required">
                                Country Status
                            </div>
                            <select class="form-select " name="country_type" id="">
                                <option value="Ph">Philippines</option>
                            </select>
                        </div>';
                                        } else {
                                            echo '<div class="col-md-2">
                            <div class="form-label required">
                                Country Status
                            </div>
                            <select class="form-select " name="country_type" id="">
                                <option value="In">India</option>
                                <option value="Ph">Philippines</option>
                            </select>
                        </div>';
                                        }
                                        ?>
                                        <div class="col-md-2">
                                            <div class="form-label required">
                                                Employee Role
                                            </div>
                                            <select class="form-select " name="emp_role">
                                                <!-- <option value="1" <?php if ($rowid["user_type"] == '1') echo ' selected="selected"'; ?>>Admin</option> -->
                                                <option value="3">User</option>
                                                <option value="2">Moderator</option>
                                            </select>
                                        </div>
                                    </div>
                                </fieldset>
                                <input type="hidden" value="3" name="user_type" />
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
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon mb-2 text-danger icon-lg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M12 9v2m0 4v.01" />
                            <path d="M5 19h14a2 2 0 0 0 1.84 -2.75l-7.1 -12.25a2 2 0 0 0 -3.5 0l-7.1 12.25a2 2 0 0 0 1.75 2.75" />
                        </svg>
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

                bootstrapValidate('#empname', 'alpha:Please enter valid Employee Name', function(isValid) {
                    if (isValid) {
                        fieldValid = true;
                    } else {
                        fieldValid = false;
                    }
                });

                bootstrapValidate('#empdesg', 'alpha:Please enter valid Employee Designation', function(isValid) {
                    if (isValid) {
                        fieldValid = true;
                    } else {
                        fieldValid = false;
                    }
                });

                bootstrapValidate('#emp_email', 'email:Please enter valid email id', function(isValid) {
                    if (isValid) {
                        fieldValid = true;
                    } else {
                        fieldValid = false;
                    }
                });

                bootstrapValidate('#empdept', 'alphanum:Please enter valid Employee Department', function(isValid) {
                    if (isValid) {
                        fieldValid = true;
                    } else {
                        fieldValid = false;
                    }
                });

                bootstrapValidate('#emppan', 'alphanum:Please enter valid Employee PAN No.', function(isValid) {
                    if (isValid) {
                        fieldValid = true;
                    } else {
                        fieldValid = false;
                    }
                });

                bootstrapValidate('#empuan', 'alphanum:Please enter valid Employee UAN No.', function(isValid) {
                    if (isValid) {
                        fieldValid = true;
                    } else {
                        fieldValid = false;
                    }
                });

                bootstrapValidate('#empesi', 'alphanum:Please enter valid Employee ESI No.', function(isValid) {
                    if (isValid) {
                        fieldValid = true;
                    } else {
                        fieldValid = false;
                    }
                });

                bootstrapValidate('#empbank', 'alphanum:Please enter valid Bank Name', function(isValid) {
                    if (isValid) {
                        fieldValid = true;
                    } else {
                        fieldValid = false;
                    }
                });

                bootstrapValidate('#empifsc', 'alphanum:Please enter valid IFS Code', function(isValid) {
                    if (isValid) {
                        fieldValid = true;
                    } else {
                        fieldValid = false;
                    }
                });

                bootstrapValidate('#empacc', 'integer:Please enter valid Account No.', function(isValid) {
                    if (isValid) {
                        fieldValid = true;
                    } else {
                        fieldValid = false;
                    }
                });

                bootstrapValidate('#empgrssal', 'numeric:Please enter valid Gross Salary', function(isValid) {
                    if (isValid) {
                        fieldValid = true;
                    } else {
                        fieldValid = false;
                    }
                });

                bootstrapValidate('#emp_annual_ctc_in', 'numeric:Please enter valid Salary', function(isValid) {
                    if (isValid) {
                        fieldValid = true;
                    } else {
                        fieldValid = false;
                    }
                });

                bootstrapValidate('#emp_in_hand_salary_with_stack', 'numeric:Please enter Salary', function(isValid) {
                    if (isValid) {
                        fieldValid = true;
                    } else {
                        fieldValid = false;
                    }
                });

                bootstrapValidate('#emp_final_ctc_all', 'numeric:Please enter valid Salary', function(isValid) {
                    if (isValid) {
                        fieldValid = true;
                    } else {
                        fieldValid = false;
                    }
                });

                bootstrapValidate('#emp_transport_r_a', 'numeric:Please enter valid Salary', function(isValid) {
                    if (isValid) {
                        fieldValid = true;
                    } else {
                        fieldValid = false;
                    }
                });

                bootstrapValidate('#annual_ctc_new', 'numeric:Please enter valid Salary', function(isValid) {
                    if (isValid) {
                        fieldValid = true;
                    } else {
                        fieldValid = false;
                    }
                });

                bootstrapValidate('#empfoodallw', 'numeric:Please enter valid Food Allowance Amount', function(isValid) {
                    if (isValid) {
                        fieldValid = true;
                    } else {
                        fieldValid = false;
                    }
                });

                bootstrapValidate('#emptravelallw', 'numeric:Please enter valid Travel Allowance Amount', function(isValid) {
                    if (isValid) {
                        fieldValid = true;
                    } else {
                        fieldValid = false;
                    }
                });

                bootstrapValidate('#empsplallw', 'numeric:Please enter valid Special Allowance Amount', function(isValid) {
                    if (isValid) {
                        fieldValid = true;
                    } else {
                        fieldValid = false;
                    }
                });

                bootstrapValidate('#empstack', 'numeric:Please enter valid Stack Incentive Amount', function(isValid) {
                    if (isValid) {
                        fieldValid = true;
                    } else {
                        fieldValid = false;
                    }
                });

                bootstrapValidate('#empincentive', 'numeric:Please enter valid Incentive Amount', function(isValid) {
                    if (isValid) {
                        fieldValid = true;
                    } else {
                        fieldValid = false;
                    }
                });

                bootstrapValidate('#empothers', 'numeric:Please enter valid Others Amount', function(isValid) {
                    if (isValid) {
                        fieldValid = true;
                    } else {
                        fieldValid = false;
                    }
                });

                bootstrapValidate('#emp_pass', 'min:6:Enter at least 6 characters', function(isValid) {
                    if (isValid) {
                        fieldValid = true;
                    } else {
                        fieldValid = false;
                    }
                });

                bootstrapValidate('#emp_nick_name', 'alphanum:Please enter valid Country.', function(isValid) {
                    if (isValid) {
                        fieldValid = true;
                    } else {
                        fieldValid = false;
                    }
                });

                bootstrapValidate('#emp_line_manager', 'alphanum:Please enter valid Country.', function(isValid) {
                    if (isValid) {
                        fieldValid = true;
                    } else {
                        fieldValid = false;
                    }
                });

                bootstrapValidate('#emp_joining_month', 'alphanum:Please enter valid .', function(isValid) {
                    if (isValid) {
                        fieldValid = true;
                    } else {
                        fieldValid = false;
                    }
                });

                bootstrapValidate('#emp_date_of_hitting', 'alphanum:Please enter valid .', function(isValid) {
                    if (isValid) {
                        fieldValid = true;
                    } else {
                        fieldValid = false;
                    }
                });

                bootstrapValidate('#emp_ageing', 'alphanum:Please enter valid .', function(isValid) {
                    if (isValid) {
                        fieldValid = true;
                    } else {
                        fieldValid = false;
                    }
                });

                bootstrapValidate('#emp_rejoing_on', 'alphanum:Please enter valid .', function(isValid) {
                    if (isValid) {
                        fieldValid = true;
                    } else {
                        fieldValid = false;
                    }
                });

                bootstrapValidate('#emp_date_of_confirmation', 'alphanum:Please enter valid .', function(isValid) {
                    if (isValid) {
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
                        200: function(response) {
                            if (response == 1) {
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
                        200: function(response) {
                            if (response == 1) {
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
            if (redir == 1) {
                window.location.replace("error-404.php");
            }
        </script>