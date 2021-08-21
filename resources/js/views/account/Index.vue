<template>
    <div class="absolute left-0 right-0 top-0 h-[450px] bg-orange-600 overflow-hidden z-[-1]">
        <div class="absolute bottom-0 left-0 right-0 text-gray-100">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 3000 260">
                <polygon fill="currentColor" points="0,257 0,260 3000,260 3000,0"></polygon>
            </svg>
        </div>
    </div>
    <top-navbar class="dark"></top-navbar>
    <div class="dark max-w-8xl mx-auto mb-24 px-2 sm:px-6 lg:px-8">
        <ul class="m-0 p-0 text-sm">
            <li class="inline-block mr-3">
                <router-link to="/" class="text-orange-600 dark:text-orange-50 dark:hover:text-white hover:underline">Home</router-link>
            </li>
            <li class="inline-block mr-3 text-gray-300 dark:text-orange-400">
                <svg class="w-4 h-4 inline-block" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
            </li>
            <li class="inline-block mr-3">
                <router-link to="/my/account" class="text-orange-600 dark:text-orange-50 dark:hover:text-white hover:underline">Account</router-link>
            </li>
            <li class="inline-block mr-3 text-gray-300 dark:text-orange-400">
                <svg class="w-4 h-4 inline-block" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
            </li>
            <li class="inline-block text-gray-400 dark:text-orange-200">
                Settings
            </li>
        </ul>
    </div>
    <div class="max-w-8xl mx-auto px-2 sm:px-6 lg:px-8">
        <div class="md:grid md:grid-cols-4 md:gap-8">
            <div class="md:col-span-1 shadow-lg rounded-2xl bg-white text-center">
                <div class="bg-gray-100 text-gray-300 rounded-full w-32 h-32 mx-auto mt-14 mb-3 text-center text-5xl font-bold leading-[114px]">
                    {{ user.name.charAt(0) }}
                </div>
                <div class="text-dark font-bold">
                    {{ user.name }}
                </div>
                <div class="text-gray-400 mb-12">
                    {{ userData.email }}
                </div>
                <div class="flex flex-col text-left">
                    <span class="text-sm font-bold text-gray-400 py-2 px-6 bg-gray-100">
                        Settings
                    </span>
                    <router-link to="/" class="text-blue-500 py-3 px-6">
                        <svg class="w-6 h-6 inline-block mr-3 text-blue-100" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7v8a2 2 0 002 2h6M8 7V5a2 2 0 012-2h4.586a1 1 0 01.707.293l4.414 4.414a1 1 0 01.293.707V15a2 2 0 01-2 2h-2M8 7H6a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2v-2"></path></svg>
                        Some link
                    </router-link>
                </div>
            </div>
            <div class="mt-5 md:mt-0 md:col-span-3 shadow-lg rounded-2xl bg-white p-6">
                Content
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';
import { mapGetters } from 'vuex';
import TopNavbar from '@/components/TopNavbar'

export default {
    name: 'Index',
    components: { TopNavbar },
    data() {
        return {
            userData: {}
        }
    },
    computed: {
        ...mapGetters(['user'])
    },
    methods: {
        async getUserData()
        {
            await axios.get('/api/user/data').then((res) => {
                this.userData = res.data.data
            })
        }
    },
    mounted() {
        document.body.classList.add('bg-gray-100')
        this.getUserData()
    },
    unmounted() {
        document.body.classList.remove('bg-gray-100')
    }
}
</script>

<style scoped>
</style>