<div>
    @if($type == 'validation')
        @if (isset($errors) && count($errors) > 0)
            <div class="bg-red-100 border-red-500 text-red-700 border-l-4 p-4 rounded-sm {{ $class }}">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    @else
        <div class="@if($type == 'success') bg-green-100 border-green-500 text-green-700 rounded-sm @elseif($type == 'error') bg-red-100 border-red-500 text-red-700 @endif border-l-4 p-4 {{ $class }}">
            {{ $slot }}
        </div>
    @endif
</div>
