<div class="mb-4">
    <label class="block mb-3" for="{{ $name }}">{{ __($label) }}</label>
    <input id="{{ $name }}" type="{{ $type }}" name="{{ $name }}" placeholder="{{ $placeholder }}" value="{{ $value }}" class="bg-gray-100 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-black focus:bg-white placeholder-gray-600 rounded-lg py-3 block w-full px-4 @if($ltr) ltr @endif">
</div>
