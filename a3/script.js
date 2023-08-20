document.addEventListener('DOMContentLoaded', () => {
  const urlParams = new URLSearchParams(window.location.search);
  const selectedMovie = urlParams.get('movie');
  const navLinks = document.querySelectorAll('#navbar a');
  const sections = document.querySelectorAll('main > div');

  const sessionFieldsets = document.querySelectorAll('fieldset[id^="fieldset-session"]');
  const ticketInputs = document.querySelectorAll('input[type="number"]');
  const sessionButtons = document.querySelectorAll('.session');

  const rememberBtn = document.getElementById('remember-btn');
  const forgetBtn = document.getElementById('forget-btn');
  const nameInput = document.getElementById('name');
  const mobileInput = document.getElementById('mobile');
  const emailInput = document.getElementById('email');

  navLinks.forEach(link => {
    link.addEventListener('click', function(event) {
      navLinks.forEach(navLink => navLink.classList.remove('current'));
      link.classList.add('current');
    });
  });

  sections.forEach(section => {
    if (window.location.pathname.endsWith('index.php')) {
      const sectionObserver = new IntersectionObserver(entries => {
        entries.forEach(entry => {
          if (entry.isIntersecting) {
            const targetId = entry.target.getAttribute('id');
            const correspondingNavLink = document.querySelector(`#navbar a[href="#${targetId}"]`);

            navLinks.forEach(navLink => navLink.classList.remove('current'));

            if (correspondingNavLink) {
              correspondingNavLink.classList.add('current');
            }
          }
        });
      }, { threshold: 0.5 });

      sectionObserver.observe(section);
    }
  });

  sessionFieldsets.forEach((fieldset) => {
    fieldset.style.display = 'none';
  });

  if (selectedMovie) {
    const selectedFieldset = document.getElementById(`fieldset-session-${selectedMovie}`);
    if (selectedFieldset) {
      selectedFieldset.style.display = 'block';
    }
  }

  sessionButtons.forEach(function(session) {
    session.addEventListener('click', function(e) {
      sessionButtons.forEach(function(innerSession) {
        innerSession.classList.remove('selected');
      });

      e.currentTarget.classList.add('selected');
      const selectedSession = day + '-' + time + '-' + rate;

      document.querySelector('.session.selected').setAttribute('data-session', selectedSession);
      document.querySelector('.session.selected').classList.remove('selected');
      e.currentTarget.classList.add('selected');
      
    });
  });

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

  sessionButtons.forEach(button => {
    button.addEventListener('click', event => {
      sessionButtons.forEach(btn => btn.classList.remove('selected'));
      event.currentTarget.classList.add('selected'); 
      updateTotalPrice();
    });
  });

  updateTotalPrice();

  if (window.location.pathname.endsWith('booking.php')) {

    const rememberBtn = document.getElementById('remember-btn');
    const forgetBtn = document.getElementById('forget-btn');
    const nameInput = document.getElementById('name');
    const mobileInput = document.getElementById('mobile');
    const emailInput = document.getElementById('email');

    if (localStorage.getItem('name')) {
      nameInput.value = localStorage.getItem('name');
    }
    if (localStorage.getItem('mobile')) {
      mobileInput.value = localStorage.getItem('mobile');
    }
    if (localStorage.getItem('email')) {
      emailInput.value = localStorage.getItem('email');

      rememberBtn.classList.add('active');
      rememberBtn.classList.remove('inactive');
      forgetBtn.classList.remove('active');
      forgetBtn.classList.add('inactive');
    }

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

      forgetBtn.classList.add('active');
      forgetBtn.classList.remove('inactive');
      rememberBtn.classList.remove('active');
      rememberBtn.classList.add('inactive');
    }

    rememberBtn.addEventListener('click', rememberMe);
    forgetBtn.addEventListener('click', forgetMe);
  }
});