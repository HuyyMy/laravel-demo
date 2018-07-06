<!doctype html>
<html lang="zh-CN">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>App Name - @yield('title', 'Laravel')</title>
</head>
<body>
<div class="page">
  <header>Header</header>

  <main>
    <nav class="sidebar">
      @section('sidebar')
        <div>Sidebar</div>
      @show
    </nav>

    <article>
      Content
      @yield('content')
    </article>
  </main>

  <footer>Footer</footer>
</div>
</body>
</html>