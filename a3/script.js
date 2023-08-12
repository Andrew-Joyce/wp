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

function rememberMe() {
    var name = document.getElementById('name').value;
    var mobile = document.getElementById('mobile').value;
    var email = document.getElementById('email').value;

    localStorage.setItem('name', name);
    localStorage.setItem('mobile', mobile);
    localStorage.setItem('email', email);
}

function forgetMe() {
    localStorage.removeItem('name');
    localStorage.removeItem('mobile');
    localStorage.removeItem('email');
}

function retrieveDetails() {
    var name = localStorage.getItem('name');
    var mobile = localStorage.getItem('mobile');
    var email = localStorage.getItem('email');

    if (name && mobile && email) {
        document.getElementById('name').value = name;
        document.getElementById('mobile').value = mobile;
        document.getElementById('email').value = email;
        document.getElementById('remember-btn').classList.add('selected');
        document.getElementById('forget-btn').classList.remove('selected');
    }
}

function toggleButtons() {
    document.getElementById('remember-btn').addEventListener('click', function() {
        rememberMe();
        this.classList.toggle('selected');
        document.getElementById('forget-btn').classList.remove('selected');
        console.log('Remember clicked, classes:', this.classList);
    });

    document.getElementById('forget-btn').addEventListener('click', function() {
        forgetMe();
        this.classList.toggle('selected');
        document.getElementById('remember-btn').classList.remove('selected');
        console.log('Forget clicked, classes:', this.classList); 
    });
}

window.onload = function() {
    retrieveDetails();
    toggleButtons();
}

    