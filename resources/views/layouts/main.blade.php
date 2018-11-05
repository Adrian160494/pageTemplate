<!DOCTYPE HTML>
<html>
<head>
    <meta name="viewport" content="width=device-width; initial-scale=1.0"/>
    <title>CMS</title>
    <link rel="stylesheet" href="/css/bootstrap.css" />
    <script type="text/javascript" src="/ckeditor/ckeditor.js"></script>
    @include('layouts.parts.head')
</head>
<body>
<h1>Main template</h1>
<?php print_r($content); ?>
@yield('content')
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="/js/bootstrap.js"></script>
        @include('layouts.parts.footer')
</body>
</html>