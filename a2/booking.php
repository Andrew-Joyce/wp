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
      const sessionFieldsets = document.querySelectorAll('fieldset[id^="fieldset-session"]');
      sessionFieldsets.forEach((fieldset) => {
        fieldset.style.display = 'none';
      });

      if (selectedMovie) {
        const selectedFieldset = document.getElementById(`fieldset-session-${selectedMovie}`);
        if (selectedFieldset) {
          selectedFieldset.style.display = 'block';
        }
      }

      const movieDetailsContainer = document.getElementById('movie-details');
      const barbieDetailsContainer = document.getElementById('barbie-details');
      const indianaJonesDetailsContainer = document.getElementById('indiana-jones-details');
      const tmntDetailsContainer = document.getElementById('tmnt-details');
      const oppenheimerDetailsContainer = document.getElementById('oppenheimer-details');

      if (selectedMovie === 'RMC') {
        movieDetailsContainer.style.display = 'none';
        barbieDetailsContainer.style.display = 'block';
        indianaJonesDetailsContainer.style.display = 'none';
        tmntDetailsContainer.style.display = 'none';
        oppenheimerDetailsContainer.style.display = 'none';
      } else if (selectedMovie === 'ACT') {
        movieDetailsContainer.style.display = 'none';
        barbieDetailsContainer.style.display = 'none';
        indianaJonesDetailsContainer.style.display = 'block';
        tmntDetailsContainer.style.display = 'none';
        oppenheimerDetailsContainer.style.display = 'none';
      } else if (selectedMovie === 'ANM') {
        movieDetailsContainer.style.display = 'none';
        barbieDetailsContainer.style.display = 'none';
        indianaJonesDetailsContainer.style.display = 'none';
        tmntDetailsContainer.style.display = 'block';
        oppenheimerDetailsContainer.style.display = 'none';
      } else if (selectedMovie === 'DRM') {
        movieDetailsContainer.style.display = 'none';
        barbieDetailsContainer.style.display = 'none';
        indianaJonesDetailsContainer.style.display = 'none';
        tmntDetailsContainer.style.display = 'none';
        oppenheimerDetailsContainer.style.display = 'block';
      } else {
        movieDetailsContainer.style.display = 'block';
        barbieDetailsContainer.style.display = 'none';
        indianaJonesDetailsContainer.style.display = 'none';
        tmntDetailsContainer.style.display = 'none';
        oppenheimerDetailsContainer.style.display = 'none';
      }
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
    <div class="movie-details" id="movie-details">
      <div class="synopsis">
        <h2>Movie Synopsis</h2>
        <p>Enter the fascinating world of movies and enjoy an extraordinary cinematic experience. Each movie will take you on a unique journey filled with adventure, emotion, and excitement. Immerse yourself in the captivating stories brought to life on the big screen.</p>
      </div>
      <div class="trailer">
        <p>Trailer not available</p>
      </div>
    </div>

    <div class="movie-details" id="barbie-details" style="display: none;">
      <div class="synopsis">
        <h2>Barbie</h2>
        <p>Enter the fascinating world of Barbie and join her on an exciting adventure. Experience a heartwarming story filled with friendship, courage, and dreams. Barbie will captivate you with her charm and inspire you to believe in yourself. Get ready for an unforgettable journey with Barbie!</p>
      </div>
      <div class="trailer">
        <iframe width="560" height="315" src="https://www.youtube.com/embed/pBk4NYhWNMM" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
      </div>
    </div>

    <div class="movie-details" id="indiana-jones-details" style="display: none;">
      <div class="synopsis">
        <h2>Indiana Jones and the Dial of Destiny</h2>
        <p>Embark on an epic adventure with Indiana Jones as he searches for the mystical Dial of Destiny. Join him in a thrilling quest filled with ancient artifacts, hidden treasures, and dangerous foes. Prepare for heart-stopping action and breathtaking discoveries in this action-packed blockbuster!</p>
      </div>
      <div class="trailer">
        <iframe width="560" height="315" src="https://www.youtube.com/embed/INDIANA_JONES_TRAILER_URL" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
      </div>
    </div>

    <div class="movie-details" id="tmnt-details" style="display: none;">
      <div class="synopsis">
        <h2>Teenage Mutant Ninja Turtles: Mutant Mayhem</h2>
        <p>Join the fearless Teenage Mutant Ninja Turtles in their latest mission to save the city from the clutches of evil. Watch as Leonardo, Donatello, Michelangelo, and Raphael unleash their ninja skills to combat powerful enemies. Get ready for an adrenaline-pumping adventure with the heroes in a half-shell!</p>
      </div>
      <div class="trailer">
        <iframe width="560" height="315" src="https://www.youtube.com/embed/TMNT_TRAILER_URL" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
      </div>
    </div>

    <div class="movie-details" id="oppenheimer-details" style="display: none;">
      <div class="synopsis">
        <h2>Oppenheimer</h2>
        <p>Discover the untold story of J. Robert Oppenheimer, the brilliant scientist behind the development of the atomic bomb. Dive into the complex world of physics, politics, and moral dilemmas as Oppenheimer grapples with the consequences of his groundbreaking work. Experience a thought-provoking journey through history and ethics.</p>
      </div>
      <div class="trailer">
        <iframe width="560
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
      const sessionFieldsets = document.querySelectorAll('fieldset[id^="fieldset-session"]');
      sessionFieldsets.forEach((fieldset) => {
        fieldset.style.display = 'none';
      });

      if (selectedMovie) {
        const selectedFieldset = document.getElementById(`fieldset-session-${selectedMovie}`);
        if (selectedFieldset) {
          selectedFieldset.style.display = 'block';
        }
      }

      const movieDetailsContainer = document.getElementById('movie-details');
      const barbieDetailsContainer = document.getElementById('barbie-details');
      const indianaJonesDetailsContainer = document.getElementById('indiana-jones-details');
      const tmntDetailsContainer = document.getElementById('tmnt-details');
      const oppenheimerDetailsContainer = document.getElementById('oppenheimer-details');

      if (selectedMovie === 'RMC') {
        movieDetailsContainer.style.display = 'none';
        barbieDetailsContainer.style.display = 'block';
        indianaJonesDetailsContainer.style.display = 'none';
        tmntDetailsContainer.style.display = 'none';
        oppenheimerDetailsContainer.style.display = 'none';
      } else if (selectedMovie === 'ACT') {
        movieDetailsContainer.style.display = 'none';
        barbieDetailsContainer.style.display = 'none';
        indianaJonesDetailsContainer.style.display = 'block';
        tmntDetailsContainer.style.display = 'none';
        oppenheimerDetailsContainer.style.display = 'none';
      } else if (selectedMovie === 'ANM') {
        movieDetailsContainer.style.display = 'none';
        barbieDetailsContainer.style.display = 'none';
        indianaJonesDetailsContainer.style.display = 'none';
        tmntDetailsContainer.style.display = 'block';
        oppenheimerDetailsContainer.style.display = 'none';
      } else if (selectedMovie === 'DRM') {
        movieDetailsContainer.style.display = 'none';
        barbieDetailsContainer.style.display = 'none';
        indianaJonesDetailsContainer.style.display = 'none';
        tmntDetailsContainer.style.display = 'none';
        oppenheimerDetailsContainer.style.display = 'block';
      } else {
        movieDetailsContainer.style.display = 'block';
        barbieDetailsContainer.style.display = 'none';
        indianaJonesDetailsContainer.style.display = 'none';
        tmntDetailsContainer.style.display = 'none';
        oppenheimerDetailsContainer.style.display = 'none';
      }
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
    <div class="movie-details" id="movie-details">
      <div class="synopsis">
        <h2>Movie Synopsis</h2>
        <p>Enter the fascinating world of movies and enjoy an extraordinary cinematic experience. Each movie will take you on a unique journey filled with adventure, emotion, and excitement. Immerse yourself in the captivating stories brought to life on the big screen.</p>
      </div>
      <div class="trailer">
        <p>Trailer not available</p>
      </div>
    </div>

    <div class="movie-details" id="barbie-details" style="display: none;">
      <div class="synopsis">
        <h2>Barbie</h2>
        <p>Enter the fascinating world of Barbie and join her on an exciting adventure. Experience a heartwarming story filled with friendship, courage, and dreams. Barbie will captivate you with her charm and inspire you to believe in yourself. Get ready for an unforgettable journey with Barbie!</p>
      </div>
      <div class="trailer">
        <iframe width="560" height="315" src="https://www.youtube.com/embed/pBk4NYhWNMM" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
      </div>
    </div>

    <div class="movie-details" id="indiana-jones-details" style="display: none;">
      <div class="synopsis">
        <h2>Indiana Jones and the Dial of Destiny</h2>
        <p>Embark on an epic adventure with Indiana Jones as he searches for the mystical Dial of Destiny. Join him in a thrilling quest filled with ancient artifacts, hidden treasures, and dangerous foes. Prepare for heart-stopping action and breathtaking discoveries in this action-packed blockbuster!</p>
      </div>
      <div class="trailer">
        <iframe width="560" height="315" src="https://www.youtube.com/embed/INDIANA_JONES_TRAILER_URL" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
      </div>
    </div>

    <div class="movie-details" id="tmnt-details" style="display: none;">
      <div class="synopsis">
        <h2>Teenage Mutant Ninja Turtles: Mutant Mayhem</h2>
        <p>Join the fearless Teenage Mutant Ninja Turtles in their latest mission to save the city from the clutches of evil. Watch as Leonardo, Donatello, Michelangelo, and Raphael unleash their ninja skills to combat powerful enemies. Get ready for an adrenaline-pumping adventure with the heroes in a half-shell!</p>
      </div>
      <div class="trailer">
        <iframe width="560" height="315" src="https://www.youtube.com/embed/TMNT_TRAILER_URL" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
      </div>
    </div>

    <div class="movie-details" id="oppenheimer-details" style="display: none;">
      <div class="synopsis">
        <h2>Oppenheimer</h2>
        <p>Discover the untold story of J. Robert Oppenheimer, the brilliant scientist behind the development of the atomic bomb. Dive into the complex world of physics, politics, and moral dilemmas as Oppenheimer grapples with the consequences of his groundbreaking work. Experience a thought-provoking journey through history and ethics.</p>
      </div>
      <div class="trailer">
        <iframe width="560
        </div>

