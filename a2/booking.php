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
              <select name="seats[STA]">
                <option value="" selected disabled>Please select</option>
                <option value="1" data-fullprice="21.5" data-discprice="16">1</option>
                <option value="2" data-fullprice="21.5" data-discprice="16">2</option>
              </select>
              <span class="seat-price">Full Price: $21.50 / Discount: $16.00</span>
            </div>
          </div>
        </div>
      </fieldset>
      
      <fieldset>
        <legend>Customer Details:</legend>
        <label for="customer-name">Full Name:</label>
        <input type="text" id="customer-name" name="customer[name]" required>
        
        <label for="customer-email">Email Address:</label>
        <input type="email" id="customer-email" name="customer[email]" required>
        
        <label for="customer-mobile">Australian Mobile Number:</label>
        <input type="tel" id="customer-mobile" name="customer[mobile]" pattern="[0-9]{10}" required>
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
