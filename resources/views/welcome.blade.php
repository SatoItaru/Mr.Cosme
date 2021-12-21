<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# article: http://ogp.me/ns/article#">
        <title>Mr.Cosme</title>
        <meta property="og:title" content="Mr.Cosme" />
        <meta property="og:type" content="website" />
        <meta property="og:url" content="https://mrcosme.herokuapp.com" />
        <meta property="og:image" content="https://mrcosme.herokuapp.com/assets/images/unsplash.jpg" />
        <meta property="og:site_name" content="Mr.Cosme（ミスターコスメ）" />
        <meta property="og:description" content="メンズコスメ情報交換 Q&Aサイト" />
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="twitter:card" content="summary_large_image" />
    </head>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

@extends('layouts.app')

@section('content')


    {{-- @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ route('login') }}" class="text-muted">Home</a>
                    @else
                        <a href="{{ route('login') }}" class="text-muted">ログイン</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="text-muted">新規登録</a>
                        @endif
                    @endauth
                </div>
            @endif --}}
    <section class="top-image">
        <div class="lp-container">
            <div class="justify-content-center">
                <div class="card top-image my-5">
                    <div class="text-center">
                        <h1 class="text-white my-3">Mr.Cosme</h1>
                        <h2 class="text-white">メンズメイク初心者大歓迎</h2>
                        <h2 class="text-white">メンズメイクに少しでも興味のある方へ</h2>
                        <a class="col-md-3 detail btn-anime bgleft text-center my-3 py-3" href="{{ route('login') }}"><span class="text-white">さっそく始める</span></a>
                    </div>
                    <div class="col-md-12 text-center py-3">
                        <img src="https://res.cloudinary.com/dqxuxpwv9/image/upload/v1640061684/BB%E3%82%AF%E3%83%AA%E3%83%BC%E3%83%A0_fmnj9g.jpg" alt="画像" class="rounded-circle img-thumbnail mb-3">
                        <img src="https://res.cloudinary.com/dqxuxpwv9/image/upload/v1640062165/%E3%82%B3%E3%83%B3%E3%82%B7%E3%83%BC%E3%83%A9%E3%83%BC_yjm46r.jpg" alt="画像" class="rounded-circle img-thumbnail mb-3">
                        <img src="https://res.cloudinary.com/dqxuxpwv9/image/upload/v1640062004/%E3%83%95%E3%82%A1%E3%83%B3%E3%83%86%E3%82%99%E3%83%BC%E3%82%B7%E3%83%A7%E3%83%B3_l7smmq.jpg" alt="画像" class="rounded-circle img-thumbnail mb-3">
                    </div>

                </div>
            </div>
        </div>
    </section>
    <section class="top-image">
        <div class="lp-container">
            <div class="content">
                <div class="">
                    <div class="text-center">
                        <h2 class="text-white my-5" >メンズメイク簡単3ステップ</h2>
                        <hr class="add-line">
                            <div class="card text-center top-image">
                                <h2 class="card-header text-center text-white">
                                    1. BBクリーム
                                    </h2>
                                    <div class="card-body">
                                    <p class="card-text text-white">
                                        これ一本で「日焼け止め」「化粧下地」＋「ファンデーションの役割」になります。<br>
                                        BBクリームを少量とり、「おでこ」「両頬」「鼻」「あご」に置いてから全体に馴染ませます。
                                    </p>
                                </div>
                            </div>
                            <div class="my-2">
                                {{-- <img src="{{ asset('assets/images/arrow.png') }}" alt="" class="cosme-arrow"> --}}
                            </div>
                            <div class="my-3">
                                <div class="card text-center top-image">
                                    <h2 class="card-header text-center text-white">
                                        2. コンシーラー
                                        </h2>
                                        <div class="card-body">
                                        <p class="card-text text-white">
                                            BBクリームで補正できなかった「ニキビ」「シミ」「青ヒゲ」などの上から直接馴染ませます。<br>
                                            カバー力があるので、目立ちやすい肌悩みを隠すのに向いています。
                                        </p>
                                    </div>
                                </div>
                                <div class="my-2">
                                    {{-- <img src="{{ asset('assets/images/arrow.png') }}" alt="" class="cosme-arrow"> --}}
                                </div>
                            <div class="my-3">
                                <div class="card text-center top-image">
                                    <h2 class="card-header text-center text-white">
                                        3. ファンデーション
                                        </h2>
                                        <div class="card-body">
                                        <p class="card-text text-white">
                                            BBクリームだけではテカリが出てしまうので、フェイスパウダーでサラサラにしてくれます。<br>
                                            ベースメイクの仕上げに使うので、化粧崩れを防ぎます。
                                        </p>
                                    </div>
                                </div>
                            </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="top-image">
        <div class="container">
            <h2 class="text-center my-5 text-white">基本機能</h2>
            <hr class="add-line">
            <div class="row text-center">
                <div class="col-md-4 my-3">
                    <div class="box mx-auto top-image">
                        <i class="fas fa-search fa-5x lp-icon"></i>
                        {{-- <img src="https://res.cloudinary.com/dqxuxpwv9/image/upload/v1640072615/iconmonstr-search-thin-240_lt0ukn.png" alt="" class="section3-image rounded-circle"> --}}
                        <p class="mt-4 text-white section3-text">メンズメイク初心者でも<br>3ステップを踏めば誰でも簡単に<br>メンズメイクができます。</p>
                        <p class="text-white section3-text">ブランドや価格で検索して<br>自分に合った商品を探してみましょう。</p>
                    </div>
                </div>
                <div class="col-md-4 my-3">
                    <div class="box mx-auto top-image">
                        <i class="far fa-images fa-5x lp-icon"></i>
                        {{-- <img src="https://res.cloudinary.com/dqxuxpwv9/image/upload/v1640072613/iconmonstr-picture-13-240_dmdjm3.png" alt="" class="section3-image rounded-circle"> --}}
                        <p class="mt-4 text-white section3-text">自分が投稿したコスメだけを<br>一覧で保管ができるので<br>自分専用ポーチとして確認ができます。</p>
                        <p class="text-white section3-text">あなたのオススメしたコスメが<br>他の方のコスメ選びの参考になります。</p>
                    </div>
                </div>
                <div class="col-md-4 my-3">
                    <div class="box mx-auto top-image">
                        <i class="far fa-thumbs-up fa-5x lp-icon"></i>
                        {{-- <img src="https://res.cloudinary.com/dqxuxpwv9/image/upload/v1640072612/iconmonstr-facebook-like-1-240_ixam8b.png" alt="" class="section3-image rounded-circle"> --}}
                        <p class="mt-4 text-white section3-text">気になるコスメの投稿を<br>いいねをして一覧で保管できます。<br></p>
                        <p class="text-white section3-text">肌悩みがあったり<br>購入する前の<br>参考にできます。</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="top-image py-5">
        <div class="lp-container">
            <h2 class="text-center my-5 text-white">お知らせ</h2>
            <hr class="add-line">
        </div>
        <div class="card col-md-8 lp-notice top-image text-center">
            <p class="text-white lp-notice-text">2021/12/25<span class="notice-content"></span></p>
        </div>
    </section>


@endsection

