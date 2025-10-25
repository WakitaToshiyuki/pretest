<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>coachtechフリマ</title>
  <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
  <link rel="stylesheet" href="{{ asset('css/common.css') }}">
  @yield('css')
</head>

<body>
<header>
  <div class="header">
    <table>
      <tr>
        <th>
          <h1 class="title">COACHTECH</h1>
        </th>
        @if(Auth::check())
        <th>
          <form  action="" method="">
          @csrf
            <input class="search" type="text">
          </form>
        </th>
        <th>
          <form action="/logout" method="post">
          @csrf
            <button class="header-nav__button">ログアウト</button>
          </form>
        </th>
        <th>
          <a href="">マイページ</a>
        </th>
        <th>
          <a href="">出品</a>
        </th>
        @else
        <th>
          <form  action="" method="">
          @csrf
            <input class="search" type="text">
          </form>
        </th>
        <th>
          <a href="/login">ログイン</a>
        </th>
        <th>
          <a href="/mypage">マイページ</a>
        </th>
        <th>
          <a href="/sell">出品</a>
        </th>
        @endif
      </tr>
    </table>

  </div>
</header>
<main>
  @yield('content')
</main>
</body>

</html>
