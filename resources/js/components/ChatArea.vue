<template>
    <div class="flex-1 p-2">
        <p>chat with user id {{ chatId }}</p>
    </div>
</template>

<script>
export default {
    props: {
        chatId: {
            type: Number,
            required: true
        }
    }
}
</script>