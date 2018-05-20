<?php

namespace App\Http\Controllers;

use App\Models\Banner;
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
        $banners = Banner::orderBy('lft')->get();
        $posts=\App\Blog_post::paginate(1);
        $lastpage = $posts->lastPage();
        
        return view('welcome', compact('posts', 'lastpage', 'banners'));
      }
    }

    public function aboutus()
    {
      return view('aboutus');
    }

    public function aboutdateam()
    {
      return view('aboutdateam');
    }
}
