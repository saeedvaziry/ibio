<?php

return [
    'key' => env('LINKS_KEY'),
    'social_medias' => [
        [
            'title' => 'Instagram',
            'value' => 'instagram',
            'placeholder' => 'username',
            'schema' => 'https://instagram.com/{value}',
        ],
        [
            'title' => 'Twitter',
            'value' => 'twitter',
            'placeholder' => 'username',
            'schema' => 'https://twitter.com/{value}',
        ],
        [
            'title' => 'TikTok',
            'value' => 'tiktok',
            'placeholder' => '@username',
            'schema' => 'https://tiktok.com/{value}',
        ],
        [
            'title' => 'SnapChat',
            'value' => 'snapchat',
            'placeholder' => 'username',
            'schema' => 'https://snapchat.com/add/{value}',
        ],
        [
            'title' => 'Medium',
            'value' => 'medium',
            'placeholder' => '@username',
            'schema' => 'https://medium.com/{value}',
        ],
        [
            'title' => 'Youtube Channel',
            'value' => 'youtube',
            'placeholder' => 'channel-id',
            'schema' => 'https://youtube.com/channel/{value}',
        ],
        [
            'title' => 'Reddit',
            'value' => 'reddit',
            'placeholder' => 'username',
            'schema' => 'https://reddit.com/user/{value}',
        ],
        [
            'title' => 'Linkedin',
            'value' => 'linkedin',
            'placeholder' => 'username',
            'schema' => 'https://linkedin.com/in/{value}',
        ],
        [
            'title' => 'Pinterest',
            'value' => 'pinterest',
            'placeholder' => 'username',
            'schema' => 'https://pinterest.com/{value}/_created',
        ],
        [
            'title' => 'Dribble',
            'value' => 'dribble',
            'placeholder' => 'username',
            'schema' => 'https://dribbble.com/{value}',
        ],
        [
            'title' => 'Facebook',
            'value' => 'facebook',
            'placeholder' => 'username',
            'schema' => 'https://facebook.com/{value}',
        ],
        [
            'title' => 'Vimeo',
            'value' => 'vimeo',
            'placeholder' => 'username',
            'schema' => 'https://vimeo.com/{value}',
        ],
        [
            'title' => 'twitch',
            'value' => 'twitch',
            'placeholder' => 'username',
            'schema' => 'https://twitch.tv/{value}',
        ],
        [
            'title' => 'spotify',
            'value' => 'spotify',
            'placeholder' => 'username',
            'schema' => 'https://open.spotify.com/user/{value}',
        ],
        [
            'title' => 'soundcloud',
            'value' => 'soundcloud',
            'placeholder' => 'username',
            'schema' => 'https://soundcloud.com/{value}',
        ],
        [
            'title' => 'Github',
            'value' => 'github',
            'placeholder' => 'username',
            'schema' => 'https://github.com/{value}',
        ],
        [
            'title' => 'Gitlab',
            'value' => 'gitlab',
            'placeholder' => 'username',
            'schema' => 'https://gitlab.com/{value}',
        ],
        [
            'title' => 'Bitbucket',
            'value' => 'bitbucket',
            'placeholder' => 'username',
            'schema' => 'https://bitbucket.org/{value}',
        ],
        [
            'title' => 'Discord',
            'value' => 'discord',
            'placeholder' => 'username',
            'schema' => 'https://{value}.discord.gg',
        ],
        [
            'title' => 'Tumblr',
            'value' => 'tumblr',
            'placeholder' => 'username',
            'schema' => 'https://{value}.tumblr.com',
        ],
        [
            'title' => 'VK',
            'value' => 'vk',
            'placeholder' => 'username',
            'schema' => 'https://vk.com/{value}',
        ],
    ],
    'contacts' => [
        [
            'title' => 'Website',
            'value' => 'website',
            'placeholder' => 'https://example.com',
            'schema' => '{value}',
        ],
        [
            'title' => 'Email',
            'value' => 'email',
            'placeholder' => 'username@example.com',
            'schema' => 'mailto:{value}',
        ],
        [
            'title' => 'Telegram',
            'value' => 'telegram',
            'placeholder' => 'username',
            'schema' => 'https://t.me/{value}',
        ],
        [
            'title' => 'Whatsapp',
            'value' => 'whatsapp',
            'placeholder' => '+1XXXXXXXXXX',
            'schema' => 'https://wa.me/{value}',
        ],
        [
            'title' => 'Phone Number',
            'value' => 'phone',
            'placeholder' => '+1XXXXXXXXXX',
            'schema' => 'tel:{value}',
        ],
        [
            'title' => 'Skype',
            'value' => 'skype',
            'placeholder' => 'username',
            'schema' => 'skype://{value}'
        ],
        [
            'title' => 'Viber',
            'value' => 'viber',
            'placeholder' => '+1XXXXXXXXXX',
            'schema' => 'viber://{value}'
        ]
    ]
];
