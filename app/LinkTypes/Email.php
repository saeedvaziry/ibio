<?php

namespace App\LinkTypes;

final class Email extends AbstractLinkType
{
    public function rules(): array
    {
        return [
            'title' => 'required|max:250',
            'email' => 'required|email|max:100',
        ];
    }

    public function fields(): array
    {
        return [
            'title' => '',
            'email' => '',
        ];
    }

    public function render(): string
    {
        return view('page.links.button', [
            'id' => $this->link->id,
            'theme' => $this->link->user->theme,
            'title' => $this->link->data['title'],
            'url' => 'mailto:'.$this->link->data['email'],
            'thumbnailUrl' => $this->link->thumbnail_url,
        ]);
    }
}
