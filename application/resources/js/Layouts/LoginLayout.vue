<script setup>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import { Link } from '@inertiajs/vue3';
</script>

<template>
    <div class="min-h-screen flex justify-around items-center bg-gradient-to-bl from-blue-50 via-gray-100 to-red-100">
        <div class="w-2/3">
            <div class="flex flex-col justify-center items-center pt-6 sm:pt-0">
                <div>
                    <Link href="/">
                        <ApplicationLogo class="block h-14 w-auto fill-current text-gray-800"/>
                    </Link>
                </div>
                <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                <slot />
            </div>
            </div>
        </div>
        <div class="w-1/3 min-h-screen border-l-4 border-gray-400 shadow-2xl bg-gradient-to-b from-blue-50 via-blue-100 to-indigo-600">
            <div class="flex flex-col">
                <div class="px-10 pt-7 relative min-h-screen">
                    <div class="text-4xl font-bold text-black mb-5 border-b-2 border-slate-400 w-fit">Persuasive panel</div>
                    <div class="text-lg font-medium text-gray-800">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ratione voluptatibus magni quas quasi cupiditate? Cum doloremque itaque vero eligendi, et nobis optio aperiam laborum, voluptatum doloribus deleniti recusandae, velit dolorum!</div>
                    <div class="absolute bottom-0 right-0 border-t-8 border-l-8 border-black rounded-tl-xl ml-6">
                        <img src="/images/panelresults2.png" class="object-cover object-top h-[30vh] w-[28vw]" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
