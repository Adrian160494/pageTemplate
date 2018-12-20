@php
$logo = app()->make('App\Http\Model\BaneryModel')->getBanerBySlug('logo_baner');
@endphp
<div class="logo-container">
@foreach ($logo as $p)
    <img class="logo-image" src="{{$imgAdress->showImg($p->sciezka)->showOriginal()}}" alt="" />
    @endforeach
</div>