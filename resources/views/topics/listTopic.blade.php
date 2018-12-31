<div class="list-of-topics">
    <div class="header">
        <h2>Lista dostępnych tematów</h2>
    </div>
    <?php $i=1; ?>
    @foreach ($list as $l)
    <div class="list-element">
        <a href="{{url()->route('show_post',array('title'=>$l->title,'id'=>$l->id))}}">{{$i++}}.{{$l->title}}</a>
    </div>

        @endforeach

</div>