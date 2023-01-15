<!DOCTYPE html>
<html>
<head>
    @php
        /** @var App\Models\User $user */
        use App\Enums\SocialLinksPosition;
    @endphp
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <title>{{ $user->name }}</title>
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url('/' . $user->username) }}">
    <meta property="og:title" content="{{ $user->title }}">
    <meta property="og:description" content="{{ $user->bio }}">
    <meta property="og:image" content="{{ $user->avatar }}">
    <link rel="stylesheet" href="{{ mix('css/page.css') }}">
    @include('page.styles', ['theme' => $user->theme])
    <link href="https://fonts.googleapis.com/css2?family={{ $user->theme->font }}:wght@300;400;500;700&display=swap" rel="stylesheet">
</head>
<body>
    <main>
        @if($user->avatarUrl())
            <img class="avatar" src="{{ $user->avatarUrl() }}" alt="{{ $user->name }}">
        @else
            <div class="avatar {{ !is_persian_alphabet(mb_substr($user->name, 0, 1)) ? 'font-sans' : '' }}">{{ mb_substr($user->name, 0, 1) }}</div>
        @endif
        @if($user->social_links_position->value == SocialLinksPosition::TOP)
            @include('page.social-links')
        @endif
        <h1 class="title" style="color: {{ $user->theme->text_color }}">{{ $user->name }}</h1>
        @if($user->bio)
            <p class="description" style="color: {{ $user->theme->text_color }}">{{ $user->bio }}</p>
        @endif
        @include('page.links', [
            'links' => $user->links()->whereIn('type', config('links.types_when_creating'))->where('is_active', 1)->orderBy('sort')->get(),
            'theme' => $user->theme
        ])
        @if($user->social_links_position->value == SocialLinksPosition::BOTTOM)
            @include('page.social-links')
        @endif
    </main>
    <footer>
        <img src="{{ asset('images/logo.png') }}" alt="{{ config('app.name') }}" height="10">
    </footer>
    <script>
        document.addEventListener('click', event => {
            const classList = event.target.classList;
            if (classList.contains('link')) {
                const formData = new FormData();
                formData.append('_token', '{{ csrf_token() }}');
                const linkId = event.target.getAttribute('data-id');
                fetch('{{ route('page.metrics', ['username' => $user->username]) }}/' + linkId, {
                    method: 'POST',
                    body: formData
                });
            }
        });
    </script>
    <script src="{{ mix('js/page.js') }}"></script>
</body>
</html>
