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
    $movieCode = isset($_POST['movie']) ? $_POST['movie'] : '';
    $name = trim($_POST['name']);
    $mobile = trim($_POST['mobile']);
    $email = trim($_POST['email']);
    $selectedSession = isset($_POST['session']) ? $_POST['session'] : '';

    $seatTypes = [
        'seats[STA]',
        'seats[STP]',
        'seats[STC]',
        'seats[FCA]',
        'seats[FCP]',
        'seats[FCC]'
    ];

    $totalPrice = 0.00;

    foreach ($seatTypes as $seatType) {
        $seatQuantity = isset($_POST[$seatType]) ? $_POST[$seatType] : 0;
        if ($seatQuantity > 0) {
            $totalPrice += calculateSeatPrice($seatType) * $seatQuantity;
        }
    }

    if ($totalPrice < 0.01) {
        $errors['seats'] = "Error with seats: No seats selected";
    }

    if (empty($movieCode)) {
        $errors['movie'] = "No movie selected!";
    } else {
        $selectedMovieDetails = getMovieDetails($movieCode);
        if (!$selectedMovieDetails) {
            $errors['movie'] = "Selected movie details not found!";
        }
    }

    if (count($errors) === 0) {

       }
    }

    if (empty($_POST['session'])) {
        $errors['session'] = "No session selected";
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

    if (empty($selectedSession) || $selectedSession === '') {
        $errors['session'] = "No session selected";
    }
    
    if (!empty($errors)) {
        $_SESSION['errors'] = $errors;
        header("Location: booking.php?movie=$movieCode");
        exit();
    }

    header("Location: submit.php");
    exit();
?>


