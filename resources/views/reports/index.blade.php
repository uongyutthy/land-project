@extends('layouts.app')

@section('content')
    <div class="row" id="report-wrapper">
        <div class="col-4">
            <div class="card">
                <div class="card-body">
                    <nav class="nav flex-column">
                        @canany(['generate-gin-report', 'export-gin-report'])
                            <a class="nav-link" data-toggle="tab" href="#gin-report" role="tab" aria-controls="gin-report" aria-selected="false">@lang('report.gin')</a>
                        @endcanany
                    </nav>
                </div>
            </div>
        </div>
        <div class="col-8">
            <div class="card">
                <div class="card-body">
                    <div class="tab-content">
                        @canany(['generate-gin-report', 'export-gin-report'])
                            @include('reports.filter-gin-report')
                        @endcanany
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('print-preview')
@endsection

@push('css')
    <link rel="stylesheet" href="{{ asset('vendor/daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('css/print-preview-modal.css') }}">
    <link rel="stylesheet" href="{{ asset('css/pages/report.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('vendor/jquery-print/jQuery.print.js') }}"></script>
    <script src="{{ asset('js/print-preview-modal.js') }}"></script>
    <script src="{{ asset('vendor/daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('js/pages/reports/report.js') }}"></script>

    <script>
        $(function () {
            $('#report-wrapper input.date-range').daterangepicker();
            $('#report-wrapper select.select2').select2({
                placeholder: Lang.get('global.choose'),
                allowClear: true
            });
        });
    </script>
@endpush


