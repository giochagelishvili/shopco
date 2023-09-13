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
                    include("../classes/product.classes.php");
                    $product = new Product();
                    $product->display_product("new_arrivals");
                    ?>
                </div>

                <div class="flex items-center my-6 px-6">
                    <a href="#" class="w-full font-raleway font-semibold text-center text-lg py-3 rounded-full border border-gray-300">View All</a>
                </div>
            </div>

            <div class="w-[95vw] h-[1px] bg-gray-300 my-8 mx-auto"></div>

            <div>
                <h1 class="font-bebas text-6xl text-center mt-8 mb-4">TOP SELLING</h1>

                <div class="flex items-center gap-4 overflow-x-scroll p-4">
                    <?php
                    $product->display_product("top_selling");
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
    </main>
</body>

</html>