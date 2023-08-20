const urlParams = new URLSearchParams(window.location.search);
const selectedMovie = urlParams.get('movie');

const navLinks = document.querySelectorAll('#navbar a');

navLinks.forEach(link => {
  link.addEventListener('click', function(event) {
    navLinks.forEach(navLink => navLink.classList.remove('current'));
    link.classList.add('current');
  });
});

const sectionObserver = new IntersectionObserver(entries => {
  entries.forEach(entry => {
    if (entry.isIntersecting) {
      const targetId = entry.target.getAttribute('id');
      const correspondingNavLink = document.querySelector(`#navbar a[href="#${targetId}"]`);

      navLinks.forEach(navLink => navLink.classList.remove('current'));
      correspondingNavLink.classList.add('current');
    }
  });
    }, { threshold: 0.5 });

    const sections = document.querySelectorAll('main > div');
    sections.forEach(section => {
      sectionObserver.observe(section);
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


document.addEventListener('DOMContentLoaded', function() {
  if (window.location.pathname.endsWith('booking.php')) {
      const rememberBtn = document.getElementById('remember-btn');
      const forgetBtn = document.getElementById('forget-btn');
      const nameInput = document.getElementById('name');
      const mobileInput = document.getElementById('mobile');
      const emailInput = document.getElementById('email');

      function rememberMe(event) {
          event.preventDefault();

          const name = nameInput.value;
          const mobile = mobileInput.value;
          const email = emailInput.value;

          localStorage.setItem('name', name);
          localStorage.setItem('mobile', mobile);
          localStorage.setItem('email', email);

          rememberBtn.classList.add('active');
          rememberBtn.classList.remove('inactive');
          forgetBtn.classList.remove('active');
          forgetBtn.classList.add('inactive');
      }

      function forgetMe(event) {
          event.preventDefault();

          localStorage.removeItem('name');
          localStorage.removeItem('mobile');
          localStorage.removeItem('email');

          nameInput.value = '';
          mobileInput.value = '';
          emailInput.value = '';

          rememberBtn.classList.remove('active');
          rememberBtn.classList.add('inactive');
          forgetBtn.classList.add('active');
          forgetBtn.classList.remove('inactive');
      }

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
});

