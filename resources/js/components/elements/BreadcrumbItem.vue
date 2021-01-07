<template>
    <cv-breadcrumb-item>
        <cv-text value="name of thing"></cv-text>
    </cv-breadcrumb-item>
</template>

<script>
    export default {
        name: 'BreadcrumbItem',
        props: {
            data: Array
        },
        data() {
            return {
                item: this.label
            }
        },
        methods: {
            update() {
                
            },
            destroy() {
                
            }
        }
    };
</script>

<style lang="scss">

</style>