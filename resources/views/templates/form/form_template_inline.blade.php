        <?php echo Form::open(['url' => $url]) ?>
        @foreach($form as $f)
                @foreach($f as $k => $v)
                    @if($v['type'] == 'label')
                            {{ Form::label($v['name'],$v['hint'],['class'=>$v['class']]) }}
                    @elseif($v['type'] == 'text')
                            {{ Form::text($v['name'],$v['value'],['class'=>$v['class'],'placeholder'=>$v['label']]) }}
                    @elseif($v['type'] == 'password')

                            {{ Form::password($v['name'],$v['value'],['class'=>$v['class'],'placeholder'=>$v['label']]) }}

                    @elseif($v['type'] == 'textarea')

                            {{ Form::submit($v['name'],['class'=>$v['class']]) }}

                    @elseif($v['type'] == 'submit')
                            {{ Form::submit($v['name'],['class'=>$v['class']]) }}
                    @elseif($v['type'] == 'checkbox')

                            {{ Form::checkbox($v['name']) }}

                    @elseif($v['type'] == 'hidden')
                        <div class="col-md-9">
                            {{ Form::hidden($v['name'],$v['value']) }}
                        </div>
                    @elseif($v['type'] == 'select')
                        <div class="col-md-9">
                            {{ Form::select($v['name'], $v['values'],$v['default'],['class'=>$v['class']]) }}
                        </div>

                    @endif
                @endforeach
            @endforeach
        <?php echo Form::close() ?>