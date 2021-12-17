<?php

namespace App\Http\Controllers;

use Auth;
use App\Post;
use App\User;
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
    public function index(Request $request)
    {
        $order = $request->input('order');

        // 検索フォームで入力された値を取得する
        $search = $request->input('search');

        // クエリビルダ
        $query = Post::query();

       // もし検索フォームにキーワードが入力されたら
        if ($search !== null) {

            // 全角スペースを半角に変換
            $spaceConversion = mb_convert_kana($search, 's');

            // 単語を半角スペースで区切り、配列にする（例："山田 翔" → ["山田", "翔"]）
            $wordArraySearched = preg_split('/[\s,]+/', $spaceConversion, -1, PREG_SPLIT_NO_EMPTY);


            // 単語をループで回し、ユーザーネームと部分一致するものがあれば、$queryとして保持される
            foreach($wordArraySearched as $value) {
                $query->where('brand', 'like', '%'.$value.'%')
                        ->orWhere('cosme', 'like', '%'.$value.'%')
                        ->orWhere('body', 'like', '%'.$value.'%')
                        ->orWhere('detail', 'like', '%'.$value.'%')
                        ->orWhere('price', 'like', '%'.$value.'%');
            }
        }
        if($order === 'popular'){
            $query=Post::withCount('favorites')->orderBy('favorites_count', 'desc');
        } elseif ($order === 'expensive'){
            $query->orderBy('price', 'desc');
        } elseif ($order === 'cheap'){
            $query->orderBy('price', 'asc');
        }
        // 上記で取得した$queryをページネートにし、変数$usersに代入
            $posts = $query->paginate(20);
        // ビューにpostsとsearchを変数として渡す
        // return view('posts.index')
        //     ->with([
        //         'posts' => $posts,
        //         'search' => $search,
        //         'order' => $order,
        //     ]);
        return view('posts.index', compact('posts','search','order'));
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

        $post = Post::find(1);

        $post = new Post();

        $post->brand = $request->brand;
        $post->cosme  = $request->cosme;
        $post->body  = $request->body;
        $post->detail  = $request->detail;
        $post->price  = $request->price;

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
