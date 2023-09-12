$(document).ready(function () {
    $(".menu-btn").click(function () {
        $(".nav-menu").show().animate({
            "left": "0"
        });
    });

    $(".close-menu-btn").click(function () {
        $(".nav-menu").animate({
            "left": "-100%"
        })
    });
});