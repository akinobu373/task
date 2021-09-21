<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>edit</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>

    <h1>タスク編集</h1>
    @if ($errors->any())
    <div class="error">
        <p>
            <b>[エラー内容]</b>
        </p>
        <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form action="/tasks/{{ $task->id }}" method="post">
        @csrf
        @method('PATCH')
        <p>
            <label for="title">[タイトル]</label>
            <input type="text" name="title" value="{{ old('title',$task->title )}}" required>
        </p>
        <p>
            <label for="body">[本文]</label>
            <textarea name="body" cols="30" rows="10" required>{{ old('body', $task->body) }}</textarea>
        </p>
        <div class="button-group">
            <input type="submit" value="更新">
            <button onclick="location.href='/tasks'">詳細に戻る</button>
        </div>
    </form>
</body>

</html>
