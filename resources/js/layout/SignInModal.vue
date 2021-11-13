<template>
    <modal show-modal="showModal">
        <div class="grid sm:grid-cols-1 md:grid-cols-2 gap-0">
            <div class="p-12 border-r border-gray-200">
                <h2 class="text-3xl font-bold text-dark tracking-tight mb-16">Hi there,<br> welcome back.</h2>
                <img alt="Sign in Image" src="/images/sign-in.svg" class="block mb-10" width="350">
                <div class="text-center m-0 text-charcoal">
                    Don't have an account? <a href="#" class="text-orange-600 hover:text-orange-700 hover:underline">Sign up here</a>
                </div>
            </div>
            <div class="p-12 flex flex-col mt-6">
                <button tabindex="2" class="block font-bold text-blue-500 border-blue-500 hover:text-white hover:bg-blue-500 transition-all border-solid border rounded-full p-3 mb-5">Sign in with Google</button>
                <button tabindex="3" class="block font-bold text-blue-500 border-blue-500 hover:text-white hover:bg-blue-500 transition-all border-solid border rounded-full p-3 mb-12">Sign in with Facebook</button>
                <div class="flex items-center mb-8">
                    <hr class="w-full">
                    <div class="px-3 text-gray-400">Or</div>
                    <hr class="w-full">
                </div>
                <form v-on:submit.prevent="submitLogin">
                    <div class="mb-4">
                        <label class="text-slate mb-2 block" for="input-email">Email</label>
                        <input id="input-email" v-model="form.email" tabindex="3" type="email" required :class="{ 'border-red-600 focus:border-red-300 focus:ring-red-200' : errors.email }" class="w-full p-2 rounded-lg border-gray-300 focus:border-blue-200 focus:ring focus:ring-blue-100  focus:ring-opacity-50">
                        <span v-show="errors.email" class="text-red-600 text-[11px] font-semibold">
                            <svg aria-hidden="true" class="inline-block" fill="currentColor" focusable="false" width="16px" height="16px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-2h2v2zm0-4h-2V7h2v6z"></path></svg>
                            Invalid email. Try again or click Sign up to create account.
                        </span>
                    </div>
                    <div class="mb-4">
                        <div class="flex items-center justify-between mb-2">
                            <label class="text-slate" for="input-password">Password</label>
                            <button type="button" tabindex="4" class="text-sm text-orange-600 hover:text-orange-700 hover:underline">Forgot Password?</button>
                        </div>
                        <input v-model="form.password" tabindex="5" id="input-password" type="password" required :class="{ 'border-red-600 focus:border-red-300 focus:ring-red-200' : errors.password && !errors.email }" class="w-full p-2 rounded-lg border-gray-300 focus:border-blue-200 focus:ring focus:ring-blue-100  focus:ring-opacity-50">
                        <span v-show="errors.password && !errors.email" class="text-red-600 text-[11px] font-semibold">
                            <svg aria-hidden="true" class="inline-block" fill="currentColor" focusable="false" width="16px" height="16px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-2h2v2zm0-4h-2V7h2v6z"></path></svg>
                            Wrong password. Try again or click Forgot password to reset it.
                        </span>
                    </div>
                    <div class="mb-6">
                        <input id="input-remember" type="checkbox" v-model="form.remember" class="h-4 w-4 text-orange-600 focus:ring-blue-200 border-gray-300 rounded mr-2">
                        <label for="input-remember" class="text-gray-500">Remember me</label>
                    </div>
                    <button type="submit" tabindex="6" :class="{ 'pointer-events-none bg-orange-700 cursor-default': authLoading }" class="block p-3 bg-orange-600 hover:bg-orange-700 text-white font-bold w-full rounded-full focus:shadow-lg focus:bg-orange-700 hover:shadow-lg transition-all">
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
import { mapState, mapActions } from "vuex";
import store from "@/store";

export default {
    data() {
        return {
            form : {
                email: '',
                password: '',
                remember: false,
            }
        }
    },
    components: { Modal },
    computed: {
        ...mapState('account', [
            'errors',
            'authLoading'
        ]),
    },
    methods: {
        ...mapActions('account', [
            'login'
        ]),
        submitLogin(e) {
            e.preventDefault();
            if(this.authLoading) {
                return;
            }
            store.dispatch('account/login', this.form)
        },
    }
}
</script>