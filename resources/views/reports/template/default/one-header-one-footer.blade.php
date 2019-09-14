<!--
    Template one Header & Footer when print
-->
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{ asset('css/printing-paper.css') }}">
    @yield('stylesheets')
</head>
<body>
<page size="A4" orientation="@yield('orientation', 'portrait')" class="@yield('page-class-name', 'with-shadow')">
    <table class="page-container">
        <thead>
            <tr>
                <th><div style="width: 100%; height: 1px;"></div></th>
            </tr>
        </thead>
        <tbody>
            <!-- Header -->
            <tr>
                <th>@yield('header')</th>
            </tr>

            <!-- Content -->
            <tr>
                <td>
                    @yield('content')
                </td>
            </tr>
        </tbody>
    </table>
    <table style="width: 100%;">
        <tbody>
            <tr>
                <td>@yield('footer')</td>
            </tr>
        </tbody>
    </table>
</page>
</body>
</html>
