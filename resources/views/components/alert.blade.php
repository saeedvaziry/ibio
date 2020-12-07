<div>
    @if (isset($errors) && count($errors) > 0)
        <div class="bg-red-100 border-red-500 text-red-700 border-l-4 p-4 rounded-sm {{ $class }}">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if(session()->has('error'))
        <div class="bg-red-100 border-red-500 text-red-700 border-l-4 p-4 {{ $class }}">
            {{ session()->get('error') }}
        </div>
    @endif
</div>
