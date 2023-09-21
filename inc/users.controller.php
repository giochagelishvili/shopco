<?php

include("../classes/dbh.classes.php");
include("../classes/users.classes.php");

if (isset($_POST['login-submit-btn'])) {
    echo "login";
} elseif (isset($_POST['signup-submit-btn'])) {
    $first_name = $_POST['first-name'];
    $last_name = $_POST['last-name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm-password'];

    $errors_array = [];

    $name_errors = validate_name($first_name, $last_name);
    $email_errors = validate_email($email);
    $password_errors = validate_password($password, $confirm_password);

    if (!empty($name_errors)) {
        foreach ($name_errors as $error) {
            array_push($errors_array, $error);
        }
    }

    if (!empty($email_errors)) {
        foreach ($email_errors as $error) {
            array_push($errors_array, $error);
        }
    }

    if (!empty($password_errors)) {
        foreach ($password_errors as $error) {
            array_push($errors_array, $error);
        }
    }

    if (!empty($errors_array)) {
        // Convert the array of errors into a string using a comma as separator
        $error_string = implode(",", $errors_array);
        header("Location: /shopco/shop/?errors=$error_string");
        exit();
    }

    $user = new User($first_name, $last_name, $email, $password);
    $user->add_user();
}

function validate_name($first_name, $last_name)
{
    $errors_array = [];

    // Validate first name
    if (empty($first_name)) {
        array_push($errors_array, "First name is required");
    } elseif (!preg_match("/^[a-zA-Z'-]+$/", $first_name)) {
        array_push($errors_array, "Invalid first name. Only letters and apostrophes are allowed.");
    } elseif (strlen($first_name) > 50) {
        array_push($errors_array, "First name is too long. Maximum 50 characters allowed.");
    }

    // Validate last name
    if (empty($last_name)) {
        array_push($errors_array, "Last name is required");
    } elseif (!preg_match("/^[a-zA-Z'-]+$/", $last_name)) {
        array_push($errors_array, "Invalid last name. Only letters and apostrophes are allowed.");
    } elseif (strlen($last_name) > 50) {
        array_push($errors_array, "Last name is too long. Maximum 50 characters allowed.");
    }

    return $errors_array;
}

function validate_email($email)
{
    $errors_array = [];

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        array_push($errors_array, "Invalid email address.");
    }

    return $errors_array;
}

function validate_password($password, $confirm_password)
{
    // Define password validation criteria
    $min_length = 8;
    $uppercase_required = true;
    $lowercase_required = true;
    $number_required = true;
    $special_character_required = true;

    // Initialize an array to store validation errors
    $errors_array = [];

    // Check password length
    if (strlen($password) < $min_length) {
        array_push($errors_array, "Password must be at least {$min_length} characters long.");
    }

    // Check for uppercase letters
    if ($uppercase_required && !preg_match("/[A-Z]/", $password)) {
        array_push($errors_array, "Password must contain at least one uppercase letter.");
    }

    // Check for lowercase letters
    if ($lowercase_required && !preg_match("/[a-z]/", $password)) {
        array_push($errors_array, "Password must contain at least one lowercase letter.");
    }

    // Check for numbers
    if ($number_required && !preg_match("/[0-9]/", $password)) {
        array_push($errors_array, "Password must contain at least one number.");
    }

    // Check for special characters
    if ($special_character_required && !preg_match("/[!@#$%^&*()-_=+]/", $password)) {
        array_push($errors_array, "Password must contain at least one special character.");
    }

    // Check for password match
    if ($password !== $confirm_password) {
        array_push($errors_array, "Password and confirm password do not match.");
    }

    return $errors_array;
}
