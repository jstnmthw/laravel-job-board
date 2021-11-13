<template>
        <button @click="setLocation" class="block w-full text-left whitespace-nowrap text-gray-800" v-html="data.highlight.name[0]"></button>
</template>

<script>
export default {
    name: "Locations",
    props: ['data'],
    methods: {
        setLocation() {
            this.$store.commit('search/SET_SEARCH', { location: this.data._source })
            this.$emit('close-location-results');
        }
    }
}
</script>

<style scoped>

</style>