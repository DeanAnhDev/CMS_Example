<?php

namespace App\View\Components\Home;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ListPost extends Component
{
    /**
     * Create a new component instance.
     */
    public $news;

    public function __construct($news)
    {
        $this->news = $news;
    }

    public function render(): View|Closure|string
    {
        return view('components.home.list-post');
    }
}
