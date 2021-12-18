@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <h2 class="header-text text-muted">詳細</h2>
            <hr class="col-md-12">
        <div class="col-md-10">
            <div class="card-body col-md-6 float-left post-detail">
                <h2 class="text-muted">{{ $post->brand }}</h2>
                <h2 class="text-muted">{{ $post->cosme }}</h2>
                <h2 class="text-muted">{{ $post->price }}円</h2>
                <p class="text-muted">＜使い方＞<br>{{ $post->body }}</p>
                <p class="text-muted">＜使った感想＞<br>{{ $post->detail }}</p>
                {{-- <p>投稿日時：{{ $post->created_at }}</p> --}}
                {{-- <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary">編集する</a> --}}
                {{-- <form action='{{ route('posts.destroy', $post->id) }}' method='post'>
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <input type='submit' value='削除' class="btn btn-danger" onclick='return confirm("削除しますか？？");'>
                </form> --}}
            </div>
                <div id="carouselExampleIndicators" class="carousel slide col-md-6 float-right" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                    </ol>
                    <div class="carousel-inner bg-secondary">
                        @foreach ($post->images as $image)
                        <div class="carousel-item @if($loop->first) active @endif">
                            <img class="d-block w-20" src="{{ $image->image_path }}" alt="slide image">
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
            </div>
        </div>
        <hr class="col-md-12">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <button type="submit" class="btn text-muted text-secondary comment" data-toggle="modal" data-target="#exampleModalCenter"　width="40" height="40">
                <img src="https://res.cloudinary.com/dqxuxpwv9/image/upload/v1639018170/comment_dei2ik.png" width="40" height="40" alt="">コメント：{{$post->comments->count() }}
            </button>
            <div class="row justify-content-center like">
                <like-component
                :post="{{ json_encode($post)}}"
                ></like-component>
            </div>
            <p class="text-center text-muted comment-time">投稿日:{{ $post->created_at }}</p>
            {{-- <p>：{{$post->comments->count() }}</p> --}}
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="modal fade text-muted" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered text-muted" role="document">
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
                                                <textarea class="form-control" placeholder="内容" rows="6" name="body"></textarea>
                                            </div>
                                            <button type="submit" class="btn text-muted text-secondary" data-toggle="modal" data-target="#exampleModalCenter"　width="40" height="40">
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
                    <div class="col-md-4">
                    <h4 class="card-header">
                        @if ($comment->user->image_path == null)
                            <img src="{{ asset('assets/images/default.png') }}" class="rounded-circle img-thumbnail mb-3" width="20" height="20" alt="">
                        @else
                            <img src="{{ $comment->user->image_path }}" class="rounded-circle img-thumbnail mb-3" alt="">
                        @endif
                        <h4 class="text-muted comment-name">{{ $comment->user->name }}</h4>
                        <h4 class="text-muted comment-age">{{ $comment->user->age }}</h4>
                        <h4 class="text-muted comment-occupation">{{ $comment->user->occupation }}</h4>
                    </h4>
                    </div>
                    <div class="card-body comment-body text-muted">
                        {{-- <h5 class="card-title">投稿日時：{{ $comment->created_at }}</h5> --}}
                        <p class="card-text">{{ $comment->body }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
