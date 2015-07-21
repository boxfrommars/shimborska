<?php

namespace App\Entities;

use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;
use Illuminate\Database\Eloquent\Model;
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
 * @property-read \Illuminate\Database\Eloquent\Model $pageable
 * @property-read mixed $pageable_name 
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Page whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Page whereTitle($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Page whereSlug($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Page whereKeywords($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Page whereDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Page wherePosition($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Page wherePageableId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Page wherePageableType($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Page whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Page whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Page sorted()
 */
class Page extends Model implements SluggableInterface
{
    use SortableTrait;
    use SluggableTrait;

    protected $fillable = ['title', 'description', 'keywords'];

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
}