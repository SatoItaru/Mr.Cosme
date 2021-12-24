@extends('layouts.app')

@section('content')
<div class="card col-md-7 mx-auto my-5 ">
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
            <div class="card-body col-5 profile-detail profile-show-body profile-user-detail">
                <h5 class="text-muted">アカウントネーム:{{ $user->name }}</h5>
                <h5 class="text-muted user-show-age">年代:{{ $user->age }}</h5>
                <h5 class="text-muted user-show-occupation">職業:{{ $user->occupation}}</h5>
                <h5 class="text-muted user-show-mail">メールアドレス:{{ $user->email}}</h5>
            </div>
        </div>
    </div>
    <div class="">
        <h2 class="text-muted">投稿一覧</h2>
    </div>
    <hr class="col-md-11">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9">

                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <a class="nav-item nav-link active text-muted" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">投稿一覧</a>
                            <a class="nav-item nav-link text-muted" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="true">BBクリーム</a>
                            <a class="nav-item nav-link text-muted" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="true">コンシーラー</a>
                            <a class="nav-item nav-link text-muted" id="nav-item-tab" data-toggle="tab" href="#nav-item" role="tab" aria-controls="nav-contact" aria-selected="true">フェイスパウダー</a>
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                            <div class="row">
                                @if($posts -> isEmpty())
                                <div class="card col-md-12 my-3 mx-auto">
                                    <p class="text-center my-3 text-muted">まだ投稿がありません。<br>あなたのお気に入りのコスメを投稿してみましょう。</p>
                                    <div class="text-center">
                                        <a href="{{ route('posts.create') }}" class="col-md-3 detail btn-anime bgleft mx-auto text-muted my-3"><span><i class="fas fa-plus"></i>投稿する</span></a>
                                    </div>
                                    <div class="col-md-12 text-center py-3">
                                        <img src="https://res.cloudinary.com/dqxuxpwv9/image/upload/v1640061684/BB%E3%82%AF%E3%83%AA%E3%83%BC%E3%83%A0_fmnj9g.jpg" alt="画像" class="rounded-circle img-thumbnail mb-3">
                                        <img src="https://res.cloudinary.com/dqxuxpwv9/image/upload/v1640062165/%E3%82%B3%E3%83%B3%E3%82%B7%E3%83%BC%E3%83%A9%E3%83%BC_yjm46r.jpg" alt="画像" class="rounded-circle img-thumbnail mb-3">
                                        <img src="https://res.cloudinary.com/dqxuxpwv9/image/upload/v1640062004/%E3%83%95%E3%82%A1%E3%83%B3%E3%83%86%E3%82%99%E3%83%BC%E3%82%B7%E3%83%A7%E3%83%B3_l7smmq.jpg" alt="画像" class="rounded-circle img-thumbnail mb-3">
                                    </div>
                                </div>
                                @else
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
                                    @endif
                                </div>
                            </div>
                            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                    <div class="row">
                                        @if($posts -> isEmpty())
                                    <div class="card col-md-12 my-3 mx-auto">
                                        <p class="text-center my-3 text-muted">まだ投稿がありません。<br>あなたのお気に入りのBBクリームを投稿してみましょう。</p>
                                        <div class="text-center">
                                            <a href="{{ route('posts.create') }}" class="col-md-3 detail btn-anime bgleft mx-auto text-muted my-3"><span><i class="fas fa-plus"></i>投稿する</span></a>
                                        </div>
                                        <div class="col-md-12 text-center py-3">
                                            <img src="https://res.cloudinary.com/dqxuxpwv9/image/upload/v1640061684/BB%E3%82%AF%E3%83%AA%E3%83%BC%E3%83%A0_fmnj9g.jpg" alt="画像" class="rounded-circle img-thumbnail mb-3">
                                            <img src="https://res.cloudinary.com/dqxuxpwv9/image/upload/v1640062165/%E3%82%B3%E3%83%B3%E3%82%B7%E3%83%BC%E3%83%A9%E3%83%BC_yjm46r.jpg" alt="画像" class="rounded-circle img-thumbnail mb-3">
                                            <img src="https://res.cloudinary.com/dqxuxpwv9/image/upload/v1640062004/%E3%83%95%E3%82%A1%E3%83%B3%E3%83%86%E3%82%99%E3%83%BC%E3%82%B7%E3%83%A7%E3%83%B3_l7smmq.jpg" alt="画像" class="rounded-circle img-thumbnail mb-3">
                                        </div>
                                    </div>
                                    @else
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
                                    @endif
                                </div>
                            </div>
                            <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                                <div class="row">
                                    @if($posts -> isEmpty())
                                    <div class="card col-md-12 my-3 mx-auto">
                                        <p class="text-center my-3 text-muted">まだ投稿がありません。<br>あなたのお気に入りのコンシーラーを投稿してみましょう。</p>
                                        <div class="text-center">
                                            <a href="{{ route('posts.create') }}" class="col-md-3 detail btn-anime bgleft mx-auto text-muted my-3"><span><i class="fas fa-plus"></i>投稿する</span></a>
                                        </div>
                                        <div class="col-md-12 text-center py-3">
                                            <img src="https://res.cloudinary.com/dqxuxpwv9/image/upload/v1640061684/BB%E3%82%AF%E3%83%AA%E3%83%BC%E3%83%A0_fmnj9g.jpg" alt="画像" class="rounded-circle img-thumbnail mb-3">
                                            <img src="https://res.cloudinary.com/dqxuxpwv9/image/upload/v1640062165/%E3%82%B3%E3%83%B3%E3%82%B7%E3%83%BC%E3%83%A9%E3%83%BC_yjm46r.jpg" alt="画像" class="rounded-circle img-thumbnail mb-3">
                                            <img src="https://res.cloudinary.com/dqxuxpwv9/image/upload/v1640062004/%E3%83%95%E3%82%A1%E3%83%B3%E3%83%86%E3%82%99%E3%83%BC%E3%82%B7%E3%83%A7%E3%83%B3_l7smmq.jpg" alt="画像" class="rounded-circle img-thumbnail mb-3">
                                        </div>
                                    </div>
                                    @else
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
                                    @endif
                                </div>
                            </div>
                            <div class="tab-pane fade" id="nav-item" role="tabpanel" aria-labelledby="nav-item-tab">
                                <div class="row">
                                    @if($posts -> isEmpty())
                                    <div class="card col-md-12 my-3 mx-auto">
                                        <p class="text-center my-3 text-muted">まだ投稿がありません。<br>あなたのお気に入りのフェイスパウダーを投稿してみましょう。</p>
                                        <div class="text-center">
                                            <a href="{{ route('posts.create') }}" class="col-md-3 detail btn-anime bgleft mx-auto text-muted my-3"><span><i class="fas fa-plus"></i>投稿する</span></a>
                                        </div>
                                        <div class="col-md-12 text-center py-3">
                                            <img src="https://res.cloudinary.com/dqxuxpwv9/image/upload/v1640061684/BB%E3%82%AF%E3%83%AA%E3%83%BC%E3%83%A0_fmnj9g.jpg" alt="画像" class="rounded-circle img-thumbnail mb-3">
                                            <img src="https://res.cloudinary.com/dqxuxpwv9/image/upload/v1640062165/%E3%82%B3%E3%83%B3%E3%82%B7%E3%83%BC%E3%83%A9%E3%83%BC_yjm46r.jpg" alt="画像" class="rounded-circle img-thumbnail mb-3">
                                            <img src="https://res.cloudinary.com/dqxuxpwv9/image/upload/v1640062004/%E3%83%95%E3%82%A1%E3%83%B3%E3%83%86%E3%82%99%E3%83%BC%E3%82%B7%E3%83%A7%E3%83%B3_l7smmq.jpg" alt="画像" class="rounded-circle img-thumbnail mb-3">
                                        </div>
                                    </div>
                                    @else
                                    @foreach ($posts as $post)
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
</div>
@endsection
