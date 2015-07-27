<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;


/**
 * App\Entities\Poem
 *
 * @property integer $id
 * @property string $title
 * @property string $text
 * @property string $notes
 * @property integer $collection_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \App\Entities\Collection $collection
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Poem whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Poem whereTitle($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Poem whereText($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Poem whereNotes($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Poem whereCollectionId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Poem whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Poem whereUpdatedAt($value)
 * @property-read Page $page
 * @property string $content 
 * @property string $images 
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Poem whereContent($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Poem whereImages($value)
 */
class Poem extends Model
{
    protected $fillable = ['title', 'content', 'notes', 'images'];

    public function collection()
    {
        return $this->belongsTo('App\Entities\Collection');
    }

    public function page()
    {
        return $this->morphOne(Page::class, 'pageable');
    }
}