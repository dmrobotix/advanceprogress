<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Blog;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth')->except('public','blogdeck','show','keywords');
  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function public()
     {
         // display latest tidposts
         // only send ones that have publish set as 'yes'
         $posts = $this->getPosts();
         $max = $this->getMax();
         if (sizeof($posts) != 0) {
           $posts[0]->body = str_replace("\r\n\r\n",'</p><p>',$posts[0]->body);
           $posts[0]->body = "<p>".$posts[0]->body."</p>";

         // check for associated files
         $directory = "public/images/posts/".$posts[0]->permalink;
         $files = Storage::files($directory);
         for ($i=0;$i<sizeof($files);$i++) {
           $file = explode('/',$files[$i]);
           $files[$i] = Storage::url(implode('/',array_slice($file,1,4)));
         }
         $imginfo = $this->findImages($posts[0]);
         $linkinfo = $this->findLinks($posts[0]);

         return view('posts.index')->with(compact(['posts', $posts,'max',$max,'files',$files,'imginfo',$imginfo,'linkinfo',$linkinfo]));

       } else {
         return view('posts.index')->with(compact(['posts', $posts,'max',$max]));
       }
     }
    public function index()
    {
        // display latest posts
        // only send ones that have publish set as 'yes'
        //$posts = Blog::all();
        $posts = $this->getPosts();
        $max = $this->getMax();
        if (sizeof($posts) != 0) {
          $posts[0]->body = str_replace("\r\n\r\n",'</p><p>',$posts[0]->body);
          $posts[0]->body = "<p>".$posts[0]->body."</p>";
        // check for associated files
        $directory = "public/images/posts/".$posts[0]->permalink;
        $files = Storage::files($directory);
        for ($i=0;$i<sizeof($files);$i++) {
          $file = explode('/',$files[$i]);
          $files[$i] = Storage::url(implode('/',array_slice($file,1,4)));
        }

        $imginfo = $this->findImages($posts[0]);
        $linkinfo = $this->findLinks($posts[0]);

        return view('posts.index')->with(compact(['posts', $posts,'max',$max,'files',$files,'imginfo',$imginfo,'linkinfo',$linkinfo]));
      } else {
        return view('posts.index')->with(compact(['posts', $posts,'max',$max]));

      }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // create a new bit article
        $posts = $this->getPosts();
        $max = $this->getMax();

        return view('posts.create')->with(compact(['posts', $posts,'max',$max]));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $posts = $this->getPosts();
      $max = $this->getMax();
        // store the new bit article
        // need to validate titlte, body, keywords, permalink
        // need to create permalink address
        // need to check whether this is saved or publish
        // validate Request

      $validateData = $request->validate([
        'title' => 'required|unique:blog',
        'body' => 'required',
        'author' => 'required',
        'keywords' => 'required'
      ]);
      $permaexplode = explode(" ",$request->title);
      if (sizeof($permaexplode) > 9) {
        $permatemp = array_slice($permaexplode,0,9);
        $permatemp = implode(" ", $permatemp);
      } else {
        $permatemp = implode(" ",$permaexplode);
      }
      $permalink = str_replace(' ','-',$permatemp);
      $permalink = preg_replace('/[^a-zA-Z0-9\'\-]/', '', $permalink);
      $permalink = str_replace("'", '', $permalink);
      $permalink = str_replace('"', '', $permalink);
      $permalink = strtolower($permalink);

      // insert a new post post
      $post = new Blog;
      $post->title = $request->title;
      $post->body = $request->body;
      $post->author = $request->author;
      $post->summary = $request->summary;
      $post->summary_image = "images/posts/".$request->summaryimage;
      $post->summary_caption = $request->summarycaption;
      $post->keywords = $request->keywords;
      $post->permalink = $permalink;
      if ($request->button == 'save') {
        // do not publish
        $post->publish = 'no';
      } else {
        $post->publish = 'yes';
      }
      $post->save();

      if ($request->hasFile('image')) {
        foreach ($request->file('image') as $file) {
          Storage::putFileAs('public/images/posts/'.$permalink.'/', $file, $file->getClientOriginalName());
          //return session()->flash('status','Files successfully uploaded.');
        }
      }

      return redirect('/blog/'.$post->permalink.'/edit')->with(compact(['posts', $posts,'max',$max]));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $permalinkorid
     * @return \Illuminate\Http\Response
     */
    public function show($permalinkorid)
    {
      $posts = $this->getPosts();
      $max = $this->getMax();
      if (sizeof($posts) != 0) {
        $posts[0]->body = str_replace("\r\n\r\n",'</p><p>',$posts[0]->body);
        $posts[0]->body = "<p>".$posts[0]->body."</p>";
      }
      //$post = Blog::find($permalinkorid);
        // show a single post article based on permalink or id
        // test if permalinkorid is an integer
        if (is_numeric($permalinkorid)) {
          $post = Blog::find($permalinkorid);
        } else {
          $post = Blog::where('permalink',$permalinkorid)->first();
        }
        if (sizeof($post) != 0) {
          $post->body = str_replace("\r\n\r\n",'</p><p>',$post->body);
          $post->body = "<p>".$post->body."</p>";
        }

        // check for associated files
        $imginfo = $this->findImages($post);
        $linkinfo = $this->findLinks($post);

        return view('posts.show')->with(compact(['posts',$posts,'post',$post,'max',$max,'imginfo',$imginfo,'linkinfo',$linkinfo]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($permalinkorid)
    {
        // edit a stored post article
        if (is_numeric($permalinkorid)) {
          $post = Blog::find($permalinkorid);
        } else {
          $post = Blog::where('permalink',$permalinkorid)->first();
        }

        // check for associated files
        $directory = "public/images/posts/".$post->permalink;
        $files = Storage::files($directory);
        for ($i=0;$i<sizeof($files);$i++) {
          $file = explode('/',$files[$i]);
          $files[$i] = Storage::url(implode('/',array_slice($file,1,4)));
        }

        $posts = $this->getPosts();
        $max = $this->getMax();

        return view('posts.edit')->with(compact(['post',$post,'posts',$posts,'max',$max,'files',$files]));
        //view('posts.edit')->with(['posts',$posts]);
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
      $posts = $this->getPosts();
      $max = $this->getMax();
      if ($request->hasFile('image')) {
        $post = Blog::find($id);
        foreach ($request->file('image') as $file) {
          Storage::putFileAs('public/images/posts/'.$post->permalink.'/', $file, $file->getClientOriginalName());
          //return session()->flash('status','Files successfully uploaded.');
        }
        session()->flash('status', 'Successfully uploaded.');
        return redirect('/blog/'. $post->permalink.'/edit')->with(compact(['posts', $posts,'max',$max]));
      } else {
        // update a stored post article
        // validate title, body, keywords
        $validateData = $request->validate([
          'title' => 'required',
          'body' => 'required',
          'keywords' => 'required'
        ]);

        // insert a new post post
        $post = Blog::find($id);
        $post->title = $request->title;
        $post->body = $request->body;
        //$post->body = DB::connection()->getPdo()->quote($request->body);
        $post->summary = $request->summary;
        $post->summary_image = $request->summaryimage;
        $post->summary_caption = $request->summarycaption;
        $post->keywords = $request->keywords;
        if ($request->button == 'save') {
          // do not publish
          $post->publish = 'no';
        } else {
          $post->publish = 'yes';
        }
        $post->save();

        return redirect('/blog/'. $post->permalink)->with(compact(['posts', $posts,'max',$max]));
      }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $posts = $this->getPosts();
      $max = $this->getMax();
        // delete a post article
        $post = Blog::find($id);
        $post->delete();

        // redirect
        session()->flash('status', 'Successfully deleted the post.');
        return redirect('/')->with(compact(['posts', $posts,'max',$max]));
    }

    public function mail(Request $formdata) {
      $posts = $this->getPosts();
      $max = $this->getMax();
      // send email
      $validateData = $formdata->validate([
        'name' => 'bail|required',
        'email' => 'required',
        'message' => 'required'
      ]);

      if ($formdata->form == "media") {
        // send message from media form
        Mail::to('margot@margotposts.com')->send(new MediaRequest($formdata));
        session()->flash('status', 'Email sent! You\'ll receive a response soon.');
        return redirect('/')->with('posts', $posts);
      } else {
        // send message from general form
        Mail::to('margot@margotposts.com')->send(new PersonalRequest($formdata));
        session()->flash('status', 'You email was sent!');
        return redirect('/')->with(compact(['posts', $posts,'max',$max]));
      }
    }

    public function postdeck($max, $page, $nav, Request $request) {

      if ($page >= floor($max / 4) && $page != 1) {
        // then we’re on the last page
        $id = 4;
    	  //search for the last 4 posts
        $posts = Blog::where('id', '<=', $id)->where('publish','yes')->orderBy('id', 'desc')->take(4)->get();
        $posts['prev'] = 0;
        $posts['next'] = 1;
      } else if (1 < $page && $page < $max / 4) {
        // then we can move between pages
        if ($nav == "prev") {
          $id = ($page-1)*4;
          $page = $page + 1;
        }
        if ($nav == "next") {
          $id = ($page+1)*4;
          $page = $page - 1;
        }
        $posts = Blog::where('id', '<=', $id)->where('publish','yes')->orderBy('id', 'desc')->take(4)->get();
        $posts['prev'] = 1;
        $posts['next'] = 1;
      } else if ($page == 1) {
        // then we are on the first page
    	  $id = $max;
        $page = 1;
    	  // search for the latest 4 posts
        $posts = Blog::where('id', '<=', $id)->where('publish','yes')->orderBy('id', 'desc')->take(4)->get();
        if($page >= floor($max / 4) && $page == 1) {
          $posts['prev'] = 0;
        } else {
          $posts['prev'] = 1;
        }
        $posts['next'] = 0;
      }
      $posts['page'] = $page;
      return response()->json(json_encode($posts));
    }

    private function getPosts() {
      $posts = Blog::where('publish','yes')->orderBy('id', 'desc')->take(4)->get();
      $max = $this->getMax();
      $total = sizeof($posts);
      if ($max !=0) {
        for($i=0;$i<$total;$i++) {
          $posts[$i]->id = $max - $i;
        }
      }

      return $posts;
    }

    private function getMax() {
      $max = Blog::where('publish','yes')->count();
      return $max;
    }

    private function findImages($post) {
      $directory = "public/images/posts/".$post->permalink;
      $files = Storage::files($directory);
      for ($i=0;$i<sizeof($files);$i++) {
        $file = explode('/',$files[$i]);
        $files[$i] = Storage::url(implode('/',array_slice($file,1,4)));
      }
      preg_match_all('/\[img(.*?)\img]/', $post->body, $matches);
      if (sizeof($matches)!=0) {
        for($i=0;$i<sizeof($matches[0]);$i++) {
          $contents = explode(',',trim($matches[1][$i]));
          $urlinfo['url'][] = $files[$contents[0]];
          $urlinfo['alt'][] = $contents[1];
          $urlinfo['align'][] = $contents[2];
          $urlinfo['match'][] = $matches[0][$i];
        }
      }
      if(!isset($urlinfo)) {
        $urlinfo = array();
      }

      return $urlinfo;
    }

    private function findLinks($post) {
      preg_match_all('/\[link(.*?)link\]/', $post->body, $matches);
      if (sizeof($matches)!=0) {
        for($i=0;$i<sizeof($matches[0]);$i++) {
          $contents = explode(',',trim($matches[1][$i]));
          $linkinfo['href'][] = $contents[0];
          $linkinfo['text'][] = $contents[1];
          $linkinfo['match'][] = $matches[0][$i];
        }
      }
      if(!isset($linkinfo)) {
        $linkinfo = array();
      }

      return $linkinfo;
    }

    private function findStyles($post) {
      preg_match_all('/\[h1(.*?)h1\]/', $post->body, $matches['h1']);
      preg_match_all('/\[h2(.*?)h2\]/', $post->body, $matches['h2']);
      preg_match_all('/\[h3(.*?)h3\]/', $post->body, $matches['h3']);
      preg_match_all('/\[h4(.*?)h4\]/', $post->body, $matches['h4']);
      preg_match_all('/\[b(.*?)b\]/', $post->body, $matches['b']);
      preg_match_all('/\[i(.*?)i\]/', $post->body, $matches['i']);
      preg_match_all('/\[u(.*?)u\]/', $post->body, $matches['u']);
      preg_match_all('/\[st(.*?)st\]/', $post->body, $matches['st']); // strike through
      if (sizeof($matches)!=0) {
        foreach($matches as $style)
        for($i=0;$i<sizeof($style[0]);$i++) {
          $contents = explode(',',trim($matches[1][$i]));
          $linkinfo['href'][] = $contents[0];
          $linkinfo['text'][] = $contents[1];
          $linkinfo['match'][] = $matches[0][$i];
        }
      }
      if(!isset($linkinfo)) {
        $linkinfo = array();
      }

      return $linkinfo;
    }



    public function keywords($keyword) {
      // find bis based on a keyword saerch
      // return a posts object of table results
      //SELECT * FROM margotbi_blog.posts WHERE posts.keywords LIKE '%economy%';
      $keyword = str_replace('-',' ', $keyword);
      $posts = Blog::where('keywords','LIKE','%'.$keyword.'%')->get();
      $max = $this->getMax();
      if (sizeof($posts) != 0) {
        $posts[0]->body = str_replace("\r\n\r\n",'</p><p>',$posts[0]->body);
        $posts[0]->body = "<p>".$posts[0]->body."</p>";
      }
      // check for associated files
      $directory = "public/images/posts/".$posts[0]->permalink;
      $files = Storage::files($directory);
      for ($i=0;$i<sizeof($files);$i++) {
        $file = explode('/',$files[$i]);
        $files[$i] = Storage::url(implode('/',array_slice($file,1,4)));
      }
      $imginfo = $this->findImages($posts[0]);
      $linkinfo = $this->findLinks($posts[0]);
      return view('posts.keywords')->with(compact(['posts', $posts,'max',$max,'files',$files,'imginfo',$imginfo,'linkinfo',$linkinfo]));
    }
    public function nthindex($page) {
      $nth = $page*5+1; // only display posts starting with the $nth post
      $posts = Blog::all();
      $chunk = array_slice($posts,$nth,5); // only save from the nth through nth+5
      $total = size($posts)-$nth+4;
      return view('blog.index',['posts' => $chunk,'total' => $total,'page'=> $page]);
    }
}
