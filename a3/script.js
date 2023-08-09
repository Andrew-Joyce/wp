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

