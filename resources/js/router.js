import Vue from 'vue'
import VueRouter from 'vue-router'
import Router from './components/vue-router.vue'
import home from './components/home.vue'
import cadastroEmpresa from './components/empresa/formulario/formulario-empresa.vue'

Vue.use(VueRouter)

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'home',
            component: home,
            props: []
        }, {
            path: '/empresa/cadastro',
            name: 'empresa.create',
            component: cadastroEmpresa,
            props: []
        },
    ],
});

const app = new Vue({
    el: '#app',
    components: { Router },
    router,
});