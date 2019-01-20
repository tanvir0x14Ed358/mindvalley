import Vue from 'vue'
import axios from 'axios'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

import App from './components/App'
import Article from './components/Article'
import Admin from './components/Admin'

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/article',
            name: 'article',
            component: Article,
            props: { title: "Article Listing" }
        },
        {
            path: '/admin',
            name: 'admin',
            component: Admin,
            props: {
                title: "Admin page",
                author : {
                    name : "Fisayo Afolayan",
                    role : "Software Engineer",
                    code : "Always keep it clean"
                }
            }
        },
    ],
})
const app = new Vue({
    el: '#app',
    components: { App },
    router,

});