<template>

    <!-- : is v-bind Shorthand -->
    <!-- @ is v-on Shorthand -->

    <cv-form @submit.prevent="actionSubmit">
        <cv-row class="bx--row-padding">
            <cv-column v-bind:key="index" v-for="(row, index) in filters" :lg="row.lg">
                <h3 v-if="row.header">{{ row.header }}</h3>
                <div v-bind:key="fieldIndex" v-for="(field, fieldIndex) in row.fields" >
                    <form-field
                        :store-name="storeName"
                        :field="field" 
                        :check-is-loaded="checkIsLoaded"
                        :options-data="optionsData"
                        v-on:created="handleFieldCreate">
                    </form-field>
                </div>
            </cv-column>
        </cv-row>
    </cv-form>
</template>

<script>

    import FormField from '../elements/FormField'

    export default {
        name: 'ListWithFilters',
        components: {
            FormField
        },
        props: {
            storeName: String,  // for eg. accounts
            filters: Array,
            checkIsLoaded: Function,
            optionsData: Function
        },
        data() {
            return {

            }
        },
        methods: {
            handleFieldCreate(data) {
                // console.log('Child field has been created - LIST HERE 3.');
            }
        }
    }
</script>