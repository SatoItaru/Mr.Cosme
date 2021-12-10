<?php

namespace App\Http\Controllers;

use Auth;
use App\Post;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use JD\Cloudder\Facades\Cloudder;

class Postcontroller extends Controller
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
        $posts = Post::all();
        $posts->load('user');
        return view('posts.index', compact('posts'));
        // return view('posts.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        $post = new Post();

        $post->title = $request->title;
        $post->item  = $request->item;
        $post->body  = $request->body;
        $post->user_id = Auth::id();

        if ($image = $request->file('image')) {
            $image_path = $image->getRealPath();
            Cloudder::upload($image_path,null);//直前にアップロードされた画像のpublicIdを取得する。
            $publicId = Cloudder::getPublicId();
            $logoUrl = Cloudder::secureShow($publicId, [
                'width' => 500,
                'height' => 400,
            ]);
            $post->image_path = $logoUrl;
            $post->public_id = $publicId;
        }
        $post->save();

        return redirect()->route('posts.index');
    }

    /**
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);

        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, $id)
    {
        $post = Post::find($id);

        if(Auth::id() !== $post->user_id){
            return abort(404);
        }
        $post->update($request->all());

        return view('posts.show', compact('post'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);

        if(Auth::id() !== $post->user_id){
            return abort(404);
        }
        if(isset($post->public_id)){
            Cloudder::destroyImage($post->public_id);
        }
        $post -> delete();

        return redirect()->route('posts.index');
    }

    public function show($id)
    {
        $post = Post::find($id);
        $post->load('user', 'comments');
        return view('posts.show', compact('post'));
    }
}
