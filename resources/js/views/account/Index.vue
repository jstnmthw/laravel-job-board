<template>
    <div class="absolute left-0 right-0 top-0 h-[450px] bg-dark overflow-hidden z-[-1]">
        <div class="absolute bottom-0 left-0 right-0 text-gray-100">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 3000 260">
                <polygon fill="currentColor" points="0,257 0,260 3000,260 3000,0"></polygon>
            </svg>
        </div>
    </div>
    <top-navbar></top-navbar>
    <div class="max-w-8xl mx-auto mb-12 px-2 sm:px-6 lg:px-8">
        <ul class="m-0 p-0 text-sm">
            <li class="inline-block mr-2">
                <router-link to="/" class="text-orange-600 dark:hover:text-white hover:underline">
                    Home
                </router-link>
            </li>
            <li class="inline-block mr-2 text-slate dark:text-orange-400">
                <svg class="w-4 h-4 inline-block" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                </svg>
            </li>
            <li class="inline-block mr-2">
                <router-link to="/my/account" class="text-orange-600 dark:text-orange-50 dark:hover:text-white hover:underline">
                    Account
                </router-link>
            </li>
            <li class="inline-block mr-2 text-slate dark:text-orange-400">
                <svg class="w-4 h-4 inline-block" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                </svg>
            </li>
            <li class="inline-block text-gray-600 dark:text-orange-200 font">
                Settings
            </li>
        </ul>
    </div>
    <div class="max-w-8xl mx-auto px-2 sm:px-6 lg:px-8 mb-24">
        <div class="md:grid md:grid-cols-4 md:gap-8 items-start">
            <!-- Sidebar -->
            <aside class="md:col-span-1 shadow-md rounded-2xl bg-white text-center">
                <img v-if="user.avatar" :src="user.avatar" :alt="user.name + '\'s avatar'" class="text-gray-300 rounded-full w-32 h-32 mx-auto mt-14 mb-3 text-center text-5xl font-bold leading-[100px]">
                <div v-else class="bg-gray-100 text-gray-300 rounded-full w-24 h-24 mx-auto mt-14 mb-3 text-center text-5xl font-bold leading-[100px]">
                    {{ user.name.charAt(0) }}
                </div>
                <div class="text-slate font-semibold">
                    {{ user.name }}
                </div>
                <div class="text-gray-400 mb-12 text-sm">
                    {{ userData.email }}
                </div>
                <div class="flex flex-col text-left">
                    <span class="text-sm font-medium text-gray-400 py-2 px-6 bg-gray-100">
                        Dashboard
                    </span>
                    <router-link to="/my/account" class="text-slate hover:text-orange-600 transition-colors font-medium py-3 px-0 tracking-tight border-b border-gray-100 mx-5">
                        <svg class="w-6 h-6 inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7v8a2 2 0 002 2h6M8 7V5a2 2 0 012-2h4.586a1 1 0 01.707.293l4.414 4.414a1 1 0 01.293.707V15a2 2 0 01-2 2h-2M8 7H6a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2v-2"></path></svg>
                        Profile
                    </router-link>
                    <router-link to="/" class="text-slate hover:text-orange-600 transition-colors font-medium py-3 px-0 tracking-tight border-b border-gray-100 mx-5">
                        <svg class="w-6 h-6 inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                        Job Applications
                    </router-link>
                    <router-link to="/" class="text-slate hover:text-orange-600 transition-colors font-medium py-3 px-0 tracking-tight border-b border-gray-100 mx-5">
                        <svg class="w-6 h-6 inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path></svg>
                        Your Reviews
                    </router-link>
                    <router-link to="/" class="text-slate hover:text-orange-600 transition-colors font-medium py-3 px-0 tracking-tight border-b border-gray-100 mx-5">
                        <svg class="w-6 h-6 inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path></svg>
                        Saved Jobs
                    </router-link>
                    <router-link to="/" class="text-slate hover:text-orange-600 transition-colors font-medium py-3 px-0 tracking-tight border-b border-gray-100 mx-5">
                        <svg class="w-6 h-6 inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2"></path></svg>
                        Saved Companies
                    </router-link>
                    <router-link to="/" class="text-slate hover:text-orange-600 transition-colors font-medium py-3 px-0 tracking-tight border-b border-gray-100 mx-5">
                        <svg class="w-6 h-6 inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 15l-2 5L9 9l11 4-5 2zm0 0l5 5M7.188 2.239l.777 2.897M5.136 7.965l-2.898-.777M13.95 4.05l-2.122 2.122m-5.657 5.656l-2.12 2.122"></path></svg>
                        Premium
                    </router-link>
                    <span class="text-sm font-medium text-gray-400 py-2 px-6 bg-gray-100">
                        Settings
                    </span>
                    <router-link to="/" class="text-gray-500 hover:text-orange-600 transition-colors font-medium text-sm py-3 px-0 tracking-tight border-b border-gray-100 mx-5">
                        Notifications
                    </router-link>
                    <router-link to="/" class="text-gray-500 hover:text-orange-600 transition-colors font-medium text-sm py-3 px-0 tracking-tight border-b border-gray-100 mx-5">
                        Password
                    </router-link>
                    <router-link to="/" class="text-gray-500 hover:text-orange-600 transition-colors font-medium text-sm py-3 px-0 tracking-tight border-b border-gray-100 mx-5">
                        <svg class="w-5 h-5 inline-block mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                        Sign out
                    </router-link>
                </div>
            </aside>

            <!-- Main -->
            <main class="md:col-span-3 shadow-md rounded-2xl bg-white mt-5 md:mt-0">
                <div class="md:grid md:grid-cols-3 md:gap-12">
                    <div class="md:col-span-3">
                        <div class="px-10 pt-10 pb-5">
                            <h2 class="text-2xl font-semibold">Basic Info</h2>
                        </div>
                        <div class="mb-8 px-10">
                            <label class="block text-sm font-medium text-gray-700">
                                Photo
                            </label>
                            <span v-if="errors.avatar" class="text-red-600 text-[11px] font-semibold">
                                <svg aria-hidden="true" class="inline-block" fill="currentColor" focusable="false" width="16px" height="16px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-2h2v2zm0-4h-2V7h2v6z"></path></svg>
                                {{ errors.avatar[0] }}
                            </span>
                            <div class="mt-5 flex items-center">
                                <input @change="uploadAvatar" type="file" name="avatar" id="avatar" class="sr-only">
                                <label for="avatar" class="cursor-pointer flex items-center">
                                    <span class="inline-block h-20 w-20 rounded-full overflow-hidden bg-gray-100">
                                        <svg class="h-full w-full text-gray-300" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z"></path>
                                        </svg>
                                    </span>
                                    <span class="ml-5 bg-white py-2 px-3 border border-gray-300 rounded-md shadow-sm text-sm leading-4 font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-200">
                                        Change
                                    </span>
                                </label>
                            </div>
                        </div>
                        <div class="mb-6 px-10">
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Name
                            </label>
                            <input v-model="userData.name" type="text" class="w-full p-2 rounded-lg border-gray-300 focus:border-blue-200 focus:ring focus:ring-blue-100  focus:ring-opacity-50">
                        </div>
                        <div class="md:grid md:grid-cols-4 mb-6 px-10">
                            <div class="md:col-span-2">
                                <label class="block text-sm font-medium text-gray-700 mb-2">
                                    Country / Region
                                </label>
                                <select v-model="userData.country_id" @change="onCountryChange" id="country" name="country" autocomplete="country" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-orange-500 focus:border-orange-500">
                                    <option disabled value="null">Select country</option>
                                    <option v-for="(country, index) in countries" :value="country.id">
                                        {{ country.name }}
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-6 px-10">
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Street address
                            </label>
                            <input v-model="userData.address" type="text" class="w-full p-2 rounded-lg border-gray-300 focus:border-blue-200 focus:ring focus:ring-blue-100  focus:ring-opacity-50">
                        </div>
                        <div class="md:grid md:grid-cols-3 gap-3 md:gap-6 mb-16 px-10">
                            <div class="md:grid md:col-span-1">
                                <label class="block text-sm font-medium text-gray-700 mb-2">
                                    State / Province
                                </label>
                                <select v-model="userData.province_id" @change="onProvinceChange" id="province" name="state" autocomplete="province" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-orange-500 focus:border-orange-500">
                                    <option disabled value="null">Select state</option>
                                    <option v-for="province in provinces" :value="province.id">
                                        {{ province.name }}
                                    </option>
                                </select>
                            </div>
                            <div class="md:grid md:col-span-1">
                                <label class="block text-sm font-medium text-gray-700 mb-2">
                                    City
                                </label>
                                <select v-model="userData.city_id" id="city" name="city" autocomplete="city" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-orange-500 focus:border-orange-500">
                                    <option disabled value="null">Select city</option>
                                    <option v-for="city in cities" :value="city.id">
                                        {{ city.name }}
                                    </option>
                                </select>
                            </div>
                            <div class="md:grid md:col-span-1">
                                <label class="block text-sm font-medium text-gray-700 mb-2">
                                    ZIP / Postal
                                </label>
                                <input v-model="userData.zipcode" type="text" class="w-full p-2 rounded-lg border-gray-300 focus:border-blue-200 focus:ring focus:ring-blue-100  focus:ring-opacity-50">
                            </div>
                        </div>
                        <div class="text-right py-5 px-8 bg-gray-50 rounded-b-2xl">
                            <button @click="submitForm" type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-orange-600 hover:bg-orange-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500">
                                Save Changes
                            </button>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</template>

