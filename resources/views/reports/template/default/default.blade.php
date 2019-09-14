<!--
    Template with Header and Footer on all pages when print
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
            <!-- Header -->
            <thead class="page-header">
                <tr>
                    <th>@yield('header')</th>
                </tr>
            </thead>

            <!-- Content -->
            <tbody>
                <tr>
                    <td>
                        @yield('content')
                    </td>
                </tr>
            </tbody>

            <!-- Break space before page-footer -->
            <tfoot>
                <tr>
                    <td><div class="footer-space"></div></td>
                </tr>
            </tfoot>
        </table>
        <table class="page-footer">
            <tbody>
                <tr>
                    <td>@yield('footer')</td>
                </tr>
            </tbody>
        </table>
    </page>
</body>
</html>
