<template>
    <v-card>
        <v-title class="mb-5" small>اطلاعات عمومی</v-title>
        <div class="flex items-center mb-5">
            <v-avatar ref="avatar" :user="$page.props.user" size="w-16 h-16 md:w-20 md:h-20" font="text-md md:text-2xl" class="ml-3 md:ml-5" upload></v-avatar>
            <div class="flex items-center">
                <v-button type="secondary" small @click="$refs.avatar.selectFile()">آپلود</v-button>
                <v-button type="color" color="red" small v-if="$page.props.user.avatar" class="mr-2" @click="$inertia.visit(route('page-settings.info.avatar'), {method: 'delete'})">
                    <span class="md:hidden">حذف</span>
                    <span class="hidden md:block">حذف تصویر</span>
                </v-button>
            </div>
        </div>
        <form>
            <v-input name="name" label="نام من" v-model="form.name" class="mb-4" :error="$page.props.errors.info && $page.props.errors.info.name"></v-input>
            <v-textarea name="bio" label="درباره من" v-model="form.bio" :error="$page.props.errors.bio && $page.props.errors.info.bio"></v-textarea>
            <v-button :loading="saving" @click="save" class="mt-5">ذخیره</v-button>
        </form>
    </v-card>
</template>

<script>
    export default {
        name: 'Info',
        data() {
            return {
                form: {
                    name: this.$page.props.user.name,
                    bio: this.$page.props.user.bio
                },
                saving: false
            }
        },
        methods: {
            async save() {
                this.saving = true;
                await this.$inertia.post(route('page-settings.info'), this.form, {
                    preserveScroll: true
                });
                this.saving = false;
            }
        }
    }
</script>
