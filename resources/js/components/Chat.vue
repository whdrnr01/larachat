<template>
    <div class="flex h-full">
        <ChatUserList></ChatUserList>


        <div class="w-4/5 py-2 px-1 flex flex-col">
            <div class="flex-1">
                Chat here
            </div>
            <div class="flex-initial">
                <input type="text" class="border border-gray-600 p-4 w-full rounded">
            </div>
        </div>
    </div>
</template>

<script>
    import ChatUserList from './ChatUserList';
    export default {
        components: {
            ChatUserList
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
