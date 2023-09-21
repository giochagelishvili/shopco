<?php

session_start();

if (!isset($_SESSION['user_id'])) {
    // Redirect to the main page and open login form
    header("location: /shopco/shop?login=1");
    exit();
}

$user_id = $_SESSION['user_id'];

include("../classes/dbh.classes.php");
include("../classes/users.classes.php");

$user = new User();
$user_info = $user->get_user($user_id);

echo $user_info[0]['first_name'] . "<br>";
echo $user_info[0]['last_name'] . "<br>";
echo $user_info[0]['email'] . "<br>";
echo $user_info[0]['password'] . "<br>";
