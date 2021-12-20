@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="account-edit text-muted">アカウント編集</h2>
            <hr class="col-md-12">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card my-4">
                {{-- <div class="card-header text-center">ユーザー情報を編集</div> --}}
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    {{method_field('PATCH')}}
                        <div class="form-group row justify-content-center">
                            <div class="col-md-8">
                                <div class="row my-4">
                                    <label for="image" class="text-muted">アカウント画像</label>
                                    <input type="file" class="form-control-file" id="image" name="image">
                                </div>

                                <div class="row my-4">
                                    <input type="text" class="form-control" placeholder='新しいアカウントネーム' value="{{ $user->name }}" name='name'>
                                </div>

                                <div class="row my-4">
                                    <select type="text" class="form-control" name="age">
                                        {{-- <option value="{{ $user->age }}">年代</option> --}}
                                            @foreach (Config::get('age.age_select') as $key => $val)
                                                @if ($val === $user->age)
                                                    <option value="{{ $key }}" selected="selected">{{ $val }}</option>
                                                @else
                                                    <option value="{{ $key }}" >{{ $val }}</option>
                                                @endif
                                            @endforeach
                                    </select>
                                </div>

                                <div class="row my-4">
                                    <select type="text" class="form-control" name="occupation">
                                        {{-- <option value="{{ $user->occupation }}">職業</option> --}}
                                            @foreach (Config::get('occupation.job_name') as $key => $val)
                                                @if ($val === $user->occupation)
                                                    <option value="{{ $key }}" selected="selected">{{ $val }}</option>
                                                @else
                                                    <option value="{{ $key }}" >{{ $val }}</option>
                                                @endif
                                            @endforeach
                                    </select>
                                </div>

                                <div class="row my-4">
                                    <input type="text" placeholder='新しいメールアドレス' class="form-control" value="{{ $user->email}}" name='email'>
                                </div>

                                <div class="row my-4">
                                    <button type="submit" class="detail btn-anime bgleft text-center text-muted"><span>更新する</span></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
