<div class="mx-4 pt-2">
    <select wire:model="selectedLanguage" wire:change="onLanguageSelect">
        @foreach ($languages as $language)
            <option value="{{ $language }}" {{ $selectedLanguage == $language ? 'selected' : '' }}>
                {{ strtoupper($language) }}
            </option>
        @endforeach
    </select>
</div>
