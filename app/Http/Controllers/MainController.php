<?php

namespace App\Http\Controllers;

use App\Entities\Page;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Collection as IlluminateCollection;

class MainController extends Controller
{
    public function main()
    {
        $page = new Page([
            'title' => 'Главная',
            'slug' => ''
        ]);

        return $this->view('frontend.main', $page);
    }
    public function about()
    {
        $page = new Page([
            'title' => 'О проекте',
            'slug' => 'about'
        ]);

        return $this->view('frontend.about', $page);
    }

    public function poem($collectionSlug, $slug)
    {
        $page = Page::whereSlug($slug)->whereNotNull('parent_id')->first();
        $collectionPage = Page::whereSlug($collectionSlug)->whereNull('parent_id')->first();

        if (!$page || !$page->is_visible || !$collectionPage) {
            abort(404);
        }

        return $this->view('frontend.poem', $page);
    }

    public function collection($slug)
    {
        /** @var Page $page */
        $page = Page::whereSlug($slug)->whereNull('parent_id')->first();
        if (!$page || !$page->is_visible) {
            abort(404);
        }

        $page->load('childs.pageable');

        return $this->view('frontend.collection', $page);
    }


    /**
     * @param String $viewName
     * @param Page $page
     * @return \Illuminate\View\View
     */
    protected function view($viewName, $page)
    {
        $pager = $this->getPager($page);
        $pagerFirstPageNumber = $pager->first()->previous()->visible()->count() + 1;

        return view($viewName, compact('page', 'pager', 'pagerFirstPageNumber'));
    }

    /**
     * @param Page $pagerCurrentPage
     * @return IlluminateCollection
     */
    protected function getPager($pagerCurrentPage)
    {
        $pagerCurrentPage = $pagerCurrentPage->id ? $pagerCurrentPage : Page::sorted()->visible()->first();

        $pager = new IlluminateCollection();
        $pager->push($pagerCurrentPage); // e.g. page 6


        /** @var Collection $previousPages */
        $previousPages = $pagerCurrentPage->previous(4)->visible()->with(['pageable', 'parent'])->get(); // 5 4 3 2
        /** @var Collection $nextPages */
        $nextPages = $pagerCurrentPage->next(4)->visible()->with(['pageable', 'parent'])->get(); // 7 8 9 10

        do {
            $prevPage = $previousPages->shift();
            if ($prevPage) {
                $pager->prepend($prevPage);
            }

            $nextPage = $nextPages->shift();
            if ($nextPage) {
                $pager->push($nextPage);
            }
        } while ($pager->count() < 5 && ($previousPages->count() > 0 || $nextPages->count() > 0));


        return $pager;
    }
}