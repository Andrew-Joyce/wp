document.addEventListener('DOMContentLoaded', () => {
    const selectedMovie = new URLSearchParams(window.location.search).get('movie');

    const sessionFieldsets = document.querySelectorAll('fieldset[id^="fieldset-session"]');
    sessionFieldsets.forEach(fieldset => {
        fieldset.style.display = 'none';
    });

    if (selectedMovie) {
        const selectedFieldset = document.getElementById(`fieldset-session-${selectedMovie}`);
        if (selectedFieldset) {
            selectedFieldset.style.display = 'block';
        }
    }
});


document.addEventListener('DOMContentLoaded', function () {
    var sessions = document.querySelectorAll('.session');

    sessions.forEach(function(session) {
        session.addEventListener('click', function(e) {
            sessions.forEach(function(innerSession) {
                innerSession.classList.remove('selected');
            });

            e.currentTarget.classList.add('selected');
        });
    });
});

    
document.addEventListener("DOMContentLoaded", function() {
    const ticketInputs = document.querySelectorAll('input[type="number"]');

    function updateTotalPrice() {
        let totalPrice = 0;
        let totalSeatsSelected = 0;

        ticketInputs.forEach(input => {
            let quantity = parseInt(input.value);
            let maxQuantity = parseInt(input.getAttribute('max'));

            totalSeatsSelected += quantity;

            if (quantity > maxQuantity) {
                input.value = maxQuantity;
                quantity = maxQuantity;
            }

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

        return totalSeatsSelected;
    }

    ticketInputs.forEach(input => {
        input.addEventListener('input', updateTotalPrice);
    });

    const sessionButtons = document.querySelectorAll('.session');
    sessionButtons.forEach(button => {
        button.addEventListener('click', function() {
            sessionButtons.forEach(btn => btn.classList.remove('error'));
            
            sessionButtons.forEach(btn => btn.classList.remove('selected'));
            button.classList.add('selected');
            
            const selectedSessionValue = button.getAttribute('data-session');
            document.getElementById('selected-session-input').value = selectedSessionValue;
        });
    });

    const form = document.querySelector('form');
    form.addEventListener('submit', event => {
        const totalSeatsSelected = updateTotalPrice();
        if (totalSeatsSelected > 10) {
            event.preventDefault();
            alert("You can select a maximum of 10 seats across all seat types.");
        }
    });

    updateTotalPrice();
});

function rememberMe(event) {
    console.log("Remember Me clicked");
    
    const name = document.getElementById('name').value;
    const mobile = document.getElementById('mobile').value;
    const email = document.getElementById('email').value;
  
    localStorage.setItem('name', name);
    localStorage.setItem('mobile', mobile);
    localStorage.setItem('email', email);
  
    document.getElementById('remember-btn').classList.add('active');
    document.getElementById('remember-btn').classList.remove('inactive');
    document.getElementById('forget-btn').classList.remove('active');
    document.getElementById('forget-btn').classList.add('inactive');
}

function forgetMe(event) {
    console.log("Forget Me clicked");
  
    localStorage.removeItem('name');
    localStorage.removeItem('mobile');
    localStorage.removeItem('email');
  
    document.getElementById('remember-btn').classList.remove('active');
    document.getElementById('remember-btn').classList.add('inactive');
    document.getElementById('forget-btn').classList.add('active');
    document.getElementById('forget-btn').classList.remove('inactive');
}

document.addEventListener("DOMContentLoaded", function() {
    if (localStorage.getItem('name')) {
        document.getElementById('name').value = localStorage.getItem('name');
        document.getElementById('mobile').value = localStorage.getItem('mobile');
        document.getElementById('email').value = localStorage.getItem('email');
  
        document.getElementById('remember-btn').classList.add('active');
        document.getElementById('remember-btn').classList.remove('inactive');
        document.getElementById('forget-btn').classList.remove('active');
        document.getElementById('forget-btn').classList.add('inactive');
    }

    if (window.location.pathname.endsWith('booking.php')) {
        document.getElementById('remember-btn').addEventListener('click', function(event) {
            rememberMe(event); 
        });
        document.getElementById('forget-btn').addEventListener('click', function(event) {
            forgetMe(event);
        });
    }
});


document.addEventListener('DOMContentLoaded', function () {
    const sections = document.querySelectorAll('article'); 
    const navLinks = document.querySelectorAll('.nav-section');
    
    window.addEventListener('scroll', function () {

      sections.forEach((section, index) => {
        const rect = section.getBoundingClientRect();
        
        const threshold = rect.height * 0.5;
        
        if (rect.top <= threshold && rect.bottom >= threshold) {

          navLinks.forEach(navLink => {
            navLink.classList.remove('active');
            navLink.style.color = 'white'; 
          });
          
          navLinks[index].classList.add('active');
          navLinks[index].style.color = 'blue';
        }
      });
    });
  });

  document.addEventListener('DOMContentLoaded', () => {
    const bookingForm = document.getElementById('booking-form');
    if (bookingForm) {

        bookingForm.addEventListener('submit', function (event) {
            event.preventDefault();

            const isValid = validateForm();

            if (isValid) {
                bookingForm.submit();
            }
        });
    }
    
    function validateForm() {
        const inputs = {
            name: document.getElementById('name'),
            mobile: document.getElementById('mobile'),
            email: document.getElementById('email'),
        };

        const patterns = {
            mobile: /^(?:04\d{2}\s?\d{3}\s?\d{3}|04\d{2}\s?\d{6})$/,
            email: /^[^\s@]+@[^\s@]+\.[^\s@]+$/,
        };

        const sessionButtons = document.querySelectorAll('.session');
        const seatInputs = document.querySelectorAll('input[name^="seats["]');

        console.log('Starting form validation...');

        Object.values(inputs).forEach(input => {
            input.classList.remove('error');
        });

        sessionButtons.forEach(button => {
            button.classList.remove('error');
        });

        seatInputs.forEach(input => {
            input.classList.remove('error');
        });

        let isValid = true;

        if (inputs.name.value.trim() === '') {
            console.log('Name is empty.');
            inputs.name.classList.add('error');
            isValid = false;
        }

        if (!patterns.mobile.test(inputs.mobile.value)) {
            console.log('Mobile format is invalid.');
            inputs.mobile.classList.add('error');
            isValid = false;
        }

        if (!patterns.email.test(inputs.email.value)) {
            console.log('Email format is invalid.');
            inputs.email.classList.add('error');
            isValid = false;
        }

        const selectedSession = document.querySelector('.session.selected');
        if (!selectedSession) {
            console.log('No session selected.');
            sessionButtons.forEach(button => button.classList.add('error'));
            isValid = false;
        }

        seatInputs.forEach(input => {
            const quantity = parseInt(input.value, 10);
            if (quantity < 0) {
                console.log('Invalid seat quantity: ' + quantity);
                input.classList.add('error');
                isValid = false;
            }
        });

        const hiddenSeatInputs = document.querySelectorAll('input[type="hidden"][name^="seats["]');
        hiddenSeatInputs.forEach(input => {
            const seatQuantity = parseInt(input.value, 10);

            if (seatQuantity > 0) {
                console.log(`Seat type ${input.name} has ${seatQuantity} selected.`);
            }
        });

        console.log('Validation result: ' + (isValid ? 'Valid' : 'Invalid'));
        return isValid;
    }
});




