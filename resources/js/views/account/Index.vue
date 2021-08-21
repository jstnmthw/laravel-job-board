<template>
    <div class="absolute left-0 right-0 top-0 h-[450px] bg-orange-600 overflow-hidden">
        <div class="absolute bottom-0 left-0 right-0 text-gray-100">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 3000 260">
                <polygon fill="currentColor" points="0,257 0,260 3000,260 3000,0"></polygon>
            </svg>
        </div>
    </div>
    <top-navbar class="dark mb-5"></top-navbar>
    <div class="max-w-8xl m-auto px-2 sm:px-6 lg:px-8">
        <ul class="m-0 p-0 text-sm">
            <li class="inline-block mr-3">
                <router-link to="/" class="text-orange-600 hover:underline">Home</router-link>
            </li>
            <li class="inline-block mr-3 text-gray-300">
                <svg class="w-4 h-4 inline-block" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
            </li>
            <li class="inline-block mr-3">
                <router-link to="/my/account" class="text-orange-600 hover:underline">Account</router-link>
            </li>
            <li class="inline-block mr-3 text-gray-300">
                <svg class="w-4 h-4 inline-block" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
            </li>
            <li class="inline-block text-gray-400">
                Info
            </li>
        </ul>
    </div>
</template>

<script>
import { mapGetters } from 'vuex';
import TopNavbar from '@/components/TopNavbar'

export default {
    name: 'Index',
    components: { TopNavbar },
    computed: {
        ...mapGetters(['user'])
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