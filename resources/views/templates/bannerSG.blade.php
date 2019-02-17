@php
    $banerSG = app()->make('App\Http\Model\BaneryModel')->getBanerBySlug('sg_baner');
@endphp
<div class="top-panel">
  <div class="col-md-8">
  </div>
    <div class="col-md-4 text-right">
        <?php $user = Session::get('authUser'); ?>
        @if(Session::get('authUser'))
            <div class="logged-user">
                <p>Zalogowano jako: {{ $user->name }} <a href="{{url()->route('logout')}}">Wyloguj</a> </p>
            </div>
        @else
            <div class="login-content">

            </div>
        @endif
    </div>
</div>
<div id="banner">
    <div class="banner-carousel owl-carousel">
        @foreach($banerSG as $b)
            <div>
                <img src="{{$imgAdress->showImg($b->sciezka)->setSize(1920,400)->setFit()->show()}}"/>
            </div>
            @endforeach
    </div>
</div>

<script>
    $(document).ready(function () {
        $.ajax({
            url: "{{url()->route('login')}}",
        }).done(function (response) {
            $('.login-content').html(response);
        })
        $('.banner-carousel').owlCarousel({
           loop:true,
            items:1,
            autoplay:true,
            autoplayTimeout: 6000,
        });
    })
</script>