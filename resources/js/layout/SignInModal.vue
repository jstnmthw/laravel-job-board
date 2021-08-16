<template>
    <modal show-modal="showModal">
        <div class="grid sm:grid-cols-1 md:grid-cols-2 gap-0">
            <div class="p-12 border-r border-gray-200">
                <h2 class="text-3xl font-bold text-dark tracking-tight mb-16">Hi there,<br> welcome back.</h2>
                <img alt="Sign in Image" src="/images/sign-in.svg" class="block mb-10" width="350">
                <div class="text-center m-0 text-charcoal">
                    Don't have an account? <a href="#" class="text-orange hover:text-orange-dark hover:underline">Sign up here</a>
                </div>
            </div>
            <div class="p-12 flex flex-col mt-6">
                <button tabindex="2" class="block font-bold text-blue border-blue hover:text-white hover:bg-blue transition-all border-solid border rounded-full p-3 mb-5">Sign in with Google</button>
                <button tabindex="3" class="block font-bold text-blue border-blue hover:text-white hover:bg-blue transition-all border-solid border rounded-full p-3 mb-12">Sign in with Facebook</button>
                <div class="flex items-center mb-8">
                    <hr class="w-full">
                    <div class="px-3 text-gray-400">Or</div>
                    <hr class="w-full">
                </div>
                <form v-on:submit.prevent="submitLogin">
                    <div class="mb-4">
                        <label class="text-slate mb-2 block">Email</label>
                        <input v-model="form.email" tabindex="3" id="email" type="email" required class="w-full p-2 border border-gray-300 outline-none rounded-lg focus:shadow-input focus:border-peach">
                    </div>
                    <div class="mb-6">
                        <div class="flex items-center justify-between mb-2">
                            <label class="text-slate">Password</label>
                            <button tabindex="4" class="text-sm text-orange hover:text-orange-dark hover:underline">Forgot Password?</button>
                        </div>
                        <input v-model="form.password" tabindex="5" id="password" type="password" required class="w-full p-2 border border-gray-300 outline-none rounded-lg focus:shadow-input focus:border-peach">
                    </div>
                    <button type="submit" tabindex="6" :class="{ 'pointer-events-none bg-orange-dark cursor-default': authLoading }" class="block p-3 bg-orange hover:bg-orange-dark text-white font-bold w-full rounded-full focus:shadow-lg focus:bg-orange-dark hover:shadow-lg transition-all">
                        <svg v-if="authLoading"  class="w-6 h-6 text-white fill-current m-auto" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="40px" height="40px" viewBox="0 0 50 50" xml:space="preserve">
                            <path fill="currentColor" d="M25.251,6.461c-10.318,0-18.683,8.365-18.683,18.683h4.068c0-8.071,6.543-14.615,14.615-14.615V6.461z">
                                <animateTransform attributeType="xml"
                                    attributeName="transform"
                                    type="rotate"
                                    from="0 25 25"
                                    to="360 25 25"
                                    dur="0.6s"
                                    repeatCount="indefinite"/>
                            </path>
                        </svg>
                        <span v-else>Sign in</span>
                    </button>
                </form>
            </div>
        </div>
    </modal>
</template>

<script>
import Modal from '@/components/modal/Modal'
import { mapActions, mapGetters } from "vuex";
import store from "@/store";

export default {
    data() {
        return {
            form : {
                email: '',
                password: '',
            }
        }
    },
    components: { Modal },
    computed: {
        ...mapGetters(['authLoading'])
    },
    methods: {
        ...mapActions(['login']),
        submitLogin() {
            if(this.authLoading) {
                return;
            }
            store.dispatch('login', this.form).then(() => {
                this.$emit('close');
            });
        },
    }
}
</script>

<style scoped>

</style>