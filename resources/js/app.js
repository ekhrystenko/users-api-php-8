import { createApp } from 'vue';
import { createRouter, createWebHistory } from 'vue-router';

import Index from "./components/Index"
import HomeComponent from "./components/HomeComponent";
import MainApiComponent from "./components/MainApiComponent";

require('./bootstrap')

const router = createRouter({
    history: createWebHistory(),
    routes: [
        {
            path: '/',
            component: HomeComponent
        },
        {
            path: '/api',
            component: MainApiComponent
        }
    ]
});

const app = createApp(Index);

app.use(router);

app.mount('#app');