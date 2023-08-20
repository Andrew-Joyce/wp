document.addEventListener('DOMContentLoaded', function() {
  const urlParams = new URLSearchParams(window.location.search);
  const selectedMovie = urlParams.get('movie');
  const navlinks = document.getElementsByTagName('nav')[0].getElementsByTagName('a');
  const articles = document.getElementsByTagName('main')[0].getElementsByTagName('article');
  const sessionFieldsets = document.querySelectorAll('fieldset[id^="fieldset-session"]');
  const sessions = document.querySelectorAll('.session');
  const ticketInputs = document.querySelectorAll('input[type="number"]');
  const rememberButton = document.getElementById('remember-btn');
  const forgetButton = document.getElementById('forget-btn');
  const nameInput = document.getElementById('name');
  const mobileInput = document.getElementById('mobile');
  const emailInput = document.getElementById('email');

  for (var a = 0; a < articles.length; a++) {
    navlinks[a].addEventListener('click', function(event) {
      event.preventDefault();
      var targetArticleId = this.getAttribute('href');
      var targetArticle = document.querySelector(targetArticleId);
      var offsetTop = targetArticle.offsetTop;

      window.scrollTo({
        top: offsetTop,
        behavior: 'smooth'
      });

      for (var i = 0; i < navlinks.length; i++) {
        navlinks[i].classList.remove('current');
        navlinks[i].classList.remove('active');
      }

      this.classList.add('current');
      this.classList.add('active'); 

      this.style.color = 'blue';

      for (var i = 0; i < navlinks.length; i++) {
        if (navlinks[i].classList.contains('current')) {
          navlinks[i].classList.add('active');
        } else {
          navlinks[i].classList.remove('active');
        }
      }
    });
  }

  window.addEventListener('scroll', function() {
    for (var a = 0; a < articles.length; a++) {
      var arTop = articles[a].offsetTop;
      var arBot = arTop + articles[a].offsetHeight;

      if (window.scrollY >= arTop && window.scrollY < arBot) {
        navlinks[a].classList.add('current');
      } else {
        navlinks[a].classList.remove('current');
      }
    }
  });
});


sessions.forEach(function(session) {
  session.addEventListener('click', function(e) {
    sessions.forEach(function(innerSession) {
      innerSession.classList.remove('selected');
    });
    e.currentTarget.classList.add('selected');
    updateTotalPrice();
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

  function rememberMe(event) {
      event.preventDefault();

      const name = nameInput.value;
      const mobile = mobileInput.value;
      const email = emailInput.value;

      localStorage.setItem('name', name);
      localStorage.setItem('mobile', mobile);
      localStorage.setItem('email', email);

      rememberButton.classList.add('active');
      rememberButton.classList.remove('inactive');
      forgetButton.classList.remove('active');
      forgetButton.classList.add('inactive');
  }

  function forgetMe(event) {
      event.preventDefault();

      localStorage.removeItem('name');
      localStorage.removeItem('mobile');
      localStorage.removeItem('email');

      nameInput.value = '';
      mobileInput.value = '';
      emailInput.value = '';

      rememberButton.classList.remove('active');
      rememberButton.classList.add('inactive');
      forgetButton.classList.add('active');
      forgetButton.classList.remove('inactive');
  }

  if (rememberButton) {
    rememberButton.addEventListener('click', rememberMe);
  }

  if (forgetButton) {
    forgetButton.addEventListener('click', forgetMe);
  }

  if (nameInput && mobileInput && emailInput) {
    if (localStorage.getItem('name')) {
      nameInput.value = localStorage.getItem('name');
      mobileInput.value = localStorage.getItem('mobile');
      emailInput.value = localStorage.getItem('email');

      rememberButton.classList.add('active');
      rememberButton.classList.remove('inactive');
      forgetButton.classList.remove('active');
      forgetButton.classList.add('inactive');
    }
  }
});