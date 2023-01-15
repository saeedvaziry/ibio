@php
    use App\Enums\ThemeBgType;
    use App\Enums\ThemeButtonBgType;
    use App\Enums\ThemeButtonRoundStyle;
    /** @var App\Models\User $user */
    /** @var App\Models\Theme $theme */
@endphp
<style>
    * {
        font-family: {{ $theme->font }} !important;
    }

    body {
        padding: 20px;
        display: flex;
        flex-direction: column;
        min-height: 100vh;
        justify-content: space-between;
        align-items: center;
    }

    body {
        @switch($user->theme->bg_type->value)
        @case(ThemeBgType::COLOR)
        background: {{ $user->theme->bg }};
        @break
        @case(ThemeBgType::IMAGE)
        background-size: cover;
        background-position: center center;
        background-image: url({{ $user->theme->bg }});
        background-repeat: no-repeat;
        @break
        @case(ThemeBgType::GRADIENT)
        background: linear-gradient({{ $user->theme->bg[0] }}, {{ $user->theme->bg[1] }}) no-repeat;
        @break
        @endswitch
        color: {{ $user->theme->text_color }};
    }

    main {
        width: 100%;
        max-width: 600px;
        margin: 0 auto;
    }

    .avatar {
        width: 90px;
        height: 90px;
        border-radius: 100%;
        margin: 0 auto;
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: {{ $theme->avatar_bg }};
        color: {{ $theme->avatar_text_color }};
        font-size: 30px;
    }

    .title {
        text-align: center;
        margin-top: 20px;
        font-size: 25px;
    }

    .description {
        margin-top: 20px;
        font-size: 18px;
        text-align: center;
        font-weight: 200;
    }

    .link {
        margin-top: 20px;
        cursor: pointer;
    }

    .link.button {
        transition: all 0.2s;
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: space-between;
        font-size: 18px;
        height: 55px;
        padding: 5px;
        color: {{ $theme->button_text_color }};
        @if($theme->button_bg_type == ThemeButtonBgType::COLOR)
        background: {{ $theme->button_bg }};
        @endif
        @if($theme->button_border)
        border: {{ $theme->button_border }} solid {{ $theme->button_border_color }};
        @endif
    }

    .link.button:hover {
        @if($theme->button_hover_bg)
        background: {{ $theme->button_hover_bg }} !important;
        @else
        background: rgba(0, 0, 0, 0.05) !important;
        @endif
        @if($theme->button_hover_text_color)
        color: {{ $theme->button_hover_text_color }} !important;
        @endif
        transform: scale(1.05);
    }

    .link.button-rounded {
        border-radius: 15px;
    }

    .link.button-circle {
        border-radius: 55px;
    }

    .link.button .thumbnail {
        width: 45px;
        height: 45px;
    }

    .link.button .thumbnail img {
        width: 100%;
        height: 100%;
        object-fit: fill;
        @if($theme->button_round_style == ThemeButtonRoundStyle::ROUNDED)
        border-radius: 15px;
        @elseif($theme->button_round_style == ThemeButtonRoundStyle::CIRCLE)
        border-radius: 55px;
        @endif
    }

    .link.text {
        margin-top: 20px;
        cursor: default;
    }

    .link.text img {
        max-width: 100%;
        margin-bottom: 10px;
        @if($theme->button_round_style == ThemeButtonRoundStyle::ROUNDED || $theme->button_round_style == ThemeButtonRoundStyle::CIRCLE)
        border-radius: 15px;
        @endif
    }

    .link.text p {
        font-size: 18px;
        text-align: center;
        font-weight: 200;
    }

    .media {
        overflow: hidden;
    }

    .media iframe {
        margin-top: 20px;
        width: 100% !important;
        height: 250px;
        @if($theme->button_round_style == ThemeButtonRoundStyle::ROUNDED || $theme->button_round_style == ThemeButtonRoundStyle::CIRCLE)
            border-radius: 15px;
        @endif
    }

    .media-enter {
        transition: all 0.3s ease-out;
    }

    .media-enter-start, .media-leave-end {
        max-height: 0;
    }

    .media-enter-end, .media-leave-start {
        max-height: 250px;
    }

    .media-leave {
        transition: all 0.3s ease-in;
    }

    .social-medias {
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 20px auto;
        flex-wrap: wrap;
    }

    .social-medias a {
        margin-left: 15px;
        margin-top: 10px;
        transition: all 0.2s;
    }

    .social-medias a:first-child {
        margin-left: 0;
    }

    .social-medias a svg {
        width: 30px;
        height: 30px;
        fill: currentColor !important;
        color: {{ $user->theme->social_media_color }} !important;
    }

    .social-medias a:hover {
        transform: scale(1.2);
    }

    footer img {
        margin: 30px auto;
        height: 25px;
    }

    .font-sans {
        font-family: sans-serif !important;
    }
</style>
