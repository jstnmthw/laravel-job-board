<template>
    <top-navbar />
<!--    <div class="h-full max-w-8xl mx-auto py-5">-->
        <div class="h-full max-w-8xl mx-auto md:grid md:grid-cols-12 gap-3">
            <div class="md:col-span-3 h-full bg-green-100">
                First Column
            </div>
            <div class="md:col-span-6 h-full bg-red-100">
                Second Column
            </div>
            <div class="md:col-span-3 h-full bg-blue-100">
                Third Column
            </div>
        </div>
<!--    </div>-->
</template>

<script>
import TopNavbar from "@/components/TopNavbar";
export default {
    name: "Styleguide Index",
    components: {TopNavbar},
}
</script>