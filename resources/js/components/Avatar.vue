<template>
    <div class="relative" :class="{'cursor-pointer': upload}" @mouseenter="hover = true" @mouseleave="hover = false" @click="selectFile">
        <img v-if="user.avatar" :class="`${size}`" class="rounded-full border-4 border-purple-100" :src="user.avatar" alt="" />
        <div v-else :class="`${size} ${font}`" class="rounded-full inline-flex items-center justify-center bg-purple-200 text-purple-600 border-4 border-purple-100 capitalize">
            <span :class="{'opacity-0': upload && hover}">{{ user.name.charAt(0) }}</span>
        </div>
        <div class="absolute flex items-center justify-center top-0 lef-0 rounded-full" :class="size" style="background-color: rgba(79,78,78,0.29)" v-if="hover && upload">
            <fa-icon :icon="['fas', 'camera']" class="text-black text-2xl"></fa-icon>
        </div>
        <input type="file" ref="file" class="hidden" @change="uploadAvatar">
    </div>
</template>

<script>
    export default {
        name: 'Avatar',
        props: {
            size: {
                type: String,
                default: 'w-10 h-10'
            },
            font: {
                type: String,
                default: 'text-sm md:text-md'
            },
            user: Object,
            upload: Boolean
        },
        data() {
            return {
                hover: false
            }
        },
        methods: {
            selectFile() {
                this.upload && this.$refs.file.click()
            },
            async uploadAvatar() {
                let formData = new FormData();
                if (this.$refs.file.files.length > 0) {
                    formData.append('avatar', this.$refs.file.files[0]);
                }
                await this.$inertia.post(route('page-settings.info.avatar'), formData, {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                });
            }
        }
    }
</script>
