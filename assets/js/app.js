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

    var customerIndex = 0;

    $.getJSON('../assets/js/feedbacks.json', function (data) {
        $('.customer-rating').rateYo({
            rating: data[0]["feedback_rating"],
            starWidth: "20px"
        });

        $('.customer-name').text(data[0]['name']);

        if (data[0]['verified'] == true) {
            $('.verification').css('display', 'block');
        } else {
            $('.verification').css('display', 'none');
        }

        $('.customer-feedback').text(data[0]['feedback']);
    });

    $('.previous-btn').on('click', function () {
        customerIndex -= 1;
        updateFeedback(customerIndex);
    });

    $('.next-btn').on('click', function () {
        customerIndex += 1;
        updateFeedback(customerIndex);
    });

    function updateFeedback(index) {
        $.getJSON('../assets/js/feedbacks.json', function (data) {
            var length = data.length;

            if (index < 0) {
                index = length - 1;
                customerIndex = length - 1;
            }

            if (index >= length) {
                index = 0;
                customerIndex = 0;
            }

            $('.customer-rating').rateYo("option", "rating", data[index]["feedback_rating"]);

            $('.customer-name').text(data[index]['name']);

            if (data[index]['verified'] == true) {
                $('.verification').css('display', 'block');
            } else {
                $('.verification').css('display', 'none');
            }

            $('.customer-feedback').text(data[index]['feedback']);
        });
    }
});