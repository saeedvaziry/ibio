<template>
    <v-card>
        <v-title class="mb-5" small>نام کاربری</v-title>
        <form>
            <v-input input-class="ltr" name="username" label="این فیلد همان آدرس صفحه شماست که به صورت ibio.link/yourname خواهد بود" v-model="searchQuery" class="mb-2" @keyup="keyUp = true" @input="isTyping = true"></v-input>
            <div class="text-sm mb-5">
                <span class="text-gray-500" v-if="isLoading">درحال بررسی...</span>
                <span class="text-red-500" v-else-if="$page.props.errors.username">{{ $page.props.errors.username.username }}</span>
                <span class="text-green-500" v-else-if="checked">تبریک! نام کاربری مورد نظر موجوده</span>
            </div>
            <v-button :loading="saving" :disabled="saving || isLoading" @click="save">ذخیره</v-button>
        </form>
    </v-card>
</template>

<script>
    export default {
        name: 'Username',
        data() {
            return {
                searchQuery: this.$page.props.user.username,
                isTyping: false,
                isLoading: false,
                keyUp: false,
                saving: false,
                checked: false
            }
        },
        watch: {
            searchQuery: _.debounce(function () {
                this.isTyping = false;
            }, 700),
            isTyping: function (value) {
                if (!value && this.keyUp && this.searchQuery.length > 0) {
                    this.search(this.searchQuery)
                }
            }
        },
        methods: {
            async search(searchQuery) {
                this.isLoading = true;
                await this.$inertia.post(route('page-settings.info.check-username'), {
                    username: searchQuery
                });
                this.keyUp = false;
                this.isLoading = false;
                this.checked = true;
            },
            async save() {
                this.saving = true;
                await this.$inertia.post(route('page-settings.info.username'), {
                    username: this.searchQuery
                }, {
                    preserveScroll: true
                });
                this.saving = false;
            }
        }
    }
</script>
