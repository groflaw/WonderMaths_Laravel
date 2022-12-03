var loginForm = $('form[name="mmt-form-login"]');
loginForm.find('input').on('keypress', function(e) {
    if (e.keyCode === 13) {
        loginForm.submit();
    }
});
loginForm.on('submit', function(e) {
    e.preventDefault();

    var isValid = loginForm[0].checkValidity();
    loginForm.addClass("was-validated");

    if (!isValid) {
        e.stopPropagation();
        return;
    }

    /*
    if ($("#email").val().trim() === "" || !fcAuthInit.isEmail($("#email").val().trim())) {
        fcAuthInit.setInputError($("#email"));
        return;
    }
    if ($("#password").val().trim() === "" || $("#password").val().trim().length < 8) {
        fcAuthInit.setInputError($("#password"));
        return;
    }
    */

    // $('.form-control').removeClass('is-invalid');
    // $('.help-page-error').html('');
    // $('.help-error').html('');
    // $('.fc-btn').attr('disabled', 'disabled').html('PLEASE WAIT...');

    $.ajax({
        url      : $(this).attr('action'),
        method   : $(this).attr('method'),
        data     : $(this).serialize(),
        dataType : 'json',
        success  : function(response) {
            if (response.status) {
                // $('.fc-btn').html((response.message).toUpperCase());

                setTimeout(function() {
                    window.location.href = response.redirect;
                }, 3000);
            } else {
                // $('.fc-btn').removeAttr('disabled').html('LOGIN');

                let errors = response.errors;
                if (Array.isArray(errors)) {
                    for (let key in errors) {
                        let errorDiv = $('.help-error[data-error="' + key + '"]');
                        if (errorDiv.length) {
                            errorDiv.prev('.form-control').addClass('is-invalid');
                            errorDiv.html('<i class="icon icon-warning"></i> ' + errors[key][0]);
                        }
                    }
                } else {
                    $('.help-page-error').html(errors);
                }
            }
        },
        error    : function(error) {
            // $('.fc-btn').removeAttr('disabled').html('LOGIN');

            console.log('Error messages');
            console.log(error);
        }
    });
});