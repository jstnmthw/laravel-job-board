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
                <router-link to="/" class="text-orange-600 dark:text-orange-100 hover:underline">Home</router-link>
            </li>
            <li class="inline-block mr-3 text-gray-300 dark:text-orange-400">
                <svg class="w-4 h-4 inline-block" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
            </li>
            <li class="inline-block mr-3">
                <router-link to="/my/account" class="text-orange-600 dark:text-orange-100 hover:underline">Account</router-link>
            </li>
            <li class="inline-block mr-3 text-gray-300 dark:text-orange-400">
                <svg class="w-4 h-4 inline-block" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
            </li>
            <li class="inline-block text-gray-400 dark:text-orange-200">
                Info
            </li>
        </ul>
    </div>
    <div class="max-w-8xl mx-auto px-2 sm:px-6 lg:px-8">
        <div class="md:grid md:grid-cols-4 md:gap-8">
            <div class="md:col-span-1 shadow-lg rounded-2xl bg-white p-6 text-center">
                <div class="bg-gray-100 text-gray-300 rounded-full w-32 h-32 mx-auto mt-6 mb-3 text-center text-5xl font-bold leading-[114px]">
                    {{ user.name.charAt(0) }}
                </div>
                <div class="text-dark font-bold mb-1">
                    {{ user.name }}
                </div>
                <div class="text-gray-400">
                    {{ userData.email }}
                </div>
            </div>
            <div class="mt-5 md:mt-0 md:col-span-3 shadow-lg rounded-2xl bg-white p-6">
                Content
            </div>
        </div>
    </div>
</template>

<script>
import {mapActions, mapGetters} from 'vuex';
import TopNavbar from '@/components/TopNavbar'

export default {
    name: 'Index',
    components: { TopNavbar },
    data() {
        return {
            userData: {
                email: 'something@example.co'
            }
        }
    },
    computed: {
        ...mapGetters(['user'])
    },
    methods: {
        ...mapActions(['api/api'])
    },
    mounted() {
        document.body.classList.add('bg-gray-100')
    },
    unmounted() {
        document.body.classList.remove('bg-gray-100')
    }
}
</script>

<style scoped>
</style>