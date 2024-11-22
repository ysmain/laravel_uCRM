<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';
import FlashMessage from '@/Components/FlashMessage.vue';
import { onMounted } from 'vue';
// ページネーション
import Pagination from '@/Components/Pagination.vue';

defineProps({
    customers: Object
})

// onMounted(() => {

// })
</script>

<template>
<ul v-for="customer in customers.data" :key="customer.id">
    <li>{{ customer.id }}</li>
    <li>{{ customer.name }}</li>
</ul>
<!-- ページネーション -->
<Pagination class="mt-6" :links="customers.links"></Pagination>
</template>
