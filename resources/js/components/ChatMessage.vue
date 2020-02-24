<template>
    <div class="p-1 m-1">
        <div 
            class="w-1/2 bg-gray-300 rounded p-2 m-2"
            :class="{ 'bg-yellow-300': chatWith === message.from.id }"
        >
            <div class="flex items-center justify-between">
                <div class="font-bold">{{ message.from.name }} {{ chatWith }} {{ message.to.id }}</div>
                <div class="font-bold text-xs text-gray-500"><small>{{ message.created_at}}</small></div>
            </div>
            <div class="mt-2">
                {{ message.text }}
            </div>
        </div>
    </div>    
</template>

<script>
export default {
    props: {
        message: {
            type: Object,
            required: true
        },
        chatWith: {
            type: Number,
            required: false
        }
    }
}
</script>