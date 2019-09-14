'use strict'
$(function () {
    //Ajax Setup
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // Form Validation
    $.validator.setDefaults({
        errorClass: 'is-invalid',
        errorPlacement: ($error, $element) => {
            const $parent = $element.closest('.form-group');

            if ($parent.length > 0) {
                $parent.append($error);
            } else {
                $error.insertAfter($element);
            }
        }
    });

    // Toast
    $.extend($.toast.options, {
        'position': 'top-right'
    });

    // Loading overlay
    $.LoadingOverlaySetup({
        image: '',
        custom: '<div class="lds-ring"><div></div><div></div><div></div><div></div></div>'
    });

    $('.date').datepicker({
        format: "yyyy-mm-dd",
        orientation: "bottom left",
        autoclose: true
    })
});