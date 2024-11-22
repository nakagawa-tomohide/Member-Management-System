<!-- <!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
    <title>会員編集</title>
</head>
<body> -->
@extends('layouts.app')

@section('title', '会員編集')

@section('content')

<h1>会員編集 会員ID: {{ $member->id }}</h1>

<!-- 編集フォーム -->
<main>
    <form action="{{ route('memberEdit', ['id' => $member->id]) }}" method="POST">
        @csrf
        <div class="text-form">
            <input type="text" name="name" value="{{ $member->name }}">
        </div>
        <div class="text-form">
            <input type="text" name="phone" value="{{ $member->phone }}">
        </div>
        <div class="text-form">
            <input type="email" name="email" value="{{ $member->email }}">
        </div>
        <button class="btn btn-outline-secondary edit-btn" type="submit">編集</button>
    </form>

    <!-- 削除ボタン -->
    <form action="{{ route('memberDelete', ['id' => $member->id]) }}" method="POST">
        @csrf
        @method('DELETE')
        <button class="btn btn-outline-secondary " type="submit">削除</button>
    </form>
</main>

@endsection
<!-- </body>
</html> -->