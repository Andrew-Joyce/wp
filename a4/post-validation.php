<?php

session_start();
include 'tools.php';

function isValidEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

function isValidMobile($mobile) {
    return preg_match("/^(?:04\d{2}\s?\d{3}\s?\d{3}|04\d{2}\s?\d{6})$/", $mobile);
}

function calculateSeatPrices($seats, $isDiscounted = false) {
    $seatPrices = array(
        'STA' => array('full' => 21.50, 'discount' => 16.00),  
        'STP' => array('full' => 19.50, 'discount' => 14.00),  
        'STC' => array('full' => 17.50, 'discount' => 12.00),
        'FCA' => array('full' => 31.00, 'discount' => 25.00), 
        'FCP' => array('full' => 28.00, 'discount' => 23.50), 
        'FCC' => array('full' => 25.00, 'discount' => 22.00)  
    );

    $seatPricesData = array();

    foreach ($seats as $seatType => $seatQuantity) {
        if (isset($seatPrices[$seatType])) {
            $seatPrice = $isDiscounted ? $seatPrices[$seatType]['discount'] : $seatPrices[$seatType]['full'];
            $seatPricesData[$seatType] = $seatPrice * $seatQuantity;
        }
    }

    return $seatPricesData;
}

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

    $errors = array();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        
        if (empty($errors)) {
            $selectedSessionValue = explode('-', $selectedSession);
            $isDiscounted = end($selectedSessionValue) === 'dis';

            $seatsData = $_POST['seats'];

            $seatPricesData = calculateSeatPrices($seatsData, $isDiscounted);

            $now = date('d/m h:i');
            $total = number_format(array_sum($seatPricesData), 2);
    
            $cells = array_merge(
                [$now],
                $_SESSION['cust'],
                $_SESSION['movie'],
                $_SESSION['seats'],
                [$total]
            );
        $file = fopen("bookings.txt", "a");
        if ($file) {
            if (fputcsv($file, $cells, "\t")) {
                fclose($file);
                error_log("Order appended successfully.");
            } else {
                error_log("Error appending order to file.");
            }
        } else {
            error_log("Error opening file for appending order.");
        }

        $_SESSION['booking_data'] = $bookingData;

        header("Location: submit.php");
        exit();
    } else {
        $_SESSION['errors'] = $errors;
        header("Location: booking.php?movie=$movieCode");
        exit();
    }
}    
?>