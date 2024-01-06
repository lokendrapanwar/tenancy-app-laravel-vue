import { defineStore } from 'pinia';

export const UserStore = defineStore({
	id: 'UserStoreId',

	state: () => ({
		token: localStorage.getItem('token') ?? 0,
	}),

	getters: {
		getToken: state => state.token,
	},

	actions: {
		setToken(token) {
			this.token = token;
			localStorage.setItem('token', token);
		},

		//set user details
		setUser(user) {
			this.user = user;
			localStorage.setItem('user', JSON.stringify(user));
		},

		//get user details
		getUser() {
			return JSON.parse(localStorage.getItem('user'));
		},

		removeToken() {
			this.token = 0;
			localStorage.removeItem('token');
		},
	},
});
