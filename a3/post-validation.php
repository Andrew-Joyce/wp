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

    $seatTypes = [
        'seats[STA]' => 'Invalid quantity for standard seats',
        'seats[STP]' => 'Invalid quantity for concession seats',
        'seats[STC]' => 'Invalid quantity for child seats',
        'seats[FCA]' => 'Invalid quantity for first class adult seats',
        'seats[FCP]' => 'Invalid quantity for first class concession seats',
        'seats[FCC]' => 'Invalid quantity for first class child seats'
    ];

    $totalSelectedSeats = 0;

    foreach ($seatTypes as $seatType => $errorMessage) {
        if (isset($_POST[$seatType]) && $_POST[$seatType] > 0) {
            if (!isValidIntegerInRange($_POST[$seatType], 0, 10)) {
                $errors[$seatType] = $errorMessage;
            }
            $totalSelectedSeats += intval($_POST[$seatType]);
        }
    }

    if ($totalSelectedSeats === 0) {
        $errors['seats'] = "At least one seat must be selected";
    }

    if (empty($name)) {
        $errors['name'] = "Name can't be blank";
    }
    if (!isValidMobile($mobile)) {
        $errors['mobile'] = "Invalid mobile number format";
    }
    if (!isValidEmail($email)) {
        $errors['email'] = "Invalid email format";
    }

    if (empty($errors)) {
        unset($_SESSION['errors']); 
        header("Location: submit.php");
        exit();
    } else {
        $_SESSION['errors'] = $errors; 
        header("Location: booking.php");
        exit();
    }
}
?>
