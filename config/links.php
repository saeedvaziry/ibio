<?php

return [
    'types' => [
        \App\LinkTypes\Button::class,
        \App\LinkTypes\Email::class,
        \App\LinkTypes\Music::class,
        \App\LinkTypes\Phone::class,
        \App\LinkTypes\Text::class,
        \App\LinkTypes\Video::class,
        \App\LinkTypes\Social::class,
    ],
    'types_when_creating' => [
        'Button',
        'Email',
        'Music',
        'Phone',
        'Text',
        'Video',
    ],
];
