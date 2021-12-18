@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <h2 class="text-center text-muted">いいねした投稿一覧</h2>
            <hr class="col-md-12">
        <div class="col-md-9">
            <div class="col_3">
                @foreach ($user->favorites as $post)
                <div class="card" style="width: 17rem;">
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                        </ol>
                        <div class="carousel-inner">
                            @foreach ($post->images as $image)
                            <div class="carousel-item @if($loop->first) active @endif">
                                <img class="image card-img-top d-block w-20" src="{{ $image->image_path }}" alt="Card image cap　slide image">
                            </div>
                            @endforeach
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                        <div class="card-body">
                        <h5 class="card-title">{{ $post->brand }}</h5>
                        <p class="card-text">#{{ $post->cosme }}</p>
                        <p class="card-text">{{ $post->price }}円</p>
                        <a href="{{ route('posts.show', $post->id) }}" class="detail btn-anime bgleft"><span>詳細へ</span></a>
                        {{-- <a href="{{ route('posts.show', $post->id) }}" class="detail btn btn-primary">詳細へ</a> --}}
                        </div>
                        <div class="card-footer created">
                            <p class="card-text">投稿日:{{ $post->created_at }}</p>
                        </div>
                    </div>
                @endforeach
                </div>
            {{-- <div class="card text-center">
                <div class="card-header">
                    投稿一覧
                </div>
                @foreach ($user->favorites as $post)
                <div class="card-body">
                    <h5 class="card-title">{{ $post->brand }}</h5>
                    <p class="card-text">内容：{{ $post->body }}</p>
                    <p class="card-text">投稿者：{{ $post->user->name }}</p>
                    <a href="{{ route('posts.show', $post->id) }}" class="btn btn-primary">詳細へ</a>
                    <div class="row justify-content-center">
                        <like-component
                        :post="{{ json_encode($post)}}"
                        ></like-component>
                    </div>
                </div>
                <div class="card-footer text-muted">
                    投稿日時：{{ $post->created_at }}
                </div>
                @endforeach
            </div> --}}
        </div>
        {{-- <div class="col-md-2">
            <a href="{{ route('posts.create') }}" class="btn btn-primary">新規投稿</a>
        </div> --}}
    </div>
</div>
@endsection
