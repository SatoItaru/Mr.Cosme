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
            <form action="{{ route('users.update', $user->id) }}" method="POST">
            {{csrf_field()}}
            {{method_field('PATCH')}}
                <div class="form-group row justify-content-center">
                    <div class="col-md-8">
                        <input type="text" class="form-control" placeholder='新しいアカウントネーム' value="{{ $user->name }}" name='name'>
                        <select type="text" class="form-control" value="{{ $user->age }}" name="age">
                            <option value="">年代</option>
                            <option value="20代">20代</option>
                            <option value="30代">30代</option>
                            <option value="40代">40代</option>
                            <option value="50代">50代</option>
                        </select>
                        <select type="text" class="form-control" name="occupation">
                            <option value="">職業</option>
                                @foreach (Config::get('occupation.job_name') as $key => $val)
                                    <option value="{{ $key }}">{{ $val }}</option>
                                @endforeach
                        </select>
                        <input type="text" placeholder='新しいメールアドレス' class="form-control" value="{{ $user->email}}" name='email'>
                        <button type="submit" class="btn btn-primary">更新する</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
