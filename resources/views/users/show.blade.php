@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card-header">
                <img src="{{ asset('assets/images/default.png') }}"class="rounded-circle img-thumbnail mb-3" width="200" height="200" alt="">
                <img src="{{ $user->image_path }}" class="rounded-circle img-thumbnail mb-3" width="200" height="200" alt="画像">
                    <h5>{{ $user->name }}</h5>
                    <h5>{{ $user->age }}</h5>
                    <h5>{{ $user->occupation }}</h5>
                    <h5>{{ $user->email}}</h5>
                    <a href="{{ route('users.edit', Auth::id()) }}" class="btn btn-primary">編集する</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
