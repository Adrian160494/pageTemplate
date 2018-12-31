<!DOCTYPE HTML>
<html>
<head>
    <meta name="viewport" content="width=device-width; initial-scale=1.0"/>
    <title>TEST</title>
    <link rel="stylesheet" href="/css/bootstrap.css" />
    @include('layouts.parts.head')
</head>
<body>
@include('messages.messages')
<div id="container">
    @include('templates.bannerSG')
    <!-- Begin Top Menu -->
@include('layouts.parts.header')
    <!-- End Top Menu -->
    <div id="sidebar-a">
        @include('templates.banner-logo')
        <h2>Ostatnie tematy</h2>
        <div class="menu">
            <ul>
                <?php $posts = app()->make('PostHelper')->getLastPosts(); ?>
                @foreach($posts as $p)
                    <li><a href="{{url()->route('show_post',array('title'=>$p->title,'id'=>$p->id))}}">{{$p->title}}</a></li>
                    @endforeach
            </ul>
        </div>
            <?php $banerPrawy = app()->make('App\Http\Model\BaneryModel')->getBanerBySlug('baner___lewa_kolumna'); ?>
            @foreach($banerPrawy as $b)
                <p>{{$b->opis}}</p>
                @endforeach
    </div>
    <div id="sidebar-b">
        <h3>Information</h3>
        <?php $banerLewy = app()->make('App\Http\Model\BaneryModel')->getBanerBySlug('baner__prawa_kolumna___information'); ?>
        @foreach($banerLewy as $b)
            <p>{{$b->opis}}</p>
        @endforeach
        <h3>Gallery</h3>
        <img class="border" src="images/image02.jpg" alt="" />
        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Suspendisse a tortor. </p>
    </div>
        <div id="content">
            <div class="col-md-12 pad content-all">
                <?php if(isset($content)): ?>
            <?php echo $content; ?>
            <?php endif; ?>
                @yield('content')
            </div>
        </div>
    <div id="footer"><a href="#">homepage</a> | <a href="#">contact</a> | <a href="http://validator.w3.org/check?uri=referer">xhtml</a> | <a href="http://jigsaw.w3.org/css-validator">css</a>|  &copy; 2006 Anyone |  Design by <a href="http://www.mitchinson.net"> www.mitchinson.net</a> | </div>
</div>

    <script src="/js/bootstrap.js"></script>
        @include('layouts.parts.footerContent')
        @include('layouts.parts.footer')
</body>
</html>