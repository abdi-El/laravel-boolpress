import Vue from "vue"; // import di vue dalle dependencies
import VueRouter from "vue-router"; // import di vue-router

// componenti per la rotta
import Home from "./pages/Home"
import About from "./pages/About"
import SinglePost from "./pages/SinglePost"
//Attivazione router in vue
Vue.use(VueRouter);

//definizione delle rotte
const router = new VueRouter({
    mode: 'history', // in pratica permette al browser di poter utilizzare le freccette di navigazione
    routes:[
        {
            path: '/',
            name: 'home',
            component: Home
        },
        {
            path: '/about',
            name: 'about',
            component: About
        },
        {
            path: '/post/:id',
            name: 'post',
            component: SinglePost
        },

    ]
})

// export della const router per poi importarlo
export default router; // default almeno qunado importo non devo specificare cosa;