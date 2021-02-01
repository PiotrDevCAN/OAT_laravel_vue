<template>
	<cv-grid>
        <cv-row class="bx--row-padding">
            <cv-column :lg="12">
                <cv-form @submit.prevent="actionSubmit">

                    <h1 v-text="pageHeader"></h1>
                    
                    <h2>Userid : Piotr.Tajanowicz@ibm.com</h2>
                    <h2>Has access to these OAT Bluegroups : , 'OAT_Admin'</h2>

                </cv-form>
            </cv-column>
        </cv-row>
    </cv-grid>
</template>

<script>
    export default {
        data() {
            return {
                pageHeader: 'My Access'
            }  
        },
        mounted() {
            // console.log('My second Component mounted.')
        }
    }
</script>