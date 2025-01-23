<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import NavLink from '@/Components/NavLink.vue';
import { Head } from '@inertiajs/vue3';
import { onMounted } from 'vue';
import axios from 'axios';
import { ref } from 'vue';

defineProps({
    mustVerifyEmail: {
        type: Boolean,
    },
    status: {
        type: String,
    },
});

const products = ref([])

onMounted(async ()=>{
    await axios.get('products/latest')
        .then(function (response) {
            products.value = response.data
        })
        .catch(function (error){
            console.error(error)
        })
    console.log("products:", products)
})

</script>

<template>
    <Head title="Profile" />

    <AuthenticatedLayout>
        <template #header>
            <h2
                class="text-xl font-semibold leading-tight text-gray-800"
            >
                Profile
            </h2>
        </template>

        <!-- source: https://github.com/mfg888/Responsive-Tailwind-CSS-Grid/blob/main/index.html -->

        <div class="text-center p-10 grid grid-cols-2 gap-4">
            <div>
                <h1 class="font-bold text-4xl mb-4 text-indigo-400">Latest available products</h1>
            </div>
            <div>
                <NavLink
                                    :href="route('products.add')"
                                    :active="route().current('products.add')"
                >
                                <button type="button" class="text-white bg-indigo-700 hover:bg-indigo-800 focus:outline-none focus:ring-4 focus:ring-indigo-300 font-large rounded-full text-lg px-5 py-2.5 text-center me-2 mb-2 dark:bg-indigo-600 dark:hover:bg-indigo-700 dark:focus:ring-indigo-800">Add New Product</button>
                </NavLink>
               
            </div>
        </div>

        <!-- ✅ Grid Section - Starts Here 👇 -->
        <section id="Products"
            class="w-fit mx-auto grid grid-cols-1 lg:grid-cols-3 md:grid-cols-2 justify-items-center justify-center gap-y-20 gap-x-14 mt-10 mb-5"
            >

            <!--   ✅ Product card 1 - Starts Here 👇 -->
            <div class="w-72 bg-white shadow-md rounded-xl duration-500 hover:scale-105 hover:shadow-xl"
            v-for="(product, index) in products"
            >
                <a :href="`/products/edit/${product.id}`">
                    <img src="https://images.unsplash.com/photo-1646753522408-077ef9839300?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwcm9maWxlLXBhZ2V8NjZ8fHxlbnwwfHx8fA%3D%3D&auto=format&fit=crop&w=500&q=60"
                            alt="Product" class="h-80 w-72 object-cover rounded-t-xl" />
                    <div class="px-4 py-3 w-72">
                        <span class="text-gray-400 mr-3 uppercase text-xs">{{product.name}}</span>
                        <p class="text-lg font-bold text-black truncate block capitalize">{{ product.description }}</p>
                        <div class="flex items-center">
                            <p class="text-lg font-semibold text-black cursor-auto my-3">{{ product.id }}</p>
                            <del>
                                <p class="text-sm text-gray-600 cursor-auto ml-2">$199</p>
                            </del>
                            <div class="ml-auto"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                    fill="currentColor" class="bi bi-bag-plus" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M8 7.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V12a.5.5 0 0 1-1 0v-1.5H6a.5.5 0 0 1 0-1h1.5V8a.5.5 0 0 1 .5-.5z" />
                                    <path
                                        d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z" />
                                </svg></div>
                        </div>
                    </div>
                </a>
            </div>
            <!--   🛑 Product card 1 - Ends Here  -->

        </section>

        <!-- 🛑 Grid Section - Ends Here -->


        <!-- credit -->
        <div class="text-center py-10 px-10">
            <h2 class="font-bold text-2xl md:text-4xl mb-4">Thanks to <a href="https://unsplash.com/@nixcreative"
                    class="underline font-black">Tyler Nix</a> for those AMAZING product images!</h2>
        </div>

    </AuthenticatedLayout>
</template>
