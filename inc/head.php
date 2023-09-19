<?php

if (file_exists("../assets")) {
    $root = "../";
} else if (file_exists("../../assets")) {
    $root = "../../";
} else {
    redirect("shop");
}

?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Title -->
    <title>SHOP.CO</title>

    <!-- jQuery -->
    <script src=<?php echo $root . "assets/js/jquery-3.7.1.js" ?>></script>

    <!-- Google fonts / Import Bebas Neue and Raleway fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Raleway:wght@400;600&display=swap" rel="stylesheet">

    <!-- Google Icons / FontAwesome -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <script src="https://kit.fontawesome.com/0870a55fea.js" crossorigin="anonymous"></script>

    <!-- rateYo plugin -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>

    <!-- CSS -->
    <link rel="stylesheet" href=<?php echo $root . "/dist/output.css" ?>>

    <!-- custom JS -->
    <script src=<?php echo $root . "assets/js/app.js" ?>></script>
</head>