@extends('layouts.app')

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.10.2/css/all.css">


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <h2 class="header-create text-muted">新規投稿作成</h2>
            <hr class="col-md-12">
        <div class="col-md-9">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                {{csrf_field()}}
                    <div class="form-group">
                        {{-- <label>ブランド</label> --}}
                        <input type="text" class="form-control" placeholder="ブランド名" name="brand">
                    </div>
                    <div class="form-group ">
                        <select type="text" class="form-control" name="cosme">
                            <option value="">コスメの種類</option>
                            @foreach (Config::get('cosme.cosme_name') as $key => $val)
                                <option value="{{ $key }}">{{ $val }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        {{-- <label>価格</label> --}}
                        <input class="form-control" placeholder="価格" name="price" type="number" step="1000">
                    </div>
                    <div style="text-transform: none;">※価格は数字で入れてください。</div>

                    <div class="form-group">
                        {{-- <label>使い方</label> --}}
                        <textarea class="form-control" placeholder="コスメの使い方" rows="2" name="body"></textarea>
                    </div>
                    <div class="form-group">
                        {{-- <label>使った感想</label> --}}
                        <textarea class="form-control" placeholder="コスメを使った感想" rows="4" name="detail"></textarea>
                    </div>
                    <div class="form-group">
                        {{-- <label>ブランド</label> --}}
                        <input type="url" class="form-control" placeholder="商品のURL" name="url">
                    </div>
                    <div class="form-group">
                            <label for="image">画像</label>
                            <input type="file" class="form-control-file" id="image" name="image1">
                            <input type="file" class="form-control-file" id="image" name="image2">
                            <input type="file" class="form-control-file" id="image" name="image3">
                            <input type="file" class="form-control-file" id="image" name="image4">
                    </div>
                    <div style="text-transform: none;"><i class="far fa-lightbulb"></i>ビフォーアフターを載せてみましょう
                    </div>
                        <button type="submit" class="detail btn-anime bgleft text-center text-muted"><span>作成する</span></button>
                </form>
            </div>
        </div>
    </div>
@endsection
