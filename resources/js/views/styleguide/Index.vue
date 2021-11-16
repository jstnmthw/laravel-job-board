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
                                        <a class="px-3 py-2 transition-colors duration-200 relative block hover:text-gray-900 text-gray-500" href="#">
                                            <span class="rounded-md absolute inset-0 bg-cyan-50 opacity-0"></span>
                                            <span class="relative">Forms</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
            </aside>
                <main class="min-w-0 w-full flex-auto lg:static lg:max-h-full lg:overflow-visible h-full md:grid md:grid-cols-4 gap-0">
                    <div class="md:col-span-3 p-3 md:p-6 lg:p-10">
                        <div class="pb-10 border-b border-gray-200 mb-10">
                            <h1 class="inline-block text-3xl font-bold text-gray-900 tracking-tight">
                                Styleguide for Job Board v.1.0
                            </h1>
                            <p class="mt-1 text-lg text-gray-500">Handled pan fishes taller Boromir brewing</p>
                        </div>
                        <div class="font-base text-md text-gray-500 leading-7">
                            <p class="mb-5">Westward maps swearing day's stroke parapet upset Captain weapons! Like prove handled pan fishes taller Boromir brewing lifetime. Let the Ring-bearer decide.</p>
                            <h2 class="text-sh mb-3 font-bold text-gray-900 group flex whitespace-pre-wrap" id="relative-line-heights">
                                <a href="#relative-line-heights" class="absolute after:hash opacity-0 group-hover:opacity-100" style="margin-left: -1em; padding-right: 0.5em; box-shadow: none; color: rgb(161, 161, 170);" aria-label="Anchor"></a>
                                <span>Development</span>
                            </h2>
                            <p class="mb-5">Running hot reload module while developing reloads the files changed and keeps state intact.</p>
                            <highlightjs
                                class="p-6 bg-[#282c34] rounded-lg"
                                language="js"
                                code="npm run hot"
                            />
                        </div>
                    </div>
                    <div class="md:col-span-1 sticky h-[calc(100vh-82px)] p-3 md:p-6 lg:p-10 top-[82px] overflow-auto">
                        <ul class="overflow-x-hidden text-gray-500 font-medium">
                            <li>
                                <h5 class="mb-3 lg:mb-3 uppercase tracking-wide font-semibold text-sm lg:text-xs text-gray-900">
                                    On this page
                                </h5>
                                <ul>
                                    <li>
                                        <a class="block transform transition-colors duration-200 py-2 hover:text-gray-900" href="#">
                                            <span class="rounded-md absolute inset-0 bg-cyan-50 opacity-0"></span>
                                            <span class="relative">Introduction</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="block transform transition-colors duration-200 py-2 hover:text-gray-900" href="#">
                                            <span class="rounded-md absolute inset-0 bg-cyan-50 opacity-0"></span>
                                            <span class="relative">Development</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="block transform transition-colors duration-200 py-2 hover:text-gray-900" href="#">
                                            <span class="rounded-md absolute inset-0 bg-cyan-50 opacity-0"></span>
                                            <span class="relative">Production</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </main>
            </div>
        </div>
</template>

<script>
import TopNavbar from '@/components/TopNavbar';
import hljs from '~/highlight.js/lib/common';
import hljsVuePlugin from '~/@highlightjs/vue-plugin';
export default {
    name: "Styleguide Index",
    components: {
        TopNavbar: TopNavbar,
        highlightjs: hljsVuePlugin.component
    },
}
</script>

<style>
    @import '/css/highlightjs/atom-one-dark.css';
</style>