<?php

namespace App\Entities;

use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;
use Rutorika\Sortable\SortableTrait;


/**
 * App\Entities\Page
 *
 * @property integer $id
 * @property string $title
 * @property string $slug
 * @property string $keywords
 * @property string $description
 * @property integer $position
 * @property integer $pageable_id
 * @property string $pageable_type
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property integer $parent_id
 * @method static Builder|Page whereId($value)
 * @method static Builder|Page whereTitle($value)
 * @method static Builder|Page whereSlug($value)
 * @method static Builder|Page whereKeywords($value)
 * @method static Builder|Page whereDescription($value)
 * @method static Builder|Page wherePosition($value)
 * @method static Builder|Page wherePageableId($value)
 * @method static Builder|Page wherePageableType($value)
 * @method static Builder|Page whereCreatedAt($value)
 * @method static Builder|Page whereUpdatedAt($value)
 * @method static Builder|Page whereParentId($value)
 * @method static Builder|Page sorted()
 * @property-read Page $parent 
 * @property-read mixed $url
 * @property-read \Illuminate\Database\Eloquent\Model $pageable
 * @property-read mixed $pageable_name
 */
class Page extends Model implements SluggableInterface
{
    use SortableTrait;
    use SluggableTrait;

    protected $fillable = ['title', 'description', 'keywords', 'slug'];

    protected $sluggable = [
        'build_from' => 'title',
        'save_to' => 'slug',
    ];

    public function pageable()
    {
        return $this->morphTo();
    }

    public function getPageableNameAttribute()
    {
        $map = [
            Collection::class => 'Collection',
            Poem::class => 'Poem',
        ];
        return $map[$this->pageable_type];
    }

    public function parent()
    {
        return $this->belongsTo(Page::class, 'parent_id');
    }

    public function childs()
    {
        return $this->hasMany(Page::class, 'parent_id');
    }

    /**
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeVisible($query)
    {
        return $query->where('is_visible', true);
    }

    public function getUrlAttribute()
    {
        if ($this->parent) {
            return route('poem', [$this->parent->slug, $this->slug], false);
        } else {
            return route('collection', $this->slug, false);
        }
    }
}