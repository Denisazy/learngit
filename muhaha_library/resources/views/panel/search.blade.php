@extends('layouts.index') 

@section('content')
<style type="text/css">
    form{
        margin:0px;display:inline;
    }
</style>
        <div class="content">
            <div class="module">
                <div class="module-head">
                    <h3><i class="fa fa-search" style="font-size: 20px;"></i></h3>
                </div>
                <div class="module-body">
                                {!! Form::open(['url' => 'book/search','class' =>'form-horizontal']) !!}
                                            <div class="form-group ">
                                                            {!!Form::label('title', '书名', ['class' => 'col-md-1 control-label'])!!}
                                                            <div class="col-md-4">
                                                                        {!! Form::text('title','',['class' => 'form-control']) !!}
                                                            </div>
                                                            {!!Form::label('author', '作者', ['class' => 'col-md-1 control-label'])!!}
                                                            <div class="col-md-4">
                                                                        {!! Form::text('author','',['class' => 'form-control']) !!}
                                                            </div>
                                            </div>
                                            <div class="form-group ">
                                                            {!!Form::label('category', '分类', ['class' => 'col-md-1 control-label'])!!}
                                                            <div class="col-md-4">
                                                                        {!! Form::text('category','',['class' => 'form-control']) !!}
                                                            </div>
                                                            {!!Form::label('publisher', '出版', ['class' => 'col-md-1 control-label'])!!}
                                                            <div class="col-md-4">
                                                                        {!! Form::text('publisher','',['class' => 'form-control']) !!}
                                                            </div>
                                            </div>
                                            <div class="form-group">
                                                                            <div class="col-md-6 col-md-offset-1">
                                            {!! Form::submit('搜索',['class'=>'btn btn-info btn-block']) !!}
                                            </div></div>
                               {!! Form::close() !!}

                               <div>
                                   
                               </div>
                               <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th class="">ID</th>
                                                        <th class="title">书名</th>
                                                        <th class="author">作者</th>
                                                        <th class="description">描述</th>
                                                        <th class="category">分类</th>
                                                        <th class="available">可借</th>
                                                        <th class="total">总数</th>
                                                    </tr>
                                                </thead>
                                                
                                                </table>
                </div>
            </div>
        </div>
        <!-- /.content -->


@endsection


