<?php

namespace App\LinkTypes;

use Illuminate\View\View;

final class Text extends AbstractLinkType
{
    public function rules(): array
    {
        return [
            'text' => 'required|max:1000',
        ];
    }

    public function fields(): array
    {
        return [
            'text' => '',
        ];
    }

    public function render(): View
    {
        return view('page.links.text', [
            'link' => $this->link,
            'theme' => $this->link->user->theme,
        ]);
    }
}
