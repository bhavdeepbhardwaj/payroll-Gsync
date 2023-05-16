document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();

        document.querySelector(this.getAttribute('href')).scrollIntoView({
            behavior: 'smooth'
        });
    });
});


$("#gen_salfreelancer").click(function () {

    var candidate_name = $("#full_name").val();
    $(".candidate_name").text(candidate_name);

    var candidate_desg = $("#desg").val();
    $(".designation").text(candidate_desg);

    var service_unit = $("#ser_unt").val();
    $(".service_unit").text(addCommas(parseFloat(service_unit)));

    var annual_service_unit = service_unit * 12;
    $(".annual_service_unit").text(addCommas(parseFloat(annual_service_unit)));

    var service_unit_sold = $("#ser_unt_sold").val();
    $(".service_unit_sold").text(service_unit_sold);

    var annual_service_unit_sold = service_unit_sold * 12;
    $(".annual_service_unit_sold").text(annual_service_unit_sold);

    if ($("#ser_unt").val() && $("#ser_unt_sold").val() != null) {
        var total_revenue = service_unit * service_unit_sold;
        $(".total_revenue").text(addCommas(parseFloat(total_revenue)));

        var annual_total_revenue = total_revenue * 12;
        $(".annual_total_revenue").text(addCommas(parseFloat(annual_total_revenue)));
    }

    var freelanc_comm = total_revenue * 0.1;
    $(".freelanc_comm").text(addCommas(parseFloat(freelanc_comm)));

    var annual_freelanc_comm = freelanc_comm * 12;
    $(".annual_freelanc_comm").text(addCommas(parseFloat(annual_freelanc_comm)));

});

function addCommas(nStr) {
    var inr_amt = nStr.toLocaleString('en-US', {
        maximumFractionDigits: 2,
        style: 'currency',
        currency: 'USD'
    });
    return inr_amt;
}

function generatePDF() {
    var doc_name = $("#full_name").val() + "_Salary_Structure.pdf";
    var element = document.getElementById('converttoPDF');
    html2pdf().set({
        html2canvas: {
            scale: 4,
            scrollY: 0
        }
    }).from(element).save(doc_name);
}