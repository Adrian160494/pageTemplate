<!DOCTYPE HTML>
<html>
<head>
    <meta name="viewport" content="width=device-width; initial-scale=1.0"/>
    <title>TEST</title>
    <link rel="stylesheet" href="/css/bootstrap.css" />
    @include('layouts.parts.head')
</head>
<body>
@include('layouts.parts.header')
<div class="container">
    <?php echo $content; ?>
    @yield('content')
</div>
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="/js/bootstrap.js"></script>
@include('layouts.parts.footerContent')
@include('layouts.parts.footer')
</body>
</html>