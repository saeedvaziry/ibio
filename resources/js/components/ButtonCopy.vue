<template>
    <v-secondary-button v-if="type === 'secondary'" :small="small" @click="copy">
        <slot name="copied" v-if="copied && $slots.copied"></slot>
        <span v-else-if="copied">Copied!</span>
        <slot v-else></slot>
    </v-secondary-button>
    <v-button v-else :small="small" @click="copy">
        <slot name="copied" v-if="copied && $slots.copied"></slot>
        <span v-else-if="copied">Copied!</span>
        <slot v-else></slot>
    </v-button>
</template>

<script>
    import VButton from "@/Components/Button";
    import VSecondaryButton from "@/Components/SecondaryButton";

    export default {
        name: "VButtonCopy",
        components: {VSecondaryButton, VButton },
        props: {
            type: String,
            small: Boolean,
            copyText: String,
        },
        data() {
            return {
                copied: false,
            };
        },
        methods: {
            copy() {
                let copyElement = document.createElement("input");
                copyElement.type = "text";
                copyElement.classList.add("opacity-0");
                copyElement.value = this.copyText;
                copyElement.id = "copy-element";
                document.body.appendChild(copyElement);
                copyElement.select();
                copyElement.setSelectionRange(0, 99999);
                document.execCommand("copy");
                copyElement.blur();
                this.copied = true;
                setTimeout(
                    function () {
                        this.copied = false;
                    }.bind(this),
                    1000
                );
            },
        },
    };
</script>
