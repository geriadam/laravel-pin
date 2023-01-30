import '../css/app.css';

import { createApp } from 'vue';
import router from '@/router'
import MainLayout from '@/layouts/MainLayout.vue';

const app = createApp(MainLayout)

app.use(router).mount('#app')