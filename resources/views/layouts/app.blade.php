<!doctype html>
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
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.10.2/css/all.css">


    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ route('posts.index') }}">
                    {{-- {{ config('app.name', 'Mr.Cosme') }} --}}
                    <h2 class="title-header">Mr.Cosme</h2>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        @if( Auth::check() )
                        <a href="{{ route('posts.index', Auth::id()) }}" class="home-button detail btn-anime bgleft text-center text-muted"><span><i class="fas fa-home"></i>ホーム</span></a>
                        @endif
                        @if( Auth::check() )
                        <a href="{{ route('cosmes.show', Auth::id()) }}" class="cosme-button detail btn-anime bgleft text-center text-muted"><span><i class="far fa-question-circle"></i>コスメの使い方</span></a>
                        @endif
                        @if( Auth::check() )
                        <a href="{{ route('likes.show', Auth::id()) }}" class="like-button detail btn-anime bgleft text-center text-muted"><span><i class="far fa-thumbs-up"></i>いいねした投稿</span></a>
                        @endif
                        @if( Auth::check() )
                            <a href="{{ route('posts.create') }}" class="post-button detail btn-anime bgleft text-center text-muted"><span><i class="fas fa-plus"></i>投稿する</span></a>
                        @endif

                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('ログイン') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('新規登録') }}</a>
                                </li>
                            @endif
                            @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a href="{{ route('users.show', Auth::id()) }}" class="dropdown-item">アカウント</a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                        {{ __('ログアウト') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-0">
            @yield('content')
        </main>
    </div>
</body>
</html>
