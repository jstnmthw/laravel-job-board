<template>
    <top-navbar></top-navbar>
    <div class="max-w-8xl m-auto px-2 sm:px-6 lg:px-8">
        Hello {{ user.name }}
    </div>
</template>

<script>
import { mapGetters } from 'vuex';
import TopNavbar from '@/components/TopNavbar'

export default {
    name: 'Index',
    components: { TopNavbar },
    computed: {
        ...mapGetters(['user'])
    }
}
</script>

<style scoped>
</style>