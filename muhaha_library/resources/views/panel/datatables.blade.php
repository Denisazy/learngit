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
.paginate_button{
    border-radius: 10px;
    background-color: transparent !important;
}
/*.paginate_button:hover{
    background-color: #f8b62c !important;
    color: white !important;
}*/
table.dataTable.no-footer {
    border-bottom: 1px solid #b9b7b7;
}
table.dataTable thead th, table.dataTable thead td {
border-bottom: 0; 
}
</style>
        <div class="content">
            <div class="module">
                <div class="module-head">
                    <h3>所有书籍</h3>
                </div>
                <div class="module-body table">
                    <table id="book_table" class="table">
                        <thead>
                            <tr>
                                <th class="">ID</th>
                                <th class="title" style="width: 170px;">书名</th>
                                <th class="author">作者</th>
                                <th class="category" style="width: 50px;white-space: nowrap;">分类</th>
                                <th class="description">描述</th>
                                <th class="available">可借</th>
                                <th class="total">总数</th>
                            </tr>
                        </thead>
                        <tbody id="all-books">
                            <tr class="text-center">
                                <td colspan="99">Loading...</td>
                            </tr>
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- /.content -->

<!-- Scripts -->
<!-- DataTables -->
<script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
<script>
//datatables allbook
$(function() {
    $('#book_table').DataTable({
        processing: true,
        serverSide: true,
         //排序
         order: [0,'desc'],
        ajax: '{!! route('datatablesdetail') !!}',
        columns: [
            { data: 'book_id', name: 'book_id' },
            { data: null, 
                               name: 'title' ,
                               render: function (data, type, row, meta){
                                                    url = '{!! url('/') !!}';
                                                    return '<p>' + data.title +'</p>'+ 
                                                    '<div class="book_edit"><span><form method="GET" action="' + url + '/book/edit/' +data.book_id + '" accept-charset="UTF-8"><input class="btn" type="submit" value="编辑"></form></span><span><form method="GET" action="' + url + '/book/delete/' +data.book_id + '" accept-charset="UTF-8"><input class="btn" type="submit" value="删除"></form></span><span><form method="GET" action="' + url + '/book/show/' +data.book_id + '" accept-charset="UTF-8"><input class="btn" type="submit" value="查看"></form></span></div>';
                                            }
                                },
            { data: 'author', name: 'author' },
            { data: 'category', name: 'category' },
            { data: null, 
                                name: 'description',
                                render: function (data, type, row, meta){
                                                        return data.description.substr( 0, 38 ) + '...';
                                                 }
                                 },
            { data: null, 
                                name: 'avaliability' ,
                                render: function (data, type, row, meta){
                                                        return '<a class="btn btn-success">' + data.avaliability + '</a>';
                                                }
                             },
            { data: null, 
                                name: 'copies' ,
                                render: function (data, type, row, meta){
                                                        return '<a class="btn btn-primary">' + data.copies + '</a>';
                                                }
                            }
        ]
    });
});
</script>

@endsection


