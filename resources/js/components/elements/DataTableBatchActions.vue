<template v-if="use_batchActions">
    <div>
        <cv-button @click="onBatchAction1">
            Delete
            <TrashCan16 class="bx--btn__icon"/>
        </cv-button>
        <cv-button @click="onBatchAction2">
            Save
            <Save16 class="bx--btn__icon"/>
        </cv-button>
        <cv-button @click="onBatchAction3">
            Download
            <Download16 class="bx--btn__icon"/>
        </cv-button>
    </div>
</template>

<script>
    import TrashCan16 from '@carbon/icons-vue/es/trash-can/16';
    import Save16 from '@carbon/icons-vue/es/save/16';
    import Download16 from '@carbon/icons-vue/es/download/16';

    export default {
        name: 'DataTableBathActions',
        components: {
            TrashCan16, 
            Save16, 
            Download16
        },
        data() {
            return {
                use_batchActions: true
            }
        },
        methods: {
            onBatchAction1() {

            },
            onBatchAction2() {

            },
            onBatchAction3() {

            }
        }
    }
</script>