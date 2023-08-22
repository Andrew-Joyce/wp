document.addEventListener("DOMContentLoaded", function () {
    const urlParams = new URLSearchParams(window.location.search);
    const selectedMovie = urlParams.get('movie');

    const sessionFieldsets = document.querySelectorAll('fieldset[id^="fieldset-session"]');
    const sessionButtons = document.querySelectorAll('.session');
    const ticketInputs = document.querySelectorAll('input[type="number"]');
    const nameInput = document.getElementById('name');
    const mobileInput = document.getElementById('mobile');
    const emailInput = document.getElementById('email');
    const bookingForm = document.getElementById("booking-form");

    sessionFieldsets.forEach((fieldset) => {
        fieldset.style.display = 'none';
    });

    if (selectedMovie) {
        const selectedFieldset = document.getElementById(`fieldset-session-${selectedMovie}`);
        if (selectedFieldset) {
            selectedFieldset.style.display = 'block';
        }
    }

    sessionButtons.forEach(function (session) {
        session.addEventListener('click', function (e) {
            sessionButtons.forEach(function (innerSession) {
                innerSession.classList.remove('selected');
            });

            e.currentTarget.classList.add('selected');
        });
    });

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

    bookingForm.addEventListener('submit', event => {
        const totalSeatsSelected = updateTotalPrice();
        if (totalSeatsSelected > 10) {
            event.preventDefault();
            alert("You can select a maximum of 10 seats across all seat types.");
        }
    });

    function rememberMe(event) {
        event.preventDefault();
        
        const name = nameInput.value;
        const mobile = mobileInput.value;
        const email = emailInput.value;

        localStorage.setItem('name', name);
        localStorage.setItem('mobile', mobile);
        localStorage.setItem('email', email);

        document.getElementById('remember-btn').classList.add('active');
        document.getElementById('remember-btn').classList.remove('inactive');
        document.getElementById('forget-btn').classList.remove('active');
        document.getElementById('forget-btn').classList.add('inactive');
    }

    function forgetMe(event) {
        event.preventDefault();

        localStorage.removeItem('name');
        localStorage.removeItem('mobile');
        localStorage.removeItem('email');

        document.getElementById('remember-btn').classList.remove('active');
        document.getElementById('remember-btn').classList.add('inactive');
        document.getElementById('forget-btn').classList.add('active');
        document.getElementById('forget-btn').classList.remove('inactive');
    }

    if (localStorage.getItem('name')) {
        nameInput.value = localStorage.getItem('name');
        mobileInput.value = localStorage.getItem('mobile');
        emailInput.value = localStorage.getItem('email');

        document.getElementById('remember-btn').classList.add('active');
        document.getElementById('remember-btn').classList.remove('inactive');
        document.getElementById('forget-btn').classList.remove('active');
        document.getElementById('forget-btn').classList.add('inactive');
    }

    if (window.location.pathname.endsWith('booking.php')) {
        document.getElementById('remember-btn').addEventListener('click', rememberMe);
        document.getElementById('forget-btn').addEventListener('click', forgetMe);
    }

    function validateForm() {
        console.log('Starting form validation...');

        nameInput.classList.remove('error');
        mobileInput.classList.remove('error');
        emailInput.classList.remove('error');
        sessionButtons.forEach(button => button.classList.remove('error'));
        ticketInputs.forEach(input => input.classList.remove('error'));

        let isValid = true;

        if (nameInput.value.trim() === '') {
            console.log('Name is empty.');
            nameInput.classList.add('error');
            isValid = false;
        }

        let mobilePattern = /^(?:04\d{2}\s?\d{3}\s?\d{3}|04\d{2}\s?\d{6})$/;
        if (!mobilePattern.test(mobileInput.value)) {
            console.log('Mobile format is invalid.');
            mobileInput.classList.add('error');
            isValid = false;
        }

        let emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailPattern.test(emailInput.value)) {
            console.log('Email format is invalid.');
            emailInput.classList.add('error');
            isValid = false;
        }

        let selectedSession = document.querySelector('.session.selected');
        if (!selectedSession) {
            console.log('No session selected.');
            sessionButtons.forEach(button => button.classList.add('error'));
            isValid = false;
        }

        ticketInputs.forEach(input => {
            let quantity = parseInt(input.value, 10);
            if (quantity < 0) {
                console.log('Invalid seat quantity: ' + quantity);
                input.classList.add('error');
                isValid = false;
            }
        });

        console.log('Validation result: ' + (isValid ? 'Valid' : 'Invalid'));
        return isValid;
    }

    bookingForm.addEventListener("submit", function (event) {
        event.preventDefault();

        const isValid = validateForm();

        if (isValid) {
            bookingForm.submit();
        }
    });

});
