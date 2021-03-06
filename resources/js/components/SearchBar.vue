<template>
    <form class="flex" v-on:submit.prevent="onSubmit()">
        <input tabindex="1" :value="search" @input="searchQuery" type="text" placeholder="Search for job titles, companies or keywords" class="
            text-[15px]
            w-[350px]
            px-4
            border
            border-r-0
            border-gray-300
            bg-gray-100
            rounded-tl-lg
            rounded-bl-lg
            placeholder-gray-400
            focus:border-r
            focus:placeholder-gray-300
            focus:bg-white
            focus:border-orange-700
            dark:border-gray-700
            dark:bg-gray-900
            dark:focus:border-orange-700
            dark:placeholder-gray-500
            dark:focus:placeholder-gray-600
            dark:text-gray-100
            dark:focus:ring-orange-700
            focus:ring-orange-700
            focus:z-10
            focus:ring-1">
        <div class="
            location
            pl-6
            w-[185px]
            relative
            text-gray-300
            border
            border-gray-300
            bg-gray-100
            focus-within:ring-orange-700
            focus-within:border-orange-700
            focus-within:bg-white
            focus-within:ring-1
            focus-within:bg-gray-100
            focus-within:text-gray-400
            dark:text-gray-400
            dark:bg-gray-900
            dark:border-gray-700
            dark:focus-within:text-gray-400
            dark:focus-within:border-orange-700
            dark:focus-within:ring-orange-700">
            <svg id="location-icon" class="absolute block w-7 h-7 top-[5px] left-[5px]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 91 91" fill="currentColor">
                <path d="M66.9 41.8c0-11.3-9.1-20.4-20.4-20.4-11.3 0-20.4 9.1-20.4 20.4 0 11.3 20.4 32.4 20.4 32.4s20.4-21.1 20.4-32.4zM37 41.4c0-5.2 4.3-9.5 9.5-9.5s9.5 4.2 9.5 9.5c0 5.2-4.2 9.5-9.5 9.5-5.2 0-9.5-4.3-9.5-9.5z"/>
            </svg>
            <input tabindex="2" :value="loc" @input="searchLocation" type="text" placeholder="Location" class="
                text-[15px]
                text-gray-800
                bg-transparent
                border-0
                w-full
                placeholder-gray-400
                focus:placeholder-gray-300
                focus-within:ring-0
                dark:text-gray-200
                dark:placeholder-gray-500
                dark:focus:placeholder-gray-600">
            <div v-on-clickaway="close" v-if="showLocationSearchResults" class="absolute left-0 shadow bg-white p-4 z-10 rounded-bl-xl rounded-br-xl min-w-full">
                <locations
                    tabindex="3"
                    v-for="(location, index) in locationSearchResults"
                    :key="index"
                    :data="location"
                    v-on:close-location-results="close"
                />
            </div>
            <button type="button" tabindex="5" v-show="loc" @click="clearLocation" class="absolute block p-0 top-[11px] right-2 text-gray-300 hover:text-gray-400 dark:text-gray-500 dark:hover:text-gray-400 transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
        <button tabindex="4" type="submit" class="text-[17px] bg-orange-600 text-white p-2 px-3 rounded-tr-lg rounded-br-lg">
            <svg class="w-6 h-6 inline-block" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
            </svg>
        </button>
    </form>
</template>

<script>
import axios from 'axios';
import {mapGetters, mapState} from "vuex";
import {mixin as clickaway} from 'vue-clickaway';
import Locations from "@/components/search/Locations";

export default {
    name: "SearchBar",
    components: {Locations},
    mixins: [clickaway],
    data() {
        return {
            locationQuery: null,
            locationSearchResults: null,
            showLocationSearchResults: false,
        }
    },
    mounted() {
        this.setSearch()
    },
    computed: {
        ...mapState('search', [
            'loc',
            'locId',
            'search',
        ]),
        ...mapGetters('search', [
            'searchParams'
        ]),
    },
    methods: {
        close() {
            this.showLocationSearchResults = false;
            if (!this.locId && this.locationSearchResults) {
                this.$store.commit('search/SET_SEARCH', {
                    loc: this.locationSearchResults[0]._source.name,
                    locId: this.locationSearchResults[0]._source.id
                })
            }
        },
        clearLocation() {
            this.close()
            this.$store.commit('search/SET_SEARCH', { loc: null, locId: null })
        },
        onSubmit() {
            this.$router.push('/jobs?'+this.searchParams)
        },
        searchQuery(e) {
            this.$store.commit('search/SET_SEARCH', { search: e.target.value })
        },
        setSearch() {
            this.$store.commit('search/SET_SEARCH', this.$route.query)
        },
        async searchLocation(e) {
            if (e.target.value.length === 0) {
                return;
            }
            this.$store.commit('search/SET_SEARCH', { loc: e.target.value });
            await axios.get('/api/geo/locations?q='+encodeURI(this.loc).toLowerCase()).then((res) => {
                this.locationSearchResults = res.data
                this.showLocationSearchResults = true;
            }).catch((e) => {
                this.showLocationSearchResults = false;
                console.log(e);
            });
        },
    }
}
</script>

<style scoped>
    .location {
        border-right-color: transparent;
    }
    .location:focus-within {
        border-right-color: rgba(255, 45, 32, 1);
    }
</style>