<template>
    <nav class="py-2 h-16 border-b flex items-center justify-center mb-5">
        <v-container class="flex items-center justify-between">
            <v-title class="text-purple-800 font-bold" small>iBio.link</v-title>
            <div class="flex items-center">
                <v-button type="secondary" class="mr-2" small @click="$inertia.visit(route('user', {username: $page.props.user.username}))">My Page</v-button>
                <v-dropdown>
                    <button slot="link" class="max-w-xs flex items-center text-sm rounded-full focus:outline-none focus:shadow-solid" id="user-menu" aria-label="User menu" aria-haspopup="true">
                        <v-avatar :user="$page.props.user"></v-avatar>
                    </button>
                    <template slot="items">
                        <v-dropdown-item @click="logout" :last="true">Sign out</v-dropdown-item>
                    </template>
                </v-dropdown>
                <form id="logout-form" action="/logout" method="POST" class="hidden">
                    <input type="hidden" name="_token" :value="$root.csrf_token">
                </form>
            </div>
        </v-container>
    </nav>
</template>

<script>
    export default {
        name: 'Navbar',
        methods: {
            logout() {
                document.getElementById('logout-form').submit();
            }
        }
    }
</script>
