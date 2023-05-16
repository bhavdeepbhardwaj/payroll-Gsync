<?php $parent_page = "emp"; ?>
<?php $page = "bulk_employee"; ?>
<?php include "config.php"; ?>
<?php include "header.php";

if ($_SESSION["user_type"] == 3) {
    $redirectPg = 1;
} else {
    $redirectPg = 0;
}

require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$err = $fileName = $file_ext = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fileName = $_FILES['import_file']['name'];
    $file_ext = pathinfo($fileName, PATHINFO_EXTENSION);

    $allowed_ext = ['xls', 'csv', 'xlsx'];

    if (in_array($file_ext, $allowed_ext)) {
        $inputFileNamePath = $_FILES['import_file']['tmp_name'];
        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($inputFileNamePath);
        $data = $spreadsheet->getActiveSheet()->toArray();

        // echo "<pre>";
        // print_r($data);
        // die;


        $count = "0";
        foreach ($data as $row) {

            if (($count > 0) && (!empty($row['0']))) {
                $emp_id                                         = $row[0];
                $emp_name                                       = $row[1];
                $emp_desg                                       = $row[2];
                $emp_mail                                       = $row[3];
                $doj                                            = $row[4];
                $emp_dept                                       = $row[5];
                $emp_pan                                        = $row[6];
                $emp_uan                                        = $row[7];
                $emp_esi                                        = $row[8];
                $emp_pic                                        = $row[9];
                $emp_paymode                                    = $row[10];
                $emp_bank                                       = $row[11];
                $emp_ifsc                                       = $row[12];
                $emp_acc                                        = $row[13];
                $emp_gsal                                       = $row[14];
                $emp_food                                       = $row[15];
                $emp_travel                                     = $row[16];
                $emp_spl                                        = $row[17];
                $emp_meal                                       = $row[18];
                $emp_cab                                        = $row[19];
                $emp_stinc                                      = $row[20];
                $emp_inc                                        = $row[21];
                $emp_other                                      = $row[22];
                $emp_exitdate                                   = $row[23];
                $emp_desp                                       = $row[24];
                $emp_status                                     = $row[25];
                $country_type                                   = $row[26];
                $nick_name                                      = $row[27];
                $line_manager                                   = $row[28];
                $joining_month                                  = $row[29];
                $date_of_hitting                                = $row[30];
                $ageing                                         = $row[31];
                $rejoing_on                                     = $row[32];
                $date_of_confirmation                           = $row[33];
                $exit_formalities                               = $row[34];
                $fnf                                            = $row[35];
                $reason_of_leaving                              = $row[36];
                $type_of_attrition                              = $row[37];
                $annual_ctc_in                                  = $row[38];
                $annual_ctc_new                                 = $row[39];
                $in_hand_salary_with_stack                      = $row[40];
                $final_ctc_all                                  = $row[41];
                $transport_r_a                                  = $row[42];
                $father_name                                    = $row[43];
                $gender                                         = $row[44];
                $dob                                            = $row[45];
                $marital_status                                 = $row[46];
                $present_address_h_no                           = $row[47];
                $lacality_building                              = $row[48];
                $area                                           = $row[49];
                $district                                       = $row[50];
                $state                                          = $row[51];
                $post_code                                      = $row[52];
                $permanent_address_h_no                         = $row[53];
                $per_lacality_building                          = $row[54];
                $per_area                                       = $row[55];
                $per_district                                   = $row[56];
                $per_state                                      = $row[57];
                $per_post_code                                  = $row[58];
                $phone                                          = $row[59];
                $mobile                                         = $row[60];
                $primary_email                                  = $row[61];
                $aadhaar                                        = $row[62];
                $nominee_details                                = $row[63];
                $relation                                       = $row[64];
                $address                                        = $row[65];
                $emy_contact_no                                 = $row[66];
                $emy_contact_relation                           = $row[67];
                $emy_contact_email                              = $row[68];
                $no_of_bank                                     = $row[69];
                $no_of_family_member                            = $row[70];
                $mob_link_uan_no                                = $row[71];
                $blood_group                                    = $row[72];
                $performer_month                                = $row[73];
                $verbal_warning                                 = $row[74];
                $reason_of_verbal_warning                       = $row[75];
                $date_of_verbal_warning                         = $row[76];
                $no_of_warning                                  = $row[77];
                $reason_of_warning                              = $row[78];
                $date_of_written_warning                        = $row[79];
                $pip_issue_date                                 = $row[80];
                $appraisal_letter                               = $row[81];
                $appraisal_1                                    = $row[82];
                $appraisal_2                                    = $row[83];
                $appraisal_3                                    = $row[84];
                $appraisal_4                                    = $row[85];
                $ssc                                            = $row[86];
                $hsc                                            = $row[87];
                $graduation                                     = $row[88];
                $experience_relieving                           = $row[89];
                $salary_slip                                    = $row[90];
                $bank_statement                                 = $row[91];
                $cancel_cheque                                  = $row[92];

                // $salQuery1 = "INSERT INTO users(username, password, user_type, user_status, country_type) VALUES ('$emp_id', 'GSYNC@1234#', '$emp_status', '$country_type')";

                $salQuery = "INSERT INTO gs_employees(emp_id, emp_name, emp_desg, emp_mail, doj, emp_dept, emp_pan, emp_uan, emp_esi, emp_pic, emp_paymode, emp_bank, emp_ifsc, emp_acc, emp_gsal, emp_food, emp_travel, emp_spl, emp_meal, emp_cab, emp_stinc, emp_inc, emp_other, emp_exitdate, emp_desp, emp_status, country_type, nick_name, line_manager, joining_month, date_of_hitting, ageing, rejoing_on, date_of_confirmation, exit_formalities, fnf, reason_of_leaving, type_of_attrition, annual_ctc_in, annual_ctc_new, in_hand_salary_with_stack, final_ctc_all, transport_r_a, father_name, gender, dob, marital_status, present_address_h_no, lacality_building, area, district, state, post_code, permanent_address_h_no, per_lacality_building, per_area, per_district, per_state, per_post_code, phone, mobile, primary_email, aadhaar, nominee_details, relation, address, emy_contact_no, emy_contact_relation, emy_contact_email, no_of_bank, no_of_family_member, mob_link_uan_no, blood_group, performer_month, verbal_warning, reason_of_verbal_warning, date_of_verbal_warning, no_of_warning, reason_of_warning, date_of_written_warning, pip_issue_date, appraisal_letter, appraisal_1, appraisal_2, appraisal_3, appraisal_4, ssc, hsc, graduation, experience_relieving, salary_slip, bank_statement, cancel_cheque) 
                    VALUES ('$emp_id', '$emp_name', '$emp_desg', '$emp_mail', '$doj', '$emp_dept', '$emp_pan', '$emp_uan', '$emp_esi', '$emp_pic', '$emp_paymode', '$emp_bank', '$emp_ifsc', '$emp_acc', '$emp_gsal', '$emp_food', '$emp_travel', '$emp_spl', '$emp_meal', '$emp_cab', '$emp_stinc', '$emp_inc', '$emp_other', '$emp_exitdate', '$emp_desp', '$emp_status', '$country_type', '$nick_name', '$line_manager', '$joining_month', '$date_of_hitting', '$ageing', '$rejoing_on', '$date_of_confirmation', '$exit_formalities', '$fnf', '$reason_of_leaving', '$type_of_attrition', '$annual_ctc_in', '$annual_ctc_new', '$in_hand_salary_with_stack', '$final_ctc_all', '$transport_r_a', '$father_name', '$gender', '$dob', '$marital_status', '$present_address_h_no', '$lacality_building', '$area', '$district', '$state', '$post_code', '$permanent_address_h_no', '$per_lacality_building', '$per_area', '$per_district', '$per_state', '$per_post_code', '$phone', '$mobile', '$primary_email', '$aadhaar', '$nominee_details', '$relation', '$address', '$emy_contact_no', '$emy_contact_relation', '$emy_contact_email', '$no_of_bank', '$no_of_family_member', '$mob_link_uan_no', '$blood_group', '$performer_month', '$verbal_warning', '$reason_of_verbal_warning', '$date_of_verbal_warning', '$no_of_warning', '$reason_of_warning', '$date_of_written_warning', '$pip_issue_date', '$appraisal_letter', '$appraisal_1', '$appraisal_2', '$appraisal_3', '$appraisal_4', '$ssc', '$hsc', '$graduation', '$experience_relieving', '$salary_slip', '$bank_statement', '$cancel_cheque') 
                    ON DUPLICATE KEY UPDATE emp_name = '$emp_name', emp_desg = '$emp_desg', emp_mail = '$emp_mail', doj = '$doj', emp_dept = '$emp_dept',  emp_pan = '$emp_pan', emp_uan = '$emp_uan', emp_esi = '$emp_esi', emp_pic = '$emp_pic', emp_paymode = '$emp_paymode', emp_bank = '$emp_bank', emp_ifsc = '$emp_ifsc', emp_acc = '$emp_acc', emp_gsal = '$emp_gsal', emp_food = '$emp_food', emp_travel = '$emp_travel', emp_spl = '$emp_spl', emp_meal = '$emp_meal', emp_cab = '$emp_cab', emp_stinc = '$emp_stinc', emp_inc = '$emp_inc', emp_other = '$emp_other', emp_exitdate =  '$emp_exitdate', emp_desp = '$emp_desp', emp_status = '$emp_status', country_type = '$country_type', nick_name = '$nick_name', line_manager = '$line_manager', joining_month = '$joining_month', date_of_hitting = '$date_of_hitting', ageing = '$ageing', rejoing_on = '$rejoing_on', date_of_confirmation = '$date_of_confirmation', exit_formalities = '$exit_formalities', fnf = '$fnf', reason_of_leaving = '$reason_of_leaving', type_of_attrition = '$type_of_attrition', annual_ctc_in = '$annual_ctc_in', annual_ctc_new = '$annual_ctc_new', in_hand_salary_with_stack = '$in_hand_salary_with_stack', final_ctc_all = '$final_ctc_all', transport_r_a = '$transport_r_a', father_name = '$father_name', gender = '$gender', dob = '$dob', marital_status = '$marital_status', present_address_h_no = '$present_address_h_no', lacality_building = '$lacality_building', area = '$area', district = '$district', state =  '$state', post_code = '$post_code', permanent_address_h_no = '$permanent_address_h_no', per_lacality_building = '$per_lacality_building', per_area = '$per_area', per_district = '$per_district', per_state = '$per_state', per_post_code = '$per_post_code', phone = '$phone', mobile = '$mobile', primary_email = '$primary_email', aadhaar = '$aadhaar', nominee_details = '$nominee_details', relation = '$relation', address = '$address', emy_contact_no = '$emy_contact_no', emy_contact_relation = '$emy_contact_relation', emy_contact_email = '$emy_contact_email', no_of_bank = '$no_of_bank', no_of_family_member = '$no_of_family_member', mob_link_uan_no = '$mob_link_uan_no', blood_group = '$blood_group', performer_month = '$performer_month', verbal_warning = '$verbal_warning', reason_of_verbal_warning = '$reason_of_verbal_warning', date_of_verbal_warning = '$date_of_verbal_warning', no_of_warning = '$no_of_warning', reason_of_warning = '$reason_of_warning', date_of_written_warning = '$date_of_written_warning', pip_issue_date = '$pip_issue_date', appraisal_letter = '$appraisal_letter', appraisal_1 = '$appraisal_1', appraisal_2 = '$appraisal_2', appraisal_3 = '$appraisal_3', appraisal_4 = '$appraisal_4', ssc = '$ssc', hsc = '$hsc', graduation = '$graduation', experience_relieving = '$experience_relieving', salary_slip = '$salary_slip', bank_statement = '$bank_statement', cancel_cheque = '$cancel_cheque'";

                //  $salQuery = "INSERT INTO gs_employees(emp_id, emp_name, emp_desg, emp_mail, doj, emp_dept, emp_pan, emp_uan, emp_esi, emp_pic, emp_paymode, emp_bank, emp_ifsc, emp_acc, emp_gsal, emp_food, emp_travel, emp_spl, emp_meal, emp_cab, emp_stinc, emp_inc, emp_other, emp_exitdate, emp_desp, emp_status, country_type, nick_name, line_manager, joining_month, date_of_hitting, ageing, rejoing_on, date_of_confirmation, exit_formalities, fnf, reason_of_leaving, type_of_attrition, annual_ctc_in, annual_ctc_new, in_hand_salary_with_stack, final_ctc_all, transport_r_a, father_name, gender, dob, marital_status, present_address_h_no, lacality_building, area, district, state, post_code, permanent_address_h_no, per_lacality_building, per_area, per_district, per_state, per_post_code, phone, mobile, primary_email, aadhaar, nominee_details, relation, address, emy_contact_no, emy_contact_relation, emy_contact_email, no_of_bank, no_of_family_member, mob_link_uan_no, blood_group, performer_month, verbal_warning, reason_of_verbal_warning, date_of_verbal_warning, no_of_warning, reason_of_warning, date_of_written_warning, pip_issue_date, appraisal_letter, appraisal_1, appraisal_2, appraisal_3, appraisal_4, ssc, hsc, graduation, experience_relieving, salary_slip, bank_statement, cancel_cheque) VALUES ('$emp_id', '$emp_name', '$emp_desg', '$emp_mail', '$doj', '$emp_dept', '$emp_pan', '$emp_uan', '$emp_esi', '$emp_pic', '$emp_paymode', '$emp_bank', '$emp_ifsc', '$emp_acc', '$emp_gsal', '$emp_food', '$emp_travel', '$emp_spl', '$emp_meal', '$emp_cab', '$emp_stinc', '$emp_inc', '$emp_other', '$emp_exitdate', '$emp_desp', '$emp_status', '$country_type', '$nick_name', '$line_manager', '$joining_month', '$date_of_hitting', '$ageing', '$rejoing_on', '$date_of_confirmation', '$exit_formalities', '$fnf', '$reason_of_leaving', '$type_of_attrition', '$annual_ctc_in', '$annual_ctc_new', '$in_hand_salary_with_stack', '$final_ctc_all', '$transport_r_a', '$father_name', '$gender', '$dob', '$marital_status', '$present_address_h_no', '$lacality_building', '$area', '$district', '$state', '$post_code', '$permanent_address_h_no', '$per_lacality_building', '$per_area', '$per_district', '$per_state', '$per_post_code', '$phone', '$mobile', '$primary_email', '$aadhaar', '$nominee_details', '$relation', '$address', '$emy_contact_no', '$emy_contact_relation', '$emy_contact_email', '$no_of_bank', '$no_of_family_member', '$mob_link_uan_no', '$blood_group', '$performer_month', '$verbal_warning', '$reason_of_verbal_warning', '$date_of_verbal_warning', '$no_of_warning', '$reason_of_warning', '$date_of_written_warning', '$pip_issue_date', '$appraisal_letter', '$appraisal_1', '$appraisal_2', '$appraisal_3', '$appraisal_4', '$ssc', '$hsc', '$graduation', '$experience_relieving', '$salary_slip', '$bank_statement', '$cancel_cheque') ";

                // $result1 = mysqli_query($link, $salQuery1);
                $result = mysqli_query($link, $salQuery);

                // var_dump($salQuery);
                // echo var_dump($result);
                // // print_r($salQuery);
                // break;
                // echo "<pre>";
                // print_r($result1);
                // die;
                $msg = true;
            } else {
                $count = "1";
            }
        }

        if (isset($msg)) {
            $_SESSION['message'] = true;
            $redirect_header = 1;
        } else {
            $err = "Not Imported";
        }
    } else {
        $err = "Invalid File";
    }
}

