<script setup>
import { Head, Link } from '@inertiajs/inertia-vue3';

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
});
</script>

<template>
    <Head title="Welcome" />

    <div class="flex justify-center">
        <div v-if="canLogin" class="mt-6  w-52">
            <Link v-if="$page.props.user" :href="route('dashboard')" class="bg-blue-600 hover:bg-blue-700 rounded p-3 text-white">Dashboard</Link>

            <template v-else>
                <Link :href="route('login')" class="bg-blue-600 hover:bg-blue-700 rounded p-3 text-white">Log in</Link>

                <Link v-if="canRegister" :href="route('register')" class="bg-blue-600 hover:bg-blue-700 rounded p-3 text-white ml-3">Register</Link>
            </template>
        </div>

    </div>

        <div class="bg-gray-200 p-12 rounded font-bold m-8 text-center" >
            Spam protection App
        </div>


</template>
