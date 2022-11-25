<?php $parent_page = "emp"; ?>
<?php $page = "bulk_sal_slip"; ?>
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
                // $emp_pic                                        = $row[9];
                $emp_paymode                                    = $row[9];
                $emp_bank                                       = $row[10];
                $emp_ifsc                                       = $row[11];
                $emp_acc                                        = $row[12];
                $emp_gsal                                       = $row[13];
                $emp_food                                       = $row[14];
                $emp_travel                                     = $row[15];
                $emp_spl                                        = $row[16];
                $emp_meal                                       = $row[17];
                $emp_cab                                        = $row[18];
                $emp_stinc                                      = $row[19];
                $emp_inc                                        = $row[20];
                $emp_other                                      = $row[21];
                $emp_exitdate                                   = $row[22];
                $emp_desp                                       = $row[23];
                $emp_status                                     = $row[24];
                $country_type                                   = $row[25];
                $nick_name                                      = $row[26];
                $line_manager                                   = $row[27];
                $joining_month                                  = $row[28];
                $date_of_hitting                                = $row[29];
                $ageing                                         = $row[30];
                $rejoing_on                                     = $row[31];
                $date_of_confirmation                           = $row[32];
                $exit_formalities                               = $row[33];
                $fnf                                            = $row[34];
                $reason_of_leaving                              = $row[35];
                $type_of_attrition                              = $row[36];
                $annual_ctc_in                                  = $row[37];
                $annual_ctc_new                                 = $row[38];
                $in_hand_salary_with_stack                      = $row[39];
                $final_ctc_all                                  = $row[40];
                $transport_r_a                                  = $row[41];
                $father_name                                    = $row[42];
                $gender                                         = $row[43];
                $dob                                            = $row[44];
                $marital_status                                 = $row[45];
                $present_address_h_no                           = $row[46];
                $lacality_building                              = $row[47];
                $area                                           = $row[48];
                $district                                       = $row[49];
                $state                                          = $row[50];
                $post_code                                      = $row[51];
                $permanent_address_h_no                         = $row[52];
                $per_lacality_building                          = $row[53];
                $per_area                                       = $row[54];
                $per_district                                   = $row[55];
                $per_state                                      = $row[56];
                $per_post_code                                  = $row[57];
                $phone                                          = $row[58];
                $mobile                                         = $row[59];
                $primary_email                                  = $row[60];
                $aadhaar                                        = $row[61];
                $nominee_details                                = $row[62];
                $relation                                       = $row[63];
                $address                                        = $row[64];
                $emy_contact_no                                 = $row[65];
                $emy_contact_relation                           = $row[66];
                $emy_contact_email                              = $row[67];
                $no_of_bank                                     = $row[68];
                $no_of_family_member                            = $row[69];
                $mob_link_uan_no                                = $row[70];
                $blood_group                                    = $row[71];
                $performer_month                                = $row[72];
                $verbal_warning                                 = $row[73];
                $reason_of_verbal_warning                       = $row[74];
                $date_of_verbal_warning                         = $row[75];
                $no_of_warning                                  = $row[76];
                $reason_of_warning                              = $row[77];
                $date_of_written_warning                        = $row[78];
                $pip_issue_date                                 = $row[79];
                // $appraisal_letter                               = $row[81];
                // $appraisal_1                                    = $row[82];
                // $appraisal_2                                    = $row[83];
                // $appraisal_3                                    = $row[84];
                // $appraisal_4                                    = $row[85];
                // $ssc                                            = $row[86];
                // $hsc                                            = $row[87];
                // $graduation                                     = $row[88];
                // $experience_relieving                           = $row[89];
                // $salary_slip                                    = $row[90];
                // $bank_statement                                 = $row[91];
                // $cancel_cheque                                  = $row[92];

                $salQuery = "INSERT INTO gs_emp_salary (emp_id, emp_name, emp_desg, emp_mail, doj, emp_dept, emp_pan, emp_uan, emp_esi, emp_paymode, emp_bank, emp_ifsc, emp_acc, emp_gsal, emp_food, emp_travel, emp_spl, emp_meal, emp_cab, emp_stinc, emp_inc, emp_other, emp_exitdate, emp_desp, emp_status, country_type, nick_name, line_manager, joining_month, date_of_hitting, ageing, rejoing_on, date_of_confirmation, exit_formalities, fnf, reason_of_leaving, type_of_attrition, annual_ctc_in, annual_ctc_new, in_hand_salary_with_stack, final_ctc_all, transport_r_a, father_name, gender, dob, marital_status, present_address_h_no, lacality_building, area, district, state, post_code, permanent_address_h_no, per_lacality_building, per_area, per_district, per_state, per_post_code, phone, mobile, primary_email, aadhaar, nominee_details, relation, address, emy_contact_no, emy_contact_relation, emy_contact_email, no_of_bank, no_of_family_member, mob_link_uan_no, blood_group, performer_month, verbal_warning, reason_of_verbal_warning, date_of_verbal_warning, no_of_warning, reason_of_warning, date_of_written_warning, pip_issue_date) 
                VALUES ('$emp_id', '$emp_name', '$emp_desg', '$emp_mail', '$doj', '$emp_dept', '$emp_pan', '$emp_uan', '$emp_esi', '$emp_paymode', '$emp_bank', '$emp_ifsc', '$emp_acc', '$emp_gsal', '$emp_food', '$emp_travel', '$emp_spl', '$emp_meal', '$emp_cab', '$emp_stinc', '$emp_inc', '$emp_other', '$emp_exitdate', '$emp_desp', '$emp_status', '$country_type', '$nick_name', '$line_manager', '$joining_month', '$date_of_hitting', '$ageing', '$rejoing_on', '$date_of_confirmation', '$exit_formalities', '$fnf', '$reason_of_leaving', '$type_of_attrition', '$annual_ctc_in', '$annual_ctc_new', '$in_hand_salary_with_stack', '$final_ctc_all', '$transport_r_a', '$father_name', '$gender', '$dob', '$marital_status', '$present_address_h_no', '$lacality_building', '$area', '$district', '$state', '$post_code', '$permanent_address_h_no', '$per_lacality_building', '$per_area', '$per_district', '$per_state', '$per_post_code', '$phone', '$mobile', '$primary_email', '$aadhaar', '$nominee_details', '$relation', '$address', '$emy_contact_no', '$emy_contact_relation', '$emy_contact_email', '$no_of_bank', '$no_of_family_member', '$mob_link_uan_no', '$blood_group', '$performer_month', '$verbal_warning', '$reason_of_verbal_warning', '$date_of_verbal_warning', '$no_of_warning', '$reason_of_warning', '$date_of_written_warning', '$pip_issue_date')";

                $result = mysqli_query($link, $salQuery);

                var_dump($salQuery);
                echo var_dump($result);
                // print_r($salQuery);
                break;
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
                                <a href="static/master-sheet.xlsx" class="btn" target='__blank'>
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