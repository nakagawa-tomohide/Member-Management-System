<!-- <!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
    <title>会員登録</title>
</head>
<body> -->
@extends('layouts.app')

@section('title', '会員登録')

@section('content')
<h1>会員登録</h1>

<!-- 登録フォーム -->
<main>
    <form action="{{ route('memberRegister') }}" method="POST">
        @csrf
        <div class="text-form">
            <input type="text" name="name" placeholder="名前">
            @error('name')
            <p>{{ $message }}</p>
            @enderror
        </div>
        <div class="text-form">
            <input type="text" name="phone" placeholder="電話番号">
            @error('phone')
            <p>{{ $message }}</p>
            @enderror
        </div>
        <div class="text-form">
            <input type="email" name="email" placeholder="メールアドレス">
            @error('email')
            <p>{{ $message }}</p>
            @enderror
        </div>

        <!-- 登録ボタン -->
        <div class="btn">
            <button class="btn btn-outline-secondary btn-lg " type="submit">登録</button>
        </div>
    </form>
</main>
@endsection
<!-- </body>
</html> -->