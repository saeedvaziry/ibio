<template>
    <dashboard>
        <v-card>
            <v-title class="mb-5" small>Create new link</v-title>
            <form @submit.prevent="create" enctype="multipart/form-data">
                <!--<v-select label="Link type" :value="form.type" @selected="form.type = $event" :data="types" class="mb-4" :error="$page.props.errors.create && $page.props.errors.create.type"></v-select>-->
                <v-input name="title" label="Title" v-model="form.title" class="mb-4" :error="$page.props.errors.create && $page.props.errors.create.title"></v-input>
                <v-input name="url" label="URL" v-model="form.url" placeholder="http://example.com" class="mb-4" :error="$page.props.errors.create && $page.props.errors.create.url"></v-input>
                <!--<v-input label="Image" type="file" ref="image" :error="$page.props.errors.create && $page.props.errors.create.image"></v-input>-->
                <div class="flex mt-8">
                    <v-button :loading="creating" @click="create" class="mr-2">Create</v-button>
                    <v-button type="secondary" @click="$inertia.visit(route('links'))">Cancel</v-button>
                </div>
            </form>
        </v-card>
    </dashboard>
</template>

<script>
    export default {
        name: 'CreateLink',
        data() {
            return {
                form: {
                    type: 'text',
                    title: '',
                    url: '',
                    image: ''
                },
                creating: false,
                types: [
                    {
                        title: 'Text',
                        value: 'text',
                    },
                ]
            }
        },
        methods: {
            async create() {
                this.creating = true;
                let formData = new FormData();
                formData.append('type', this.form.type);
                formData.append('title', this.form.title);
                formData.append('url', this.form.url);
                // if (this.$refs.image.$refs.input.files.length > 0) {
                //     formData.append('image', this.$refs.image.$refs.input.files[0]);
                // }
                await this.$inertia.post(route('links.create'), formData, {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                });
                this.creating = false;
            }
        }
    }
</script>
