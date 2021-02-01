<template>
    <cv-grid>
        <cv-row class="bx--row-padding">
            <cv-column :lg="12">
                <h1 class="page-title">Welcome to {{ appName }}</h1>
                <h2 class="page-subtitle">This tool is for managing the process for gaining approval for planned paid overtime</h2>
            </cv-column>
        </cv-row>
        <cv-row class="bx--row-padding">
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
@import '../../styles/_carbon-utils';

.page-title {
    @include carbon--type-style('productive-heading-05');
}
.page-subtitle {
    @include carbon--type-style('productive-heading-03');
}
</style>