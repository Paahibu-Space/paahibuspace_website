<script>
    const form = document.querySelector('.form-subscribe');
const loadingDiv = document.querySelector('.subscribing');
const errorMessageDiv = document.querySelector('.error-subscription');
const sentMessageDiv = document.querySelector('.subscription-success');
const formAction = form.action;

form.addEventListener('submit', (event) => {
    event.preventDefault();
  
    loadingDiv.style.display = 'block'; // Show loading message
  
    const email = $('.footer-newsletter input[type="email"]').val();
    $('.footer-newsletter .form-message-show').html('');
  
    $.ajax({
      url: formAction,
      type: "POST",
      data: {
        _token: "{{csrf_token()}}",
        email: email
      },
      success: function (data) {
        $('.footer-newsletter .form-message-show').html('<div class="alert alert-success">' + data.message + '</div>');
        loadingDiv.style.display = 'none'; // Hide loading message
      },
      error: function (data) {
        var errors = data.responseJSON.errors; // Assuming Laravel sends JSON errors
        var errorMessage = errors ? errors.email[0] : 'An error occurred.'; // Handle potential missing error message
        $('.footer-newsletter .form-message-show').html('<div class="alert alert-danger">' + errorMessage + '</div>');
        loadingDiv.style.display = 'none'; // Hide loading message
      }
    });
  });
  
</script>