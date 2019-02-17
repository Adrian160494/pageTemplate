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
<div id="footer"><a href="#">Strona główna</a> | <a href="#">Kontakt</a> | <a href="http://validator.w3.org/check?uri=referer">xhtml</a> | <a href="http://jigsaw.w3.org/css-validator">css</a>|  &copy; <?php echo date("Y"); ?> A/C Web |  Design by <a href="http://www.mitchinson.net">Adrian Ciejka</a> | </div>
{{--<div class="owl-carousel owl-theme owl-loaded owl-drag">--}}
    {{--@foreach($baner as $b)--}}
    {{--<div class="item">--}}
        {{--<img src="{{$imgAdress->showImg($b->sciezka)}}"/>--}}
    {{--</div>--}}
        {{--@endforeach--}}
{{--</div>--}}