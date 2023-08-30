<?php
session_start();
include 'tools.php';

if (!isset($_SESSION["booking_data"])) {
    header("Location: index.php");
    exit();
}

$bookingData = $_SESSION["booking_data"];
$seatsData = isset($bookingData["seats"]) && is_array($bookingData["seats"]) ? $bookingData["seats"] : array();
$seatPricesData = isset($bookingData["seat_prices"]) && is_array($bookingData["seat_prices"]) ? $bookingData["seat_prices"] : array(); 
$formattedSession = formatSession($bookingData["session"]);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <style>
        .page-break {
            break-after: always;
            page-break-after: always;
        }

        .table-header {
            width: 33.33%;
            text-align: center;
        }

        .table-cell {
            width: 33.33%;
            text-align: center;
        }

        .bold {
            font-weight: bold;
        }

        .ticket-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(450px, 1fr));
            gap: 20px;
        }

        .ticket-content {
            display: flex;
            align-items: center;
        }

        .ticket-image img {
            max-width: 200px;
            max-height: 300px;
            margin-right: 10px;
            margin-left: 10px;
        }

        .ticket-metadata {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .ticket-details {
            flex: 1;
        }

        .gold {
        background-color: gold;
        color: black;
        box-shadow: 4px 4px 10px rgba(0, 0, 0, 0.5); 
        background-image: linear-gradient(45deg, rgba(255, 255, 255, 0.2) 25%, transparent 25%,
                                            transparent 50%, rgba(255, 255, 255, 0.2) 50%,
                                            rgba(255, 255, 255, 0.2) 75%, transparent 75%, transparent);
        }

        .standard {
            background-color: blue;
            color: white;
            box-shadow: 4px 4px 10px rgba(0, 0, 0, 0.5); 
            background-image: linear-gradient(45deg, rgba(255, 255, 255, 0.2) 25%, transparent 25%,
                                                transparent 50%, rgba(255, 255, 255, 0.2) 50%,
                                                rgba(255, 255, 255, 0.2) 75%, transparent 75%, transparent);
        }

        .grid-container {
            display: grid;
            grid-template-columns: repeat(3, auto);
            grid-gap: 18px;
            text-align: center;
            font-family: "Poppins", sans-serif;
        }

        .grid-cell {
            padding: 5px;
            border: 1px solid #ccc;
        }

        .header {
            font-weight: bold;
            background-color: black;
            color: white;
        }

        .right-align {
            text-align: right;
        }

        .total {
            font-weight: bold;
        }

    </style>


<title>Receipt</title>
</head>
<body>
    <div class="receipt-container">
        <header style="text-align: center;">
            <div style="display: flex; justify-content: center; align-items: center;">
                <img src="../../media/Cinema.png" alt="Cinema" class="responsive-image" style="margin-right: 10px;">
                <h1 style="display: inline;">Lunardo Cinema</h1>
            </div>
        </header>
        
        <main>

            <h2>Receipt</h2>
            <h3>Customer Details</h3>
            <p><strong>Name:</strong> <?php echo $bookingData["name"]; ?></p>
            <p><strong>Email:</strong> <?php echo $bookingData["email"]; ?></p>
            <p><strong>Mobile:</strong> <?php echo $bookingData["mobile"]; ?></p>

            <h3>Booking Summary</h3>
            <p><strong>Film:</strong> <?php echo getMovieDetails($bookingData["movie_code"])["title"]; ?></p>
            <p><strong>Session:</strong> <span id="formatted-session"><?php echo $formattedSession; ?></span></p>

            <div class="grid-container">
                <div class="grid-cell header black-bg">Seat Type</div>
                <div class="grid-cell header black-bg">Quantity</div>
                <div class="grid-cell header black-bg">Subtotal</div>
                <div class="grid-cell">Gold Class Child</div>
                <div class="grid-cell">0</div>
                <div class="grid-cell">$0.00</div>
                <div class="grid-cell">Standard Adult</div>
                <div class="grid-cell">2</div>
                <div class="grid-cell">$43.00</div>
                <div class="grid-cell">Standard Concession</div>
                <div class="grid-cell">0</div>
                <div class="grid-cell">$0.00</div>
                <div class="grid-cell">Standard Child</div>
                <div class="grid-cell">0</div>
                <div class="grid-cell">$0.00</div>
                <div class="grid-cell">Gold Class Adult</div>
                <div class="grid-cell">3</div>
                <div class="grid-cell">$93.00</div>
                <div class="grid-cell">Gold Class Concession</div>
                <div class="grid-cell">0</div>
                <div class="grid-cell">$0.00</div>
                <div class="grid-cell"></div>
                <div class="grid-cell total center colspan="2">Total</div>
                <div class="grid-cell center ">$136.00</div>
                <div class="grid-cell"></div>
                <div class="grid-cell total center" colspan="2">GST (10%)</div>
                <div class="grid-cell center">$13.60</div>
            </div>

        </main>

        <section class="tickets-section">
            <h2>Your Tickets</h2>
            <div class="ticket-grid"> 
                <?php foreach ($seatsData as $seatType => $quantity): ?>
                    <?php for ($i = 0; $i < $quantity; $i++): ?>
                        <?php
                        $seatNumber = ($i + 1);
                        if (in_array($seatType, ['FCA', 'FCP', 'FCC'])) {
                            $seatNumberFormatted = "GC" . $seatNumber;
                            $ticketClass = "gold";
                        } else {
                            $seatNumberFormatted = "S" . $seatNumber;
                            $ticketClass = "standard";
                        }
                        ?>
                        <div class="ticket <?= $ticketClass; ?>">
                            <div class="ticket-content">
                                <div class="ticket-image">
                                    <img src="<?php echo getPosterPath(getMovieDetails($bookingData["movie_code"])["title"]); ?>" alt="<?php echo getMovieDetails($bookingData["movie_code"])["title"]; ?>">
                                </div>
                                <div class="ticket-details">
                                    <h3><?php echo getMovieDetails($bookingData["movie_code"])["title"]; ?></h3>
                                    <div class="ticket-metadata">
                                        <p><strong>Seat Type:</strong> <?php echo convertSeatType($seatType); ?></p>
                                        <p><strong>Session:</strong> <?php echo $formattedSession; ?></p>
                                        <p><strong>Seat Number:</strong> <?php echo $seatNumberFormatted; ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endfor; ?>
                <?php endforeach; ?>
            </div>
        </section>

        <footer>
    <?php
    $bookingsFile = "bookings.txt";
    $bookingsData = array();

    if (file_exists($bookingsFile)) {
        $fileLines = file($bookingsFile, FILE_IGNORE_NEW_LINES);
        foreach ($fileLines as $line) {
            $booking = explode("\t", $line);
            $bookingsData[] = $booking;
        }
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $email = $_POST['email'];
        $mobile = $_POST['mobile'];
        $matchedBookings = array();

        foreach ($bookingsData as $booking) {
            if ($booking[2] === $email && $booking[3] === $mobile) {
                $matchedBookings[] = array(
                    'movie' => $booking[4],
                    'session' => $booking[5]
                );
            }
        }
    }
    ?>

        <div class="booking-reminder">
            <h3>Retrieve Your Booking</h3>
            <form action="currentbookings.php" method="post">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
                
                <label for="mobile">Mobile Phone Number:</label>
                <input type="tel" id="mobile" name="mobile" required>
                
                <button type="submit">Retrieve Booking</button>
            </form>
        </div>
        <div class="contact-info">
            <h3>Contact Us</h3>
            <p><strong>Email:</strong> <a href="mailto:info@ourcinema.com">info@ourcinema.com</a></p>
            <p><strong>Phone:</strong> <a href="tel:+61-123-456-789">+61 123 456 789</a></p>
            <p><strong>Address:</strong> 123 Cinema Street, MovieTown, Australia</p>
        </div>
        <div>&copy;<script>
                document.write(new Date().getFullYear());
            </script>Andrew Joyce, student number - S3876520. Last modified <?= date("Y F d  H:i", filemtime($_SERVER['SCRIPT_FILENAME'])); ?>.</div>
        <div>Disclaimer: This website is not a real website and is being developed as part of a School of Science Web Programming course at RMIT University in Melbourne, Australia.</div>
        <div><button id='toggleWireframeCSS' onclick='toggleWireframe()' disabled>Toggle Wireframe CSS</button></div>
    </footer>

        <div id="debug-module">
            <h2>Debug Information</h2>
            <h3>Request Data:</h3>
            <pre><?php echo json_encode($_GET, JSON_PRETTY_PRINT); ?></pre>
            <pre><?php echo json_encode($_POST, JSON_PRETTY_PRINT); ?></pre>
            
            <h3>Session Contents:</h3>
            <pre><?php echo json_encode($_SESSION, JSON_PRETTY_PRINT); ?></pre>
            
            <h3>Page Code:</h3>
            <pre><?php echo htmlspecialchars(file_get_contents(__FILE__)); ?></pre>
        </div>
</body>
</html>

