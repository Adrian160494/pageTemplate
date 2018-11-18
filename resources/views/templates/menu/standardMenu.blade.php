<?php if($menuPositions): ?>
<nav class="navbar navbar-default navigation">
    <ul class="nav navbar-nav">
        @foreach ($menuPositions as $p)
            <li class="<?php if(count($p->childs)>0){ echo "dropdown";} else { echo "nav-item";} ?>">
                <?php if(count($p->childs)>0): ?>
                <p class="dropdown-toggle" data-toggle="dropdown">{{$p->nazwa}}</p>
                <span class="caret"></span>
                <?php else: ?>
                <a href="{{$p->url}}"> <p>{{$p->nazwa}}</p></a>
                <?php endif; ?>
                @if($p->childs)
                    <ul class="dropdown-menu">
                        @foreach ($p->childs as $r)
                            <li class="nav-item <?php if(count($r->childs)>0){ echo "dropdown2";} ?>">
                                <?php if(count($r->childs)>0): ?>
                                <p class="dropdown-toggle" data-toggle="dropdown2">{{$r->nazwa}}</p>
                                <span class="caret"></span>
                                <?php else: ?>
                                <a href="{{$r->url}}"> <p>{{$r->nazwa}}</p></a>
                                <?php endif; ?>
                                @if($r->childs)
                                    <ul class="dropdown-menu">
                                        @foreach ($r->childs as $t)
                                            <li class="nav-item <?php if(count($t->childs)>0){ echo "dropdown3";} ?>">
                                                <p class="dropdown-toggle" data-toggle="dropdown3">{{$t->nazwa}}</p>

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
</nav>
<?php endif; ?>
