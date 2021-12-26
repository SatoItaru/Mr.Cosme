@extends('layouts.app')

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.10.2/css/all.css">


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="container">
            <div class="row justify-content-center">
                <h2 class="text-muted  col-md-9">新規投稿作成</h2>
            </div>
            </div>
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
                        <input type="text" class="form-control @error('brand') is-invalid @enderror" placeholder="ブランド名" name="brand" value="{{ old('brand') }}" required autocomplete="brand" autofocus>
                        @error('brand')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                        @enderror
                    </div>
                    <div class="form-group ">
                        <select type="text" class="form-control @error('cosme') is-invalid @enderror" name="cosme" required autocomplete="cosme" autofocus>
                            <option disabled selected value="{{ old('cosme') }}">コスメの種類</option>
                            @foreach (Config::get('cosme.cosme_name') as $key => $val)
                                <option value="{{ $key }}" @if(old('cosme')== $key) selected @endif>{{ $val }}</option>
                            @endforeach
                        </select>
                        @error('cosme')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        {{-- <label>価格</label> --}}
                        <input class="form-control @error('price') is-invalid @enderror" placeholder="価格" name="price" type="number" value="{{ old('price') }}" required autocomplete="price" autofocus>
                        @error('price')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <div style="text-transform: none;">※価格は数字で入れてください。</div>
                    </div>


                    <div class="form-group">
                        {{-- <label>使い方</label> --}}
                        <textarea class="form-control @error('body') is-invalid @enderror" placeholder="コスメの使い方" rows="2" name="body" required autocomplete="body" autofocus>{{ old('body') }}</textarea>
                        @error('body')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        {{-- <label>使った感想</label> --}}
                        <textarea class="form-control @error('detail') is-invalid @enderror" placeholder="コスメを使った感想" rows="4" name="detail" required autocomplete="detail" autofocus>{{ old('detail') }}</textarea>
                        @error('detail')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        {{-- <label>ブランド</label> --}}
                        <input type="url" class="form-control @error('url') is-invalid @enderror" placeholder="商品のURL" name="url" value="{{ old('url') }}" required autocomplete="url" autofocus>
                        @error('url')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                            <label for="image">画像</label>
                            <input type="file" class="form-control-file @error('image1') is-invalid @enderror" id="image" name="image1" required autocomplete="image1" autofocus>
                            <input type="file" class="form-control-file" id="image" name="image2">
                            <input type="file" class="form-control-file" id="image" name="image3">
                            <input type="file" class="form-control-file" id="image" name="image4">
                            @error('image1')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>
                    <div style="text-transform: none;"><i class="far fa-lightbulb"></i>ビフォーアフターを載せてみましょう
                    </div>
                        <button type="submit" class="detail btn-anime bgleft text-center text-muted"><span>作成する</span></button>
                </form>
            </div>
        </div>
    </div>
@endsection
