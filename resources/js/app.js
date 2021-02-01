/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import Vue from 'vue';
import App from './App.vue';
import router from './router';
import store from "./store";
import axios from 'axios';

import upperFirst from 'lodash/upperFirst'
import camelCase from 'lodash/camelCase'

// import CarbonComponentsVue from '@carbon/vue/src/index';
import CarbonComponentsVue from "@carbon/vue";
Vue.use(CarbonComponentsVue);

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// instance variables
// Vue.prototype.$blogName = 'LogRocket'
Vue.prototype.$http = axios

Vue.prototype.$prototypeVariableExample = 'Prototype Variable Example'

// store object
// this.$store

// root object
// this.$root

// parent object
// this.$parent

// Load components globally
// Vue.component - registers component globall
// components: { - registers component locally - locally registered components are not also available in subcomponents

const requireComponent = require.context(
  // The relative path of the components folder
  './components',
  // Whether or not to look in subfolders
  false,
  // The regular expression used to match base component filenames
  // /Base[A-Z]\w+\.(vue|js)$/
  // /.*\.vue$/
  /[A-Z]\w+\.(vue|js)$/
)

requireComponent.keys().forEach(fileName => {

  // Get component config
  const componentConfig = requireComponent(fileName)

  // Get PascalCase name of component
  const componentName = upperFirst(
    camelCase(
      // Gets the file name regardless of folder depth
      fileName
        .split('/')
        .pop()
        .replace(/\.\w+$/, '')
    )
  )

  // Register component globally
  Vue.component(
    componentName,
    // Look for the component options on `.default`, which will
    // exist if the component was exported with `export default`,
    // otherwise fall back to module's root.
    componentConfig.default || componentConfig
  )
})

var vm = new Vue({
  el: '#app',
  router,
  store,
  components: {
    App
  },
  // props: {
  //   rootTestProp: String
  // },
  // data() {
  //   return {
  //     rootTestData1: 'root Test Data 1 value'
  //   }
  // },
  computed: {
    appUrl() {
      return window.appUrl
    },
    appName() {
      return window.appName
    }
  },
  created: function() {
    // console.log('app.js created')
  },
  mounted: function() {
    // console.log('app.js mounted')
  }
})

// export default app;
export default vm;