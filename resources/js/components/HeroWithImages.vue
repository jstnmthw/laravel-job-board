<template>
    <div class="relative bg-white overflow-hidden">
        <div class="pt-16 pb-80 sm:pt-24 sm:pb-40 lg:pt-40 lg:pb-48">
            <div class="relative max-w-8xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="relative z-10 sm:max-w-4xl">
                    <h2 class="text-4xl font font-extrabold tracking-tight text-gray-900 sm:text-5xl mb-5">
                        <slot name="title"></slot>
                    </h2>
                    <p class="mt-4 text-xl text-gray-500 tracking-tight mb-8">
                        <slot name="description"></slot>
                    </p>
                    <slot name="link"></slot>
                </div>
                <img alt="" src="/images/hero-image-th.jpg" class="absolute -bottom-1/2 right-0 max-w-3xl z-0 mx-auto">
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "HeroWithImages",
}
</script>

<style scoped>
</style>