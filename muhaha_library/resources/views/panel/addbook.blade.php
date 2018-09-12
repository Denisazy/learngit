@extends('layouts.index') 

@section('content')
<style type="text/css">
input:-webkit-autofill, textarea:-webkit-autofill, select:-webkit-autofill {
    background-color: rgb(255, 255, 255) !important;
    background-image: none !important;
    color: rgb(0, 0, 0) !important;
}
</style>
        <div class="content">
            <div class="module">
                <div class="module-head">
                    <h3>添加书籍</h3>
                </div>
                <div class="module-body">
                            <div class="row">
                                            {!! Form::open(['url' => 'book/store','class' =>'form-horizontal']) !!}
                                                            <div class="form-group ">
                                                                            {!!Form::label('title', '书名', ['class' => 'col-md-2 control-label'])!!}
                                                                            <div class="col-md-8">
                                                                                        {!! Form::text('title','',['class' => 'form-control']) !!}
                                                                            </div>
                                                            </div>
                                                            <div class="form-group ">
                                                                            {!!Form::label('author', '作者', ['class' => 'col-md-2 control-label'])!!}
                                                                            <div class="col-md-8">
                                                                                        {!! Form::text('author','',['class' => 'form-control']) !!}
                                                                            </div>
                                                            </div>
                                                            <div class="form-group ">
                                                                            {!!Form::label('category', '分类', ['class' => 'col-md-2 control-label'])!!}
                                                                            <div class="col-md-8">
                                                                                        {!! Form::text('category','',['class' => 'form-control']) !!}
                                                                            </div>
                                                            </div>
                                                            <div class="form-group ">
                                                                            {!!Form::label('description', '摘要', ['class' => 'col-md-2 control-label'])!!}
                                                                            <div class="col-md-8">
                                                                                        {!! Form::textarea('description','',['class' => 'form-control']) !!}
                                                                            </div>
                                                            </div>
                                                            <div class="form-group ">
                                                                            {!!Form::label('copies', '册数', ['class' => 'col-md-2 control-label'])!!}
                                                                            <div class="col-md-8">
                                                                                        {!! Form::number('copies','',['class' => 'form-control']) !!}
                                                                            </div>
                                                            </div>
                                                            <div class="form-group">
                                                                            <div class="col-md-8 col-md-offset-2">
                                                                                            {!! Form::submit('添加',['class'=>'btn btn-success form-control']) !!}
                                                                            </div>
                                                            </div>
                                                            
                                            {!! Form::close() !!}
                            </div>
                            
                                <!-- <form method="POST" action="register" class="form-horizontal" id="" autocomplete="off">

                                                <div class="form-group ">
                                                                <label for="" class="col-md-2 control-label">书名</label>
                                                                <div class="col-md-8">
                                                                                <input id="name" type="text" name="username" value="" required="required" class="form-control">
                                                                </div>
                                                </div>
                                                <div class="form-group  ">
                                                                <label for="" class="col-md-2 control-label">作者</label>
                                                                <div class="col-md-8">
                                                                                <input type="text"  value="" required="required" class="form-control">
                                                                </div>
                                                </div>
                                                <div class="form-group  ">
                                                                <label for="" class="col-md-2 control-label">分类</label>
                                                                <div class="col-md-8">
                                                                                <input type="text"  required="required" class="form-control" >
                                                                </div>
                                                </div>
                                                <div class="form-group  ">
                                                                <label for="" class="col-md-2 control-label">摘要</label>
                                                                <div class="col-md-8">
                                                                                <textarea required="required" class="form-control" ></textarea> 
                                                                </div>
                                                </div>

                                                <div class="form-group">
                                                                <div class="col-md-8 col-md-offset-2">
                                                                                <button type="submit" class="btn btn-primary btn-lg btn-block">添加</button>
                                                                </div>
                                                </div>
                                </form> -->
                </div>
            </div>
        </div>
        <!-- /.content -->

<!-- Scripts -->
<!-- wysiwyg -->
<script src="{{ asset('js/bootstrap-wysiwyg.js') }}"></script>
<script type="text/javascript">
    $('#editor').wysiwyg();
</script>
@endsection


