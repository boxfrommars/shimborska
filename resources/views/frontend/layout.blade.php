<!DOCTYPE html>
<html lang="ru">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="google-site-verification" content="yvzIVHZghvLLFJArEmBKcr5HGABsieiNZYLausg9Loo" />
    <meta name='yandex-verification' content='74f87e2ca2368e81' />
    <link rel="stylesheet" type="text/css" href="/css/style.css" media="screen" />

    <script type="text/javascript" src="/js/vendor.js"></script>
    <script type="text/javascript" src="/js/script.js"></script>
    <title>{{ $title }}</title>
</head>

<body>

<div id="wrap">
    <div id="bar">
        <h1><a href="/" class="pseudo-anchor">Вислава Шимборская</a>&nbsp;&nbsp;<span class="book-title">Стихотворения</span></h1>
        <a href="/project" class="head-nav">о проекте</a>
    </div>
    <div id="main">
        <div id="leftbar">
            <ul id="navigation">
                <li><a href="#content" class="show-content-link">Содержание</a></li>
                <li><a href="/author">Об авторе</a></li>
            </ul>
            @yield('images')
        </div>

        <div class="page">
            @yield('content')
        </div>

        <div class="notabene">
            @yield('notes')
        </div>

        <div id="content" title="Содержание">

            @yield('content-tablt')

        </div>
    </div>
    <div id="royklogo"></div>
</div>
<div id="footer">
    &copy; 2009 Студия «Гриб-дождевик»
</div>
</body>
</html>