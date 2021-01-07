<template>
    <cv-grid>
        <cv-row>
            <cv-column :lg="12">
                <cv-form @submit.prevent="actionSubmit">

                        <h1 v-text="pageHeader"></h1>

                        <p>Define/Modify Approver for Account :</p>

                        <cv-form-item>
                            <cv-select label="Location">
                                <cv-select-option disabled selected hidden>Choose an option</cv-select-option>
                                <cv-select-option value="cv-select-option3">cv-select-option 3</cv-select-option>
                                <cv-select-option value="cv-select-option4">cv-select-option 4</cv-select-option>
                            </cv-select>
                        </cv-form-item>

                        <cv-form-item>
                            <cv-text-input label="Account Name" v-model="modelValue"> </cv-text-input>
                        </cv-form-item>

                        <cv-form-item>
                            <cv-select label="Verified">
                                <cv-select-option disabled selected hidden>Choose an option</cv-select-option>
                                <cv-select-option value="cv-select-option3">cv-select-option 3</cv-select-option>
                                <cv-select-option value="cv-select-option4">cv-select-option 4</cv-select-option>
                            </cv-select>
                        </cv-form-item>

                        <cv-button-set>
                            <cv-button kind="primary" @click="submitForm">Submit</cv-button>
                            <cv-button kind="secondary" @click="resetForm">Reset</cv-button>
                        </cv-button-set>

                    </cv-form>
            </cv-column>
        </cv-row>
    </cv-grid>    
</template>

<script>
    export default {
        data() {
            return {
                pageHeader: 'Request',
                modelValue: 'Initial'
            }  
        },
        methods: {
            submitForm() {
                this.modelValue = 'submitted'
            },
            resetForm() {
                this.modelValue = 'reset'
            },
            actionSubmit() {

            }
        },
        mounted() {
            // console.log('My first Component mounted.')
        }
    }
</script>