<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MiscController extends Controller
{
    //
    public function home(Request $request)
    {
      if($request->ajax())
      {
        //return "AJAX RES";
        $postsajax=\App\Blog_post::orderBy('created_at', 'DESC')->paginate(config('app.posts_per_page'));
        return view('partials.postswelcome', compact('postsajax'));
      }
      else {
        $banners = Banner::orderBy('lft')->get();
        $posts=\App\Blog_post::orderBy('created_at', 'DESC')->paginate(config('app.posts_per_page'));
        $lastpage = $posts->lastPage();

        $tournaments = \App\Tournament::whereDate('enddate', '>', Carbon::now())
                                      ->orderBy('startdate','asc')->get();

        foreach ($tournaments as $tournament) {

          //$regend = new Carbon($tournament->registration_end);
          $start = new Carbon($tournament->startdate);
          $now = Carbon::now();
          if($start->gt($now))
            $tournament->status = 'upcoming';
          else
          {
            $tournament->status='current';
//
            $standings = json_decode($tournament->standings_json);
            $tournament->standings = $standings;
          }
        }
        return view('welcome', compact('posts', 'lastpage', 'banners','tournaments'));
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
