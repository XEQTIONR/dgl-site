<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
      if($request->ajax())
      {
        $postsajax=\App\Blog_post::paginate(1);
        return view('partials.postsblog', compact('postsajax'));
      }
      else{
        $posts = \App\Blog_post::paginate(1);
        $lastpage = $posts->lastPage();
        return view('news.blog', compact('posts','lastpage'));
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

      if(is_numeric($id))
      {
        $post = \App\Blog_post::find($id);
        //dd($t);
      }
      //$this->show();
      else
      {
        $post = \App\Blog_post::where('slug', $id)->first();
      }

      if(is_null($post))
        abort(404);

      $Parsedown = new \Parsedown();
      //$post = \App\Blog_post::find($id);

      $post->body = $Parsedown->text($post->body);
      return view('news.ablog', compact('post'));
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
