<?php

namespace App\Http\Controllers;

use Auth;
use App\Post;
use App\Image;
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
        // $post = new Post();

        $post = Post::find(1);

        $post = new Post();

        $post->title = $request->title;
        $post->item  = $request->item;
        $post->body  = $request->body;

        $post->user_id = Auth::id();

        $image1 = null;
        $image2 = null;
        $image3 = null;
        $image4 = null;

        $post->save();

        if ($uploadedImage = $request->file('image1'))
            {
                $image1 = new Image();
                $image_path = $uploadedImage->getRealPath();
                Cloudder::upload($image_path,null);//直前にアップロードされた画像のpublicIdを取得する。
                $publicId = Cloudder::getPublicId();
                $logoUrl = Cloudder::secureShow($publicId, [
                    'width' => 500,
                    'height' => 400,
                ]);
                $image1->image_path = $logoUrl;
                $image1->public_id = $publicId;

                $post->save();

                $post->images()->save($image1);
            }
        if ($uploadedImage = $request->file('image2'))
            {
                $image2 = new Image();
                $image_path = $uploadedImage->getRealPath();
                Cloudder::upload($image_path,null);//直前にアップロードされた画像のpublicIdを取得する。
                $publicId = Cloudder::getPublicId();
                $logoUrl = Cloudder::secureShow($publicId, [
                    'width' => 500,
                    'height' => 400,
                ]);
                $image2->image_path = $logoUrl;
                $image2->public_id = $publicId;

                $post->images()->save($image2);
            }
        if ($uploadedImage = $request->file('image3'))
            {
                $image3 = new Image();
                $image_path = $uploadedImage->getRealPath();
                Cloudder::upload($image_path,null);//直前にアップロードされた画像のpublicIdを取得する。
                $publicId = Cloudder::getPublicId();
                $logoUrl = Cloudder::secureShow($publicId, [
                    'width' => 500,
                    'height' => 400,
                ]);
                $image3->image_path = $logoUrl;
                $image3->public_id = $publicId;

                $post->images()->save($image3);
            }
        if ($uploadedImage = $request->file('image4'))
            {
                $image4 = new Image();
                $image_path = $uploadedImage->getRealPath();
                Cloudder::upload($image_path,null);//直前にアップロードされた画像のpublicIdを取得する。
                $publicId = Cloudder::getPublicId();
                $logoUrl = Cloudder::secureShow($publicId, [
                    'width' => 500,
                    'height' => 400,
                ]);
                $image4->image_path = $logoUrl;
                $image4->public_id = $publicId;

                $post->images()->save($image4);
            }

        $post->images()->save($image1,$image2,$image3,$image4);

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
        $post->load('user', 'comments','images');
        return view('posts.show', compact('post'));
    }
}
