<template>
    <div @click="setSelected" class="relative p-5 mb-4 border dark:border-gray-700 bg-white dark:bg-gray-800 rounded-lg transition-shadow hover:shadow-lg">
        <button class="absolute right-5 top-5 text-gray-300 hover:text-gray-400 transition">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg>
        </button>
        <div class="w-12 h-12 bg-gray-100 dark:bg-gray-600 rounded-full float-left"></div>
        <div class="ml-16">
            <span class="text-gray-400 text-sm">
                {{ job.company }}
            </span>
            <h2 class="text-lg mb-2 dark:text-gray-200 whitespace-nowrap font-semibold overflow-ellipsis overflow-hidden pr-16">
                {{ job.title }}
            </h2>
            <div class="flex justify-between">
                <p class="text-sm text-gray-400 dark:text-gray-400">
                    <svg class="w-5 h-5 inline-block dark:text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                    {{  job.city }}
                    <svg class="w-5 h-5 inline-block ml-3 dark:text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                    {{ salary_from_formatted }}
                </p>
                <p class="text-sm-alt text-gray-400 dark:text-gray-500">
                    <span class="inline-block px-1 text-[10px] rounded bg-orange-50 text-orange-500 dark:bg-gray-900 dark:text-orange-700">
                        New
                    </span>
                    {{  posted_date }}
                </p>
            </div>
        </div>
    </div>
</template>

<script>
import numeral from 'numeral'
import formatDistanceStrict from 'date-fns/formatDistance'
export default {
    name: "Card",
    props: ['job', 'index'],
    computed: {
        salary_from_formatted() {
            return numeral(this.job.salary_from).format('0a')
        },
        posted_date() {
            return formatDistanceStrict(
                new Date(this.job.created_at),
                Date.now(),
                { addSuffix: true }
            )
        }
    },
    methods: {
        setSelected() {
            this.$emit('setSelected', this.index);
        }
    }
}
</script>