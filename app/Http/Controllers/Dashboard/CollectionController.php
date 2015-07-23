<?php
/**
 * Created by PhpStorm.
 * User: xu
 * Date: 12.07.15
 * Time: 13:10
 */

namespace App\Http\Controllers\Dashboard;


use App\Entities\Collection;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class CollectionController extends Controller
{
    protected $rules = [
        'title' => 'required',
        'content' => 'required',
    ];

    public function index()
    {
        return view('dashboard.collection.index', ['collections' => Collection::all()]);
    }

    public function store(Request $request)
    {
        $this->validate($request, $this->rules);
        $collection = new Collection($request->all());
        $collection->save();

        return redirect()->route('dashboard.collection.index');
    }

    public function update(Model $collection, Request $request)
    {
        $this->validate($request, $this->rules);
        $collection->update($request->all());

        return redirect()->route('dashboard.collection.index');
    }

    public function destroy(Model $collection)
    {
        $collection->delete();

        return redirect()->route('dashboard.collection.index');
    }

    public function create()
    {
        $collection = new Collection();

        return view('dashboard.collection.view', compact('collection'));
    }

    public function show(Model $collection)
    {
        return view('dashboard.collection.view', compact('collection'));
    }

    public function edit(Model $collection)
    {
        return view('dashboard.collection.view', compact('collection'));
    }
}