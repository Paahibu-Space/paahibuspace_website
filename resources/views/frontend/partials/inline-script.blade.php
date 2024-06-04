<script>

        //   Single service page side bar form
        $(document).on('submit', '.custom-form-builder-form', function(e) {
        e.preventDefault();
        var form = $(this);
        var formID = form.attr('id');
        var msgContainer = form.find('.error-message');
        var formSelector = document.getElementById(formID);
        var formData = new FormData(formSelector);
        msgContainer.html('');
        $.ajax({
            url: "{{ route('frontend.form.builder.custom.submit') }}",
            type: "POST",
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}",
            },
            beforeSend: function() {
                form.find('.ajax-loading-wrap').addClass('show').removeClass('hide');
            },
            processData: false,
            contentType: false,
            data: formData,
            success: function(data) {
                form.find('.ajax-loading-wrap').removeClass('show').addClass('hide');
                msgContainer.html('<div class="alert alert-' + data.type + '">' + data.msg +
                    '</div>');
            },
            error: function(data) {
                form.find('.ajax-loading-wrap').removeClass('show').addClass('hide');
                var errors = data.responseJSON.errors;
                var markup = '<ul class="alert alert-danger">';
                $.each(errors, function(index, value) {
                    markup += '<li>' + value + '</li>';
                })
                markup += '</ul>';
                msgContainer.html(markup);
            }
        });
    });

    
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
                _token: "{{ csrf_token() }}",
                email: email
            },
            success: function(data) {
                $('.footer-newsletter .form-message-show').html(
                    '<div class="alert alert-success">' + data.message + '</div>');
                loadingDiv.style.display = 'none'; // Hide loading message
            },
            error: function(data) {
                var errors = data.responseJSON.errors; // Assuming Laravel sends JSON errors
                var errorMessage = errors ? errors.email[0] :
                'An error occurred.'; // Handle potential missing error message
                $('.footer-newsletter .form-message-show').html('<div class="alert alert-danger">' +
                    errorMessage + '</div>');
                loadingDiv.style.display = 'none'; // Hide loading message
            }
        });
    });
</script>
