@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body d-flex flex-row">
                    <div>
                        @if ($user->image_path == null)
                        <img src="{{ asset('assets/images/default.png') }}"class="rounded-circle img-thumbnail mb-3" width="150" height="150" alt="">
                        @else
                        <img src="{{ $user->image_path }}" class="rounded-circle img-thumbnail mb-3" width="150" height="150" alt="画像">
                        @endif
                    </div>
                    <div>
                        <h5>アカウントネーム : {{ $user->name }}</h5>
                        <h5>年代 : {{ $user->age }}</h5>
                        <h5>職業 : {{ $user->occupation }}</h5>
                        <h5>メールアドレス : {{ $user->email}}</h5>
                        <a href="{{ route('users.edit', Auth::id()) }}" class="btn btn-primary">編集する</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
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
    </div>
</div>
@endsection
