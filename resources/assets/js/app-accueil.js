
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

Vue.component(
    'passport-clients',
    require('./components/passport/Clients.vue')
);

Vue.component(
    'passport-authorized-clients',
    require('./components/passport/AuthorizedClients.vue')
);

Vue.component(
    'passport-personal-access-tokens',
    require('./components/passport/PersonalAccessTokens.vue')
);

Vue.prototype.moment = moment;

Vue.prototype.$trans = function(string) {
	return _.get(window.i18n, string);
};

// Vue.filter('i18n', function(value) {
// 	return _.get(window.i18n, value);
// });

const appAccueil = new Vue({
    el: '#app-accueil',
	render: h => h(AppAccueil)
});
