<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Entities\Collection
 *
 * @property integer $id
 * @property string $title
 * @property string $description
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Entities\Poem[] $poems
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Collection whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Collection whereTitle($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Collection whereDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Collection whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Collection whereUpdatedAt($value)
 * @property-read Page $page
 * @property string $content 
 * @property string $notes 
 * @property string $images 
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Collection whereContent($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Collection whereNotes($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Collection whereImages($value)
 */
class Collection extends Model
{
    protected $fillable = ['title', 'content', 'notes', 'images'];

    public function poems()
    {
        return $this->hasMany('App\Entities\Poem');
    }

    public function page()
    {
        return $this->morphOne(Page::class, 'pageable');
    }
}