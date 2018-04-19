<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MiscController extends Controller
{
    //
    public function home(Request $request)
    {
      if($request->ajax())
      {
        //return "AJAX RES";
        $postsajax=\App\Blog_post::paginate(5);
        return view('partials.postswelcome', compact('postsajax'));
      }
      else {
        $posts=\App\Blog_post::paginate(5);
        $lastpage = $posts->lastPage();
        //$posts->withPath('custom/url');
        return view('welcome', compact('posts', 'lastpage'));
      }
    }

    public function news(Request $request)
    {
      if($request->ajax())
      {
        $postsajax=\App\Blog_post::paginate(5);
        return view('partials.postsblog', compact('postsajax'));
      }
      else{
        $posts = \App\Blog_post::paginate(5);
        $lastpage = $posts->lastPage();
        return view('blog', compact('posts','lastpage'));
      }
    }
}
