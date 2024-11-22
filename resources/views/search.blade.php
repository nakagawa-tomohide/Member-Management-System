<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
    <title>検索結果</title>
</head>

<body>
    <main>

        <table border="1">
            <thead>
                <tr>
                    <th>名前</th>
                    <th>電話番号</th>
                    <th>メールアドレス</th>
                </tr>
            </thead>

            <tbody>
                @foreach($members as $member)
                <tr>
                    <td class="content">{{ $member->name }}</td>
                    <td class="content">{{ $member->phone }}</td>
                    <td class="content">{{ $member->email }}</td>
                    <td class="edit-btn"><a href="/edit/{{ $member->id }}">>> 編集</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </main>
</body>

</html>