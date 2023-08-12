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
        ticketInputs.forEach(input => {
            let quantity = parseInt(input.value);
            let fullPrice = parseFloat(input.nextElementSibling.getAttribute('data-full-price') || 0);
            let discountPrice = parseFloat(input.nextElementSibling.innerText.split('/')[1].split('$')[1]); 
            let selectedSession = document.querySelector('.selected'); 
            let isDiscounted = selectedSession ? selectedSession.getAttribute('data-session').endsWith('-dis') : false;
            let price = isDiscounted ? discountPrice : fullPrice;
            totalPrice += price * quantity;
        });
        document.getElementById('total-price').innerText = "Total Price: $" + totalPrice.toFixed(2);
    }

    ticketInputs.forEach(input => {
        input.addEventListener('input', updateTotalPrice);
    });

    const sessionButtons = document.querySelectorAll('.session');
    sessionButtons.forEach(button => {
        button.addEventListener('click', event => {
            sessionButtons.forEach(btn => btn.classList.remove('selected'));
            event.currentTarget.classList.add('selected'); 
            updateTotalPrice();
        });
    });

    updateTotalPrice();
});

document.getElementById('remember-btn').addEventListener('click', function() {
    const name = document.getElementById('name').value;
    const email = document.getElementById('email').value;
    const mobile = document.getElementById('mobile').value;

    localStorage.setItem('customer-name', name);
    localStorage.setItem('customer-email', email);
    localStorage.setItem('customer-mobile', mobile);

    document.getElementById('remember-btn').classList.add('selected');
    document.getElementById('remember-btn').classList.remove('unselected');
    document.getElementById('forget-btn').classList.add('unselected');
    document.getElementById('forget-btn').classList.remove('selected');
});

document.getElementById('forget-btn').addEventListener('click', function() {
    localStorage.removeItem('customer-name');
    localStorage.removeItem('customer-email');
    localStorage.removeItem('customer-mobile');

    document.getElementById('remember-btn').classList.add('unselected');
    document.getElementById('remember-btn').classList.remove('selected');
    document.getElementById('forget-btn').classList.add('selected');
    document.getElementById('forget-btn').classList.remove('unselected');
});

function populateFieldsFromLocalStorage() {
    const name = localStorage.getItem('customer-name');
    const email = localStorage.getItem('customer-email');
    const mobile = localStorage.getItem('customer-mobile');

    if (name) document.getElementById('name').value = name;
    if (email) document.getElementById('email').value = email;
    if (mobile) document.getElementById('mobile').value = mobile;

    if (name) {
        document.getElementById('remember-btn').classList.add('selected');
        document.getElementById('remember-btn').classList.remove('unselected');
    }
}

document.addEventListener('DOMContentLoaded', populateFieldsFromLocalStorage);


    