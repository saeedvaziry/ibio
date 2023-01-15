@php
    /** @var App\Models\User $user */
    use Illuminate\Support\Facades\File;
@endphp
<div class="social-medias">
    @foreach($user->links()->where('is_active', 1)->where('type', 'Social')->get() as $link)
        <a href="{{ $link->data['url'] }}" rel="noreferrer" target="_blank" class="cursor-pointer transition duration-200 ease-in-out transform hover:scale-125">
            {!! File::get(public_path('images/' . $link->data['platform'] . '.svg')) !!}
        </a>
    @endforeach
</div>