<script>
import axios from 'axios';
import store from '@/store'
import { mapState } from 'vuex';
import TopNavbar from '@/components/TopNavbar'

export default {
    name: 'Index',
    components: { TopNavbar },
    data() {
        return {
            userData: {
                country_id: null,
                province_id: null,
                city_id: null,
                zipcode: null,
            },
            countries: null,
            cities: null,
            provinces: null,
        }
    },
    computed: {
        ...mapState(['user', 'errors'])
    },
    methods: {
        async getUserData() {
            await axios.get('/api/user/data').then((res) => {
                this.userData = res.data.data
            })
        },
        async getCountries() {
            await axios.get('/api/geo/countries').then((res) => {
                this.countries = res.data
            })
        },
        async getProvinces(parent_id) {
            await axios.get('/api/geo/children/' + parent_id).then((res) => {
                this.provinces = res.data
            })
        },
        async getCities(parent_id) {
            await axios.get('/api/geo/children/' + parent_id).then((res) => {
                this.cities = res.data
            })
        },
        async submitForm() {
            await axios.put('/api/users/' + this.user.id, this.userData)
                .then((res) => {
                    //..
                })
        },
        async uploadAvatar(e) {
            const url = '/api/user/upload/avatar/' + this.user.id
            const formData = new FormData();
            const config = {
                headers: {
                    'content-type': 'multipart/form-data'
                }
            }
            formData.append('avatar', e.target.files[0])
            await axios
                .post(url, formData, config)
                .then((res) => {
                    store.commit('ADD_USER_INFO', { avatar: res.data })
                })
                .catch((error) => {
                    if (error.response.status >= 400) {
                        store.commit('SET_ERRORS', error.response.data.errors)
                    }
                });
        },
        onCountryChange(e) {
            this.getProvinces(e.target.value)
        },
        onProvinceChange(e) {
            this.userData.city_id = null
            this.getCities(e.target.value)
        },
    },
    watch: {
        'userData.country_id': function (val) {
            this.getProvinces(val)
        },
        'userData.province_id': function (val) {
            this.getCities(val)
        }
    },
    mounted() {
        document.body.classList.add('bg-gray-100')
        this.getUserData()
        this.getCountries()
    },
    unmounted() {
        document.body.classList.remove('bg-gray-100')
    }
}
</script>

<style scoped>
</style>