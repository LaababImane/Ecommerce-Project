/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

 require('./bootstrap');
 require("apexcharts");
 window.Vue = require('vue').default;
 Vue.use(require('bootstrap-vue'));
 
 const router = new VueRouter({
     mode: 'history',
     routes: [
         {
             path: '/',
             name: 'home',
             component: Home
         },
         {
             path: '/login',
             name: 'login',
             component: Login
         },
         {
             path: '/Accueil',
             name: 'Accueil',
             component: Accueil
         },
         {
             path: '/register',
             name: 'register',
             component: Register
         },
         {
            path: '/About',
            name: 'about',
            component: About
        },
         {
             path: '/products/:id',
             name: 'single-products',
             component: SingleProduct
         },
         {
             path: '/confirmation',
             name: 'confirmation',
             component: Confirmation
         },
         {
             path: '/checkout',
             name: 'checkout',
             component: Checkout,
             props: (route) => ({ pid: route.query.pid })
         },
         {
             path: '/dashboard',
             name: 'userboard',
             component: UserBoard,
             meta: {
                 requiresAuth: true,
                 is_user: true
             }
         },
         {
             path: '/admin/:page',
             name: 'admin-pages',
             component: Admin,
             meta: {
                 requiresAuth: true,
                 is_admin: true
             }
         },
         {
             path: '/admin',
             name: 'admin',
             component: Admin ,
             meta: {
                 requiresAuth: true,
                 is_admin: true
             }
         },
     ],
 })
 
 
 /*
 Vue.component('Navbar', require('./components/Navbar.vue').default);
 Vue.component('login', require('./components/llogin.vue').default);
 Vue.component('home', require('./components/Acc.vue').default);
 Vue.component('about', require('./components/About.vue').default);
 Vue.component('info', require('./components/info.vue').default);*/
 
 import VueApexCharts from 'vue-apexcharts'
 Vue.use(VueApexCharts)
 Vue.component('apexchart', VueApexCharts)
 
 
 window.onload = function(){
 var appx = new Vue({
     el: '#chart',
     components: {
       apexchart: VueApexCharts,
     },
   });
 } 
 
// Vue.component('login', require('./components/llogin.vue').default);
 //Vue.component('Navbar', require('./components/Navbar.vue').default);
 
 import Vue from 'vue'
 import VueRouter from 'vue-router'
 
 
 
 Vue.use(VueRouter)
 
 
 import App from './components/App'
 import Home from './components/Home'
 import Accueil from './components/Accueil'
 import Login from './components/Login'
 import Register from './components/Register'
 import SingleProduct from './components/SingleProduct'
 import Checkout from './components/Checkout'
 import Confirmation from './components/Confirmation'
 import UserBoard from './components/UserBoard'
 import Admin from './components/Admin'
 import About from './components/About'
 
 
 
 router.beforeEach((to, from, next) => {
     if (to.matched.some(record => record.meta.requiresAuth)) {
         if (localStorage.getItem('bigStore.jwt') == null) {
             next({
                 path: '/login',
                 params: { nextUrl: to.fullPath }
             })
         } else {
             let user = JSON.parse(localStorage.getItem('bigStore.user'))
             if (to.matched.some(record => record.meta.is_admin)) {
                 if (user.is_admin == 1) {
                     next()
                 }
                 else {
                     next({ name: 'userboard' })
                 }
             }
             else if (to.matched.some(record => record.meta.is_user)) {
                 if (user.is_admin == 0) {
                     next()
                 }
                 else {
                     next({ name: 'admin' })
                 }
             }
             next()
         }
     } else {
         next()
     }
 })
 
 
 const app = new Vue({
     el: '#app',
     components: { App },
     router
 }).$mount('#app')