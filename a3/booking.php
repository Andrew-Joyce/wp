<?php

session_start();
include 'tools.php';

$selectedMovieCode = $_GET['movie'];

$selectedMovieDetails = getMovieDetails($selectedMovieCode);

if ($selectedMovieDetails) {
    $screenings = $selectedMovieDetails['screenings'];
}
?>

<script src="script.js"></script>

<!DOCTYPE html>
<html lang="en">

<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
    <link id='wireframecss' type="text/css" rel="stylesheet" href="../wireframe.css" disabled>
    <link id='stylecss' type="text/css" rel="stylesheet" href="style.css?t=<?= filemtime("style.css"); ?>">
    <script src='../wireframe.js'></script>
    <title>Booking Form</title>
</head>

<body>
    <header style="text-align: center;">
        <div style="display: flex; justify-content: center; align-items: center;">
            <img src="../../media/Cinema.png" alt="Cinema" class="responsive-image" style="margin-right: 10px;">
            <h1 style="display: inline;">Lunardo Cinema</h1>
        </div>
    </header>

    <nav id="navbar">
        <a href="https://titan.csit.rmit.edu.au/~s3876520/wp/a3/index.php#now-showing">Now Showing</a>
        <a href="https://titan.csit.rmit.edu.au/~s3876520/wp/a3/index.php#seats-&-prices">Seats & Prices</a>
        <a href="https://titan.csit.rmit.edu.au/~s3876520/wp/a3/index.php#about-us">About Us</a>
    </nav>

    <main>
    <form method="POST" action="submit.php" id="booking-form" onsubmit="return validateForm()">
        <?php

        $selectedMovieDetails = getMovieDetails($selectedMovieCode);

        if ($selectedMovieDetails) {
            $screenings = $selectedMovieDetails['screenings'];
        ?>
            <fieldset id="fieldset-session-<?php echo $selectedMovieCode; ?>">
                <legend class="movie-title"><?php echo $selectedMovieDetails['title']; ?></legend>
                <div class="movie-details" id="<?php echo strtolower(str_replace(' ', '-', $selectedMovieDetails['title'])); ?>" style="display: block;">
                    <div class="trailer">
                        <div class="responsive-video">
                            <iframe width="560" height="315" src="https://www.youtube.com/embed/<?php echo substr($selectedMovieDetails['trailer'], strrpos($selectedMovieDetails['trailer'], '/') + 1); ?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                    </div>
                    <div class="synopsis">
                        <p><?php echo $selectedMovieDetails['summary']; ?></p>
                        <p><strong>Starring</strong> - <?php echo isset($selectedMovieDetails['cast']) ? $selectedMovieDetails['cast'] : 'N/A'; ?></p>
                        <p><strong>Screening Times:</strong> <?php echo $selectedMovieDetails['screening-summary']; ?></p>
                        <p>For more information, visit <a href="<?php echo $selectedMovieDetails['imdb']; ?>" target="_blank">IMDb</a>.</p>
                    </div>
                    <div class="<?php echo strtolower(str_replace(' ', '-', $selectedMovieDetails['title'])); ?>">
                    <h3>Select Session</h3>
                    <div class="session-selection">
                        <?php foreach ($screenings as $day => $screening) { ?>
                            <button type="button" class="session" data-session="<?php echo $day . '-' . $screening['time'] . '-' . $screening['rate']; ?>">
                                <?php echo $day; ?> - <?php echo $screening['time']; ?> (<?php echo $screening['rate']; ?>)
                            </button>
                        <?php } ?>
                    </div>
                </div>
                </div>
            </fieldset>
        <?php } ?>

        <fieldset>
            <legend>Select Standard Seats</legend>
            <div id="standard-seats">
                <div class="seats-container">
                    <div class="seat standard-seat">
                        <label for="seats[STA]">Standard Adult</label>
                        <input type="number" name="seats[STA]" min="0" value="0" placeholder="Enter quantity" required>
                        <span class="seat-price" data-full-price="21.50">Full Price: $21.50 / Discount: $16.00</span>
                    </div>
                    <div class="seat concession-seat">
                        <label for="seats[STP]">Concession</label>
                        <input type="number" name="seats[STP]" min="0" value="0" placeholder="Enter quantity" required>
                        <span class="seat-price" data-full-price="19.50">Full Price: $19.50 / Discount: $14.00</span> 
                    </div>
                    <div class="seat child-seat">
                        <label for="seats[STC]">Child</label>
                        <input type="number" name="seats[STC]" min="0" value="0" placeholder="Enter quantity" required>
                        <span class="seat-price" data-full-price="17.50">Full Price: $17.50 / Discount: $12.00</span> 
                    </div>
                </div>
            </div>

            <div id="gold-class-seats">
                <legend>Gold Class Seats</legend>
                <div id="seats-&-prices">
                    <div class="seats-container">
                        <div class="seat standard-seat">
                            <label for="seats[FCA]">First Class Adult</label>
                            <input type="number" name="seats[FCA]" min="0" value="0" placeholder="Enter quantity" required>
                            <span class="seat-price" data-full-price="31.00">Full Price: $31.00 / Discount: $25.00</span>
                        </div>
                        <div class="seat concession-seat">
                            <label for="seats[FCP]">First Class Concession</label>
                            <input type="number" name="seats[FCP]" min="0" value="0" placeholder="Enter quantity" required>
                            <span class="seat-price" data-full-price="28.00">Full Price: $28.00 / Discount: $23.50</span> 
                        </div>
                        <div class="seat child-seat">
                            <label for="seats[FCC]">First Class Child</label>
                            <input type="number" name="seats[FCC]" min="0" value="0" placeholder="Enter quantity" required>
                            <span class="seat-price" data-full-price="25.00">Full Price: $25.00 / Discount: $22.00</span> 
                        </div>
                    </div>
                </div>
            </div>
        </fieldset>

        <fieldset>
                <legend>Total Price</legend>
                <div id="total-price">Total Price: $0</div>
        </fieldset>
    <fieldset>
    <legend>Contact Information:</legend>
        <div class="contact-info">
            <label for="name">Full Name:</label>
            <input type="text" name="name" id="name" required>

            <label for="mobile">Mobile Number:</label>
            <input type="tel" name="mobile" id="mobile" required pattern="^(?:04\d{2}\s?\d{3}\s?\d{3}|04\d{2}\s?\d{6})$" placeholder="Enter 10-digit mobile number">

            <label for="email">Email:</label>
            <input type="email" name="email" id="email" required>
        </div>
        <div>
            <button id="remember-btn" class="contact-button active" onclick="toggleButton(this)">Remember Me</button>
            <button id="forget-btn" class="contact-button inactive" onclick="toggleButton(this)">Forget Me</button>
        </div>
    </fieldset>

            <button type="submit" class="submit-button">Submit</button>

        </form>
    </main>

    <footer>
        <div class="contact-info">
            <h3>Contact Us</h3>
            <p><strong>Email:</strong> <a href="mailto:info@ourcinema.com">info@ourcinema.com</a></p>
            <p><strong>Phone:</strong> <a href="tel:+61-123-456-789">+61 123 456 789</a></p>
            <p><strong>Address:</strong> 123 Cinema Street, MovieTown, Australia</p>
        </div>
        <div>
        <div>&copy;<script>
                document.write(new Date().getFullYear());
            </script>Andrew Joyce, student number - S3876520. Last modified <?= date("Y F d  H:i", filemtime($_SERVER['SCRIPT_FILENAME'])); ?>.</div>
        <div>Disclaimer: This website is not a real website and is being developed as part of a School of Science Web Programming course at RMIT University in Melbourne, Australia.</div>
        <div><button id='toggleWireframeCSS' onclick='toggleWireframe()'>Toggle Wireframe CSS</button></div>
    </footer>

    <div id="debug-module">
    <h2>Debug Module</h2>
    <div>
            <h3>Request Data</h3>
            <pre><?php print_r($_GET); ?></pre>
            <pre><?php print_r($_POST); ?></pre>
        </div>
        <div>
            <h3>Session Data</h3>
            <pre><?php print_r($_SESSION); ?></pre>
        </div>
        <div>
            <h3>Page Code</h3>
            <pre><?php echo htmlentities(file_get_contents(__FILE__)); ?></pre>
        </div>
    </div>

</body>

</html>


    