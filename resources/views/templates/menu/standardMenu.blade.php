<?php if($menuPositions): ?>
    <ul id="navlist">
        @foreach ($menuPositions as $p)
            <li class="<?php if(count($p->childs)>0){ echo "dropdown";} else {} ?>">
                <?php if(count($p->childs)>0): ?>
                <span class="dropdown-toggle" data-toggle="dropdown">{{$p->nazwa}}</span>
                <span class="caret"></span>
                <?php else: ?>
                <a href="{{$p->url}}"> <span>{{$p->nazwa}}</span></a>
                <?php endif; ?>
                @if($p->childs)
                    <ul class="dropdown-menu">
                        @foreach ($p->childs as $r)
                            <li class="nav-item <?php if(count($r->childs)>0){ echo "dropdown2";} ?>">
                                <?php if(count($r->childs)>0): ?>
                                <span class="dropdown-toggle" data-toggle="dropdown2">{{$r->nazwa}}</span>
                                <span class="caret"></span>
                                <?php else: ?>
                                <a href="{{$r->url}}"> <span>{{$r->nazwa}}</span></a>
                                <?php endif; ?>
                                @if($r->childs)
                                    <ul class="dropdown-menu">
                                        @foreach ($r->childs as $t)
                                            <li class="nav-item <?php if(count($t->childs)>0){ echo "dropdown3";} ?>">
                                                <span class="dropdown-toggle" data-toggle="dropdown3">{{$t->nazwa}}</span>

                                            </li>
                                        @endforeach
                                    </ul>
                                @endif
                            </li>

                        @endforeach
                    </ul>
                @endif
            </li>
        @endforeach
    </ul>
<?php endif; ?>
