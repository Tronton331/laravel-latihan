import { defineStore } from "pinia";

export const tabs = defineStore("tab",
{
    state: () =>
    ({
        tabHome: false,
        tabLogin: false,
        tabRegister: false
    }),

    getters:
    {
        home:(state) => state.tabHome,
        login:  (state) => state.tabLogin,
        register:(state) => state.tabRegister
    },

    actions:
    {

    }
});
