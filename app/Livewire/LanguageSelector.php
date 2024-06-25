<?php

declare(strict_types=1);

namespace App\Livewire;

use Illuminate\Contracts\View\View;
use Livewire\Component;

class LanguageSelector extends Component
{
    public array $languages;
    public string $selectedLanguage;
    public string $route;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->languages = ['en', 'fr']; // Add the languages your application supports
        $this->selectedLanguage = app()->getLocale();
        $this->route = request()->route()->getName();
    }

    public function onLanguageSelect(): void
    {
        $this->redirectRoute($this->route, ['_locale' => $this->selectedLanguage]);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|\Closure|string
    {
        return view('components.language-selector');
    }
}
