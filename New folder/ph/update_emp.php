<?php

session_start();

require_once "config.php";

if(isset($_POST["update"])){

        $em_id = $_POST["emp_id"];
        $password = $_POST["emp_pswd"];
    
        $param_password = password_hash($password, PASSWORD_DEFAULT);

        if(!empty($password)) {

        $sql = "UPDATE users, gs_employees SET users.password = '".$param_password."', users.user_type = '".$_POST["emp_role"]."', users.user_status = '".$_POST["emp_status"]."', gs_employees.emp_name = '".$_POST["full_name"]."', gs_employees.emp_desg = '".$_POST["emp_designation"]."', gs_employees.emp_mail = '".$_POST["email"]."', gs_employees.doj = '".$_POST["doj"]."', gs_employees.emp_dept = '".$_POST["department"]."', gs_employees.emp_pan = '".$_POST["pan"]."', gs_employees.emp_uan = '".$_POST["uan"]."', gs_employees.emp_esi = '".$_POST["esi"]."', gs_employees.emp_paymode = '".$_POST["payment_mode"]."', gs_employees.emp_bank = '".$_POST["bank"]."', gs_employees.emp_ifsc = '".$_POST["ifsc"]."', gs_employees.emp_acc = '".$_POST["ac_no"]."', gs_employees.emp_gsal = '".$_POST["gross"]."', gs_employees.emp_food = '".$_POST["food_allw"]."', gs_employees.emp_travel = '".$_POST["travel_allw"]."', gs_employees.emp_spl = '".$_POST["spl_allowance"]."', gs_employees.emp_meal = '".$_POST["msa"]."', gs_employees.emp_cab = '".$_POST["tsa"]."', gs_employees.emp_stinc = '".$_POST["stack"]."', gs_employees.emp_inc = '".$_POST["inc"]."', gs_employees.emp_other = '".$_POST["others"]."', gs_employees.emp_exitdate = '".$_POST["eed"]."', gs_employees.emp_desp = '".$_POST["desc"]."', gs_employees.emp_status = '".$_POST["emp_status"]."' WHERE users.username = '".$_POST["emp_id"]."' AND gs_employees.emp_id = '".$_POST["emp_id"]."'" ;
        
        } else {

        $sql = "UPDATE users, gs_employees SET users.user_type = '".$_POST["emp_role"]."', users.user_status = '".$_POST["emp_status"]."', gs_employees.emp_name = '".$_POST["full_name"]."', gs_employees.emp_desg = '".$_POST["emp_designation"]."', gs_employees.emp_mail = '".$_POST["email"]."', gs_employees.doj = '".$_POST["doj"]."', gs_employees.emp_dept = '".$_POST["department"]."', gs_employees.emp_pan = '".$_POST["pan"]."', gs_employees.emp_uan = '".$_POST["uan"]."', gs_employees.emp_esi = '".$_POST["esi"]."', gs_employees.emp_paymode = '".$_POST["payment_mode"]."', gs_employees.emp_bank = '".$_POST["bank"]."', gs_employees.emp_ifsc = '".$_POST["ifsc"]."', gs_employees.emp_acc = '".$_POST["ac_no"]."', gs_employees.emp_gsal = '".$_POST["gross"]."', gs_employees.emp_food = '".$_POST["food_allw"]."', gs_employees.emp_travel = '".$_POST["travel_allw"]."', gs_employees.emp_spl = '".$_POST["spl_allowance"]."', gs_employees.emp_meal = '".$_POST["msa"]."', gs_employees.emp_cab = '".$_POST["tsa"]."', gs_employees.emp_stinc = '".$_POST["stack"]."', gs_employees.emp_inc = '".$_POST["inc"]."', gs_employees.emp_other = '".$_POST["others"]."', gs_employees.emp_exitdate = '".$_POST["eed"]."', gs_employees.emp_desp = '".$_POST["desc"]."', gs_employees.emp_status = '".$_POST["emp_status"]."' WHERE users.username = '".$_POST["emp_id"]."' AND gs_employees.emp_id = '".$_POST["emp_id"]."'";

        }

        $link -> query($sql);

        if($link -> affected_rows > 0){
            $_SESSION["dataUpdate"] = "1";
            $_SESSION["dataIns"] = "0";
            $_SESSION["message"] = "0";
            header("Location: view_emps.php");
        } else {
            echo "Something went wrong.";
            echo $link -> error;
        }

        mysqli_close($link);
    
        
    
        }

?>