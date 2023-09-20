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
        var numericRating = "<div class='flex items-center'><span>" + rating + "</span><span>/</span><span>5</span></div>";
        $(this).append(numericRating);
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

    // Product show limit default
    var limit = 10;

    // Add click event listener to show more button
    $('.show-more-btn').on('click', function () {
        // Increase product show limit by 10
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

        // Load products according to new given limit
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

    // Add click event listener to secondary images
    $('.secondary-img').on('click', function () {
        // Get the source of clicked image
        var src = $(this).attr('src');

        // Replace the source of main image with the source of clicked image
        $('.main-img').fadeOut(150, function () {
            $(this).attr('src', src);
            $(this).fadeIn(150); // Animate fade in
        });
    });

    // Choose product's first color by default
    $('.color-container:first').find('.tick-mark').css('display', 'block');

    // Add click event listener to color container (the actual color icon is treated as container)
    $('.color-container').on('click', function () {
        $('.color-container').find('.tick-mark').css('display', 'none'); // Hide check mark for every color
        $(this).find('.tick-mark').css('display', 'block'); // Show check mark on chosen (clicked) color
    });

    // Add click event listener to size button
    $('.size-btn').on('click', function () {
        $('.size-btn').removeClass('size-active');
        $(this).addClass('size-active');
    });

    // Add click event listener to minus button
    $('.minus-btn').on('click', function () {
        // Select current quantity and turn into integer
        var quantity = parseInt($('.quantity').text());

        // If quantity is greater than 1 decrease it by one
        if (quantity > 1) {
            quantity -= 1;
        }

        // Update quantity on the page
        $('.quantity').text(quantity);
    });

    // Add click event listener to plus button
    $('.plus-btn').on('click', function () {
        // Select current quantity and turn into integer
        var quantity = parseInt($('.quantity').text());

        // Increase quantity by one
        quantity += 1;

        // Update quantity on the page
        $('.quantity').text(quantity);
    });

    var formVisible = false;

    $('.account-btn').on('click', function (event) {
        event.stopPropagation(); // Stop event propagation
        $('.user-form').fadeIn(150);
        formVisible = true;
    });

    $('.register-btn').on('click', function () {
        $('.login-form').fadeOut(150, function () {
            $('.sign-up-form').fadeIn(150);
        });
    });

    $('.login-btn').on('click', function () {
        $('.sign-up-form').fadeOut(150, function () {
            $('.login-form').fadeIn(150);
        });
    });

    // Handle clicks outside of the .form-container
    $(document).on('click', function (event) {
        if (formVisible && !$(event.target).closest('.form-container').length) {
            $('.user-form').fadeOut(150);
            formVisible = false;
        }
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