<?php

namespace App\Http\Controllers;

use App\Entities\Page;
use Illuminate\Support\Collection as IlluminateCollection;

class MainController extends Controller
{
    public function main()
    {
        $page = new Page([
            'title' => 'Главная'
        ]);

        $pager = $this->getPager();
        return view('frontend.main', compact('page', 'pager'));
    }

    public function poem($collectionSlug, $slug)
    {
        $page = $this->getPage($slug, $collectionSlug);
        $pager = $this->getPager($page);
        return view('frontend.poem', compact('page', 'pager'));
    }

    public function collection($slug)
    {
        $page = $this->getPage($slug)->load('childs.pageable');
        $pager = $this->getPager($page);
        return view('frontend.collection', compact('page', 'pager'));
    }

    protected function getPage($slug, $parentSlug = null)
    {
        \Log::debug($slug);
        \Log::debug($parentSlug);
        /** @var Page $page */
        $page = Page::whereSlug($slug)->whereNotNull('parent_id')->first();
        if (!$page || !$page->is_visible) {
            abort(404);
        }

        if ($parentSlug !== null) {
            $parentPage = Page::whereSlug($parentSlug)->whereNull('parent_id')->first();

            if (!$parentPage || $page->parent_id !== $parentPage->id) {
                abort(404);
            }
        }

        return $page;
    }

    /**
     * @param Page $pagerCurrentPage
     * @return IlluminateCollection
     */
    protected function getPager($pagerCurrentPage = null)
    {
        $pagerCurrentPage = $pagerCurrentPage ?: Page::sorted()->visible()->first();

        $pager = new IlluminateCollection();
        $pager->push($pagerCurrentPage); // e.g. page 6

        $previousPages = $pagerCurrentPage->previous(4)->visible()->with(['pageable', 'parent'])->get(); // 5 4 3 2
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

        $firstPagerPage = $pager->first();

        $firstPagerPageNumber = $firstPagerPage->previous()->visible()->count() + 1;
        $pager->firstPagerPage = $firstPagerPageNumber;

        return $pager;
    }
}