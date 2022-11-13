<?php include "header.php"; ?>

<?php

    $emp_id = $_POST["emp_id"];
    $full_name = $_POST["full_name"];
    $paid_days = $_POST["paid_days"];
    $total_days = $_POST["total_days"];
    $gross_salary = $_POST["gross_salary"];

    $basic = $hra = $sa = $oa = $pf_emp = $pf_empr = $esi_emp = $esi_empr = $inhand = $gross_salary_perday = $gross_salary_present = $basic_calc = $hra_calc = 0;

    $gross_salary_perday = $gross_salary / $total_days;
    $gross_salary_present = $gross_salary_perday * $paid_days;

    $basic_calc = $gross_salary_present * 0.4;

    $hra_calc = $basic_calc / 2;

    $sa_calc;

    $oa_calc;

?>

<div class="page-wrapper">
    <div class="container-xl">
        <!-- Page title -->
        <div class="page-header d-print-none">
        <div class="row g-2 align-items-center">
            <div class="col">
            <h2 class="page-title">
                Salary Slip
            </h2>
            </div>
            <!-- Page title actions -->
            <div class="col-12 col-md-auto ms-auto d-print-none">
            <button type="button" class="btn btn-primary" onclick="javascript:window.print();">
                <!-- Download SVG icon from http://tabler-icons.io/i/printer -->
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M17 17h2a2 2 0 0 0 2 -2v-4a2 2 0 0 0 -2 -2h-14a2 2 0 0 0 -2 2v4a2 2 0 0 0 2 2h2" /><path d="M17 9v-4a2 2 0 0 0 -2 -2h-6a2 2 0 0 0 -2 2v4" /><rect x="7" y="13" width="10" height="8" rx="2" /></svg>
                Print Salary Slip
            </button>
            </div>
        </div>
        </div>
    </div>
    <div class="page-body">
        <div class="container-xl">
        <div class="card card-lg">
            <div class="card-body">
            <div class="row">
                <div class="col-6">
                <p class="h3">Globalsync Pvt. Ltd.</p>
                <address>
                    Street Address<br>
                    State, City<br>
                    Region, Postal Code<br>
                    ltd@example.com
                </address>
                </div>
                <div class="col-6 text-end">
                    <p>Amount</p>
                    <p class="text-blue h1">₹50,000/-</p>
                </div>
                <div class="col-12 my-5">
                <h1>GLBSYN/001/15</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                <table class="table table-transparent table-responsive">
                    <thead>
                    <tr>
                        <th class="text-center" style="width: 1%"></th>
                        <th>Earnings</th>
                        <th class="text-center" style="width: 1%">Amount</th>
                        <th class="text-end" style="width: 1%">YTD</th>
                    </tr>
                    </thead>
                    <tr>
                    <td class="text-center">1</td>
                    <td>
                        <p class="strong mb-1">Basic</p>
                    </td>
                    <td class="text-center">
                        ₹18,000.00
                    </td>
                    <td class="text-end">₹18,000.00</td>
                    </tr>
                    <tr>
                    <td class="text-center">2</td>
                    <td>
                        <p class="strong mb-1">Basic</p>
                    </td>
                    <td class="text-center">
                        ₹18,000.00
                    </td>
                    <td class="text-end">₹18,000.00</td>
                    </tr>
                    <tr>
                    <td class="text-center">3</td>
                    <td>
                        <p class="strong mb-1">Basic</p>
                    </td>
                    <td class="text-center">
                        ₹18,000.00
                    </td>
                    <td class="text-end">₹18,000.00</td>
                    </tr>
                    <tr>
                    <td colspan="3" class="strong text-end">Gross Earnings</td>
                    <td class="text-end">$25.000,00</td>
                    </tr>
                </table>
                </div>
                <div class="col-6">
                <table class="table table-transparent table-responsive">
                    <thead>
                    <tr>
                        <th class="text-center" style="width: 1%"></th>
                        <th>Earnings</th>
                        <th class="text-center" style="width: 1%">Amount</th>
                        <th class="text-end" style="width: 1%">YTD</th>
                    </tr>
                    </thead>
                    <tr>
                    <td class="text-center">1</td>
                    <td>
                        <p class="strong mb-1">Basic</p>
                    </td>
                    <td class="text-center">
                        ₹18,000.00
                    </td>
                    <td class="text-end">₹18,000.00</td>
                    </tr>
                    <tr>
                    <td class="text-center">2</td>
                    <td>
                        <p class="strong mb-1">Basic</p>
                    </td>
                    <td class="text-center">
                        ₹18,000.00
                    </td>
                    <td class="text-end">₹18,000.00</td>
                    </tr>
                    <tr>
                    <td class="text-center">3</td>
                    <td>
                        <p class="strong mb-1">Basic</p>
                    </td>
                    <td class="text-center">
                        ₹18,000.00
                    </td>
                    <td class="text-end">₹18,000.00</td>
                    </tr>
                    <tr>
                    <td colspan="3" class="strong text-end">Gross Earnings</td>
                    <td class="text-end">$25.000,00</td>
                    </tr>
                </table>
                </div>
            </div>
            <p class="text-muted text-center mt-5">This is a system generated payslip, hence the signature is not required.</p>
            </div>
        </div>
        </div>
    </div>

<?php include "footer.php"; ?>