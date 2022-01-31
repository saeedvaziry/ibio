<template>
    <nav class="py-2 h-16 border-b flex items-center justify-center mb-5 dark:border-gray-800">
        <v-container class="flex items-center justify-between">
            <div class="flex items-center">
                <a href="/" class="ml-5">
                    <img :src="require('../../img/logo.png').default" alt="iBio.link" class="h-6">
                </a>
                <v-dropdown open-direction="right">
                    <div slot="link" class="flex items-center cursor-pointer">
                        <svg v-if="$root.theme === 'light' || ($root.theme === 'system' && $root.system_theme === 'light')" viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6"><path d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" class="fill-yellow-400/20 stroke-yellow-500"></path><path d="M12 4v1M17.66 6.344l-.828.828M20.005 12.004h-1M17.66 17.664l-.828-.828M12 20.01V19M6.34 17.664l.835-.836M3.995 12.004h1.01M6 6l.835.836" class="stroke-yellow-500"></path></svg>
                        <svg v-if="$root.theme === 'dark' || ($root.theme === 'system' && $root.system_theme === 'dark')" viewBox="0 0 24 24" fill="none" class="w-6 h-6"><path fill-rule="evenodd" clip-rule="evenodd" d="M17.715 15.15A6.5 6.5 0 0 1 9 6.035C6.106 6.922 4 9.645 4 12.867c0 3.94 3.153 7.136 7.042 7.136 3.101 0 5.734-2.032 6.673-4.853Z" class="fill-purple-400/20"></path><path d="m17.715 15.15.95.316a1 1 0 0 0-1.445-1.185l.495.869ZM9 6.035l.846.534a1 1 0 0 0-1.14-1.49L9 6.035Zm8.221 8.246a5.47 5.47 0 0 1-2.72.718v2a7.47 7.47 0 0 0 3.71-.98l-.99-1.738Zm-2.72.718A5.5 5.5 0 0 1 9 9.5H7a7.5 7.5 0 0 0 7.5 7.5v-2ZM9 9.5c0-1.079.31-2.082.845-2.93L8.153 5.5A7.47 7.47 0 0 0 7 9.5h2Zm-4 3.368C5 10.089 6.815 7.75 9.292 6.99L8.706 5.08C5.397 6.094 3 9.201 3 12.867h2Zm6.042 6.136C7.718 19.003 5 16.268 5 12.867H3c0 4.48 3.588 8.136 8.042 8.136v-2Zm5.725-4.17c-.81 2.433-3.074 4.17-5.725 4.17v2c3.552 0 6.553-2.327 7.622-5.537l-1.897-.632Z" class="fill-purple-500"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M17 3a1 1 0 0 1 1 1 2 2 0 0 0 2 2 1 1 0 1 1 0 2 2 2 0 0 0-2 2 1 1 0 1 1-2 0 2 2 0 0 0-2-2 1 1 0 1 1 0-2 2 2 0 0 0 2-2 1 1 0 0 1 1-1Z" class="fill-purple-500"></path></svg>
                    </div>
                    <template slot="items">
                        <v-dropdown-item @click="$root.theme = 'light'">
                            <div class="flex items-center">
                                <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6"><path d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" class="fill-yellow-400/20 stroke-yellow-500"></path><path d="M12 4v1M17.66 6.344l-.828.828M20.005 12.004h-1M17.66 17.664l-.828-.828M12 20.01V19M6.34 17.664l.835-.836M3.995 12.004h1.01M6 6l.835.836" class="stroke-yellow-500"></path></svg>
                                <span class="mr-2">روز</span>
                            </div>
                        </v-dropdown-item>
                        <v-dropdown-item @click="$root.theme = 'dark'">
                            <div class="flex items-center">
                                <svg viewBox="0 0 24 24" fill="none" class="w-6 h-6"><path fill-rule="evenodd" clip-rule="evenodd" d="M17.715 15.15A6.5 6.5 0 0 1 9 6.035C6.106 6.922 4 9.645 4 12.867c0 3.94 3.153 7.136 7.042 7.136 3.101 0 5.734-2.032 6.673-4.853Z" class="fill-purple-400/20"></path><path d="m17.715 15.15.95.316a1 1 0 0 0-1.445-1.185l.495.869ZM9 6.035l.846.534a1 1 0 0 0-1.14-1.49L9 6.035Zm8.221 8.246a5.47 5.47 0 0 1-2.72.718v2a7.47 7.47 0 0 0 3.71-.98l-.99-1.738Zm-2.72.718A5.5 5.5 0 0 1 9 9.5H7a7.5 7.5 0 0 0 7.5 7.5v-2ZM9 9.5c0-1.079.31-2.082.845-2.93L8.153 5.5A7.47 7.47 0 0 0 7 9.5h2Zm-4 3.368C5 10.089 6.815 7.75 9.292 6.99L8.706 5.08C5.397 6.094 3 9.201 3 12.867h2Zm6.042 6.136C7.718 19.003 5 16.268 5 12.867H3c0 4.48 3.588 8.136 8.042 8.136v-2Zm5.725-4.17c-.81 2.433-3.074 4.17-5.725 4.17v2c3.552 0 6.553-2.327 7.622-5.537l-1.897-.632Z" class="fill-purple-500"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M17 3a1 1 0 0 1 1 1 2 2 0 0 0 2 2 1 1 0 1 1 0 2 2 2 0 0 0-2 2 1 1 0 1 1-2 0 2 2 0 0 0-2-2 1 1 0 1 1 0-2 2 2 0 0 0 2-2 1 1 0 0 1 1-1Z" class="fill-purple-500"></path></svg>
                                <span class="mr-2">شب</span>
                            </div>
                        </v-dropdown-item>
                        <v-dropdown-item @click="$root.theme = 'system'">
                            <div class="flex items-center">
                                <svg viewBox="0 0 24 24" fill="none" class="w-6 h-6"><path d="M4 6a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v7a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6Z" stroke-width="2" stroke-linejoin="round" class="stroke-slate-400 dark:stroke-slate-500"></path><path d="M14 15c0 3 2 5 2 5H8s2-2 2-5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="stroke-slate-400 dark:stroke-slate-500"></path></svg>
                                <span class="mr-2">سیستم</span>
                            </div>
                        </v-dropdown-item>
                    </template>
                </v-dropdown>
            </div>
            <div class="flex items-center">
                <v-button type="secondary" class="ml-2" small @click="showMyPage">صفحه من</v-button>
                <v-dropdown>
                    <button slot="link" class="max-w-xs flex items-center text-sm rounded-full focus:outline-none focus:shadow-solid" id="user-menu" aria-label="User menu" aria-haspopup="true">
                        <v-avatar :user="$page.props.user"></v-avatar>
                        <fa-icon :icon="['fas', 'bars']" class="block md:hidden text-2xl mr-2 text-gray-500"></fa-icon>
                    </button>
                    <template slot="items">
                        <div class="md:hidden">
                            <v-dropdown-item @click="$inertia.visit(route('dashboard'))">داشبورد</v-dropdown-item>
                            <v-dropdown-item @click="$inertia.visit(route('donation.settings'))">حمایت مالی</v-dropdown-item>
                            <v-dropdown-item @click="$inertia.visit(route('page-settings.info'))">تنظیمات صفحه</v-dropdown-item>
                            <v-dropdown-item @click="$inertia.visit(route('settings'))">تنظیمات</v-dropdown-item>
                            <v-dropdown-item @click="$inertia.visit(route('stats.clicks'))">آمار</v-dropdown-item>
                        </div>
                        <v-dropdown-item @click="logout" :last="true">خروج از حساب</v-dropdown-item>
                    </template>
                </v-dropdown>
                <form id="logout-form" action="/logout" method="POST" class="hidden">
                    <input type="hidden" name="_token" :value="$root.csrf_token">
                </form>
            </div>
        </v-container>
        <v-toast ref="toast"></v-toast>
    </nav>
</template>

<script>
    export default {
        name: 'Navbar',
        methods: {
            logout() {
                document.getElementById('logout-form').submit();
            },
            showMyPage() {
                if (this.$page.props.user.username) {
                    window.location.href = `/${this.$page.props.user.username}`
                } else {
                    this.$refs.toast.showToast('error', "شما هنوز نام کاربریتون رو انتخاب نکردید");
                }
            }
        }
    }
</script>
