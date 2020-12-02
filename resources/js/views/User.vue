<template>
    <div>
        <inertia-link :href="route('links')" v-if="$page.props.user" class="bg-gray-100 py-2 h-16 flex items-center justify-center mb-5 text-gray-700 cursor-pointer">
            Edit this page
        </inertia-link>
        <div class="w-full flex justify-center">
            <div class="p-5 w-full md:w-6/12 lg:5/12 xl:w-3/12 text-center">
                <v-avatar :user="$page.props.theUser" :size="20" font="2xl" class="mb-4 mx-auto"></v-avatar>
                <v-title small class="mb-4">{{ $page.props.theUser.name }}</v-title>
                <p class="text-sm" v-if="$page.props.theUser.bio">{{ $page.props.theUser.bio }}</p>
                <div class="mt-8">
                    <a v-for="link in $page.props.links" :key="link.id" :full="true" :href="`/go/${link.id}`" target="_blank" class="mb-3 bg-gray-100 focus:outline-none hover:bg-gray-200 transition-colors text-lg font-bold text-black py-2 px-6 rounded-lg w-full flex items-center justify-center cursor-pointer">{{ link.title }}</a>
                </div>
                <a href="/" class="inline-flex text-md text-gray-500 mt-10">ibio.link</a>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'User',
        created() {
            document.title = this.$page.props.title;
        }
    }
</script>
