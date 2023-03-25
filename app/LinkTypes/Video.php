<?php

namespace App\LinkTypes;

use App\Enums\VideoProvider;
use Illuminate\View\View;

final class Video extends AbstractLinkType
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
                        $fail(__('This video platform is not supported. Please consider using Button instead'));
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
        return view('page.links.video', [
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
        $parsedUrl = parse_url($url ?? $this->link->data['url']);

        if (! isset($parsedUrl['host'])) {
            return null;
        }

        if (in_array($parsedUrl['host'], ['youtube.com', 'www.youtube.com', 'youtu.be', 'www.youtu.be'])) {
            return VideoProvider::YOUTUBE;
        }

        if (in_array($parsedUrl['host'], ['vimeo.com', 'www.vimeo.com'])) {
            return VideoProvider::VIMEO;
        }

        return null;
    }

    private function getEmbedUrl(): ?string
    {
        return match ($this->provider()) {
            VideoProvider::YOUTUBE => $this->getYoutubeEmbedUrl(),
            VideoProvider::VIMEO => $this->getVimeoEmbedUrl(),
            default => null
        };
    }

    private function getYoutubeEmbedUrl(): string
    {
        return preg_replace(
            "/\s*[a-zA-Z\/\/:\.]*youtu(be.com\/watch\?v=|.be\/)([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i",
            '//www.youtube.com/embed/$2',
            $this->link->data['url']
        );
    }

    private function getVimeoEmbedUrl(): string
    {
        $url = parse_url($this->link->data['url']);

        return 'https://player.vimeo.com/video'.$url['path'];
    }
}
