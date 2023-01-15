@php
    use App\Enums\ThemeButtonThumbnailPosition;
    /** @var App\Models\Theme $theme */
@endphp
<div x-data="{open: false}">
    <div
        class="link button button-{{ $theme->button_round_style->value }} shadow-{{ $theme->button_shadow_style->value }}"
        data-id="{{ $id }}"
        @click="open = !open; document.getElementById('media-{{ $id }}').click()"
    >
        <div class="thumbnail">
            @if($thumbnailUrl && $theme->button_thumbnail_position == ThemeButtonThumbnailPosition::LEFT)
                <img src="{{ $thumbnailUrl }}" alt="{{ $data['title'] }}">
            @endif
        </div>
        <div>
            {{ $data['title'] }}
        </div>
        <div class="thumbnail">
            @if($thumbnailUrl && $theme->button_thumbnail_position == ThemeButtonThumbnailPosition::RIGHT)
                <img src="{{ $thumbnailUrl }}" alt="{{ $data['title'] }}">
            @endif
        </div>
    </div>
    <div
        x-show="open"
        class="media"
        x-transition:enter="media-enter"
        x-transition:enter-start="media-enter-start"
        x-transition:enter-end="media-enter-end"
        x-transition:leave="media-leave"
        x-transition:leave-start="media-leave-start"
        x-transition:leave-end="media-leave-end"
    >
        <iframe style="height: 166px" id="media-{{ $id }}" src="{{ $embedUrl }}" title="{{ $data['title'] }}" frameborder="0" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" allowfullscreen loading="lazy"></iframe>
    </div>
</div>
