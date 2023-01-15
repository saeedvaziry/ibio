@foreach($links as $link)
    @php
        /** @var App\Models\Link $link */
    @endphp
    {!! $link->type()->render() !!}
@endforeach
