<div id="internet" class="hidden flex-col lg:flex-row justify-center items-center py-2" style="background-color: #232323; color: #ececec;">
    <h5 class="inline-flex text-center mb-2 lg:mb-0">مخالفت با طرح‌های محدودکننده اینترنت بین‌المللی</h5>
    <a href="https://www.karzar.net/internet" style="background-color: #e2d900; color:#232323; border-radius: 0.5rem" class="mx-3 py-2 px-4 inline-flex mb-2 lg:mb-0">امضاء کارزار</a>
    <a href="javascript:" onclick="hideInternet()" style="color:#fff;" class="inline-flex">امضاء کردم</a>
</div>
<script>
    let internet = localStorage.getItem('internet');
    if (!internet) {
        document.getElementById('internet').classList.remove('hidden');
        document.getElementById('internet').classList.add('flex');
    }
    function hideInternet() {
        localStorage.setItem('internet', 'hidden');
        document.getElementById('internet').classList.remove('flex');
        document.getElementById('internet').classList.add('hidden');
    }
</script>
