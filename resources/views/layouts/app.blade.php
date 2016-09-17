<!DOCTYPE html>
<html lang="Zh_cn" xmlns:v-on="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="{{ $author or '' }}">
    <title>@yield('title') {{ $site_title or '' }} </title>
    <meta name="keywords" content="{{ $site_keywords or '' }}">
    <meta name="description" content="@yield('description') {{ $site_description or '' }}">
    <meta property="og:type" content="website">
    <meta property="og:title" content="{{ $site_title or '' }}">
    <meta property="og:site_name" content="{{ $site_title or '' }}">
    <meta property="og:description" content="{{ $site_description or '' }}">
    <meta name="theme-color" content="#607D8B">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="//cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link href="//cdn.bootcss.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">
    <meta http-equiv="x-pjax-version"
          content="{{ (isset($site_css) && $site_css) ? $site_css : elixir('css/app.css') }}">

    @if(isset($site_css) && $site_css)
        <link href="{{ $site_css }}" rel="stylesheet">
    @else
        <link href="{{ elixir('css/app.css') }}" rel="stylesheet">
    @endif
    @yield('css')
    <script>
        window.Laravel = <?php echo json_encode([
                'csrfToken' => csrf_token(),
                'duoshuo_enable' => isset($duoshuo_enable) && $duoshuo_enable == 'true',
        ]); ?>
    </script>
    @include('widget.google_analytics')
</head>
<body id="lufficc-pjax-container">
@include('layouts.header')
<div id="content-wrap">
    <div class="container">
        @include('partials.errors')
        @include('partials.success')
        @yield('content')
    </div>
</div>
@include('layouts.footer')
<script>var duoshuoQuery = {short_name: "{{ $duoshuo_short_name or '' }}"};</script>
@if(isset($site_js) && $site_js)
    <script src="{{ $site_js }}"></script>
@else
    <script src="{{ elixir('js/app.js') }}"></script>
@endif
@yield('script')
</body>
</html>
