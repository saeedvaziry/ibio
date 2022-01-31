<div>
    @if($errorBag && $errors->{$errorBag}->count())
        <div class="bg-red-100 dark:bg-opacity-10 border-red-500 text-red-700 dark:text-red-500 border-l-4 p-4 rounded-sm {{ $class }}">
            <ul>
                @foreach ($errors->{$errorBag}->all() as $error)
                    <li class="@if($errors->{$errorBag}->count() > 1) mb-2 @endif">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @elseif(isset($errors) && count($errors) > 0)
        <div class="bg-red-100 dark:bg-opacity-10 border-red-500 text-red-700 dark:text-red-500 border-l-4 p-4 rounded-sm {{ $class }}">
            <ul>
                @foreach ($errors->all() as $error)
                    <li class="@if($errors->count() > 1) mb-2 @endif">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if(session()->has('error'))
        <div class="bg-red-100 dark:bg-opacity-10 border-red-500 text-red-700 dark:text-red-500 border-l-4 p-4 {{ $class }}">
            {{ session()->get('error') }}
        </div>
    @endif
</div>
