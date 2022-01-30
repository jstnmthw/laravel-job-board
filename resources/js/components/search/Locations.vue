<template>
        <button @click="setLocation" class="block w-full text-left whitespace-nowrap text-gray-800" v-html="data.highlight.name[0]"></button>
</template>

<script>
export default {
    name: "Locations",
    props: ['data'],
    methods: {
        setLocation() {
            this.$store.commit('search/SET_SEARCH', { loc: this.loc, locId: this.locId })
            this.$emit('close-location-results');
        }
    },
    computed: {
        loc() {
            return this.data._source.name
        },
        locId() {
            return this.data._source.id
        }
    }
}
</script>