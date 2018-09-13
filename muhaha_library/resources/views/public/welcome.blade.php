@extends('layouts.public') 

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
    line-height: 27px;
}
.book_no{
    height: 36px;
}
#search_table{
    /*display: none;*/
    visibility: hidden;
    width: 100%;
}
.btn-s{
    background-color: #f8b62c;
    color: white;
}
a.btn-s:hover{
    color: white;
}
</style>
        <div class="content">
            <div class="module">
                <div class="module-head">
                    <h3>Welcome</h3>
                </div>
                <div class="module-body ">
                                    <p class="text-center">xx图书馆</p>
                                    <div class="row">
                                                <form id="search_form"  accept-charset="UTF-8" method="get" onsubmit="return false;">
                                                <input type="hidden" style="display:none" />
                                                                <div class="form-group ">
                                                                                <select   class="col-md-2 col-md-offset-1 control-label text-right book_no" name="option">
                                                                                                <option value="title">书名</option>
                                                                                                <option value="author">作者</option>
                                                                                                <option value="category">分类</option>
                                                                                                <option value="isbn">ISBN</option>
                                                                                                <option value="any">任意词</option>
                                                                                </select>
                                                                                <div class="col-md-7">
                                                                                            <input  class="form-control"  type="text"  value="" onkeypress="return Enter(event)" />
                                                                                </div>
                                                                </div>
                                                                <a class="btn btn-height btn-s " onclick="event.preventDefault(); doSearch();"><i class="fa fa-search"></i></a>
                                                </form>
                                    
                                   </div>
                                   <div class="row">
                                                <div class="col-md-7 col-md-offset-3">
                                                                    <!-- <p>搜索热词：</p> -->
                                                </div>
                                                
                                   </div>
                                   
                </div>

                <div class="module-body table">
                    <table id="search_table" class="table">
                        <thead>
                            <tr>
                                <!-- <th class="">ID</th> -->
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
function Enter(e) {
    if (e.keyCode == 13) {
                doSearch();
            }

}
function doSearch() {
        if ($.fn.dataTable.isDataTable( '#search_table' )){
            $('#search_table').dataTable().fnDestroy();
        }
        
        $('#search_table').css("visibility","visible");
        oTable = $('#search_table').DataTable({
                    processing: true,
                    serverSide: true,
                    searching: false,
                     //排序
                     order: [0,'desc'],
                    //ajax: '{!! route('booksearch') !!}',
                    ajax: {
                            url: '{!! route('booksearch') !!}',
                            type: "GET",
                            data: function (d) {
                                d.option = $('select[name=option]').val();
                                d.text = $('input[type=text]').val();
                            }
                        },
                    columns: [
                        // { data: 'book_id', name: 'book_id' ,width:'30px'},
                        { data: 'title', name: 'title' },
                        { data: 'author', bSortable : false,name: 'author',width:'80px' },
                        { data: 'category', bSortable : false,name: 'category',width:'80px' },
                        { data: null, bSortable : false,
                                            name: 'description',
                                            render: function (data, type, row, meta){
                                                                    return data.description.substr( 0, 60 ) + '...';
                                                             }
                                             },
                        { data: null, bSortable : false,
                                            name: 'avaliability',width:'30px' ,
                                            render: function (data, type, row, meta){
                                                                    return '<a class="btn btn-success">' + data.avaliability + '</a>';
                                                            }
                                         },
                        { data: null, bSortable : false,
                                            name: 'copies' ,width:'30px',
                                            render: function (data, type, row, meta){
                                                                    return '<a class="btn btn-primary">' + data.copies + '</a>';
                                                            }
                                        }
                    ]
                });

}


    

</script>
@endsection


