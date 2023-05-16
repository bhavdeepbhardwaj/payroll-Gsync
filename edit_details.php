<?php $parent_page = "emp"; ?>
<?php $page = "view_emps"; ?>
<?php include "config.php"; ?>
<?php include "header.php"; ?>

<?php

if ($_SESSION["user_type"] == 3) {
    $redirectPg = 1;
} else {
    $redirectPg = 0;
}

?>

<?php
$id = $_GET["edit"];
$row = array();
$sql = "SELECT * FROM gs_employees WHERE emp_id = '" . $id . "'";

$res = mysqli_query($link, $sql);

$row = mysqli_fetch_assoc($res);
// echo "<pre>";
// print_r($row);
// die;

$empid = $row["emp_id"];

$sqlid = "SELECT * FROM users WHERE username = '" . $empid . "'";

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
                            <form name="update_form" action="update_emp.php" method="POST">
                                <fieldset class="form-fieldset">
                                    <legend>Employee Details</legend>
                                    <div class="row g-2 align-items-center">
                                        <div class="col-md-2 text-center">
                                            <?php if (file_exists($row['emp_pic'])) { ?>
                                                <!-- <span class="avatar avatar-2xl" style="background-image: url(./<?php echo $row['emp_pic']; ?>)"></span> -->
                                                <img src="./<?php echo $row['emp_pic']; ?>" class="avatar avatar-xl" />
                                            <?php } else { ?>
                                                <span class="avatar avatar-xl"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                        <circle cx="12" cy="7" r="4"></circle>
                                                        <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
                                                    </svg></span>
                                            <?php } ?>
                                            <a href="#" class="btn mt-2" data-bs-toggle="modal" data-bs-target="#modal-changepp">
                                                <!-- Download SVG icon from http://tabler-icons.io/i/brand-vk -->
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1"></path>
                                                    <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z"></path>
                                                    <path d="M16 5l3 3"></path>
                                                </svg>
                                                Change Picture
                                            </a>
                                        </div>
                                        <div class="col-md-10">
                                            <div class="row g-2">
                                                <div class="col-md-2" id="empid_div">
                                                    <label class="form-label required">Employee Id</label>
                                                    <input type="text" class="form-control" name="emp_id" id="empid" value="<?php echo $row["emp_id"]; ?>" autocomplete="off" onchange="create_id();" readonly />
                                                </div>
                                                <div class="col-md-2">
                                                    <label class="form-label required">Full Name</label>
                                                    <input type="text" class="form-control" name="full_name" value="<?php echo $row["emp_name"]; ?>" id="empname" autocomplete="off" required />
                                                </div>
                                                <div class="col-md-2">
                                                    <label class="form-label required">Designation</label>
                                                    <input type="text" class="form-control" name="emp_designation" value="<?php echo $row["emp_desg"]; ?>" id="empdesg" autocomplete="on" required />
                                                </div>
                                                <div class="col-md-2">
                                                    <label class="form-label required">Email Id</label>
                                                    <input type="email" class="form-control" name="email" value="<?php echo $row["emp_mail"]; ?>" id="emp_email" autocomplete="off" required />
                                                </div>
                                                <div class="col-md-2">
                                                    <label class="form-label required">Date of Join</label>
                                                    <input type="date" class="form-control" name="doj" value="<?php echo $row["doj"]; ?>" autocomplete="off" required />
                                                </div>
                                                <div class="col-md-2">
                                                    <label class="form-label required">Department</label>
                                                    <input type="text" class="form-control" name="department" value="<?php echo $row["emp_dept"]; ?>" id="empdept" autocomplete="on" required />
                                                </div>
                                                <div class="col-md-2">
                                                    <label class="form-label required">PAN No.</label>
                                                    <input type="text" class="form-control" name="pan" value="<?php echo $row["emp_pan"]; ?>" id="emppan" autocomplete="off" required />
                                                </div>
                                                <div class="col-md-2">
                                                    <label class="form-label">UAN NO.</label>
                                                    <input type="text" class="form-control" name="uan" value="<?php echo $row["emp_uan"]; ?>" id="empuan" autocomplete="off" />
                                                </div>
                                                <div class="col-md-2">
                                                    <label class="form-label">ESI No.</label>
                                                    <input type="text" class="form-control" name="esi" value="<?php echo $row["emp_esi"]; ?>" id="empesi" autocomplete="off" />
                                                </div>
                                                <div class="col-md-2">
                                                    <label class="form-label">Nick Name</label>
                                                    <input type="text" class="form-control" name="nick_name" value="<?php echo $row["nick_name"]; ?>" id="empnick_name" autocomplete="off" />
                                                </div>
                                                <div class="col-md-2">
                                                    <label class="form-label">Joining Month</label>
                                                    <input type="text" class="form-control" name="joining_month" value="<?php echo $row["joining_month"]; ?>" id="empjoining_month" autocomplete="off" />
                                                </div>
                                                <div class="col-md-2">
                                                    <label class="form-label">Date of Hitting</label>
                                                    <input type="date" class="form-control" name="date_of_hitting" value="<?php echo $row["date_of_hitting"]; ?>" id="empdate_of_hitting" autocomplete="off" />
                                                </div>
                                                <div class="col-md-2">
                                                    <label class="form-label">Ageing</label>
                                                    <input type="text" class="form-control" name="ageing" value="<?php echo $row["ageing"]; ?>" id="empageing" autocomplete="off" />
                                                </div>
                                                <div class="col-md-2">
                                                    <label class="form-label">Rejoin on</label>
                                                    <input type="date" class="form-control" name="rejoing_on" value="<?php echo $row["rejoing_on"]; ?>" id="emprejoing_on" autocomplete="off" />
                                                </div>
                                                <div class="col-md-2">
                                                    <label class="form-label">DOC <span class="form-help" data-bs-toggle="popover" data-bs-placement="top" data-bs-html="true" data-bs-content="<p>Date of Confirmation. </p>">?</span></label>
                                                    <input type="date" class="form-control" name="date_of_confirmation" value="<?php echo $row["date_of_confirmation"]; ?>" id="empdate_of_confirmation" autocomplete="off" />
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
                                            <input type="text" class="form-control" name="bank" value="<?php echo $row["emp_bank"]; ?>" id="empbank" autocomplete="on" />
                                        </div>
                                        <div class="col-md-2">
                                            <label class="form-label">IFSC</label>
                                            <input type="text" class="form-control" name="ifsc" value="<?php echo $row["emp_ifsc"]; ?>" id="empifsc" autocomplete="off" />
                                        </div>
                                        <div class="col-md-2">
                                            <label class="form-label">Account No.</label>
                                            <input type="text" class="form-control" name="ac_no" value="<?php echo $row["emp_acc"]; ?>" id="empacc" autocomplete="off" />
                                        </div>
                                        <div class="col-md-2">
                                            <label class="form-label required">Gross Salary</label>
                                            <input type="text" class="form-control" name="gross" value="<?php echo $row["emp_gsal"]; ?>" id="empgrssal" autocomplete="off" required />
                                        </div>
                                        <div class="col-md-2">
                                            <label class="form-label ">Annual CTC</label>
                                            <input type="text" class="form-control" name="annual_ctc_in" value="<?php echo $row["annual_ctc_in"]; ?>" id="empannual_ctc_in" autocomplete="off" />
                                        </div>
                                        <div class="col-md-2">
                                            <label class="form-label ">IN Hand <span class="form-help" data-bs-toggle="popover" data-bs-placement="top" data-bs-html="true" data-bs-content="<p>Salary with stack. </p>">?</span></label>
                                            <input type="text" class="form-control" name="in_hand_salary_with_stack" value="<?php echo $row["in_hand_salary_with_stack"]; ?>" id="empin_hand_salary_with_stack" autocomplete="off" />
                                        </div>
                                        <div class="col-md-2">
                                            <label class="form-label ">Annual CTC NEW</label>
                                            <input type="text" class="form-control" name="annual_ctc_new" value="<?php echo $row["annual_ctc_new"]; ?>" id="empannual_ctc_new" autocomplete="off" />
                                        </div>
                                        <div class="col-md-2">
                                            <label class="form-label ">Final CTC</label>
                                            <input type="text" class="form-control" name="final_ctc_all" value="<?php echo $row["final_ctc_all"]; ?>" id="empfinal_ctc_all" autocomplete="off" />
                                        </div>
                                        <div class="col-md-2">
                                            <label class="form-label ">TRA <span class="form-help" data-bs-toggle="popover" data-bs-placement="top" data-bs-html="true" data-bs-content="<p>Transport Reimbursement Applicable. </p>">?</span></label>
                                            <input type="text" class="form-control" name="transport_r_a" value="<?php echo $row["transport_r_a"]; ?>" id="emptransport_r_a" autocomplete="off" />
                                        </div>
                                    </div>
                                </fieldset>

                                <fieldset class="form-fieldset">
                                    <legend>Employee Journey</legend>
                                    <div class="row g-2 align-items-center">
                                        <div class="col-md-2" id="">
                                            <label class="form-label ">Performer Month</label>
                                            <input type="text" class="form-control" name="performer_month" id="empperformer_month" value="<?php echo $row["performer_month"]; ?>" autocomplete="off" />
                                        </div>
                                        <div class="col-md-2">
                                            <label class="form-label ">Verbal Warning</label>
                                            <input type="text" class="form-control" name="verbal_warning" id="empverbal_warning" value="<?php echo $row["verbal_warning"]; ?>" autocomplete="off" />
                                        </div>
                                        <div class="col-md-2">
                                            <label class="form-label ">Date Of Verbal Warning</label>
                                            <input type="date" class="form-control" name="date_of_verbal_warning" id="empdate_of_verbal_warning" value="<?php echo $row["date_of_verbal_warning"]; ?>" autocomplete="off" />
                                        </div>
                                        <div class="col-md-2">
                                            <label class="form-label ">Total Verbal Warning</label>
                                            <input type="text" class="form-control" name="no_of_warning" id="empno_of_warning" value="<?php echo $row["no_of_warning"]; ?>" autocomplete="off" />
                                        </div>

                                        <div class="col-md-2">
                                            <label class="form-label required">Line Manager</label>
                                            <input type="text" class="form-control" name="line_manager" id="empline_manager" value="<?php echo $row["line_manager"]; ?>" autocomplete="off" required />
                                        </div>

                                        <div class="col-md-2">
                                            <label class="form-label ">Type Of Attrition</label>
                                            <input type="text" class="form-control" name="type_of_attrition" id="emptype_of_attrition" value="<?php echo $row["type_of_attrition"]; ?>" autocomplete="off" />
                                        </div>

                                        <div class="row g-2 align-items-center mt-3">
                                            <div class="col-md-4">
                                                <label class="form-label ">Reason Of Verbal Warning</label>
                                                <textarea class="form-control" name="reason_of_verbal_warning" id="empreason_of_verbal_warning" value="<?php echo $row["reason_of_verbal_warning"]; ?>" data-bs-toggle="autosize" placeholder="Type something…"><?php echo $row["reason_of_verbal_warning"]; ?></textarea>
                                            </div>
                                            <div class="col-md-4">
                                                <label class="form-label ">Reasson of Warning</label>
                                                <textarea class="form-control" name="reason_of_warning" id="empreason_of_warning" value="<?php echo $row["reason_of_warning"]; ?>" data-bs-toggle="autosize" placeholder="Type something…"><?php echo $row["reason_of_warning"]; ?></textarea>
                                            </div>
                                            <div class="col-md-4">
                                                <label class="form-label ">Date Of Written Warning</label>
                                                <input type="date" class="form-control" name="date_of_written_warning" id="empdate_of_written_warning" value="<?php echo $row["date_of_written_warning"]; ?>" autocomplete="off" />
                                            </div>
                                        </div>


                                        <div class="col-md-4">
                                            <label class="form-label ">PIP Issue Date</label>
                                            <input type="date" class="form-control" name="pip_issue_date" id="emppip_issue_date" value="<?php echo $row["pip_issue_date"]; ?>" autocomplete="off" />
                                        </div>

                                        <div class="row g-2 align-items-center mt-3">
                                            <div class="col-md-6" id="">
                                                <label class="form-label">Appraisal Letter</label>
                                                <!-- <iframe src="<?php echo $row["appraisal_letter"]; ?>" width="100%" height="500px"></iframe> -->
                                                <!-- <input type="file" class="form-control" name="appraisal_letter" id="emppp" value="<?php echo $row["appraisal_letter"]; ?>" /> -->
                                                <input type="text" class="form-control" name="appraisal_letter" id="emppp_appraisal_letter" value="<?php echo $row["appraisal_letter"]; ?>" />
                                                <?php if (isset($file_error_msgapp)) {
                                                    echo "<div class='invalid-feedback has-error-email' style='display: inline-block;'>$file_error_msgapp</div>";
                                                } ?>
                                            </div>
                                            <div class="col-md-6 align-items-center pt-3" id="">
                                                <!-- <code>File format allowed .jpg .jpeg .png .gif .PNG .JPG .JPEG</code> <br /> -->
                                                <!-- <code>Max file size allowed 500 KB.</code> -->
                                                <code>Paste the drive Link here </code>
                                            </div>
                                        </div>

                                        <div class="row g-2 align-items-center mt-3">
                                            <div class="col-md-6" id="">
                                                <label class="form-label">Appraisal 1</label>
                                                <!-- <iframe src="<?php echo $row["appraisal_1"]; ?>" width="100%" height="500px"></iframe> -->
                                                <!-- <input type="file" class="form-control" name="appraisal_1" id="emppp" value="<?php echo $row["appraisal_1"]; ?>" /> -->
                                                <input type="text" class="form-control" name="appraisal_1" id="emppp_appraisal_letter1" value="<?php echo $row["appraisal_1"]; ?>" />
                                                <?php if (isset($file_error_msgaap1)) {
                                                    echo "<div class='invalid-feedback has-error-email' style='display: inline-block;'>$file_error_msgaap1</div>";
                                                } ?>
                                            </div>
                                            <div class="col-md-6 align-items-center pt-3" id="">
                                                <!-- <code>File format allowed .jpg .jpeg .png .gif .PNG .JPG .JPEG</code> <br /> -->
                                                <!-- <code>Max file size allowed 500 KB.</code> -->
                                                <code>Paste the drive Link here </code>
                                            </div>
                                        </div>

                                        <div class="row g-2 align-items-center mt-3">
                                            <div class="col-md-6" id="">
                                                <label class="form-label">Appraisal 2</label>
                                                <!-- <iframe src="<?php echo $row["appraisal_2"]; ?>" width="100%" height="500px"></iframe> -->
                                                <!-- <input type="file" class="form-control" name="appraisal_2" id="emppp" value="<?php echo $row["appraisal_2"]; ?>" /> -->
                                                <input type="text" class="form-control" name="appraisal_2" id="emppp_appraisal_letter2" value="<?php echo $row["appraisal_2"]; ?>" />
                                                <?php if (isset($file_error_msgaap2)) {
                                                    echo "<div class='invalid-feedback has-error-email' style='display: inline-block;'>$file_error_msgaap2</div>";
                                                } ?>
                                            </div>
                                            <div class="col-md-6 align-items-center pt-3" id="">
                                                <!-- <code>File format allowed .jpg .jpeg .png .gif .PNG .JPG .JPEG</code> <br /> -->
                                                <!-- <code>Max file size allowed 500 KB.</code> -->
                                                <code>Paste the drive Link here </code>
                                            </div>
                                        </div>

                                        <div class="row g-2 align-items-center">
                                            <div class="col-md-6" id="">
                                                <label class="form-label">Appraisal 3</label>
                                                <!-- <iframe src="<?php echo $row["appraisal_3"]; ?>" width="100%" height="500px"></iframe> -->
                                                <!-- <input type="file" class="form-control" name="appraisal_3" id="emppp" value="<?php echo $row["appraisal_3"]; ?>" /> -->
                                                <input type="text" class="form-control" name="appraisal_3" id="emppp_appraisal_letter3" value="<?php echo $row["appraisal_3"]; ?>" />
                                                <?php if (isset($file_error_msgaap3)) {
                                                    echo "<div class='invalid-feedback has-error-email' style='display: inline-block;'>$file_error_msgaap3</div>";
                                                } ?>
                                            </div>
                                            <div class="col-md-6 align-items-center pt-3" id="">
                                                <!-- <code>File format allowed .jpg .jpeg .png .gif .PNG .JPG .JPEG</code> <br /> -->
                                                <!-- <code>Max file size allowed 500 KB.</code> -->
                                                <code>Paste the drive Link here </code>
                                            </div>
                                        </div>

                                        <div class="row g-2 align-items-center">
                                            <div class="col-md-6" id="">
                                                <label class="form-label">Appraisal 4</label>
                                                <!-- <iframe src="<?php echo $row["appraisal_4"]; ?>" width="100%" height="500px"></iframe> -->
                                                <!-- <input type="file" class="form-control" name="appraisal_4" id="emppp" value="<?php echo $row["appraisal_4"]; ?>" /> -->
                                                <input type="text" class="form-control" name="appraisal_4" id="emppp_appraisal_letter4" value="<?php echo $row["appraisal_4"]; ?>" />
                                                <?php if (isset($file_error_msgaap4)) {
                                                    echo "<div class='invalid-feedback has-error-email' style='display: inline-block;'>$file_error_msgaap4</div>";
                                                } ?>
                                            </div>
                                            <div class="col-md-6 align-items-center pt-3" id="">
                                                <!-- <code>File format allowed .jpg .jpeg .png .gif .PNG .JPG .JPEG</code> <br /> -->
                                                <!-- <code>Max file size allowed 500 KB.</code> -->
                                                <code>Paste the drive Link here </code>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>

                                <fieldset class="form-fieldset">
                                    <legend>Employee Education</legend>
                                    <div class="row g-2 align-items-center mt-3">
                                        <div class="col-md-6" id="">
                                            <label class="form-label">Secondary School Certificate</label>
                                            <!-- <iframe src="<?php echo $row["ssc"]; ?>" width="100%" height="500px"></iframe> -->
                                            <!-- <input type="file" class="form-control" name="ssc" id="emppp" value="<?php echo $row["ssc"]; ?>" /> -->
                                            <input type="text" class="form-control" name="ssc" id="emppp_ssc" value="<?php echo $row["ssc"]; ?>" />
                                            <?php if (isset($file_error_msgssc)) {
                                                echo "<div class='invalid-feedback has-error-email' style='display: inline-block;'>$file_error_msgssc</div>";
                                            } ?>
                                        </div>
                                        <div class="col-md-6 align-items-center pt-3" id="">
                                            <!-- <code>File format allowed .jpg .jpeg .png .gif .PNG .JPG .JPEG</code> <br /> -->
                                            <!-- <code>Max file size allowed 500 KB.</code> -->
                                            <code>Paste the drive Link here </code>
                                        </div>
                                    </div>

                                    <div class="row g-2 align-items-center mt-3">
                                        <div class="col-md-6" id="">
                                            <label class="form-label">Higher Secondary School Certificate</label>
                                            <!-- <iframe src="<?php echo $row["hsc"]; ?>" width="100%" height="500px"></iframe> -->
                                            <!-- <input type="file" class="form-control" name="hsc" id="emppp" value="<?php echo $row["hsc"]; ?>" /> -->
                                            <input type="text" class="form-control" name="hsc" id="emppp_hsc" value="<?php echo $row["hsc"]; ?>" />
                                            <?php if (isset($file_error_msghssc)) {
                                                echo "<div class='invalid-feedback has-error-email' style='display: inline-block;'>$file_error_msghssc</div>";
                                            } ?>
                                        </div>
                                        <div class="col-md-6 align-items-center pt-3" id="">
                                            <!-- <code>File format allowed .jpg .jpeg .png .gif .PNG .JPG .JPEG</code> <br /> -->
                                            <!-- <code>Max file size allowed 500 KB.</code> -->
                                            <code>Paste the drive Link here </code>
                                        </div>
                                    </div>

                                    <div class="row g-2 align-items-center mt-3">
                                        <div class="col-md-6" id="">
                                            <label class="form-label">Graduation</label>
                                            <!-- <iframe src="<?php echo $row["graduation"]; ?>" width="100%" height="500px"></iframe> -->
                                            <!-- <input type="file" class="form-control" name="graduation" id="emppp" value="<?php echo $row["graduation"]; ?>" /> -->
                                            <input type="text" class="form-control" name="graduation" id="emppp_graduation" value="<?php echo $row["graduation"]; ?>" />
                                            <?php if (isset($file_error_msgg)) {
                                                echo "<div class='invalid-feedback has-error-email' style='display: inline-block;'>$file_error_msgg</div>";
                                            } ?>
                                        </div>
                                        <div class="col-md-6 align-items-center pt-3" id="">
                                            <!-- <code>File format allowed .jpg .jpeg .png .gif .PNG .JPG .JPEG</code> <br /> -->
                                            <!-- <code>Max file size allowed 500 KB.</code> -->
                                            <code>Paste the drive Link here </code>
                                        </div>
                                    </div>

                                    <div class="row g-2 align-items-center mt-3">
                                        <div class="col-md-6" id="">
                                            <label class="form-label">Experience Relieving</label>
                                            <!-- <iframe src="<?php echo $row["experience_relieving"]; ?>" width="100%" height="500px"></iframe> -->
                                            <!-- <input type="file" class="form-control" name="experience_relieving" id="emppp" value="<?php echo $row["experience_relieving"]; ?>" /> -->
                                            <input type="text" class="form-control" name="experience_relieving" id="emppp_experience_relieving" value="<?php echo $row["experience_relieving"]; ?>" />
                                            <?php if (isset($file_error_msger)) {
                                                echo "<div class='invalid-feedback has-error-email' style='display: inline-block;'>$file_error_msger</div>";
                                            } ?>
                                        </div>
                                        <div class="col-md-6 align-items-center pt-3" id="">
                                            <!-- <code>File format allowed .jpg .jpeg .png .gif .PNG .JPG .JPEG</code> <br /> -->
                                            <!-- <code>Max file size allowed 500 KB.</code> -->
                                            <code>Paste the drive Link here </code>
                                        </div>
                                    </div>
                                </fieldset>

                                <fieldset class="form-fieldset">
                                    <legend>Employee Family Details</legend>
                                    <div class="row g-2 align-items-center mt-3">
                                        <div class="col-md-2" id="father_name">
                                            <label class="form-label">Father Name</label>
                                            <input type="text" class="form-control" name="father_name" id="emp_father_name" value="<?php echo $row["father_name"]; ?>" />
                                        </div>

                                        <div class="col-md-2" id="emppp_nominee_details">
                                            <label class="form-label">Nominee Details</label>
                                            <input type="text" class="form-control" name="nominee_details" id="emp_nominee_details" value="<?php echo $row["nominee_details"]; ?>" />
                                        </div>

                                        <div class="col-md-2" id="emppp_relation">
                                            <label class="form-label">Relation</label>
                                            <input type="text" class="form-control" name="relation" id="emp_relation" value="<?php echo $row["relation"]; ?>" />
                                        </div>

                                        <div class="col-md-2" id="emppp_address">
                                            <label class="form-label">Address</label>
                                            <input type="text" class="form-control" name="address" id="emp_address" value="<?php echo $row["address"]; ?>" />
                                        </div>

                                        <div class="col-md-2" id="emppp_no_of_family_member">
                                            <label class="form-label">No Of Family Member</label>
                                            <input type="text" class="form-control" name="no_of_family_member" id="emp_no_of_family_member" value="<?php echo $row["no_of_family_member"]; ?>" />
                                        </div>
                                    </div>
                                </fieldset>

                                <fieldset class="form-fieldset">
                                    <legend>Employee Personal Details</legend>
                                    <div class="row g-2 align-items-center mt-3">
                                        <div class="col-md-2" id="gender">
                                            <label class="form-label">Gender</label>
                                            <input type="text" class="form-control" name="gender" id="emp_gender" value="<?php echo $row["gender"]; ?>" />
                                        </div>

                                        <div class="col-md-2" id="emppp_marital_status">
                                            <label class="form-label">Marital Status</label>
                                            <input type="text" class="form-control" name="marital_status" id="emp_marital_status" value="<?php echo $row["marital_status"]; ?>" />
                                        </div>

                                        <div class="col-md-2" id="emppp_dob">
                                            <label class="form-label">Date Of Birthday</label>
                                            <input type="text" class="form-control" name="dob" id="emp_dob" value="<?php echo $row["dob"]; ?>" />
                                        </div>

                                        <div class="col-md-2" id="emppp_phone">
                                            <label class="form-label">Phone</label>
                                            <input type="text" class="form-control" name="phone" id="emp_phone" value="<?php echo $row["phone"]; ?>" />
                                        </div>

                                        <div class="col-md-2" id="emppp_mobile">
                                            <label class="form-label">Mobile</label>
                                            <input type="text" class="form-control" name="mobile" id="emp_mobile" value="<?php echo $row["mobile"]; ?>" />
                                        </div>

                                        <div class="col-md-2" id="emppp_primary_email">
                                            <label class="form-label">Primary Email</label>
                                            <input type="text" class="form-control" name="primary_email" id="emp_primary_email" value="<?php echo $row["primary_email"]; ?>" />
                                        </div>

                                        <div class="row g-2 align-content-center">
                                            <div class="col-md-2" id="emppp_present_address_h_no">
                                                <label class="form-label">Present Aaddress H.no</label>
                                                <input type="text" class="form-control" name="present_address_h_no" id="emp_present_address_h_no" value="<?php echo $row["present_address_h_no"]; ?>" />
                                            </div>

                                            <div class="col-md-2" id="emppp_lacality_building">
                                                <label class="form-label">Lacality Building</label>
                                                <input type="text" class="form-control" name="lacality_building" id="emp_lacality_building" value="<?php echo $row["lacality_building"]; ?>" />
                                            </div>

                                            <div class="col-md-2" id="emppp_area">
                                                <label class="form-label">Area</label>
                                                <input type="text" class="form-control" name="area" id="emp_area" value="<?php echo $row["area"]; ?>" />
                                            </div>

                                            <div class="col-md-2" id="emppp_district">
                                                <label class="form-label">District</label>
                                                <input type="text" class="form-control" name="district" id="emp_district" value="<?php echo $row["district"]; ?>" />
                                            </div>

                                            <div class="col-md-2" id="emppp_state">
                                                <label class="form-label">State</label>
                                                <input type="text" class="form-control" name="state" id="emp_state" value="<?php echo $row["state"]; ?>" />
                                            </div>

                                            <div class="col-md-2" id="emppp_post_code">
                                                <label class="form-label">Post Code</label>
                                                <input type="text" class="form-control" name="post_code" id="emp_post_code" value="<?php echo $row["post_code"]; ?>" />
                                            </div>
                                        </div>

                                        <div class="row g-2 align-content-center">
                                            <div class="col-md-2" id="emppp_permanent_address_h_no">
                                                <label class="form-label">Permanent Address H.no</label>
                                                <input type="text" class="form-control" name="permanent_address_h_no" id="emp_permanent_address_h_no" value="<?php echo $row["permanent_address_h_no"]; ?>" />
                                            </div>

                                            <div class="col-md-2" id="emppp_per_lacality_building">
                                                <label class="form-label">Permanent Lacality Building</label>
                                                <input type="text" class="form-control" name="per_lacality_building" id="emp_per_lacality_building" value="<?php echo $row["per_lacality_building"]; ?>" />
                                            </div>

                                            <div class="col-md-2" id="emppp_per_area">
                                                <label class="form-label">Permanent Area</label>
                                                <input type="text" class="form-control" name="per_area" id="emp_per_area" value="<?php echo $row["per_area"]; ?>" />
                                            </div>

                                            <div class="col-md-2" id="emppp_per_district">
                                                <label class="form-label">Permanent District</label>
                                                <input type="text" class="form-control" name="per_district" id="emp_per_district" value="<?php echo $row["per_district"]; ?>" />
                                            </div>

                                            <div class="col-md-2" id="emppp_per_state">
                                                <label class="form-label">Permanent State</label>
                                                <input type="text" class="form-control" name="per_state" id="emp_per_state" value="<?php echo $row["per_state"]; ?>" />
                                            </div>

                                            <div class="col-md-2" id="emppp_per_post_code">
                                                <label class="form-label">Permanent Post Code</label>
                                                <input type="text" class="form-control" name="per_post_code" id="emp_per_post_code" value="<?php echo $row["per_post_code"]; ?>" />
                                            </div>
                                        </div>

                                        <div class="col-md-2" id="emppp_aadhaar">
                                            <label class="form-label">Aadhaar No</label>
                                            <input type="text" class="form-control" name="aadhaar" id="emp_aadhaar" value="<?php echo $row["aadhaar"]; ?>" />
                                        </div>

                                        <div class="col-md-2" id="emppp_blood_group">
                                            <label class="form-label">Blood Group</label>
                                            <input type="text" class="form-control" name="blood_group" id="emp_blood_group" value="<?php echo $row["blood_group"]; ?>" />
                                        </div>

                                        <div class="col-md-2" id="emppp_emy_contact_no">
                                            <label class="form-label">Emy No</label>
                                            <input type="text" class="form-control" name="emy_contact_no" id="emp_emy_contact_no" value="<?php echo $row["emy_contact_no"]; ?>" />
                                        </div>

                                        <div class="col-md-2" id="emppp_emy_contact_relation">
                                            <label class="form-label">Emy Contact Relation</label>
                                            <input type="text" class="form-control" name="emy_contact_relation" id="emp_emy_contact_relation" value="<?php echo $row["emy_contact_relation"]; ?>" />
                                        </div>

                                        <div class="col-md-2" id="emppp_emy_contact_email">
                                            <label class="form-label">Emy Contact Email</label>
                                            <input type="text" class="form-control" name="emy_contact_email" id="emp_emy_contact_email" value="<?php echo $row["emy_contact_email"]; ?>" />
                                        </div>

                                        <div class="col-md-2" id="emppp_no_of_bank">
                                            <label class="form-label">Total Bank</label>
                                            <input type="text" class="form-control" name="no_of_bank" id="emp_no_of_bank" value="<?php echo $row["no_of_bank"]; ?>" />
                                        </div>

                                        <div class="col-md-2" id="emppp_no_of_family_member">
                                            <label class="form-label">Total family Member</label>
                                            <input type="text" class="form-control" name="no_of_family_member" id="emp_no_of_family_member" value="<?php echo $row["no_of_family_member"]; ?>" />
                                        </div>

                                        <div class="col-md-2" id="emppp_mob_link_uan_no">
                                            <label class="form-label">Mobile Link UAN No</label>
                                            <input type="text" class="form-control" name="mob_link_uan_no" id="emp_mob_link_uan_no" value="<?php echo $row["mob_link_uan_no"]; ?>" />
                                        </div>
                                    </div>

                                    <div class="row g-2 align-content-center  mt-3">
                                        <div class="col-md-6" id="">
                                            <label class="form-label">Salary Ship</label>
                                            <!-- <iframe src="<?php echo $row["salary_slip"]; ?>" width="100%" height="500px"></iframe> -->
                                            <!-- <input type="file" class="form-control" name="salary_slip" id="emp_salary_slip" value="<?php echo $row["salary_slip"]; ?>"/> -->
                                            <input type="text" class="form-control" name="salary_slip" id="emppp_salary_slip" value="<?php echo $row["salary_slip"]; ?>" />
                                            <?php if (isset($file_error_msgss)) {
                                                echo "<div class='invalid-feedback has-error-email' style='display: inline-block;'>$file_error_msgss</div>";
                                            } ?>
                                        </div>
                                        <div class="col-md-6 align-items-center pt-3" id="">
                                            <!-- <code>File format allowed .jpg .jpeg .png .gif .PNG .JPG .JPEG</code> <br /> -->
                                            <!-- <code>Max file size allowed 500 KB.</code> -->
                                            <code>Paste the drive Link here </code>
                                        </div>
                                    </div>

                                    <div class="row g-2 align-content-center  mt-3">
                                        <div class="col-md-6" id="">
                                            <label class="form-label">Bank Statement</label>
                                            <!-- <iframe src="<?php echo $row["bank_statement"]; ?>" width="100%" height="500px"></iframe> -->
                                            <!-- <input type="file" class="form-control" name="bank_statement" id="emp_bank_statement" value="<?php echo $row["bank_statement"]; ?>"/> -->
                                            <input type="text" class="form-control" name="bank_statement" id="emppp_bank_statement" value="<?php echo $row["bank_statement"]; ?>" />
                                            <?php if (isset($file_error_msgbs)) {
                                                echo "<div class='invalid-feedback has-error-email' style='display: inline-block;'>$file_error_msgbs</div>";
                                            } ?>
                                        </div>
                                        <div class="col-md-6 align-items-center pt-3" id="">
                                            <!-- <code>File format allowed .jpg .jpeg .png .gif .PNG .JPG .JPEG</code> <br /> -->
                                            <!-- <code>Max file size allowed 500 KB.</code> -->
                                            <code>Paste the drive Link here </code>
                                        </div>
                                    </div>

                                    <div class="row g-2 align-content-center  mt-3">
                                        <div class="col-md-6" id="">
                                            <label class="form-label">Cancel Cheque</label>
                                            <!-- <iframe src="<?php echo $row["cancel_cheque"]; ?>" width="100%" height="500px"></iframe> -->
                                            <!-- <input type="file" class="form-control" name="cancel_cheque" id="emp_cancel_cheque" value="<?php echo $row["cancel_cheque"]; ?>"/> -->
                                            <input type="text" class="form-control" name="cancel_cheque" id="emppp_cancel_cheque" value="<?php echo $row["cancel_cheque"]; ?>" />
                                            <?php if (isset($file_error_msgcc)) {
                                                echo "<div class='invalid-feedback has-error-email' style='display: inline-block;'>$file_error_msgcc</div>";
                                            } ?>
                                        </div>
                                        <div class="col-md-6 align-items-center pt-3" id="">
                                            <!-- <code>File format allowed .jpg .jpeg .png .gif .PNG .JPG .JPEG</code> <br /> -->
                                            <!-- <code>Max file size allowed 500 KB.</code> -->
                                            <code>Paste the drive Link here </code>
                                        </div>
                                    </div>


                                </fieldset>

                                <fieldset class="form-fieldset">
                                    <legend>Allowances</legend>
                                    <div class="row g-2 align-items-center mt-3">
                                        <div class="col-md-2">
                                            <label class="form-label required">Food Allowance</label>
                                            <input type="text" class="form-control" name="food_allw" value="<?php echo $row["emp_food"]; ?>" id="empfoodallw" autocomplete="off" required />
                                        </div>
                                        <div class="col-md-2">
                                            <label class="form-label required">Travel Allowance</label>
                                            <input type="text" class="form-control" name="travel_allw" value="<?php echo $row["emp_travel"]; ?>" id="emptravelallw" value="2200" autocomplete="off" required />
                                        </div>
                                        <div class="col-md-2">
                                            <label class="form-label">Special Allowances</label>
                                            <input type="text" class="form-control" name="spl_allowance" value="<?php echo $row["emp_spl"]; ?>" id="empsplallw" autocomplete="off" />
                                        </div>
                                        <div class="col-md-2">
                                            <label class="form-check" style="margin-bottom: 0; margin-top: 1rem;">
                                                <input type="hidden" value="0" name="msa" />
                                                <input type="checkbox" class="form-check-input" value="1" name="msa" <?= $row["emp_meal"] == '1' ? 'checked' : ''; ?> />
                                                <span class="form-check-label">Meal Service Availed</span>
                                            </label>
                                        </div>
                                        <div class="col-md-2">
                                            <label class="form-check" style="margin-bottom: 0; margin-top: 1rem;">
                                                <input type="hidden" value="0" name="tsa" />
                                                <input type="checkbox" class="form-check-input" value="1" name="tsa" <?= $row["emp_cab"] == '1' ? 'checked' : ''; ?> />
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
                                            <input type="text" class="form-control" name="stack" id="empstack" value="<?php echo $row["emp_stinc"]; ?>" autocomplete="off" required />
                                        </div>
                                        <div class="col-md-2">
                                            <label class="form-label required">Incentive</label>
                                            <input type="text" class="form-control" name="inc" value="<?php echo $row["emp_inc"]; ?>" id="empincentive" autocomplete="off" required />
                                        </div>
                                        <div class="col-md-2">
                                            <label class="form-label">Others <span class="form-help" data-bs-toggle="popover" data-bs-placement="top" data-bs-html="true" data-bs-content="<p>Others is adjustments in positive amount or in negative amount. Positive and Negative amount will add in earnings and deductions respectively. E.g 2000 (+ve amt), -2000 (-ve amt). </p>">?</span></label>
                                            <input type="text" class="form-control" name="others" value="<?php echo $row["emp_other"]; ?>" id="empothers" autocomplete="off" />
                                        </div>
                                    </div>
                                </fieldset>

                                <fieldset class="form-fieldset">
                                    <legend>Employee Credentials</legend>
                                    <div class="row g-2 align-items-center">
                                        <div class="col-md-2" id="userid_div">
                                            <label class="form-label required">Employee User Id</label>
                                            <input type="text" class="form-control empuidd" name="emp_user_id" value="<?php if (isset($rowid["username"])) {
                                                                                                                    echo $rowid["username"];
                                                                                                                } ?>" id="emp_u_id" autocomplete="off" onchange="checkuserid();" readonly />
                                        </div>
                                        <div class="col-md-2">
                                            <label class="form-label required">Employee Password</label>
                                            <input type="password" class="form-control" name="emp_pswd" id="emp_pass" autocomplete="off" />
                                        </div>
                                    </div>
                                </fieldset>
                                <fieldset class="form-fieldset">
                                    <legend>Employee Exit & Description</legend>
                                    <div class="row g-2 align-items-center">
                                        <div class="col-md-2">
                                            <label class="form-label">Employee Exit Date</label>
                                            <input type="date" class="form-control" name="eed" value="<?php if ($row['emp_exitdate'] != 0000 - 00 - 00) {
                                                                                                            echo $row['emp_exitdate'];
                                                                                                        } ?>" onchange="deactivateemp();" autocomplete="off" />
                                        </div>
                                        <div class="col-md-2">
                                            <label class="form-label">Exit Formalities</label>
                                            <input type="text" class="form-control" name="exit_formalities" autocomplete="off" value="<?php echo $row["exit_formalities"]; ?>" />
                                        </div>
                                        <div class="col-md-2">
                                            <label class="form-label">Full and Final Settlement</label>
                                            <input type="text" class="form-control" name="fnf" autocomplete="off" value="<?php echo $row["fnf"]; ?>" />
                                        </div>
                                        <div class="col-md-2">
                                            <label class="form-label">Reason Of Leaving</label>
                                            <input type="text" class="form-control" name="reason_of_leaving" autocomplete="off" value="<?php echo $row["reason_of_leaving"]; ?>" />
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
                                        <!-- <?php if ($_SESSION["user_type"] == 2 && $_SESSION["country_type"] == 'Ph') {
                                                    echo ' <div class="col-md-2">';
                                                    echo '<div class="form-label">';
                                                    echo 'Country Status';
                                                    echo '</div>';
                                                    echo '<select class="form-select" name="country_type" id="">';
                                                    echo '<option value="Ph">Philippines</option>';
                                                    echo '</select>';
                                                    echo '</div> ';
                                                } ?> -->
                                        <?php
                                        if ($_SESSION["user_type"] == 2 && $_SESSION["country_type"] == 'In') {
                                            echo '<div class="col-md-2">';
                                            echo '<div class="form-label required">';
                                            echo 'Country Status';
                                            echo '</div>';
                                            echo '<select class="form-select " name="country_type" id="">';
                                            echo '<option value="In">India</option>';
                                            echo '</select>';
                                            echo '</div>';
                                        } else if ($_SESSION["user_type"] == 2 && $_SESSION["country_type"] == 'Ph') {
                                            echo '<div class="col-md-2">';
                                            echo '<div class="form-label required">';
                                            echo 'Country Status';
                                            echo '</div>';
                                            echo '<select class="form-select " name="country_type" id="">';
                                            echo '<option value="Ph">Philippines</option>';
                                            echo '</select>';
                                            echo '</div>';
                                        } else {
                                            echo '<div class="col-md-2">';
                                            echo '<div class="form-label required">';
                                            echo 'Country Status';
                                            echo '</div>';
                                            echo '<select class="form-select " name="country_type" id="">';
                                            echo '<option value="In">India</option>';
                                            echo '<option value="Ph">Philippines</option>';
                                            echo '</select>';
                                            echo '</div>';
                                        }
                                        ?>
                                        <div class="col-md-2">
                                            <div class="form-label">
                                                Employee Role
                                            </div>
                                            <select class="form-select" name="user_type">
                                                <!-- <option value="1" <?php if ($rowid["user_type"] == '1') echo ' selected="selected"'; ?>>Admin</option> -->
                                                <option value="2" <?php if ($rowid["user_type"] == '2') echo ' selected="selected"'; ?>>Moderator</option>
                                                <option value="3" <?php if ($rowid["user_type"] == '3') echo ' selected="selected"'; ?>>User</option>
                                            </select>
                                        </div>

                                    </div>
                                </fieldset>
                                <input type="hidden" value="3" name="user_type" />
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
                            <!-- <code>Paste the drive Link here </code> -->
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
                $(".empuidd").val($('#empid').val());


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
                            200: function(response) {
                                if (response == 1) {
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

            $("#change_confirm").click(function() {

                $('#modal-changepp').modal('toggle');
                data = new FormData();
                data.append('file', $('#change_pp')[0].files[0]);
                data.append('name', $('#e_nameid').val());

                var imgname = $('input[type=file]').val();
                var size = $('#change_pp')[0].files[0].size;

                var ext = imgname.substr((imgname.lastIndexOf('.') + 1));
                if (ext == 'jpg' || ext == 'jpeg' || ext == 'png' || ext == 'gif' || ext == 'PNG' || ext == 'JPG' || ext == 'JPEG') {
                    $("#change_pp").removeClass("is-invalid");
                    $("#ch_pperr").remove();
                    if (size <= 500000) {
                        $("#change_pp").removeClass("is-invalid");
                        $("#ch_pperr").remove();
                        $.ajax({
                            url: 'update_profilepic.php',
                            type: 'POST',
                            data: data,
                            enctype: 'multipart/form-data',
                            processData: false, // tell jQuery not to process the data
                            contentType: false, // tell jQuery not to set contentType
                            statusCode: {
                                200: function(response) {
                                    if (response == 1) {
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
            if (redir == 1) {
                window.location.replace("error-404.php");
            }
        </script>