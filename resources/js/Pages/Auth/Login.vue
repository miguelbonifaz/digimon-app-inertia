<script setup>
import { Head, Link, useForm } from '@inertiajs/vue3';
import InputError from '@/Components/InputError.vue';
import Checkbox from '@/Components/Checkbox.vue';

defineProps({
    canResetPassword: {
        type: Boolean,
    },
    status: {
        type: String,
    },
});

const form = useForm({
    email: '',
    password: '',
    remember: false,
});

const submit = () => {
    form.post(route('login'), {
        onFinish: () => form.reset('password'),
    });
};
</script>

<template>
    <Head title="Log in" />

    <div class="py-12 sm:px-6 lg:px-8 h-full flex items-center">
        <div class="flex flex-col w-full">
            <div class="sm:mx-auto sm:w-full sm:max-w-md">
                <img
                    class="mx-auto h-10 w-auto"
                    src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600"
                    alt="Your Company"
                />
                <h2
                    class="mt-6 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900"
                >
                    Sign in to your account
                </h2>
            </div>

            <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-[480px]">
                <div class="bg-white px-6 py-12 shadow sm:rounded-lg sm:px-12">
                    <form class="space-y-6" @submit.prevent="submit">
                        <div>
                            <label
                                for="email"
                                class="block text-sm font-medium leading-6 text-gray-900"
                                >Email address</label
                            >
                            <div class="mt-2">
                                <input
                                    v-model="form.email"
                                    id="email"
                                    name="email"
                                    type="email"
                                    autocomplete="email"
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                />
                            </div>
                            <InputError class="mt-2" :message="form.errors.email" />
                        </div>

                        <div>
                            <label
                                for="password"
                                class="block text-sm font-medium leading-6 text-gray-900"
                                >Password</label
                            >
                            <div class="mt-2">
                                <input
                                    v-model="form.password"
                                    id="password"
                                    name="password"
                                    type="password"
                                    autocomplete="current-password"
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                />
                            </div>
                            <InputError class="mt-2" :message="form.errors.password" />
                        </div>

                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <Checkbox
                                    name="remember"
                                    v-model:checked="form.remember"
                                    id="remember"
                                />
                                <label
                                    for="remember"
                                    class="ml-3 block text-sm leading-6 text-gray-900"
                                    >Remember me</label
                                >
                            </div>

                            <div class="text-sm leading-6">
                                <Link
                                    href="/forgot-password"
                                    class="font-semibold text-indigo-600 hover:text-indigo-500"
                                    >Forgot password?
                                </Link>
                            </div>
                        </div>

                        <div>
                            <button
                                type="submit"
                                class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
                            >
                                Sign in
                            </button>
                        </div>
                    </form>
                    <div class="flex justify-center">
                        <Link href="/register" class="text-center w-full text-sm text-gray-700 mt-2">
                            ¿No tienes una cuenta? <b>Registrate aquí</b>
                        </Link>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>