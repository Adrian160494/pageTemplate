@php
    $banerSG = app()->make('App\Http\Model\BaneryModel')->getBanerBySlug('sg_baner');
@endphp
<div id="banner">
    <img src="{{$imgAdress->showImg($banerSG[0]->sciezka)->setSize(1900,175)}}"/>
</div>