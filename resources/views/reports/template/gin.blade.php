@extends('reports.template.default.default')

@section('orientation', 'landscape')

@section('header')
    @component('reports.template.include.header', [
        'title' => __('report.gin-report'),
        'startDate' => $startDate,
        'endDate' => $endDate,
        'projectName' => $projectName
    ])
    @endComponent
@endsection

@section('content')
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>@lang('report.no.')</th>
                <th>@lang('report.code')</th>
                <th>@lang('report.date')</th>
                <th>@lang('report.project')</th>
                <th>@lang('report.house-number')</th>
                <th>@lang('gin.received_by')</th>
                <th>@lang('gin.issued_by')</th>
                <th>@lang('gin.issue_purpose')</th>
                <th>@lang('gin.gin_type')</th>
                <th>@lang('report.item')</th>
                <th>@lang('report.uom')</th>
                <th>@lang('report.qty')</th>
                <th>@lang('gin.description')</th>
            </tr>
        </thead>
        <tbody>
        @foreach($data as $row)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $row->code }}</td>
                <td>{{ $row->date }}</td>
                <td>{{ $row->project }}</td>
                <td>{{ $row->house_number }}</td>
                <td>{{ $row->received_by }}</td>
                <td>{{ $row->issued_by }}</td>
                <td>{{ $row->issue_purpose }}</td>
                <td>{{ $row->gin_type }}</td>
                <td>{{ $row->item }}</td>
                <td>{{ $row->uom }}</td>
                <td>{{ $row->qty }}</td>
                <td>{{ $row->description }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection

@section('footer')
@endsection

