import { createApp } from 'vue';
import { createRouter, createWebHistory } from 'vue-router';

// Import components
import App from './components/App.vue';
import CategoryList from './components/CategoryList.vue';
import CategoryForm from './components/CategoryForm.vue';
import Category from './components/Category.vue';

const router = createRouter({
    history: createWebHistory(),
    routes: [
        { path: '/', component: CategoryList },
        { path: '/categories/create', component: CategoryForm },
        { path: '/categories/:id', component: Category },
        { path: '/categories/:id/edit', component: CategoryForm },
    ]
});

const app = createApp(App);
app.use(router);
app.mount('#app');