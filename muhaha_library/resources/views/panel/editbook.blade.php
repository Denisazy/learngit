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
                    <h3><i class="fa fa-edit " style="font-size: 20px;"></i></h3>
                </div>
                <div class="module-body">
                            <div class="row">
                               @foreach ($editbook as $object)
                                            
                                            {!! Form::open(['route' => ['book/update', $object->book_id], 'method' => 'put','class' =>'form-horizontal']) !!}
                                                            <div class="form-group ">
                                                                            {!!Form::label('title', '书名', ['class' => 'col-md-2 control-label'])!!}
                                                                            <div class="col-md-8">
                                                                                        {!! Form::text('title',$object->title,['class' => 'form-control']) !!}
                                                                            </div>
                                                            </div>
                                                            <div class="form-group ">
                                                                            {!!Form::label('author', '作者', ['class' => 'col-md-2 control-label'])!!}
                                                                            <div class="col-md-8">
                                                                                        {!! Form::text('author',$object->author,['class' => 'form-control']) !!}
                                                                            </div>
                                                            </div>
                                                            <div class="form-group ">
                                                                            {!!Form::label('category', '分类', ['class' => 'col-md-2 control-label'])!!}
                                                                            <div class="col-md-8">
                                                                                        {!! Form::text('category',$object->category,['class' => 'form-control']) !!}
                                                                            </div>
                                                            </div>
                                                            <div class="form-group ">
                                                                            {!!Form::label('description', '摘要', ['class' => 'col-md-2 control-label'])!!}
                                                                            <div class="col-md-8">
                                                                                        {!! Form::textarea('description',$object->description,['id' => 'editor'],['class' => 'form-control']) !!}
                                                                            </div>
                                                            </div>
                                                            <div class="form-group ">
                                                                            {!!Form::label('copies', '册数', ['class' => 'col-md-2 control-label'])!!}
                                                                            <div class="col-md-8">
                                                                                        {!! Form::number('copies',$object->copies,['class' => 'form-control']) !!}
                                                                            </div>
                                                            </div>
                                                            <div class="form-group">
                                                                            <div class="col-md-8 col-md-offset-2">
                                                                                            {!! Form::submit('保存',['class'=>'btn btn-success form-control']) !!}
                                                                            </div>
                                                            </div>
                                                            
                                            {!! Form::close() !!}
                               @endforeach
                            </div>
                            
                                
                </div>
            </div>
        </div>
        <!-- /.content -->



@endsection





