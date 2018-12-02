<style>
    .owl-carousel{
        background: #eee;
        position: fixed;
        bottom: 0;
    }
</style>
@php
   $baner= app()->make('App\Http\Model\BaneryModel')->getBanerBySlug('footer_baner');

@endphp
{{--<div class="owl-carousel owl-theme owl-loaded owl-drag">--}}
    {{--@foreach($baner as $b)--}}
    {{--<div class="item">--}}
        {{--<img src="{{$imgAdress->showImg($b->sciezka)}}"/>--}}
    {{--</div>--}}
        {{--@endforeach--}}
{{--</div>--}}