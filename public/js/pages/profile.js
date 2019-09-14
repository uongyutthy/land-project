'use strict';

$(function () {
    $('#profile-form').validate({
        rules: {
            password_confirmation: {
                equalTo: '#new-password'
            }
        },
        messages: {
            password_confirmation: {
                equalTo: Lang.get('user.confirm_password_not_match')
            }
        },
        submitHandler: function (form) {
            $.LoadingOverlay('show');
            $(form).ajaxSubmit({
                dataType: 'json',
                success: response => {
                    $.LoadingOverlay('hide');

                    if (response.status) {
                        $.alertSuccess(response.message);
                        location.reload();
                    }

                    $.alertFails(response.errors);

                },
                error: error => {
                    $.LoadingOverlay('hide');
                    $.alertFail(error.responseJSON.message);
                }
            });
            return false;
        }
    });
});