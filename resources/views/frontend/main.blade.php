@extends('frontend.layout')

@section('content')
    <p class="cover unpined"><a href="{{ route('poem', ['different', 'two-monkeys']) }}"><img alt="Вислава Шимборская. Обложка" src="/resources/szymborska1.jpg" /></a></p>
@endsection

@section('notes')
    <div class="note" id="book-note">
        <h2>Сайт посвящённый польской поэтессе Виславе Шимборской — лауреауту Нобелевской премии 1996 года</h2>
    </div>
@endsection

@section('images')
@endsection