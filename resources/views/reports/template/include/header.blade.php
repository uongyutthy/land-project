<table style="width: 100%">
    <tr>
        <td style="width: 20%">
            <img src="{{ url('/img/avatars/logo_the.png') }}" style="width: 110px; height: 50px;" />
        </td>
        <td style="text-align: center;">
            <h4 style="font-weight: bold; margin: 0;">Total Home Enterprise</h4>
            <h5 style="font-weight: bold; margin: 0;">{{ $title }}</h5>
            @if(isset($projectName))
                <p style="margin:0; padding:0;">@lang('report.project-name'): {{ $projectName  }}</p>
            @endif
            <p style="margin:0; padding:0;">@lang('report.date'): {{ $startDate }}  @if(isset($endDate)) - {{ $endDate }} @endif</p>
        </td>
        <td style="width: 20%"></td>
    </tr>
    <tr>
        <td><br></td>
    </tr>
</table>
