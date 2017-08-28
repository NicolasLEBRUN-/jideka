
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('menu-haut', require('./components/MenuHaut.vue'));
Vue.component('accueil', require('./components/Accueil.vue'));
Vue.component('biographie', require('./components/Biographie.vue'));
Vue.component('galeries', require('./components/Galeries.vue'));
Vue.component('expositions', require('./components/Expositions.vue'));
Vue.component('contact', require('./components/Contact.vue'));

const app = new Vue({
    el: '#app'
});
