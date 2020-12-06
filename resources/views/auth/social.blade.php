<div class="mb-10">
    <a href="{{ route('oauth', ['provider' => 'google']) }}" class="flex items-center justify-center text-center bg-red-500 focus:outline-none text-xl font-bold text-white h-12 py-2 px-6 rounded-lg w-full mb-3">
        Login with Google
    </a>
    <a href="{{ route('oauth', ['provider' => 'facebook']) }}" class="flex items-center justify-center text-center bg-blue-600 focus:outline-none text-xl font-bold text-white h-12 py-2 px-6 rounded-lg w-full mb-3">
        Login with Facebook
    </a>
    <a href="{{ route('oauth', ['provider' => 'twitter']) }}" class="flex items-center justify-center text-center bg-blue-400 focus:outline-none text-xl font-bold text-white h-12 py-2 px-6 rounded-lg w-full mb-3">
        Login with Twitter
    </a>
</div>
<div class="my-8 text-center text-2xl">OR</div>
