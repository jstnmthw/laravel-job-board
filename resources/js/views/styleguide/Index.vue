<template>
    <styleguide-layout>
        <div class="md:col-span-3 p-3 md:p-6 lg:p-10">
            <div class="pb-10 border-b border-gray-200 mb-10">
                <h1 class="inline-block text-3xl font-bold text-gray-900 tracking-tight">
                    Styleguide for Job Board v.1.0
                </h1>
                <p class="mt-1 text-lg text-gray-500">Handled pan fishes taller Boromir brewing</p>
            </div>
            <div class="font-base text-md text-gray-500 leading-7">
                <p class="mb-10">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce lacus ligula, sagittis eu tortor ut, molestie dapibus risus. Curabitur sodales sem lacus, in condimentum ligula varius eu. Quisque scelerisque nisl sed ante pellentesque feugiat. Duis at ex molestie, semper risus consectetur, gravida odio. Nam ut purus ligula. Nam dictum, elit eu ultrices pellentesque, erat turpis varius odio, at imperdiet mauris ex nec nibh. Donec varius venenatis purus, et ultrices nisl rhoncus egestas. Duis et ligula nisl. Sed sit amet leo consectetur, egestas leo non, tempor ante. Proin suscipit quam et egestas mattis. Sed sed fringilla sapien. Pellentesque lacinia lectus odio, sed condimentum ligula fringilla eget.</p>
                <h2 class="text-sh mb-3 font-bold text-gray-900 group flex whitespace-pre-wrap" id="development">
                    <a href="#development" class="absolute after:hash opacity-0 group-hover:opacity-100" style="margin-left: -1em; padding-right: 0.5em; box-shadow: none; color: rgb(161, 161, 170);" aria-label="Anchor"></a>
                    <span>Development</span>
                </h2>
                <p class="mb-5">Running hot reload module while developing reloads the files changed and keeps state intact.</p>
                <highlightjs
                    class="p-6 bg-[#282c34] rounded-lg mb-10"
                    language="js"
                    code="npm run hot"
                />
                <h2 class="text-sh mb-3 font-bold text-gray-900 group flex whitespace-pre-wrap" id="production">
                    <a href="#production" class="absolute after:hash opacity-0 group-hover:opacity-100" style="margin-left: -1em; padding-right: 0.5em; box-shadow: none; color: rgb(161, 161, 170);" aria-label="Anchor"></a>
                    <span>Production</span>
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
    </styleguide-layout>
</template>

<script>
import TopNavbar from '@/components/TopNavbar';
import hljs from '~/highlight.js/lib/common';
import hljsVuePlugin from '~/@highlightjs/vue-plugin';
import StyleguideLayout from "@/components/styleguide/Layout";
export default {
    name: "StyleguideIndex",
    components: {
        StyleguideLayout,
        TopNavbar: TopNavbar,
        highlightjs: hljsVuePlugin.component
    },
}
</script>

<style>
    @import '/css/highlightjs/atom-one-dark.css';
</style>