import Vue from 'vue'
import axios from 'axios'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

import App from './components/App'
import Article from './components/Article'
import Tag from './components/Tag'

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/admin',
            redirect: '/article'
        },
        {
            path: '/article',
            name: 'article',
            component: Article,
            props: { title: "Article Listing" }
        },
        {
            path: '/tag',
            name: 'tag',
            component: Tag,
            props: {
                title: "Tag Listing",
            }
        },
    ],
})
const app = new Vue({
    el: '#app',
    components: { App },
    router,

});