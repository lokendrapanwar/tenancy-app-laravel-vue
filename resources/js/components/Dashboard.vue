<template>
	<div class="p-10 bg-gray-100 mb-20 w-full">
		<div id="home">

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
					<li class="flex items-center">
						<a href="#" class="text-gray-600">Dashboard</a>
					</li>
				</ol>
			</nav>
			<!-- breadcrumb end -->
			<Breadcrumb></Breadcrumb>

			<div class="flex flex-wrap -mx-3 mb-20 h-full">

				<div class="w-1/2 xl:w-1/4 px-3">
					<div class="w-full bg-white border text-blue-400 rounded-lg flex items-center p-6 mb-6 xl:mb-0">
						<svg class="w-16 h-16 fill-current mr-4 hidden lg:block" viewBox="0 0 20 20">
							<path
								d="M17.35,2.219h-5.934c-0.115,0-0.225,0.045-0.307,0.128l-8.762,8.762c-0.171,0.168-0.171,0.443,0,0.611l5.933,5.934c0.167,0.171,0.443,0.169,0.612,0l8.762-8.763c0.083-0.083,0.128-0.192,0.128-0.307V2.651C17.781,2.414,17.587,2.219,17.35,2.219M16.916,8.405l-8.332,8.332l-5.321-5.321l8.333-8.332h5.32V8.405z M13.891,4.367c-0.957,0-1.729,0.772-1.729,1.729c0,0.957,0.771,1.729,1.729,1.729s1.729-0.772,1.729-1.729C15.619,5.14,14.848,4.367,13.891,4.367 M14.502,6.708c-0.326,0.326-0.896,0.326-1.223,0c-0.338-0.342-0.338-0.882,0-1.224c0.342-0.337,0.881-0.337,1.223,0C14.84,5.826,14.84,6.366,14.502,6.708">
							</path>
						</svg>

						<div class="text-gray-700">
							<p class="font-semibold text-3xl">237</p>
							<p>Products Sold</p>
						</div>

					</div>
				</div>

				<div class="w-1/2 xl:w-1/4 px-3">
					<div class="w-full bg-white border text-blue-400 rounded-lg flex items-center p-6 mb-6 xl:mb-0">
						<svg class="w-16 h-16 fill-current mr-4 hidden lg:block" viewBox="0 0 20 20">
							<path
								d="M17.684,7.925l-5.131-0.67L10.329,2.57c-0.131-0.275-0.527-0.275-0.658,0L7.447,7.255l-5.131,0.67C2.014,7.964,1.892,8.333,2.113,8.54l3.76,3.568L4.924,17.21c-0.056,0.297,0.261,0.525,0.533,0.379L10,15.109l4.543,2.479c0.273,0.153,0.587-0.089,0.533-0.379l-0.949-5.103l3.76-3.568C18.108,8.333,17.986,7.964,17.684,7.925 M13.481,11.723c-0.089,0.083-0.129,0.205-0.105,0.324l0.848,4.547l-4.047-2.208c-0.055-0.03-0.116-0.045-0.176-0.045s-0.122,0.015-0.176,0.045l-4.047,2.208l0.847-4.547c0.023-0.119-0.016-0.241-0.105-0.324L3.162,8.54L7.74,7.941c0.124-0.016,0.229-0.093,0.282-0.203L10,3.568l1.978,4.17c0.053,0.11,0.158,0.187,0.282,0.203l4.578,0.598L13.481,11.723z">
							</path>
						</svg>

						<div class="text-gray-700">
							<p class="font-semibold text-3xl">177</p>
							<p>Product Reviews</p>
						</div>
					</div>
				</div>

				<div class="w-1/2 xl:w-1/4 px-3">
					<div class="w-full bg-white border text-blue-400 rounded-lg flex items-center p-6">
						<svg class="w-16 h-16 fill-current mr-4 hidden lg:block" viewBox="0 0 20 20">
							<path
								d="M14.999,8.543c0,0.229-0.188,0.417-0.416,0.417H5.417C5.187,8.959,5,8.772,5,8.543s0.188-0.417,0.417-0.417h9.167C14.812,8.126,14.999,8.314,14.999,8.543 M12.037,10.213H5.417C5.187,10.213,5,10.4,5,10.63c0,0.229,0.188,0.416,0.417,0.416h6.621c0.229,0,0.416-0.188,0.416-0.416C12.453,10.4,12.266,10.213,12.037,10.213 M14.583,6.046H5.417C5.187,6.046,5,6.233,5,6.463c0,0.229,0.188,0.417,0.417,0.417h9.167c0.229,0,0.416-0.188,0.416-0.417C14.999,6.233,14.812,6.046,14.583,6.046 M17.916,3.542v10c0,0.229-0.188,0.417-0.417,0.417H9.373l-2.829,2.796c-0.117,0.116-0.71,0.297-0.71-0.296v-2.5H2.5c-0.229,0-0.417-0.188-0.417-0.417v-10c0-0.229,0.188-0.417,0.417-0.417h15C17.729,3.126,17.916,3.313,17.916,3.542 M17.083,3.959H2.917v9.167H6.25c0.229,0,0.417,0.187,0.417,0.416v1.919l2.242-2.215c0.079-0.077,0.184-0.12,0.294-0.12h7.881V3.959z">
							</path>
						</svg>

						<div class="text-gray-700">
							<p class="font-semibold text-3xl">31</p>
							<p>New Enquiries</p>
						</div>
					</div>
				</div>

				<div class="w-1/2 xl:w-1/4 px-3">
					<div class="w-full bg-white border text-blue-400 rounded-lg flex items-center p-6">
						<svg class="w-16 h-16 fill-current mr-4 hidden lg:block" viewBox="0 0 20 20">
							<path
								d="M17.431,2.156h-3.715c-0.228,0-0.413,0.186-0.413,0.413v6.973h-2.89V6.687c0-0.229-0.186-0.413-0.413-0.413H6.285c-0.228,0-0.413,0.184-0.413,0.413v6.388H2.569c-0.227,0-0.413,0.187-0.413,0.413v3.942c0,0.228,0.186,0.413,0.413,0.413h14.862c0.228,0,0.413-0.186,0.413-0.413V2.569C17.844,2.342,17.658,2.156,17.431,2.156 M5.872,17.019h-2.89v-3.117h2.89V17.019zM9.587,17.019h-2.89V7.1h2.89V17.019z M13.303,17.019h-2.89v-6.651h2.89V17.019z M17.019,17.019h-2.891V2.982h2.891V17.019z">
							</path>
						</svg>

						<div class="text-gray-700">
							<p class="font-semibold text-3xl">1,653</p>
							<p>Product Views</p>
						</div>

					</div>
				</div>
			</div>

			<!-----Companies------>
			<div class="flex flex-wrap" v-if="role == 'super-admin'">
				<table class="w-full text-left border-collapse w-full xl-w-2/3">
					<thead class="border-g">
						<tr>
							<th class="px-5 py-3 text-sm font-medium text-gray-100 uppercase bg-gray-800">
								Id
							</th>
							<th class="px-5 py-3 text-sm font-medium text-gray-100 uppercase bg-gray-800">
								Company
							</th>
							<th class="px-5 py-3 text-sm font-medium text-gray-100 uppercase bg-gray-800">
								Domain
							</th>

							<th class="px-5 py-3 text-sm font-medium text-gray-100 uppercase bg-gray-800">
								Created Date
							</th>
						</tr>
					</thead>
					<tbody>
						<tr v-for="(i, index) in data" :key="index" class="hover:bg-gray-200">
							<td class="px-6 py-4 text-gray-800 border-b">
								{{ i.id }}
							</td>
							
							<td class="px-6 py-4 text-lg text-gray-800 border-b">
								{{ (i.domains.length > 0) ? i.domains[0].name : 'N/A'}}
							</td>
							<td class="px-6 py-4 text-gray-800 border-b">
								<a class=" text-blue-500" :href="(i.domains.length > 0) ? i.domains[0].domain : '#'" target="_blank">{{ (i.domains.length > 0) ? i.domains[0].domain : 'N/A' }}</a>
							</td>
							<td class="px-6 py-4 text-gray-800 border-b">
								{{ formatDate(i.created_at) }}
							</td>
						</tr>
						<!-- if no data-->
						<tr v-if="data.length == 0">
							<td class="px-6 py-4 text-gray-800 border-b">
								No comapny found.
							</td>
						</tr>
					</tbody>
				</table>
			</div>

			<!--- Users-->
			<div class="flex flex-wrap" v-if="role == 'company-admin'">
				<table class="w-full text-left border-collapse w-full xl-w-2/3">
					<thead class="border-g">
						<tr>
							<th class="px-5 py-3 text-sm font-medium text-gray-100 uppercase bg-gray-800">
								Name
							</th>
							<th class="px-5 py-3 text-sm font-medium text-gray-100 uppercase bg-gray-800">
								Email
							</th>
							<th class="px-5 py-3 text-sm font-medium text-gray-100 uppercase bg-gray-800">
								Company
							</th>
							<th class="px-5 py-3 text-sm font-medium text-gray-100 uppercase bg-gray-800">
								actions
							</th>
						</tr>
					</thead>
					<tbody>
						<tr v-for="(i, index) in users" :key="index" class="hover:bg-gray-200">
							<td class="px-6 py-4 text-lg text-gray-800 border-b">
								{{ i.name }}
							</td>
							<td class="px-6 py-4 text-gray-800 border-b">
								{{ i.email}}
							</td>
							<td class="px-6 py-4 text-gray-800 border-b">
								{{ i.tenant_id }}
							</td>
							<td class="px-6 py-4 text-gray-800 border-b">
								<router-link class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded mr-2" :to="{ name: 'viewuser', params: { id: i.id } }">View User</router-link>
								<button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" @click="confirmDeleteUser(i.id)">Delete</button>
							</td>
						</tr>
						<!-- if no users -->
						<tr v-if="users.length == 0">
							<td class="px-6 py-4 text-lg text-gray-800 border-b">
								No users found.
							</td>
						</tr>
					</tbody>
				</table>
			</div>

			<div class="" v-if="role == 'company-user'">
				<div class="bg-white border border-gray-200 rounded-lg shadow py-5 px-6">
					<div class="px-4 sm:px-0">
						<h3 class="text-base font-semibold leading-7 text-gray-900">Comapny Information</h3>
						<p class="mt-1 max-w-2xl text-sm leading-6 text-gray-500"></p>
					</div>
					<div class="mt-6 border-t border-gray-100">
						<dl class="divide-y divide-gray-100">
						<div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
							<dt class="text-sm font-medium leading-6 text-gray-900">Company Name</dt>
							<dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{ companyDetails.name }}</dd>
						</div>
						<div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
							<dt class="text-sm font-medium leading-6 text-gray-900">Domain</dt>
							<dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{ companyDetails.domain }}</dd>
						</div>
						<div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
							<dt class="text-sm font-medium leading-6 text-gray-900"> Established</dt>
							<dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{ formatDate(companyDetails.created_at) }}</dd>
						</div>
						<div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
							<dt class="text-sm font-medium leading-6 text-gray-900">About</dt>
							<dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">Fugiat ipsum ipsum deserunt culpa aute sint do nostrud anim incididunt cillum culpa consequat. Excepteur qui ipsum aliquip consequat sint. Sit id mollit nulla mollit nostrud in ea officia proident. Irure nostrud pariatur mollit ad adipisicing reprehenderit deserunt qui eu.</dd>
						</div>

						</dl>
					</div>
					</div>

			</div>


		</div>
	</div>
