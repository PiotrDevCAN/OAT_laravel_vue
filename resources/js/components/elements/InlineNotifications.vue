<template>
    <div>
        <div v-if="getErrorsCount!==0">
            <inline-notification v-bind:key="index" v-for="(error, index) in getErrors"
                :visible="error.visible"
                :kind="error.kind"
                :title="error.title"
                :sub-title="error.subTitle"
                :action-label="actionName"
                :low-contrast="error.lowContrast">
            </inline-notification>
        </div>

        <div v-if="getInfosCount!==0">
            <inline-notification v-bind:key="index" v-for="(error, index) in getInfos"
                :visible="error.visible"
                :kind="error.kind"
                :title="error.title"
                :sub-title="error.subTitle"
                :action-label="actionName"
                :low-contrast="error.lowContrast">
            </inline-notification>
        </div>
            
        <div v-if="getSuccessesCount!==0">
            <inline-notification v-bind:key="index" v-for="(error, index) in getSuccesses"
                :visible="error.visible"
                :kind="error.kind"
                :title="error.title"
                :sub-title="error.subTitle"
                :action-label="actionName"
                :low-contrast="error.lowContrast">
            </inline-notification>
        </div>
        
        <div v-if="getWarningsCount!==0">
            <inline-notification v-bind:key="index" v-for="(error, index) in getWarnings"
                :visible="error.visible"
                :kind="error.kind"
                :title="error.title"
                :sub-title="error.subTitle"
                :action-label="actionName"
                :low-contrast="error.lowContrast">
            </inline-notification>
        </div>
    </div>
</template>

<script>

    import { createNamespacedHelpers } from 'vuex'
    const { mapGetters } = createNamespacedHelpers('common')

    import InlineNotification from './InlineNotification.vue'

    export default {
        name: 'InlineNotifications',
        components: {
            InlineNotification
        },
        props: {
            
        },
        data() {
            return {
                actionName: ''
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