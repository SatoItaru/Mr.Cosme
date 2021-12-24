@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <h2 class="header-text text-muted">いいねした投稿一覧</h2>
        <hr class="col-md-12">
        <div class="col-md-9">
            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <a class="nav-item nav-link active text-muted" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">いいね一覧</a>
                    <a class="nav-item nav-link text-muted" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="true">BBクリーム</a>
                    <a class="nav-item nav-link text-muted" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="true">コンシーラー</a>
                    <a class="nav-item nav-link text-muted" id="nav-item-tab" data-toggle="tab" href="#nav-item" role="tab" aria-controls="nav-contact" aria-selected="true">フェイスパウダー</a>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                    <div class="row">
                        @if($user->favorites -> isEmpty())
                        <div class="card col-md-12 my-3 mx-auto">
                            <p class="text-center my-3 text-muted">いいねした投稿がありません。<br>気になる記事をいいねしてみましょう。</p>
                            <div class="text-center">
                                <a href="{{ route('posts.index') }}" class="col-md-3 detail btn-anime bgleft mx-auto text-muted my-3"><span><i class="fas fa-home"></i>ホーム</span></a>
                            </div>
                            <div class="col-md-12 text-center py-3">
                                <img src="https://res.cloudinary.com/dqxuxpwv9/image/upload/v1640061684/BB%E3%82%AF%E3%83%AA%E3%83%BC%E3%83%A0_fmnj9g.jpg" alt="画像" class="rounded-circle img-thumbnail mb-3">
                                <img src="https://res.cloudinary.com/dqxuxpwv9/image/upload/v1640062165/%E3%82%B3%E3%83%B3%E3%82%B7%E3%83%BC%E3%83%A9%E3%83%BC_yjm46r.jpg" alt="画像" class="rounded-circle img-thumbnail mb-3">
                                <img src="https://res.cloudinary.com/dqxuxpwv9/image/upload/v1640062004/%E3%83%95%E3%82%A1%E3%83%B3%E3%83%86%E3%82%99%E3%83%BC%E3%82%B7%E3%83%A7%E3%83%B3_l7smmq.jpg" alt="画像" class="rounded-circle img-thumbnail mb-3">
                            </div>
                        </div>
                        @else
                        @foreach ($user->favorites as $post)
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
                                @endif
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                <div class="row">
                                    @if($user->favorites -> isEmpty())
                            <div class="card col-md-12 my-3 mx-auto">
                                <p class="text-center my-3 text-muted">いいねした投稿がありません。<br>気になる記事をいいねしてみましょう。</p>
                                <div class="text-center">
                                    <a href="{{ route('posts.index') }}" class="col-md-3 detail btn-anime bgleft mx-auto text-muted my-3"><span><i class="fas fa-home"></i>ホーム</span></a>
                                </div>
                                <div class="col-md-12 text-center py-3">
                                    <img src="https://res.cloudinary.com/dqxuxpwv9/image/upload/v1640061684/BB%E3%82%AF%E3%83%AA%E3%83%BC%E3%83%A0_fmnj9g.jpg" alt="画像" class="rounded-circle img-thumbnail mb-3">
                                    <img src="https://res.cloudinary.com/dqxuxpwv9/image/upload/v1640062165/%E3%82%B3%E3%83%B3%E3%82%B7%E3%83%BC%E3%83%A9%E3%83%BC_yjm46r.jpg" alt="画像" class="rounded-circle img-thumbnail mb-3">
                                    <img src="https://res.cloudinary.com/dqxuxpwv9/image/upload/v1640062004/%E3%83%95%E3%82%A1%E3%83%B3%E3%83%86%E3%82%99%E3%83%BC%E3%82%B7%E3%83%A7%E3%83%B3_l7smmq.jpg" alt="画像" class="rounded-circle img-thumbnail mb-3">
                                </div>
                            </div>
                            @else
                            @foreach ($user->favorites as $post)
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
                            @endif
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                        <div class="row">
                            @if($user->favorites -> isEmpty())
                            <div class="card col-md-12 my-3 mx-auto">
                                <p class="text-center my-3 text-muted">いいねした投稿がありません。<br>気になる記事をいいねしてみましょう。</p>
                                <div class="text-center">
                                    <a href="{{ route('posts.index') }}" class="col-md-3 detail btn-anime bgleft mx-auto text-muted my-3"><span><i class="fas fa-home"></i>ホーム</span></a>
                                </div>
                                <div class="col-md-12 text-center py-3">
                                    <img src="https://res.cloudinary.com/dqxuxpwv9/image/upload/v1640061684/BB%E3%82%AF%E3%83%AA%E3%83%BC%E3%83%A0_fmnj9g.jpg" alt="画像" class="rounded-circle img-thumbnail mb-3">
                                    <img src="https://res.cloudinary.com/dqxuxpwv9/image/upload/v1640062165/%E3%82%B3%E3%83%B3%E3%82%B7%E3%83%BC%E3%83%A9%E3%83%BC_yjm46r.jpg" alt="画像" class="rounded-circle img-thumbnail mb-3">
                                    <img src="https://res.cloudinary.com/dqxuxpwv9/image/upload/v1640062004/%E3%83%95%E3%82%A1%E3%83%B3%E3%83%86%E3%82%99%E3%83%BC%E3%82%B7%E3%83%A7%E3%83%B3_l7smmq.jpg" alt="画像" class="rounded-circle img-thumbnail mb-3">
                                </div>
                            </div>
                            @else
                                @foreach ($user->favorites as $post)
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
                                @endif
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav-item" role="tabpanel" aria-labelledby="nav-item-tab">
                            <div class="row">
                                @if($user->favorites -> isEmpty())
                                <div class="card col-md-12 my-3 mx-auto">
                                    <p class="text-center my-3 text-muted">いいねした投稿がありません。<br>気になる記事をいいねしてみましょう。</p>
                                    <div class="text-center">
                                        <a href="{{ route('posts.index') }}" class="col-md-3 detail btn-anime bgleft mx-auto text-muted my-3"><span><i class="fas fa-home"></i>ホーム</span></a>
                                    </div>
                                    <div class="col-md-12 text-center py-3">
                                        <img src="https://res.cloudinary.com/dqxuxpwv9/image/upload/v1640061684/BB%E3%82%AF%E3%83%AA%E3%83%BC%E3%83%A0_fmnj9g.jpg" alt="画像" class="rounded-circle img-thumbnail mb-3">
                                        <img src="https://res.cloudinary.com/dqxuxpwv9/image/upload/v1640062165/%E3%82%B3%E3%83%B3%E3%82%B7%E3%83%BC%E3%83%A9%E3%83%BC_yjm46r.jpg" alt="画像" class="rounded-circle img-thumbnail mb-3">
                                        <img src="https://res.cloudinary.com/dqxuxpwv9/image/upload/v1640062004/%E3%83%95%E3%82%A1%E3%83%B3%E3%83%86%E3%82%99%E3%83%BC%E3%82%B7%E3%83%A7%E3%83%B3_l7smmq.jpg" alt="画像" class="rounded-circle img-thumbnail mb-3">
                                    </div>
                                </div>
                                @else
                                @foreach ($user->favorites as $post)
                                @if ($post->cosme === 'フェイスパウダー')
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
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</div>
@endsection
