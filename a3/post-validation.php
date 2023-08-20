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
    $selectedSession = isset($_POST['session']) ? $_POST['session'] : ''; // Include this line

    $seatTypes = [
        'seats[STA]' => 'Invalid quantity for standard seats',
        'seats[STP]' => 'Invalid quantity for concession seats',
        'seats[STC]' => 'Invalid quantity for child seats',
        'seats[FCA]' => 'Invalid quantity for first class adult seats',
        'seats[FCP]' => 'Invalid quantity for first class concession seats',
        'seats[FCC]' => 'Invalid quantity for first class child seats'
    ];

    if (empty($movieCode)) {
        $errors['movie'] = "No movie selected!";
    } else {
        $selectedMovieDetails = getMovieDetails($movieCode);
        if (!$selectedMovieDetails) {
            $errors['movie'] = "Selected movie details not found!";
        }
    }

    if (empty($selectedSession)) {
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

    foreach($seatTypes as $seatType => $errorMessage) {
        if (isset($_POST[$seatType]) && $_POST[$seatType] > 0) {
            if (!isValidIntegerInRange($_POST[$seatType], 0, 10)) {
                $errors[$seatType] = $errorMessage;
            }
        }
    }

    if (empty($errors)) {
        header("Location: submit.php");
        exit();
    }
} 

$_SESSION['errors'] = $errors;
header("Location: booking.php");
exit();
?>

