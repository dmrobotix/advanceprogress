<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;

class BlogController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // display all blog posts
        $posts = Blog::all();
        return view('blog.index',['posts' => $posts]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      // validate Request
      $validateData = $request->validate([
        'title' => 'required|unique:blog',
        'post' => 'required',
        'author' => 'required'
      ]);

      // insert a new blog post
      $blog = new Blog;
      $blog->title = $request->title;
      $blog->post = $request->post;
      $blog->author = $request->author;
      $blog->save();

      return view('blog.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // find blog post with blog id = $id
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // edit blog post with blog id = $id
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // remove a blog with blog id = $id from database

    }

    public function nthindex($page) {
      $nth = $page*5+1; // only display posts starting with the $nth post
      $posts = Blog::all();
      $chunk = array_slice($posts,$nth,5); // only save from the nth through nth+5
      $total = size($posts)-$nth+4;
      return view('blog.index',['posts' => $chunk,'total' => $total,'page'=> $page]);


    }
}
