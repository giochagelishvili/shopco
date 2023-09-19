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
                }
                ?>

                <div class="font-raleway">
                    <?php echo $breadCrumbs[0] ?>
                </div>

                <div class="product-container p-4">
                    <div>
                        <img src=<?php echo "/shopco/uploads/" . $listing . "/" . $product_images[0] ?> alt="">
                    </div>
                    <div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <?php include("../../inc/footer.php") ?>
</body>

</html>