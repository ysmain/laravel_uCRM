<script setup>
import { Link } from '@inertiajs/vue3';

defineProps({
    // コントローラーから受け取る
    blogs: Array
})

</script>

<template>
<div v-if="$page.props.flash.message" class="bg-blue-300">
    <!-- フラッシュメッセージ流れ３ -->
    {{ $page.props.flash.message }}
</div>
<ul>
    <li v-for="blog in blogs" :key="blog.id">
        <!-- : = v-bind:。v-bindは、属性に対して動的に値を設定するために使う。 -->
        件名： <Link class="text-blue-400" :href="route('inertia.show', { id: blog.id })"> {{ blog.title }}</Link>,
        本文： {{ blog.content }}
    </li>
</ul>
ああああ
</template>
