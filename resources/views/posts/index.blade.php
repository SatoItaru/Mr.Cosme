@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <h2 class="header-post text-muted">投稿一覧</h2>
            <hr class="col-md-12">
        <div class="col-md-9">
            <form class="mb-2 mt-4 text-center" method="GET" action="{{ route('posts.index') }}">
                <div class="btn-group">
                    <select class="form-control" name="order" id="">
                        <div class="dropdown-menu">
                            @if ($order === 'popular')
                            <option class="text-muted" value="popular" selected="selected">人気順</option>
                            @else
                            <option class="text-muted" value="popular">人気順</option>
                            @endif
                            @if ($order === 'expensive')
                            <option class="text-muted" value="expensive" selected="selected">値段（高い順）</option>
                            @else
                            <option class="text-muted" value="expensive">値段（高い順）</option>
                            @endif
                            @if ($order === 'cheap')
                            <option class="text-muted" value="cheap" selected="selected">値段（安い順）</option>
                            @else
                            <option class="text-muted" value="cheap">値段（安い順）</option>
                            @endif
                        </div>
                    </select>
                </div>
                <input class="card form-control-search my-2 mr-5" type="search" placeholder="フリーワード検索" name="search" value="@if (isset($search)) {{ $search }} @endif">
                <div class="d-flex justify-content-center">
                    <button class="btn search-circle" type="submit">
                        <img src="{{ asset('assets/images/search.png') }}"width="30" height="30" alt="">
                    </button>
                    <button class="btn clear-button">
                        <a href="{{ route('posts.index') }}" class="clear-button-innner detail btn-anime bgleft"><span>
                            クリア
                        </span></a>
                    </button>
                </div>
            </form>
            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <a class="nav-item nav-link active text-muted" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">投稿一覧</a>
                    <a class="nav-item nav-link text-muted" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="true">BBクリーム</a>
                    <a class="nav-item nav-link text-muted" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="true">コンシーラー</a>
                    <a class="nav-item nav-link text-muted" id="nav-item-tab" data-toggle="tab" href="#nav-item" role="tab" aria-controls="nav-contact" aria-selected="true">ファンデーション</a>
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
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
                                        <p class="text-center text-muted">{{ $post->cosme }}</p>
                                        <p class="text-center text-muted">{{ $post->price }}円</p>
                                        <a href="{{ route('posts.show', $post->id) }}" class="detail btn-anime bgleft"><span>詳細へ</span></a>
                                        </div>
                                        <div class="card-footer created">
                                            <p class="text-center text-muted">投稿日:{{ $post->created_at }}</p>
                                        </div>
                                    </div>
                            </div>
                            @endforeach
                            </div>
                    </div>
                    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                        <div class="row">
                            @foreach ($posts as $post)
                            @if ($post->cosme === 'BBクリーム')
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
                                        <p class="text-center text-muted">{{ $post->cosme }}</p>
                                        <p class="text-center text-muted">{{ $post->price }}円</p>
                                        <a href="{{ route('posts.show', $post->id) }}" class="detail btn-anime bgleft"><span>詳細へ</span></a>
                                        </div>
                                        <div class="card-footer created">
                                            <p class="text-center text-muted">投稿日:{{ $post->created_at }}</p>
                                        </div>
                                    </div>
                            </div>
                            @endif
                            @endforeach
                            </div>
                    </div>
                    <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                        <div class="row">
                            @foreach ($posts as $post)
                            @if ($post->cosme === 'コンシーラー')
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
                                        <p class="text-center text-muted">{{ $post->cosme }}</p>
                                        <p class="text-center text-muted">{{ $post->price }}円</p>
                                        <a href="{{ route('posts.show', $post->id) }}" class="detail btn-anime bgleft"><span>詳細へ</span></a>
                                        </div>
                                        <div class="card-footer created">
                                            <p class="text-center text-muted">投稿日:{{ $post->created_at }}</p>
                                        </div>
                                    </div>
                            </div>
                            @endif
                            @endforeach
                            </div>
                    </div>
                    <div class="tab-pane fade" id="nav-item" role="tabpanel" aria-labelledby="nav-item-tab">
                        <div class="row">
                            @foreach ($posts as $post)
                            @if ($post->cosme === 'ファンデーション')
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
                                        <p class="text-center text-muted">{{ $post->cosme }}</p>
                                        <p class="text-center text-muted">{{ $post->price }}円</p>
                                        <a href="{{ route('posts.show', $post->id) }}" class="detail btn-anime bgleft"><span>詳細へ</span></a>
                                        </div>
                                        <div class="card-footer created">
                                            <p class="text-center text-muted">投稿日:{{ $post->created_at }}</p>
                                        </div>
                                    </div>
                            </div>
                            @endif
                            @endforeach
                            </div>
                    </div>
                </div>
        </div>
    </div>
</div>
@endsection
