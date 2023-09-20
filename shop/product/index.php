<!DOCTYPE html>
<html lang="en">

<?php
// Include head
include("../../inc/head.php");

// Redirect user to products page if ID is not provided
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

    <!-- Insert header -->
    <?php include("../../inc/header.php") ?>

    <main>
        <section>
            <div class="products-container p-4 xl:grid-cols-4 xl:px-28 xl:gap-24 xl:overflow-hidden">
                <?php
                include("../../classes/product.classes.php"); // Load product class
                $product_obj = new Product(); // Create new product object

                // Make sure product ID is provided
                if (isset($_GET['id'])) {
                    $id = $_GET['id']; // Catch product ID from GET request
                    $product = $product_obj->display_product("", false, 1, $id, true); // Collect product info from database

                    $breadCrumbs = $product_obj->breadcrumbs([$product[0]['category']]); // Generate breadcrumb navigation for the page

                    $product_images = explode('/', $product[0]['product_img']); // Product images array (In case of product having several images)
                    $product_name = $product[0]['product_name']; // Product name
                    $product_rating = $product[0]['product_rating']; // Product rating
                    $product_price = $product[0]['product_price']; // Product price
                    $gender = $product[0]['gender']; // Product gender
                    $category = $product[0]['category']; // Product category (Shirt, T-Shirt, Trousers etc.)
                    $listing = $product[0]['listing']; // Product listing (New arrivals, top selling etc.)
                    $colors = explode('/', $product[0]['colors']); // Product colors
                    $sizes = explode('/', $product[0]['sizes']); // Product sizes
                }
                ?>

                <!-- Breadcrumb navigation div -->
                <div class="font-raleway">
                    <?php echo $breadCrumbs[0] ?>
                </div>

                <!-- Product div -->
                <div class="product-container p-4">
                    <!-- This div contains images of the product -->
                    <div class="img-container">
                        <!-- Load main image -->
                        <div>
                            <img class="main-img" src=<?php echo "/shopco/uploads/product_images/" . $product_images[0] ?> alt="product image">
                        </div>

                        <!-- Secondary images container -->
                        <div class="flex items-center gap-2 overflow-x-scroll mt-4">
                            <?php
                            // Loop through images and display them on the page
                            foreach ($product_images as $product_image) {
                                echo "<img class='w-1/3 secondary-img' src='/shopco/uploads/product_images/" . $product_image . "' alt='product image'>";
                            }
                            ?>
                        </div>
                    </div>

                    <!-- This div contains name of the product -->
                    <div class="name-container my-2 w-2/3">
                        <h1 class="font-bebas font-bold text-4xl tracking-wide">
                            <?php echo $product_name ?>
                        </h1>
                    </div>

                    <!-- This div contains rating of the product -->
                    <div class="rating-div flex items-center gap-2">
                        <?php echo $product_rating ?>
                    </div>

                    <!-- This div contains the price of the product -->
                    <div class="price-div font-raleway font-bold text-3xl my-2">
                        $<?php echo $product_price ?>
                    </div>

                    <!-- Divider line -->
                    <hr class="my-6">

                    <!-- This div contains colors for selection -->
                    <div>
                        <h2 class="font-raleway opacity-70">Select Colors</h2>

                        <!-- Colors container -->
                        <div class="flex items-center gap-2 mt-2">
                            <?php
                            // Loop through colors and display them on the page
                            foreach ($colors as $color) {
                                // Color div
                                echo "<div class='flex items-center justify-center relative color-container cursor-pointer'>";
                                echo "<img src='/shopco/uploads/colors/$color' />"; // Color icon
                                echo "<span class='material-symbols-outlined text-white absolute z-10 hidden tick-mark'>done</span>"; // Checkmark icon
                                echo "</div>"; // End of color div
                            }
                            ?>
                        </div>
                    </div>

                    <!-- Divider line -->
                    <hr class="my-6">

                    <!-- This div contains size for selection -->
                    <div>
                        <h2 class="font-raleway opacity-70">Choose Size</h2>

                        <!-- Size container -->
                        <div class="flex items-center gap-2 flex-wrap mt-2 size-container">
                            <?php
                            // Loop through sizes and display them on the page
                            foreach ($sizes as $size) {
                                echo "<button class='bg-gray-200 py-2 px-5 rounded-full font-raleway size-btn'>$size</button>";
                            }
                            ?>
                        </div>
                    </div>

                    <!-- Divider line -->
                    <hr class="my-6">

                    <!-- This div contains quantity and add to cart buttons -->
                    <div class="flex items-center gap-4">
                        <!-- Quantity container -->
                        <div class="flex items-center gap-3 bg-gray-200 px-5 py-2 rounded-full font-raleway text-2xl">
                            <!-- Minus button -->
                            <span class="material-symbols-outlined minus-btn">
                                remove
                            </span>

                            <!-- Quantity -->
                            <span class="quantity">1</span>

                            <!-- Plus button -->
                            <span class="material-symbols-outlined plus-btn">
                                add
                            </span>
                        </div>

                        <!-- Add to Cart button container -->
                        <div class="w-full">
                            <!-- Add to Cart button -->
                            <button class='bg-black text-white py-3 w-full rounded-full font-raleway size-btn'>Add to Cart</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- Insert footer -->
    <?php include("../../inc/footer.php") ?>
</body>

</html>