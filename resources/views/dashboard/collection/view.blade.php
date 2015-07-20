@extends('dashboard.layout')

@section('content')
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard.collection.index') }}">Collections</a></li>
        <li class="active">{{ $collection->id ? $collection->title : 'Add' }}</li>
    </ol>
    <div class="row">
        <div class="col-md-9 col-sm-8">
            {!! Form::model($collection, ['route' => $collection->id ? ['dashboard.collection.update', $collection] : ['dashboard.collection.store'], 'method' => $collection->id ? 'PATCH' : 'POST', 'class' => 'form-horizontal']) !!}
            {!! Form::textField('Title', 'title') !!}
            {!! Form::textareaField('Description', 'description') !!}
            {!! Form::submitField() !!}
            {!! Form::close() !!}
        </div>
        <div class="col-md-3 col-sm-4"></div>
    </div>
@endsection