?>

<div class="page-wrapper">
    <div class="container-xl">
        <!-- Page title -->
        <div class="page-header d-print-none">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        Employee Details
                    </h2>
                </div>
            </div>
        </div>
    </div>
    <div class="page-body">
        <div class="container-xl">
            <div class="row row-cards">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Upload Employee Details Master Sheet</h3>
                            <div class="card-actions">
                                <a href="static/master.xlsx" class="btn" target='__blank'>
                                    <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-download" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2"></path>
                                        <polyline points="7 11 12 16 17 11"></polyline>
                                        <line x1="12" y1="4" x2="12" y2="16"></line>
                                    </svg>
                                    Download Sample File
                                </a>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST" enctype="multipart/form-data">
                                <div class="row justify-content-center align-items-center p-3">
                                    <!-- <div class="col-md-3 text-center">
                                        <label class="form-label required">Select Pay Slip Month</label>
                                        <input type="month" class="form-control" name="pay_month" id="pay_slip_month" value="<?php echo date("Y-m", strtotime("-1 month")); ?>" autocomplete="off" required />
                                    </div> -->
                                    <div class="col-md-6 text-center">
                                        <label class="form-label required">Choose File</label>
                                        <input type="file" name="import_file" class="form-control <?php echo (!empty($err)) ? 'is-invalid' : ''; ?>" />
                                        <span class="invalid-feedback"><?php echo $err; ?></span>
                                    </div>
                                </div>
                                <div class="row justify-content-center align-items-center p-3">
                                    <div class="col-md-6 text-center">
                                        <button type="submit" name="save_excel_data" class="btn btn-primary">Import</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <?php include "footer.php"; ?>

    <script>
        $(document).ready(function() {
            var redi = '<?php echo $redirect_header; ?>';

            if (redi == 1) {
                window.location.replace("view_emps.php");
            }
        });
    </script>

    <script>
        var redir = '<?php echo $redirectPg ?>';
        if (redir == 1) {
            window.location.replace("error-404.php");
        }
    </script>