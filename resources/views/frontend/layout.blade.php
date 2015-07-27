<!DOCTYPE html>
<html lang="ru">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="google-site-verification" content="yvzIVHZghvLLFJArEmBKcr5HGABsieiNZYLausg9Loo" />
    <meta name='yandex-verification' content='74f87e2ca2368e81' />
    <link rel="stylesheet" type="text/css" href="/frontend/style.css" media="screen" />

    <script type="text/javascript" src="/frontend/vendor.js"></script>
    <script type="text/javascript" src="/frontend/script.js"></script>
    <title>{{ $page->title }}</title>
</head>

<body>

<div id="wrap">
    <div id="bar">
        <h1><a href="/" class="pseudo-anchor">Вислава Шимборская</a>&nbsp;&nbsp;<span class="book-title">Стихотворения</span></h1>
    </div>
    <div id="main">
        <div id="leftbar" class="column">
            <ul id="navigation">
                <li><a href="#content" class="show-content-link">Содержание</a></li>
                <li><a href="/author">Об авторе</a></li>
            </ul>
            <div class="images-bar">
                @yield('images')
            </div>
        </div>

        <div class="page column">
            @yield('content')

            <ul id="pager" class="cf">
                <li class="first"><a href="/">Обложка</a><span class="shortkey">(ctrl + ↓)</span></li>

                <?php $pageNumber = $pager->firstPagerPage; ?>
                @foreach ($pager as $pagerPage)
                    @if ($pagerPage->id === $page->id)
                        <li id="center-bottom-nav"><span>{{ $pageNumber }}</span></li>
                    @else
                        <li><a title="{{ $pagerPage->pageable->title }}" href="{{ $pagerPage->url }}">{{ $pageNumber }}</a></li>
                    @endif
                    <?php $pageNumber++ ?>
                @endforeach
                <li class="last"><a href="#" class="show-content-link">Содержание</a><span class="shortkey">(ctrl + ↑)</span></li>
            </ul>
        </div>

        <div class="notabene column">
            @yield('notes')
        </div>

        <div id="content" title="Содержание">
            <ul id="contents-wrap">
                <li class="chapter-link-list wide"><a href="/" class="chapter-link">Обложка</a></li>
                @foreach ($contentPages as $contentPage)
                    <li class="chapter-link-list">
                        <span class="chapter-link">{{ $contentPage->pageable->title }}</span>
                        <ul>
                            @foreach ($contentPage->childs as $childPage)
                                @if (Request::path() === trim($childPage->url, '/'))
                                    <li><span class="active">{{ $childPage->pageable->title }}</span></li>
                                @else
                                    <li><a href="{{ $childPage->url }}">{{ $childPage->pageable->title }}</a></li>
                                @endif
                            @endforeach
                        </ul>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
    <div id="royklogo"></div>
</div>
<div id="footer">
    &copy; 2009 Студия «Гриб-дождевик»
</div>
</body>
</html>