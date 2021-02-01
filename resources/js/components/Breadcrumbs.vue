<template>
    <cv-grid>
        <cv-row class="bx--row-padding">
            <cv-breadcrumb no-trailing-slash>
                <cv-breadcrumb-item v-bind:key="index" v-for="(item, index) in items" v-bind:item="item">
                    <cv-link v-if="item.url" href="item.url" aria-current="page">{{ item.label }}</cv-link>
                    <input v-else type="text" class="bx--text-input bx--text-input--light" :value="item.label"/>
                </cv-breadcrumb-item>
            </cv-breadcrumb>
        </cv-row>
    </cv-grid>
</template>

<script>
    export default {
        name: 'Breadcrumbs',
        props: {
            data: Array
        },
        data() {
            return {
                items: this.data
            }
        }
    };
</script>