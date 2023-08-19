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

function toggleButton(button) {
    const nameInput = document.getElementById("name");
    const mobileInput = document.getElementById("mobile");
    const emailInput = document.getElementById("email");
    
    if (button.id === "remember-btn") {
        localStorage.setItem("customerName", nameInput.value);
        localStorage.setItem("customerMobile", mobileInput.value);
        localStorage.setItem("customerEmail", emailInput.value);
    } else if (button.id === "forget-btn") {
        localStorage.removeItem("customerName");
        localStorage.removeItem("customerMobile");
        localStorage.removeItem("customerEmail");
        

        nameInput.value = "";
        mobileInput.value = "";
        emailInput.value = "";
    }
    
    button.classList.toggle("active");
    button.classList.toggle("inactive");
}

function populateFormFromLocalStorage() {
    const nameInput = document.getElementById("name");
    const mobileInput = document.getElementById("mobile");
    const emailInput = document.getElementById("email");
    
    const storedName = localStorage.getItem("customerName");
    const storedMobile = localStorage.getItem("customerMobile");
    const storedEmail = localStorage.getItem("customerEmail");
    
    if (storedName && storedMobile && storedEmail) {
        nameInput.value = storedName;
        mobileInput.value = storedMobile;
        emailInput.value = storedEmail;
        
        const rememberButton = document.getElementById("remember-btn");
        rememberButton.classList.add("active");
        rememberButton.classList.remove("inactive");
    }
}

window.onload = populateFormFromLocalStorage;


