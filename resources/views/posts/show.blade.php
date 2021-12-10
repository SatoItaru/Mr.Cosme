@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card-header">
                <h5>タイトル：{{ $post->title }}</h5>
            </div>
            <div class="card-body">
                <p class="card-text">＜使い方＞<br>{{ $post->body }}</p>
                <p class="card-text">アイテム名<br>{{ $post->item }}</p>
                <img src="{{ $post->image_path }}" alt="画像">
                <p>投稿日時：{{ $post->created_at }}</p>
                {{-- <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary">編集する</a> --}}
                {{-- <form action='{{ route('posts.destroy', $post->id) }}' method='post'>
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <input type='submit' value='削除' class="btn btn-danger" onclick='return confirm("削除しますか？？");'>
                </form> --}}
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <button type="submit" class="btn btn-light text-secondary" data-toggle="modal" data-target="#exampleModalCenter"　width="40" height="40">
                <img src="https://res.cloudinary.com/dqxuxpwv9/image/upload/v1639018170/comment_dei2ik.png" width="40" height="40" alt="">コメント
            </button>
            <p>：{{$post->comments->count() }}</p>
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">コメント</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('comments.store') }}" method="POST">
                                        {{csrf_field()}}
                                        <input type="hidden" name="post_id" value="{{ $post->id }}">
                                            <div class="form-group">
                                                <textarea class="form-control" placeholder="内容" rows="5" name="body"></textarea>
                                            </div>
                                            <button type="submit" class="btn btn-light text-secondary" data-toggle="modal" data-target="#exampleModalCenter"　width="40" height="40">
                                                <img src="https://res.cloudinary.com/dqxuxpwv9/image/upload/v1639018170/comment_dei2ik.png" width="40" height="40" alt="">コメント</button>
                                    </form>
                                </div>
                            <div class="modal-footer">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-12">
            @foreach ($post->comments as $comment)
                <div class="card mt-3">
                    <h5 class="card-header">
                        @if ($comment->user->image_path == null)
                            <img src="{{ asset('assets/images/default.png') }}" class="rounded-circle img-thumbnail mb-3" width="40" height="40" alt="">
                        @else
                            <img src="{{ $comment->user->image_path }}" class="rounded-circle img-thumbnail mb-3" width="40" height="40" alt="">
                        @endif
                        {{ $comment->user->name }}
                        {{ $comment->user->age }}
                        {{ $comment->user->occupation }}
                    </h5>
                    <div class="card-body">
                        {{-- <h5 class="card-title">投稿日時：{{ $comment->created_at }}</h5> --}}
                        <h5 class="card-text">内容：{{ $comment->body }}</h5>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
