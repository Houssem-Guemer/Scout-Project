import Vue from 'vue';
import Router from 'vue-router';


Vue.use(Router);

import ExampleComponent from './components/ExampleComponent.vue';

const routes = [
    {
        path: "/dashboard/scouts/accounts/register",
        component: ExampleComponent
    }
]

const router = new Router({routes})

export default router