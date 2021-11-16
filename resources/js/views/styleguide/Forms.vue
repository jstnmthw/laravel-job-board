<template>
    <styleguide-layout>
        <div class="md:col-span-3 p-3 md:p-6 lg:p-10">
            <div class="pb-10 border-b border-gray-200 mb-10">
                <h1 class="inline-block text-3xl font-bold text-gray-900 tracking-tight">
                    Forms
                </h1>
                <p class="mt-1 text-lg text-gray-500">Base styles for forms</p>
            </div>
            <p class="mb-8">
                Give textual form controls like <span class="px-1 py-0 text-orange-700" style="font-family: Consolas, monospace;">inputs</span>
                and <span class="px-1 py-0 text-orange-700" style="font-family: Consolas, monospace;">textarea</span> an upgrade with custom styles,
                sizing, focus states, and more.
            </p>
            <div class="font-base text-md text-gray-500 leading-7">
                <h2 class="text-sh mb-4 font-bold text-gray-900 group flex whitespace-pre-wrap" id="development">
                    <span>Basic example</span>
                </h2>
                <div class="p-6 bg-gray-100 rounded-t-lg">
                    <div class="md:grid md:grid-cols-2 md:gap-4 mb-4">
                        <input type="text" placeholder="First Name" class="w-full p-2 rounded-lg transition placeholder-gray-300 border-gray-200 border-1 focus:border-orange-400 focus:placeholder-gray-400 focus:border-gray-500 focus:ring focus:ring-orange-100">
                        <input type="text" placeholder="Last Name" class="w-full p-2 rounded-lg transition placeholder-gray-300 border-gray-200 border-1 focus:border-orange-400 focus:placeholder-gray-400 focus:border-gray-500 focus:ring focus:ring-orange-100">
                    </div>
                    <input type="text" placeholder="Email" class="w-full p-2 mb-4 rounded-lg transition placeholder-gray-300 border-gray-200 border-1 focus:border-orange-400 focus:placeholder-gray-400 focus:border-gray-500 focus:ring focus:ring-orange-100">
                    <textarea class="w-full p-2 rounded-lg transition resize-none placeholder-gray-300 border-gray-200 border-1 focus:border-orange-400 focus:placeholder-gray-400 focus:border-gray-500 focus:ring focus:ring-orange-100"></textarea>
                </div>
                <highlightjs
                    class="p-6 bg-[#2b303b] text-[12px] leading-5 rounded-b-lg mb-10 overflow-x-scroll"
                    language="js"
                    :code="basicExample"
                />
            </div>
        </div>
        <div class="md:col-span-1 z-10 sticky h-[calc(100vh-82px)] p-3 md:p-6 lg:p-10 top-[82px] overflow-auto">
            <ul class="overflow-x-hidden text-gray-500 font-medium">
                <li>
                    <h5 class="mb-3 lg:mb-3 uppercase tracking-wide font-semibold text-sm lg:text-xs text-gray-900">
                        On this page
                    </h5>
                    <ul>
                        <li>
                            <a class="block transform transition-colors duration-200 py-2 hover:text-gray-900" href="#">
                                <span class="rounded-md absolute inset-0 bg-cyan-50 opacity-0"></span>
                                <span class="relative">Basic example</span>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </styleguide-layout>
</template>

<script>
import StyleguideLayout from "@/components/styleguide/Layout";
import hljs from '~/highlight.js/lib/common';
import hljsVuePlugin from '~/@highlightjs/vue-plugin';
export default {
    name: "Forms",
    data() {
      return {
          basicExample: '<div class="md:grid md:grid-cols-2 md:gap-4 mb-4">\n' +
              '  <input type="text" placeholder="First Name" class="w-full p-2 rounded-lg transition placeholder-gray-300 border-gray-200 border-2 focus:border-orange-400 focus:placeholder-gray-400 focus:border-gray-500 focus:ring-4 focus:ring-orange-100">\n' +
              '  <input type="text" placeholder="Last Name" class="w-full p-2 rounded-lg transition placeholder-gray-300 border-gray-200 border-2 focus:border-orange-400 focus:placeholder-gray-400 focus:border-gray-500 focus:ring-4 focus:ring-orange-100">\n' +
              '</div>\n' +
              '<input type="text" placeholder="Email" class="w-full p-2 mb-4 rounded-lg transition placeholder-gray-300 border-gray-200 border-2 focus:border-orange-400 focus:placeholder-gray-400 focus:border-gray-500 focus:ring-4 focus:ring-orange-100">\n' +
              '<textarea class="w-full p-2 rounded-lg transition placeholder-gray-300 border-gray-200 border-2 focus:border-orange-400 focus:placeholder-gray-400 focus:border-gray-500 focus:ring-4 focus:ring-orange-100">\n' +
              '</textarea>',
      }
    },
    components: {
        StyleguideLayout,
        highlightjs: hljsVuePlugin.component
    }
}
</script>

<style>
@import '/css/highlightjs/ocean.min.css';
</style>