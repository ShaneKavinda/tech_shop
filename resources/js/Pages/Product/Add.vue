<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, router as $inertia } from '@inertiajs/vue3';
import { onMounted } from 'vue';
import ProductForm from '@/Components/ProductForm.vue';


defineProps({
    mustVerifyEmail: {
        type: Boolean,
    },
    status: {
        type: String,
    },
});



onMounted(()=>{
})

const addProduct = async (productData) => {
    try {
        const response = await axios.post('/products/store', productData);
        console.log('Product added successfully:', response.data);
        alert('Product added successfully!');
        
        // Redirect using Inertia
        $inertia.visit('/product'); // Redirect after success

    } catch (error) {
        console.error('Error adding product:', error);
        alert('Failed to add product. Please try again.');
    }

};
</script>

<template>
    <Head title="Add Product" />

    <AuthenticatedLayout>
        <template #header>
            <h2
                class="text-xl font-semibold leading-tight text-gray-800"
            >
                Product
            </h2>
        </template>

        <div class="mt-4">
            <!-- Pass the addProduct function as a prop or event -->
            <ProductForm @submit="addProduct" />
        </div>
    </AuthenticatedLayout>
</template>
