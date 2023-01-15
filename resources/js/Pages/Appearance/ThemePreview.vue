<template>
    <div class="w-full h-full p-4 relative" :style="{background: background()}">
        <div class="absolute w-full h-full z-10"></div>
        <div class="w-full flex items-center justify-center">
            <div class="w-14 h-14 rounded-full flex items-center justify-center" :style="{background: theme.avatar_bg}">
                <span class="text-xl" :style="{color: theme.avatar_text_color}">{{ $page.props.user.name[0] }}</span>
            </div>
        </div>
        <div class="mt-2 text-center text-md" :style="{color: theme.text_color}">Your Name</div>
        <div class="mt-2 text-center text-sm" :style="{color: theme.text_color}">Your bio goes here</div>
        <a href="javascript:" class="mt-3 text-center w-full h-10 flex items-center justify-center" :style="button()">
            Button
        </a>
        <a href="javascript:" class="mt-3 text-center w-full h-10 flex items-center justify-center" :style="button()">
            Button
        </a>
    </div>
</template>

<script>
    export default {
        name: "ThemePreview",
        props: ['theme'],
        methods: {
            background() {
                if (this.theme.bg_type === 'color') {
                    return this.theme.bg;
                }

                if (this.theme.bg_type === 'gradient') {
                    return `linear-gradient(${this.theme.bg[0]}, ${this.theme.bg[1]}) no-repeat`;
                }
            },
            button() {
                return {
                    background: this.theme.button_bg,
                    color: this.theme.button_text_color,
                    border: this.buttonBorder(),
                    'border-color': this.theme.button_border_color,
                    'border-radius': this.buttonRadius()
                }
            },
            buttonBorder() {
                if(!this.theme.button_border) {
                    return '0px'
                }

                return `${this.theme.button_border} solid ${this.theme.button_border_color}`
            },
            buttonRadius() {
                if (this.theme.button_round_style === 'rounded') {
                    return '10px';
                }
                if (this.theme.button_round_style === 'circle') {
                    return '55px';
                }

                return '0px';
            }
        }
    }
</script>

<style scoped>

</style>
