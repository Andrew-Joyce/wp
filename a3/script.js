const urlParams = new URLSearchParams(window.location.search);
const selectedMovie = urlParams.get('movie');
let selectedSession = null;

function calculateTotalPrice() {
  const seatPrices = {
    'STA': { 'fullPrice': 21.50, 'discount': 16.00 },
    'STP': { 'fullPrice': 19.50, 'discount': 14.00 },
    'STC': { 'fullPrice': 17.50, 'discount': 12.00 },
    'GSTA': { 'fullPrice': 31.00, 'discount': 25.00 },
    'GSTP': { 'fullPrice': 28.00, 'discount': 23.50 },
    'GSTC': { 'fullPrice': 25.00, 'discount': 22.00 },
  };

  const standardSeatsInputs = document.querySelectorAll('#standard-seats input[type="number"]');
  const goldClassSeatsInputs = document.querySelectorAll('#gold-class-seats input[type="number"]');
  let totalPrice = 0;

  standardSeatsInputs.forEach((seat) => {
    const seatType = seat.name.split('[')[1].split(']')[0];
    const seatQuantity = parseInt(seat.value);

    if (!isNaN(seatQuantity)) {
      totalPrice += seatQuantity * seatPrices[seatType].fullPrice;
    }
  });

  const selectedSession = document.querySelector('input[name="session"]:checked');
  if (selectedSession && selectedSession.value === '6pm') {
    goldClassSeatsInputs.forEach((seat) => {
      const seatType = seat.name.split('[')[1].split(']')[0];
      const seatQuantity = parseInt(seat.value);

      if (!isNaN(seatQuantity)) {
        totalPrice += seatQuantity * seatPrices[`GST${seatType}`].discount;
      }
    });
  } else {
    goldClassSeatsInputs.forEach((seat) => {
      const seatType = seat.name.split('[')[1].split(']')[0];
      const seatQuantity = parseInt(seat.value);

      if (!isNaN(seatQuantity)) {
        totalPrice += seatQuantity * seatPrices[`GST${seatType}`].fullPrice;
      }
    });
  }

  document.getElementById('total-price').textContent = `Total Price: $${totalPrice.toFixed(2)}`;
}

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

  const movieSelect = document.getElementById('movie-select');
  movieSelect.addEventListener('change', () => {
    const selectedMovie = movieSelect.value;
    const selectedFieldset = document.getElementById(`fieldset-session-${selectedMovie}`);
    sessionFieldsets.forEach((fieldset) => {
      fieldset.style.display = 'none';
    });
    if (selectedFieldset) {
      selectedFieldset.style.display = 'block';
    }

    calculateTotalPrice(); 
  });

  const sessionRadios = document.querySelectorAll('input[type="radio"][name="session"]');
  sessionRadios.forEach((radio) => {
    radio.addEventListener('change', () => {
      calculateTotalPrice();
    });
  });

  calculateTotalPrice();
});

document.addEventListener('DOMContentLoaded', function () {
  const form = document.getElementById('booking-form');
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

  rememberCheckbox.addEventListener('change', function () {
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

  seatInputs.forEach((seat) => {
    seat.addEventListener('change', calculateTotalPrice);
  });

  form.addEventListener('submit', function (event) {
    if (!validateForm()) {
      event.preventDefault();
    }
  });
});

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
