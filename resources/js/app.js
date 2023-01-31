import '../css/app.css';

import { createApp } from 'vue';
import router from '@/router'
import store from '@/store/index'
import MainLayout from '@/layouts/MainLayout.vue';

const app = createApp(MainLayout)

app.use(store).use(router).mount('#app')