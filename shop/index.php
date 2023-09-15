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
            <div class="xl:grid xl:grid-cols-2">
                <div class="xl:pl-28 xl:py-8">
                    <div class="py-8 px-8 w-full">
                        <h1 class=" text-6xl font-bebas xl:font-bold xl:text-7xl">
                            FIND CLOTHES <br>
                            THAT MATCHES <br>
                            YOUR STYLE.
                        </h1>

                        <p class="font-raleway text-xs opacity-80 mt-2 xl:text-lg xl:w-full">
                            Browse through our diverse range of meticulously crafted garments, designed to bring out your individuality and cater to your sense of style.
                        </p>

                        <div class="flex items-center my-6">
                            <a href="#" class="bg-black w-full font-raleway text-white text-center text-lg py-3 rounded-full xl:w-56">Shop Now</a>
                        </div>
                    </div>

                    <div class="flex flex-col items-center justify-center gap-6 px-10 xl:flex-row xl:justify-start">
                        <div class="flex items-center justify-between w-full xl:justify-between xl:w-2/3">
                            <div class="flex flex-col items-start justify-start">
                                <span class="font-bebas text-4xl">200+</span>
                                <span class="font-raleway text-xs opacity-70">International Brands</span>
                            </div>

                            <div class="w-[1px] h-16 bg-gray-400"></div>

                            <div class="flex flex-col items-start justify-start">
                                <span class="font-bebas text-4xl">2,000+</span>
                                <span class="font-raleway text-xs opacity-70">High-Quality Products</span>
                            </div>

                            <div class="w-[1px] h-16 bg-gray-400 hidden xl:block"></div>

                            <div class="flex-col items-start justify-start hidden xl:flex">
                                <span class="font-bebas text-4xl">30,000+</span>
                                <span class="font-raleway text-xs opacity-70">Happy Customers</span>
                            </div>
                        </div>

                        <div class="flex flex-col items-start justify-start xl:hidden">
                            <span class="font-bebas text-4xl">30,000+</span>
                            <span class="font-raleway text-xs opacity-70">Happy Customers</span>
                        </div>
                    </div>
                </div>

                <div class="mt-6 w-full xl:flex xl:items-end xl:justify-center">
                    <img src="../uploads/hero.png" alt="girl and boy" class="xl:hidden">
                    <img src="../uploads/hero-desktop.png" alt="girl and boy" class="hidden xl:block xl:w-2/3">
                </div>
            </div>

            <div class="bg-black flex items-center justify-center gap-4 flex-wrap p-8 xl:justify-evenly">
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

                <div class="flex items-center gap-4 overflow-x-scroll p-4 xl:px-28 xl:gap-24 xl:overflow-hidden">
                    <?php
                    include("../classes/product.classes.php"); // Include product class
                    $product = new Product(); // Instantiate new Product object
                    $product->display_product("new_arrivals"); // Display products from new_arrivals table
                    ?>
                </div>

                <div class="flex items-center my-6 px-6 xl:px-28">
                    <a href="#" class="w-full font-raleway font-semibold text-center text-lg py-3 rounded-full border border-gray-300">View All</a>
                </div>
            </div>

            <!-- Divider -->
            <div class="w-[95vw] h-[1px] bg-gray-300 my-8 mx-auto xl:w-[85vw]"></div>

            <div>
                <h1 class="font-bebas text-6xl text-center mt-8 mb-4">TOP SELLING</h1>

                <div class="flex items-center gap-4 overflow-x-scroll p-4 xl:px-28 xl:gap-24 xl:overflow-hidden">
                    <?php
                    $product->display_product("top_selling"); // Display products from top_selling table
                    ?>
                </div>

                <div class="flex items-center my-6 px-6 xl:px-28">
                    <a href="#" class="w-full font-raleway font-semibold text-center text-lg py-3 rounded-full border border-gray-300">View All</a>
                </div>
            </div>
        </section>

        <section class="px-4 xl:px-24">
            <div class="w-full bg-gray-200 rounded-xl flex flex-col items-center justify-center gap-4 p-4 xl:p-8">
                <h1 class="font-bebas font-bold text-5xl xl:text-7xl xl:tracking-widest">
                    BROWSE BY <br class="xl:hidden">
                    DRESS STYLE
                </h1>

                <div class="flex flex-col items-center justify-center gap-4 xl:hidden">
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

                <div class="hidden xl:flex xl:flex-col xl:items-center xl:justify-center xl:gap-8 xl:px-24">
                    <div class="flex items-center justify-center gap-8">
                        <a href="#">
                            <img src="../uploads/dress_styles/casual-desktop.png" alt="photo of casual style">
                        </a>
                        <a href="#">
                            <img src="../uploads/dress_styles/formal-desktop.png" alt="photo of formal style"">
                        </a>
                    </div>

                    <div class=" flex items-center justify-center gap-8">
                            <a href="#">
                                <img src="../uploads/dress_styles/party-desktop.png" alt="photo of party style">
                            </a>
                            <a href="#">
                                <img src="../uploads/dress_styles/gym-desktop.png" alt="photo of gym style">
                            </a>
                    </div>
                </div>
            </div>
        </section>

        <section class="py-12 px-4 xl:flex xl:items-start xl:justify-around">
            <!-- Customer feedback container -->
            <div class="xl:flex-col xl:items-start xl:w-1/3">
                <!-- Navigation container -->
                <div class="flex items-end justify-between w-full xl:w-auto">
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
            <div class="bg-black mt-12 flex flex-col items-center justify-center gap-4 p-8 rounded-3xl xl:m-0 xl:w-1/3">
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

    <?php include("../inc/footer.php") ?>
</body>

</html>