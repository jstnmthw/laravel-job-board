<template>
    <top-navbar></top-navbar>
    <div>
        <div class="max-w-8xl mx-auto py-5">
            <div class="md:grid md:grid-cols-12 gap-3 md:gap-6 px-10">
                <select id="" class="text-sm col-span-2 block w-full p-2 border border-gray-300 bg-white dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 rounded-md shadow-sm focus:outline-none focus:ring-orange-500 focus:border-orange-500">
                    <option value="1" selected>All Job Types</option>
                </select>
                <select id="" class="text-sm col-span-2 block w-full p-2 border border-gray-300 bg-white dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 rounded-md shadow-sm focus:outline-none focus:ring-orange-500 focus:border-orange-500">
                    <option value="1" selected>Posted Any Time</option>
                </select>
                <select id="" class="text-sm col-span-2 block w-full p-2 border border-gray-300 bg-white dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 rounded-md shadow-sm focus:outline-none focus:ring-orange-500 focus:border-orange-500">
                    <option value="1" selected>Salary Range</option>
                </select>
                <select id="" class="text-sm col-span-2 block w-full p-2 border border-gray-300 bg-white dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 rounded-md shadow-sm focus:outline-none focus:ring-orange-500 focus:border-orange-500">
                    <option value="1" selected>25 miles</option>
                </select>
                <select id="" class="text-sm col-span-1 block w-full p-2 border border-gray-300 bg-white dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 rounded-md shadow-sm focus:outline-none focus:ring-orange-500 focus:border-orange-500">
                    <option value="1" selected>More</option>
                </select>
            </div>
        </div>
    </div>
    <div class="flex-grow h-full overflow-auto">
        <div class="max-w-8xl mx-auto md:grid md:grid-cols-5 gap-3 md:gap-6 px-10 h-full">
            <div class="col-span-2 overflow-y-scroll pr-2" v-if="searchResults">
                <job-card
                    v-for="job in searchResults.data"
                    :job="job"
                    :index="job.index"
                >
                </job-card>
            </div>
            <div class="col-span-3 bg-white dark:bg-gray-800 dark:border-gray-700 px-12 py-10 text-sm leading-relaxed border rounded-tl-lg overflow-y-scroll">
                <div class="flex justify-between pb-5">
                    <div>
                        <span class="block text-lg dark:text-gray-400">The Tech Co.</span>
                        <span class="block font-semibold text-xl mb-3 dark:text-gray-200">Partnership Manager</span>
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
                    <p class="mb-6">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam sed ex dolor. Aliquam sed maximus enim, sed fringilla lectus. Nulla est augue, imperdiet ac viverra eu, pulvinar id diam. Ut lacinia mi ac dolor vehicula varius. Integer rutrum non dui at blandit. Etiam facilisis orci et libero viverra tincidunt. Duis porttitor purus massa.</p>
                    <p class="mb-6">Donec eu tellus condimentum, mattis quam eu, pellentesque lacus. Curabitur sagittis sodales hendrerit. Donec pulvinar luctus aliquam. Nunc convallis, nunc quis ornare mattis, sem nulla tristique ex, ac tincidunt felis enim nec elit. Interdum et malesuada fames ac ante ipsum primis in faucibus. Sed varius, purus eu cursus pulvinar, nisl neque maximus orci, posuere bibendum odio magna eu sapien. Donec convallis aliquet pretium. Quisque eget orci velit. Nam elementum lectus sem, ac accumsan nunc tincidunt vel. Interdum et malesuada fames ac ante ipsum primis in faucibus.</p>
                    <strong class="font-semibold pb-2 block text-gray-900 dark:text-gray-100">Requirements:</strong>
                    <ul class="list-disc list-inside mb-6">
                        <li>Donec eu tellus condimentum</li>
                        <li>Pellentesque lacus</li>
                        <li>Curabitur sagittis sodales hendrerit.</li>
                    </ul>
                    <strong class="font-semibold pb-2 block text-gray-900 dark:text-gray-100">Skills:</strong>
                    <ul class="list-disc list-inside mb-6">
                        <li>Donec eu tellus condimentum</li>
                        <li>Pellentesque lacus</li>
                        <li>Curabitur sagittis sodales hendrerit.</li>
                    </ul>
                    <p>Sed scelerisque non velit a malesuada. Morbi id ligula eget neque bibendum sodales id nec mauris. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Cras tincidunt urna eu sapien placerat, non luctus diam dapibus. Aenean molestie purus quam, vitae viverra ligula sagittis suscipit. Proin imperdiet scelerisque ornare. Quisque sapien diam, ultrices vitae condimentum sit amet, volutpat at arcu.</p>
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
import {mapGetters, mapState} from "vuex";
export default {
    name: "Job Index",
    components: {JobCard, TopNavbar},
    data() {
        return {
            searchResults: null,
        }
    },
    computed: {
        ...mapGetters('search', [
            'searchParams'
        ])
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
        }
    },
}
</script>