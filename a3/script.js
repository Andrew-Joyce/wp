<script>
  function calculateTotalPrice() {
    const selectedSeats = document.querySelectorAll('input[type="number"]');
    const standardAdultPrice = getSeatPrice(document.querySelector('.seat.standard-seat'), true);
    const concessionPrice = getSeatPrice(document.querySelector('.seat.concession-seat'), true);
    const childPrice = getSeatPrice(document.querySelector('.seat.child-seat'), true);

    let totalPrice = 0;

    selectedSeats.forEach(function(seat) {
      const seatType = seat.getAttribute('name').match(/\[(.*?)\]/)[1];
      const isFullPrice = seatType === 'STA' || seatType === 'STP' || seatType === 'STC';
      totalPrice += getSeatPrice(seat, isFullPrice) * parseInt(seat.value, 10);
    });

    const totalPriceElement = document.getElementById('total-price');
    totalPriceElement.textContent = 'Total Price: $' + totalPrice.toFixed(2);
  }

  function getSeatPrice(seatElement, isFullPrice) {
    const fullPriceAttr = isFullPrice ? 'data-full-price' : 'data-discount';
    return parseFloat(seatElement.getAttribute(fullPriceAttr));
  }

  function validateName(name) {
    const namePattern = /^[a-zA-ZÀ-ÿ\s'\.,-]{1,}$/;
    return namePattern.test(name);
  }

  function validateMobile(mobile) {
    const mobilePattern = /^(?:04\d{2}\s?\d{3}\s?\d{3}|04\d{2}\s?\d{6})$/;
    return mobilePattern.test(mobile);
  }

  function validateForm() {
    const nameInput = document.getElementById('name');
    const mobileInput = document.getElementById('mobile');

    const isNameValid = validateName(nameInput.value);
    const isMobileValid = validateMobile(mobileInput.value);

    if (!isNameValid) {
      alert('Please enter a valid name.');
      return false;
    }

    if (!isMobileValid) {
      alert('Please enter a valid Australian mobile number (starting with 04).');
      return false;
    }

    return true;
  }

  document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('booking-form');
    form.addEventListener('change', calculateTotalPrice);

    const seatInputs = form.querySelectorAll('input[type="number"]');
    const dayRadios = form.querySelectorAll('input[type="radio"][name="session"]');
    const daySelects = form.querySelectorAll('select[name="day"]');

    calculateTotalPrice();

    const storedName = localStorage.getItem('customerName');
    const storedMobile = localStorage.getItem('customerMobile');
    const storedEmail = localStorage.getItem('customerEmail');
    if (storedName) {
      document.getElementById('name').value = storedName;
    }
    if (storedMobile) {
      document.getElementById('mobile').value = storedMobile;
    }
    if (storedEmail) {
      document.getElementById('email').value = storedEmail;
    }

    const rememberCheckbox = document.getElementById('remember');
    const isRemembered = localStorage.getItem('rememberMe') === 'true';
    rememberCheckbox.checked = isRemembered;

    rememberCheckbox.addEventListener('change', function() {
      if (rememberCheckbox.checked) {
        const nameInput = document.getElementById('name').value;
        const mobileInput = document.getElementById('mobile').value;
        const emailInput = document.getElementById('email').value;

        localStorage.setItem('customerName', nameInput);
        localStorage.setItem('customerMobile', mobileInput);
        localStorage.setItem('customerEmail', emailInput);
        localStorage.setItem('rememberMe', 'true');
      } else {
        localStorage.removeItem('customerName');
        localStorage.removeItem('customerMobile');
        localStorage.removeItem('customerEmail');
        localStorage.removeItem('rememberMe');
      }
    });

    form.addEventListener('submit', function(event) {
      if (!validateForm()) {
        event.preventDefault();
      }
    });
  });
</script>