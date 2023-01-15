<template>
    <div class="relative">
        <textarea
            ref="input"
            v-if="editing && textarea"
            type="text"
            rows="4"
            class="w-80 border-0 p-0 focus:ring-0"
            :class="inputClass"
            v-model="form[field]"
            @blur="hideEdit"
        ></textarea>
        <input
            ref="input"
            v-else-if="editing"
            type="text"
            class="w-full border-0 p-0 focus:ring-0"
            :class="inputClass"
            v-model="form[field]"
            @blur="hideEdit"
        />
        <div class="relative flex items-center" v-else>
            <div class="max-w-xxs cursor-pointer md:max-w-xs" @click="showEdit">
                <span v-if="form[field]"><span class="text-gray-600">{{ prefix }}</span>{{ form[field] }}</span>
                <span class="capitalize text-gray-500" v-else>{{ field }}</span>
            </div>
            <svg
                @click="showEdit"
                xmlns="http://www.w3.org/2000/svg"
                class="absolute -right-5 ml-2 h-4 w-4 cursor-pointer text-gray-500"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
                stroke-width="2"
            >
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"
                />
            </svg>
        </div>
        <div class="flex w-full items-center justify-center">
            <v-hidden-input-error
                :message="form.errors[field]"
                class="absolute -bottom-3 w-full w-72 font-normal"
                :class="inputClass"
            />
        </div>
    </div>
</template>

<script>
    import VInputError from "@/Components/InputError";
    import VHiddenInputError from "@/Components/HiddenInputError";

    export default {
        components: { VHiddenInputError, VInputError },
        props: ["user", "field", "inputClass", "prefix", "textarea"],
        data() {
            return {
                editing: false,
                form: this.$inertia.form({
                    [this.field]: this.user[this.field],
                }),
            };
        },
        methods: {
            showEdit() {
                this.editing = true;
                setTimeout(() => {
                    this.$refs.input.focus();
                }, 50);
            },
            hideEdit() {
                this.save();
                this.editing = false;
            },
            save() {
                this.form.post(route("users.update", { field: this.field }), this.form);
                this.$parent.$forceUpdate();
            },
        },
    };
</script>
