<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Mr.Cosme</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            .top-image {
            background-image: url(https://res.cloudinary.com/dqxuxpwv9/image/upload/v1640059030/dior.back-image_tbi5qa.webp);
            background-repeat: no-repeat;
            background-position-x: center;
            padding-top: 1px;
            margin-top: -1px;
            padding-bottom: 1px;
            margin-bottom: -1px;

            }
            .profile-detail {
        padding: 25px 0 25px 60px;
        align-items: start;
        margin: 16px;
    }

    .text-muted {
        color: #ddd !important;
    }
    *, *:before, *:after {
        box-sizing: border-box;
    }

    .btn-anime {
        /*アニメーションの起点とするためrelativeを指定*/
        position: relative;
        overflow: hidden;
            /*ボタンの形状*/
        text-decoration: none;
        display: inline-block;
        margin-left: auto;
        margin-right: auto;
        border: 1px solid #555;/* ボーダーの色と太さ */
        border-radius:30px;
        padding: 10px 30px;
        text-align: center;
        outline: none;
            /*アニメーションの指定*/
        transition: ease .2s;
        box-shadow: 5px 5px 20px #c8c9cc, -5px -5px 20px #ffffff;
        }

        /*ボタン内spanの形状*/
        .btn-anime span {
        position: relative;
        z-index: 3;/*z-indexの数値をあげて文字を背景よりも手前に表示*/
        color:#333;
        }

        .btn-anime:hover span{
        color:#fff;
        }

        /*== 背景が流れる（左から右） */
        .bgleft:before {
        content: '';
            /*絶対配置で位置を指定*/
        position: absolute;
        top: 0;
        left: 0;
        z-index: 2;
            /*色や形状*/
        background:#333;/*背景色*/
        width: 100%;
        height: 100%;
            /*アニメーション*/
        transition: transform .6s cubic-bezier(0.8, 0, 0.2, 1) 0s;
        transform: scale(0, 1);
        transform-origin: right top;
        }

        /*hoverした際の形状*/
        .bgleft:hover:before{
        transform-origin:left top;
        transform:scale(1, 1);
    }
    .rounded-circle {
        width: 150px;
        height : 150px;
        border-radius: 50%;
    }
    .img-thumbnail {
    padding: 0.25rem;
    background-color: #f8fafc;
    border: 1px solid #dee2e6;
    border-radius:50%;
    max-width: 100%;
    height: auto;
    }
    .card {
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color:#f5f5f5;
    background-clip: border-box;
    border: 1px solid rgba(0, 0, 0, 0.125);
    border-radius: 0;
    box-shadow: 5px 5px 20px #c8c9cc, -5px -5px 20px #ffffff;
    }
    .make-card {
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color:#f5f5f5;
    background-clip: border-box;
    border: 1px solid rgba(0, 0, 0, 0.125);
    border-radius: 20px;
    box-shadow: 5px 5px 20px #c8c9cc, -5px -5px 20px #ffffff;
    margin-left: 200px;
    margin-right: 200px;
    }

    .cosme-arrow {
        width:30px
    }

    .triangle {
    width: 0;
    height: 0;
    border-left: 100px solid transparent;
    border-right: 100px solid transparent;
    border-top: 60px solid #ddd;
}
.text-center {
    text-align: center !important;
    }
    .box {
    background-color: #eee;
    width: 300px;
    height: 300px;
    border-radius: 30px;
    box-shadow: 5px 5px 20px #c8c9cc, -5px -5px 20px #ffffff;
    border: 1px solid rgba(0, 0, 0, 0.125);
    }
    .section3-image {
    width: 70px;
    height: 70px;
    margin-top: 50px;
    }
    .lp-section {
    max-width: 1440px;
    background-image: url(https://res.cloudinary.com/dqxuxpwv9/image/upload/v1640059030/dior.back-image_tbi5qa.webp);
            background-repeat: no-repeat;
            background-position-x: center;
            padding-top: 1px;
            margin-top: -1px;
            padding-bottom: 1px;
            margin-bottom: -1px;
}
.mr-auto,
.mx-auto {
    margin-right: auto !important;
    }

    .mb-auto,
    .my-auto {
    margin-bottom: auto !important;
    }

    .ml-auto,
    .mx-auto {
    margin-left: auto !important;
}

.mt-4,
.my-4 {
    margin-top: 0rem !important;
    }

    .mr-4,
    .mx-4 {
    margin-right: 1.5rem !important;
}

.mb-4,
.my-4 {
    margin-bottom: 0rem !important;
}

.col-md-4 {
    flex: 0 0 33.3333333333%;
    max-width: 33.3333333333%;
    }

    .mt-5,
.my-5 {
    margin-top: 3rem !important;
    }

    .mr-5,
    .mx-5 {
    margin-right: 3rem !important;
    }

    .mb-5,
    .my-5 {
    margin-bottom: 3rem !important;
}

    .row {
    display: flex;
    flex-wrap: wrap;
    margin-right: 180px;
    margin-left: 180px;
}

.lp-notice {
    background-color: #ddd;
    width: 100%;
    height: 200px;
    margin:;
    border-radius: 30px;
    display: flex;
    align-items: center;
    justify-content: start;
}
.mt-3,
    .my-3 {
    margin-top: 1rem !important;
    }

    .mr-3,
    .mx-3 {
    margin-right: 1rem !important;
    }

    .mb-3,
    .my-3 {
    margin-bottom: 1rem !important;
    }

        </style>
    </head>
    <body>
        <div class="container">
            @if (Route::has('login'))
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
            @endif
            <div style="background:#f5f5f5; padding:1px 1px; " class="welcome-title">
                <h2 >Mr.Cosme</h2>
            </div>
            {{-- <hr class="col-md-12"> --}}
            <section class="lp-section">
                <div class="lp-container">
                    <div class="content">
                        <div class="make-card">
                            <div class="col-md-5 lp-top-left text-center">
                                <h1 class="lp-heading">Mr.Cosme</h1>
                                <h2 class="mt-3 mb-4">メンズメイク初心者大歓迎</h2>
                                <h2 class="mt-3 mb-4">メンズメイクに少しでも興味のある方へ</h2>
                                <a class="detail btn-anime bgleft text-center" href="{{ route('login') }}"><span class="">さっそく始める</span></a>
                            </div>
                            <div class="col-md-7 lp-top-logo">
                                <img src="https://res.cloudinary.com/dqxuxpwv9/image/upload/v1640061684/BB%E3%82%AF%E3%83%AA%E3%83%BC%E3%83%A0_fmnj9g.jpg" alt="画像" class="rounded-circle img-thumbnail mb-3">
                                <img src="https://res.cloudinary.com/dqxuxpwv9/image/upload/v1640062165/%E3%82%B3%E3%83%B3%E3%82%B7%E3%83%BC%E3%83%A9%E3%83%BC_yjm46r.jpg" alt="画像" class="rounded-circle img-thumbnail mb-3">
                                <img src="https://res.cloudinary.com/dqxuxpwv9/image/upload/v1640062004/%E3%83%95%E3%82%A1%E3%83%B3%E3%83%86%E3%82%99%E3%83%BC%E3%82%B7%E3%83%A7%E3%83%B3_l7smmq.jpg" alt="画像" class="rounded-circle img-thumbnail mb-3">
                            </div>

                        </div>
                    </div>
                </div>
            </section>
            <section class="my-4 lp-section" style="padding-top: 40px;">
                <div class="lp-container">
                    <div class="content">
                        <div class="">
                            <div class="col-md-5 text-center">
                                <h2 class="lp-heading text-muted">メンズメイク簡単3ステップ</h2>
                                <div class="col-md-9">
                                    <div class="make-card text-center">
                                        <h2 class="card-header text-center text-muted">
                                            1. BBクリーム
                                            </h2>
                                            <div class="card-body">
                                            <p class="card-text text-muted">
                                                これ一本で「日焼け止め」「化粧下地」＋「ファンデーションの役割」になります。<br>
                                                BBクリームを少量とり、「おでこ」「両頬」「鼻」「あご」に置いてから全体に馴染ませます。
                                            </p>
                                        </div>
                                    </div>
                                    <div class="my-2">
                                        {{-- <img src="{{ asset('assets/images/arrow.png') }}" alt="" class="cosme-arrow"> --}}
                                    </div>
                                    <div class="my-3">
                                        <div class="make-card text-center">
                                            <h2 class="card-header text-center text-muted">
                                                2. コンシーラー
                                                </h2>
                                                <div class="card-body">
                                                <p class="card-text text-muted">
                                                    BBクリームで補正できなかった「ニキビ」「シミ」「青ヒゲ」などの上から直接馴染ませます。<br>
                                                    カバー力があるので、目立ちやすい肌悩みを隠すのに向いています。
                                                </p>
                                            </div>
                                        </div>
                                        <div class="my-2">
                                            {{-- <img src="{{ asset('assets/images/arrow.png') }}" alt="" class="cosme-arrow"> --}}
                                        </div>
                                    <div class="my-3">
                                        <div class="make-card text-center">
                                            <h2 class="card-header text-center text-muted">
                                                3. ファンデーション
                                                </h2>
                                                <div class="card-body">
                                                <p class="card-text text-muted">
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
                </div>
            </section>
            <section class="top-image" style="padding-top: 40px;">
                <div class="container py-5">
                    <h2 class="text-center my-5 text-muted">基本機能</h2>
                    <div class="row text-center">
                        <div class="col-md-4 my-3">
                            <div class="box mx-auto">
                                <img src="https://res.cloudinary.com/dqxuxpwv9/image/upload/v1640072615/iconmonstr-search-thin-240_lt0ukn.png" alt="" class="section3-image">
                                <p class="mt-4 text-muted section3-text">メンズメイク初心者でも<br>3ステップを踏めば誰でも簡単に<br>メンズメイクができます。</p>
                                <p class="text-muted section3-text">ブランドや価格で検索して<br>自分に合った商品を探してみましょう。</p>
                            </div>
                        </div>
                        <div class="col-md-4 my-3">
                            <div class="box mx-auto">
                                <img src="https://res.cloudinary.com/dqxuxpwv9/image/upload/v1640072613/iconmonstr-picture-13-240_dmdjm3.png" alt="" class="section3-image">
                                <p class="mt-4 text-muted section3-text">自分が投稿したコスメだけを<br>一覧で保管ができるので<br>自分専用ポーチとして確認ができます。</p>
                                <p class="text-muted section3-text">あなたのオススメしたコスメが<br>他の方のコスメ選びの参考になります。</p>
                            </div>
                        </div>
                        <div class="col-md-4 my-3">
                            <div class="box mx-auto">
                                <img src="https://res.cloudinary.com/dqxuxpwv9/image/upload/v1640072612/iconmonstr-facebook-like-1-240_ixam8b.png" alt="" class="section3-image">
                                <p class="mt-4 text-muted section3-text">気になるコスメの投稿を<br>いいねをして一覧で保管できます。<br></p>
                                <p class="text-muted section3-text">肌悩みがあったり<br>購入する前の<br>参考にできます。</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="lp-section section2 py-5" style="padding-top: 40px;">
                <div class="lp-container">
                    <h2 class="text-center my-5 text-muted">お知らせ</h2>
                </div>
                <div class="card col-md-8 lp-notice">
                    <p class="text-muted lp-notice-text">2021/12/25<span class="notice-content"></span></p>
                </div>
            </section>
        </div>
    </body>
</html>
