@extends('layouts.index') 

@section('content')
<style type="text/css">
form{
    margin:0px;display:inline;
}
label {
font-weight: 300;
}
input,select{
    border: 1px solid #cccccc;
}
.module-body{
    padding-bottom: 40px;
}
.btn-height{
    height: 36px;
}
.book_no{
    line-height: 36px;
}
</style>
        <div class="content">
                <div class="module">
                            <div class="module-head">
                                <h3>借书</h3>
                            </div>
                            <div class="module-body">
                                                {!! Form::open(['url' => 'book/borrowing','class' =>'form-horizontal']) !!}
                                                            <div class="form-group ">
                                                                            {!!Form::label('work_no', '读者工号', ['class' => 'col-md-2 control-label'])!!}
                                                                            <div class="col-md-8">
                                                                                        {!! Form::text('work_no','',['class' => 'form-control']) !!}
                                                                            </div>
                                                            </div>
                                                            <div class="form-group ">
                                                                            {!!Form::label('isbn', '书号', ['class' => 'col-md-2 control-label'])!!}
                                                                            <div class="col-md-8">
                                                                                        {!! Form::text('isbn','',['class' => 'form-control']) !!}
                                                                            </div>
                                                            </div>
                                                            <div class="form-group">
                                                                            <div class="col-md-8 col-md-offset-2">
                                                                                            {!! Form::submit('借书',['class'=>'btn btn-success form-control']) !!}
                                                                            </div>
                                                            </div>
                                               {!! Form::close() !!}
                                                
                                                @if($errors->any())
                                                <hr/>
                                                <div class="alert alert-error">
                                                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                                                     {{$errors->first()}} &nbsp;<i class="fa fa-hand-spock-o"></i>
                                                                </div>
                                                @endif
                                                

                            </div>
                </div>
                <div class="module">
                                <div class="module-head">
                                    <h3>还书</h3>
                                </div>
                                <div class="module-body">
                                                {!! Form::open(['url' => 'book/return','method' => 'put']) !!}
                                                            <div class="form-group ">
                                                                            {!!Form::label('isbn', '书号', ['class' => 'col-md-2 control-label text-right book_no'])!!}
                                                                            <div class="col-md-8">
                                                                                        {!! Form::text('isbn','',['class' => 'form-control']) !!}
                                                                            </div>
                                                            </div>
                                                            {!! Form::submit('还书',['class'=>'btn btn-height btn-info']) !!}
                                               {!! Form::close() !!}
                                </div>
                </div>
        </div>
        <!-- /.content -->



@endsection


