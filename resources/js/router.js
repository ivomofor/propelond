import Vue from "vue"
import VueRouter from "vue-router"
Vue.use(VueRouter);
import Start from './views/Start';
import UserProfileVue from "./views/users/UserProfile.vue";

export default new VueRouter({
    mode:'history',
    // linkActiveClass:"active-link",

    routes:[
        {
            path:'/',
            name:'home',
            component: Start,
        },
        {
            path:'/views/users/UserProfile',
            name:'UserProfile',
            component: UserProfileVue,
        },
    
    ]
})