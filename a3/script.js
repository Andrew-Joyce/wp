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
            let selectedSession = document.querySelector('.selected'); 
            let isDiscounted = selectedSession ? selectedSession.getAttribute('data-session').endsWith('-dis') : false;
            let price = isDiscounted ? fullPrice * 0.75 : fullPrice;
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

    