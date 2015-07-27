<?php
/**
 * Created by PhpStorm.
 * User: xu
 * Date: 12.07.15
 * Time: 13:10
 */

namespace App\Http\Controllers\Dashboard;


use App\Entities\Page;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class PageController extends Controller
{
    protected $rules = [
        'title' => 'required',
        'description' => 'required',
        'slug' => 'alpha_dash|unique:pages,slug'
    ];

    public function index()
    {
        return view('dashboard.page.index', ['pages' => Page::sorted()->with('parent')->get()]);
    }

    public function store(Request $request)
    {
        $this->validate($request, $this->rules);
        $page = new Page($request->all());
        $page->save();

        return redirect()->route('dashboard.page.show', $page);
    }

    public function update(Page $page, Request $request)
    {
        $rules = $this->rules;

        $rules['slug'] .= ',' . $page->id;

        $this->validate($request, $rules);
        $page->update($request->all());

        return redirect()->route('dashboard.page.show', $page);
    }

    public function destroy(Model $page)
    {
        $page->delete();

        return redirect()->route('dashboard.page.index');
    }

    public function create()
    {
        $page = new Page();

        return view('dashboard.page.view', compact('page'));
    }

    public function show(Model $page)
    {
        return view('dashboard.page.view', compact('page'));
    }

    public function edit(Model $page)
    {
        return view('dashboard.page.view', compact('page'));
    }
}