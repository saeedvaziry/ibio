<?php

namespace App\Http\Controllers;

use App\Http\Resources\ThemeResource;
use App\Models\Theme;
use Illuminate\Http\RedirectResponse;
use Inertia\Response;

class AppearanceController extends Controller
{
    public function index(): Response
    {
        return inertia('Appearance/Index', [
            'title' => __('Appearance'),
            'preview' => true,
            'themes' => ThemeResource::collection(
                Theme::query()
                    ->where('user_id', $this->getUser()->id)
                    ->orWhereNull('user_id')
                    ->get()
            ),
        ]);
    }

    public function pickTheme(Theme $theme): RedirectResponse
    {
        $user = $this->getUser();
        if ($theme->user_id && $theme->user_id != $user->id) {
            abort(404);
        }
        $user->theme_id = $theme->id;
        $user->save();

        return back();
    }
}
