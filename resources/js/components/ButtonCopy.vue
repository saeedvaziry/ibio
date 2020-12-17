<template>
    <v-button :type="type" :small="small" @click="copy">
        <span v-if="copied">کپی شد!</span>
        <slot v-else></slot>
    </v-button>
</template>

<script>
    export default {
        name: "ButtonCopy",
        props: {
            type: String,
            small: Boolean,
            copyText: String
        },
        data() {
            return {
                copied: false
            }
        },
        methods: {
            copy() {
                let copyElement = document.createElement('input');
                copyElement.type = 'text';
                copyElement.classList.add('opacity-0');
                copyElement.value = this.copyText;
                copyElement.id = 'copy-element';
                document.body.appendChild(copyElement);
                copyElement.select();
                copyElement.setSelectionRange(0, 99999);
                document.execCommand("copy");
                copyElement.blur();
                this.copied = true;
                setTimeout(function () {
                    this.copied = false;
                }.bind(this), 700);
            },
        }
    }
</script>
