<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Articles extends Model
{
    protected $fillable = [
        'title', 'slug', 'content', 'thumbnail', 'category_id', 'author_id', 'status', 'views'
    ];

    public function category() {
        return $this->belongsTo(Categories::class);
    }

    public function author() {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

}
