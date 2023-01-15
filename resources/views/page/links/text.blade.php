@php
    /** @var App\Models\Link $link */
@endphp
<div class="link text" data-id="{{ $link->id }}">
    @if($link->thumbnail_url)
        <img src="{{ $link->thumbnail_url }}" alt="{{ $link->data['text'] }}" class="image">
    @endif
    <p>{{ $link->data['text'] }}</p>
</div>
