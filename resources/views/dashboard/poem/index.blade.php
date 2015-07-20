@extends('dashboard.layout')

@section('content')
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard.collection.index') }}">Collections</a></li>
        <li class="active">{!! $collection->title !!}</li>
    </ol>
    <div class="row">
        <div class="col-md-9 col-sm-8">
            <a class="btn btn-primary pull-right" href="{{ route('dashboard.collection.poem.create', $collection) }}"><i class="glyphicon glyphicon-plus"></i> Add Poem</a>

            <table class="table">
                <thead>
                <tr>
                    <th>Title</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($poems as $poem)
                    <tr>
                        <td><a href="{{ route('dashboard.collection.poem.show', [$collection, $poem]) }}">{{ $poem->title }}</a></td>
                        <td class="grid-actions">{!! delete_form(route('dashboard.collection.poem.destroy', [$collection, $poem])) !!}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-md-3 col-sm-4"></div>
    </div>
@endsection