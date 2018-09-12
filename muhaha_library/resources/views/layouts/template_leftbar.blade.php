<div class="col-md-3">
        <div class="sidebar">
            <ul class="widget widget-menu unstyled">
                <li class="active"><a href="{{ URL::route('home') }}"><i class="fa fa-home"></i>主页
                </a></li>
                <li><a href="{{ URL::route('allbook') }}"><i class="fa fa-book"></i>All </a></li>
                <li><a href="{{ URL::route('addbook') }}"><i class="fa fa-plus-square-o"></i>添加</a></li>
                <li><a href="#"><i class="fa fa-cloud-download"></i>导入</a></li>
                <!-- <li><a href="{{ URL::route('editbook') }}"><i class="fa fa-edit "></i>编辑</a></li> -->
                <li><a href="{{ URL::route('datatables') }}"><i class="fa fa-search"></i>查找</a></li>
            </ul>
            <!--/.widget-nav-->
            <ul class="widget widget-menu unstyled">
                <li><a href="{!! url('book/borrow') !!}"><i class="fa fa-reply-all"></i> 借 / 还书 </a></li>
                <li><a href="{!! url('borrow/history') !!}"><i class="fa fa-bookmark-o"></i>已借</a></li>
            </ul>
            <!--/.widget-nav-->
            <ul class="widget widget-menu unstyled">
                <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-sign-out"></i>登出 </a></li>
            </ul>
        </div>
        <!--/.sidebar-->
</div>
 <!-- /.col-md-3 -->