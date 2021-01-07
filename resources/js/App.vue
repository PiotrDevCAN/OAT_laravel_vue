<template>
  <div id="app">
  
    <page-header v-bind:appName="appName"/>

    <cv-content id="#main-content">

      <breadcrumbs />

      <router-view v-bind:appName="appName"/>

    </cv-content>
  </div>
</template>

<script>
import PageHeader from './components/PageHeader';
import Breadcrumbs from './components/Breadcrumbs';

export default {
  name: 'App',
  components: {
    PageHeader,
    Breadcrumbs
  },
  props: {
    appName: String
    // 'instanceTestValue1', // passed from instance
    // 'instanceTestValue2'  // passed from instance
  },
  data() {
    return {
      // testValue1: 'App test value 1',
      // testValue2: 'App test value 2',
      // globalTestValue1: this.$root.instanceTestValue1,
      // globalTestValue2: this.$root.instanceTestValue2
    }  
  },
  beforeCreate: function() {
    console.log(this)
    // console.log(this.$root.windowTitle)
    // console.log(this.$root.instanceTestValue1)
    // console.log(this.$root.instanceTestValue2)
  }
};
</script>

<style lang="scss">
// @import './styles/carbon';
</style>
