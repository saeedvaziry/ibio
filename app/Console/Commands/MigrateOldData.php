<?php

namespace App\Console\Commands;

use App\Models\Link;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class MigrateOldData extends Command
{
    const AVATAR_URL = 'https://ibio.link/storage';

    const SOCIAL_MEDIA_PLATFORMS = [
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
            'title' => 'Tiktok',
            'value' => 'tiktok',
            'placeholder' => '@username',
            'schema' => 'https://tiktok.com/{value}',
        ],
        [
            'title' => 'Snapchat',
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
            'title' => 'Youtube',
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
            'title' => 'Dribbble',
            'value' => 'dribbble',
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
            'title' => 'Twitch',
            'value' => 'twitch',
            'placeholder' => 'username',
            'schema' => 'https://twitch.tv/{value}',
        ],
        [
            'title' => 'Spotify',
            'value' => 'spotify',
            'placeholder' => 'url',
            'schema' => '{value}',
        ],
        [
            'title' => 'Soundcloud',
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
            'title' => 'Vk',
            'value' => 'vk',
            'placeholder' => 'username',
            'schema' => 'https://vk.com/{value}',
        ],
        [
            'title' => 'Whatsapp',
            'value' => 'whatsapp',
            'placeholder' => 'Number',
            'schema' => 'https://wa.me/{value}',
        ],
        [
            'title' => 'Telegram',
            'value' => 'telegram',
            'placeholder' => 'username',
            'schema' => 'https://t.me/{value}',
        ],
        [
            'title' => 'Patreon',
            'value' => 'patreon',
            'placeholder' => 'url',
            'schema' => '{value}',
        ],
        [
            'title' => 'Apple Music',
            'value' => 'apple-music',
            'placeholder' => 'url',
            'schema' => '{value}',
        ],
        [
            'title' => 'Play Store',
            'value' => 'play-store',
            'placeholder' => 'url',
            'schema' => '{value}',
        ],
        [
            'title' => 'App Store',
            'value' => 'app-store',
            'placeholder' => 'url',
            'schema' => '{value}',
        ],
        [
            'title' => 'Amazon',
            'value' => 'amazon',
            'placeholder' => 'url',
            'schema' => '{value}',
        ],
    ];

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'migrate-old-data';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Migrate old data';

    public function handle(): void
    {
        if (User::query()->where('old_id', '>', 0)->first()) {
            $this->error('Already migrated!');

            return;
        }

        $bar = $this->output->createProgressBar(
            DB::connection('mysql-old')->table('users')->whereNull('deleted_at')->count()
        );

        $bar->start();

        DB::connection('mysql-old')
            ->table('users')
            ->whereNull('deleted_at')
            ->orderBy('id')
            ->chunk(100, function ($users) use ($bar) {
                foreach ($users as $user) {
                    $newUser = $this->createUser($user);

                    $this->createLinks($newUser);

                    $bar->advance();
                }
            });

        $bar->finish();

        $this->newLine();

        $this->info('Migration finished!');
    }

    private function createUser($user): User
    {
        if ($user->avatar) {
            $avatar = Str::uuid()->toString().'.'.str($user->avatar)->after('.');
            try {
                File::put(Storage::disk('public')->path($avatar), file_get_contents(self::AVATAR_URL.'/'.$user->avatar));
            } catch (\Throwable) {
                $avatar = null;
            }
        }
        $newUser = new User([
            'old_id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            'email_verified_at' => $user->email_verified_at,
            'username' => $user->username,
            'password' => $user->password,
            'bio' => $user->bio,
            'theme_id' => 1,
            'avatar' => $avatar ?? null,
            'created_at' => $user->created_at,
            'updated_at' => $user->updated_at,
        ]);
        $newUser->save();

        return $newUser;
    }

    private function createLinks(User $user): void
    {
        DB::connection('mysql-old')
            ->table('links')
            ->where('user_id', $user->old_id)
            ->whereNull('deleted_at')
            ->orderBy('id')
            ->chunk(100, function ($links) use ($user) {
                foreach ($links as $link) {
                    $newLink = new Link([
                        'user_id' => $user->id,
                        'is_active' => true,
                    ]);
                    if (in_array($link->type, ['text', 'spotify', 'soundcloud'])) {
                        $newLink->type = 'Button';
                        $newLink->sort = $link->order;
                        $newLink->data = [
                            'title' => $link->title,
                            'url' => $link->url,
                        ];
                        $newLink->save();
                    }
                    if ($link->type == 'contact') {
                        if ($link->title == 'email') {
                            $newLink->type = 'Email';
                            $newLink->data = [
                                'title' => $link->title,
                                'email' => $link->url,
                            ];
                            $newLink->sort = $link->order;
                            $newLink->save();
                        } elseif ($link->title == 'phone') {
                            $newLink->type = 'Phone';
                            $newLink->data = [
                                'title' => $link->title,
                                'number' => $link->url,
                            ];
                            $newLink->sort = $link->order;
                            $newLink->save();
                        } elseif ($link->title == 'website') {
                            $newLink->type = 'Button';
                            $newLink->data = [
                                'title' => $link->title,
                                'url' => $link->url,
                            ];
                            $newLink->sort = $link->order;
                            $newLink->save();
                        }
                    }
                    if ($link->type == 'social') {
                        $config = collect(self::SOCIAL_MEDIA_PLATFORMS)->firstWhere('value', $link->title);
                        if ($config) {
                            $newLink->type = 'Social';
                            $newLink->data = [
                                'platform' => $link->title,
                                'url' => str($config['schema'])->replace('{value}', $link->url),
                            ];
                            $newLink->sort = $link->order;
                            $newLink->save();
                        }
                    }
                    if ($link->type == 'youtube') {
                        $newLink->type = 'Video';
                        $newLink->sort = $link->order;
                        $newLink->data = [
                            'title' => $link->title,
                            'url' => $link->url,
                            'play_type' => 'on_site',
                            'provider' => $link->type,
                        ];
                        $newLink->save();
                    }
                    if (in_array($link->type, ['soundcloud', 'spotify'])) {
                        $newLink->type = 'music';
                        $newLink->sort = $link->order;
                        $newLink->data = [
                            'title' => $link->title,
                            'url' => $link->url,
                            'play_type' => 'on_site',
                            'provider' => $link->type,
                        ];
                        $newLink->save();
                    }
                }
            });
    }
}
