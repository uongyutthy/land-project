<div class="tab-pane fade" id="gin-report" role="tabpanel" aria-labelledby="gin-report-tab">
<h4 class="title">@lang('report.gin')</h4>
    <hr>
    <form action="{{ route('reports.gin') }}" method="get" class="form-horizontal" id="gin-report-form">
        <div class="row">
            @include('reports.template.include.project-selectbox', ["projectElementId"=>'gin-project',"projects"=>$projects])
            <div class="col-4">
                <div class="form-group">
                    <label for="gin-date" class="control-label">@lang('report.date')*</label>
                    <input type="text" class="form-control date-range" id="gin-date">
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                    <label for="gin-type" class="control-label">@lang('gin.gin_type')*</label>
                    <select class="form-control" id="gin-type">
                        <option value="0">@lang('report.all')</option>
                        <option value="1">Value A</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                @can('generate-gin-report')
                <button type="button" class="btn btn-primary generate-report">@lang('report.generate-report')</button>
                @endcan
                @can('export-gin-report')
                <button data-url="{{ route('reports.gin_export') }}" class="btn btn-success export-report">@lang('report.export-excel')</button>
                @endcan
            </div>
        </div>
    </form>
</div>

@push('scripts')
    <script>
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
    </script>

@endpush