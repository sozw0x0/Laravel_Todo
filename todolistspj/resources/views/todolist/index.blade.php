<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="{{ asset('css/reset.css') }}" rel="stylesheet">
  <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>

<body>
  <div class="container">
    <div class="card">
      <p class="ttl">Todo List</p>
      <div class="todolist">
        @if (count($errors) > 0)
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{$error}}</li>
            @endforeach
          </ul>
        @endif
        <form class="todo-add" action="/todo/create" method="POST">
          @csrf
          <input class="txt-add" type="text" name="content" value="">
          <input class="btn-add" type="submit" name="btn" value="追加">
        </form>
        <table border="1">
          <tbody>
            <tr>
              <th>作成日</th>
              <th>タスク名</th>
              <th>更新</th>
              <th>削除</th>
            </tr>
            @foreach($todos as $todo)
            <tr>
              <td>
                {{$todo->created_at}}
              </td>
              <td>
                <form action="/todo/update/{{$todo->id}}" method="POST">
                  @csrf
                <input class="txt-update" type="text" name="content" value="{{$todo->content}}">
                <input type="hidden" name="id" value="{{$todo->id}}">
              </td>
              <td>
                <button class="btn-update" type="submit">更新</button>
              </td>
                </form>
              <td>
                <form action="/todo/delete/{{$todo->id}}" method="POST">
                  @csrf
                  <input class="btn-delete" type="submit" value="削除" >
                </form>
              </td>
            </tr>
          </tbody>
          @endforeach
        </table>
      </div>
    </div>
  </div>
</body>
</html>