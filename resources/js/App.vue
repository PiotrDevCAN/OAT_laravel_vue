<template>
  <div id="app">

    <PageHeader v-bind:appName="appName"/>

    <cv-content id="#main-content">

      <Breadcrumbs :data="breadcrumbs"/>

      <!-- reffers to Vue Component -->
      <router-view v-bind:app-name="appName" test-property="testPropertyValue"/>

    </cv-content>
  </div>
</template>

<script>
export default {
  name: 'App',
  // props: {

  // },
  // data() {
  //     return {
        
  //     }
  // },

  computed: {
    appUrl() {
      return this.$root.appUrl
    },
    appName() {
      return this.$root.appName
    },
    breadcrumbs() {
      var initial =  [
        { label: 'Home', url: this.appUrl }
        // { label: 'bbb from APP.vue', url: '/bbb' },
        // { label: 'ccc'}
      ];
      return initial
    }
  },
  created: function() {
    // console.log('App.vue created')
  },
  mounted: function() {
    // console.log('App.vue mounted')
  }
};
</script>

<style lang="scss">
// @import './styles/carbon';
</style>
