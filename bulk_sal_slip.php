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

        if ($_SESSION["user_type"] == 2 && $_SESSION["country_type"] == 'In') {
            foreach ($data as $row) {
                if (($count > 0) && (!empty($row['0']))) {
                    $sal_only_month = $_POST["pay_month"];
                    $sal_month = $_POST["pay_month"] . "-01";
                    $empid = $row['0'];
                    $final_sal_id = $empid . $sal_only_month;
                    $a =                            $row['1'];
                    $b =                            $row['2'];
                    $c =                            $row['3'];
                    $d =                            $row['4'];
                    $e =                            $row['5'];
                    $f =                            $row['6'];
                    $g =                            $row['7'];
                    $h =                            $row['8'];
                    $i =                            $row['9'];
                    $j =                            $row['10'];
                    $k =                            $row['11'];
                    $l =                            $row['12'];
                    $m =                            $row['13'];
                    $n =                            $row['14'];
                    $o =                            $row['15'];
                    $p =                            $row['16'];
                    $q =                            $row['17'];
                    $r =                            $row['18'];
                    $s =                            $row['19'];
                    $t =                            $row['20'];
                    $u =                            $row['21'];
                    $v =                            $row['22'];
                    $w =                            $row['23'];
                    $x =                            $row['24'];
                    $y =                            $row['25'];
                    $z =                            $row['26'];
                    $aa =                           $row['27'];
                    $ab =                           $row['28'];
                    $ac =                           $row['29'];
                    $ad =                           $row['30'];
                    $ae =                           $row['31'];
                    $pre_leave_bal =                $row['32'];
                    $total_ab =                     $row['33'];
                    $total_upl =                    $row['34'];
                    $total_p =                      $row['35'];
                    $total_hd =                     $row['36'];
                    $wo_ph =                        $row['37'];
                    $late_coming =                  $row['38'];
                    $hd_bcoz_late =                 $row['39'];
                    $leaves_adjusted =              $row['40'];
                    $sal_month_basic =              $row['41'];
                    $sal_month_hra =                $row['42'];
                    $sal_month_sa =                 $row['43'];
                    $sal_month_oa =                 $row['44'];
                    $emp_pf_cont =                  $row['45'];
                    $empr_pf_cont =                 $row['46'];
                    $emp_esic_cont =                $row['47'];
                    $empr_esic_cont =               $row['48'];
                    $daily_pay =                    $row['49'];
                    $leave_bal_at_start =           $row['50'];
                    $fix_sal_month_pay =            $row['51'];
                    $tds_deduction =                $row['52'];
                    $penalty_adj =                  $row['53'];
                    $sandwhich_leave_deduction =    $row['54'];
                    $transport =                    $row['55'];
                    $food =                         $row['56'];
                    $other_inc_dues =               $row['57'];
                    $arrears =                      $row['58'];
                    $inc_refferal =                 $row['59'];
                    $pre_month_qualified_app_ach =  $row['60'];
                    $qualified_percentage_pre_month = $row['61'];
                    $inc_qualified =                $row['62'];
                    $spl_allowance =                $row['63'];
                    $kw_installed =                 $row['64'];
                    $install_inc =                  $row['65'];
                    $stack_inc =                    $row['66'];
                    $adjustment =                   $row['67'];
                    $net_salary =                   $row['68'];
                    $status =                       $row['69'];
                    $inc_amt =                      $row['70'];
                    $clawback =                     $row['71'];
                    $inc =                          $row['72'];
                    $deduction =                    $row['73'];
                    $earning =                      $row['74'];
                    $transport_redeem =             $row['75'];
                    $food_redeem =                  $row['76'];
                    $adv_adj =                      $row['77'];
                    $otp_install =                  $row['78'];
                    $otp_inc_install =              $row['79'];
                    $country_type =                 $_POST['country_type'];


                    $salQuery = "INSERT INTO gs_emp_salary (emp_sal_id,month_yr,employee_id,a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z,aa,ab,ac,ad,ae,pre_leave_bal,total_ab,total_upl,total_p,total_hd,wo_ph,late_coming,hd_bcoz_late,leaves_adjusted,sal_month_basic,sal_month_hra,sal_month_sa,sal_month_oa,emp_pf_cont,empr_pf_cont,emp_esic_cont,empr_esic_cont,daily_pay,leave_bal_at_start,fix_sal_month_pay,tds_deduction,penalty_adj,sandwhich_leave_deduction,transport,food,other_inc_dues,arrears,inc_refferal,pre_month_qualified_app_ach,qualified_percentage_pre_month,inc_qualified,spl_allowance,kw_installed,install_inc,stack_inc,adjustment,net_salary,status,inc_amt,clawback,inc,deductions,earnings,transport_redeem,food_redeem,adv_adj,otp_install,otp_inc_install,country_type) 
                                    VALUES ('$final_sal_id','$sal_month','$empid','$a','$b','$c','$d','$e','$f','$g','$h','$i','$j','$k','$l','$m','$n','$o','$p','$q','$r','$s','$t','$u','$v','$w','$x','$y','$z','$aa','$ab','$ac','$ad','$ae','$pre_leave_bal','$total_ab','$total_upl','$total_p','$total_hd','$wo_ph','$late_coming','$hd_bcoz_late','$leaves_adjusted','$sal_month_basic','$sal_month_hra','$sal_month_sa','$sal_month_oa','$emp_pf_cont','$empr_pf_cont','$emp_esic_cont','$empr_esic_cont','$daily_pay','$leave_bal_at_start','$fix_sal_month_pay','$tds_deduction','$penalty_adj','$sandwhich_leave_deduction','$transport','$food','$other_inc_dues','$arrears','$inc_refferal','$pre_month_qualified_app_ach','$qualified_percentage_pre_month','$inc_qualified','$spl_allowance','$kw_installed','$install_inc','$stack_inc','$adjustment','$net_salary','$status','$inc_amt','$clawback','$inc','$deduction','$earning','$transport_redeem','$food_redeem','$adv_adj','$otp_install','$otp_inc_install','$country_type') 
                                    ON DUPLICATE KEY UPDATE month_yr ='$sal_month',employee_id = '$empid',a ='$a',b = '$b',c ='$c',d = '$d',e ='$e',f = '$f',g ='$g',h = '$h',i ='$i',j = '$j',k ='$k',l = '$l',m ='$m',n = '$n',o ='$o',p = '$p',q ='$q',r = '$r',s ='$s',t = '$t',u ='$u',v = '$v',w ='$w',x = '$x',y ='$y',z = '$z',aa ='$aa',ab = '$ab',ac ='$ac',ad = '$ad',ae ='$ae',pre_leave_bal = '$pre_leave_bal',total_ab ='$total_ab',total_upl = '$total_upl',total_p ='$total_p',total_hd = '$total_hd',wo_ph ='$wo_ph',late_coming = '$late_coming',hd_bcoz_late ='$hd_bcoz_late',leaves_adjusted = '$leaves_adjusted',sal_month_basic ='$sal_month_basic',sal_month_hra = '$sal_month_hra',sal_month_sa ='$sal_month_sa',sal_month_oa = '$sal_month_oa',emp_pf_cont ='$emp_pf_cont',empr_pf_cont = '$empr_pf_cont',emp_esic_cont ='$emp_esic_cont',empr_esic_cont = '$empr_esic_cont',daily_pay ='$daily_pay',leave_bal_at_start = '$leave_bal_at_start',fix_sal_month_pay ='$fix_sal_month_pay',tds_deduction = '$tds_deduction',penalty_adj ='$penalty_adj',sandwhich_leave_deduction = '$sandwhich_leave_deduction',transport ='$transport',food ='$food',other_inc_dues = '$other_inc_dues',arrears ='$arrears',inc_refferal = '$inc_refferal',pre_month_qualified_app_ach ='$pre_month_qualified_app_ach',qualified_percentage_pre_month = '$qualified_percentage_pre_month',inc_qualified ='$inc_qualified',spl_allowance = '$spl_allowance',kw_installed ='$kw_installed',install_inc = '$install_inc',stack_inc ='$stack_inc',adjustment ='$adjustment',net_salary = '$net_salary',status ='$status',inc_amt = '$inc_amt',clawback ='$clawback',inc = '$inc',deductions = '$deduction',earnings = '$earning',transport_redeem = '$transport_redeem',food_redeem = '$food_redeem', adv_adj = '$adv_adj',otp_install = '$otp_install', otp_inc_install = '$otp_inc_install', country_type = '$country_type'";
                    $result = mysqli_query($link, $salQuery);
                    $msg = true;
                } else {
                    $count = "1";
                }
            }
        } else if ($_SESSION["user_type"] == 2 && $_SESSION["country_type"] == 'Ph') {
            foreach ($data as $row) {
                if (($count > 0) && (!empty($row['0']))) {
                    $sal_only_month = $_POST["pay_month"];
                    $sal_month = $_POST["pay_month"] . "-01";
                    $empid = $row['0'];
                    $final_sal_id = $empid . $sal_only_month;
                    $ph_gross_salary =                          $row['1'];
                    $ph_thirteent_month_pay =                   $row['2'];
                    $ph_tax =                                   $row['3'];
                    $ph_sss_emp =                               $row['4'];
                    $ph_sss_emy =                               $row['5'];
                    $ph_phic_emp =                              $row['6'];
                    $ph_phic_emy =                              $row['7'];
                    $ph_hdmf_emp =                              $row['8'];
                    $ph_hdmf_emy =                              $row['9'];
                    $ph_hmo_emp =                               $row['10'];
                    $country_type =                 $_POST['country_type'];
                    $earnings   =                               $row['11'];
                    $net_salary     =                           $row['12'];
                    $deductions     =                           $row['13'];

                    $salQuery = "INSERT INTO gs_emp_salary (emp_sal_id,month_yr,employee_id,ph_gross_salary,ph_thirteent_month_pay,ph_tax,ph_sss_emp,ph_sss_emy,ph_phic_emp,ph_phic_emy,ph_hdmf_emp,ph_hdmf_emy,ph_hmo_emp,country_type,earnings,net_salary,deductions) 
                                    VALUES ('$final_sal_id','$sal_month','$empid','$ph_gross_salary','$ph_thirteent_month_pay','$ph_tax','$ph_sss_emp','$ph_sss_emy','$ph_phic_emp','$ph_phic_emy','$ph_hdmf_emp','$ph_hdmf_emy','$ph_hmo_emp','$country_type','$earnings','$net_salary','$deductions') 
                                    ON DUPLICATE KEY UPDATE month_yr ='$sal_month',employee_id = '$empid',ph_gross_salary ='$ph_gross_salary',ph_thirteent_month_pay = '$ph_thirteent_month_pay',ph_tax ='$ph_tax',ph_sss_emp = '$ph_sss_emp',ph_sss_emy ='$ph_sss_emy',ph_phic_emp = '$ph_phic_emp',ph_phic_emy ='$ph_phic_emy',ph_hdmf_emp = '$ph_hdmf_emp',ph_hdmf_emy ='$ph_hdmf_emy',ph_hmo_emp = '$ph_hmo_emp', country_type = '$country_type', earnings = '$earnings', net_salary = '$net_salary', deductions = '$deductions'";
                    $result = mysqli_query($link, $salQuery);
                    $msg = true;
                } else {
                    $count = "1";
                }
            }
        } else if ($_SESSION["user_type"] == 1 && $_SESSION["country_type"] == 'Ph') {
            foreach ($data as $row) {
                if (($count > 0) && (!empty($row['0']))) {
                    $sal_only_month = $_POST["pay_month"];
                    $sal_month = $_POST["pay_month"] . "-01";
                    $empid = $row['0'];
                    $final_sal_id = $empid . $sal_only_month;
                    $ph_gross_salary =                          $row['1'];
                    $ph_thirteent_month_pay =                   $row['2'];
                    $ph_tax =                                   $row['3'];
                    $ph_sss_emp =                               $row['4'];
                    $ph_sss_emy =                               $row['5'];
                    $ph_phic_emp =                              $row['6'];
                    $ph_phic_emy =                              $row['7'];
                    $ph_hdmf_emp =                              $row['8'];
                    $ph_hdmf_emy =                              $row['9'];
                    $ph_hmo_emp =                               $row['10'];
                    $country_type =                 $_POST['country_type'];
                    $earnings   =                               $row['11'];
                    $net_salary     =                           $row['12'];
                    $deductions     =                           $row['13'];

                    $salQuery = "INSERT INTO gs_emp_salary (emp_sal_id,month_yr,employee_id,ph_gross_salary,ph_thirteent_month_pay,ph_tax,ph_sss_emp,ph_sss_emy,ph_phic_emp,ph_phic_emy,ph_hdmf_emp,ph_hdmf_emy,ph_hmo_emp,country_type,earnings,net_salary,deductions) 
                                    VALUES ('$final_sal_id','$sal_month','$empid','$ph_gross_salary','$ph_thirteent_month_pay','$ph_tax','$ph_sss_emp','$ph_sss_emy','$ph_phic_emp','$ph_phic_emy','$ph_hdmf_emp','$ph_hdmf_emy','$ph_hmo_emp','$country_type','$earnings','$net_salary','$deductions') 
                                    ON DUPLICATE KEY UPDATE month_yr ='$sal_month',employee_id = '$empid',ph_gross_salary ='$ph_gross_salary',ph_thirteent_month_pay = '$ph_thirteent_month_pay',ph_tax ='$ph_tax',ph_sss_emp = '$ph_sss_emp',ph_sss_emy ='$ph_sss_emy',ph_phic_emp = '$ph_phic_emp',ph_phic_emy ='$ph_phic_emy',ph_hdmf_emp = '$ph_hdmf_emp',ph_hdmf_emy ='$ph_hdmf_emy',ph_hmo_emp = '$ph_hmo_emp', country_type = '$country_type',earnings = '$earning', net_salary = '$net_salary',deductions = '$deductions'";
                    $result = mysqli_query($link, $salQuery);
                    $msg = true;
                } else {
                    $count = "1";
                }
            }
        } else if ($_SESSION["user_type"] == 1 && $_SESSION["country_type"] == 'In') {
            if ($_POST['country_type'] == 'In'){
                foreach ($data as $row) {
                    if (($count > 0) && (!empty($row['0']))) {
                        $sal_only_month = $_POST["pay_month"];
                        $sal_month = $_POST["pay_month"] . "-01";
                        $empid = $row['0'];
                        $final_sal_id = $empid . $sal_only_month;
                        $a =                            $row['1'];
                        $b =                            $row['2'];
                        $c =                            $row['3'];
                        $d =                            $row['4'];
                        $e =                            $row['5'];
                        $f =                            $row['6'];
                        $g =                            $row['7'];
                        $h =                            $row['8'];
                        $i =                            $row['9'];
                        $j =                            $row['10'];
                        $k =                            $row['11'];
                        $l =                            $row['12'];
                        $m =                            $row['13'];
                        $n =                            $row['14'];
                        $o =                            $row['15'];
                        $p =                            $row['16'];
                        $q =                            $row['17'];
                        $r =                            $row['18'];
                        $s =                            $row['19'];
                        $t =                            $row['20'];
                        $u =                            $row['21'];
                        $v =                            $row['22'];
                        $w =                            $row['23'];
                        $x =                            $row['24'];
                        $y =                            $row['25'];
                        $z =                            $row['26'];
                        $aa =                           $row['27'];
                        $ab =                           $row['28'];
                        $ac =                           $row['29'];
                        $ad =                           $row['30'];
                        $ae =                           $row['31'];
                        $pre_leave_bal =                $row['32'];
                        $total_ab =                     $row['33'];
                        $total_upl =                    $row['34'];
                        $total_p =                      $row['35'];
                        $total_hd =                     $row['36'];
                        $wo_ph =                        $row['37'];
                        $late_coming =                  $row['38'];
                        $hd_bcoz_late =                 $row['39'];
                        $leaves_adjusted =              $row['40'];
                        $sal_month_basic =              $row['41'];
                        $sal_month_hra =                $row['42'];
                        $sal_month_sa =                 $row['43'];
                        $sal_month_oa =                 $row['44'];
                        $emp_pf_cont =                  $row['45'];
                        $empr_pf_cont =                 $row['46'];
                        $emp_esic_cont =                $row['47'];
                        $empr_esic_cont =               $row['48'];
                        $daily_pay =                    $row['49'];
                        $leave_bal_at_start =           $row['50'];
                        $fix_sal_month_pay =            $row['51'];
                        $tds_deduction =                $row['52'];
                        $penalty_adj =                  $row['53'];
                        $sandwhich_leave_deduction =    $row['54'];
                        $transport =                    $row['55'];
                        $food =                         $row['56'];
                        $other_inc_dues =               $row['57'];
                        $arrears =                      $row['58'];
                        $inc_refferal =                 $row['59'];
                        $pre_month_qualified_app_ach =  $row['60'];
                        $qualified_percentage_pre_month = $row['61'];
                        $inc_qualified =                $row['62'];
                        $spl_allowance =                $row['63'];
                        $kw_installed =                 $row['64'];
                        $install_inc =                  $row['65'];
                        $stack_inc =                    $row['66'];
                        $adjustment =                   $row['67'];
                        $net_salary =                   $row['68'];
                        $status =                       $row['69'];
                        $inc_amt =                      $row['70'];
                        $clawback =                     $row['71'];
                        $inc =                          $row['72'];
                        $deduction =                    $row['73'];
                        $earning =                      $row['74'];
                        $transport_redeem =             $row['75'];
                        $food_redeem =                  $row['76'];
                        $adv_adj =                      $row['77'];
                        $otp_install =                  $row['78'];
                        $otp_inc_install =              $row['79'];
                        $country_type =                 $_POST['country_type'];
    
    
                        $salQuery = "INSERT INTO gs_emp_salary (emp_sal_id,month_yr,employee_id,a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z,aa,ab,ac,ad,ae,pre_leave_bal,total_ab,total_upl,total_p,total_hd,wo_ph,late_coming,hd_bcoz_late,leaves_adjusted,sal_month_basic,sal_month_hra,sal_month_sa,sal_month_oa,emp_pf_cont,empr_pf_cont,emp_esic_cont,empr_esic_cont,daily_pay,leave_bal_at_start,fix_sal_month_pay,tds_deduction,penalty_adj,sandwhich_leave_deduction,transport,food,other_inc_dues,arrears,inc_refferal,pre_month_qualified_app_ach,qualified_percentage_pre_month,inc_qualified,spl_allowance,kw_installed,install_inc,stack_inc,adjustment,net_salary,status,inc_amt,clawback,inc,deductions,earnings,transport_redeem,food_redeem,adv_adj,otp_install,otp_inc_install,country_type) 
                                        VALUES ('$final_sal_id','$sal_month','$empid','$a','$b','$c','$d','$e','$f','$g','$h','$i','$j','$k','$l','$m','$n','$o','$p','$q','$r','$s','$t','$u','$v','$w','$x','$y','$z','$aa','$ab','$ac','$ad','$ae','$pre_leave_bal','$total_ab','$total_upl','$total_p','$total_hd','$wo_ph','$late_coming','$hd_bcoz_late','$leaves_adjusted','$sal_month_basic','$sal_month_hra','$sal_month_sa','$sal_month_oa','$emp_pf_cont','$empr_pf_cont','$emp_esic_cont','$empr_esic_cont','$daily_pay','$leave_bal_at_start','$fix_sal_month_pay','$tds_deduction','$penalty_adj','$sandwhich_leave_deduction','$transport','$food','$other_inc_dues','$arrears','$inc_refferal','$pre_month_qualified_app_ach','$qualified_percentage_pre_month','$inc_qualified','$spl_allowance','$kw_installed','$install_inc','$stack_inc','$adjustment','$net_salary','$status','$inc_amt','$clawback','$inc','$deduction','$earning','$transport_redeem','$food_redeem','$adv_adj','$otp_install','$otp_inc_install','$country_type') 
                                        ON DUPLICATE KEY UPDATE month_yr ='$sal_month',employee_id = '$empid',a ='$a',b = '$b',c ='$c',d = '$d',e ='$e',f = '$f',g ='$g',h = '$h',i ='$i',j = '$j',k ='$k',l = '$l',m ='$m',n = '$n',o ='$o',p = '$p',q ='$q',r = '$r',s ='$s',t = '$t',u ='$u',v = '$v',w ='$w',x = '$x',y ='$y',z = '$z',aa ='$aa',ab = '$ab',ac ='$ac',ad = '$ad',ae ='$ae',pre_leave_bal = '$pre_leave_bal',total_ab ='$total_ab',total_upl = '$total_upl',total_p ='$total_p',total_hd = '$total_hd',wo_ph ='$wo_ph',late_coming = '$late_coming',hd_bcoz_late ='$hd_bcoz_late',leaves_adjusted = '$leaves_adjusted',sal_month_basic ='$sal_month_basic',sal_month_hra = '$sal_month_hra',sal_month_sa ='$sal_month_sa',sal_month_oa = '$sal_month_oa',emp_pf_cont ='$emp_pf_cont',empr_pf_cont = '$empr_pf_cont',emp_esic_cont ='$emp_esic_cont',empr_esic_cont = '$empr_esic_cont',daily_pay ='$daily_pay',leave_bal_at_start = '$leave_bal_at_start',fix_sal_month_pay ='$fix_sal_month_pay',tds_deduction = '$tds_deduction',penalty_adj ='$penalty_adj',sandwhich_leave_deduction = '$sandwhich_leave_deduction',transport ='$transport',food ='$food',other_inc_dues = '$other_inc_dues',arrears ='$arrears',inc_refferal = '$inc_refferal',pre_month_qualified_app_ach ='$pre_month_qualified_app_ach',qualified_percentage_pre_month = '$qualified_percentage_pre_month',inc_qualified ='$inc_qualified',spl_allowance = '$spl_allowance',kw_installed ='$kw_installed',install_inc = '$install_inc',stack_inc ='$stack_inc',adjustment ='$adjustment',net_salary = '$net_salary',status ='$status',inc_amt = '$inc_amt',clawback ='$clawback',inc = '$inc',deductions = '$deduction',earnings = '$earning',transport_redeem = '$transport_redeem',food_redeem = '$food_redeem', adv_adj = '$adv_adj',otp_install = '$otp_install', otp_inc_install = '$otp_inc_install', country_type = '$country_type'";
                        $result = mysqli_query($link, $salQuery);
                        $msg = true;
                    } else {
                        $count = "1";
                    }
                }
            } else if($_POST['country_type'] == 'Ph') {
                foreach ($data as $row) {
                    if (($count > 0) && (!empty($row['0']))) {
                        $sal_only_month = $_POST["pay_month"];
                        $sal_month = $_POST["pay_month"] . "-01";
                        $empid = $row['0'];
                        $final_sal_id = $empid . $sal_only_month;
                        $ph_gross_salary =                          $row['1'];
                        $ph_thirteent_month_pay =                   $row['2'];
                        $ph_tax =                                   $row['3'];
                        $ph_sss_emp =                               $row['4'];
                        $ph_sss_emy =                               $row['5'];
                        $ph_phic_emp =                              $row['6'];
                        $ph_phic_emy =                              $row['7'];
                        $ph_hdmf_emp =                              $row['8'];
                        $ph_hdmf_emy =                              $row['9'];
                        $ph_hmo_emp =                               $row['10'];
                        $country_type =                 $_POST['country_type'];
    
    
                        $salQuery = "INSERT INTO gs_emp_salary (emp_sal_id,month_yr,employee_id,ph_gross_salary,ph_thirteent_month_pay,ph_tax,ph_sss_emp,ph_sss_emy,ph_phic_emp,ph_phic_emy,ph_hdmf_emp,ph_hdmf_emy,ph_hmo_emp,country_type) 
                                        VALUES ('$final_sal_id','$sal_month','$empid','$ph_gross_salary','$ph_thirteent_month_pay','$ph_tax','$ph_sss_emp','$ph_sss_emy','$ph_phic_emp','$ph_phic_emy','$ph_hdmf_emp','$ph_hdmf_emy','$ph_hmo_emp','$country_type') 
                                        ON DUPLICATE KEY UPDATE month_yr ='$sal_month',employee_id = '$empid',ph_gross_salary ='$ph_gross_salary',ph_thirteent_month_pay = '$ph_thirteent_month_pay',ph_tax ='$ph_tax',ph_sss_emp = '$ph_sss_emp',ph_sss_emy ='$ph_sss_emy',ph_phic_emp = '$ph_phic_emp',ph_phic_emy ='$ph_phic_emy',ph_hdmf_emp = '$ph_hdmf_emp',ph_hdmf_emy ='$ph_hdmf_emy',ph_hmo_emp = '$ph_hmo_emp', country_type = '$country_type'";
                        $result = mysqli_query($link, $salQuery);
                        $msg = true;
                    } else {
                        $count = "1";
                    }
                }
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
                        Generate Bulk Pay Slip
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
                            <h3 class="card-title">Upload Attendance Excel Sheet</h3>
                            <div class="card-actions">
                                <a href="static/payroll.xlsx" class="btn" target='__blank'>
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
                                    <div class="col-md-3 text-center" hidden>
                                        <label class="form-label required">Country Type</label>
                                        <!-- <input type="month" class="form-control" name="country_type" id="pay_slip_month" value="<?php echo date("Y-m", strtotime("-1 month")); ?>" autocomplete="off" required/> -->
                                        <select class="form-select" name="country_type">
                                            <?php if ($_SESSION["country_type"] == 'In' && $_SESSION['user_type'] == '2') {
                                                echo '<option value="In">India</option>';
                                            } else if ($_SESSION["country_type"] == 'Ph' && $_SESSION['user_type'] == '2') {
                                                echo '<option value="Ph">Philippines</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>

                                    <?php
                                    if ($_SESSION['user_type'] == '1' && $_SESSION["country_type"] == 'In') {

                                        echo '<div class="col-md-3 text-center">
                                        <label class="form-label required">Country Type</label>
                                        <!-- <input type="month" class="form-control" name="country_type" id="pay_slip_month" value="<?php echo date("Y-m", strtotime("-1 month")); ?>" autocomplete="off" required/> -->
                                        <select class="form-select" name="country_type">
                                        <option value="In">India</option>
                                        <option value="Ph">Philippines</option>
                                        </select>
                                    </div>';
                                    } else if ($_SESSION['user_type'] == '1' && $_SESSION["country_type"] == 'Ph') {

                                        echo '<div class="col-md-3 text-center">
                                        <label class="form-label required">Country Type</label>
                                        <!-- <input type="month" class="form-control" name="country_type" id="pay_slip_month" value="<?php echo date("Y-m", strtotime("-1 month")); ?>" autocomplete="off" required/> -->
                                        <select class="form-select" name="country_type">
                                        <option value="Ph">Philippines</option>
                                        </select>
                                    </div>';
                                    }
                                    ?>
                                    <div class="col-md-3 text-center">
                                        <label class="form-label required">Select Pay Slip Month</label>
                                        <input type="month" class="form-control" name="pay_month" id="pay_slip_month" value="<?php echo date("Y-m", strtotime("-1 month")); ?>" autocomplete="off" required />
                                    </div>
                                    <div class="col-md-3 text-center">
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