<!-- <!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
    <title>会員一覧</title>
</head>

<body> -->

@extends('layouts.app')

@section('title', '会員一覧')

@section('content')

<!-- 検索フォーム -->
<div class="search">
    <form action="{{ route('search') }}" method="GET">
        @csrf
        <input class="search-form" type="text" name="keyword" value="{{ $keyword ?? '' }}">
        <button class="btn btn-outline-secondary search-btn" type="submit">検索</button>
    </form>
</div>

<!-- 検索ボタン -->
<div class="register-btn">
    <a href="{{ route('register') }}">>> 登録</a>
</div>

<!-- 一覧表示 -->
<main>
    @if(count($members) > 0)
    <table border="1">
        <thead>
            <tr>
                <th>名前</th>
                <th>電話番号</th>
                <th>メールアドレス</th>
                <th>@sortablelink('created_at', '登録日時')</th>
            </tr>
        </thead>

        <tbody>
            @foreach($members as $member)
            <tr>
                <td class="content">{{ $member->name }}</td>
                <td class="content">{{ $member->phone }}</td>
                <td class="content">{{ $member->email }}</td>
                <td class="content">{{ $member->created_at->isoFormat('YYYY年MM月DD日 HH時mm分') }}</td>
                <td class="edit-btn"><a href="/edit/{{ $member->id }}">>> 編集</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <p class="message">"{{ $keyword }}"の検索結果はありません。</p>
    @endif
</main>

<!-- ページネーション -->
<div class="pagination">
    {{ $members->appends(request()->query())->links() }}
</div>
@endsection
<!-- </body>

</html> -->