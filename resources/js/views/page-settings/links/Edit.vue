<template>
    <v-card class="mb-5">
        <form @submit.prevent="save" enctype="multipart/form-data">
            <v-select label="Link type" :value="form.type" @selected="form.type = $event" :data="types" class="mb-4" :error="$page.props.errors.update && $page.props.errors.update.type"></v-select>
            <v-input name="title" label="Title" v-model="form.title" class="mb-4" :error="$page.props.errors.update && $page.props.errors.update.title"></v-input>
            <template v-if="form.type === 'text'">
                <v-input name="url" label="URL" v-model="form.url" placeholder="http://example.com" class="mb-4" :error="$page.props.errors.update && $page.props.errors.update.url"></v-input>
            </template>
            <template v-if="form.type === 'youtube'">
                <v-input name="url" label="Video URL" v-model="form.url" placeholder="https://www.youtube.com/embed/XXXX-XXXX" class="mb-4" :error="$page.props.errors.update && $page.props.errors.update.url"></v-input>
            </template>
            <template v-if="form.type === 'spotify'">
                <v-input name="url" label="Track URL" v-model="form.url" placeholder="https://open.spotify.com/track/XXXXXXXX" class="mb-4" :error="$page.props.errors.update && $page.props.errors.update.url"></v-input>
            </template>
            <template v-if="form.type === 'soundcloud'">
                <v-input name="url" label="Track URL" v-model="form.url" placeholder="https://soundcloud.com/XXXXXXX" class="mb-4" :error="$page.props.errors.update && $page.props.errors.update.url"></v-input>
            </template>
            <div class="flex mt-5 items-center">
                <v-button class="mr-2" :loading="saving" @click="save">Save</v-button>
                <v-button type="secondary" @click="$inertia.visit(route('page-settings.links'), {preserveScroll: true})">Cancel</v-button>
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
                url: this.link.url
            }
        },
        data() {
            return {
                form: {
                    type: 'text',
                    title: '',
                    url: ''
                },
                types: [
                    {
                        title: 'Text Link',
                        value: 'text',
                        img: require('../../../../img/text.svg')
                    },
                    {
                        title: 'Youtube Video',
                        value: 'youtube',
                        img: require('../../../../img/youtube.svg')
                    },
                    {
                        title: 'Spotify Track',
                        value: 'spotify',
                        img: require('../../../../img/spotify.svg')
                    },
                    {
                        title: 'Soundcloud Track',
                        value: 'soundcloud',
                        img: require('../../../../img/soundcloud.svg')
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
