<template>
    <v-card class="mb-5">
        <form @submit.prevent="add" enctype="multipart/form-data">
            <v-select label="Link type" :value="form.type" @selected="form.type = $event" :data="types" class="mb-4" :error="$page.props.errors.create && $page.props.errors.create.type"></v-select>
            <v-input name="title" label="Title" v-model="form.title" class="mb-4" :error="$page.props.errors.create && $page.props.errors.create.title"></v-input>
            <template v-if="form.type === 'text'">
                <v-input name="url" label="URL" v-model="form.url" placeholder="http://example.com" class="mb-4" :error="$page.props.errors.create && $page.props.errors.create.url"></v-input>
            </template>
            <template v-if="form.type === 'youtube'">
                <v-input name="url" label="Video URL" v-model="form.url" placeholder="https://www.youtube.com/embed/XXXX-XXXX" class="mb-4" :error="$page.props.errors.create && $page.props.errors.create.url"></v-input>
            </template>
            <template v-if="form.type === 'spotify'">
                <v-input name="url" label="Track URL" v-model="form.url" placeholder="https://open.spotify.com/track/XXXXXXXX" class="mb-4" :error="$page.props.errors.create && $page.props.errors.create.url"></v-input>
            </template>
            <template v-if="form.type === 'soundcloud'">
                <v-input name="url" label="Track URL" v-model="form.url" placeholder="https://soundcloud.com/XXXXXXX" class="mb-4" :error="$page.props.errors.create && $page.props.errors.create.url"></v-input>
            </template>
            <div class="flex mt-5 items-center">
                <v-button class="mr-2" :loading="adding" @click="add">Add</v-button>
                <v-button type="secondary" @click="resetForm">Reset</v-button>
            </div>
        </form>
    </v-card>
</template>

<script>
    export default {
        name: 'AddLink',
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
                adding: false,
            }
        },
        methods: {
            async add() {
                this.adding = true;
                let formData = new FormData();
                formData.append('type', this.form.type);
                formData.append('title', this.form.title);
                formData.append('url', this.form.url);
                let endpoint = route('page-settings.links');
                await this.$inertia.post(endpoint, formData, {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                });
                this.adding = false;
            },
            resetForm() {
                this.form = {
                    type: 'text',
                    title: '',
                    url: ''
                };
            }
        }
    }
</script>
