<?php

namespace App\LinkTypes;

use Illuminate\View\View;

final class ContactForm extends AbstractLinkType
{
    public function rules(): array
    {
        return [
            'title' => [
                'required',
                'max:100'
            ],
            'email' => [
                'required',
                'email',
                'max:100'
            ],
            'open' => [
                'in:0,1'
            ]
        ];
    }

    public function fields(): array
    {
        return [
            'title' => '',
            'email' => '',
            'open' => 0
        ];
    }

    public function render(): View
    {
        return view('page.links.contact-form', [
            'id' => $this->link->id,
            'link' => $this->link,
            'theme' => $this->link->user->theme,
            'data' => $this->link->data,
            'thumbnailUrl' => $this->link->thumbnail_url,
        ]);
    }
}
