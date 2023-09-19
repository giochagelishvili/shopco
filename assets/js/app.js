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

    var limit = 10;

    $('.show-more-btn').on('click', function () {
        limit += 10;

        // Get the current URL
        var currentURL = window.location.href;

        // Parse the query string
        var queryString = currentURL.split('?')[1];

        // Initialize a variable to store the category value
        var category = null;

        // Check if there is a query string
        if (queryString) {
            // Split the query string into key-value pairs
            var params = queryString.split('&');

            // Loop through the key-value pairs
            for (var i = 0; i < params.length; i++) {
                var param = params[i].split('=');

                // Check if the key is 'category'
                if (param[0] === 'category') {
                    // Decode the value and assign it to the 'category' variable
                    category = decodeURIComponent(param[1]);
                    break; // Exit the loop since we found the 'category' parameter
                }
            }
        }

        $('.products-container').load('../../inc/products.controller.php', { limit: limit, category: category }, function () {
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
        });
    });

    // Fetchs data from JSON file according to given index and displays it on the page
    function updateFeedback(index) {
        // Get data from feedbacks JSON file
        $.getJSON('/shopco/assets/js/feedbacks.json', function (data) {
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