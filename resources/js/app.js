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

import 'carbon-components/css/carbon-components.css';
import CarbonComponentsVue from '@carbon/vue/src/index';

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

// store object
// this.$store

// root object
// this.$root

// parent object
// this.$parent

const app = new Vue({
  el: '#app',
  router,
  store,
  components: {
    App,
  },
  data: {
    // windowTitle: window.title,
    // instanceTestValue1: 'default test value 1',
    // instanceTestValue2: 'default test value 2'
  },
  beforeCreate: function() {
    // console.log(this.windowTitle)
    // console.log(this.instanceTestValue1)
    // console.log(this.instanceTestValue2)
  },
  create: function() {
    // console.log(this.windowTitle)
    // console.log(this.instanceTestValue1)
    // console.log(this.instanceTestValue2)
  }
})

export default app;
