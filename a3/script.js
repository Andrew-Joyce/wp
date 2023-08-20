document.addEventListener('DOMContentLoaded', () => {
  const urlParams = new URLSearchParams(window.location.search);
  const selectedMovie = urlParams.get('movie');
  const bookingForm = document.getElementById('booking-form');
  const navLinks = document.querySelectorAll('#navbar a');
  const sections = document.querySelectorAll('main > div');
  const sessionFieldsets = document.querySelectorAll('fieldset[id^="fieldset-session"]');
  const ticketInputs = document.querySelectorAll('input[type="number"]');
  const sessionButtons = document.querySelectorAll('.session');
  const nameInput = document.getElementById('name');
  const emailInput = document.getElementById('email');
  const mobileInput = document.getElementById('mobile');
  const rememberRadio = document.getElementById('remember');
  const forgetRadio = document.getElementById('forget');

  navLinks.forEach(link => {
      link.addEventListener('click', function(event) {
          navLinks.forEach(navLink => navLink.classList.remove('current'));
          link.classList.add('current');
      });
  });

  sections.forEach(section => {
      if (window.location.pathname.endsWith('index.php')) {
          const sectionObserver = new IntersectionObserver(entries => {
              entries.forEach(entry => {
                  if (entry.isIntersecting) {
                      const targetId = entry.target.getAttribute('id');
                      const correspondingNavLink = document.querySelector(`#navbar a[href="#${targetId}"]`);
                      navLinks.forEach(navLink => navLink.classList.remove('current'));
                      if (correspondingNavLink) {
                          correspondingNavLink.classList.add('current');
                      }
                  }
              });
          }, { threshold: 0.5 });
          sectionObserver.observe(section);
      }
  });

  sessionFieldsets.forEach((fieldset) => {
      fieldset.style.display = 'none';
  });

  if (selectedMovie) {
      const selectedFieldset = document.getElementById(`fieldset-session-${selectedMovie}`);
      if (selectedFieldset) {
          selectedFieldset.style.display = 'block';
      }
  }

  sessionButtons.forEach(session => {
      session.addEventListener('click', function(e) {
          sessionButtons.forEach(innerSession => {
              innerSession.classList.remove('selected');
          });
          const selectedSession = e.currentTarget.getAttribute('data-session');
          document.getElementById('selected-session-input').value = selectedSession;
          e.currentTarget.classList.add('selected');
          updateTotalPrice();
      });
  });

  function updateTotalPrice() {
      let totalPrice = 0;
      ticketInputs.forEach(input => {
          let quantity = parseInt(input.value);
          let fullPrice = parseFloat(input.nextElementSibling.getAttribute('data-full-price') || 0);
          let discountPrice = parseFloat(input.nextElementSibling.innerText.split('/')[1].split('$')[1]);
          let selectedSession = document.querySelector('.selected');
          let isDiscounted = selectedSession ? selectedSession.getAttribute('data-session').endsWith('-dis') : false;
          let price = isDiscounted ? discountPrice : fullPrice;
          totalPrice += price * quantity;
      });

      if (window.location.pathname.endsWith('booking.php')) {
          document.getElementById('total-price').innerText = "Total Price: $" + totalPrice.toFixed(2);
      }
  }

  ticketInputs.forEach(input => {
      input.addEventListener('input', updateTotalPrice);
  });

  updateTotalPrice();

  if (window.location.pathname.endsWith('booking.php')) {
      const rememberBtn = document.getElementById('remember-btn');
      const forgetBtn = document.getElementById('forget-btn');

      if (localStorage.getItem('name')) {
          nameInput.value = localStorage.getItem('name');
      }
      if (localStorage.getItem('mobile')) {
          mobileInput.value = localStorage.getItem('mobile');
      }
      if (localStorage.getItem('email')) {
          emailInput.value = localStorage.getItem('email');
          rememberBtn.classList.add('active');
          rememberBtn.classList.remove('inactive');
          forgetBtn.classList.remove('active');
          forgetBtn.classList.add('inactive');
      }

      function setCustomerDetailsFromLocalStorage() {
          const storedName = localStorage.getItem('customerName');
          const storedEmail = localStorage.getItem('customerEmail');
          const storedMobile = localStorage.getItem('customerMobile');

          if (storedName && storedEmail && storedMobile) {
              nameInput.value = storedName;
              emailInput.value = storedEmail;
              mobileInput.value = storedMobile;
              rememberRadio.checked = true;
          } else {
              forgetRadio.checked = true;
          }
      }

      function saveCustomerDetailsToLocalStorage() {
          localStorage.setItem('customerName', nameInput.value);
          localStorage.setItem('customerEmail', emailInput.value);
          localStorage.setItem('customerMobile', mobileInput.value);
      }

      function removeCustomerDetailsFromLocalStorage() {
          localStorage.removeItem('customerName');
          localStorage.removeItem('customerEmail');
          localStorage.removeItem('customerMobile');
      }

      rememberRadio.addEventListener('change', function() {
          if (rememberRadio.checked) {
              saveCustomerDetailsToLocalStorage();
          }
      });

      forgetRadio.addEventListener('change', function() {
          if (forgetRadio.checked) {
              removeCustomerDetailsFromLocalStorage();
          }
      });

      setCustomerDetailsFromLocalStorage();

      bookingForm.addEventListener('submit', function(event) {
          if (!validateForm()) {
              event.preventDefault();
          }
      });

      function validateForm() {
          const movieInput = document.getElementById('movie');
          const sessionButtons = document.querySelectorAll('.session.selected');
          const ticketInputs = document.querySelectorAll('[name^="seats["]');
          let isValid = true;

          if (!movieInput.value) {
              isValid = false;
              alert('Please select a movie.');
          }

          if (sessionButtons.length === 0) {
              isValid = false;
              alert('Please select a session.');
          }

          if (!nameInput.value.trim()) {
              isValid = false;
              alert('Please enter your name.');
          }

          const mobilePattern = /^(?:04\d{2}\s?\d{3}\s?\d{3}|04\d{2}\s?\d{6})$/;
          if (!mobilePattern.test(mobileInput.value)) {
              isValid = false;
              alert('Invalid mobile number format.');
          }

          const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
          if (!emailPattern.test(emailInput.value)) {
              isValid = false;
              alert('Invalid email format.');
          }

          ticketInputs.forEach(input => {
              const quantity = parseInt(input.value);
              if (isNaN(quantity) || quantity < 1 || quantity > 10) {
                  isValid = false;
                  alert('Invalid ticket quantity. Please enter a value between 1 and 10.');
              }
          });

          if (totalTicketQuantity === 0) {
              isValid = false;
              alert('Please select at least one ticket.');
          }

          return isValid;
      }
  }
});
