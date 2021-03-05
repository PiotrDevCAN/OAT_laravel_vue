<template>
    <cv-row class="bx--row-padding">
        <cv-column v-bind:key="index" v-for="(row, index) in summary" :lg="row.lg">
            <h3 v-if="row.header">{{ row.header }}</h3>
            <div v-bind:key="fieldIndex" v-for="(field, fieldIndex) in row.fields" >                    
                <div v-if="field.type='input'">
                    <div v-if="checkIsLoaded(field.dataType, storeName)">
                        <cv-text-input v-if="row.type === 'amount'" 
                            :value="getRecordsCount(field.dataType, storeName)" 
                            :label="field.label">
                        </cv-text-input>
                        <cv-text-input v-else-if="row.type === 'hours'" 
                            :value="getHoursCount(field.dataType, storeName)" 
                            :label="field.label">
                        </cv-text-input>
                    </div>
                    <div v-else>
                        <label class="bx--label">{{ field.label }}</label>
                        <cv-skeleton-text></cv-skeleton-text>
                    </div>
                </div>
            </div>
        </cv-column>
    </cv-row>
</template>

<script>
    export default {
        name: 'SummaryBox',
        props: {
            storeName: String,  // for eg. accounts
            summary: Array,
            checkIsLoaded: Function,
            getRecordsCount: Function,
            getHoursCount: Function
        },
        data() {
            return {

            }
        }
    }
</script>