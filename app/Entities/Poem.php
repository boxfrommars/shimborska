<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Entities\Poem
 *
 * @property-read \App\Entities\Collection $collection
 * @property integer $id 
 * @property string $title 
 * @property integer $collection_id 
 * @property \Carbon\Carbon $created_at 
 * @property \Carbon\Carbon $updated_at 
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Poem whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Poem whereTitle($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Poem whereCollectionId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Poem whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Poem whereUpdatedAt($value)
 */
class Poem extends Model
{
    protected $fillable = ['title', 'text', 'notes'];

    public function collection()
    {
        return $this->belongsTo('App\Entities\Collection');
    }
}