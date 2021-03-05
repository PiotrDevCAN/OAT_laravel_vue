<template>

    <!-- : is v-bind Shorthand -->
    <!-- @ is v-on Shorthand -->

    <cv-toast-notification v-if="visible" 
        :kind="kind"
        :title="title"
        :sub-title="subTitle"
        :caption="caption"
        :close-aria-label="closeAriaLabel"
        :low-contrast="lowContrast"
        @close="doClose">
    </cv-toast-notification>
</template>

<script>
    export default {
        name: 'ToastNotification',
        props: {
            kind: String,
            title: String,
            subTitle: String,
            caption: String,
            closeAriaLabel: {
                type: String, 
                default: 'Clear filter' 
            },
            lowContrast: {
                type: Boolean,
                default: true
            }
        },
        data() {
            return {
                visible: true
            }
        },
        methods: {
            doClose() {
                this.visible = false;
            }
        },
    }
</script>