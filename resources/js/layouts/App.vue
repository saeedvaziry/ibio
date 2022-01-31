<template>
    <div>
        <div style="min-height: calc(100vh - 80px)">
            <navbar></navbar>
            <slot></slot>
            <v-toast ref="toast"></v-toast>
        </div>
        <div class="mx-auto flex flex-col md:flex-row items-center justify-between p-5 w-full sm:w-10/12 md:w-8/12 xl:w-7/12">
            <div class="w-full sm:w-8/12 text-right mb-5 md:mb-0">
                <ul class="md:flex text-sm text-gray-600 text-center md:text-right">
                    <li class="ml-3">
                        <a href="/">صفحه اصلی</a>
                    </li>
                    <li class="ml-3">
                        <a href="/privacy">حریم خصوصی</a>
                    </li>
                    <li class="ml-3">
                        <a href="/terms">قوانین و شرایط استفاده</a>
                    </li>
                </ul>
            </div>
            <div class="w-full sm:w-4/12 flex items-center justify-center md:justify-end">
                <a href="https://t.me/ibiolink" target="_blank" class="cursor-pointer ml-3 transition duration-200 ease-in-out transform hover:scale-125">
                    <img :src="require('../../img/telegram.svg').default" alt="Telegram" width="20">
                </a>
                <a href="https://www.instagram.com/ibio.link.official" target="_blank" class="cursor-pointer ml-3 transition duration-200 ease-in-out transform hover:scale-125">
                    <img :src="require('../../img/instagram.svg').default" alt="Instagram" width="20">
                </a>
                <a href="https://twitter.com/ibio_link" target="_blank" class="cursor-pointer ml-3 transition duration-200 ease-in-out transform hover:scale-125">
                    <img :src="require('../../img/twitter.svg').default" alt="Twitter" width="20">
                </a>
            </div>
        </div>
    </div>
</template>

<script>
    import Navbar from "./Navbar";

    export default {
        name: 'App',
        components: {Navbar},
        created() {
            document.title = this.$page.props.title;
        }
    }
</script>
