@extends('layouts.app')

@section('content')
<div class="card col-md-8 mx-auto my-5 profile-show">
    <div class="edit-profile">
        <a href="{{ route('users.edit', Auth::id()) }}" class="btn">
            <img src="{{ asset('assets/images/edit.png') }}" alt="" style="width: 20px; height:20px;">
            編集する
        </a>
    </div>
        <div class="row">
            <div class="card-body col-md-5 profile-show-body">
                @if ($user->image_path == null)
                    <img src="{{ asset('assets/images/default.png') }}"class="profile-image" alt="">
                @else
                <div class="icon-container">
                    <img src="{{ $user->image_path }}" class="icon rounded-circle img-thumbnail mb-3" alt="画像">
                </div>
                @endif
            </div>
            <div class="card-body col-5 profile-detail profile-show-body">
                <p class="text-muted">アカウントネーム:{{ $user->name }}</p>
                <p class="text-muted">年代:{{ $user->age }}</p>
                <p class="text-muted">職業:{{ $user->occupation}}</p>
                <p class="text-muted">メールアドレス:{{ $user->email}}</p>
            </div>
    </div>
</div>
<h2 class="header-user text-muted">投稿一覧</h2>
<hr class="col-md-11">
<div class="container">
    {{-- <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card col-md-6 mx-auto my-5 profile-show">
                <div class="card-body d-flex flex-row">
                    <div class="icon-container">
                        @if ($user->image_path == null)
                        <img src="{{ asset('assets/images/default.png') }}"class="icon img-thumbnail mb-3" alt="">
                        @else
                        <img src="{{ $user->image_path }}" class="icon img-thumbnail mb-3" alt="画像">
                        @endif
                    </div>
                    <div class="profile">
                        <h5>アカウントネーム : {{ $user->name }}</h5>
                        <h5>年代 : {{ $user->age }}</h5>
                        <h5>職業 : {{ $user->occupation }}</h5>
                        <h5>メールアドレス : {{ $user->email}}</h5>
                    </div>
                    <div>
                        <a href="{{ route('users.edit', Auth::id()) }}" class=" edit btn">
                            <img src="{{ asset('assets/images/edit.png') }}" alt="" style="width: 20px; height:20px;">
                            編集する
                        </a>
                    </div>
                </div>
            </div> --}}
            <div class="row justify-content-center">
                <div class="col-md-9">
                    <div class="row">
                    @foreach ($user->posts as $post)
                    <div class="col-md-4 my-2">
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
                    </div>
                        @endforeach
                    </div>
                    {{-- <div class="card text-center">
                        <div class="card-header">
                            投稿一覧
                        </div>
                        @foreach ($user->posts as $post)
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
            </div>
        </div>
    </div>
    {{-- <div class="row justify-content-center">
        <div class="col-md-9">
            @foreach ($user->posts as $post)
            <div class="card" style="width: 18rem;">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                    </ol>
                    <div class="carousel-inner bg-secondary">
                        @foreach ($post->images as $image)
                        <div class="carousel-item @if($loop->first) active @endif">
                            <img class="card-img-top d-block w-20" src="{{ $image->image_path }}" alt="Card image cap　slide image">
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
                    <p class="card-text">{{ $post->detail }}</p>
                    <a href="{{ route('posts.show', $post->id) }}" class="btn btn-primary">詳細へ</a>
                    </div>
                </div>
            @endforeach
            <div class="card text-center">
                <div class="card-header">
                    投稿一覧
                </div>
                @foreach ($user->posts as $post)
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
            </div>
        </div>
    </div> --}}
</div>
@endsection
