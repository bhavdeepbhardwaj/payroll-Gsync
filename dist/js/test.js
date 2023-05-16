document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();

        document.querySelector(this.getAttribute('href')).scrollIntoView({
            behavior: 'smooth'
        });
    });
});


$("#gen_salfreelancer").click(function () {
    var final_food_allw = 0;
    var final_travel_allw = 0;

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



    // var rev_ten = $("#revenue_ten").val();
    // var rev_five = $("#revenue_five").val();
    // var food_allw = $("#food_allowance").val();
    // var travel_allw = $("#travel_allowance").val();

    // var final_gross = rev_ten;
    // $(".te").text(addCommas(parseFloat(final_gross)));

    //  Revenue 10 %

    // if(rev_ten == null || rev_ten == "" || rev_ten == 0) {
    //     $(".re_ten").none();
    // } else {
    //     $(".re_ten").show();
    //     final_rev_ten = parseInt(rev_ten);
    //     $(".te").text(parseFloat(final_rev_ten));

    //     var annual_rev_ten = final_rev_ten * 12;
    //     $(".annual_te").text(parseFloat(annual_rev_ten));
    // }

    //  Revenue 5 %

    // if(rev_five == null || rev_five == "" || rev_five == 0) {
    //     $(".re_five").hide();
    // } else {
    //     $(".re_five").show();
    //     final_rev_five = parseInt(rev_five);
    //     $(".fi").text(parseFloat(final_rev_five));

    //     var annual_rev_five = final_rev_five * 12;
    //     $(".annual_fi").text(addCommas(parseFloat(annual_rev_five)));
    // }

    // if(food_allw == null || food_allw == "" || food_allw == 0) {
    //     $(".food_allow").hide();
    // } else {
    //     $(".food_allow").show();
    //     final_food_allw = parseInt(food_allw);
    //     $(".fa").text(addCommas(parseFloat(final_food_allw)));

    //     var annual_food_allw = final_food_allw * 12;
    //     $(".annual_fa").text(addCommas(parseFloat(annual_food_allw)));
    // }

    // if(travel_allw == null || travel_allw == "" || travel_allw == 0) {
    //     $(".travel_allow").hide();
    // } else {
    //     $(".travel_allow").show();
    //     final_travel_allw = parseInt(travel_allw);
    //     $(".ta").text(addCommas(parseFloat(final_travel_allw)));

    //     var annual_travel_allw = final_travel_allw * 12;
    //     $(".annual_ta").text(addCommas(parseFloat(annual_travel_allw)));
    // }

    // var in_hand = final_rev_ten + final_food_allw + final_travel_allw + final_rev_five;
    // $(".inhand").text(addCommas(in_hand));

    // var annual_in_hand = in_hand * 12;
    // $(".annual_inhand").text(addCommas(annual_in_hand));

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