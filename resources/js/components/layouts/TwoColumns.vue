<template>
    <cv-grid>
        <cv-row>
            <cv-column :lg="12">
                <h1 id="page-title" class="PageHeader-module--text--o9LFq">Welcome to {{ appName }}</h1>
                <h2>This tool is for managing the process for gaining approval for planned paid overtime</h2>
            </cv-column>
        </cv-row>
        <cv-row>
            <cv-column :lg="8">
                <slot name="left-tiles"></slot>
            </cv-column>
            <cv-column :lg="4">
                <slot name="right-tiles"></slot>
            </cv-column>            
        </cv-row>
    </cv-grid>
</template>

<script>
    import homeLayout from '@carbon/icons-vue/es/download/16';

    export default {
        name: 'home',
        components: { 
            homeLayout
        },
        props: {
            appName: String
        },
        data() {
            return {
                title: 'Home Page from Home template',
                light: false
            }
        },
        mounted() {
            // console.log('My second Component mounted.')
        }
    }
</script>

<style lang="scss">

</style>