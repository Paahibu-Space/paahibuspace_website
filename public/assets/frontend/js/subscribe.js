const form = document.querySelector('.form-subscribe');
const loadingDiv = document.querySelector('.subscribing');
const errorMessageDiv = document.querySelector('.error-subscription');
const sentMessageDiv = document.querySelector('.subscription-success');

form.addEventListener('submit', (event) => {
    event.preventDefault(); // Prevent default form submission

    loadingDiv.style.display = 'block'; // Show loading message
    errorMessageDiv.style.display = 'none'; // Hide error message (if any)
    sentMessageDiv.style.display = 'none'; // Hide success message (if any)

    fetch('./forms/subscribe.php', {
        method: 'POST',
        body: new FormData(form)
    })
    .then(response => response.text())
    .then(result => {
        loadingDiv.style.display = 'none'; // Hide loading message
        if (result === 'success') {
            sentMessageDiv.style.display = 'block'; // Show success message
            // Clear form fields (optional)
            form.reset();
        } else {
            errorMessageDiv.textContent = result.split(':')[1]; // Display error message
            errorMessageDiv.style.display = 'block';
        }
    })
    .catch(error => {
        console.error('Error:', error);
        // Handle network errors or other issues
    });
});