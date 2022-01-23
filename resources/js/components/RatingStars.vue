<template>
    <div class="text-yellow-500">
        <span class="sr-only">Reviews:</span>
        <svg v-for="idx in completeRange" class="inline-block w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
            <path d="M12 18.26l-7.053 3.948 1.575-7.928L.587 8.792l8.027-.952L12 .5l3.386 7.34 8.027.952-5.935 5.488 1.575 7.928z"></path>
        </svg>
        <svg v-for="idx in halfRange" class="inline-block w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 180 180" fill="currentColor">
            <path d="m90 136.9-52.9 29.6L48.9 107 4.4 65.9l60.2-7.1L90 3.8"/>
            <path d="m90 3.8 25.4 55 60.2 7.1-44.5 41.2 11.8 59.5L90 136.9m0-17.1 31.9 17.8-7.1-35.8L141.5 77l-36.2-4.3L90 39.6"/>
        </svg>
        <svg v-for="idx in totalRange" class="inline-block w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
            <path d="M12 18.26l-7.053 3.948 1.575-7.928L.587 8.792l8.027-.952L12 .5l3.386 7.34 8.027.952-5.935 5.488 1.575 7.928L12 18.26zm0-2.292l4.247 2.377-.949-4.773 3.573-3.305-4.833-.573L12 5.275l-2.038 4.42-4.833.572 3.573 3.305-.949 4.773L12 15.968z"></path>
        </svg>
    </div>
</template>

<script>
export default {
    name: "RatingStars",
    props: [
        'value',
        'maxRating',
        'minRating'
    ],
    data() {
        return {
            // rang: Math.floor(this.value),
            completeRange: [...new Array(Math.floor(this.value))],
            halfRange: this.value % 1 === 0 ? null : [...new Array(1)],
            totalRange: [...new Array(this.maxRating - Math.ceil(this.value))]
        }
    },
    created: function () {
        if (this.value > this.maxRating) {
            throw new Error('Rating Stars: total lower than value')
        }
    }
}
</script>