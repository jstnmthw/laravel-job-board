<template>
    <top-navbar></top-navbar>
    <div v-if="searchFilters">
        <div class="max-w-8xl mx-auto px-2 sm:px-6 lg:px-10 flex space-x-6 my-4">
            <job-filter
                v-for="filter in searchFilters"
                :key="filter.id"
                :data="filter"
            >
            </job-filter>
        </div>
    </div>
    <div v-if="searchResults" class="flex-grow h-full overflow-auto">
        <div class="max-w-8xl mx-auto md:grid md:grid-cols-5 gap-3 md:gap-6 px-10 h-full">
            <div id="job-listings" v-if="searchResults" class="col-span-2 overflow-y-scroll pr-2">
                <!-- Job listings -->
                <job-card
                    v-for="(job, index) in searchResults.data"
                    :job="job"
                    :index="index"
                    @setSelected="setSelect"
                    :class="{ 'border-orange-600 ring-1 ring-orange-600 ring-inset shadow-lg' : index === this.selectedIndex }"
                >
                </job-card>
                <!-- Pagination -->
                <pagination
                    @pageChanged="onPageChange"
                    :to="searchResults.to"
                    :from="searchResults.from"
                    :current-page="searchResults.current_page"
                    :last-page="searchResults.last_page"
                    :per-page="searchResults.per_page"
                    :total="searchResults.total"
                    :links="searchResults.links"
                    :path="searchResults.path"
                    :first-page-url="searchResults.first_page_url"
                    :last-page-url="searchResults.last_page_url"
                    :next-page-url="searchResults.next_page_url"
                    :prev-page-url="searchResults.prev_page_url"
                ></pagination>
            </div>
            <!-- Selected job -->
            <div v-if="selectedResult" class="col-span-3 bg-white dark:bg-gray-800 dark:border-gray-700 px-12 py-10 text-sm leading-relaxed border rounded-tl-lg overflow-y-scroll">
                <div class="flex justify-between pb-5">
                    <div>
                        <span class="block text-lg text-gray-500 mb-2 dark:text-gray-300">{{ selectedResult.company }}</span>
                        <span class="block font-semibold text-2xl mb-3 dark:text-gray-200">{{ selectedResult.title }}</span>
                        <rating-stars :value="selectedResult.company_rating ?? 0" :max-rating="5" :min-rating="0"></rating-stars>
                    </div>
                    <div class="whitespace-nowrap">
                        <button type="button" class="inline-block font-semibold px-3 py-2 border-orange-600 rounded mr-3 border text-orange-600">
                            <svg class="w-6 h-6 inline-block" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg>
                            Save
                        </button>
                        <a href="#" class="inline-block relative font-semibold text-white bg-orange-600 rounded border-b-2 border-orange-700 border px-4 py-2 active:top-[2px] active:border-0">
                            Apply Now
                        </a>
                    </div>
                </div>
                <div class="text-gray-700 dark:text-gray-300">
                    {{ selectedResult.description }}
                </div>
                <div class="border-t dark:border-gray-700 mt-10 pt-10 text-center">
                    <a href="#" class="text-orange-500 dark:text-orange-700 text-md font-semibold hover:underline">Read more about {{ selectedResult.company }}.</a>
                </div>
            </div>
        </div>
    </div>
    <div v-else class="flex-grow h-full overflow-auto text-center m-10">
        <span class="text-9xl font-bold dark:text-gray-700 mb-10 block">;(</span>
        <h1 class="text-2xl dark:text-gray-700 font-bold">Oops, looks like there's no results...</h1>
    </div>
</template>

<script>
import {mapGetters, mapState} from "vuex";

import axios from "axios";
import TopNavbar from "@/components/TopNavbar";
import JobFilter from "@/components/job/Filter";
import JobCard from "@/components/job/Card";
import RatingStars from "@/components/RatingStars";
import Pagination from "@/components/Pagination";

export default {
    name: "JobIndex",
    components: {JobFilter, Pagination, RatingStars, JobCard, TopNavbar},
    data() {
        return {
            searchResults: null,
            searchFilters: null,
            selectedResult: null,
            selectedIndex: 0,
        }
    },
    mounted() {
        document.body.classList.add('bg-gray-50', 'overflow-y-hidden');
        document.getElementById('app').classList.add('flex', 'flex-col', 'h-full');
        this.setSearchFromHttpQuery().then(() => {
            this.getFilters();
            this.preformSearch();
        })
    },
    unmounted() {
        document.body.classList.remove('bg-gray-50', 'overflow-y-hidden');
        document.getElementById('app').classList.remove('flex', 'flex-col', 'h-full');
    },
    computed: {
        ...mapState(['loading']),
        ...mapGetters('search', [
            'searchParams'
        ]),
    },
    watch: {
        '$route': function (val) {
            if (val.path === '/jobs') {
                this.setSearchFromHttpQuery().then(() => {
                    this.getFilters();
                    this.preformSearch();
                })
            }
        },
    },
    methods: {
        async preformSearch() {
            this.$store.commit('ACTIVATE_LOADING');
            await axios.get('api/jobs/search?' + this.searchParams)
            .then((res) => {
                if (res.data.data.length > 0) {
                    this.searchResults = res.data;
                    this.setSelect(0)
                } else {
                    this.searchResults = null;
                }
            })
            this.$store.commit('DEACTIVATE_LOADING');
        },
        async getFilters() {
          await axios.get('api/jobs/filters')
          .then((res) => {
              this.searchFilters = res.data;
          })
        },
        setSearchFromHttpQuery() {
            return new Promise((resolve, reject) => {
                try {
                    this.$store.commit('search/SET_SEARCH', this.$route.query)
                    return resolve();
                } catch (e) {
                    return reject()
                }
            })
        },
        setSelect($jobIndex) {
            this.selectedIndex = $jobIndex;
            this.selectedResult = this.searchResults.data[$jobIndex];
        },
        onPageChange() {
            document.getElementById('job-listings').scrollTop = 0;
        }
    },
}
</script>