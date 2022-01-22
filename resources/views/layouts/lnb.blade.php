
<?php use App\Models\board; ?>

<ul class="sideList">
    <li><a href="#" class="one">목록</a>
        <ul class="inner">
            <li><a href="/"  class="">일반 게시판
                  @if( board::newCount() )
                        <span class="badge  " style="background:#eb2c2c" data-toggle="tooltip" title="새글" style="width:25px;height:14px;" >
                          {{ board::newCount() }}
                        </span>
                    @endif
            </a></li>

            <li><a href="/ajax"  class="">Ajax 게시판
                    @if( board::newCount() )
                        <span class="badge  " style="background:#eb2c2c" data-toggle="tooltip" title="새글" style="width:25px;height:14px;" >
                            {{ board::newCount() }}
                        </span>
                    @endif
            </a></li>

            <li><a href="/plugin"  class="">Plugin 게시판
                    @if( board::newCount() )
                        <span class="badge  " style="background:#eb2c2c" data-toggle="tooltip" title="새글" style="width:25px;height:14px;" >
                            {{ board::newCount() }}
                        </span>
                    @endif
            </a></li>

        </ul>
    </li>
</ul>