</template>

<script>
import { UserStore } from '@/store/UserStore';
import axios from 'axios';
import Breadcrumb from '@/components/Breadcrumb.vue';
export default {
	data() {
		return {
			role: '',
			users: [],
			data: [],
			companyDetails: [],
		};
	},
	components: {
		Breadcrumb
	},
	methods: {

		// Add more methods for handling company-related actions
		async getCompanys() {
			await this.setAuthorizationHeader();
			const response = await axios.get('/api/domains');
			this.data = response.data.data;
		},

		async getUsers() {
			await this.setAuthorizationHeader();
			const response = await axios.get('/api/users');
			this.users = response.data.data;
		},

		async getallUsers() {
			await this.setAuthorizationHeader();
			const response = await axios.get('/api/all-users');
			this.users = response.data.data.users;
		},

		async getCompanysDetails() {
			this.companyDetails = window.tenant.domains[0];

			console.log(this.companyDetails);
		},

		async deleteUser(id) {
			await this.setAuthorizationHeader();
			try {
				await axios.delete(`/api/delete-user/${id}`);
				this.getallUsers();
			} catch (error) {
				console.error('Error deleting user:', error.message);
			}
		},
		formatDate(timestamp) {
			const date = new Date(timestamp);
			return date.toLocaleDateString();
    	},

		confirmDeleteUser(userId) {
			// Show a confirmation dialog
			if (window.confirm("Are you sure you want to delete this user?")) {
				// User clicked 'OK', call deleteUser function
				this.deleteUser(userId);
			}
    	},

		async getUser() {
			await this.setAuthorizationHeader();

			try {
				const response = await axios.get('api/user');
				//this.role = response.data.role;

				if(this.role == 'company-admin'){
					this.getallUsers();
				} else if(this.role == 'user'){
					this.getCompanysDetails();
				}
				else
				{
					this.getCompanys();
				}

			} catch (error) {
				console.error('Error fetching user data:', error.message);
			}
		},

		getUserInfo()
        {
            const store = UserStore();
            this.user = store.getUser();
			this.role = this.user.role;

			console.log(this.role);

			if(this.role == 'company-admin'){
				this.getallUsers();
			} else if(this.role == 'company-user'){
				this.getCompanysDetails();
			}
			else if(this.role == 'super-admin')
			{
				this.getCompanys();
			}
        },

		async setAuthorizationHeader() {
			const token = localStorage.getItem('token');
			if (token) {
				axios.defaults.headers.common['Authorization'] = `Bearer ${token}`;
			}
    	},
	},
	mounted() {
		//this.getUser();
		this.getUserInfo();
	}
};
</script>

<style>/* Add your custom styles here */</style>
  