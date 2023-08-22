document.addEventListener('DOMContentLoaded', function () {
    const urlParams = new URLSearchParams(window.location.search);
    const selectedMovie = urlParams.get('movie');
    const sessionFieldsets = document.querySelectorAll('fieldset[id^="fieldset-session"]');
    const sessions = document.querySelectorAll('.session');
    const ticketInputs = document.querySelectorAll('input[type="number"]');
    const sessionButtons = document.querySelectorAll('.session');
    const sections = document.querySelectorAll('article');
    const navLinks = document.querySelectorAll('.nav-section');
    const bookingForm = document.getElementById("booking-form");


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

    function rememberMe(event) {
        console.log("Remember Me clicked");
        event.preventDefault();
        
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
        event.preventDefault();
      
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

function validateForm() {
    var nameInput = document.getElementById('name');
    var mobileInput = document.getElementById('mobile');
    var emailInput = document.getElementById('email');
    var sessionButtons = document.querySelectorAll('.session');
    var seatInputs = document.querySelectorAll('input[name^="seats["]');

    console.log('Starting form validation...');

    nameInput.classList.remove('error');
    mobileInput.classList.remove('error');
    emailInput.classList.remove('error');
    sessionButtons.forEach(button => button.classList.remove('error'));
    seatInputs.forEach(input => input.classList.remove('error'));

    var isValid = true;

    if (nameInput.value.trim() === '') {
        console.log('Name is empty.');
        nameInput.classList.add('error');
        isValid = false;
    }

    var mobilePattern = /^(?:04\d{2}\s?\d{3}\s?\d{3}|04\d{2}\s?\d{6})$/;
    if (!mobilePattern.test(mobileInput.value)) {
        console.log('Mobile format is invalid.');
        mobileInput.classList.add('error');
        isValid = false;
    }

    var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailPattern.test(emailInput.value)) {
        console.log('Email format is invalid.');
        emailInput.classList.add('error');
        isValid = false;
    }

    var selectedSession = document.querySelector('.session.selected');
        if (!selectedSession) {
        console.log('No session selected.');
        sessionButtons.forEach(button => button.classList.add('error'));
        isValid = false;
    }

    seatInputs.forEach(input => {
        var quantity = parseInt(input.value, 10);
        if (quantity < 0) {
            console.log('Invalid seat quantity: ' + quantity);
            input.classList.add('error');
            isValid = false;
        }
    });

    console.log('Validation result: ' + (isValid ? 'Valid' : 'Invalid'));
    return isValid;
    }

    if (selectedMovie) {
        const selectedFieldset = document.getElementById(`fieldset-session-${selectedMovie}`);
        if (selectedFieldset) {
            selectedFieldset.style.display = 'block';
        }
    }

    sessions.forEach(function(session) {
        session.addEventListener('click', function(e) {
            sessions.forEach(function(innerSession) {
                innerSession.classList.remove('selected');
            });

            e.currentTarget.classList.add('selected');
        });
    });

    ticketInputs.forEach(input => {
        input.addEventListener('input', updateTotalPrice);
    });

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

    bookingForm.addEventListener("submit", function (event) {
        event.preventDefault();

        const isValid = validateForm();

        if (isValid) {
            bookingForm.submit();
        }
    });

    updateTotalPrice();
});