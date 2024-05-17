<?php

declare(strict_types=1);

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;

class Search extends Component
{
    public $search = '';

    public function render(): \Illuminate\View\View
    {
        return view('livewire.search', [
            'results' => Post::search('title', $this->search)->get(),
        ]);
    }
}
