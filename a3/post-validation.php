<?php
session_start();
include 'tools.php';

function isValidEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

function isValidMobile($mobile) {
    return preg_match("/^(?:04\d{2}\s?\d{3}\s?\d{3}|04\d{2}\s?\d{6})$/", $mobile);
}

function isValidIntegerInRange($value, $min, $max) {
    return filter_var($value, FILTER_VALIDATE_INT, array(
        'options' => array('min_range' => $min, 'max_range' => $max)
    ));
}

$errors = array();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name']);
    $mobile = trim($_POST['mobile']);
    $email = trim($_POST['email']);

    $standardSeats = $_POST['seats']['STA'];
    $concessionSeats = $_POST['seats']['STP'];
    $childSeats = $_POST['seats']['STC'];

    $firstClassAdultSeats = $_POST['seats']['FCA'];
    $firstClassConcessionSeats = $_POST['seats']['FCP'];
    $firstClassChildSeats = $_POST['seats']['FCC'];

    if (empty($name)) {
        $errors['name'] = "Name can't be blank";
    }
    if (!isValidMobile($mobile)) {
        $errors['mobile'] = "Invalid mobile number format";
    }
    if (!isValidEmail($email)) {
        $errors['email'] = "Invalid email format";
    }

    if (!isValidIntegerInRange($standardSeats, 0, 10)) {
        $errors['standard_seats'] = "Invalid quantity for standard seats";
    }
    if (!isValidIntegerInRange($concessionSeats, 0, 10)) {
        $errors['concession_seats'] = "Invalid quantity for concession seats";
    }
    if (!isValidIntegerInRange($childSeats, 0, 10)) {
        $errors['child_seats'] = "Invalid quantity for child seats";
    }

    if (!isValidIntegerInRange($firstClassAdultSeats, 0, 10)) {
        $errors['first_class_adult_seats'] = "Invalid quantity for first class adult seats";
    }
    if (!isValidIntegerInRange($firstClassConcessionSeats, 0, 10)) {
        $errors['first_class_concession_seats'] = "Invalid quantity for first class concession seats";
    }
    if (!isValidIntegerInRange($firstClassChildSeats, 0, 10)) {
        $errors['first_class_child_seats'] = "Invalid quantity for first class child seats";
    }

    if (empty($errors)) {
        header("Location: receipt.php");
        exit();
    }
}

$_SESSION['errors'] = $errors;
header("Location: booking.php");
exit();
?>
