<div class="mb-4">
    <label class="block mb-3 dark:text-gray-300" for="{{ $name }}">{{ __($label) }}</label>
    <input id="{{ $name }}" type="{{ $type }}" name="{{ $name }}" placeholder="{{ $placeholder }}" value="{{ $value }}" class="dark:text-gray-300 bg-gray-100 dark:bg-gray-800 hover:bg-gray-200 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-black dark:focus:ring-gray-500 focus:bg-white dark:focus:bg-gray-800 placeholder-gray-600 rounded-lg py-3 block w-full px-4 @if($ltr) ltr @endif" @if($required) required @endif>
</div>
