<!DOCTYPE html>
<html lang="en">

<?php include("../inc/head.php") ?>

<body>
    <div class="bg-black py-2">
        <p class="text-white text-xs text-center">
            Get 20% off of your first order.
            <a href="#" class=" border-b border-b-white">Create your FREE account !</a>
        </p>
    </div>

    <?php include("../inc/header.php") ?>

    <main>
        <section class="bg-[#F2F0F1]">
            <div class="py-8 px-6 w-full">
                <h1 class=" text-6xl font-bebas">
                    FIND CLOTHES <br>
                    THAT MATCHES <br>
                    YOUR STYLE.
                </h1>

                <p class="font-raleway text-xs opacity-80 mt-2">
                    Browse through our diverse range of meticulously crafted garments, designed to bring out your individuality and cater to your sense of style.
                </p>

                <div class="flex items-center my-6">
                    <a href="#" class="bg-black w-full font-raleway text-white text-center text-lg py-3 rounded-full">Shop Now</a>
                </div>
            </div>

            <div class="flex flex-col items-center justify-center gap-6 px-10">
                <div class="flex items-center justify-between w-full">
                    <div class="flex flex-col items-start justify-start">
                        <span class="font-bebas text-4xl">200+</span>
                        <span class="font-raleway text-xs opacity-70">International Brands</span>
                    </div>

                    <div class="w-[1px] h-16 bg-gray-400"></div>

                    <div class="flex flex-col items-start justify-start">
                        <span class="font-bebas text-4xl">2,000+</span>
                        <span class="font-raleway text-xs opacity-70">High-Quality Products</span>
                    </div>
                </div>

                <div class="flex flex-col items-start justify-start">
                    <span class="font-bebas text-4xl">30,000+</span>
                    <span class="font-raleway text-xs opacity-70">Happy Customers</span>
                </div>
            </div>

            <div class="mt-6">
                <img src="../uploads/hero.png" alt="girl and boy">
            </div>

            <div class="bg-black flex items-center justify-center gap-4 flex-wrap p-8">
                <img class=" h-5" src="../uploads/brands/versace.png" alt="versace logo">
                <img class=" h-6" src="../uploads/brands/zara.png" alt="zara logo">
                <img class=" h-6" src="../uploads/brands/gucci.png" alt="gucci logo">
                <img class=" h-4" src="../uploads/brands/prada.png" alt="prada logo">
                <img class=" h-5" src="../uploads/brands/calvin-klein.png" alt="calvin klein logo">
            </div>
        </section>

        <section>
            <div>
                <h1 class="font-bebas text-6xl text-center mt-8 mb-4">NEW ARRIVALS</h1>

                <div class="flex items-center gap-4 overflow-x-scroll p-4">
                    <?php
                    include("../classes/product.classes.php"); // Include product class
                    $product = new Product(); // Instantiate new Product object
                    $product->display_product("new_arrivals"); // Display products from new_arrivals table
                    ?>
                </div>

                <div class="flex items-center my-6 px-6">
                    <a href="#" class="w-full font-raleway font-semibold text-center text-lg py-3 rounded-full border border-gray-300">View All</a>
                </div>
            </div>

            <!-- Divider -->
            <div class="w-[95vw] h-[1px] bg-gray-300 my-8 mx-auto"></div>

            <div>
                <h1 class="font-bebas text-6xl text-center mt-8 mb-4">TOP SELLING</h1>

                <div class="flex items-center gap-4 overflow-x-scroll p-4">
                    <?php
                    $product->display_product("top_selling"); // Display products from top_selling table
                    ?>
                </div>

                <div class="flex items-center my-6 px-6">
                    <a href="#" class="w-full font-raleway font-semibold text-center text-lg py-3 rounded-full border border-gray-300">View All</a>
                </div>
            </div>
        </section>

        <section class="px-4">
            <div class="w-full bg-gray-200 rounded-xl flex flex-col items-center justify-center gap-4 p-4">
                <h1 class="font-bebas font-bold text-5xl">
                    BROWSE BY <br>
                    DRESS STYLE
                </h1>

                <div class="flex flex-col items-center justify-center gap-4">
                    <a href="#">
                        <img src="../uploads/dress_styles/casual.png" alt="photo of casual style">
                    </a>
                    <a href="#">
                        <img src="../uploads/dress_styles/formal.png" alt="photo of formal style">
                    </a>
                    <a href="#">
                        <img src="../uploads/dress_styles/party.png" alt="photo of party style">
                    </a>
                    <a href="#">
                        <img src="../uploads/dress_styles/gym.png" alt="photo of gym style">
                    </a>
                </div>
            </div>
        </section>

        <section class="py-12 px-4">
            <!-- Customer feedback container -->
            <div>
                <!-- Navigation container -->
                <div class="flex items-end justify-between w-full">
                    <h1 class="font-bebas font-bold text-5xl">
                        OUR HAPPY <br>
                        CUSTOMERS
                    </h1>

                    <div class="flex items-end gap-8">
                        <i class="fa-solid fa-arrow-left text-3xl previous-btn"></i>
                        <i class="fa-solid fa-arrow-right text-3xl next-btn"></i>
                    </div>
                </div>

                <!-- Feedback container -->
                <div class="mt-6 p-4 border border-gray-300 rounded-2xl flex flex-col items-start justify-between gap-4">
                    <!-- Rating and name container -->
                    <div class="flex flex-col items-start gap-2">
                        <!-- Customer's given rating goes here -->
                        <div class="customer-rating"></div>

                        <!-- Customer's name and verification icon goes here -->
                        <div class="flex items-center gap-2 customer-name-container">
                            <!-- Customer's name -->
                            <h1 class="font-raleway font-semibold text-lg mt-1 customer-name"></h1>

                            <!-- Verification icon -->
                            <span class="material-symbols-outlined text-green-400 text-md verification">verified</span>
                        </div>
                    </div>

                    <!-- Customer's feedback message goes here -->
                    <p class="font-raleway opacity-60 text-sm customer-feedback"></p>
                </div>
            </div>

            <!-- Subscription container -->
            <div class="bg-black mt-12 flex flex-col items-center justify-center gap-4 p-8 rounded-3xl">
                <h1 class="font-bebas font-semibold text-white text-5xl ">
                    STAY UP TO DATE <br>
                    ABOUT OUR <br>
                    LATEST OFFERS
                </h1>

                <form action="" class="w-full">
                    <div class="bg-white flex items-center pl-4 rounded-full">
                        <span class="material-symbols-outlined">
                            mail
                        </span>
                        <input type="email" name="email-input" id="email-input" placeholder="Enter your email address" class="p-3" />
                    </div>
                    <div class="flex items-center">
                        <button type="submit" class="w-full font-raleway font-semibold text-center text-md py-3 rounded-full bg-white mt-4">Subscribe to newsletter</button>
                    </div>
                </form>
            </div>
        </section>
    </main>

    <footer class="p-4 bg-[#F2F0F1]">
        <div>
            <h1 class="font-bebas font-bold text-6xl mt-1">SHOP.CO</h1>
            <p class="opacity-60">
                We have clothes that suits your style and which you’re proud to wear. From women to men.
            </p>
        </div>

        <div class="my-6 flex items-strech gap-6 text-3xl">
            <i class="fa-brands fa-x-twitter"></i>
            <i class="fa-brands fa-facebook-f"></i>
            <i class="fa-brands fa-instagram"></i>
        </div>

        <div class="grid grid-cols-2 gap-y-8 w-full">
            <div>
                <h1 class="font-raleway font-semibold text-lg">COMPANY</h1>
                <ul class="flex flex-col items-start gap-2 mt-2 text-gray-500">
                    <li><a href="#">About</a></li>
                    <li><a href="#">Features</a></li>
                    <li><a href="#">Works</a></li>
                    <li><a href="#">Career</a></li>
                </ul>
            </div>

            <div>
                <h1 class="font-raleway font-semibold text-lg">HELP</h1>
                <ul class="flex flex-col items-start gap-2 mt-2 text-gray-500">
                    <li><a href="#">Customer Support</a></li>
                    <li><a href="#">Delivery Details</a></li>
                    <li><a href="#">Terms & Conditions</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                </ul>
            </div>

            <div>
                <h1 class="font-raleway font-semibold text-lg">FAQ</h1>
                <ul class="flex flex-col items-start gap-2 mt-2 text-gray-500">
                    <li><a href="#">Account</a></li>
                    <li><a href="#">Manage Deliveries</a></li>
                    <li><a href="#">Orders</a></li>
                    <li><a href="#">Payment</a></li>
                </ul>
            </div>

            <div>
                <h1 class="font-raleway font-semibold text-lg">Resources</h1>
                <ul class="flex flex-col items-start gap-2 mt-2 text-gray-500">
                    <li><a href="#">Free eBook</a></li>
                    <li><a href="#">Development Tutorial</a></li>
                    <li><a href="#">How to - Blog</a></li>
                    <li><a href="#">Youtube Playlist</a></li>
                </ul>
            </div>
        </div>

        <div class="h-[0.5px] w-full bg-gray-400 my-8"></div>

        <div class="flex flex-col items-center justify-between">
            <h2 class="font-raleway opacity-70 text-sm">Shop.co © 2000-2023, All Rights Reserved</h2>
            <div class="flex items-center gap-4 my-4">
                <i class="fa-brands fa-cc-visa text-3xl"></i>
                <i class="fa-brands fa-cc-mastercard text-3xl"></i>
                <i class="fa-brands fa-cc-paypal text-3xl"></i>
                <i class="fa-brands fa-cc-apple-pay text-3xl"></i>
                <i class="fa-brands fa-google-pay text-3xl"></i>
            </div>
        </div>
    </footer>
</body>

</html>