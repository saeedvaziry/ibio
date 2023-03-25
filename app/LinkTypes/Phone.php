<?php

namespace App\LinkTypes;

final class Phone extends AbstractLinkType
{
    public function rules(): array
    {
        return [
            'title' => 'required|max:250',
            'number' => 'required|max:50',
        ];
    }

    public function fields(): array
    {
        return [
            'title' => '',
            'number' => '',
        ];
    }

    public function render(): string
    {
        return view('page.links.button', [
            'id' => $this->link->id,
            'theme' => $this->link->user->theme,
            'title' => $this->link->data['title'],
            'url' => 'tel:'.$this->link->data['number'],
            'thumbnailUrl' => $this->link->thumbnail_url,
        ]);
    }
}
