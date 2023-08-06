const urlParams = new URLSearchParams(window.location.search);
const selectedMovie = urlParams.get('movie');
let selectedSession = null;

function calculateTotalPrice() {
  const sessionRadios = document.querySelectorAll('input[type="radio"][name="session"]');
  let selectedSessionRate = 0;

  sessionRadios.forEach((radio) => {
    if (radio.checked) {
      selectedSessionRate = parseFloat(radio.value.split('-')[2]);
    }
  });

  const standardAdultSeats = parseInt(document.getElementsByName("seats[STA]")[0].value);
  const standardConcessionSeats = parseInt(document.getElementsByName("seats[STP]")[0].value);
  const standardChildSeats = parseInt(document.getElementsByName("seats[STC]")[0].value);

  const goldClassAdultSeats = parseInt(document.getElementsByName("seats[FCA]")[0].value);
  const goldClassConcessionSeats = parseInt(document.getElementsByName("seats[FCP]")[0].value);
  const goldClassChildSeats = parseInt(document.getElementsByName("seats[FCC]")[0].value);

  const standardAdultPrice = parseFloat(document.querySelector('.seat.standard-seat .seat-price').textContent.split('Full Price: $')[1].split(' /')[0]);
  const standardConcessionPrice = parseFloat(document.querySelector('.seat.concession-seat .seat-price').textContent.split('Full Price: $')[1].split(' /')[0]);
  const standardChildPrice = parseFloat(document.querySelector('.seat.child-seat .seat-price').textContent.split('Full Price: $')[1].split(' /')[0]);

  const goldClassAdultPrice = parseFloat(document.querySelector('.seat.standard-seat .seat-price').textContent.split('Full Price: $')[1].split(' /')[0]);
  const goldClassConcessionPrice = parseFloat(document.querySelector('.seat.concession-seat .seat-price').textContent.split('Full Price: $')[1].split(' /')[0]);
  const goldClassChildPrice = parseFloat(document.querySelector('.seat.child-seat .seat-price').textContent.split('Full Price: $')[1].split(' /')[0]);

  const totalStandardPrice = standardAdultSeats * standardAdultPrice + standardConcessionSeats * standardConcessionPrice + standardChildSeats * standardChildPrice;
  const totalGoldClassPrice = goldClassAdultSeats * goldClassAdultPrice + goldClassConcessionSeats * goldClassConcessionPrice + goldClassChildSeats * goldClassChildPrice;

  const totalPrice = selectedSessionRate === 0 ? 0 : totalStandardPrice + totalGoldClassPrice;
  const totalPriceDisplay = document.getElementById('total-price');
  
  if (totalPrice === 0) {
    totalPriceDisplay.textContent = '';
  } else {
    totalPriceDisplay.textContent = `Total Price: $${totalPrice.toFixed(2)}`;
  }
}

document.addEventListener('DOMContentLoaded', () => {
  const sessionRadios = document.querySelectorAll('input[type="radio"][name="session"]');
  sessionRadios.forEach((radio) => {
    radio.addEventListener('change', calculateTotalPrice);
  });

  const seatInputs = document.querySelectorAll('input[type="number"]');
  seatInputs.forEach((seat) => {
    seat.addEventListener('input', calculateTotalPrice);
  });

  const bookingForm = document.getElementById('booking-form');
  bookingForm.addEventListener('submit', (event) => {
    if (!validateForm()) {
      event.preventDefault();
    }
  });
});

document.addEventListener('DOMContentLoaded', () => {

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

    const standardAdultSeats = parseInt(document.getElementsByName("seats[STA]")[0].value);
    const standardConcessionSeats = parseInt(document.getElementsByName("seats[STP]")[0].value);
    const standardChildSeats = parseInt(document.getElementsByName("seats[STC]")[0].value);

    const goldClassAdultSeats = parseInt(document.getElementsByName("seats[FCA]")[0].value);
    const goldClassConcessionSeats = parseInt(document.getElementsByName("seats[FCP]")[0].value);
    const goldClassChildSeats = parseInt(document.getElementsByName("seats[FCC]")[0].value);

    if (
      standardAdultSeats <= 0 &&
      standardConcessionSeats <= 0 &&
      standardChildSeats <= 0 &&
      goldClassAdultSeats <= 0 &&
      goldClassConcessionSeats <= 0 &&
      goldClassChildSeats <= 0
    ) {
      alert("Please select at least one ticket.");
      return false;
    }

    return true;
  }

  const sessionRadios = document.querySelectorAll('input[type="radio"][name="session"]');
  sessionRadios.forEach((radio) => {
    radio.addEventListener('change', calculateTotalPrice);
  });

  const seatInputs = document.querySelectorAll('input[type="number"]');
  seatInputs.forEach((seat) => {
    seat.addEventListener('input', calculateTotalPrice);
  });

  const bookingForm = document.getElementById('booking-form');
  bookingForm.addEventListener('submit', (event) => {
    if (!validateForm()) {
      event.preventDefault();
    }
  });
});

function updateSessionStyle(selectedSessionId) {
  const sessionLabels = document.querySelectorAll('.session label');
  
  sessionLabels.forEach(label => {
      label.style.fontWeight = 'normal';
      label.style.color = 'black';
  });
  
  const selectedLabel = document.querySelector(`label[for="${selectedSessionId}"]`);
  selectedLabel.style.fontWeight = 'bold';
  selectedLabel.style.color = 'blue';
}

function saveCustomerDetails() {
  const nameInput = document.getElementById('name').value;
  const mobileInput = document.getElementById('mobile').value;
  const emailInput = document.getElementById('email').value;
  const rememberCheckbox = document.getElementById('remember');

  if (rememberCheckbox.checked) {
      localStorage.setItem('customerName', nameInput);
      localStorage.setItem('customerMobile', mobileInput);
      localStorage.setItem('customerEmail', emailInput);
  } else {
      localStorage.removeItem('customerName');
      localStorage.removeItem('customerMobile');
      localStorage.removeItem('customerEmail');
  }
}

function populateCustomerDetails() {
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
}

document.getElementById('booking-form').addEventListener('submit', saveCustomerDetails);

document.getElementById('remember-btn').addEventListener('click', function () {
  const rememberCheckbox = document.getElementById('remember');
  rememberCheckbox.checked = true;
  saveCustomerDetails();
});

document.getElementById('forget-btn').addEventListener('click', function () {
  const rememberCheckbox = document.getElementById('remember');
  rememberCheckbox.checked = false;
  saveCustomerDetails();
});

document.addEventListener('DOMContentLoaded', populateCustomerDetails);
