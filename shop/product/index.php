<!DOCTYPE html>
<html lang="en">

<?php
include("../../inc/head.php");

if (!isset($_GET['id'])) {
    header('location: ../products');
}
?>

<body>
    <div class="bg-black py-2">
        <p class="text-white text-xs text-center">
            Get 20% off of your first order.
            <a href="#" class=" border-b border-b-white">Create your FREE account !</a>
        </p>
    </div>

    <?php include("../../inc/header.php") ?>

    <main>
        <section>
            <div class="products-container p-4 xl:grid-cols-4 xl:px-28 xl:gap-24 xl:overflow-hidden">
                <?php
                include("../../classes/product.classes.php");
                $product_obj = new Product();
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $product = $product_obj->display_product("", false, 1, $id, true);

                    $breadCrumbs = $product_obj->breadcrumbs([$product[0]['category']]);

                    $product_images = explode('/', $product[0]['product_img']);
                    $product_name = $product[0]['product_name'];
                    $product_rating = $product[0]['product_rating'];
                    $product_price = $product[0]['product_price'];
                    $gender = $product[0]['gender'];
                    $category = $product[0]['category'];
                    $listing = $product[0]['listing'];
                    $colors = explode('/', $product[0]['colors']);
                    $sizes = explode('/', $product[0]['sizes']);
                }
                ?>

                <div class="font-raleway">
                    <?php echo $breadCrumbs[0] ?>
                </div>

                <div class="product-container p-4">
                    <div class="img-container">
                        <div>
                            <img class="main-img" src=<?php echo "/shopco/uploads/product_images/" . $product_images[0] ?> alt="product image">
                        </div>
                        <div class="flex items-center gap-2 overflow-x-scroll mt-4">
                            <?php
                            foreach ($product_images as $product_image) {
                                echo "<img class='w-1/3 secondary-img' src='/shopco/uploads/product_images/" . $product_image . "' alt='product image'>";
                            }
                            ?>
                        </div>
                    </div>
                    <div class="name-container my-2 w-2/3">
                        <h1 class="font-bebas font-bold text-4xl tracking-wide">
                            <?php echo $product_name ?>
                        </h1>
                    </div>
                    <div class="rating-div flex items-center gap-2">
                        <?php echo $product_rating ?>
                    </div>
                    <div class="price-div font-raleway font-bold text-3xl my-2">
                        $<?php echo $product_price ?>
                    </div>
                    <hr class="my-6">
                    <div>
                        <h2 class="font-raleway opacity-70">Select Colors</h2>
                        <div class="flex items-center gap-2 mt-2">
                            <?php
                            foreach ($colors as $color) {
                                echo "<div class='flex items-center justify-center relative color-container cursor-pointer'>";
                                echo "<img src='/shopco/uploads/colors/$color' />";
                                echo "<span class='material-symbols-outlined text-white absolute z-10 hidden tick-mark'>done</span>";
                                echo "</div>";
                            }
                            ?>
                        </div>
                    </div>
                    <hr class="my-6">
                    <div>
                        <h2 class="font-raleway opacity-70">Choose Size</h2>
                        <div class="flex items-center gap-2 flex-wrap mt-2 size-container">
                            <?php
                            foreach ($sizes as $size) {
                                echo "<button class='bg-gray-200 py-2 px-5 rounded-full font-raleway size-btn'>$size</button>";
                            }
                            ?>
                        </div>
                    </div>
                    <hr class="my-6">
                    <div class="flex items-center gap-4">
                        <div class="flex items-center gap-3 bg-gray-200 px-5 py-2 rounded-full font-raleway text-2xl">
                            <span class="material-symbols-outlined minus-btn">
                                remove
                            </span>
                            <span class="quantity">1</span>
                            <span class="material-symbols-outlined plus-btn">
                                add
                            </span>
                        </div>
                        <div class="w-full">
                            <button class='bg-black text-white py-3 w-full rounded-full font-raleway size-btn'>Add to Cart</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <?php include("../../inc/footer.php") ?>
</body>

</html>