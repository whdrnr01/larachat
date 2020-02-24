<template>
    <div class="flex-1 p-2 overflow-y-scroll" vue-chat-scroll>
        <!-- <p>chat with user id {{ chatId }}</p> -->
        <ChatMessage
            v-for="message in messages"
            :key=message.id
            :message="message"
            :chat-with="chatId"
            ></ChatMessage>
    </div>
</template>

<script>
import ChatMessage from './ChatMessage';

export default {
    components: {
        ChatMessage
    },

    props: {
        chatId: {
            type: Number,
            required: true
        },
        messages: {
            type: Array
        }
    }
}
</script>