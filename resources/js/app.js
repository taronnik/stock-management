import './bootstrap';

import { createApp } from 'vue'
import ElementPlus from 'element-plus'
import 'element-plus/dist/index.css'
import Register from './components/Register.vue'
import Login from './components/Login.vue'
import Products from './components/Products.vue'

const app = createApp({})
app.component('register', Register)
app.component('login', Login)
app.component('products', Products)

app.use(ElementPlus)
app.mount('#app')
