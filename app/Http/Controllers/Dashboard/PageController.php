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
    ];

    public function index()
    {
        return view('dashboard.page.index', ['pages' => Page::sorted()->get()]);
    }

    public function store(Request $request)
    {
        $this->validate($request, $this->rules);
        $page = new Page($request->all());
        $page->save();

        return redirect()->route('dashboard.page.index');
    }

    public function update(Model $page, Request $request)
    {
        $this->validate($request, $this->rules);
        $page->update($request->all());

        return redirect()->route('dashboard.page.index');
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