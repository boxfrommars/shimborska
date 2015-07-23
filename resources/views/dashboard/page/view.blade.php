@extends('dashboard.layout')

@section('content')
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard.page.index') }}">Pages</a></li>
        <li class="active">{{ $page->id ? $page->title : 'Add' }}</li>
    </ol>
    <div class="row">
        <div class="col-md-9 col-sm-8">
            {!! Form::model($page, ['route' => $page->id ? ['dashboard.page.update', $page] : ['dashboard.page.store'], 'method' => $page->id ? 'PATCH' : 'POST', 'class' => 'form-horizontal']) !!}
            {!! Form::textField('Title', 'title') !!}
            {!! Form::textField('URL', 'slug') !!}
            {!! Form::textareaField('Description', 'description') !!}
            {!! Form::textareaField('Keywords', 'keywords') !!}
            {!! Form::submitField() !!}
            {!! Form::close() !!}
        </div>
        <div class="col-md-3 col-sm-4"></div>
    </div>
@endsection