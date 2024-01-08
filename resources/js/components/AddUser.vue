<template>
    <div class="p-10 bg-gray-100 mb-20 w-full">
        <div id="home" class="h-full">

            <!-- breadcrumb -->
            <nav class="text-sm font-semibold mb-6" aria-label="Breadcrumb">
                <ol class="list-none p-0 inline-flex">
                    <li class="flex items-center text-blue-500">
                        <a href="#" class="text-gray-700">Home</a>
                        <svg class="fill-current w-3 h-3 mx-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
                            <path
                                d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z" />
                        </svg>
                    </li>
                    <li v-if="isViewUser()" class="flex items-center">
                        <a href="#" class="text-gray-600">View User</a>
                    </li>
                    <li v-else class="flex items-center">
                        <a href="#" class="text-gray-600">Add User</a>
                    </li>
                </ol>
            </nav>

            <!-- breadcrumb end -->
            <div class="lg:flex justify-between items-center mb-6">
                <p v-if="!isViewUser()" class="text-2xl font-semibold mb-2 lg:mb-0">Add User</p>
                <router-link to="/dashboard"
                    class="ml-auto bg-gray-800 hover:bg-gray-600 focus:outline-none rounded-lg px-6 py-2 text-white font-semibold shadow mr-2">
                    Back to dashboard
                </router-link>
            </div>

            <!-- Forms Section -->
            <div class="w-full">
                <h4 class="text-gray-600">

                </h4>

                <div class="">

                    <div class="p-6 bg-white rounded-md shadow-md">
                        <div class="flex justify-start mt-4">
                            <h3 class="text-2xl font-semibold">User Information</h3>
                        </div>

                        <div v-if="isViewUser()">
                            <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-2">
                                <div>
                                    <label class="text-gray-700" for="username">Name</label>
                                    <input v-model="user.name" class="mt-1 p-2 w-full border rounded" type="text"
                                        placeholder="User Name" disabled>
                                </div>

                                <div>
                                    <label class="text-gray-700" for="emailAddress">Email</label>
                                    <input v-model="user.email" class="mt-1 p-2 w-full border rounded" type="email"
                                        placeholder="User Email" disabled>
                                </div>

                                <div>
                                    <label class="text-gray-700" for="username">Company</label>
                                    <input v-model="user.company" class="mt-1 p-2 w-full border rounded" disabled
                                        type="text" placeholder="User Domain">
                                </div>

                                <div>
                                    <label class="text-gray-700" for="password">Created at</label>
                                    <input v-model="user.created_date" class="mt-1 p-2 w-full border rounded" type="text"
                                        placeholder="Password" disabled>
                                </div>
                            </div>
                        </div>
                        <div v-else>
                            <!-- Your form code here -->
                            <form @submit.prevent="registerUser">
                                <!-- Your form fields go here -->
                                <!-- ... -->
                                <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-2">
                                    <div>
                                        <label class="text-gray-700" for="username">Name</label>
                                        <input v-model="user.name" class="mt-1 p-2 w-full border rounded" type="text"
                                            placeholder="User Name" required>
                                    </div>

                                    <div>
                                        <label class="text-gray-700" for="emailAddress">Email</label>
                                        <input v-model="user.email" class="mt-1 p-2 w-full border rounded" type="email"
                                            placeholder="User Email" required>
                                    </div>

                                    <div>
                                        <label class="text-gray-700" for="username">Company</label>
                                        <input v-model="user.company" class="mt-1 p-2 w-full border rounded" disabled
                                            type="text" placeholder="User Domain" required>
                                    </div>

                                    <div>
                                        <label class="text-gray-700" for="password">Password</label>
                                        <input v-model="user.password" :class="{ 'border-red-500': passwordError }" class="mt-1 p-2 w-full border rounded"
                                            type="password" placeholder="Password" required>
                                            <p v-if="passwordError" class="text-red-500">{{ passwordError }}</p>
                                    </div>

                                    <div>
                                        <label class="text-gray-700" for="passwordConfirmation">Password
                                            Confirmation</label>
                                        <input v-model="user.confirm" class="mt-1 p-2 w-full border rounded" :class="{ 'border-red-500': passwordError }" type="password"
                                            placeholder="Password Confirmation" required>
                                        
                                    </div>
                                </div>
                                <div class="flex justify-end mt-4">
                                    <button v-if="!loading" type="submit"
                                        class="px-4 py-2 text-gray-200 bg-gray-800 rounded-md hover:bg-gray-700 focus:outline-none focus:bg-gray-700">Add
                                        User</button>
                                    <button v-else type="submit" class="px-4 py-2 text-gray-200 bg-gray-800 rounded-md hover:bg-gray-700 focus:outline-none focus:bg-gray-700" disabled>Loading...</button>
                                </div>
                            </form>
                            <p v-if="error" class="text-red-500 mt-4">{{ error }}</p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
  
<script>
export default {
    name: "AddCompany",

    data() {
        return {
            user: {
                company: ''
            },
            tenants: [],
            passwordError: false,
            loading: false,
            error: false
        }
    },
    methods: {
        async registerUser() {
            try {

                if (this.user.password.trim() === "" || this.user.confirm.trim().length <= 5) {
                    this.passwordError = "Password is required and must be at least 6 characters long";
                    return;
                }
                if (this.user.password !== this.user.confirm) {
                    this.passwordError = "Passwords does not match";
                    return;
                }

                this.passwordError = false;
                this.loading = true;
                await this.setAuthorizationHeader();
                // Perform AJAX call using Fetch API
                const response = await axios.post('api/create-user', this.user, {
                    headers: {
                        'Content-Type': 'application/json',
                    },
                });

                if (!response.data.success) {
                    throw new Error("Company registration failed");
                }

                // Redirect to the Dashboard route
                this.$router.push({ name: 'dashboard' });

            } catch (error) {
                this.error = error.message;
                console.error(error);
            } finally {
                this.loading = false;
            }
        },
        setCompany() {
            this.user.company = window.tenant.domains[0].name;
        },

        isViewUser() {
            // Check if the 'id' parameter exists and the route name is 'viewuser'
            return this.$route.name === 'viewuser';
        },

        async setAuthorizationHeader() {
            const token = localStorage.getItem('token');
            if (token) {
                axios.defaults.headers.common['Authorization'] = `Bearer ${token}`;
            }
        },

    },
    mounted() {
        this.setCompany();

        //check the url parameter and get
        if (this.isViewUser()) {
            let userId = this.$route.params.id;

            const token = localStorage.getItem('token');
            if (token) {
                axios.defaults.headers.common['Authorization'] = `Bearer ${token}`;
            }
            axios
                .get(`/api/user/${userId}`)
                .then((response) => {
                    this.user = response.data.user;
                })
                .catch((error) => {
                    console.error(error);
                });
        }
    },
    computed: {

    },
};
</script>
  