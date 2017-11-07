
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

/* Accueil */
import AppAccueil from './components/AppAccueil.vue';

Vue.prototype.moment = moment;

Vue.prototype.$trans = function(string) {
	return _.get(window.i18n, string);
};

const appAccueil = new Vue({
    el: '#app-accueil',
	render: h => h(AppAccueil)
});
