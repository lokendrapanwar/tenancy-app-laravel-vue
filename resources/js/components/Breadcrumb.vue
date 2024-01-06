<template>
   <div class="lg:flex justify-between items-end mb-6">
    <p class="text-2xl font-semibold mb-2 lg:mb-0">Hello, {{user.name}}!</p>
    <router-link to="/add-company" v-if="user.role == 'super-admin'"
        class="ml-auto bg-gray-800 hover:bg-gray-600 focus:outline-none rounded-lg px-6 py-2 text-white font-semibold shadow mr-2">
        Add Company
    </router-link>

    <router-link to="/add-user" v-if="user.role == 'company-admin'"
        class="ml-auto bg-gray-800 hover:bg-gray-600 focus:outline-none rounded-lg px-6 py-2 text-white font-semibold shadow mr-2">
        Add User
    </router-link>
    <!-- logout button -->
    <button @click="logOut" class="bg-gray-800 hover:bg-gray-600 focus:outline-none rounded-lg px-6 py-2 text-white font-semibold shadow">Log Out</button>
</div>

</template>
<script>
import { UserStore } from '@/store/UserStore';
export default {
    name: 'Breadcrumb',
    props: {
        
    },
    data() {
        return {
            user : UserStore().getUser
        }
    },
    methods: {
        logOut() {
            const token = localStorage.getItem('token');
            if (token) {
                axios.defaults.headers.common['Authorization'] = `Bearer ${token}`;
            }

            var logOutUrl = '/api/logout';
            if(this.user.role === 'super-admin')
            {
                logOutUrl = '/api/admin/logout';
            }

            //axios call to backend
            axios.get(logOutUrl)
                .then(response => {
                    localStorage.removeItem('token');
                    const store = UserStore();
                    store.removeToken();
                    this.$router.push({ name: 'login' });
                })
                .catch(error => {
                    localStorage.removeItem('token');
                    const store = UserStore();
                    this.$router.push({ name: 'login' });
                    console.log(error);
                });

        },
        getUserInfo()
        {
            const store = UserStore();
            this.user = store.getUser();
        }
    },
    mounted() {
        this.getUserInfo();
    }
}
</script>