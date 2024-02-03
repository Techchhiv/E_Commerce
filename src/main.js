// import './assets/main.css'

import { createApp } from 'vue'
import { createPinia } from 'pinia'
import axios from 'axios'
import authMixin from './mixins/auth';

import App from './App.vue'
import router from './router'

const app = createApp(App)

axios.defaults.baseURL = 'http://localhost/api'

app.use(createPinia())
app.use(router)

app.mixin(authMixin);

app.mount('#app')
