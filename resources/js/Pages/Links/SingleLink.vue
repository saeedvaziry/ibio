<template>
    <div class="flex min-h-30 w-full flex-row flex-nowrap justify-start">
        <div
            class="draggable-handle flex flex-none cursor-move flex-col items-center justify-center p-2"
        >
            <svg
                xmlns="http://www.w3.org/2000/svg"
                class="h-6 w-6 text-gray-600"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
                stroke-width="2"
            >
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"
                />
            </svg>
        </div>
        <div class="flex w-full flex-col border-r border-l border-gray-200 p-5">
            <div>
                <div v-if="link.data.title !== undefined" class="mb-3 text-lg">
                    <field-edit :link="link" field="title" input-class="text-lg" />
                </div>
                <div v-if="link.data.url !== undefined" class="mb-3 text-sm">
                    <field-edit :link="link" field="url" input-class="text-sm" />
                </div>
                <div v-if="link.data.number !== undefined" class="mb-3 text-sm">
                    <field-edit :link="link" field="number" input-class="text-sm" />
                </div>
                <div v-if="link.data.email !== undefined" class="mb-3 text-sm">
                    <field-edit :link="link" field="email" input-class="text-sm" />
                </div>
                <div v-if="link.data.text !== undefined" class="mb-3 text-sm">
                    <field-edit :link="link" field="text" input-class="text-sm" />
                </div>
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="h-5 w-5 cursor-pointer text-gray-400 hover:text-gray-700"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            stroke-width="2"
                            @click="$refs.thumbnail.toggleShow"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"
                            />
                        </svg>
                        <!--<svg-->
                        <!--    xmlns="http://www.w3.org/2000/svg"-->
                        <!--    class="ml-2 h-5 w-5 cursor-pointer text-gray-400 hover:text-gray-700"-->
                        <!--    fill="none"-->
                        <!--    viewBox="0 0 24 24"-->
                        <!--    stroke="currentColor"-->
                        <!--    stroke-width="2"-->
                        <!--&gt;-->
                        <!--    <path-->
                        <!--        stroke-linecap="round"-->
                        <!--        stroke-linejoin="round"-->
                        <!--        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"-->
                        <!--    />-->
                        <!--</svg>-->
                        <!--<svg-->
                        <!--    xmlns="http://www.w3.org/2000/svg"-->
                        <!--    class="ml-2 h-5 w-5 cursor-pointer text-gray-400 hover:text-gray-700"-->
                        <!--    fill="none"-->
                        <!--    viewBox="0 0 24 24"-->
                        <!--    stroke="currentColor"-->
                        <!--    stroke-width="2"-->
                        <!--&gt;-->
                        <!--    <path-->
                        <!--        stroke-linecap="round"-->
                        <!--        stroke-linejoin="round"-->
                        <!--        d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"-->
                        <!--    />-->
                        <!--</svg>-->
                    </div>
                    <div
                        class="inline-flex rounded-xl   bg-gray-100 py-1 px-2 text-xs uppercase text-gray-500"
                    >
                        {{ link.type }}
                    </div>
                </div>
            </div>
        </div>
        <div class="flex flex-none flex-col items-center justify-between py-5 px-3">
            <v-switch
                v-model:checked="activateForm.is_active"
                :checked="activateForm.is_active && link.is_data_valid"
                @change="toggleActivate"
            />
            <div>
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="h-6 w-6 cursor-pointer text-gray-500 hover:text-red-500"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                    stroke-width="2"
                    @click="$refs.deleteLink.toggleShow"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"
                    />
                </svg>
            </div>
        </div>
    </div>
    <div
        v-if="!link.is_data_valid"
        class="rounded-b-xl border-t border-yellow-200 bg-yellow-50 p-3 text-sm text-black"
    >
        Some fields are not valid!
    </div>
    <delete ref="deleteLink" :link="link" />
    <thumbnail ref="thumbnail" :link="link" />
</template>

<script>
    import FieldEdit from "@/Pages/Links/FieldEdit";
    import VSwitch from "@/Components/Switch";
    import Delete from "@/Pages/Links/Delete";
    import Thumbnail from "@/Pages/Links/Thumbnail";

    export default {
        components: { Thumbnail, Delete, VSwitch, FieldEdit },
        props: ["link"],
        data() {
            return {
                activateForm: this.$inertia.form({
                    is_active: this.link.is_active && this.link.is_data_valid,
                }),
            };
        },
        methods: {
            toggleActivate() {
                if (this.activateForm.is_active && !this.link.is_data_valid) {
                    this.activateForm.is_active = false;
                    return;
                }
                this.activateForm.post(route("links.update", { link: this.link }));
            },
        },
    };
</script>
