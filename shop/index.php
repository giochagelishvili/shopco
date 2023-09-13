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
                    $product->display_new_arrivals();
                    ?>
                </div>
            </div>
        </section>
    </main>
</body>

</html>