<div class="form-container">
    <div class="row header" style="">
        <h1><?php echo $header; ?></h1>
        <h3><?php echo $headerText; ?></h3>
    </div>
    <div class="row body">
       <?php echo Form::open(['url' => $url]) ?>
           <?php //dump($form);die; ?>
               <div class="col-md-12">
                   @foreach($form as $f)
                   @foreach($f as $k => $v)

                       @if($v['type'] == 'text')
                               <div class="col-md-12 input-wrapper">
                               <div class="col-md-2">
                                   <label for="{{$v['name']}}">{{$v['label']}}</label>
                               </div>
                              <div class="col-md-10">
                                  {{ Form::text($v['name'],$v['value'],['class'=>$v['class']]) }}
                              </div>

                               </div>
                       @elseif($v['type'] == 'password')
                           <div class="col-md-12 input-wrapper">
                               <div class="col-md-2">
                                   <label for="{{$v['name']}}">{{$v['label']}}</label>
                               </div>
                               <div class="col-md-10">
                                   {{ Form::password($v['name'],$v['value'],['class'=>$v['class']]) }}
                               </div>
                           </div>
                       @elseif($v['type'] == 'submit')
                               <div class="col-md-12 input-wrapper">
                                   <div class="col-md-6">
                                       {{ Form::submit($v['name'],['class'=>$v['class']]) }}
                                       <small>or press <strong>enter</strong></small>                                   </div>
                                   <div class="col-md-6">
                                   </div>
                               </div>
                       @elseif($v['type'] == 'textarea')
                               <div class="col-md-12 input-wrapper">
                                   <div class="col-md-2">
                                       <label for="{{$v['name']}}">{{$v['label']}}</label>
                                   </div>
                                   <div class="col-md-10">
                                       {!! Form::textarea($v['name'],null, array('class'=>$v['class'],'rows' => $v['rows'], 'cols' => $v['cols'])) !!}
                                   </div>
                               </div>
                       @elseif($v['type'] == 'checkbox')
                           <div class="col-md-9">
                               {{ Form::checkbox($v['name']) }}
                           </div>
                       @elseif($v['type'] == 'hidden')
                           <div class="col-md-9">
                               {{ Form::hidden($v['name'],$v['value']) }}
                           </div>
                       @elseif($v['type'] == 'select')
                               <div class="col-md-12 input-wrapper">
                                   <div class="col-md-2">
                                       <label for="{{$v['name']}}">{{$v['label']}}</label>
                                   </div>
                                   <div class="col-md-10">
                                       {{ Form::select($v['name'], $v['values'],$v['default'],  ['class' => $v['class']]) }}
                                   </div>
                               </div>
                       @endif
                @endforeach
                   @endforeach
                       <div class="errors">
                           @foreach($errors->all() as $error)
                               <span>{{$error}}</span>
                           @endforeach
                       </div>
               </div>
           </div>

       <?php echo Form::close() ?>
   </div>

