$(function() {
    const $ginForm = $('#gin-report-form');

    $ginForm.on('click', '.generate-report', e => {
        const date = $('#gin-date').data('daterangepicker');
        const project = $('#gin-project');
        const ginType = $('#gin-type');
        $.ajax({
            url: $ginForm.attr('action'),
            data: {
                ginType: ginType.val(),
                projectId: project.val(),
                startDate: moment(date.startDate).format('YYYY-MM-DD'),
                endDate: moment(date.endDate).format('YYYY-MM-DD')
            },
            success: function (response) {
                $.PrintPreview('show', {
                    content: response //HTML content
                });
            },
            error: function (err) {

            }
        });
    });

    $ginForm.on('click', '.export-report', e => {
        e.preventDefault();
        var url = $ginForm.find('.export-report').data('url');
        const date = $('#gin-date').data('daterangepicker');
        const project = $('#gin-project');
        const ginType = $('#gin-type');

        var data = {
            ginType: ginType.val(),
            projectId: project.val(),
            startDate: moment(date.startDate).format('YYYY-MM-DD'),
            endDate: moment(date.endDate).format('YYYY-MM-DD')
        };
        window.location  = url + '?' + $.param(data);
    });

});
