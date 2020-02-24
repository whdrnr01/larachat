<template>
    <div class="w-1/5 border-r-2 border-blue-900 py-2">
        <h3 class="text-center text-2xl font-bold mb-2">User List</h3>
        <div
            v-for="user in usersWithoutSignedInUser"
            :key="user.id"
            class="p-2 border border-gray-300 bg-gray-200 hover:bg-gray-700 hover:text-white cursor-pointer"
            :class="{ 'bg-pink-200': chatWith === user.id }"
            @click="updateChatWith(user.id)"
        >
            {{ user.name }}
        </div>
    </div>
</template>

<script>
export default {
    props: {
        currentUser: {
            type: Number,
            required: true
        },
        chatWith: {
            type: Number,
            required: false
        }
    },
    computed: {
        usersWithoutSignedInUser() {
            return this.users.filter(user => {
                return user.id !== this.currentUser
            });
        }
    },
    data() {
        return {
            users: []
        }
    },
    created() {
        axios.get('/api/users').then(res => {
            this.users = res.data.users
        }).catch(error => {
            console.log(error)
        });
    },
    methods: {
        updateChatWith(userId) {
            this.$emit('updatedChatWith', userId);
        }
    }
}
</script>