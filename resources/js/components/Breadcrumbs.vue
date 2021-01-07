<template>
    <cv-breadcrumb no-trailing-slash>
        
    </cv-breadcrumb>
</template>

<script>
    import BreadcrumbItem from './elements/BreadcrumbItem';

    export default {
        name: 'Breadcrumbs',
        props: {
            data: Array
        },
        components: {
            BreadcrumbItem
        },        
        data() {
            return {
                items: this.data
            }
        }
    };
</script>