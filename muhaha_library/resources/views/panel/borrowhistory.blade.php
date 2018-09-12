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
                    <h3>借阅历史</h3>
                </div>
                <div class="module-body table">
                    <table id="book_table" class="table">
                        <thead>
                            <tr>
                                <th class="">ID</th>
                                <th class="title">书名</th>
                                <th class="work_no">读者工号</th>
                                <th class="reader">读者姓名</th>
                                <th class="borrow_time">借阅时间</th>
                                <th class="will_return_time">到期时间</th>
                                <th class="return_time">实际还书时间</th>
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
//datatables borrow history
$(function() {
    $('#book_table').DataTable({
        processing: true,
        serverSide: true,
         order: [0,'desc'],
        ajax: '{!! route('borrowdata') !!}',
        columns: [
            { data: 'id', name: 'id' },
            { data: 'title', name: 'title' },
            { data: 'work_no', name: 'work_no' },
            { data:'name',name:'name'},
            { data: 'borrow_time', name: 'borrow_time' },
            { data: 'will_return_time', name: 'will_return_time' },
            { data: 'return_time', name: 'return_time' }
        ]
    });
});
</script>

@endsection


