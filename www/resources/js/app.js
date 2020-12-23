/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
import 'fullcalendar/dist/fullcalendar.css';

import "jquery";
window.Vue = require('vue');
window.$ = window.jQuery = require('jquery');
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('nav-component', require('./components/nav.vue').default);
Vue.component('login-component', require('./components/Auth/Login.vue').default);

import Vue from 'vue'
import { Datetime } from 'vue-datetime'
Vue.use(Datetime)
import 'vue-datetime/dist/vue-datetime.css'
import 'vue-search-select/dist/VueSearchSelect.css'



/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */


window.EventBus = new Vue();
import Toasted from 'vue-toasted';


Vue.use(Toasted)
import { VuejsDatatableFactory } from 'vuejs-datatable';
Vue.use(VuejsDatatableFactory);
import router from './components/router.js'
const app = new Vue({
    el: '#app',
    router,

});