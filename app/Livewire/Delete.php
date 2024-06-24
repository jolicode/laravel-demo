<?php

declare(strict_types=1);

namespace App\Livewire;

use App\Models\Post;
use Illuminate\Routing\Redirector;
use Livewire\Component;

class Delete extends Component
{
    public int $postId;

    public function mount($postId): void
    {
        $this->postId = $postId;
    }

    public function delete(): Redirector
    {
        Post::findOrFail($this->postId)->delete();

        return redirect()->route('admin.index');
    }

    public function render(): \Illuminate\View\View
    {
        return view('livewire.delete');
    }
}
