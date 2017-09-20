
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

/* Administration */
import AppAdministration from './AppAdministration.vue';

import flatPickr from 'vue-flatpickr-component';
import 'flatpickr/dist/flatpickr.css';
import 'flatpickr/dist/themes/airbnb.css';
Vue.use(flatPickr);

import _ from 'lodash';
Vue.prototype.$trans = function(string) {
	return _.get(window.i18n, string);
};

// Vue.filter('i18n', function(value) {
// 	return _.get(window.i18n, value);
// });

const appAdministration = new Vue({
    el: '#app-administration',
    render: h => h(AppAdministration)
});