@extends('frontend.layout')

@section('content')
    {!! $page->pageable->content !!}
@endsection

@section('notes')
    {!! $page->pageable->notes !!}
@endsection

@section('images')
    {!! $page->pageable->images !!}
@endsection