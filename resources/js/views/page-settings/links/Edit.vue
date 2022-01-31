<template>
    <v-card class="mb-5">
        <form @submit.prevent="save" enctype="multipart/form-data">
            <v-select label="نوع لینک" :value="form.type" @selected="form.type = $event" :data="types" class="mb-4" :error="$page.props.errors.update && $page.props.errors.update.type"></v-select>
            <v-input name="title" label="عنوان" v-model="form.title" class="mb-4" :error="$page.props.errors.update && $page.props.errors.update.title"></v-input>
            <v-input name="title_en" label="عنوان انگلیسی (اختیاری)" ltr v-model="form.title_en" class="mb-4" :error="$page.props.errors.update && $page.props.errors.update.title_en"></v-input>
            <template v-if="form.type === 'text'">
                <v-input input-class="ltr" name="url" label="آدرس لینک" v-model="form.url" placeholder="http://example.com" class="mb-4" :error="$page.props.errors.update && $page.props.errors.update.url"></v-input>
            </template>
            <template v-if="form.type === 'youtube'">
                <v-input input-class="ltr" name="url" label="آدرس ویدیو" v-model="form.url" placeholder="https://youtube.com/embed/XXXX-XXXX" class="mb-4" :error="$page.props.errors.update && $page.props.errors.update.url"></v-input>
            </template>
            <template v-if="form.type === 'aparat'">
                <v-input input-class="ltr" name="url" label="آدرس ویدیو" v-model="form.url" placeholder="https://aparat.com/v/XXXXXX" class="mb-4" :error="$page.props.errors.update && $page.props.errors.update.url"></v-input>
            </template>
            <template v-if="form.type === 'spotify'">
                <v-input input-class="ltr" name="url" label="آدرس Track" v-model="form.url" placeholder="https://open.spotify.com/track/XXXXXXXX" class="mb-4" :error="$page.props.errors.update && $page.props.errors.update.url"></v-input>
            </template>
            <template v-if="form.type === 'soundcloud'">
                <v-input input-class="ltr" name="url" label="آدرس Track" v-model="form.url" placeholder="https://soundcloud.com/XXXXXXX" class="mb-4" :error="$page.props.errors.update && $page.props.errors.update.url"></v-input>
            </template>
            <div class="flex mt-5 items-center">
                <v-button class="ml-2" :loading="saving" @click="save">ذخیره</v-button>
                <v-button type="secondary" @click="$inertia.visit(route('page-settings.links'), {preserveScroll: true})">انصراف</v-button>
            </div>
        </form>
    </v-card>
</template>

<script>
    export default {
        name: 'EditLink',
        props: ['link'],
        mounted() {
            this.form = {
                type: this.link.type,
                title: this.link.title,
                title_en: this.link.title_en,
                url: this.link.url
            }
        },
        data() {
            return {
                form: {
                    type: 'text',
                    title: '',
                    title_en: '',
                    url: ''
                },
                types: [
                    {
                        title: 'لینک متنی',
                        value: 'text',
                        img: require('../../../../img/text.svg').default
                    },
                    {
                        title: 'ویدیو یوتیوب',
                        value: 'youtube',
                        img: require('../../../../img/youtube.svg').default
                    },
                    {
                        title: 'ویدیو آپارات',
                        value: 'aparat',
                        img: require('../../../../img/aparat.svg').default
                    },
                    {
                        title: 'ترک اسپاتیفای',
                        value: 'spotify',
                        img: require('../../../../img/spotify.svg').default
                    },
                    {
                        title: 'ترک ساندکلود',
                        value: 'soundcloud',
                        img: require('../../../../img/soundcloud.svg').default
                    },
                ],
                saving: false,
            }
        },
        methods: {
            async save() {
                this.saving = true;
                let formData = new FormData();
                formData.append('type', this.form.type);
                formData.append('title', this.form.title);
                formData.append('title_en', this.form.title_en);
                formData.append('url', this.form.url);
                await this.$inertia.post(route('page-settings.links.show', {link: this.$page.props.link.id}), formData, {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    },
                    preserveScroll: true
                });
                this.saving = false;
            }
        }
    }
</script>
