<?php
session_start();
include 'tools.php';

function isValidEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

function isValidMobile($mobile) {
    return preg_match("/^(?:04\d{2}\s?\d{3}\s?\d{3}|04\d{2}\s?\d{6})$/", $mobile);
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
    
    $anySeatSelected = false;
    
    foreach ($seatTypes as $seatType) {
        $seatQuantity = isset($_POST[$seatType]) ? $_POST[$seatType] : 0;
        if ($seatQuantity > 0) {
            if (!is_numeric($seatQuantity) || $seatQuantity < 1 || $seatQuantity > 10) {
                $errors[$seatType] = "Invalid seat quantity. Please select a quantity between 1 and 10.";
            }
            $anySeatSelected = true;
        }
    }
    
    $hiddenSeatTypes = [
        'seats[STA-dis]',
        'seats[STP-dis]',
        'seats[STC-dis]',
        'seats[FCA-dis]',
        'seats[FCP-dis]',
        'seats[FCC-dis]'
    ];
    
    foreach ($hiddenSeatTypes as $hiddenSeatType) {
        $hiddenSeatQuantity = isset($_POST[$hiddenSeatType]) ? $_POST[$hiddenSeatType] : 0;
        if ($hiddenSeatQuantity > 0) {
            if (!is_numeric($hiddenSeatQuantity) || $hiddenSeatQuantity < 1 || $hiddenSeatQuantity > 10) {
                $errors[$hiddenSeatType] = "Invalid seat quantity. Please select a quantity between 1 and 10.";
            }
            $anySeatSelected = true;
        }
    }
    

    if (empty($movieCode)) {
        $errors['movie'] = "No movie selected!";
    } else {
        $selectedMovieDetails = getMovieDetails($movieCode);
        if (!$selectedMovieDetails) {
            $errors['movie'] = "Selected movie code is invalid!";
        }
    }

    if (!$anySeatSelected) {
        $errors['seats'] = "Error with seats: No seats selected";
    }

    if ($selectedMovieDetails && $selectedSession) {
        $daysOfWeek = ['MON', 'TUE', 'WED', 'THU', 'FRI', 'SAT', 'SUN'];
        $selectedDay = explode('-', $selectedSession)[0];

        if (!in_array($selectedDay, $daysOfWeek)) {
            $errors['session'] = "Invalid selected day.";
        } elseif (!isset($selectedMovieDetails['screenings'][$selectedDay])) {
            $errors['session'] = "The selected movie is not playing on the selected day.";
        }
    } else {
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

    if (empty($errors)) {
        $totalPrice = calculateTotalPrice($_POST['seats']);

        $_SESSION['booking_data'] = array(
            'movie_code' => $movieCode,
            'name' => $name,
            'mobile' => $mobile,
            'email' => $email,
            'session' => $selectedSession,
            'seat_quantities' => $_POST['seats'],
            'total_price' => $totalPrice
        );

        header("Location: submit.php");
        exit();
    } else {
        $_SESSION['errors'] = $errors;
        header("Location: booking.php?movie=$movieCode");
        exit();
    }
}
?>
