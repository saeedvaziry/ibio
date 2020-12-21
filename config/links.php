<?php

return [
    'key' => env('LINKS_KEY'),
    'social_medias' => [
        [
            'title' => 'اینستاگرام',
            'value' => 'instagram',
            'placeholder' => 'username',
            'schema' => 'https://instagram.com/{value}',
        ],
        [
            'title' => 'توییتر',
            'value' => 'twitter',
            'placeholder' => 'username',
            'schema' => 'https://twitter.com/{value}',
        ],
        [
            'title' => 'تیک تاک',
            'value' => 'tiktok',
            'placeholder' => '@username',
            'schema' => 'https://tiktok.com/{value}',
        ],
        [
            'title' => 'اسنپ چت',
            'value' => 'snapchat',
            'placeholder' => 'username',
            'schema' => 'https://snapchat.com/add/{value}',
        ],
        [
            'title' => 'مدیوم',
            'value' => 'medium',
            'placeholder' => '@username',
            'schema' => 'https://medium.com/{value}',
        ],
        [
            'title' => 'کانال یوتیوب',
            'value' => 'youtube',
            'placeholder' => 'channel-id',
            'schema' => 'https://youtube.com/channel/{value}',
        ],
        [
            'title' => 'رِدیت',
            'value' => 'reddit',
            'placeholder' => 'username',
            'schema' => 'https://reddit.com/user/{value}',
        ],
        [
            'title' => 'لینکداین',
            'value' => 'linkedin',
            'placeholder' => 'username',
            'schema' => 'https://linkedin.com/in/{value}',
        ],
        [
            'title' => 'پینترِست',
            'value' => 'pinterest',
            'placeholder' => 'username',
            'schema' => 'https://pinterest.com/{value}/_created',
        ],
        [
            'title' => 'دریبل',
            'value' => 'dribble',
            'placeholder' => 'username',
            'schema' => 'https://dribbble.com/{value}',
        ],
        [
            'title' => 'فیسبوک',
            'value' => 'facebook',
            'placeholder' => 'username',
            'schema' => 'https://facebook.com/{value}',
        ],
        [
            'title' => 'ویمو',
            'value' => 'vimeo',
            'placeholder' => 'username',
            'schema' => 'https://vimeo.com/{value}',
        ],
        [
            'title' => 'توییج',
            'value' => 'twitch',
            'placeholder' => 'username',
            'schema' => 'https://twitch.tv/{value}',
        ],
        [
            'title' => 'اسپاتیفای',
            'value' => 'spotify',
            'placeholder' => 'username',
            'schema' => 'https://open.spotify.com/user/{value}',
        ],
        [
            'title' => 'ساندکلود',
            'value' => 'soundcloud',
            'placeholder' => 'username',
            'schema' => 'https://soundcloud.com/{value}',
        ],
        [
            'title' => 'گیت هاب',
            'value' => 'github',
            'placeholder' => 'username',
            'schema' => 'https://github.com/{value}',
        ],
        [
            'title' => 'گیت لب',
            'value' => 'gitlab',
            'placeholder' => 'username',
            'schema' => 'https://gitlab.com/{value}',
        ],
        [
            'title' => 'بیت باکِت',
            'value' => 'bitbucket',
            'placeholder' => 'username',
            'schema' => 'https://bitbucket.org/{value}',
        ],
        [
            'title' => 'دیسکورد',
            'value' => 'discord',
            'placeholder' => 'username',
            'schema' => 'https://{value}.discord.gg',
        ],
        [
            'title' => 'تامبلر',
            'value' => 'tumblr',
            'placeholder' => 'username',
            'schema' => 'https://{value}.tumblr.com',
        ],
        [
            'title' => 'وی کِی',
            'value' => 'vk',
            'placeholder' => 'username',
            'schema' => 'https://vk.com/{value}',
        ],
    ],
    'contacts' => [
        [
            'title' => 'وب سایت',
            'value' => 'website',
            'placeholder' => 'https://example.com',
            'schema' => '{value}',
        ],
        [
            'title' => 'ایمیل',
            'value' => 'email',
            'placeholder' => 'username@example.com',
            'schema' => 'mailto:{value}',
        ],
        [
            'title' => 'تلگرام',
            'value' => 'telegram',
            'placeholder' => 'username',
            'schema' => 'https://t.me/{value}',
        ],
        [
            'title' => 'واتس اپ',
            'value' => 'whatsapp',
            'placeholder' => '+1XXXXXXXXXX',
            'schema' => 'https://wa.me/{value}',
        ],
        [
            'title' => 'شماره تلفن',
            'value' => 'phone',
            'placeholder' => '+1XXXXXXXXXX',
            'schema' => 'tel:{value}',
        ],
        [
            'title' => 'اسکایپ',
            'value' => 'skype',
            'placeholder' => 'username',
            'schema' => 'skype://{value}'
        ],
        [
            'title' => 'وایبر',
            'value' => 'viber',
            'placeholder' => '+1XXXXXXXXXX',
            'schema' => 'viber://{value}'
        ]
    ]
];
