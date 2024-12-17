import { defineStore } from "pinia";
import axios from "axios";
import cookie from "../utils/Cookie";

export const authStore = defineStore("auth",
{
    state: () =>
    ({
        authUser: null
    }),

    getters:
    {
        user: (state) => state.authUser
    },

    actions:
    {
        async getToken()
        {
            await axios.get('/sanctum/csrf-cookie');
        },
        async getUser()
        {
            const data = await axios.get('/api/user');
            this.authUser = data.data;
        },
        async logout()
        {
            await this.getToken();
            await axios.post('/logout',
            {},
            {
                headers:
                {
                    accept: 'application/json',
                    'X-XSRF-TOKEN': cookie.getCookie('XSRF-TOKEN')
                },
            });
            this.authUser = null;
            console.log("[Logout] Success")
        }
    }
});
