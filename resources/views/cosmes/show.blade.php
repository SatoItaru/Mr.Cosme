@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="container">
            <div class="row justify-content-center">
                <h2 class="text-muted  col-md-9">化粧のコツ</h2>
            </div>
            </div>
        <hr class="col-md-12">
        <div class="col-md-9">
            <div class="card text-center">
                <h2 class="card-header text-center text-muted">
                    BBクリーム
                    </h2>
                    <div class="card-body">
                    <p class="card-text text-muted">
                        これ一本で「日焼け止め」「化粧下地」＋「ファンデーションの役割」になります。<br>
                        BBクリームを少量とり、「おでこ」「両頬」「鼻」「あご」に置いてから全体に馴染ませます。
                    </p>
                </div>
            </div>
            <div class="row my-2">
                <img src="{{ asset('assets/images/arrow.png') }}" alt="" class="cosme-arrow">
            </div>
            <div class="my-5">
                <div class="card text-center">
                    <h2 class="card-header text-center text-muted">
                        コンシーラー
                        </h2>
                        <div class="card-body">
                        <p class="card-text text-muted">
                            BBクリームで補正できなかった「ニキビ」「シミ」「青ヒゲ」などの上から直接馴染ませます。<br>
                            カバー力があるので、目立ちやすい肌悩みを隠すのに向いています。
                        </p>
                    </div>
                </div>
                <div class="row my-2">
                    <img src="{{ asset('assets/images/arrow.png') }}" alt="" class="cosme-arrow">
                </div>
            <div class="my-5">
                <div class="card text-center">
                    <h2 class="card-header text-center text-muted">
                        フェイスパウダー
                        </h2>
                        <div class="card-body">
                        <p class="card-text text-muted">
                            BBクリームだけではテカリが出てしまうので、フェイスパウダーでサラサラにしてくれます。<br>
                            ベースメイクの仕上げに使うので、化粧崩れを防ぎます。
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
