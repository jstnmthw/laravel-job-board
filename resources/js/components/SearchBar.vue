<template>
    <div class="flex">
        <input type="text" class="text-[15px] border border-r-0 border-gray-300 bg-gray-100 w-[350px] rounded-tl-lg rounded-bl-lg px-4 placeholder-gray-400 focus:placeholder-gray-300 focus:bg-white focus:border-blue-200 focus:ring focus:ring-blue-100 focus:ring-opacity-50" placeholder="Search for job titles, companies or keywords">
        <div class="relative focus-within:bg-white focus-within:bg-gray-100 text-gray-400 focus-within:text-gray-300 pl-6 border border-gray-300 border-r-0 bg-gray-100 w-[185px] focus:bg-white focus:border-blue-200 focus:ring focus:ring-blue-100 focus:ring-opacity-50">
            <svg class="absolute block w-7 h-7 top-[5px] left-[5px]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 91 91" fill="currentColor"><path d="M66.9 41.8c0-11.3-9.1-20.4-20.4-20.4-11.3 0-20.4 9.1-20.4 20.4 0 11.3 20.4 32.4 20.4 32.4s20.4-21.1 20.4-32.4zM37 41.4c0-5.2 4.3-9.5 9.5-9.5s9.5 4.2 9.5 9.5c0 5.2-4.2 9.5-9.5 9.5-5.2 0-9.5-4.3-9.5-9.5z"/></svg>
            <input v-model="location.name" @keyup="searchLocation" type="text" class="text-[15px] font-medium text-gray-800 bg-transparent border-0 w-full focus:border-0 focus:ring-0 placeholder-gray-400 focus:placeholder-gray-300" placeholder="Location">
            <div v-on-clickaway="close" v-if="showLocationResults" class="absolute left-0 shadow bg-white p-4 z-10 rounded-bl-xl rounded-br-xl min-w-full">
                <div v-for="(result, index) in locationResults" :key="index" class="text-left">
                    <button @click="location = result._source; showLocationResults = false" class="block w-full text-left whitespace-nowrap text-gray-800" v-html="result.highlight.name[0]"></button>
                </div>
            </div>
            <button v-show="location.name" @click="clearLocation" class="absolute block p-0 top-[11px] right-2 text-gray-400">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
            </button>
        </div>
        <button class="text-[17px] bg-orange-600 text-white p-2 px-3 rounded-tr-lg rounded-br-lg">
            <svg class="w-6 h-6 inline-block" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
        </button>
    </div>
</template>

<script>
import axios from 'axios';
import { mixin as clickaway } from 'vue-clickaway';
export default {
    name: "SearchBar",
    mixins: [ clickaway ],
    data() {
        return {
            location: {
                name: null,
            },
            locationResults: null,
            showLocationResults: false,
            search: null,
        }
    },
    computed: {
        encodedLocation() {
            return encodeURI(this.location.name).toLowerCase();
        }
    },
    methods: {
        close() {
            this.showLocationResults = false;
        },
        clearLocation() {
            this.close()
            this.location.name = '';
        },
        async searchLocation(e) {
            if(e.target.value.length <= 1) {
                return
            }
            await axios.get('/api/geo/locations?q='+this.encodedLocation).then((res) => {
                this.showLocationResults = true;
                this.locationResults = res.data
            }).catch((e) => {
                this.showLocationResults = false;
                console.log(e);
            });
        },
    }
}
</script>