document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function(e) {
        e.preventDefault();

        document.querySelector(this.getAttribute('href')).scrollIntoView({
            behavior: 'smooth'
        });
    });
});

$("#gen_sal").click(function() {

    var sss_emp = $("#sss_employee").val();
    var sss_emr = $("#sss_employer").val();
    var phic_emp = $("#phic_employee").val();
    var phic_emr = $("#phic_employer").val();
    var hdmf_emp = $("#hdmf_employee").val();
    var hdmf_emr = $("#hdmf_employer").val();
    var tax = $("#tax").val();
    var gross_salary = $("#gross_salary").val();
    var thmonthpay = $("#th_month_pay").val();
    var hmo = $("#hmo").val();



    // Candidate Name
    var candidate_name = $("#full_name").val();
    $(".candidate_name").text(candidate_name);

    // Candidate Desg
    var candidate_desg = $("#desg").val();
    $(".designation").text(candidate_desg);

    // Gross Salary
    if (gross_salary == null || gross_salary == "" || gross_salary == 0) {
        gross_salary = 0;

        // var gross_salary = $("#gross_salary").val();
        $(".gs").text(addCommas(parseFloat(gross_salary)));

        var annual_gross_salary = gross_salary * 12;
        $(".annual_gs").text(addCommas(parseFloat(annual_gross_salary)));
    } else {

        var gross_salary = $("#gross_salary").val();
        $(".gs").text(addCommas(parseFloat(gross_salary)));

        var annual_gross_salary = gross_salary * 12;
        $(".annual_gs").text(addCommas(parseFloat(annual_gross_salary)));
    }


    // 13th Month Pay
    if (thmonthpay == null || thmonthpay == "" || thmonthpay == 0) {

        thmonthpay = 0;
        // var thmonthpay = $("#th_month_pay").val();
        // var thmonthpay = gross_salary / 12;
        $(".thmonthpay").text(addCommas(parseFloat(thmonthpay)));

        var annual_thmonthpay = thmonthpay * 12;
        $(".annual_thmonthpay").text(addCommas(parseFloat(annual_thmonthpay)));
    } else {

        var thmonthpay = $("#th_month_pay").val();
        $(".thmonthpay").text(addCommas(parseFloat(thmonthpay)));

        var annual_thmonthpay = thmonthpay * 12;
        $(".annual_thmonthpay").text(addCommas(parseFloat(annual_thmonthpay)));
    }

    // HMO PhilCare - Employee
    if (hmo == null || hmo == "" || hmo == 0) {

        hmo = 0;
        //  var hmo = $("#hmo").val();
        $(".hmo").text(addCommas(parseFloat(hmo)));

        var annual_hmo = hmo * 12;
        $(".annual_hmo").text(addCommas(parseFloat(annual_hmo)));
    } else {
        var hmo = $("#hmo").val();
        $(".hmo").text(addCommas(parseFloat(hmo)));

        var annual_hmo = hmo * 12;
        $(".annual_hmo").text(addCommas(parseFloat(annual_hmo)));
    }

    // SSS - Employee
    if (sss_emp == null || sss_emp == "" || sss_emp == 0) {
        $(".sss_em").hide();
    } else {
        $(".sss_em").show();
        var sss_employee = $("#sss_employee").val();
        $(".sss_employee").text(addCommas(parseFloat(sss_employee)));

        var annual_sssemployee = sss_employee * 12;
        $(".annual_sssemployee").text(addCommas(parseFloat(annual_sssemployee)));
    }

    // SSS - Employer
    if (sss_emr == null || sss_emr == "" || sss_emr == 0) {
        $(".sss_er").hide();
    } else {
        $(".sss_er").show();
        var sss_employer = $("#sss_employer").val();
        $(".sss_employer").text(addCommas(parseFloat(sss_employer)));

        var annual_sssemployer = sss_employer * 12;
        $(".annual_sssemployer").text(addCommas(parseFloat(annual_sssemployer)));
    }

    // PHIC - Employer
    if (phic_emr == null || phic_emr == "" || phic_emr == 0) {
        $(".phic_emr").hide();
    } else {
        $(".phic_emr").show();
        var phic_employer = $("#phic_employer").val();
        $(".phic_employer").text(addCommas(parseFloat(phic_employer)));

        var annual_phic_employer = phic_employer * 12;
        $(".annual_phic_employer").text(addCommas(parseFloat(annual_phic_employer)));
    }

    // PHIC - Employer
    if (phic_emp == null || phic_emp == "" || phic_emp == 0) {
        $(".phic_emp").hide();
    } else {
        $(".phic_emp").show();
        var phic_employee = $("#phic_employee").val();
        $(".phic_employee").text(addCommas(parseFloat(phic_employee)));

        var annual_phic_employee = phic_employee * 12;
        $(".annual_phic_employee").text(addCommas(parseFloat(annual_phic_employee)));
    }

    // HDMF - Employer
    if (hdmf_emr == null || hdmf_emr == "" || hdmf_emr == 0) {
        $(".hdmf_emr").hide();
    } else {
        $(".hdmf_emr").show();
        var hdmf_employer = $("#hdmf_employer").val();
        $(".hdmf_employer").text(addCommas(parseFloat(hdmf_employer)));

        var annual_hdmf_employer = hdmf_employer * 12;
        $(".annual_hdmf_employer").text(addCommas(parseFloat(annual_hdmf_employer)));
    }

    // HDMF - Employee
    if (hdmf_emp == null || hdmf_emp == "" || hdmf_emp == 0) {
        $(".hdmf_emp").hide();
    } else {
        $(".hdmf_emp").show();
        var hdmf_employee = $("#hdmf_employee").val();
        $(".hdmf_employee").text(addCommas(parseFloat(hdmf_employee)));

        var annual_hdmf_employee = hdmf_employee * 12;
        $(".annual_hdmf_employee").text(addCommas(parseFloat(annual_hdmf_employee)));
    }

    // Tax
    if (tax == null || tax == "" || tax == 0) {
        $(".taxp").hide();
    } else {
        $(".taxp").show();
        var tax = $("#tax").val();
        $(".tax").text(addCommas(parseFloat(tax)));

        var annual_tax = tax * 12;
        $(".annual_tax").text(addCommas(parseFloat(annual_tax)));
    }

    // Total Contributions

    var total_contr = parseFloat(hmo) + parseFloat(sss_employee) + parseFloat(sss_employer) + parseFloat(phic_employee) + parseFloat(phic_employer) + parseFloat(hdmf_employee) + parseFloat(hdmf_employer) + parseFloat(tax);
    // console.log(total_contr);
    // alert(total_contr);
    $(".total_contr").text(addCommas(parseFloat(total_contr)));

    // Annual
    var annual_total_contr = total_contr * 12;
    $(".annual_total_contr").text(addCommas(parseFloat(annual_total_contr)));

    // In Hand
    // var inHand = parseInt(gross_salary) - parseInt(sss_employee) - parseInt(phic_employee) - parseInt(hdmf_employee) - parseInt(tax);
    var inHand = gross_salary - (sss_employee - phic_employee - hdmf_employee - tax);
    // alert(inHand); 
    $(".in_hand_fn").text(addCommas(parseFloat(inHand)));

    var annual_inHand = inHand * 12;
    $(".annual_in_hand_fn").text(addCommas(parseFloat(annual_inHand)));

    // CTC 
    // var ctc = parseInt(gross_salary) + parseInt(sss_employer) + parseInt(phic_employer) + parseInt(hdmf_employer) + parseInt(thmonthpay) + parseInt(hmo);
    var ctc = gross_salary + sss_employer + phic_employer + hdmf_employer + thmonthpay + hmo;
    // alert(ctc);
    $(".ctc_fn").text(addCommas(parseInt(ctc)));

    var annual_ctc = parseFloat(ctc) * 12;
    $(".annual_ctc_fn").text(addCommas(annual_ctc));

    sss_emp = sss_emr = phic_emp = phic_emr = hdmf_emp = hdmf_emr = gross_salary = thmonthpay = hmo = 0;

    annual_sssemployee = annual_sssemployer = annual_phic_employer = annual_phic_employee = annual_hdmf_employee = annual_hdmf_employer = annual_gross_salary = annual_thmonthpay = annual_hmo = 0;

});

function addCommas(nStr) {
    var inr_amt = nStr.toLocaleString('en-IN', {
        maximumFractionDigits: 1,
        style: 'currency',
        currency: 'PHP'
    });
    return inr_amt;
}

function generatePDF() {
    var doc_name = $("#full_name").val() + "_Salary_Structure.pdf";
    var element = document.getElementById('converttoPDF');
    html2pdf().set({ html2canvas: { scale: 4, scrollY: 0 } }).from(element).save(doc_name);
}