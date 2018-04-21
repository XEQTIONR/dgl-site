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
        $postsajax=\App\Blog_post::paginate(1);
        return view('partials.postswelcome', compact('postsajax'));
      }
      else {
        $posts=\App\Blog_post::paginate(1);
        $lastpage = $posts->lastPage();
        //$posts->withPath('custom/url');
        return view('welcome', compact('posts', 'lastpage'));
      }
    }
}
