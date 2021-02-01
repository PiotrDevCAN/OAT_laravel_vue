<template>
	<cv-grid>
        <cv-row class="bx--row-padding">
            <cv-column :lg="12">
                <cv-form @submit.prevent="actionSubmit">

                    <h1 v-text="pageHeader"></h1>
                    

                </cv-form>
            </cv-column>
        </cv-row>
    </cv-grid>
</template>

<script>
    export default {
        data() {
            return {
                pageHeader: 'Log out'
            }  
        },
        mounted() {
            // console.log('My second Component mounted.')
        }
    }
</script>