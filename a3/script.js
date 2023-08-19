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
        if (window.location.pathname.endsWith('booking.php')) {
            document.getElementById('total-price').innerText = "Total Price: $" + totalPrice.toFixed(2);
          }          
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


function storeCustomerDetails(name, email, mobile) {
    const customerDetails = {
        name: name,
        email: email,
        mobile: mobile,
    };
    localStorage.setItem('customerDetails', JSON.stringify(customerDetails));
}

function getStoredCustomerDetails() {
    const storedCustomerDetails = localStorage.getItem('customerDetails');
    if (storedCustomerDetails) {
        return JSON.parse(storedCustomerDetails);
    }
    return null;
}

function removeStoredCustomerDetails() {
    localStorage.removeItem('customerDetails');
}

function updateFormWithStoredDetails() {
    const storedDetails = getStoredCustomerDetails();
    if (storedDetails) {
        document.getElementById('name').value = storedDetails.name;
        document.getElementById('email').value = storedDetails.email;
        document.getElementById('mobile').value = storedDetails.mobile;
        document.getElementById('remember-btn').classList.add('active');
        document.getElementById('forget-btn').classList.remove('active');
    } else {
        document.getElementById('remember-btn').classList.remove('active');
        document.getElementById('forget-btn').classList.add('active');
    }
}

function toggleButton(button) {
    const name = document.getElementById('name').value;
    const email = document.getElementById('email').value;
    const mobile = document.getElementById('mobile').value;

    if (button.id === 'remember-btn') {
        storeCustomerDetails(name, email, mobile);
    } else {
        removeStoredCustomerDetails();
    }

    updateFormWithStoredDetails();
}

function initializeForm() {
    updateFormWithStoredDetails();
}

window.onload = function() {
    document.getElementById('remember-btn').addEventListener('click', function() {
        toggleButton(this);
    });
    document.getElementById('forget-btn').addEventListener('click', function() {
        toggleButton(this);
    });

    initialieForm();
};

