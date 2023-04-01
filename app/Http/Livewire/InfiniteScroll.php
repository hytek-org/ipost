<?php

namespace App\Http\Livewire;

use Livewire\Component;

class InfiniteScroll extends Component
{
    public $perPage = 2;
    public $page = 1;
    public $items = [];

    public function render()
    {
        return view('livewire.infinite-scroll', [
            'items' => $this->items,
        ]);
    }
}
