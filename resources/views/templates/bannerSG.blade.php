@php
    $banerSG = app()->make('App\Http\Model\BaneryModel')->getBanerBySlug('sg_baner');
@endphp
<div class="top-panel">
  <div class="col-md-8">
  </div>
    <div class="col-md-4">
        <?php $user = Session::get('authUser'); ?>
        @if(Session::get('authUser'))
            <div>
                <p>Zalogowano jako: {{ $user[0]->name }} <a href="{{url()->route('logout')}}">Wyloguj</a> </p>
            </div>
        @else
            @include('templates.form.form_template_inline',array('form'=>\App\Helpers\LoginHelper::getLoginForm(),'url'=>url()->route('login')))
        @endif
    </div>
</div>
<div id="banner">
    <img src="{{$imgAdress->showImg($banerSG[0]->sciezka)->setSize(1920,400)}}"/>
</div>