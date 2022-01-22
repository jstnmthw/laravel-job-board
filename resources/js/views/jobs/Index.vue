<template>
    <top-navbar></top-navbar>
    <div>
        <div class="max-w-8xl mx-auto py-5">
            <div class="md:grid md:grid-cols-12 gap-3 md:gap-6 px-10">
                <select id="job-type" class="text-sm col-span-2 block w-full p-2 border border-gray-300 bg-white dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 rounded-md shadow-sm focus:outline-none focus:ring-orange-500 focus:border-orange-500">
                    <option value="1" selected>All Job Types</option>
                </select>
                <select id="date-range" class="text-sm col-span-2 block w-full p-2 border border-gray-300 bg-white dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 rounded-md shadow-sm focus:outline-none focus:ring-orange-500 focus:border-orange-500">
                    <option value="1" selected>Posted Any Time</option>
                </select>
                <select id="salary-range" class="text-sm col-span-2 block w-full p-2 border border-gray-300 bg-white dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 rounded-md shadow-sm focus:outline-none focus:ring-orange-500 focus:border-orange-500">
                    <option value="1" selected>Salary Range</option>
                </select>
                <select id="radius" class="text-sm col-span-2 block w-full p-2 border border-gray-300 bg-white dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 rounded-md shadow-sm focus:outline-none focus:ring-orange-500 focus:border-orange-500">
                    <option value="1" selected>25 miles</option>
                </select>
                <select id="extra" class="text-sm col-span-1 block w-full p-2 border border-gray-300 bg-white dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 rounded-md shadow-sm focus:outline-none focus:ring-orange-500 focus:border-orange-500">
                    <option value="1" selected>More</option>
                </select>
            </div>
        </div>
    </div>
    <div class="flex-grow h-full overflow-auto">
        <div class="max-w-8xl mx-auto md:grid md:grid-cols-5 gap-3 md:gap-6 px-10 h-full">
            <div class="col-span-2 overflow-y-scroll pr-2" v-if="searchResults">
                <!-- Job listings -->
                <job-card
                    v-for="(job, index) in searchResults.data"
                    :job="job"
                    :index="index"
                    @setSelected="onSetSelected"
                    :class="{ 'border-orange-600 ring-1 ring-orange-600 ring-inset shadow-lg' : index === this.selectedIndex }"
                >
                </job-card>
            </div>
            <div class="col-span-3 bg-white dark:bg-gray-800 dark:border-gray-700 px-12 py-10 text-sm leading-relaxed border rounded-tl-lg overflow-y-scroll">
                <!-- Selected job -->
                <div class="flex justify-between pb-5">
                    <div>
                        <span class="block text-lg text-gray-500 mb-2 dark:text-gray-300">{{ selectedResult.company }}</span>
                        <span class="block font-semibold text-2xl mb-3 dark:text-gray-200">{{ selectedResult.title }}</span>
                        <div class="text-yellow-500">
                            <span class="sr-only">Reviews:</span>
                            <svg class="inline-block w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                <g>
                                    <path fill="none" d="M0 0h24v24H0z"></path>
                                    <path d="M12 18.26l-7.053 3.948 1.575-7.928L.587 8.792l8.027-.952L12 .5l3.386 7.34 8.027.952-5.935 5.488 1.575 7.928z"></path>
                                </g>
                            </svg>
                            <svg class="inline-block w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                <g>
                                    <path fill="none" d="M0 0h24v24H0z"></path>
                                    <path d="M12 18.26l-7.053 3.948 1.575-7.928L.587 8.792l8.027-.952L12 .5l3.386 7.34 8.027.952-5.935 5.488 1.575 7.928z"></path>
                                </g>
                            </svg>
                            <svg class="inline-block w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                <g>
                                    <path fill="none" d="M0 0h24v24H0z"></path>
                                    <path d="M12 18.26l-7.053 3.948 1.575-7.928L.587 8.792l8.027-.952L12 .5l3.386 7.34 8.027.952-5.935 5.488 1.575 7.928z"></path>
                                </g>
                            </svg>
                            <svg class="inline-block w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                <g>
                                    <path fill="none" d="M0 0h24v24H0z"></path>
                                    <path d="M12 18.26l-7.053 3.948 1.575-7.928L.587 8.792l8.027-.952L12 .5l3.386 7.34 8.027.952-5.935 5.488 1.575 7.928L12 18.26zm0-2.292l4.247 2.377-.949-4.773 3.573-3.305-4.833-.573L12 5.275l-2.038 4.42-4.833.572 3.573 3.305-.949 4.773L12 15.968z"></path>
                                </g>
                            </svg>
                        </div>
                    </div>
                    <div>
                        <button type="button" class="font-semibold px-3 py-2 border-orange-600 rounded mr-3 border text-orange-600">
                            <svg class="w-6 h-6 inline-block" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg>
                            Save
                        </button>
                        <a href="#" class="relative font-semibold text-white bg-orange-600 rounded border-b-2 border-orange-700 px-4 py-3 active:top-[2px] active:border-0">
                            Apply Now
                        </a>
                    </div>
                </div>
                <div class="text-gray-700 dark:text-gray-300">
                    {{ selectedResult.description }}
                </div>
                <div class="border-t dark:border-gray-700 mt-10 pt-10 text-center">
                    <a href="#" class="text-orange-500 dark:text-orange-700 text-md font-semibold hover:underline">Read more about The Tech Co.</a>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from "axios";
import TopNavbar from "@/components/TopNavbar";
import JobCard from "@/components/job/Card";
import {mapGetters} from "vuex";
export default {
    name: "Job Index",
    components: {JobCard, TopNavbar},
    data() {
        return {
            searchResults: null,
            selectedResult: Object,
            selectedIndex: 0,
        }
    },
    computed: {
        ...mapGetters('search', [
            'searchParams'
        ]),
    },
    mounted() {
        document.body.classList.add('bg-gray-50', 'overflow-y-hidden');
        document.getElementById('app').classList.add('flex', 'flex-col', 'h-full');

        this.setSearchFromHttpQuery().then(() => {
            this.preformSearch();
        })
    },
    unmounted() {
        document.body.classList.remove('bg-gray-50', 'overflow-y-hidden');
        document.getElementById('app').classList.remove('flex', 'flex-col', 'h-full');
    },
    watch: {
        '$route': function (val) {
            if (val.path === '/jobs') {
                this.setSearchFromHttpQuery().then(() => {
                    this.preformSearch();
                })
            }
        },
    },
    methods: {
        async preformSearch() {
            await axios.get('api/jobs/search/' + this.searchParams)
            .then((res) => {
                this.searchResults = res.data;
                this.onSetSelected(0)
            })
        },
        setSearchFromHttpQuery() {
            return new Promise((resolve, reject) => {
                try {
                    const { loc, locId, search } = this.$route.query
                    this.$store.commit('search/SET_LOCATION', {
                        name: loc ?? null,
                        id: locId ?? null
                    })
                    this.$store.commit('search/SET_SEARCH', search ?? null)
                    return resolve();
                } catch (e) {
                    return reject()
                }
            })
        },
        onSetSelected($jobIndex) {
            this.selectedIndex = $jobIndex;
            this.selectedResult = this.searchResults.data[$jobIndex];
        }
    },
}
</script>