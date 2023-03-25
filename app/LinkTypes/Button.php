<?php

namespace App\LinkTypes;

final class Button extends AbstractLinkType
{
    public function rules(): array
    {
        return [
            'title' => 'required|max:250',
            'url' => 'required|url|max:1000',
        ];
    }

    public function fields(): array
    {
        return [
            'title' => '',
            'url' => '',
        ];
    }

    public function render(): string
    {
        return view('page.links.button', [
            'theme' => $this->link->user->theme,
            'id' => $this->link->id,
            'title' => $this->link->data['title'],
            'url' => $this->link->data['url'],
            'thumbnailUrl' => $this->link->thumbnail_url,
        ]);
    }
}
