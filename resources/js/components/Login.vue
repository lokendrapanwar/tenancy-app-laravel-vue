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
                <input v-model="password" type="password" id="password" name="password"
                    class="mt-1 p-2 w-full border rounded" required>
            </div>
            <button type="submit" class="bg-blue-500 text-white p-2 rounded">Login</button>
        </form>
    </div>
</template>
  
<script>
// Import the necessary dependencies
// If you are using Axios, import it as well
// import axios from 'axios';

export default {
    data() {
        return {
            email: '',
            password: '',
        };
    },
    methods: {
        async login() {
            try {
                // Perform AJAX call using Fetch API
                const response = await fetch('your_authentication_endpoint', {
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

                // Handle successful authentication
                console.log('Authentication successful');
            } catch (error) {
                // Handle authentication error
                console.error('Authentication failed:', error.message);
            } finally {
                // Reset the form after handling the login
                this.email = '';
                this.password = '';
            }
        },
    },
};

</script>
  
<style scoped>
/* Add your custom styles here */
</style>
  