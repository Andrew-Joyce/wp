<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Booking Form</title>
</head>

<body>
    <header>
        <img src="logo.png" alt="Lunardo Cinema">
        <h1>Lunardo Cinema</h1>
    </header>

    <nav id="navbar">
        <a href="#about-us">About Us</a>
        <a href="#seats-and-prices">Seats and Prices</a>
        <a href="#now-showing">Now Showing</a>
    </nav>

    <main>
    <form action="" method="post">
      <input type="hidden" name="movie" value="<?php echo $_GET['movie']; ?>">
      
      <fieldset>
        <legend>Select Session:</legend>
        <div class="session-label">
          <input type="radio" id="session2" name="day" value="MON" data-pricing="fullprice">
          <label for="session2" class="session-button">Monday (Full Price)</label>
        </div>
        <div class="session-label">
          <input type="radio" id="session1" name="day" value="WED" data-pricing="discprice">
          <label for="session1" class="session-button">Wednesday (Discount)</label>
        </div>

      </fieldset>
      
      <fieldset>
        <legend>Select Session:</legend>
        <div class="session-label">
          <input type="radio" id="session1" name="day" value="WED" data-pricing="discprice">
          <label for="session1" class="session-button">Wednesday (Discount)</label>
        </div>
        <div class="session-label">
          <input type="radio" id="session2" name="day" value="MON" data-pricing="fullprice">
          <label for="session2" class="session-button">Monday (Full Price)</label>
        </div>
      </fieldset>
      
      <fieldset>
  <legend>Select Seats:</legend>
  <div id="seats-&-prices">
    <div class="seats-container">
      <div class="seat standard-seat">
        <label for="seats[STA]">Standard Adult</label>
        <input type="number" name="seats[STA]" min="0" placeholder="Enter quantity" required>
        <span class="seat-price">Full Price: $21.50 / Discount: $16.00</span>
      </div>
      <div class="seat concession-seat">
        <label for="seats[STP]">Concession</label>
        <input type="number" name="seats[STP]" min="0" placeholder="Enter quantity" required>
        <span class="seat-price">Full Price: $19.50 / Discount: $14.00</span>
      </div>
      <div class="seat child-seat">
        <label for="seats[STC]">Child</label>
        <input type="number" name="seats[STC]" min="0" placeholder="Enter quantity" required>
        <span class="seat-price">Full Price: $17.50 / Discount: $12.00</span>
      </div>
      <div class="seat gold-class">
        <label for="seats[GCA]">Gold Class Adult</label>
        <input type="number" name="seats[GCA]" min="0" placeholder="Enter quantity" required>
        <span class="seat-price">Full Price: $30.00 / Discount: $25.00</span>
      </div>
      <div class="seat gold-class-concession">
        <label for="seats[GCP]">Gold Class Concession</label>
        <input type="number" name="seats[GCP]" min="0" placeholder="Enter quantity" required>
        <span class="seat-price">Full Price: $27.00 / Discount: $22.00</span>
      </div>
      <div class="seat gold-class-child">
        <label for="seats[GCC]">Gold Class Child</label>
        <input type="number" name="seats[GCC]" min="0" placeholder="Enter quantity" required>
        <span class="seat-price">Full Price: $25.00 / Discount: $20.00</span>
      </div>
    </div>
  </div>
</fieldset>

      <button type="submit">Submit</button>
    </form>
  </main>
  

    <footer>
                    ...
            <div class="contact-info">
                <h3>Contact Us</h3>
                <p><strong>Email:</strong> <a href="mailto:info@ourcinema.com">info@ourcinema.com</a></p>
                <p><strong>Phone:</strong> <a href="tel:+61-123-456-789">+61 123 456 789</a></p>
                <p><strong>Address:</strong> 123 Cinema Street, MovieTown, Australia</p>
            </div>
            <div class="copyright">
                <p>&copy; 2023 Lunardo Cinema. All rights reserved.</p>
            </div>
        </footer>
    </body>

</html>
