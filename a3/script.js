const urlParams = new URLSearchParams(window.location.search);
const selectedMovie = urlParams.get('movie');

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
          });
          
          navLinks[index].classList.add('active');
        }
      });
    });
  });
  

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


function rememberMe(event) {
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
    event.preventDefault();
  
    localStorage.removeItem('name');
    localStorage.removeItem('mobile');
    localStorage.removeItem('email');
  
    document.getElementById('name').value = '';
    document.getElementById('mobile').value = '';
    document.getElementById('email').value = '';
  
    document.getElementById('remember-btn').classList.remove('active');
    document.getElementById('remember-btn').classList.add('inactive');
    document.getElementById('forget-btn').classList.add('active');
    document.getElementById('forget-btn').classList.remove('inactive');
  }
  
  document.addEventListener('DOMContentLoaded', function() {
    const nameInput = document.getElementById('name');
    const mobileInput = document.getElementById('mobile');
    const emailInput = document.getElementById('email');
  
    if (localStorage.getItem('name')) {
      nameInput.value = localStorage.getItem('name');
      mobileInput.value = localStorage.getItem('mobile');
      emailInput.value = localStorage.getItem('email');
  
      document.getElementById('remember-btn').classList.add('active');
      document.getElementById('remember-btn').classList.remove('inactive');
      document.getElementById('forget-btn').classList.remove('active');
      document.getElementById('forget-btn').classList.add('inactive');
    }
  });
  
  document.getElementById('remember-btn').addEventListener('click', rememberMe);
  document.getElementById('forget-btn').addEventListener('click', forgetMe);
  