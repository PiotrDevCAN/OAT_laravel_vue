<template>
    <div v-if="checkIsLoaded(field.id, storeName)">
        <div v-if="field.type=='input'">
            <cv-form-item>
                <cv-text-input 
                    :label="field.label"
                    :value="field.value"
                    :readonly="field.readonly"> 
                </cv-text-input>
            </cv-form-item>
        </div>
        <div v-else-if="field.type=='combo'">
            <cv-combo-box
                :light="field.light"
                :label="field.label"
                :helper-text="field.helperText"
                :invalid-message="field.invalidMessage"
                :title="field.title"
                :disabled="field.disabled"
                :auto-filter="field.autoFilter"
                :auto-highlight="field.autoHighlight"
                :value="field.value"
                :options="optionsData(field.id, storeName)">
            </cv-combo-box>
        </div>
        <div v-else-if="field.type=='select'">
            <cv-select
                :label="field.label">
                <cv-select-option disabled selected hidden>{{ filtersDefaultValue }}</cv-select-option>
                <cv-select-option 
                    v-bind:key="optionIndex" 
                    v-for="(option, name, optionIndex ) in optionsData(field.id, storeName)" 
                    :value="option[field.dataKey]">
                    {{ option[field.dataKey] }}
                </cv-select-option>
            </cv-select>
        </div>
        <div v-else-if="field.type=='number'">
            <cv-number-input
                :light="field.light"
                :label="field.label"
                :invalid-message="field.invalidMessage"
                :helper-text="field.elperText"
                :disabled="field.disabled"
                :value="field.value"
                :min="field.min"
                :max="field.max"
                :step="field.step"
                :mobile="field.mobile"
                @input="onInput">
            </cv-number-input>
        </div>
        <div v-else-if="field.type=='textarea'">
            <cv-text-area
                :light="field.light"
                :label="field.label"
                :value="field.value"
                :disabled="field.disabled"
                :placeholder="field.placeholder"
                :helper-text="field.helperText"
                :invalid-message="field.invalidMessage">
            </cv-text-area>
        </div>
    </div>
    <div v-else>
        <label class="bx--label">{{ field.title }}</label>
        <cv-skeleton-text></cv-skeleton-text>
    </div>
</template>

<script>

export default {
    name: 'formField',
    props: {
        storeName: String,  // for eg. accounts
        field: Object,
        checkIsLoaded: Function,
        optionsData: Function
    },
    data() {
        return {
            filtersDefaultValue: 'Choose an option'
        }
    },
    methods: {
        onInput() {

        }
    },
    created() {
        var data = []
        this.$emit('created', data);
    },
    mounted() {
        // Use the parent function directly here
        // console.log(this.optionsData)
        // this.optionsData();
    }
}
</script>

<style lang="scss">

</style