<template>

    <!-- : is v-bind Shorthand -->
    <!-- @ is v-on Shorthand -->

    <cv-inline-notification v-if="visible"
        :kind="kind"
        :title="title"
        :sub-title="subTitle"
        :action-label="actionLabel"
        :close-aria-label="closeAriaLabel"
        :low-contrast="lowContrast"
        @action="doAction"
        @close="doClose">
    </cv-inline-notification>
</template>

<script>
    export default {
        name: 'InlineNotification',
        props: {
            kind: String,
            title: String,
            subTitle: String,
            actionLabel: String,
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
            doAction(event) {
                console.log('action call')
                console.log(event)
            },
            doClose() {
                this.visible = false;
            }
        },
    }
</script>