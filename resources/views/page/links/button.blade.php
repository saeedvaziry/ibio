@php
    use App\Enums\ThemeButtonThumbnailPosition;
    /** @var App\Models\Theme $theme */
@endphp
<a
    href="{{ $url }}"
    target="_blank"
    class="link button button-{{ $theme->button_round_style->value }} shadow-{{ $theme->button_shadow_style->value }}"
    data-id="{{ $id }}"
>
    <div class="thumbnail">
        @if($thumbnailUrl && $theme->button_thumbnail_position == ThemeButtonThumbnailPosition::LEFT)
            <img src="{{ $thumbnailUrl }}" alt="{{ $title }}">
        @endif
    </div>
    <div>
        {{ $title }}
    </div>
    <div class="thumbnail">
        @if($thumbnailUrl && $theme->button_thumbnail_position == ThemeButtonThumbnailPosition::RIGHT)
            <img src="{{ $thumbnailUrl }}" alt="{{ $title }}">
        @endif
    </div>
</a>
