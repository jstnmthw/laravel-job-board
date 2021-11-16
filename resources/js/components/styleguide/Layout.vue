<template>
    <top-navbar :sticky="true" />
    <div class="h-full max-w-8xl mx-auto px-2 sm:px-6 lg:px-8">
        <div class="lg:flex">
            <aside class="fixed inset-0 flex-none h-full bg-black bg-opacity-25 w-full lg:bg-white lg:static lg:h-auto lg:overflow-y-visible lg:pt-0 lg:w-60 xl:w-72 lg:block hidden">
                <div class="sticky h-[calc(100vh-82px)] top-[82px]">
                    <div class="hidden lg:block h-12 pointer-events-none absolute inset-x-0 z-10 bg-gradient-to-b from-white"></div>
                    <nav class="px-1 pt-6 overflow-y-auto font-medium text-base sm:px-3 xl:px-5 lg:text-sm pb-10 lg:pt-10 lg:pb-14 h-[calc(100vh-82px)]">
                        <ul>
                            <li>
                                <h5 class="px-3 mb-3 lg:mb-3 uppercase tracking-wide font-semibold text-sm lg:text-xs text-gray-900">
                                    Getting started
                                </h5>
                                <ul>
                                    <li>
                                        <a class="px-3 py-2 transition-colors duration-200 relative block hover:text-gray-900 text-gray-500" href="#">
                                            <span class="rounded-md absolute inset-0 bg-cyan-50 opacity-0"></span>
                                            <span class="relative">Installation</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="mt-6">
                                <h5 class="px-3 mb-3 lg:mb-3 uppercase tracking-wide font-semibold text-sm lg:text-xs text-gray-900">
                                    Layout
                                </h5>
                                <ul>
                                    <li>
                                        <router-link class="px-3 py-2 transition-colors duration-200 relative block hover:text-gray-900 text-gray-500" to="/docs/style-guide/forms">
                                            <span class="rounded-md absolute inset-0 bg-cyan-50 opacity-0"></span>
                                            <span class="relative">Forms</span>
                                        </router-link>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
            </aside>
            <main class="min-w-0 w-full flex-auto lg:static lg:max-h-full lg:overflow-visible h-full md:grid md:grid-cols-4 gap-0">
                <slot></slot>
            </main>
        </div>
    </div>
</template>

<script>
import TopNavbar from '@/components/TopNavbar';
export default {
    name: "StyleguideLayout",
    components: {
        TopNavbar: TopNavbar,
    },
}
</script>