<!doctype html>
<html lang="{{LaravelLocalization::getCurrentLocale()}}" dir="{{LaravelLocalization::getCurrentLocale() == 'en' ? '': 'rtl'; }}">
<head>
    @include("layouts.admin.header")
    @toastr_css
</head>
<body class="{{LaravelLocalization::getCurrentLocale() == 'en' ? '': 'rtl'; }}">
    <!-- page-wrapper Start-->
    <div class="page-wrapper">
        <!-- Page Body Start-->
        <div class="page-body-wrapper">

            @include("layouts.admin.main-header")
            @include("layouts.admin.main-sidebar")

            <div class="page-body">
                @yield('content')
            </div>

            @include("layouts.admin.main-footer")

            <div class="btn-light custom-theme {{LaravelLocalization::getCurrentLocale() == 'en' ? 'rtl': ''; }}">
                {{LaravelLocalization::getCurrentLocale() == 'en' ? 'RTL': 'LTR'; }}
            </div>
        </div>
    </div>

    @include("layouts.admin.footer")
    @toastr_js
    @toastr_render
</body>
</html>
