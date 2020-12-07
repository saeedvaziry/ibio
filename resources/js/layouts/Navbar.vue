<template>
    <nav class="py-2 h-16 border-b flex items-center justify-center mb-5">
        <v-container class="flex items-center justify-between">
            <a href="/">
                <img :src="require('../../img/logo.png')" alt="iBio.link" class="h-6">
            </a>
            <div class="flex items-center">
                <v-button type="secondary" class="mr-2" small @click="showMyPage">My Page</v-button>
                <v-dropdown>
                    <button slot="link" class="max-w-xs flex items-center text-sm rounded-full focus:outline-none focus:shadow-solid" id="user-menu" aria-label="User menu" aria-haspopup="true">
                        <v-avatar :user="$page.props.user"></v-avatar>
                    </button>
                    <template slot="items">
                        <div class="md:hidden">
                            <v-dropdown-item @click="$inertia.visit(route('dashboard'))">Dashboard</v-dropdown-item>
                            <v-dropdown-item @click="$inertia.visit(route('page-settings.info'))">Page Settings</v-dropdown-item>
                            <v-dropdown-item @click="$inertia.visit(route('settings'))">Settings</v-dropdown-item>
                            <v-dropdown-item @click="$inertia.visit(route('stats'))">Stats</v-dropdown-item>
                        </div>
                        <v-dropdown-item @click="logout" :last="true">Sign out</v-dropdown-item>
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
                    this.$refs.toast.showToast('error', "You haven't set your username yet!");
                }
            }
        }
    }
</script>
