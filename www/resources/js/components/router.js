import Vue from 'vue'
import VueRouter from 'vue-router'
Vue.use(VueRouter)

import Accueille from '../components/Accueille.vue'
import Medecin from '../components/Medecin.vue'
import Patients from '../components/Patients.vue'
import Rendez from '../components/Rendez.vue'
import Consultation from '../components/Consultation.vue'
import Login from '../components/Auth/Login.vue'
import Register from '../components/Auth/Register.vue'
import MenueComponent from '../components/MenueComponent.vue'
import NotFound from '../components/NotFound.vue'


const routes = [
    { path: '/Login', component: Login },
    { path: '/Register', component: Register  },
    { path: '/', component: Accueille },
    { path: '/Medecin', component: Medecin },
    { path: '/Patients', component: Patients },
    { path: '/Rendez', component: Rendez },
    { path: '/Consultation', component: Consultation },
    {path : '/Home' , component : MenueComponent ,name:'Homes'},

    {
        path: "/:catchAll(.*)",
        component: NotFound,
    },


]

// 3. Create the router instance and pass the `routes` option
// You can pass in additional options here, but let's
// keep it simple for now.
const router = new VueRouter({
    routes, // short for `routes: routes`
    hashbang: false,
    mode: 'history', // ce si pour enlever # dan url
})
export default router;