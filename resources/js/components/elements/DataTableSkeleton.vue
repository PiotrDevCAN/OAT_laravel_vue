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
        }
    }
</script>