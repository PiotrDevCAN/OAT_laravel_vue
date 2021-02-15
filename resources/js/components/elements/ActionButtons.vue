<template>
    <cv-row class="bx--row-padding">
        <cv-column v-bind:key="index" v-for="(row, index) in buttons" :lg="row.lg">
            <h3 v-if="row.header">{{ row.header }}</h3>
            <cv-button-set v-else>
                <cv-button v-bind:key="fieldIndex" 
                    v-for="(field, fieldIndex) in row.fields" 
                    :kind="field.kind" 
                    v-on:click="field.action">
                {{ field.label }}</cv-button>
            </cv-button-set>
        </cv-column>
    </cv-row>
</template>

<script>
    export default {
        name: 'ActionButtons',
        props: {
            buttons: Array
        },
        data() {
            return {

            }
        }
    }
</script>