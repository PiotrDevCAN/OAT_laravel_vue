<template>
    <div>
        <h4>{{ section.heading }}</h4>
        <div v-bind:key="index" v-for="(field, index) in section.fields" >
            <form-field v-if="checkIsLoaded(field.id)"
                :field="field" 
                :check-is-loaded="checkIsLoaded"
                :options-data="optionsData"
                v-on:created="handleFieldCreate">
            </form-field>
        </div>
    </div>
</template>

<script>

import FormField from '../elements/FormField'

export default {
    name: 'formSection',
    components: {
        FormField
    },
    props: {
        section: Object,
        checkIsLoaded: Function,
        optionsData: Function
    },
    data() {
        return {

        }
    },
    methods: {
        onInput() {

        },
        handleFieldCreate(data) {
            console.log('Child field has been created - FORM SECTION.');
        },
    },
    created() {
        var data = []
        this.$emit('created', data);
    },
    mounted() {
        // Use the parent function directly here
        // console.log(this.optionsData)
        // this.optionsData();
    }
}
</script>

<style lang="scss">

</style