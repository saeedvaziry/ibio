<?php

namespace App\LinkTypes;

use App\Enums\MusicProvider;
use Illuminate\View\View;

final class Music extends AbstractLinkType
{
    public function rules(): array
    {
        return [
            'title' => 'required',
            'url' => [
                'required',
                'url',
                'max:1000',
                function ($attribute, $value, $fail) {
                    if (! $this->provider($value)) {
                        $fail(__('This music platform is not supported. Please consider using Button instead'));
                    }
                },
            ],
        ];
    }

    public function fields(): array
    {
        return [
            'title' => '',
            'url' => '',
            'play_type' => 'on_site',
            'provider' => '',
        ];
    }

    public function render(): View
    {
        return view('page.links.music', [
            'theme' => $this->link->user->theme,
            'id' => $this->link->id,
            'data' => $this->link->data,
            'provider' => $this->provider(),
            'embedUrl' => $this->getEmbedUrl(),
            'thumbnailUrl' => $this->link->thumbnail_url,
        ]);
    }

    private function provider(?string $url = null): ?string
    {
        $host = parse_url($url ?? $this->link->data['url'])['host'];

        if (in_array($host, ['open.spotify.com', 'www.open.spotify.com'])) {
            return MusicProvider::SPOTIFY;
        }

        if (in_array($host, ['soundcloud.com', 'www.soundcloud.com'])) {
            return MusicProvider::SOUNDCLOUD;
        }

        return null;
    }

    private function getEmbedUrl(): ?string
    {
        return match ($this->provider()) {
            MusicProvider::SPOTIFY => $this->getSpotifyEmbedUrl(),
            MusicProvider::SOUNDCLOUD => $this->getSoundcloudEmbedUrl(),
            default => null
        };
    }

    private function getSpotifyEmbedUrl(): string
    {
        $url = parse_url($this->link->data['url']);

        return 'https://open.spotify.com/embed'.$url['path'].'?theme=0';
    }

    private function getSoundcloudEmbedUrl(): string
    {
        return 'https://w.soundcloud.com/player?url='.$this->link->data['url'].'&auto_play=false&hide_related=false&show_comments=true&show_user=true&show_reposts=false&show_teaser=true';
    }
}
