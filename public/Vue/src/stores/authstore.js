import { defineStore } from "pinia";
import axios from "axios";

const getToken = () =>
{
    let token = localStorage.getItem('token');
    if ( token )
    {
        return JSON.parse(token)
    }
    else{
        return null
    }
}

const getUser = () =>
{
    let user = localStorage.getItem('user');
    if ( user )
    {
        return JSON.parse(user)
    }
    else{
        return null
    }
}

export const authStore = defineStore("auth",
{
    state: () =>
    ({
        authUser: getUser(),
        authToken: getToken()
    }),

    getters:
    {
        user: (state) => state.authUser,
        token: (state) => state.authToken
    },

    actions:
    {
        // Login
        login(email, password)
        {
            return new Promise( (resolve, reject) => {
                axios.post('/api/v1/auth/login',
                {
                    email,
                    password
                },
                {
                    headers:
                    {
                        accept: 'application/json',
                    },
                }).then(response =>
                {
                    this.authToken = response.data.user.accessToken
                    this.authUser = response.data.user
                    localStorage.setItem( 'token', JSON.stringify(response.data.user.accessToken) );
                    localStorage.setItem('user', JSON.stringify(response.data.user));
                    resolve(response.data);
                }).catch(error =>
                    {
                        reject(error);
                    });
            } )
        },

        // Logout
        async logout()
        {
            await axios.post('/api/v1/auth/logout',
            {
                headers:
                {
                    accept: 'application/json',
                    'Authorization': `Bearer ${getToken()}`
                },
            });
            localStorage.removeItem('token');
            localStorage.removeItem('user');
            this.authToken = null;
            this.authUser = null;
        }
    }
});