<form method="POST" action="" id="booking-form">
  <fieldset id="fieldset-session-ACT">
    <legend>Select Session for Indiana Jones and the Dial of Destiny:</legend>
    <div class="session-selection">
      <div class="session">
        <input type="radio" name="session" id="session-1" value="9pm">
        <label for="session-1">9pm</label>
        <select name="day" id="day1">
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
        <select name="day" id="day2">
          <option value="sat">Saturday</option>
          <option value="sun">Sunday</option>
        </select>
      </div>
    </div>
  </fieldset>

  <fieldset id="fieldset-session-ANM">
    <legend>Select Session for Teenage Mutant Ninja Turtles: Mutant Mayhem:</legend>
    <div class="session-selection">
      <div class="session">
        <input type="radio" name="session" id="session-5" value="12pm">
        <label for="session-5">12pm</label>
        <select name="day" id="day5">
          <option value="mon">Monday</option>
          <option value="tue">Tuesday</option>
          <option value="sat">Saturday</option>
          <option value="sun">Sunday</option>
        </select>
      </div>
      <div class="session">
        <input type="radio" name="session" id="session-6" value="6pm">
        <label for="session-6">6pm</label>
        <select name="day" id="day6">
          <option value="wed">Wednesday</option>
          <option value="thu">Thursday</option>
          <option value="fri">Friday</option>
        </select>
      </div>
    </div>
  </fieldset>

  <fieldset id="fieldset-session-DRM">
    <legend>Select Session for Oppenheimer:</legend>
    <div class="session-selection">
      <div class="session">
        <input type="radio" name="session" id="session-7" value="6pm">
        <label for="session-7">6pm</label>
        <select name="day" id="day7">
          <option value="mon">Monday</option>
          <option value="tue">Tuesday</option>
        </select>
      </div>
      <div class="session">
        <input type="radio" name="session" id="session-8" value="9pm">
        <label for="session-8">9pm</label>
        <select name="day" id="day8">
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
    <legend>Contact Information:</legend>
    <div class="contact-info">
      <label for="name">Full Name:</label>
      <input type="text" name="name" id="name" required>

      <label for="mobile">Mobile Number:</label>
      <input type="tel" name="mobile" id="mobile" required pattern="[0-9]{10}" placeholder="Enter 10-digit mobile number">

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


       
