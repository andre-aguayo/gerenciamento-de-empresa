
require('./bootstrap');
require('./router');

window.Vue = require('vue').default;

Vue.component('vue-router', require('./components/vue-router.vue').default);

Vue.component('home', require('./components/home.vue').default);

const app = new Vue({
    el: '#app',
});
