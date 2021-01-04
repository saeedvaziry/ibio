<template>
    <div>
        <v-card class="mb-5">
            <v-title class="mb-5" small>تصویر پروفایل</v-title>
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
        </v-card>
        <v-card>
            <div class="flex items-center justify-between mb-5">
                <v-title small>اطلاعات عمومی</v-title>
                <div class="flex items-center justify-end">
                    <span class="w-16 text-left">فارسی</span>
                    <label class="switch mx-2">
                        <input type="checkbox" v-model="fa">
                        <span class="slider active"></span>
                    </label>
                    <span class="w-16 text-right">انگلیسی</span>
                </div>
            </div>
            <form>
                <template v-if="fa">
                    <v-input name="name" label="نام من" v-model="form.name" class="mb-4" :error="$page.props.errors.info && $page.props.errors.info.name"></v-input>
                    <v-textarea name="bio" label="درباره من" v-model="form.bio" :error="$page.props.errors.bio && $page.props.errors.info.bio"></v-textarea>
                </template>
                <div v-else class="ltr">
                    <v-input name="name_en" label="Name" v-model="form.name_en" class="mb-4" :error="$page.props.errors.info && $page.props.errors.info.name_en"></v-input>
                    <v-textarea name="bio_en" label="Bio" v-model="form.bio_en" :error="$page.props.errors.bio_en && $page.props.errors.info.bio_en"></v-textarea>
                </div>
                <v-button :loading="saving" @click="save" class="mt-5">ذخیره</v-button>
            </form>
        </v-card>
    </div>
</template>

<script>
    export default {
        name: 'Info',
        data() {
            return {
                form: {
                    name: this.$page.props.user.name,
                    name_en: this.$page.props.user.name_en,
                    bio: this.$page.props.user.bio,
                    bio_en: this.$page.props.user.bio_en,
                },
                saving: false,
                fa: true
            }
        },
        methods: {
            async save() {
                this.saving = true;
                await this.$inertia.post(route('page-settings.info'), this.form, {
                    preserveScroll: true,
                    preserveState: true
                });
                this.saving = false;
            }
        }
    }
</script>
