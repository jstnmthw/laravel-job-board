<template>
    <top-navbar />
    <hero-with-images>
        <template v-slot:title>
            Browse jobs in <span class="text-orange-600 underline cursor-pointer">Bangkok</span>
            <svg class="w-8 h-8 inline-block ml-2 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
        </template>
        <template v-slot:description>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit.<br> Maecenas at nisi lobortis, consequat purus eget
        </template>
        <template v-slot:link>
            <a href="#" class="inline-block text-center rounded-full hover:shadow-xl transition-all bg-orange-600 border border-transparent rounded-md py-3 px-6 font-bold text-white hover:bg-orange-700">
                Search jobs
            </a>
        </template>
        <template v-slot:image>
            <img alt="" src="/images/hero-image-th.jpg" class="absolute -bottom-1/2 right-0 max-w-3xl z-0 mx-auto">
        </template>
    </hero-with-images>
</template>

<script>
import TopNavbar from "@/components/TopNavbar";
import HeroWithImages from "@/components/HeroWithImages";
export default {
    name: "Homepage",
    components: {HeroWithImages, TopNavbar},
}
</script>

<style scoped>

</style>