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
                    $product_description = $product[0]['description']; // Product description

                    // Get product details
                    $product_details = $product_obj->get_product_details($id);

                    // Get similar products
                    $similar_products = $product_obj->get_similar_products($category, $id);
                }
                ?>

                <!-- Breadcrumb navigation div -->
                <div class="font-raleway">
                    <?php echo $breadCrumbs[0] ?>
                </div>

                <!-- Product div -->
                <div class="product-container p-4">
                    <!-- Product image and product info container -->
                    <div class="xl:flex xl:items-center xl:justify-start gap-6">
                        <!-- This div contains images of the product -->
                        <div class="img-container xl:flex xl:flex-row-reverse xl:items-center xl:justify-start xl:h-[400px] xl:gap-4 xl:w-1/2">
                            <!-- Load main image -->
                            <div>
                                <img class="main-img w-full h-[400px]" src=<?php echo "/shopco/uploads/product_images/" . $product_images[0] ?> alt="product image">
                            </div>

                            <!-- Secondary images container -->
                            <div class="flex items-center gap-2 mt-4 overflow-x-scroll xl:overflow-x-visible xl:flex-col xl:!h-full xl:overflow-y-scroll xl:m-0 secondary-images-container">
                                <?php
                                // Loop through images and display them on the page
                                foreach ($product_images as $product_image) {
                                    echo "<img class='w-1/3 xl:w-40 secondary-img' src='/shopco/uploads/product_images/" . $product_image . "' alt='product image'>";
                                }
                                ?>
                            </div>
                        </div>

                        <!-- Product info container -->
                        <div class="xl:flex-1">
                            <!-- This div contains name of the product -->
                            <div class="name-container my-2 w-2/3 xl:my-1">
                                <h1 class="font-bebas font-bold text-4xl tracking-wide">
                                    <?php echo $product_name ?>
                                </h1>
                            </div>

                            <div class="hidden xl:block my-1">
                                <p class="font-raleway opacity-70">
                                    <?php echo $product_description ?>
                                </p>
                            </div>

                            <!-- This div contains rating of the product -->
                            <div class="rating-div flex items-center gap-2 xl:my-1">
                                <?php echo $product_rating ?>
                            </div>

                            <!-- This div contains the price of the product -->
                            <div class="price-div font-raleway font-bold text-3xl my-2 xl:my-1">
                                $<?php echo $product_price ?>
                            </div>

                            <!-- Divider line -->
                            <hr class="my-6 xl:my-2">

                            <!-- This div contains colors for selection -->
                            <div>
                                <h2 class="font-raleway opacity-70">Select Colors</h2>

                                <!-- Colors container -->
                                <div class="flex items-center gap-2 mt-2 xl:mt-1">
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
                            <hr class="my-6 xl:my-2">

                            <!-- This div contains size for selection -->
                            <div>
                                <h2 class="font-raleway opacity-70">Choose Size</h2>

                                <!-- Size container -->
                                <div class="flex items-center gap-2 flex-wrap mt-2 size-container xl:mt-1">
                                    <?php
                                    // Loop through sizes and display them on the page
                                    foreach ($sizes as $size) {
                                        echo "<button class='bg-gray-200 py-2 px-5 rounded-full font-raleway size-btn xl:transition-colors xl:hover:bg-black xl:hover:text-white'>$size</button>";
                                    }
                                    ?>
                                </div>
                            </div>

                            <!-- Divider line -->
                            <hr class="my-6 xl:my-2">

                            <!-- This div contains quantity and add to cart buttons -->
                            <div class="flex items-center gap-4">
                                <!-- Quantity container -->
                                <div class="flex items-center gap-3 bg-gray-200 px-5 py-2 rounded-full font-raleway text-2xl">
                                    <!-- Minus button -->
                                    <span class="material-symbols-outlined minus-btn cursor-pointer">
                                        remove
                                    </span>

                                    <!-- Quantity -->
                                    <span class="quantity">1</span>

                                    <!-- Plus button -->
                                    <span class="material-symbols-outlined cursor-pointer plus-btn">
                                        add
                                    </span>
                                </div>

                                <!-- Add to Cart button container -->
                                <div class="w-full">
                                    <!-- Add to Cart button -->
                                    <button class='bg-black border border-black text-white py-3 w-full rounded-full font-raleway font-semibold xl:transition-all xl:hover:bg-white xl:hover:text-black'>Add to Cart</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Divider line -->
                    <hr class="my-6">

                    <!-- This div contains product details -->
                    <div class="flex flex-col items-start gap-6">
                        <h2 class="font-ralway opacity-70">Product details</h2>

                        <!-- Product details container -->
                        <div class="flex flex-col items-start gap-4 pl-3">
                            <!-- Product detail container -->
                            <div class="flex items-center gap-4">
                                <img class="w-8" src="/shopco/uploads/icons/wash.png" alt="machine wash icon">
                                <p class="font-raleway text-sm">
                                    <?php echo $product_details[0]['wash'] ?>
                                </p>
                            </div>

                            <!-- Product detail container -->
                            <div class="flex items-center gap-4">
                                <img class="w-8" src="/shopco/uploads/icons/bleach.png" alt="machine bleach icon">
                                <p class="font-raleway text-sm">
                                    <?php echo $product_details[0]['bleach'] ?>
                                </p>
                            </div>

                            <!-- Product detail container -->
                            <div class="flex items-center gap-4">
                                <img class="w-8" src="/shopco/uploads/icons/iron.png" alt="machine iron icon">
                                <p class="font-raleway text-sm">
                                    <?php echo $product_details[0]['iron'] ?>
                                </p>
                            </div>

                            <!-- Product detail container -->
                            <div class="flex items-center gap-4">
                                <img class="w-8" src="/shopco/uploads/icons/tumble-dry.png" alt="machine tumble-dry icon">
                                <p class="font-raleway text-sm">
                                    <?php echo $product_details[0]['dry'] ?>
                                </p>
                            </div>

                            <!-- Product detail container -->
                            <div class="flex items-center gap-4">
                                <img class="w-8" src="/shopco/uploads/icons/dry-clean.png" alt="machine dry-clean icon">
                                <p class="font-raleway text-sm">
                                    <?php echo $product_details[0]['clean'] ?>
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Divider line -->
                    <hr class="my-6">

                    <!-- This div contains similar items -->
                    <div>
                        <div>
                            <h1 class="font-bebas font-bold text-5xl text-center">YOU MIGHT ALSO LIKE</h1>
                        </div>
                        <div class="flex items-center gap-4 overflow-x-scroll my-8 xl:overflow-visible">
                            <?php
                            foreach ($similar_products as $similar_product) {
                                $product_id = $similar_product["id"]; // Product ID
                                $product_images = explode('/', $similar_product['product_img']); // Product images array (in case of product having several images)
                                $product_name = $similar_product["product_name"]; // Product name
                                $product_rating = $similar_product["product_rating"]; // Product rating in float value (e.g. 4.5)
                                $product_price = $similar_product["product_price"]; // Product price in float value (e.g. 120, 118.5)

                                // Create carousel product container
                                echo "<a href='/shopco/shop/product/?id=$product_id' class='flex-shrink-0 w-3/5 product-container xl:flex-shrink transition-all hover:scale-105 cursor-pointer'>";
                                echo "<div>";
                                echo "<img src='/shopco/uploads/product_images/" . "$product_images[0]' alt='product image'>"; // Product image
                                echo "<h1 class='font-raleway font-semibold mt-2'>$product_name</h1>"; // Product name
                                echo "<div class='rating-div flex items-center gap-1'>$product_rating</div>"; // Product rating
                                echo "</div>";
                                echo "<h1 class='font-raleway font-bold text-3xl mt-3'>$$product_price</h1>"; // Product price
                                echo "</a>";
                            }
                            ?>
                        </div>
                    </div>

                    <!-- Subscription container -->
                    <div class="xl:flex xl:items-center xl:justify-center xl:w-full">
                        <div class="bg-black mt-12 flex flex-col items-center justify-center gap-4 p-8 rounded-3xl xl:m-0 xl:flex-row xl:w-4/5 xl:gap-8">
                            <h1 class="font-bebas font-semibold text-white text-5xl ">
                                STAY UP TO DATE <br>
                                ABOUT OUR <br>
                                LATEST OFFERS
                            </h1>

                            <form action="" class="w-full xl:w-2/3">
                                <div class="bg-white flex items-center gap-2 py-1 pl-4 rounded-full">
                                    <span class="material-symbols-outlined">
                                        mail
                                    </span>
                                    <input type="email" name="email-input" id="email-input" placeholder="Enter your email address" class="py-3" />
                                </div>
                                <div class="flex items-center">
                                    <button type="submit" class="w-full font-raleway font-semibold text-center text-md py-3 rounded-full bg-white mt-4 transition-all hover:text-white hover:bg-green-600">Subscribe to newsletter</button>
                                </div>
                            </form>
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