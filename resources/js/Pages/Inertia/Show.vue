<script setup>
import { Inertia } from '@inertiajs/inertia'
// ここでIDを受け取っている
defineProps({
    id : String,
    // 一件取得の場合はObject,複数件の場合にはArray
    blog: Object
})

const deleteConfirm = (id) => {
    // console.log(id)
    Inertia.delete(`/inertia/${id}`, {
        onBefore: () => confirm('本当に削除しますか？')
    })

}

</script>

<template>
    {{ id }}<br>
    {{ blog.title }}<br>
    <button @click="deleteConfirm(blog.id)">削除</button>
</template>
