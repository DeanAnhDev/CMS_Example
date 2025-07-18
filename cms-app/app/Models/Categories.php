<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $fillable = ['name', 'slug'];
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function categoryDetails()
    {
        return $this->hasMany(CategoryDetail::class, 'category_id');
    }

}
