<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>Booking Form</title>
  <script>
  const urlParams = new URLSearchParams(window.location.search);
  const selectedMovie = urlParams.get('movie');

  document.addEventListener('DOMContentLoaded', () => {
    const movieFieldsets = document.querySelectorAll('fieldset');
    movieFieldsets.forEach((fieldset) => {
      fieldset.style.display = 'none';
    });

    switch (selectedMovie) {
      case 'ACT':
        document.getElementById('movie-1').checked = true;
        document.getElementById('fieldset-1').style.display = 'block';
        break;
      case 'RMC':
        document.getElementById('movie-2').checked = true;
        document.getElementById('fieldset-2').style.display = 'block';
        break;
      case 'ANM':
        document.getElementById('movie-3').checked = true;
        document.getElementById('fieldset-3').style.display = 'block';
        break;
      case 'DRM':
        document.getElementById('movie-4').checked = true;
        document.getElementById('fieldset-4').style.display = 'block';
        break;
      default:
        break;
    }
  });

  function showSessions() {
    const selectedMovie = document.querySelector('input[name="movie"]:checked').value;
    const movieFieldsets = document.querySelectorAll('fieldset');

    movieFieldsets.forEach((fieldset) => {
      if (fieldset.id === `fieldset-${selectedMovie}`) {
        fieldset.style.display = 'block';
      } else {
        fieldset.style.display = 'none';
      }
    });
  }

  const movieInputs = document.querySelectorAll('input[name="movie"]');
  movieInputs.forEach((input) => {
    input.addEventListener('change', showSessions);
  });
</script>
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
    <form method="POST" action="" id="booking-form">
      <div>
        <input type="radio" name="movie" id="movie-1" value="ACT">
        <label for="movie-1">Indiana Jones and the Dial of Destiny</label>
      </div>
      <fieldset id="fieldset-1" style="display: none;">
        <legend>Select Session:</legend>
        <div class="session-selection">
          <div class="session">
            <input type="radio" name="session" id="session-1" value="9pm">
            <label for="session-1">9pm</label>
            <select name="day" id="day">
              <option value="mon">Monday</option>
              <option value="tue">Tuesday</option>
              <option value="wed">Wednesday</option>
              <option value="thu">Thursday</option>
              <option value="fri">Friday</option>
            </select>
          </div>
          <div class="session">
            <input type="radio" name="session" id="session-2" value="6pm">
            <label for="session-2">6pm</label>
            <select name="day" id="day">
              <option value="sat">Saturday</option>
              <option value="sun">Sunday</option>
            </select>
          </div>
        </div>
      </fieldset>

      <div>
        <input type="radio" name="movie" id="movie-2" value="RMC">
        <label for="movie-2">Barbie</label>
      </div>
      <fieldset id="fieldset-2" style="display: none;">
        <legend>Select Session:</legend>
        <div class="session-selection">
          <div class="session">
            <input type="radio" name="session" id="session-3" value="12pm">
            <label for="session-3">12pm</label>
            <select name="day" id="day">
              <option value="wed">Wednesday</option>
              <option value="thu">Thursday</option>
              <option value="fri">Friday</option>
            </select>
          </div>
          <div class="session">
            <input type="radio" name="session" id="session-4" value="3pm">
            <label for="session-4">3pm</label>
            <select name="day" id="day">
              <option value="sat">Saturday</option>
              <option value="sun">Sunday</option>
            </select>
          </div>
        </div>
      </fieldset>

      <div>
        <input type="radio" name="movie" id="movie-3" value="ANM">
        <label for="movie-3">Teenage Mutant Ninja Turtles: Mutant Mayhem</label>
      </div>
      <fieldset id="fieldset-3" style="display: none;">
        <legend>Select Session:</legend>
        <div class="session-selection">
          <div class="session">
            <input type="radio" name="session" id="session-5" value="12pm">
            <label for="session-5">12pm</label>
            <select name="day" id="day">
              <option value="mon">Monday</option>
              <option value="tue">Tuesday</option>
              <option value="wed">Wednesday</option>
              <option value="thu">Thursday</option>
              <option value="fri">Friday</option>
              <option value="sat">Saturday</option>
              <option value="sun">Sunday</option>
            </select>
          </div>
          <div class="session">
            <input type="radio" name="session" id="session-6" value="6pm">
            <label for="session-6">6pm</label>
            <select name="day" id="day">
              <option value="wed">Wednesday</option>
              <option value="thu">Thursday</option>
              <option value="fri">Friday</option>
            </select>
          </div>
        </div>
      </fieldset>

      <div>
        <input type="radio" name="movie" id="movie-4" value="DRM">
        <label for="movie-4">Oppenheimer</label>
      </div>
      <fieldset id="fieldset-4" style="display: none;">
        <legend>Select Session:</legend>
        <div class="session-selection">
          <div class="session">
            <input type="radio" name="session" id="session-7" value="6pm">
            <label for="session-7">6pm</label>
            <select name="day" id="day">
              <option value="mon">Monday</option>
              <option value="tue">Tuesday</option>
            </select>
          </div>
          <div class="session">
            <input type="radio" name="session" id="session-8" value="9pm">
            <label for="session-8">9pm</label>
            <select name="day" id="day">
            <option value="sat">Saturday</option>
              <option value="sun">Sunday</option>
            </select>
          </div>
        </div>
      </fieldset>

      <fieldset>
        <legend>Select Standard Seats:</legend>
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
          </div>
        </div>
      </fieldset>

      <fieldset>
        <legend>Select Gold Class Seats:</legend>
        <div id="seats-&-prices">
          <div class="seats-container">
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

      <fieldset>
        <legend>Contact Information:</legend>
        <div class="contact-info">
          <label for="name">Full Name:</label>
          <input type="text" name="name" id="name" required>

          <label for="mobile">Mobile Number:</label>
          <input type="tel" name="mobile" id="mobile" required pattern="[0-9]{10}"
            placeholder="Enter 10-digit mobile number">

          <label for="email">Email:</label>
          <input type="email" name="email" id="email" required>
        </div>
      </fieldset>

      <button type="submit">Submit</button>
    </form>
  </main>

  <footer>
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

