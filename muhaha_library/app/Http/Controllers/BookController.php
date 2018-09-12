<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Request;
use DB;
use View;
use App\Book;
use App\Status;
use Datatables;


class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::orderBy('created_at','desc')->get();

        return View::make('panel.allbook')->with('books', $books);
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
        // $input = Request::all();
        // 
        // return $input;
        $input = $request->only('title', 'author','category', 'description','copies'); 
        //Book::create($input);
        $newbookid = DB::table('books')->insertGetId($input);
        
        $number_of_issues = $request->copies;
        for($i=1; $i-1<$number_of_issues; $i++){
            $isbn = create_isbn();
            Status::create(array(
                'book_id'   => $newbookid,
                'isbn' => $isbn,
                'available' =>'1'
            ));
        }
                
        return redirect('datatables');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($book_id)
    {
        //$available =  Status::select()->where('available',1)->groupBy('book_id')->get()->toArray();
        $onebook = Book::where('book_id',$book_id)
                                            // ->whereHas('hasManyCopies', function($q){
                                            // $q->where('available', '1')->count();
                                            //})
                                            ->get();
         foreach($onebook as $book){
                                $conditions = array(
                                    'book_id'    => $book->book_id,
                                    'available'  => 1
                                );

            $count = Status::where($conditions)->count();
            $book->avaliability = $count;
            $book->isbn =0;
         }
        return View::make('panel.showbookdetail')->with('onebook', $onebook);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($book_id)
    {
        $editbook = Book::where('book_id',$book_id)->get();
        return View::make('panel.editbook')->with('editbook', $editbook);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $book_id)
    {
        $inputs = $request->only('title', 'author','category', 'description','copies'); 
        $updatebook = Book::where('book_id',$book_id)->update($inputs);
        //show result
        $onebook = Book::where('book_id',$book_id)->get();
        return View::make('panel.showbookdetail')->with('onebook', $onebook);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($book_id)
    {
        //destory jilu
        Book::where('book_id',$book_id)->delete();
        Status::where('book_id',$book_id)->delete();
        return redirect('datatables');
    }


    //search
public function search(Request $request)
    {
        //未完成的search
        //$search = $request ->only('option','text');
        // $option = $search['option'];
        // $text = $search['text'];
        $option = $request->get('option');
        $text = $request->get('text');
        if (!is_null($text)) {
        
                        switch ($option)
                        {
                        case "title":
                            $books = Book::where('title','like','%' . $text . '%' )->get();
                            break;
                        case "author":
                            $books = Book::where('author','LIKE',"%$text%")->get();
                            break;
                            case "category":
                            $books = Book::where('category','LIKE',"%$text%")->get();
                            break;
                            case "isbn":
                            $book_id = DB::table('statuses')->where('isbn','LIKE',"%$text%")->value('book_id');
                            $books = Book::where('book_id',$book_id)->get();
                            break;
                        //无差别查询
                        default:
                            //若isbn有匹配
                                $is_isbn = Status::where('isbn','LIKE',"%$text%")->get();
                                if ($is_isbn->first()) {
                                    $xxx= DB::table('statuses')->where('isbn','LIKE',"%$text%")->value('book_id');
                                    $books = Book::where(function ($query) use ($text,$xxx) {
                                            $query->where('title','like','%' . $text . '%' )//same
                                                  ->orWhere('author','LIKE',"%$text%")
                                                  ->orWhere('category','LIKE',"%$text%")
                                                  ->orWhere('description','LIKE',"%$text%")
                                                  ->orWhere('book_id',$xxx);
                                        })->get();
                                }else{
                                        //若输入title,author,category
                                        $books = Book::where(function ($query) use ($text) {
                                                        $query->where('title','like','%' . $text . '%' )//same
                                                              ->orWhere('author','LIKE',"%$text%")
                                                              ->orWhere('category','LIKE',"%$text%")
                                                              ->orWhere('description','LIKE',"%$text%");
                                                    })->get();
                                }
                            
                                
                        }// end switch
                            //获得available册数
                            foreach($books as $book){
                                                $conditions = array(
                                                    'book_id'    => $book->book_id,
                                                    'available'  => 1
                                                );
                                                
                            $count = Status::where($conditions)->count();
                            $book->avaliability = $count;
                         }
                        //return $books;
                        return Datatables::of($books)->make(true);         
        
           }
    }

public function getIndex()
    {
        return view('panel.datatables');
    }

public function anyData()
    {
        $datatables = Book::select(['book_id','title', 'author','category', 'description','copies'])->get();
        foreach($datatables as $book){
                                $conditions = array(
                                    'book_id'    => $book->book_id,
                                    'available'  => 1
                                );
                                
            $count = Status::where($conditions)->count();
            $book->avaliability = $count;
         }
        return Datatables::of($datatables)->make(true);        
    }

    
}

function create_uuid($prefix = ""){    //可以指定前缀
        $str = md5(uniqid(mt_rand(), true));   
        $uuid  = substr($str,0,8) . '-';   
        $uuid .= substr($str,8,4) . '-';   
        $uuid .= substr($str,12,4) . '-';   
        $uuid .= substr($str,16,4) . '-';   
        $uuid .= substr($str,20,12);   
        return $prefix . $uuid;
    }
   function create_isbn(){
            $str = md5(uniqid(mt_rand(), true));   
            $id = substr($str,0,10) ;   
            return $id;
   }