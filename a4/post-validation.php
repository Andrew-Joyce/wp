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

    if (empty($errors)) {
        $selectedSessionValue = explode('-', $selectedSession);
        $isDiscounted = end($selectedSessionValue) === 'dis';
    
        $seatPricesData = calculateSeatPrices($_POST['seats'], $isDiscounted);
    
        $bookingData = array(
            'movie_code' => $movieCode,
            'name' => $name,
            'mobile' => $mobile,
            'email' => $email,
            'session' => $selectedSession,
            'seats' => $_POST['seats'],
            'seat_prices' => $seatPricesData,
            'total_price' => array_sum($seatPricesData)
        );
    
        $seatsData = implode("\t", $bookingData["seats"]);
        $seatPricesData = implode("\t", $bookingData["seat_prices"]);
    
        $csvLine = implode("\t", array(
            $bookingData["movie_code"],
            $bookingData["name"],
            $bookingData["mobile"],
            $bookingData["email"],
            $bookingData["session"],
            $seatsData,
            $seatPricesData,
            $bookingData["total_price"]
        ));
    
        $file = fopen("bookings.txt", "a");
        if ($file) {
            if (fwrite($file, $csvLine . PHP_EOL)) {
                fclose($file);
                error_log("Data appended successfully.");
            } else {
                error_log("Error appending data to file.");
            }
        } else {
            error_log("Error opening file.");
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