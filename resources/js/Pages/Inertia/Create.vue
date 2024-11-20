<script setup>
import { reactive } from 'vue'
import { Inertia } from '@inertiajs/inertia'

defineProps({
    // storeメソッドでのバリデーションエラーを受け取る。型指定。
    errors: Object
})

// 変数の動的な変化と表示に対応する
const form = reactive({
    title: null,
    content: null
})

const submitFunction = () => {
    // Inertia.jsのpostを使用
    Inertia.post('/inertia', form)
}
</script>

<template>
    <!-- prevent デフォルトのformの予期せぬ画面遷移を防ぐ -->
    <form @submit.prevent="submitFunction">
        <input type="text" name="title" v-model="form.title"><br>
        <div v-if="errors.title">{{ errors.title }}</div>
        <input type="text" name="content" v-model="form.content">
        <div v-if="errors.content">{{ errors.content }}</div>
        <button>送信</button>
    </form>
</template>
