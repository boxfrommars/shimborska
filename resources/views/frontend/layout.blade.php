<!DOCTYPE html>
<html lang="ru">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="google-site-verification" content="yvzIVHZghvLLFJArEmBKcr5HGABsieiNZYLausg9Loo" />
    <meta name='yandex-verification' content='74f87e2ca2368e81' />

    @if (Config::get('app.debug'))
        <!-- build:css(public) build/style.css -->
        <!-- bower:css -->
        <link rel="stylesheet" href="/bower_components/normalize.css/normalize.css" />
        <link rel="stylesheet" href="/bower_components/remodal/dist/remodal.css" />
        <!-- endbower -->
        <link rel="stylesheet" type="text/css" href="/frontend/remodal-default-theme.css" media="screen" />
        <link rel="stylesheet" type="text/css" href="/frontend/style.css" media="screen" />
        <!-- endbuild -->
    @else
        <link rel="stylesheet" type="text/css" href="/build/style.css" media="screen" />
    @endif

    <title>{{ $page->title }}</title>
</head>

<body>

<div id="wrap">
    <div id="bar">
        <h1><a href="/" class="pseudo-anchor">Вислава Шимборская</a>&nbsp;&nbsp;<span class="book-title">Стихотворения</span></h1>
    </div>
    <div id="main" class="remodal-bg">
        <div class="images column">
            <ul id="navigation">
                <li><a href="#content-table" class="show-content-link">Содержание</a></li>
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
                <li class="last"><a href="#content-table" class="show-content-link">Содержание</a><span class="shortkey">(ctrl + ↑)</span></li>
            </ul>
        </div>

        <div class="notes column">
            @yield('notes')
        </div>

        <div id="content" title="Содержание" class="remodal" data-remodal-id="content-table">
            <div class="modal-header">
                <button data-remodal-action="close" class="remodal-close"></button>
            </div>
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

@if (Config::get('app.debug'))
<!-- build:js(public) build/script.js -->
<!-- bower:js -->
<script src="/bower_components/jquery/dist/jquery.js"></script>
<script src="/bower_components/jquery.hotkeys/jquery.hotkeys.js"></script>
<script src="/bower_components/remodal/dist/remodal.js"></script>
<script src="/bower_components/hammer.js/hammer.js"></script>
<!-- endbower -->

<script type="text/javascript" src="/frontend/script.js"></script>
<!-- endbuild -->
@else

<script src="/build/script.js"></script>
@endif

</body>
</html>