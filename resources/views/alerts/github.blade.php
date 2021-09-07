<div id="github" class="hidden flex-col lg:flex-row justify-center items-center py-2" style="background-color: #232323; color: #ececec;">
    <h5 class="inline-flex text-center mb-2 lg:mb-0">آی بیو اوپن سورس شد!</h5>
    <a href="https://github.com/saeedvaziry/ibio" style="background-color: #e2d900; color:#232323; border-radius: 0.5rem" class="mx-3 py-2 px-4 inline-flex mb-2 lg:mb-0">گیت هاب</a>
    <a href="javascript:" onclick="hideGithub()" style="color:#fff;" class="inline-flex">باشه</a>
</div>
<script>
    let github = localStorage.getItem('github');
    if (!github) {
        document.getElementById('github').classList.remove('hidden');
        document.getElementById('github').classList.add('flex');
    }
    function hideGithub() {
        localStorage.setItem('github', 'hidden');
        document.getElementById('github').classList.remove('flex');
        document.getElementById('github').classList.add('hidden');
    }
</script>
