@extends('layouts.main')

@section('content')
    <div class="post-content col-md-12 pad">
        <div class="col-md-12 pad">
            <div class="col-md-6 pad">
                <h1>{{$post->title}}</h1>
            </div>
            <div class="col-md-3 pad text-right">
                <p class="head_style">
                    Kategoria: {{$post->category}}
                </p>
            </div>
            <div class="col-md-3 pad text-right">
                <p class="head_style">
                    Autor: {{$post->author}}
                </p>

            </div>
        </div>
        <div class="col-md-12 divider"></div>
        <div class="post-description col-md-12">
            <?php echo $post->description; ?>
        </div>
    </div>
    <div class=" comments col-md-12 pad">
        <div class="col-md-12 divider"></div>
        <h4>Dodaj komentarz</h4>
        <form action="{{url()->route('add-comment',array('id_post'=>$post->id))}}" method="POST">
            <div class="col-md-12">
                <div class="col-md-1">
                    <div class="photo-wrapper">
                        <div class="photo">
                            <img src="/images/user.png"/>
                        </div>
                        @if(Session::get('authUser'))
                            <label class="text-center">{{Session::get('authUser')->name}}</label>
                        @else
                            <label class="text-center">Gość</label>
                        @endif
                    </div>
                </div>
                <div class="col-md-10">
                    <input name="_token" type="hidden" value="{{csrf_token()}}"/>
                    <textarea name="content" class="custom-form-input"></textarea>
                </div>
                <div class="col-md-1">
                    <button style="margin: 0;" type="submit" class="btn btn-submit">Dodaj</button>
                </div>
            </div>
        </form>
        <div class="col-md-12 pad">
            <div class="col-md-12">
                <h2>Komentarze</h2>
            </div>
            @foreach($comments as $c)
                <div class="col-md-12 pad comment-element">
                    <div class="col-md-12 pad comment-top-panel">
                        <div class="col-md-2 date">
                            <p>
                                Dodno :{{$c->add_date}}
                            </p>
                        </div>
                        <div class="col-md-6 text-right">
                            <p>

                            </p>
                        </div>
                        <div class="col-md-4 author text-right">
                            <p>
                               Autor: {{$c->author}}
                            </p>
                        </div>
                    </div>
                    <div class="col-md-12 pad">
                        <div class="col-md-2 photo-wrapper">
                            <div class="photo">
                                <img src="/images/user.png"/>
                            </div>
                        </div>
                        <div class="col-md-10">
                            {{$c->content}}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>


@endsection



