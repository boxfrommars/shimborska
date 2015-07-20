<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Entities\Collection
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Entities\Poem[] $poems
 * @property integer $id 
 * @property string $title 
 * @property string $description 
 * @property \Carbon\Carbon $created_at 
 * @property \Carbon\Carbon $updated_at 
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Collection whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Collection whereTitle($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Collection whereDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Collection whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Entities\Collection whereUpdatedAt($value)
 */
class Collection extends Model
{
    protected $fillable = ['title', 'description'];

    public function poems()
    {
        return $this->hasMany('App\Entities\Poem');
    }
}