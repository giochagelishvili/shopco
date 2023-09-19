$(document).ready(function () {
    // Open navigation menu
    $(".menu-btn").click(function () {
        // Slide navigation menu from left to right
        $(".nav-menu").show().animate({
            "left": "0"
        });

        // Disable background scroll
        $("body").css({
            "height": "100vh",
            "overflow": "hidden"
        })
    });

    // Close navigation menu
    $(".close-menu-btn").click(function () {
        // Slide navigation menu from right to left
        $(".nav-menu").animate({
            "left": "-100%"
        });

        // Enable background scroll
        $("body").css({
            "height": "auto",
            "overflow": "visible"
        });
    });

    // Iterate over rating divs
    $(".rating-div").each(function () {
        // Rating in float value (e.g. 4.5)
        var rating = $(this).text();

        // Use rateYo to display rating
        $(this).rateYo({
            rating: rating,
            starWidth: "20px"
        });

        // Display rating in numbers (e.g. 4.5/5)
        $(this).append(rating + "/5");
    });

    // Customer index variable for feedbacks
    var customerIndex = 0;

    // Display first customer's feedback
    updateFeedback(customerIndex);

    // Load previous customer's feedback on click of previous button
    $('.previous-btn').on('click', function () {
        customerIndex -= 1;
        updateFeedback(customerIndex);
    });

    // Load next customer's feedback on click of next button
    $('.next-btn').on('click', function () {
        customerIndex += 1;
        updateFeedback(customerIndex);
    });

    // Fetchs data from JSON file according to given index and displays it on the page
    function updateFeedback(index) {
        // Get data from feedbacks JSON file
        $.getJSON('assets/js/feedbacks.json', function (data) {
            // Get length of array
            var length = data.length;

            // If customer index is less than 0 jump to the last customer
            if (index < 0) {
                index = length - 1;
                customerIndex = length - 1;
            }

            // If customer index is more than existing customers jump to first customer
            if (index >= length) {
                index = 0;
                customerIndex = 0;
            }

            // Check if customer rating container is empty
            if ($('.customer-rating').is(':empty')) {
                $('.customer-rating').fadeOut(400, function () {
                    // Display rating if empty
                    $('.customer-rating').rateYo({
                        rating: data[0]['feedback_rating'],
                        starWidth: '20px'
                    });

                    $('.customer-rating').fadeIn(400);
                });
            } else {
                // Update rating if it already exists
                $('.customer-rating').fadeOut(400, function () {
                    $(this).rateYo("option", "rating", data[index]["feedback_rating"]);
                    $(this).fadeIn(400);
                });
            }

            // Display customer's name
            $('.customer-name-container').fadeOut(400, function () {
                // Check if customer is verified
                if (data[index]['verified'] == true) {
                    $('.verification').css('display', 'block');
                } else {
                    $('.verification').css('display', 'none');
                }

                $('.customer-name').text(data[index]['name']);

                $(this).fadeIn(400);
            });

            // Display customer's feedback message
            $('.customer-feedback').fadeOut(400, function () {
                $(this).text(data[index]['feedback']);
                $(this).fadeIn(400);
            });
        });
    }
});