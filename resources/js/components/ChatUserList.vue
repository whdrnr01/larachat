<template>
    <div class="w-1/5 border-r-2 border-blue-900 py-2">
        <h3 class="text-center text-2xl font-bold">User List</h3>
        <div 
            v-for="user in users"
            :key="user.id"
        >
            {{ user.name }}
        </div>
    </div>
</template>

<script>
export default {
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
    }
}
</script>