<template>
    <v-section-card v-if="$page.props.links.length === 0">
        <template #description>
            <div class="text-center">
                You don't have any links yet!
                <span class="text-lg">🙁</span>
            </div>
        </template>
        <template #aside>
            <div class="flex items-center justify-center mt-2 md:mt-0">
                <v-button @click="create" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">Add your first link!</v-button>
            </div>
        </template>
    </v-section-card>
</template>

<script>
    import VButton from "@/Components/Button";
    import VSectionCard from "@/Components/SectionCard";
    import VSecondaryButton from "@/Components/SecondaryButton";

    export default {
        components: {VSecondaryButton, VSectionCard, VButton},

        data() {
            return {
                form: this.$inertia.form({})
            }
        },

        methods: {
            create() {
                this.form.post(route('links.create'), {
                    errorBag: 'createLink',
                    preserveScroll: (page) => Object.keys(page.props.errors).length
                })
            }
        }
    }
</script>
