<div class="form-container">
    <div class="row header" style="">
        <h1><?php echo $header; ?></h1>
        <h3><?php echo $headerText; ?></h3>
    </div>
    <div class="row body">
       <?php echo Form::open(['url' => $url]) ?>
           <?php //dump($form);die; ?>
               <ul>
                   @foreach($form as $f)
                   @foreach($f as $k => $v)

                       @if($v['type'] == 'textarea')
                           <li><div class="divider"></div></li>
                           @endif

                       @if($v['type'] == 'text')
                               <li>
                           <p class="left">
                               <label for="{{$v['name']}}">{{$v['label']}}</label>
                               {{ Form::text($v['name'],$v['value'],['class'=>$v['class']]) }}
                           </p>
                               </li>
                       @elseif($v['type'] == 'password')
                           <li>
                               <label for="{{$v['name']}}">{{$v['label']}}</label>
                               {{ Form::password($v['name'],$v['value'],['class'=>$v['class']]) }}
                           </li>
                       @elseif($v['type'] == 'submit')
                           <p class="left submit-area">
                               <li>
                               {{ Form::submit($v['name'],['class'=>$v['class']]) }}
                               <small>or press <strong>enter</strong></small>
                               </li>
                           </p>
                       @elseif($v['type'] == 'textarea')
                               <li>
                           <p class="left">
                               <label for="{{$v['name']}}">{{$v['label']}}</label>
                               {!! Form::textarea($v['name'],null, array('class'=>$v['class'],'rows' => $v['rows'], 'cols' => $v['cols'])) !!}
                           </p>
                               </li>
                       @elseif($v['type'] == 'checkbox')
                           <div class="col-md-9">
                               {{ Form::checkbox($v['name']) }}
                           </div>
                       @elseif($v['type'] == 'hidden')
                           <div class="col-md-9">
                               {{ Form::hidden($v['name'],$v['value']) }}
                           </div>
                       @elseif($v['type'] == 'select')
                           <div class="col-md-9">
                               {{ Form::select($v['name'], $v['values'],$v['default']) }}
                           </div>
                       @endif
                @endforeach
                   @endforeach
                       <li class="errors">
                           @foreach($errors->all() as $error)
                               <span>{{$error}}</span>
                           @endforeach
                       </li>
               </ul>
           </div>

       <?php echo Form::close() ?>
   </div>

