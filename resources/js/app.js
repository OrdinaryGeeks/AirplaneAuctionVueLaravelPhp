import Vue from 'vue'
import VueRouter from 'vue-router'


import App from './App.vue'
import Explanation from '../js/components/Explanation.vue'
require('./bootstrap');

Vue.use(VueRouter)

const routes =[
    {path:'/Explanation', component: Explanation},
    {path:'/App', component: App}
]


const router = new VueRouter({
    routes
})
const app = new Vue({
    el: '#app',
    components: {App, Explanation}
}).$mount('#app');