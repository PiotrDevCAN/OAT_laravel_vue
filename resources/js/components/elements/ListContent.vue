<template>
    <cv-row class="bx--row-padding">
        <cv-column :lg="12">
            <br/>
            <cv-content-switcher 
                v-on:selected="actionSelected" 
                :light="true" 
                :size="size">
                <cv-content-switcher-button :owner-id="ownerData(table.id)" 
                    :selected="isSelected(table.id)" 
                    v-bind:key="index" 
                    v-for="(table, index) in tables">
                    {{ table.label }}
                </cv-content-switcher-button>
            </cv-content-switcher>
            <section style="margin: 10px 0;">
                <cv-content-switcher-content :owner-id="ownerData(table.id)" 
                    v-bind:key="index" 
                    v-for="(table, index) in tables" >
                    <data-table :columns="columnsData(table.id, storeName)" 
                        :type="table.id" 
                        :data-table-data="tableData(table.id, storeName)" 
                        :title="table.title" 
                        :helper-text="table.helperText" 
                        :loading="checkIsLoading(table.id, storeName)" 
                        :loaded="checkIsLoaded(table.id, storeName)"
                        :expandedContent="table.expandedContent" 
                    />
                </cv-content-switcher-content>                    
            </section>
        </cv-column>
    </cv-row>
</template>

<script>
    
    import DataTable from '../elements/DataTable'

    export default {
        name: 'ListContent',
        components: {
            DataTable
        },
        props: {
            storeName: String,  // for eg. accounts
            tables: Array,
            columnsData: Function,      // getColumnsMapByType
            tableData: Function,        // getRecordsMapByType
            loadTableData: Function,    // getTableData
            ownerData: Function,        // getOwnerId
            checkIsLoading: Function,   // getLoadingMapByType
            checkIsLoaded: Function     // getLoadedMapByType
        },
        data() {
            return {
                size: 'xl'
            }
        },
        methods: {
            handleFieldCreate(data) {
                console.log('Child field has been created - LIST HERE 2');
            },
            
            loadTable: function (type) {
                var loaded = this.checkIsLoaded(type)
                if (loaded === false) {
                    // this.loadTableData(type).then(() => {

                    // })
                }
            },

            // content switcher
            actionSelected: function (type) {
                switch(type) {
                    case 'csb-awaiting':
                        this.loadTable('awaiting')
                        return true
                    break
                    case 'csb-approved':
                        this.loadTable('approved')
                        return false
                    break
                    case 'csb-other':
                        this.loadTable('other')
                        return false
                    break
                    default:
                        return false
                }
            },
            
            isSelected: function (type) {
                switch(type) {
                    case 'awaiting':
                        this.loadTable('awaiting')
                        return true
                    break
                    case 'approved':
                    case 'other':
                        return false
                    break
                    default:
                        return true
                }
            }
        }
    }
</script>