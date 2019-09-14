'use strict';

$(function () {
    const $userForm = $('.user-form');

    $('#choose-photo').on('click', e => {
        e.preventDefault();
        $('#profile-picture-input').click();
    });

    $('#profile-picture-input').on('change', e => {
        const reader = new FileReader();
        const file = e.target.files[0];

        reader.onload = e => {
            $('#profile-picture').attr('src', e.target.result);
            $userForm.find('[name=_remove_profile_picture]').remove();
        };

        reader.readAsDataURL(file);
    });

    $('#remove-photo').on('click', e => {
        e.preventDefault();
        const $input = $('#profile-picture-input');

        $input.replaceWith($input.val('').clone(true));
        $('#profile-picture').attr('src', AVATAR_PLACEHOLDER);
        $userForm.find('[name=_remove_profile_picture]').remove();
        $userForm.append('<input type="hidden" name="_remove_profile_picture" />');
    });

    $('#user-form').validate({
        rules: {
            password_confirmation: {
                equalTo: '#password'
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
                        window.location = app.baseUrl + `/users/${response.data.id}`;
                    }
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
