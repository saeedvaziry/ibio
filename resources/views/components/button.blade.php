@if($type == 'primary')
    <button class="bg-black focus:outline-none text-xl font-bold text-white h-12 py-2 px-6 rounded-lg @if($full) w-full @endif">
        {{ $slot }}
    </button>
@elseif($type == 'secondary')
    <button class="bg-gray-100 focus:outline-none hover:bg-gray-200 transition-colors text-lg font-bold text-black h-12 py-2 px-6 rounded-lg @if($full) w-full @endif">
        {{ $slot }}
    </button>
@endif
