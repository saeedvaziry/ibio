<?php

namespace App\Http\Resources;

use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    public function toArray($request): array
    {
        /* @var User $this */
        return [
            'name' => $this->name,
            'email' => $this->email,
            'username' => $this->username,
            'title' => $this->title,
            'bio' => $this->bio,
            'avatar' => $this->avatarUrl(),
            'cover' => $this->cover,
            'url' => $this->url(),
            'theme_id' => $this->theme_id,
            'two_factor_enabled' => $this->hasEnabledTwoFactorAuthentication(),
            'social_links_position' => $this->social_links_position,
        ];
    }
}
