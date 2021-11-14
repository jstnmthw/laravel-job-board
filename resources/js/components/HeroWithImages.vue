<template>
    <div class="relative overflow-hidden">
        <div class="pt-16 pb-80 sm:pt-24 sm:pb-40 lg:pt-40 lg:pb-48">
            <div class="relative max-w-8xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="relative z-10 sm:max-w-4xl">
                    <h2 class="text-4xl font font-extrabold tracking-tight text-gray-900 dark:text-gray-500 sm:text-5xl mb-5">
                        <slot name="title"></slot>
                    </h2>
                    <p class="mt-4 text-xl text-gray-500 tracking-tight mb-8">
                        <slot name="description"></slot>
                    </p>
                    <slot name="link"></slot>
                </div>
                <slot name="image"></slot>
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