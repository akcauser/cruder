<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Blank Page &mdash; Stisla</title>

    @include('cruder::cms.layouts.template_styles')
    @yield('page_styles')
</head>

<body>
    <div id="app">
        <div class="main-wrapper">
            @include('cruder::cms.layouts.navbar')
            @include('cruder::cms.layouts.sidebar')
            @yield('content')
            @include('cruder::cms.layouts.footer')
        </div>
    </div>
    @include('cruder::cms.layouts.template_scripts')
    @yield('page_scripts')
</body>

</html>