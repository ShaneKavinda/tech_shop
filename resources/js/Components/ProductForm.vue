<template>
    <div class="max-w-md mx-auto bg-white shadow-md rounded-md p-6">
      <h2 class="text-xl font-semibold text-gray-800 mb-4">Add New Product</h2>
      
      <form @submit.prevent="handleSubmit">
        <!-- Name -->
        <div class="mb-4">
          <label for="name" class="block text-gray-700 font-medium mb-2">Product Name</label>
          <input
            v-model="form.name"
            type="text"
            id="name"
            class="w-full border rounded-md px-3 py-2 focus:ring-indigo-500 focus:border-indigo-500"
            placeholder="Enter product name"
            required
          />
        </div>
  
        <!-- Description -->
        <div class="mb-4">
          <label for="description" class="block text-gray-700 font-medium mb-2">Description</label>
          <textarea
            v-model="form.description"
            id="description"
            class="w-full border rounded-md px-3 py-2 focus:ring-indigo-500 focus:border-indigo-500"
            placeholder="Enter product description"
            rows="4"
            required
          ></textarea>
        </div>
  
        <!-- Status -->
        <div class="mb-4 flex items-center">
          <input
            v-model="form.status"
            type="checkbox"
            id="status"
            class="mr-2"
          />
          <label for="status" class="text-gray-700">Active</label>
        </div>
  
        <!-- Submit Button -->
        <div class="text-right">
          <button
            type="submit"
            class="bg-indigo-500 text-white px-4 py-2 rounded-md hover:bg-indigo-600 focus:outline-none focus:ring-2 focus:ring-indigo-500"
          >
            Save Product
          </button>
        </div>
      </form>
    </div>
  </template>
  
  <script>
  import { reactive, toRefs } from 'vue';
  
  export default {
  emits: ['submit'],
  setup(props, { emit }) {
    const form = reactive({
      name: '',
      description: '',
      status: false,
    });

    const handleSubmit = () => {
      emit('submit', { ...form });
    };

    return {
      form,
      handleSubmit,
    };
  },
};
  </script>
  
  <style scoped>
  /* Additional styles to enhance the form */
  form {
    font-family: 'Arial', sans-serif;
  }
  
  input, textarea {
    transition: border-color 0.2s;
  }
  
  input:focus, textarea:focus {
    border-color: #4f46e5;
  }
  </style>
  