<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use View;
use App\Blog;
class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    

    public function index()
    {
        // $posts = Blog::where('published_at', '<=', Carbon::now())
        //     ->orderBy('published_at', 'desc')
        //     ->paginate(config('blog.posts_per_page'));

        // return view('index', compact('posts'));
        // $posts = Blog::All();
        // $post = Blog::find(1);
        // return view('index');
        

        $posts = Blog::all();

        // foreach ($posts as $post) {
        //     echo $post->title;
        // }

        return View::make('index')->with('posts', $posts);

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
        // echo 'add blog';
        // $id = 'add blog';
        $add_blog = $request->add_blog_data;
        return View('panel.addblog');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $post = Blog::whereSlug($slug)->firstOrFail();

        // return view('single')->withPost($post);
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
    public function update(Request $request, $id)
    {
        //
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
