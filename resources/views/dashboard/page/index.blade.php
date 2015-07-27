@extends('dashboard.layout')

@section('content')
    <ol class="breadcrumb">
        <li class="active">Pages</li>
    </ol>
    <div class="row">
        <div class="col-md-9 col-sm-8">
            <a class="btn btn-primary pull-right" href="{{ route('dashboard.page.create') }}"><i class="glyphicon glyphicon-plus"></i> Add Page</a>

            <table class="table">
                <thead>
                <tr>
                    <th></th>
                    <th>Title</th>
                    <th>Slug</th>
                    <th>Type</th>
                    <th></th>
                </tr>
                </thead>
                <tbody class="sortable" data-entityname="page">
                @foreach($pages as $page)
                    <tr data-itemid="{{ $page->id }}">
                        <td class="sortable-handle"><span class="glyphicon glyphicon-sort"></span></td>
                        <td><a href="{{ route('dashboard.page.edit', $page) }}">{{ $page->title }}</a></td>
                        <td><code>{{ $page->url }}</code></td>
                        <td>{{ $page->pageable_name }}</td>
                        <td class="grid-actions text-nowrap">
                            <a href="{{ route('dashboard.page.edit', $page) }}"><i class="glyphicon glyphicon-pencil"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-md-3 col-sm-4"></div>
    </div>
@endsection