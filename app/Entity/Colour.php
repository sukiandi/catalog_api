<?php

namespace App\Entity;

use Illuminate\Database\Eloquent\Model;

class Colour extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'colours';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'code'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function products() {
        return $this->belongsToMany(Product::class, 'product_colours', 'colour_id', 'product_id')->withTimestamps();
    }
}