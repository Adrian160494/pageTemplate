<!DOCTYPE HTML>
<html>
<head>
    <meta name="viewport" content="width=device-width; initial-scale=1.0"/>
    <title>TEST</title>
    <link rel="stylesheet" href="/css/bootstrap.css" />
    @include('layouts.parts.head')
</head>
<body>
<div id="container">
    @include('templates.bannerSG')
    <!-- Begin Top Menu -->
@include('layouts.parts.header')
    <!-- End Top Menu -->
    <div id="sidebar-a"> <img class="border" src="images/image01.jpg" alt="" />
        <h2>Links</h2>
        <div class="menu">
            <ul>
                <li><a href="#">Snapp Happy</a></li>
                <li><a href="#">OWD</a></li>
                <li><a href="#">Andreas Viklund</a></li>
                <li><a href="#">James Koster</a> </li>
                <li><a href="#">OSWD</a></li>
                <li><a href="#">CSS play</a></li>
                <li><a href="#">Listamatic</a> </li>
            </ul>
        </div>
        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Suspendisse a tortor. Pellentesque sollicitudin, ante nec posuere tempus, arcu lectus vehicula mi, ac rhoncus lorem turpis sed sapien. Pellentesque egestas. Ut eros massa, dignissim at, auctor vitae, consectetuer ut, felis. Ut tincidunt sem in ipsum. </p>
    </div>
    <div id="sidebar-b">
        <h3>Information</h3>
        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Suspendisse a tortor. Pellentesque sollicitudin, ante nec posuere tempus, arcu lectus vehicula mi, ac rhoncus lorem turpis sed sapien. Pellentesque egestas. Ut eros massa, dignissim at, auctor vitae, consectetuer ut, felis. Ut tincidunt sem in ipsum. </p>
        <h3>Gallery</h3>
        <img class="border" src="images/image02.jpg" alt="" />
        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Suspendisse a tortor. </p>
    </div>
    <div id="content">
        <h2>Introduction</h2>
        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Suspendisse a tortor. Pellentesque sollicitudin, ante nec posuere tempus, arcu lectus vehicula mi, ac rhoncus lorem turpis sed sapien. Pellentesque egestas. Ut eros massa, dignissim at, auctor vitae, consectetuer ut, felis. Ut tincidunt sem in ipsum. </p>
        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Suspendisse a tortor. Pellentesque <a href="#">sollicitudin</a>, ante nec posuere tempus, arcu lectus vehicula mi, ac rhoncus lorem turpis sed sapien. Pellentesque egestas. Ut eros massa, dignissim at, auctor vitae, consectetuer ut, felis. Ut tincidunt sem in ipsum. </p>
        <p><img class="imgleft" src="images/image02.jpg" alt="" />Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Suspendisse a tortor. Pellentesque sollicitudin, ante nec posuere tempus, arcu lectus vehicula mi, ac rhoncus lorem turpis sed sapien. Pellentesque <a href="#">egestas</a>. Ut eros massa, dignissim at, auctor vitae, consectetuer ut, felis. Ut tincidunt sem in ipsum. </p>
        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Suspendisse a tortor. Pellentesque sollicitudin, ante nec posuere tempus, arcu lectus vehicula mi, ac rhoncus lorem turpis sed sapien. Pellentesque egestas. Ut eros massa, dignissim at, auctor vitae, consectetuer ut, felis. Ut tincidunt sem in ipsum. </p>
        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Suspendisse a tortor. Pellentesque sollicitudin, ante nec posuere tempus, arcu lectus vehicula mi, ac rhoncus lorem turpis sed sapien. Pellentesque egestas. Ut eros massa, dignissim at, auctor vitae, consectetuer ut, felis. Ut tincidunt sem in ipsum. </p>
        <div class="intro">
            <h3>Article One</h3>
            <p class="update"> Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Integer imperdiet, eros et cursus pharetra, nulla ante fermentum magna, eget rutrum mi urna in purus.</p>
        </div>
        <div class="intro2">
            <h3>Article Two</h3>
            <p class="update"> Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Integer imperdiet, eros et cursus pharetra, nulla ante fermentum magna, eget rutrum mi urna in purus. </p>
        </div>
        <div class="intro3">
            <h4>News &amp; Updates</h4>
            <p class="update"> Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Integer imperdiet, eros et cursus pharetra, nulla ante fermentum magna, eget rutrum mi urna in purus.</p>
        </div>
    </div>
    <div id="footer"><a href="#">homepage</a> | <a href="#">contact</a> | <a href="http://validator.w3.org/check?uri=referer">xhtml</a> | <a href="http://jigsaw.w3.org/css-validator">css</a>|  &copy; 2006 Anyone |  Design by <a href="http://www.mitchinson.net"> www.mitchinson.net</a> | </div>
</div>

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