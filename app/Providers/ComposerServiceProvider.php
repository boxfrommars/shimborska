<?php

namespace App\Providers;

use Cache;
use App\Entities\Page;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('frontend.layout', function ($view) {
            $contentPages = Cache::remember('contentPages', 10, function() {
                return Page::sorted()->whereNull('parent_id')->with(['childs.pageable', 'childs.parent', 'pageable'])->get();
            });
            $view->with('contentPages', $contentPages);
        });
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}