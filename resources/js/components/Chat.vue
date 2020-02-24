<template>
    <div class="flex h-full">
        <ChatUserList 
            :current-user="currentUser"
            :chat-with="chatWith"
            @updatedChatWith="updatedChatWith"
        ></ChatUserList>

        <div v-if="chatWith" class="w-4/5 py-2 px-1 flex flex-col">
            <ChatArea
                :chat-id="chatWith"
                :messages="messages"
            ></ChatArea>

            <div class="flex-initial">
                <input 
                    type="text" 
                    class="border border-gray-600 p-4 w-full rounded" 
                    v-model="text"
                    @keyup.enter="submit">
            </div>
        </div>    
        
        <div v-else class="flex items-center font-bold text-blue-700 text-center mx-auto">
            대화상대를 선택해 주세요.
        </div>

    </div>
</template>

<script>
    import ChatUserList from './ChatUserList';
    import ChatArea from './ChatArea';

    export default {
        props: {
            currentUser: {
                type: Number,
                required: true
            }
        },
        components: {
            ChatUserList,
            ChatArea
        },
        data() {
            return {
                chatWith: null,
                text: '',
                messages: []
            }
        },
        created() {
            window.Echo.private('chats').listen('MessageSent', e => {
                if(e.message.to === this.currentUser && e.message.from === this.chatWith) {
                    this.messages.push(e.message);
                }
            });
        },
        mounted() {
            console.log('Component mounted.')
        },
        methods: {
            updatedChatWith(value) {
                this.chatWith = value;
                this.getMessages();
            },

            getMessages() {
                axios.get('/api/messages', {
                    params: {
                        to: this.chatWith,
                        from: this.currentUser
                    }
                }).then(res => {
                    // console.log(res);
                    this.messages = res.data.messages;
                })
            },

            submit() {
                if(this.text) {
                    axios.post('/api/messages', {
                        text: this.text,
                        to: this.chatWith,
                        from: this.currentUser
                    }).then(res => {
                        this.messages.push(res.data.message);
                    });
                }

                this.text = '';

                
            }
        }
    }
</script>
