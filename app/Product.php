<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
use Overtrue\LaravelFavorite\Traits\Favoriteable;

class Product extends Model
{
    use Sortable, Favoriteable;

    public $sortable = [
        'price',
        'updated_at',
    ];

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function reviews()
    {
        return $this->hasMany('App\Review');
    }

    public function cart()
    {
        return $this->hasOne('App\Cart');
    }
}
