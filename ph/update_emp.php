<?php

session_start();

require_once "config.php";

if(isset($_POST["update"])){

        $em_id = $_POST["emp_id"];
        $password = $_POST["emp_pswd"];
    
        $param_password = password_hash($password, PASSWORD_DEFAULT);

        if(!empty($password)) {

        $sql = "UPDATE ph_users, ph_employees SET ph_users.password = '".$param_password."', ph_users.user_type = '".$_POST["emp_role"]."', ph_users.user_status = '".$_POST["emp_status"]."', ph_employees.emp_name = '".$_POST["full_name"]."', ph_employees.emp_desg = '".$_POST["emp_designation"]."', ph_employees.emp_mail = '".$_POST["email"]."', ph_employees.doj = '".$_POST["doj"]."', ph_employees.emp_dept = '".$_POST["department"]."', ph_employees.emp_pan = '".$_POST["pan"]."', ph_employees.emp_uan = '".$_POST["uan"]."', ph_employees.emp_esi = '".$_POST["esi"]."', ph_employees.emp_paymode = '".$_POST["payment_mode"]."', ph_employees.emp_bank = '".$_POST["bank"]."', ph_employees.emp_ifsc = '".$_POST["ifsc"]."', ph_employees.emp_acc = '".$_POST["ac_no"]."', ph_employees.emp_gsal = '".$_POST["gross"]."', ph_employees.emp_food = '".$_POST["food_allw"]."', ph_employees.emp_travel = '".$_POST["travel_allw"]."', ph_employees.emp_spl = '".$_POST["spl_allowance"]."', ph_employees.emp_meal = '".$_POST["msa"]."', ph_employees.emp_cab = '".$_POST["tsa"]."', ph_employees.emp_stinc = '".$_POST["stack"]."', ph_employees.emp_inc = '".$_POST["inc"]."', ph_employees.emp_other = '".$_POST["others"]."', ph_employees.emp_exitdate = '".$_POST["eed"]."', ph_employees.emp_desp = '".$_POST["desc"]."', ph_employees.emp_status = '".$_POST["emp_status"]."' WHERE ph_users.username = '".$_POST["emp_id"]."' AND ph_employees.emp_id = '".$_POST["emp_id"]."'" ;
        
        } else {

        $sql = "UPDATE ph_users, ph_employees SET ph_users.user_type = '".$_POST["emp_role"]."', ph_users.user_status = '".$_POST["emp_status"]."', ph_employees.emp_name = '".$_POST["full_name"]."', ph_employees.emp_desg = '".$_POST["emp_designation"]."', ph_employees.emp_mail = '".$_POST["email"]."', ph_employees.doj = '".$_POST["doj"]."', ph_employees.emp_dept = '".$_POST["department"]."', ph_employees.emp_pan = '".$_POST["pan"]."', ph_employees.emp_uan = '".$_POST["uan"]."', ph_employees.emp_esi = '".$_POST["esi"]."', ph_employees.emp_paymode = '".$_POST["payment_mode"]."', ph_employees.emp_bank = '".$_POST["bank"]."', ph_employees.emp_ifsc = '".$_POST["ifsc"]."', ph_employees.emp_acc = '".$_POST["ac_no"]."', ph_employees.emp_gsal = '".$_POST["gross"]."', ph_employees.emp_food = '".$_POST["food_allw"]."', ph_employees.emp_travel = '".$_POST["travel_allw"]."', ph_employees.emp_spl = '".$_POST["spl_allowance"]."', ph_employees.emp_meal = '".$_POST["msa"]."', ph_employees.emp_cab = '".$_POST["tsa"]."', ph_employees.emp_stinc = '".$_POST["stack"]."', ph_employees.emp_inc = '".$_POST["inc"]."', ph_employees.emp_other = '".$_POST["others"]."', ph_employees.emp_exitdate = '".$_POST["eed"]."', ph_employees.emp_desp = '".$_POST["desc"]."', ph_employees.emp_status = '".$_POST["emp_status"]."' WHERE ph_users.username = '".$_POST["emp_id"]."' AND ph_employees.emp_id = '".$_POST["emp_id"]."'";

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