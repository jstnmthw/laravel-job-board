<template>
    <div v-on-clickaway="clickedAway" class="relative">
        <button @click="dropDownClosed = !dropDownClosed" type="button" class="min-w-[200px] block w-full py-2 px-4 border border-gray-200 hover:border-gray-300 bg-white dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 dark:hover:border-gray-500 transition-colors rounded-md flex justify-between">
            {{ data[selectedOption] }}
            <svg :class="{ 'rotate-180' : !dropDownClosed }" class="w-5 h-5 transition top-0.5 relative" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
            </svg>
        </button>
        <ul :class="{ hidden : dropDownClosed }" class="bg-white p-4 rounded dark:bg-gray-800 border border-gray-300 dark:border-gray-600 absolute left-0 top-full z-10 shadow w-full">
            <li v-for="(filter, index) in data" :key="index" :value="filter.value">
                <button @click="setSelected(index)" type="button" :class="{ 'text-gray-500' : selectedOption === index }" class="flex justify-between w-full text-left p-1 mb-1 dark:text-gray-400 dark:hover:text-gray-200 transition-colors">
                    {{ filter }}
                    <svg :class="{ 'hidden' : selectedOption !== index }" class="relative text-green-500 w-5 h-5 top-0.5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                    </svg>
                </button>
            </li>
        </ul>
    </div>
</template>

<script>
import { mixin as clickaway } from 'vue-clickaway';

export default {
    name: "Filter",
    props: ['data'],
    mixins: [ clickaway ],
    data() {
        return {
            selectedOption: 0,
            dropDownClosed: true,
        }
    },
    methods: {
        clickedAway: function() {
            this.dropDownClosed = true;
        },
        setSelected(index) {
            this.selectedOption = index;
            this.dropDownClosed = true;
        }
    },
    computed: {
        active() {
            this.selectedOption == data
        }
    }
}
</script>