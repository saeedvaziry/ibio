@if($type == 'primary')
    <button class="bg-black focus:outline-none text-xl text-white h-12 py-2 px-6 rounded-lg @if($full) w-full @endif">
        {{ $slot }}
    </button>
@elseif($type == 'purple')
    <button class="bg-purple-600 hover:bg-purple-500 focus:outline-none text-xl text-white h-12 py-2 px-6 rounded-lg @if($full) w-full @endif">
        {{ $slot }}
    </button>
@elseif($type == 'secondary')
    <button class="bg-white border-2 border-black focus:outline-none hover:bg-black hover:text-white transition-colors text-lg text-black h-12 py-2 px-6 rounded-lg @if($full) w-full @endif">
        {{ $slot }}
    </button>
@endif
