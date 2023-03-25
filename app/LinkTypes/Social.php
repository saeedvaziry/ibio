<?php

namespace App\LinkTypes;

use Illuminate\Validation\Rule;
use Illuminate\View\View;

final class Social extends AbstractLinkType
{
    const PLATFORMS = [
        'instagram',
        'twitter',
        'tiktok',
        'snapchat',
        'medium',
        'youtube',
        'reddit',
        'linkedin',
        'pinterest',
        'dribbble',
        'facebook',
        'vimeo',
        'twitch',
        'spotify',
        'soundcloud',
        'github',
        'discord',
        'tumblr',
        'vk',
        'whatsapp',
        'telegram',
        'patreon',
        'apple-music',
        'play-store',
        'app-store',
        'amazon',
    ];

    public function rules(): array
    {
        return [
            'platform' => [
                'required',
                Rule::in(self::PLATFORMS),
            ],
            'url' => 'required|url|max:1000',
        ];
    }

    public function fields(): array
    {
        return [
            'platform' => '',
            'url' => '',
        ];
    }

    public function render(): View
    {
        return view('page.links.social', [
            'id' => $this->link->id,
            'platform' => $this->link->data['platform'],
            'url' => $this->link->data['url'],
        ]);
    }
}
