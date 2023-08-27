<?php
session_start();
include 'tools.php';

$errors = array();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $movieCode = isset($_POST['movie']) ? $_POST['movie'] : '';
    $name = trim($_POST['name']);
    $mobile = trim($_POST['mobile']);
    $email = trim($_POST['email']);
    $selectedSession = isset($_POST['session']) ? $_POST['session'] : '';

    $anySeatSelected = false;

    if (isset($_POST['seats']) && is_array($_POST['seats'])) {
        foreach ($_POST['seats'] as $seatType => $seatQuantity) {
            if ($seatQuantity > 0) {
                if (!is_numeric($seatQuantity) || $seatQuantity < 1 || $seatQuantity > 10) {
                    $errors[$seatType] = "Invalid seat quantity. Please select a quantity between 1 and 10.";
                }
                $anySeatSelected = true; 
            }
        }
    } else {
        $errors['seats'] = "Error with seats: No seats selected";
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
        $errors['seats'] = "Error with seats: No seats selected2";
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
        $selectedSessionValue = explode('-', $selectedSession);
        $isDiscounted = end($selectedSessionValue) === 'dis';
        
        $totalPrice = calculateTotalPrice($_POST['seats'], $isDiscounted);
    
        $_SESSION['booking_data'] = array(
            'movie_code' => $movieCode,
            'name' => $name,
            'mobile' => $mobile,
            'email' => $email,
            'session' => $selectedSession,
            'seats' => $_POST['seats'],
            'seat_prices' => calculateTotalPrice($_POST['seats']),
            'total_price' => $totalPrice
        );
    
        echo '<script>';
        echo 'window.location.href = "submit.php";';
        echo '</script>'; 
    } else {
        $_SESSION['errors'] = $errors;
        echo '<script>';
        echo 'window.location.href = "booking.php?movie=' . $movieCode . '";'; 
        echo '</script>';
    }
    