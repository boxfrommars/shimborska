@extends('dashboard.layout')

@section('content')
    <ol class="breadcrumb">
        <li class="active">Collections</li>
    </ol>
    <div class="row">
        <div class="col-md-9 col-sm-8">
            <a class="btn btn-primary pull-right" href="{{ route('dashboard.collection.create') }}"><i class="glyphicon glyphicon-plus"></i> Add Collection</a>

            <table class="table">
                <thead>
                <tr>
                    <th>Title</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($collections as $collection)
                    <tr>
                        <td><a href="{{ route('dashboard.collection.poem.index', $collection) }}">{{ $collection->title }}</a></td>
                        <td class="grid-actions text-nowrap">
                            <a href="{{ route('dashboard.collection.edit', $collection) }}"><i class="glyphicon glyphicon-pencil"></i></a>
                            {!! delete_form(route('dashboard.collection.destroy', $collection)) !!}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-md-3 col-sm-4"></div>
    </div>
@endsection