$(function() {
    'use strict';

    const _modalClassName = '.print-preview-modal';

    let _defaults = {
        content: null,
        modal: {
            backdrop: 'static'
        },
        print: {
            globalStyles: false
        }
    };

    $.PrintPreview = function (action, options) {
        switch (action.toLowerCase()) {
            case 'show':
                let settings = $.extend(true, {}, _defaults, options);
                show(settings);
                break;
            case 'hide':
                hide();
                break;
        }
    };

    $(document).on('click', '.print-preview-modal .print', function (e) {
        e.preventDefault();

        const $modal = $(_modalClassName);
        const printOptions = $(this).data('options') || {};

        $modal.find('.modal-dialog .preview-content').print(printOptions);
    });

    function show(settings) {
        const $modal = $(_modalClassName);

        $modal.find('.modal-dialog .preview-content').html(settings.content);

        // Hide if already open
        if ($modal.hasClass('show')) {
            $modal.modal('hide');
        }

        $modal.find('.print').data('options', settings.print);
        $modal.modal(settings.modal);
    }

    function hide() {
        const $modal = $(_modalClassName);

        $modal.find('.modal-dialog .preview-content').empty();
        $modal.modal('hide');
    }
});