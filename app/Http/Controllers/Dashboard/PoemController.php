<?php

namespace App\Http\Controllers\Dashboard;


use App\Entities\Collection;
use App\Entities\Poem;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class PoemController extends Controller
{
    protected $rules = [
        'title' => 'required',
        'content' => 'required',
    ];

    public function index(Collection $collection)
    {
        $poems = $collection->poems;

        return view('dashboard.poem.index', compact('collection', 'poems'));
    }

    public function store(Collection $collection, Request $request)
    {
        $this->validate($request, $this->rules);
        $poem = new Poem($request->all());

        $collection->poems()->save($poem);

        return redirect()->route('dashboard.collection.poem.show', [$collection, $poem]);
    }

    public function update(Collection $collection, Model $poem, Request $request)
    {
        $this->validate($request, $this->rules);
        $poem->update($request->all());

        return redirect()->route('dashboard.collection.poem.show', [$collection, $poem]);
    }

    public function destroy(Collection $collection, Model $poem)
    {
        $poem->delete();

        return redirect()->route('dashboard.collection.poem.index', $collection);
    }

    public function create(Collection $collection)
    {
        $poem = new Poem();

        return view('dashboard.poem.view', compact('poem', 'collection'));
    }

    public function show(Collection $collection, Model $poem)
    {
        return view('dashboard.poem.view', compact('poem', 'collection'));
    }

    public function edit(Collection $collection, Model $poem)
    {
        return view('dashboard.poem.view', compact('poem', 'collection'));
    }
}