<!-- Login.vue -->
<template>
    <div class="min-h-screen flex items-center justify-center w-full">
        <form @submit.prevent="login" class="bg-white p-8 rounded shadow-md w-full max-w-md">
            <h2 class="text-2xl font-bold mb-4">Login</h2>
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-600">Email</label>
                <input v-model="email" type="email" id="email" name="email" class="mt-1 p-2 w-full border rounded" required>
            </div>
            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-600">Password</label>
                <input :class="error ? 'border-red-500' : ''" v-model="password" type="password" id="password"
                    name="password" class="mt-1 p-2 w-full border rounded" required>
            </div>
            <button v-if="!loader" type="submit" class="px-4 py-2 text-gray-200 bg-gray-800 rounded-md hover:bg-gray-700 focus:outline-none focus:bg-gray-700">Login</button>
            <button v-else type="submit" class="px-4 py-2 text-gray-200 bg-gray-800 rounded-md hover:bg-gray-700 focus:outline-none focus:bg-gray-700" disabled>Loading...</button>
            <!-- display error message  -->
            <p v-if="error" class="text-red-500 mt-4">{{ error }}</p>
        </form>

    </div>
</template>

<script>
import { ref } from 'vue';
import { UserStore } from '@/store/UserStore' // Assuming your store/index.js file exports the store instance
import { useRouter } from 'vue-router';

export default {
    name: 'Login',
    props: {
        // tenant: {
        //   type: Object, // Change this to Object
        //   required: true,
        // },
    },
    data() {
        return {
            email: '',
            password: '',
            error: '',
            loader: false
        };
    },
    methods: {
        async login() {

            this.loader = true;
            var loginUrl = 'api/adminlogin';

            if (window.tenant !== undefined && window.tenant !== null) {
                loginUrl = 'api/login';
            }

            try {
                // Perform AJAX call using Fetch API
                const response = await fetch(loginUrl, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({
                        email: this.email,
                        password: this.password,
                    }),
                });

                if (!response.ok) {
                    throw new Error('Authentication failed');
                }

                const data = await response.json();

                // Access Pinia store
                const store = UserStore();

                // Call the setToken action from your store
                //this.$store.setToken(data.data.token);
                store.setToken(data.data.token);
                store.setUser(data.data.user);

                // Access router instance
                const router = useRouter();

                // Redirect to the Dashboard route
                this.$router.push({ name: 'dashboard' });

                // Handle successful authentication
                console.log('Authentication successful');
            } catch (error) {
                // Handle authentication error
                console.error('Authentication failed:', error.message);
                this.error = error.message;
            } finally {
                this.loader = false;
            }
        },
    },
    mounted() {

    },
};
</script>