<script>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import axios from 'axios';

export default {
    data(){
        products: [];   // Array to store API data
    },
    mounted(){
        // API called during mounted lifecycle hook
        this.fetchProducts();
    },
    methods: {
        async fetchProducts(){
            try{
                const response = axios.get('/api/products');
                this.products = response.data
            } catch (error){
                console.error('Error fetching products: ', error)
            }
        }
    }
}
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2
                class="text-xl font-semibold leading-tight text-gray-800"
            >
                Products
            </h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8 grid grid-cols-2 grid-flow-row gap-2">

                 <div
                    class="bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg"
                    style="background-color: rgba(0.001, 0.001, 0.001, 0.234);"
                >
                    <div class="p-6 text-gray-100 pb-4">
                        Latest Products
                    </div>
                </div>
                
                <div
                    class="bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg"
                    style="background-color: rgba(0.001, 0.001, 0.001, 0.234);"
                >
                    <div class="p-6 text-gray-100 pb-4">
                        Add Products
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
