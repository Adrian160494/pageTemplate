@php
    $banerSG = app()->make('App\Http\Model\BaneryModel')->getBanerBySlug('sg_baner');
@endphp
<div class="top-panel">
  <div class="col-md-8">
  </div>
    <div class="col-md-4">
        <form method="POST" class="form-inline form-horizontal">
            <input type="text" placeholder="Login"/>
            <input type="password" placeholder="Hasło"/>
            <button type="submit" class="btn-submit2">Zaloguj się</button>
        </form>
    </div>
</div>
<div id="banner">
    <img src="{{$imgAdress->showImg($banerSG[0]->sciezka)->setSize(1920,400)}}"/>
</div>