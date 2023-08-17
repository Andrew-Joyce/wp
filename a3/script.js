document.addEventListener('DOMContentLoaded', function () {
    const sections = document.querySelectorAll('article');
    const navLinks = document.querySelectorAll('.nav-section');
    const sessions = document.querySelectorAll('.session');
    const ticketInputs = document.querySelectorAll('input[type="number"]');
    const rememberBtn = document.getElementById('remember-btn');
    const forgetBtn = document.getElementById('forget-btn');
    const nameInput = document.getElementById('name');
    const mobileInput = document.getElementById('mobile');
    const emailInput = document.getElementById('email');

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

    sessions.forEach(session => {
        session.addEventListener('click', function (e) {
            sessions.forEach(innerSession => {
                innerSession.classList.remove('selected');
            });

            e.currentTarget.classList.add('selected');
            updateTotalPrice();
        });
    });

    ticketInputs.forEach(input => {
        input.addEventListener('input', updateTotalPrice);
    });

    if (rememberBtn && forgetBtn) {
        rememberBtn.addEventListener('click', rememberMe);
        forgetBtn.addEventListener('click', forgetMe);

        if (localStorage.getItem('name')) {
            nameInput.value = localStorage.getItem('name');
            mobileInput.value = localStorage.getItem('mobile');
            emailInput.value = localStorage.getItem('email');

            rememberBtn.classList.add('active');
            rememberBtn.classList.remove('inactive');
            forgetBtn.classList.remove('active');
            forgetBtn.classList.add('inactive');
        }
    }

    rememberBtn.addEventListener('click', function (event) {
        event.preventDefault();

        const name = nameInput.value;
        const mobile = mobileInput.value;
        const email = emailInput.value;

        localStorage.setItem('name', name);
        localStorage.setItem('mobile', mobile);
        localStorage.setItem('email', email);

        toggleButton(rememberBtn);
        toggleButton(forgetBtn);
    });

    forgetBtn.addEventListener('click', function (event) {
        event.preventDefault();

        localStorage.removeItem('name');
        localStorage.removeItem('mobile');
        localStorage.removeItem('email');

        toggleButton(forgetBtn);
        toggleButton(rememberBtn);
    });

    updateTotalPrice();
});

function toggleButton(button) {
    var otherButton;

    if (button.id === 'remember-btn') {
        otherButton = document.getElementById('forget-btn');
    } else {
        otherButton = document.getElementById('remember-btn');
    }

    button.classList.add('active');
    button.classList.remove('inactive');

    otherButton.classList.remove('active');
    otherButton.classList.add('inactive');

    return false;
}

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
  
  
 
