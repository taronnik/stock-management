<template>
    <el-row class="row-bg" justify="space-evenly">
        <el-col :span="2"><div class="grid-content ep-bg-purple" /></el-col>
        <el-col :span="14"><div class="grid-content ep-bg-purple-light" />
            <el-row justify="space-between">
                <el-col span="4">
                    Products page
                </el-col>
                <el-col span="4">
                    <el-button type="primary" @click="displayConsForm = true">
                        Add consumption
                    </el-button>
                </el-col>
                <el-col span="4">
                    <a href="/logout">Logout</a>
                </el-col>
            </el-row>
            <el-table :data="tableData" style="width: 100%">
                <el-table-column prop="id" label="Id" width="180" />
                <el-table-column prop="name" label="Name" width="180" />
                <el-table-column prop="current_stock" label="Current stock" width="180" />
                <el-table-column prop="minimum_stock" label="Minimum stock" width="180" />
                <el-table-column prop="monthly_consumption" label="Monthly consumption" width="180" />
                <el-table-column label="Alert" width="180" >
                    <template #default="scope">
                        <div style="display: flex; align-items: center">
                            <span v-if="displayAlert(scope.row)" class="red-dot"></span>
                        </div>
                    </template>
                </el-table-column>
            </el-table>

            <el-dialog v-model="displayConsForm" v-if="displayConsForm" title="Add consumption">
                <el-row>
                    <el-select v-model="consForm.product_id" class="m-2" placeholder="Select product" size="large">
                        <el-option
                            v-for="item in productsForSelect"
                            :key="item.value"
                            :label="item.label"
                            :value="item.value"
                        />
                    </el-select>
                </el-row>
                <el-row>
                    <el-date-picker
                        format="YYYY-MM-DD"
                        value-format="YYYY-MM-DD"
                        v-model="consForm.start_date"
                        type="date"
                        placeholder="Start date"
                        size="large"
                    />
                    <el-date-picker
                        format="YYYY-MM-DD"
                        value-format="YYYY-MM-DD"
                        v-model="consForm.end_date"
                        type="date"
                        placeholder="End date"
                        size="large"
                    />
                </el-row>
                <el-row>
                    <el-input-number label="Count" v-model="consForm.count" :step="1" :min="1" size="large"/>
                </el-row>
                <template #footer>
                    <el-row v-for="error in errors">
                        <el-alert :title="error" type="error" />
                    </el-row>
                    <el-button type="primary" @click="addConsumption">
                        Save
                    </el-button>
                </template>
            </el-dialog>
        </el-col>
        <el-col :span="2"><div class="grid-content ep-bg-purple" /></el-col>
    </el-row>
</template>

<script lang="ts" setup>
    import { ref, computed } from 'vue'

    const tableData = ref([])
    const displayConsForm = ref(false)
    const consForm = ref({
        product_id: '',
        start_date: null,
        end_date: null,
        count: 0
    })
    const errors = ref([])

    const getProducts = () => {
        axios.get('/api/load-products')
            .then((response) => {
                tableData.value = response.data
            })
    }

    const addConsumption = () => {
        axios.post('/api/add-consumption', {
            ...consForm.value
        })
            .then((response) => {
                errors.value = []
                if (response.data.under_stock) {
                    errors.value = ['Product is under minimum stock']
                } else {
                    displayConsForm.value = false
                }
                getProducts()
            })
            .catch((err) => {
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

    const productsForSelect = computed(() => {
        let parsedData = []
        tableData.value.forEach((item) => {
            parsedData.push({
                value: item.id,
                label: item.name
            })
        })
        return parsedData
    })

    const displayAlert = (row) => {
        return row.current_stock < row.minimum_stock
    }

    getProducts()

</script>

<style lang="scss">

.el-row {
    margin-top: 10px;
}
.red-dot {
    width: 15px;
    height: 15px;
    border-radius: 50%;
    background-color: red;
}

</style>
