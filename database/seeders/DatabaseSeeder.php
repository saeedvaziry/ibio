<?php

namespace Database\Seeders;

use App\LinkTypes\Button;
use App\LinkTypes\Text;
use App\Models\Admin;
use App\Models\Theme;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Admin::factory()->create([
            'email' => 'admin@example.com',
        ]);
        /* @var User $user */
        $user = User::factory()->create([
            'email' => 'user@example.com',
            'username' => 'saeedexample',
            'theme_id' => Theme::query()->where('name', 'legacy')->firstOrFail()->id,
        ]);
        $user->links()->create([
            'type' => class_basename(Text::class),
            'data' => [
                'text' => 'My Google Account',
            ],
            'sort' => 1,
            'is_active' => 1,
        ]);
        $user->links()->create([
            'type' => class_basename(Button::class),
            'data' => [
                'title' => 'Google',
                'url' => 'https://google.com',
            ],
            'sort' => 2,
            'is_active' => 1,
        ]);
        $user->links()->create([
            'type' => class_basename(Text::class),
            'data' => [
                'text' => 'My Facebook Account',
            ],
            'sort' => 3,
            'is_active' => 1,
        ]);
        $user->links()->create([
            'type' => class_basename(Button::class),
            'data' => [
                'title' => 'Facebook',
                'url' => 'https://facebook.com',
            ],
            'sort' => 4,
            'is_active' => 1,
        ]);
    }
}
