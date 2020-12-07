<div id="cookie" class="hidden fixed right-0 bottom-0 bg-gray-50 border-2 border-gray-200 p-4 w-64 mr-5 mb-5 rounded-lg">
    <div class="mb-3">This website uses cookies to improve your experience, but you can opt-out if you wish.</div>
    <button type="button" onclick="acceptCookie()" class="bg-gray-200 focus:outline-none hover:bg-gray-100 transition-colors inline-flex items-center justify-center text-sm md:text-md font-semibold text-gray-700 py-2 px-4 rounded-lg">Accept</button>
</div>
<script>
    let cookie = localStorage.getItem('cookie');
    if (!cookie) {
        document.getElementById('cookie').classList.remove('hidden');
    }

    function acceptCookie() {
        localStorage.setItem('cookie', 'accepted');
        document.getElementById('cookie').classList.add('hidden');
    }
</script>
