<template>
    <div class="flex">
        <input type="text" class="text-[15px] border border-r-0 border-gray-300 bg-gray-100 w-[340px] rounded-tl-lg rounded-bl-lg px-4 placeholder-gray-400 focus:placeholder-gray-300 focus:bg-white focus:border-blue-200 focus:ring focus:ring-blue-100 focus:ring-opacity-50" placeholder="Search for job titles, companies or keywords">
        <div class="relative">
            <input v-model="location.name" @keyup="searchLocation" type="text" class="text-[15px] border border-gray-300 border-r-0 bg-gray-100 w-[185px] placeholder-gray-400 focus:placeholder-gray-300 focus:bg-white focus:border-blue-200 focus:ring focus:ring-blue-100 focus:ring-opacity-50" placeholder="Location">
            <div v-if="showLocationResults" class="absolute shadow bg-white p-4 z-10 rounded-bl-xl rounded-br-xl min-w-full">
                <div v-for="(result, index) in locationResults" :key="index" class="text-left">
                    <button @click="location = result._source; showLocationResults = false" class="text-left whitespace-nowrap" v-html="result.highlight.name[0]"></button>
                </div>
            </div>
        </div>
        <button class="text-[17px] bg-orange-600 text-white p-2 px-3 rounded-tr-lg rounded-br-lg">
            <svg class="w-6 h-6 inline-block" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
        </button>
    </div>
</template>

<script>
import axios from 'axios';
export default {
    name: "SearchBar",
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
        async searchLocation(e) {
            if(e.target.value.length <= 1) {
                return
            }
            await axios.get('api/geo/locations?q='+this.encodedLocation).then((res) => {
                this.showLocationResults = true;
                this.locationResults = res.data
            }).catch((e) => {
                console.log(e);
            });
        },
    }
}
</script>