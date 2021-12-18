@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <h2 class="header-text text-muted">投稿一覧</h2>
            <hr class="col-md-12">
        <div class="col-md-9">
            <form class="mb-2 mt-4 text-center" method="GET" action="{{ route('posts.index') }}">
                <div class="btn-group">
                    <select class="form-control" name="order" id="">
                        <div class="dropdown-menu">
                            @if ($order === 'popular')
                            <option value="popular" selected="selected">人気順</option>
                            @else
                            <option value="popular">人気順</option>
                            @endif
                            @if ($order === 'expensive')
                            <option value="expensive" selected="selected">値段（高い順）</option>
                            @else
                            <option value="expensive">値段（高い順）</option>
                            @endif
                            @if ($order === 'cheap')
                            <option value="cheap" selected="selected">値段（安い順）</option>
                            @else
                            <option value="cheap">値段（安い順）</option>
                            @endif
                        </div>
                    </select>
                </div>
                <input class="card form-control my-2 mr-5" type="search" placeholder="フリーワード検索" name="search" value="@if (isset($search)) {{ $search }} @endif">
                <div class="d-flex justify-content-center">
                    <button class="btn search-circle" type="submit">
                        <img src="{{ asset('assets/images/search.png') }}"width="30" height="30" alt="">
                    </button>
                    <button class="btn my-2 ml-5">
                        <a href="{{ route('posts.index') }}" class="clear-button detail btn-anime bgleft"><span>
                            クリア
                        </span></a>
                    </button>
                </div>
            </form>
            <div class="row">
            @foreach ($posts as $post)
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
                        <h2 class="text-center text-muted">{{ $post->brand }}</h2>
                        <p class="text-center text-muted">#{{ $post->cosme }}</p>
                        <p class="text-center text-muted">{{ $post->price }}円</p>
                        <a href="{{ route('posts.show', $post->id) }}" class="detail btn-anime bgleft"><span>詳細へ</span></a>
                        </div>
                        <div class="card-footer created">
                            <p class="card-text">投稿日:{{ $post->created_at }}</p>
                        </div>
                    </div>
            </div>
            @endforeach
            </div>

            {{-- <div class="card ">

                <div class="card-header">
                    投稿一覧
                </div>
                @foreach ($posts as $post)
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
@endsection
