document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();

        document.querySelector(this.getAttribute('href')).scrollIntoView({
            behavior: 'smooth'
        });
    });
});

$("#gen_sal").click(function () {
    var basic_calc = 0;
    var final_basic = 0;
    var final_hra = 0;
    var final_stack = 0;
    var hra = 0;
    var hra_calc = 0;
    var annual_hra_calc = 0;
    var final_food_allw = 0;
    var final_travel_allw = 0;
    var final_ote_inc = 0;


    var candidate_name = $("#full_name").val();
    $(".candidate_name").text(candidate_name);

    var candidate_desg = $("#desg").val();
    $(".designation").text(candidate_desg);

    var gross_sal = $("#gross_salary").val();
    var stack_inc = $("#stack_incentives").val();
    var food_allw = $("#food_allowance").val();
    var travel_allw = $("#travel_allowance").val();
    var ote_inc = $("#ote_incentives").val();

    if (gross_sal == 0 || gross_sal == null) {
        final_basic = 0;
        $(".basic").text(addCommas(final_basic));
    } else {
        $(".footerImage").show();
        basic_calc = gross_sal * 0.4;

        basic_calc <= 12000 ? final_basic = 12000 : final_basic = basic_calc;
        final_basic = parseFloat(final_basic);

        $(".basic").text(addCommas(parseFloat(final_basic)));
    }

    var annual_final_basic = final_basic * 12;
    $(".annual_basic").text(addCommas(parseFloat(annual_final_basic)));

    hra_calc = final_basic * 1.5;
    if (hra_calc < gross_sal) {
        final_hra = final_basic * 0.5;
        final_hra = parseFloat(final_hra);
        $(".hra").text(addCommas(parseFloat(final_hra)));
    } else {
        final_hra = gross_sal - final_basic;
        final_hra = parseFloat(final_hra);
        $(".hra").text(addCommas(parseFloat(final_hra)));
    }

    annual_hra_calc = final_hra * 12;
    $(".annual_hra").text(addCommas(parseFloat(annual_hra_calc)));

    var sa_calculation = gross_sal - final_basic - final_hra;
    if (sa_calculation > final_hra) {
        var sa_calc = final_basic * 0.5;
        sa_calc = parseFloat(sa_calc);
        $(".sa").text(addCommas(parseFloat(sa_calc)));

    } else {
        var sa_calc = sa_calculation;
        sa_calc = parseFloat(sa_calc);
        $(".sa").text(addCommas(parseFloat(sa_calc)));
    }

    var annual_sa_calc = sa_calc * 12;
    $(".annual_sa").text(addCommas(parseFloat(annual_sa_calc)));

    var oa_calculation = gross_sal - final_basic - final_hra - sa_calc;

    oa_calc = parseFloat(oa_calculation);
    $(".oa").text(addCommas(parseFloat(oa_calc)));

    var annual_oa_calc = oa_calc * 12;
    $(".annual_oa").text(addCommas(parseFloat(annual_oa_calc)));

    var final_gross = final_basic + final_hra + sa_calc + oa_calc;
    $(".gs").text(addCommas(parseFloat(final_gross)));

    var annual_final_gross = final_gross * 12;
    $(".annual_gs").text(addCommas(parseFloat(annual_final_gross)));

    if (food_allw == null || food_allw == "" || food_allw == 0) {
        $(".food_allow").hide();
    } else {
        $(".food_allow").show();
        final_food_allw = parseInt(food_allw);
        $(".fa").text(addCommas(parseFloat(final_food_allw)));

        var annual_food_allw = final_food_allw * 12;
        $(".annual_fa").text(addCommas(parseFloat(annual_food_allw)));
    }

    if (travel_allw == null || travel_allw == "" || travel_allw == 0) {
        $(".travel_allow").hide();
    } else {
        $(".travel_allow").show();
        final_travel_allw = parseInt(travel_allw);
        $(".ta").text(addCommas(parseFloat(final_travel_allw)));

        var annual_travel_allw = final_travel_allw * 12;
        $(".annual_ta").text(addCommas(parseFloat(annual_travel_allw)));
    }

    if (stack_inc == null || stack_inc == "" || stack_inc == 0) {
        $(".stack_in").hide();
        $(".stack_info").hide();
        $(".in-hand").text("In Hand");
    } else {
        $(".stack_in").show();
        $(".stack_info").show();
        $(".in-hand").text("In Hand (Including Stack Incentives)");
        final_stack = parseInt(stack_inc);
        $(".si").text(addCommas(final_stack));

        var annual_final_stack = final_stack * 12;
        $(".annual_si").text(addCommas(annual_final_stack));
    }

    // ############## OTE Incentives ########### -->

    if (ote_inc == null || ote_inc == "" || ote_inc == 0) {
        $(".ote_in").hide();
    } else {
        $(".ote_in").show();
        // $(".ote_in").text("In Hand (Including OTE Incentives)");
        final_ote_inc = parseInt(ote_inc);
        $(".ote").text(addCommas(final_ote_inc));
        var annual_final_ote_inc = final_ote_inc * 12;
        $(".annual_ote").text(addCommas(annual_final_ote_inc));
    }

    // ############## OTE Incentives ########### -->

    // var total_earnings = final_gross + final_stack;
    // $(".earn").text(addCommas(total_earnings));

    // var annual_total_earnings = total_earnings * 12;
    // $(".annual_earn").text(addCommas(annual_total_earnings));

    var pf_calc = gross_sal - final_hra;
    if (pf_calc >= 15000) {
        var final_pf_employer = 15000 * 0.13;
        final_pf_employer = parseFloat(final_pf_employer);

        var final_pf_employee = 15000 * 0.12;
        final_pf_employee = parseFloat(final_pf_employee);
    } else {
        var final_pf_employer = pf_calc * 0.13;
        final_pf_employer = parseFloat(final_pf_employer);

        var final_pf_employee = pf_calc * 0.12;
        final_pf_employee = parseFloat(final_pf_employee);
    }

    $(".pfempr").text(addCommas(final_pf_employer));
    $(".pfemp").text(addCommas(final_pf_employee));

    var annual_final_pf_employer = final_pf_employer * 12;
    $(".annual_pfempr").text(addCommas(annual_final_pf_employer));

    var annual_final_pf_employee = final_pf_employee * 12;
    $(".annual_pfemp").text(addCommas(annual_final_pf_employee));

    // if (final_gross >= 21001) {
    if (final_gross >= 21000) {
        var final_esi_employer = 0;
        var final_esi_employee = 0;
    } else {
        var final_esi_employer = final_gross * 0.0325;
        final_esi_employer = Math.round(final_esi_employer);

        var final_esi_employee = final_gross * 0.0075;
        final_esi_employee = Math.round(final_esi_employee);
    }

    $(".esiempr").text(addCommas(parseFloat(final_esi_employer)));
    $(".esiemp").text(addCommas(parseFloat(final_esi_employee)));

    var annual_final_esi_employer = final_esi_employer * 12;
    $(".annual_esiempr").text(addCommas(annual_final_esi_employer));

    var annual_final_esi_employee = final_esi_employee * 12;
    $(".annual_esiemp").text(addCommas(annual_final_esi_employee));

    var total_deduction = final_pf_employer + final_pf_employee + final_esi_employer + final_esi_employee;
    $(".tolduc").text(addCommas(total_deduction));

    var annual_total_deduction = total_deduction * 12;
    $(".annual_tolduc").text(addCommas(annual_total_deduction));

    // ############## In Hand Cal ########### -->
    // Both Are check Food & Travel
    if ($("#add_food_allowance").is(":checked") && $("#add_travel_allowance").is(":checked")) {
        // alert("Food & Travel")
        var add_food_allowance = $("#food_allowance").val();
        var add_travel_allowance = $("#travel_allowance").val();
        var final_food_allowance_value = parseFloat(add_food_allowance);
        var final_travel_allowance_value = parseFloat(add_travel_allowance);

        var in_hand = (final_gross - final_pf_employee - final_esi_employee) + final_stack + final_food_allowance_value + final_travel_allowance_value;
        $(".inhand").text(addCommas(in_hand));

        $("#fohide").hide();
        $("#trhide").hide();
        $("#avaiService").hide();
    } else if ($("#add_food_allowance").is(":checked")) {
        // check Food
        // alert("food");
        var add_food_allowance = $("#food_allowance").val();
        var final_food_allowance_value = parseFloat(add_food_allowance);
        var in_hand = (final_gross - final_pf_employee - final_esi_employee) + final_stack + final_food_allowance_value;
        $(".inhand").text(addCommas(in_hand));
        $("#fohide").hide();
        $("#avaiService").show();


    } else if ($("#add_travel_allowance").is(":checked")) {
        // check Travel
        // alert("travel");
        var add_travel_allowance = $("#travel_allowance").val();
        var final_travel_allowance_value = parseFloat(add_travel_allowance);
        var in_hand = (final_gross - final_pf_employee - final_esi_employee) + final_stack + final_travel_allowance_value;
        $(".inhand").text(addCommas(in_hand));
        $("#trhide").hide();
        $("#avaiService").show();


    } else {
        // Both Are unchecked
        // alert("both unchecked");
        var in_hand = (final_gross - final_pf_employee - final_esi_employee) + final_stack;
        $(".inhand").text(addCommas(in_hand));
        $("#fohide").show();
        $("#trhide").show();
        $("#avaiService").show();
    }


    // ############## In Hand Cal ########### -->

    // var in_hand = (final_gross - final_pf_employee - final_esi_employee) + final_stack;
    // $(".inhand").text(addCommas(in_hand));

    var annual_in_hand = in_hand * 12;
    $(".annual_inhand").text(addCommas(annual_in_hand));

    var ctc_calc = final_gross + final_stack + final_pf_employer + final_esi_employer + final_food_allw + final_travel_allw;
    $(".ctc").text(addCommas(ctc_calc));

    var annual_ctc_calc = ctc_calc * 12;
    $(".annual_ctc").text(addCommas(annual_ctc_calc));

    final_basic = hra = final_hra = final_stack = gross_sal = food_allw = final_food_allw = travel_allw = final_travel_allw = stack_inc = basic_calc = hra_calc = sa_calc = oa_calc = final_gross = total_earnings = final_pf_employer = final_pf_employee = final_esi_employer = final_esi_employee = total_deduction = in_hand = ctc_calc = final_ote_inc = 0;

    annual_final_basic = annual_final_stack = annual_gross_sal = annual_stack_inc = annual_food_allw = annual_travel_allw = annual_basic_calc = annual_hra_calc = annual_sa_calc = annual_oa_calc = annual_final_gross = annual_total_earnings = annual_final_pf_employer = annual_final_pf_employee = annual_final_esi_employer = annual_final_esi_employee = annual_total_deduction = annual_in_hand = annual_ctc_calc = annual_final_ote_inc = 0;

});

function addCommas(nStr) {
    var inr_amt = nStr.toLocaleString('en-IN', {
        maximumFractionDigits: 2,
        style: 'currency',
        currency: 'INR'
    });
    return inr_amt;
}

function generatePDF() {
    var doc_name = $("#full_name").val() + "_Salary_Structure.pdf";
    var element = document.getElementById('converttoPDF');
    html2pdf().set({ html2canvas: { scale: 4, scrollY: 0 } }).from(element).save(doc_name);
}