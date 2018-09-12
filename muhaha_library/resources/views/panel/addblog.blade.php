@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">添加书籍</div>
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('blog') }}">
                    	{{ csrf_field() }}
                    	<div class="form-group">
			<label for="title" class="col-md-4 control-label">标题</label>
			<div class="col-md-6">
				<input id="title" type="text" class="form-control" name="title" value="" >
			</div>
		</div>

		<div class="form-group">
			<label for="slug" class="col-md-4 control-label">链接</label>
			<div class="col-md-6">
				<input id="slug" type="text" class="form-control" name="slug" value="" >
			</div>
		</div>

		<div class="form-group">
			<label for="content" class="col-md-12 control-label">摘要</label>
			<div class="col-md-12">
				<textarea id = "content" name="content" style="width: 100%;"></textarea>
			</div>
		</div>

		<div class="form-group">
			<div class="col-md-6 col-md-offset-4">
				<button id="submit" type="submit" class="btn btn-primary">
		                                    提交
				</button>
			</div>
		</div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection