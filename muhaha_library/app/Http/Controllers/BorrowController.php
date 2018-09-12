<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use View;
use App\Book;
use App\Status;
use App\Borrow;
use App\Reader;
use Datatables;
use Redirect;

class BorrowController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('panel.borrowhistory');
    }

    // 获取借阅数据
    public function borrowdata()
    {
        $records = Borrow::select(['id','isbn','work_no', 'borrow_time','return_time']);
        $records = $records->get();
        for($i=0; $i<count($records); $i++){
            $isbn = $records[$i]['isbn'];
            $work_no = $records[$i]['work_no'];
            $borrow_time = $records[$i]['borrow_time'];
            $return_time = $records[$i]['return_time'];
            $message_flag = false;
            // 获得 title from isbn
            $book_id = DB::table('statuses')->where('isbn',$isbn)->value('book_id');
            $title = DB::table('books')->where('book_id',$book_id)->value('title');
            //获得借阅人姓名，从工号
            $name = DB::table('readers')->where('work_no',$work_no)->value('name');
            $records[$i]['title'] = $title;
            $records[$i]['name'] = $name;
            //从整个时间截取年月日
            $records[$i]['borrow_time'] = date("Y-m-d",strtotime("$borrow_time"));
            //从借书时间计算到期时间
            $records[$i]['will_return_time'] = date("Y-m-d",strtotime("$borrow_time +2 month"));

            //判断是否还书
            if ($return_time == '0000-00-00 00:00:00') {
                                //判断是否逾期，还没写好
                                //$time_now = date("Y-m-d H:i:sa"); 
                                $time_expire =  date("Y-m-d H:i:s",strtotime("$borrow_time +2 month"));
                                $condition = (time()-(60*60*24)) - strtotime($time_expire);
                                if ( $condition > 0 ) {
                                    $message_flag = true;
                                    $records[$i]['return_time'] = '[逾期未还]';
                                }else{
                                    $records[$i]['return_time'] = '未还';
                                }
                                
            }else{
                $records[$i]['return_time'] = date("Y-m-d",strtotime("$return_time"));
            }
            
        }
        
        return Datatables::of($records)->make(true);        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validator::make($input, [
        //         'name' => 'required',
        //         'password' => 'required|min:8',
        //         'email' => 'required|email|unique:users',
        //     ]);

        $input = $request->only('work_no', 'isbn'); 
        $isbn = $input['isbn'];
        $work_no = $input['work_no'];

        $conditions = array(
                                    'isbn'    => $isbn,
                                    'available'  => 1
                                );
        $is_isbn = Status::where($conditions) ->get();
        $is_work_no = Reader::where('work_no',$work_no) ->get();
        
        //Validate 是否有这本书,并且这本书available
        if ($is_isbn->first()) {
                 //Validate 是否有这个人
                if ($is_work_no ->first()) {
                                $input['isreturn'] = 0;
                                Borrow::create($input);
                                $availability = array(
                                                            'available'  => 0
                                                        );
                                // changing the availability status
                                $book = Status::where('isbn',$isbn)->update($availability);
                                //back to
                                return Redirect::back()->withErrors(['借阅成功', 'The Message']);
                }else{
                        return Redirect::back()->withErrors(['!!未在可借书员工列表', 'The Message']);
                }
        }else{
            return Redirect::back()->withErrors(['!!本书尚未上架/本书尚未归还', 'The Message']);
        }

        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $input = $request->only('isbn'); 
        $isbn = $input['isbn'];

        // changing the return status
        // $input['isreturn'] = 1;
        $return = array(
                                    'isreturn' => 1,
                                    'return_time' => date("Y-m-d H:i:s")
                                );
        $borrow = Borrow::where(['isbn' => $isbn,'isreturn'  => 0])->update($return);

        // changing the availability status
        // $availability = array(
        //                             'available'  => 1
        //                         );
        $availability['available'] = 1;
        $book = Status::where('isbn',$isbn)->update($availability);

        // back to list
        return view('panel.borrowhistory');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
