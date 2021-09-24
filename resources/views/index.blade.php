<!DOCTYPE html>
<html lang="ja">
  <head>
    <title>COACHTECH</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
  </head>
  <body>
    <div class="container">
      <div class="card">
        <div class="title">Todoリスト</div>
          <form action="/todo/create" method="post" class="create">
            @csrf
            <div class="form-group">
              <input type="text" name="content" class="create-form">
            </div>
            <button type="submit" class="add-btn">追加</button>
          </form>
          <!-- リスト一覧 -->
          <table class="todolist">
            <tbody>
              <tr>
                <th>作成日</th>
                <th>タスク名</th>
                <th>更新</th>
                <th>削除</th>
              </tr>
              @foreach ($todos as $todo)
              <tr>
                <form action="/todo/update/{{$todo->id}}" method="post">
                @csrf
                <!-- 作成日時 -->
                <td>{{$todo->created_at}}</td>

                <!-- タスク名 -->
                <td>
                  <input type="text" name="content" value={{$todo->content}} class="task-name">
                </td>

                <!-- 更新ボタン -->
                <td>
                  <button type="submit" class="update-btn">更新</button>
                </td>
                </form>

                <!-- 削除ボタン -->
                <td>
                  <form action="/todo/delete/{{$todo->id}}" method="post">
                    @csrf
                    {{-- <input type="hidden" value={{$todo->id}}> --}}
                    <button type="submit" class="delete-btn">削除</button>
                  </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
  </body>
</html>