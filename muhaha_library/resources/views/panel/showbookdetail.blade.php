@extends('layouts.index') 

@section('content')

        <div class="content">
            <div class="module">
                <div class="module-head">
                    <h3><i class="fa fa-book" style="font-size: 20px;"></i></h3>
                </div>
                <div class="module-body">
                               @foreach ($onebook as $object)
                               <table class="table">
                                              <thead>
                                                            <tr>
                                                                <th colspan="2" style="font-size: 20px;">{{ $object->title }}</th>
                                                            </tr>
                                              </thead>
                                              <tbody>
                                              <tr>
                                                             <td>ISBN</td><td>{{ $object->isbn }}</td>
                                              </tr>
                                              <tr>
                                                             <td >作者</td><td>{{ $object->author }}</td>
                                              </tr>
                                              <tr>
                                                             <td style="white-space: nowrap; ">出版发行</td><td></td>
                                              </tr>
                                              <tr>
                                                             <td>分类</td><td>{{ $object->category }}</td>
                                              </tr>
                                              <tr>
                                                             <td>简介</td><td>{{ $object->description }}</td>
                                              </tr>
                                              <tr>
                                                             <td>册数</td><td>{{ $object->copies }}</td>
                                              </tr>
                                              <tr>
                                                             <td>可借数量</td><td> {{ $object->avaliability }}</td>
                                              </tr>
                                              </tbody>
                                              
                               </table>
                               @endforeach
                            
                                
                </div>
            </div>
        </div>
        <!-- /.content -->


@endsection


