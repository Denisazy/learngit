@extends('layouts.page') 

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
                <hr>
                        <ul>
                                 @foreach ($posts as $post) 
                                    <li>
                                            <a href="">{{ $post->title }}</a>
                                            <small>{{ $post->published_at }}</small>
                                            <p>{{str_limit($post->content)}}</p>
                                    </li>
                                  @endforeach
                        </ul>
                <hr>
        </div>
    </div>
</div>
@endsection
