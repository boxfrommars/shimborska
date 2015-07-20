@extends('dashboard.layout')

@section('content')
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard.collection.index') }}">Collections</a></li>
        <li><a href="{{ route('dashboard.collection.poem.index', $collection) }}">{!! $collection->title !!}</a></li>
        <li class="active">{{ $poem->id ? $poem->title : 'Add' }}</li>
    </ol>
    {!! Form::model($poem, ['route' => $poem->id ? ['dashboard.collection.poem.update', $collection, $poem] : ['dashboard.collection.poem.store', $collection], 'method' => $poem->id ? 'PATCH' : 'POST', 'class' => 'form-horizontal']) !!}
    {!! Form::textField('Title', 'title') !!}
    {!! Form::codeField('Text', 'text') !!}
    {!! Form::codeField('Notes', 'notes') !!}
    {!! Form::submitField() !!}
    {!! Form::close() !!}
@endsection