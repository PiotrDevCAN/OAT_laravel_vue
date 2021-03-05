<template>

    <!-- : is v-bind Shorthand -->
    <!-- @ is v-on Shorthand -->

    <div>
        <div v-if="getErrorsCount!==0">
            <toast-notification v-bind:key="index" v-for="(error, index) in getErrors"
                :kind="error.kind"
                :title="error.title"
                :sub-title="error.subTitle"
                :caption="error.caption"
                :close-aria-label="error.closeAriaLabel"
                :low-contrast="error.lowContrast">
            </toast-notification>
        </div>

        <div v-if="getInfosCount!==0">
            <toast-notification v-bind:key="index" v-for="(error, index) in getInfos"
                :kind="error.kind"
                :title="error.title"
                :sub-title="error.subTitle"
                :caption="error.caption"
                :close-aria-label="error.closeAriaLabel"
                :low-contrast="error.lowContrast">
            </toast-notification>
        </div>
            
        <div v-if="getSuccessesCount!==0">
            <toast-notification v-bind:key="index" v-for="(error, index) in getSuccesses"
                :kind="error.kind"
                :title="error.title"
                :sub-title="error.subTitle"
                :caption="error.caption"
                :close-aria-label="error.closeAriaLabel"
                :low-contrast="error.lowContrast">
            </toast-notification>
        </div>
        
        <div v-if="getWarningsCount!==0">
            <toast-notification v-bind:key="index" v-for="(error, index) in getWarnings"
                :kind="error.kind"
                :title="error.title"
                :sub-title="error.subTitle"
                :caption="error.caption"
                :close-aria-label="error.closeAriaLabel"
                :low-contrast="error.lowContrast">
            </toast-notification>
        </div>
    </div>
</template>

<script>

    import { createNamespacedHelpers } from 'vuex'
    const { mapGetters } = createNamespacedHelpers('common')

    import ToastNotification from './ToastNotification.vue'

    export default {
        name: 'ToastNotifications',
        components: {
            ToastNotification
        },
        props: {

        },
        data() {
            return {

            }
        },
        // computed variables are cached !!!
        computed: {
            // store getters in common.js
            ...mapGetters({
                getErrors: 'getErrors',
                getErrorsCount: 'countErrors',

                getInfos: 'getInfos',
                getInfosCount: 'countInfos',

                getSuccesses: 'getSuccesses',
                getSuccessesCount: 'countSuccesses',

                getWarnings: 'getWarnings',
                getWarningsCount: 'countWarnings'
            }),
        }
    }
</script>