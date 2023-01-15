<a
    href="{{ $url }}"
    data-id="{{ $id }}"
    rel="noreferrer"
    target="_blank"
    class="cursor-pointer transition duration-200 ease-in-out transform hover:scale-125"
>
    {!! File::get(public_path('images/' . $platform . '.svg')) !!}
</a>
