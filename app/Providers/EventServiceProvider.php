<?php

namespace App\Providers;

use App\Entities\Collection;
use App\Entities\Page;
use App\Entities\Poem;
use Illuminate\Contracts\Events\Dispatcher as DispatcherContract;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'App\Events\SomeEvent' => [
            'App\Listeners\EventListener',
        ],
    ];

    /**
     * Register any other events for your application.
     *
     * @param  \Illuminate\Contracts\Events\Dispatcher  $events
     * @return void
     */
    public function boot(DispatcherContract $events)
    {
        parent::boot($events);

        Collection::created(function ($collection) {
            /** @var Collection $collection */
            $page = new Page();
            $page->title = $collection->title;
            $collection->page()->save($page);
        });

        Poem::created(function ($poem) {
            /** @var Poem $poem */
            $page = new Page();
            $page->title = $poem->title;
            /** @var Collection $collection */
            $collection = $poem->collection;
            $parentPage = $collection->page;
            $page->parent()->associate($parentPage);
            $poem->page()->save($page);
        });
    }
}
