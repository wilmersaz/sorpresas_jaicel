//== Class Definition
var SnippetLogin = function() {

    var login = $('#m_login');

    var showErrorMsg = function(form, type, msg) {
        var alert = $('<div class="m-alert m-alert--outline alert alert-' + type + ' alert-dismissible" role="alert">\
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>\
			<span></span>\
		</div>');

        form.find('.alert').remove();
        alert.prependTo(form);
        //alert.animateClass('fadeIn animated');
        alert.find('span').html(msg);
    }

    //== Private Functions

    var displaySignUpForm = function() {
        login.removeClass('m-login--forget-password');
        login.removeClass('m-login--signin');

        login.addClass('m-login--signup');
        //login.find('.m-login__signup').animateClass('flipInX animated');
    }

    var displaySignInForm = function() {
        login.removeClass('m-login--forget-password');
        login.removeClass('m-login--signup');

        login.addClass('m-login--signin');
        //login.find('.m-login__signin').animateClass('flipInX animated');
    }

    var displayForgetPasswordForm = function() {
        login.removeClass('m-login--signin');
        login.removeClass('m-login--signup');

        login.addClass('m-login--forget-password');
        //login.find('.m-login__forget-password').animateClass('flipInX animated');
    }

    var handleFormSwitch = function() {
        $('#m_login_forget_password').click(function(e) {
            e.preventDefault();
            displayForgetPasswordForm();
        });

        $('#m_login_forget_password_cancel').click(function(e) {
            e.preventDefault();
            displaySignInForm();
        });

        $('#m_login_signup').click(function(e) {
            e.preventDefault();
            displaySignUpForm();
        });

        $('#m_login_signup_cancel').click(function(e) {
            e.preventDefault();
            displaySignInForm();
        });
    }

    var handleSignInFormSubmit = function() {
        $('#m_login_signin_submit').click(function(e) {
            e.preventDefault();
            var btn = $(this);
            var form = $(this).closest('form');
            form.validate({
                rules: {
                    username: {
                        required: true,
                    },
                    password: {
                        required: true
                    }
                },
                messages: {
                    password: "Introduzca una contraseña valida",
                    username: "Introduzca un nombre de usuario",
                }
            });
            if (!form.valid()) {
                return;
            }
            btn.addClass('m-loader m-loader--right m-loader--light').html('Un momento..').attr('disabled', true);
            form.ajaxSubmit({
                url: form.action,
                success: function(response, status, xhr, $form) {
                    btn.addClass('m-loader m-loader--right m-loader--light').html('Cargando interfaz...').attr('disabled', true);
                    // similate 2s delay
                    location.reload();
                },
                error: function(response, status, xhr, $form) {
                        btn.removeClass('m-loader m-loader--right m-loader--light').html('Iniciar Sesión').attr('disabled', false);
                        showErrorMsg(form, 'danger', 'Nombre de usuario o contraseña incorrecta. Inténtalo de nuevo.');

                }
            });
        });
    }

    var handleForgetPasswordFormSubmit = function() {
        $('#m_login_forget_password_submit').click(function(e) {
            e.preventDefault();

            var btn = $(this);
            var form = $(this).closest('form');

            form.validate({
                rules: {
                    email: {
                        required: true,
                        email: true
                    }
                },
                messages: {
                    email: {
                        required: "Introduce tu correo electrónico",
                        email: "Por favor, introduce una dirección de correo electrónico válida.",
                    }
                }
            });

            if (!form.valid()) {
                return;
            }

            btn.addClass('m-loader m-loader--right m-loader--light').attr('disabled', true);

            form.ajaxSubmit({
                url: form.action,
                success: function(response, status, xhr, $form) {
                    // similate 2s delay
                    setTimeout(function() {
                        if(response.errors){
                            btn.removeClass('m-loader m-loader--right m-loader--light').attr('disabled', false); // remove
                            showErrorMsg(form, 'danger', 'El correo no corresponde a ninguna cuenta asociada.');
                        }else{
                            btn.removeClass('m-loader m-loader--right m-loader--light').attr('disabled', false); // remove
                            form.clearForm(); // clear form
                            form.validate().resetForm(); // reset validation states

                            // display signup form
                            displaySignInForm();
                            var signInForm = login.find('.m-login__signin form');
                            signInForm.clearForm();
                            signInForm.validate().resetForm();
                            showErrorMsg(signInForm, 'success', 'Hemos enviado la nueva contraseña a la cuenta de correo.');
                        }

                    }, 2000);
                },
                error: function(response, status, xhr, $form) {
                    // similate 2s delay
                    btn.removeClass('m-loader m-loader--right m-loader--light').attr('disabled', false); // remove
                    showErrorMsg(form, 'danger', 'El correo no corresponde a ninguna cuenta asociada.');
                }
            });
        });
    }

    //== Public Functions
    return {
        // public functions
        init: function() {
            handleFormSwitch();
            handleSignInFormSubmit();
            handleSignUpFormSubmit();
            handleForgetPasswordFormSubmit();
        }
    };
}();

//== Class Initialization
jQuery(document).ready(function() {
    SnippetLogin.init();
});