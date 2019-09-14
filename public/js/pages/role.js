'use strict';

$(function () {
    const $roleForm = $('#role-form');

    $roleForm.validate({
        submitHandler: (form) => {
            $.LoadingOverlay('show');
            $(form).ajaxSubmit({
                dataType: 'json',
                success: response => {
                    $.LoadingOverlay('hide');
                    if (response.status) {
                        $.alertSuccess(response.message);
                        window.location = app.baseUrl + `/roles/${response.data.id}/edit`;
                    }
                },
                error: error => {
                    $.LoadingOverlay('hide');
                    $.alertFail(error.responseJSON.message);
                }
            });
            return false;
        }
    })
});