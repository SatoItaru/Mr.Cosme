@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form class="mb-2 mt-4 text-center" method="GET" action="{{ route('posts.index') }}">
                <div class="btn-group">
                    <select class="form-control" name="order" id="">
                        <div class="dropdown-menu">
                            <option value="popular">人気順</option>
                            <option value="latest">新しい順</option>
                            <option value="oldest">古い順</option>
                        </div>
                    </select>
                </div>
                <input class="form-control my-2 mr-5" type="search" placeholder="フリーワード検索" name="search" value="@if (isset($search)) {{ $search }} @endif">
                <div class="d-flex justify-content-center">
                    <button class="btn btn-info my-2" type="submit">検索</button>
                    <button class="btn btn-secondary my-2 ml-5">
                        <a href="{{ route('posts.index') }}" class="text-white">
                            クリア
                        </a>
                    </button>
                </div>
            </form>
            <div class="card text-center">
                <div class="card-header">
                    投稿一覧
                </div>
                @foreach ($posts as $post)
                <div class="card-body">
                    <h5 class="card-title">{{ $post->brand }}</h5>
                    {{-- <p class="card-text">内容：{{ $post->body }}</p> --}}
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
        <div class="col-md-2">
            <a href="{{ route('posts.create') }}" class="btn btn-primary">新規投稿</a>
        </div>
    </div>
</div>
@endsection
