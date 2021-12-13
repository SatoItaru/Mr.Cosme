@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
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
                        <label>ブランド</label>
                        <input type="text" class="form-control" placeholder="ブランド名を入力して下さい" name="brand">
                    </div>
                    <div class="form-group ">
                        <select type="text" class="form-control" name="cosme">
                            <option value="">コスメ</option>
                            @foreach (Config::get('cosme.cosme_name') as $key => $val)
                                <option value="{{ $key }}">{{ $val }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label>価格</label>
                        <input class="form-control" placeholder="価格を入れてください" name="price">
                    </div>

                    <div class="form-group">
                        <label>使い方</label>
                        <textarea class="form-control" placeholder="使い方を入れてください" rows="3" name="body"></textarea>
                    </div>
                    <div class="form-group">
                        <label>使った感想</label>
                        <textarea class="form-control" placeholder="使った感想を入れてください" rows="5" name="detail"></textarea>
                    </div>
                    <div class="form-group">
                            <label for="image">画像</label>
                            <input type="file" class="form-control-file" id="image" name="image1">
                            <input type="file" class="form-control-file" id="image" name="image2">
                            <input type="file" class="form-control-file" id="image" name="image3">
                            <input type="file" class="form-control-file" id="image" name="image4">
                    </div>
                        <button type="submit" class="btn btn-primary">作成する</button>
                </form>
            </div>
        </div>
    </div>
@endsection
