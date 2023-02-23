<template>
    <el-row class="row-bg" justify="space-evenly">
        <el-col :span="6"><div class="grid-content ep-bg-purple" /></el-col>
        <el-col :span="6"><div class="grid-content ep-bg-purple-light" />
            <el-row>
                Login page
            </el-row>
            <el-row>
                <el-input v-model="email" placeholder="Email" />
            </el-row>
            <br>
            <el-row>
                <el-input type="password" v-model="password" placeholder="Password" />
            </el-row>
            <el-row>
                <el-button type="primary" @click="login">Login</el-button>
            </el-row>
            <el-row v-for="error in errors">
                <el-alert :title="error" type="error" />
            </el-row>
        </el-col>
        <el-col :span="6"><div class="grid-content ep-bg-purple" /></el-col>
    </el-row>
</template>

<script lang="ts" setup>
import { ref } from 'vue'

const email = ref('')
const password = ref('')
const errors = ref([])


const login = () => {
    axios.post('/login', {
        email: email.value,
        password: password.value
    }).then(() => {
        window.location.href = '/products'
    }).catch((err) => {
        let responseData = err.response.data
        if (responseData.hasOwnProperty('errors')) {
            Object.keys(responseData.errors).forEach((key) => {
                errors.value.push(responseData.errors[key][0])
            })
        } else {
            errors.value.push('Failed to login, please check credentials.')
        }
    })
}

</script>

<style lang="scss">

.el-row {
    margin-top: 10px;
}

</style>
