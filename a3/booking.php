<!DOCTYPE html>
<html lang="en">

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
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
    });
  </script>
</head>

<body>
  <header style="text-align: center;">
    <div style="display: flex; justify-content: center; align-items: center;">
      <a href="https://titan.csit.rmit.edu.au/~s3876520/wp/a3/index.php">
        <img src="../../media/Cinema.png" alt="Cinema" style="margin-right: 10px; width: 100px; height: auto;">
        <h1 style="display: inline;">Lunardo Cinema</h1>
      </a>
    </div>
  </header>
  <nav id="navbar">
    <a href="https://titan.csit.rmit.edu.au/~s3876520/wp/a3/index.php#now-showing">Now Showing</a>
    <a href="https://titan.csit.rmit.edu.au/~s3876520/wp/a3/index.php#seats-&-prices">Seats & Prices</a>
    <a href="https://titan.csit.rmit.edu.au/~s3876520/wp/a3/index.php#about-us">About Us</a>
  </nav>


  <main>
    
    <form method="POST" action="" id="booking-form">

<fieldset id="fieldset-session-ACT">
    <div class="movie-details" id="indiana-jones-details"style="display: block;">
        <div class="trailer">
            <div class="responsive-video">
                <iframe width="560" height="315" src="https://www.youtube.com/embed/eQfMbSe7F2g" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
        </div>
        <div class="synopsis">
            <p>Embark on an epic adventure with Indiana Jones as he searches for the mystical Dial of Destiny. Join him in a thrilling quest filled with ancient artifacts, hidden treasures, and dangerous foes. Prepare for heart-stopping action and breathtaking discoveries in this action-packed blockbuster!</p>
            <p><strong>Starring</strong> - Harrison Ford · Phoebe Waller-Bridge · Antonio Banderas</p>
            <p>For more information, visit <a href="https://www.imdb.com/title/tt1462764/" target="_blank">IMDb</a>.</p>
        </div>
    </div>
    <legend>Indiana Jones and the Dial of Destiny</legend>
    <div class="Indiana Jones and the Dial of Destiny">
        <h3>Select Session</h3>
        <div class="session">
            <input type="radio" name="session" id="session-1" value="9pm">
            <label for="session-1">9pm</label>
            <select class="select-input" name="day" id="day1">
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
            <select class="select-input" name="day" id="day2">
                <option value="sat">Saturday</option>
                <option value="sun">Sunday</option>
            </select>
        </div>
    </div>
</fieldset>

<fieldset id="fieldset-session-RMC">
    <div class="movie-details" id="barbie-details"style="display: block;">
        <div class="trailer">
            <div class="responsive-video">
            <iframe width="560" height="315" src="https://www.youtube.com/embed/pBk4NYhWNMM" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
        </div>
        <div class="synopsis">
            <p>Enter the fascinating world of Barbie and join her on an exciting adventure. Experience a heartwarming story filled with friendship, courage, and dreams. Barbie will captivate you with her charm and inspire you to believe in yourself. Get ready for an unforgettable journey with Barbie!</p>
            <p><strong>Starring</strong> - Margot Robbie · Kingsley Ben-Adi · Ryan Gosling ·  Emma Mackey</p>
            <p>For more information, visit <a href="https://www.imdb.com/title/tt1517268/" target="_blank">IMDb</a>.</p>
        </div>
    </div>
    <legend>Barbie</legend>
    <div class="Barbie">
        <h3>Select Session</h3>
        <div class="session">
        <input type="radio" name="session" id="session-3" value="12pm">
            <label for="session-3">12pm</label>
            <select name="day" id="day3">
                <option value="wed">Wednesday</option>
                <option value="thu">Thursday</option>
                <option value="fri">Friday</option>
            </select>
        </div>
        <div class="session">
        <input type="radio" name="session" id="session-4" value="3pm">
            <label for="session-4">3pm</label>
            <select name="day" id="day4">
                <option value="sat">Saturday</option>
                <option value="sun">Sunday</option>
            </select>
        </div>
    </div>
</fieldset>


<fieldset id="fieldset-session-ANM">
    <div class="movie-details" id="tmnt-details" style="display: block;">
        <div class="trailer">
            <div class="responsive-video">
            <iframe width="560" height="315" src="https://www.youtube.com/embed/IHvzw4Ibuho" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
        </div>
        <div class="synopsis">
            <p>Join the fearless Teenage Mutant Ninja Turtles in their latest mission to save the city from the clutches of evil. Watch as Leonardo, Donatello, Michelangelo, and Raphael unleash their ninja skills to combat powerful enemies. Get ready for an adrenaline-pumping adventure with the heroes in a half-shell!</p>
            <p><strong>Starring</strong> - Ayo Edebiri · Rose Byrne · Seth Rogen · Jackie Chan</p>
            <p>For more information, visit <a href="https://www.imdb.com/title/tt8589698/" target="_blank">IMDb</a>.</p>
        </div>
    </div>
    <legend>Teenage Mutant Ninja Turtles: Mutant Mayhem</legend>
    <div class="Teenage Mutant Ninja Turtles: Mutant Mayhem">
        <h3>Select Session</h3>
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
    <div class="movie-details" id="tmnt-details" style="display: block;">
        <div class="trailer">
            <div class="responsive-video">
            <iframe width="560" height="315" src="https://www.youtube.com/embed/bK6ldnjE3Y0" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
        </div>
        <div class="synopsis">
            <p>Discover the untold story of J. Robert Oppenheimer, the brilliant scientist behind the development of the atomic bomb. Dive into the complex world of physics, politics, and moral dilemmas as Oppenheimer grapples with the consequences of his groundbreaking work. Experience a thought-provoking journey through history and ethics.</p>
            <p><strong>Starring</strong> - Cillian Murphy · Emily Blunt· Matt Damon · Robert Downey Jr.</p>
            <p>For more information, visit <a href="https://www.imdb.com/title/tt15398776/" target="_blank">IMDb</a>.</p>
        </div>
    </div>
    <legend>Oppenheimer</legend>
    <div class="Oppenheimer">
        <h3>Select Session</h3>
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
        <legend>Select Standard Seats</legend>
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
        
        <legend>Gold Class Seats</legend>
        <div id="seats-&-prices">
            <div class="seats-container">
            <div class="seat standard-seat">
                <label for="seats[STA]">Standard Adult</label>
                <input type="number" name="seats[STA]" min="0" placeholder="Enter quantity" required>
                <span class="seat-price">Full Price: $31.00/ Discount: $25.00</span>
            </div>
            <div class="seat concession-seat">
                <label for="seats[STP]">Concession</label>
                <input type="number" name="seats[STP]" min="0" placeholder="Enter quantity" required>
                <span class="seat-price">Full Price: $28.00 / Discount: $23.50</span>
            </div>
            <div class="seat child-seat">
                <label for="seats[STC]">Child</label>
                <input type="number" name="seats[STC]" min="0" placeholder="Enter quantity" required>
                <span class="seat-price">Full Price: $25.00 / Discount: $22.00</span>
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
       <div>&copy;<script>
          document.write(new Date().getFullYear());
         </script>Andrew Joyce, student number - S3876520. Last modified <?= date ("Y F d  H:i", filemtime($_SERVER['SCRIPT_FILENAME'])); ?>.</div>
         <div>Disclaimer: This website is not a real website and is being developed as part of a School of Science Web Programming course at RMIT University in Melbourne, Australia.</div>
         <div><button id='toggleWireframeCSS' onclick='toggleWireframe()'>Toggle Wireframe CSS</button></div>
   </footer>
  </body>
</html>
       