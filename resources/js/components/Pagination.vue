<template>
    <!--
        Pagination prop data matches Laravel's LengthAwarePaginator API
        https://laravel.com/api/master/Illuminate/Pagination/LengthAwarePaginator.html
    -->
    <div>
        <div class="flex justify-between">
            <ul class="mx-auto my-5 flex justify-between text-xl">
                <li>
                    <a :class="{ 'pointer-events-none bg-gray-200' : currentPage < 2 }" class="inline-block rounded-lg text-white py-2 px-2 bg-orange-600 mr-5" href="javascript:void(0)" aria-label="Previous" v-on:click.prevent="changePage(currentPage - 1)">
                        <span class="sr-only">Prev</span>
                        <span aria-hidden="true">
                            <svg class="inline-block w-7 h-7" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path
                                fill-rule="evenodd"
                                d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                clip-rule="evenodd"
                            ></path>
                          </svg>
                        </span>
                    </a>
                </li>
                <li v-if="large && (currentPage > 3)">
                    <a class="inline-block rounded-lg text-gray-500 py-2 px-2" href="javascript:void(0)" aria-label="First Page" v-on:click.prevent="changePage(1)">
                        1
                    </a>
                </li>
                <li v-if="large && (currentPage > 3)">
                    <a class="inline-block rounded-lg text-gray-500 py-2 px-2" href="javascript:void(0)" aria-label="..." v-on:click.prevent="">
                        &hellip;
                    </a>
                </li>
                <li v-for="page in pagesNumber" :key="page.index">
                    <a :class="{ 'bg-white dark:bg-gray-900 text-orange-600 border-orange-600 border-2' : page === currentPage, 'text-gray-500 hover:bg-gray-200 hover:text-black': page !== currentPage }" class="inline-block rounded-lg py-2 px-4 mx-1" href="javascript:void(0)" v-on:click.prevent="changePage(page)">
                        {{ page }}
                    </a>
                </li>
                <li v-if="large && (currentPage < lastPage && lastPage >= 5)">
                    <a class="inline-block rounded-lg text-gray-500 py-2 px-2" href="javascript:void(0)" aria-label="Last Page" @click.prevent="">
                        &hellip;
                    </a>
                </li>
                <li v-if="large && (currentPage < lastPage && lastPage >= 5)">
                    <a class="inline-block rounded-lg text-gray-500 py-2 px-2" :class="{ active: currentPage <= lastPage }" href="javascript:void(0)" aria-label="Last Page" v-on:click.prevent="changePage(lastPage)">
                        {{ lastPage }}
                    </a>
                </li>
                <li>
                    <button :class="{ 'pointer-events-none bg-gray-200' : currentPage >= lastPage }" class="inline-block rounded-lg text-white py-2 px-2 bg-orange-600 ml-5" aria-label="Next" v-on:click.prevent="changePage(currentPage + 1)">
                        <span class="sr-only">Next</span>
                        <span aria-hidden="true">
                            <svg class="inline-block w-7 h-7" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
                            </svg>
                        </span>
                    </button>
                </li>
            </ul>
        </div>
        <p class="text-center text-[14px] mb-4 text-gray-400">Page {{ currentPage }} of {{ lastPage }}</p>
    </div>
</template>

<script>
export default {
    name: 'Pagination',
    props: [
        'to',
        'from',
        'path',
        'total',
        'links',
        'perPage',
        'lastPage',
        'currentPage',
        'nextPageUrl',
        'lastPageUrl',
        'prevPageUrl',
        'firstPageUrl',
        'large'
    ],
    computed: {
        pagesNumber() {
            let totalPage = this.lastPage;
            let startPage = this.currentPage < 3 ? 1 : this.currentPage - 2;
            let endPage = 4 + startPage;
            endPage = totalPage < endPage ? totalPage : endPage;
            let diff = startPage - endPage + 4;
            startPage -= startPage - diff > 0 ? diff : 0;
            let pagesArray = [];
            for (let i = startPage; i <= endPage; i++) {
                pagesArray.push(i);
            }
            return pagesArray;
        }
    },
    methods: {
        changePage(page) {
            if (!this.loading && this.currentPage !== page) {
                this.$router.push({
                    query: Object.assign({}, this.$route.query, { page: page })
                })
                console.log('Emitting pageChanged...')
                this.$emit('pageChanged');
            }
        },
    }
}
</script>