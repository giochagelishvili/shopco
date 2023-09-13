$(document).ready(function () {
    $(".menu-btn").click(function () {
        $(".nav-menu").show().animate({
            "left": "0"
        });
        $("body").css({
            "height": "100vh",
            "overflow": "hidden"
        })
    });

    $(".close-menu-btn").click(function () {
        $(".nav-menu").animate({
            "left": "-100%"
        })
        $("body").css({
            "height": "auto",
            "overflow": "visible"
        })
    });

    $(".rating-div").each(function () {
        var rating = $(this).text();
        $(this).rateYo({
            rating: rating,
            starWidth: "20px"
        });
        $(this).append(rating + "/5");
    });
});