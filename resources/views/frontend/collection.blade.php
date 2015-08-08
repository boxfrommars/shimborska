@extends('frontend.layout')

@section('content')
    <h2>{{ $page->pageable->title }}</h2>

    {!! $page->pageable->content !!}

    <ul class="collection-content">
        @foreach ($page->childs as $poemPage)
            <li><a href="{{ route('poem', [$page->slug, $poemPage->slug]) }}">{{ $poemPage->pageable->title }}</a></li>
        @endforeach
    </ul>
@endsection

@section('notes')
    {!! $page->pageable->notes !!}
@endsection

@section('images')
    {!! $page->pageable->images !!}
@endsection