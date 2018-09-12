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
                    <h3>所有书籍</h3>
                </div>
                <div class="module-body ">
                <!-- <a href="" class="btn btn-primary ">Total&nbsp;(10)</a>
                <a href="" class="btn btn-info ">工具书&nbsp;(10)</a>
                <a href="" class="btn btn-success ">Total&nbsp;(10)</a>
                <a href="" class="btn btn-info ">工具书&nbsp;(10)</a>
                <a href="" class="btn btn-warning ">Total&nbsp;(10)</a>
                <a href="" class="btn btn-info ">工具书&nbsp;(10)</a> -->
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
                        <tbody id="all-books">
                            <tr class="text-center">
                                <td colspan="99">Loading...</td>
                            </tr>
                            @foreach ($books as $book) 
                                    <tr class="book_one">
                                            <td>{{$book->book_id}}</td>
                                            <td>
                                                            <p>{{ $book->title }}</p> 
                                                            <div class="book_edit">
                                                                            <span>
                                                                                           {!! Form::open(['route' => ['book/edit', $book->book_id], 'method' => 'get']) !!}
                                                                                                        {!! Form::submit('编辑',['class'=>'btn']) !!}
                                                                                           {!! Form::close() !!}
                                                                            </span>
                                                                            <span>
                                                                                           {!! Form::open(['route' => ['book/delete', $book->book_id], 'method' => 'delete']) !!}
                                                                                                        {!! Form::submit('删除',['class'=>'btn']) !!}
                                                                                           {!! Form::close() !!}
                                                                            </span>
                                                                            <span>
                                                                                           {!! Form::open(['route' => ['book/show', $book->book_id], 'method' => 'get']) !!}
                                                                                                        {!! Form::submit('查看',['class'=>'btn']) !!}
                                                                                           {!! Form::close() !!}
                                                                            </span>
                                                            </div>
                                            </td>
                                            <td>{{ $book->author }}</td>
                                            <td>{{ str_limit($book->description,50) }}</td>
                                            <td >{{ $book->category }}</td>
                                            <td><a class="btn btn-success">{{ $book->available }}</a></td>
                                            <td><a class="btn btn-primary">{{ $book->copies }}</a></td>
                                    </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- /.content -->


@endsection


