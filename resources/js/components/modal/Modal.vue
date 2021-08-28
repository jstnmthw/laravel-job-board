<template>
    <div class="modal flex modal-bg fixed inset-0 z-50 overflow-y-scroll">
        <div v-on-clickaway="clickedAway" class="relative m-auto bg-white rounded-3xl w-[900px]">
            <button tabindex="1" @click="$emit('close')" class="absolute top-5 right-5 text-gray-400 hover:text-gray-500 transition-colors">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                <span class="sr-only">Close Sign In Modal</span>
            </button>
            <slot></slot>
        </div>
    </div>
</template>

<script>
import { mixin as clickaway } from 'vue-clickaway';
export default {
    name: "Modal",
    emits: ['close'],
    mixins: [ clickaway ],
    props: {
        showModal: false,
    },
    data() {
        return {
            bodyEl: document.getElementsByTagName('body')[0],
        }
    },
    mounted() {
      this.addBodyClass();
    },
    unmounted() {
        this.removeBodyClass();
    },
    methods: {
        clickedAway: function() {
            this.removeBodyClass()
            this.$emit('close')
        },
        addBodyClass() {
            this.bodyEl.classList.add('overflow-hidden')
        },
        removeBodyClass() {
            this.bodyEl.classList.remove('overflow-hidden')
        }
    }
}
</script>

<style scoped>
    .modal-bg {
        background-color: rgba(0,0,0,0.6);
    }
</style>