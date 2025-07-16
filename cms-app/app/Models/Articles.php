<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Articles extends Model
{
    protected $fillable = [
        'title', 'slug', 'content', 'thumbnail', 'category_detail_id', 'author_id', 'status', 'views'
    ];

    public function categoryDetail()
    {
        return $this->belongsTo(CategoryDetail::class, 'category_detail_id');
    }



    public function author() {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

}
