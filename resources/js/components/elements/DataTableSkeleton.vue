<template>
    <cv-data-table-skeleton v-if="loading"
        :columns="columns"
        :title="title"
        :helper-text="helperText"
        :rows="10"
    />
</template>

<script>
    export default {
        props: {
            loading: Boolean,
            columns: Array,
            title: String,
            helperText: String
        },
        data() {
            return {
                // skeleton options
                // loading: true,
                // columns: [],
                // title: 'initial',
                // helperText: 'initial'
            }
        }
    }
</script>