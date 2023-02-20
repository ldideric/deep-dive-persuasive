<template>
    <Head title="Results" />
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Results</h2>
        </template>
        <div class="py-12 flex justify-center items-center text-center">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 bg-white rounded-md w-full relative py-6">
                <button @click="back" class="absolute left-2 top-2 bg-gray-100 hover:bg-gray-200 drop-shadow-lg rounded-lg mb-3 m-1 w-fit">
                    <div class="m-1 p-1 text-lg w-full text-center font-bold flex">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 15L3 9m0 0l6-6M3 9h12a6 6 0 010 12h-3" />
                        </svg>
                        <span class="pl-2">
                            Back
                        </span>
                    </div>
                </button>
                <div class="font-bold text-3xl mt-2 mb-4">
                    {{ patient.name }}
                </div>
                <div class="flex justify-around">
                    <div class="left">
                        <div class="text-3xl font-bold m-3 border-b-2">
                            Patient information
                        </div>
                        <div class="bg-gray-100 drop-shadow-lg rounded-lg p-5 mb-3 w-96">
                            <div class="m-1 p-1 text-lg w-fit underline decoration-gray-200 underline-offset-8 flex flex-col">
                                <div class="pb-4 text-left">
                                    <span class="font-bold">ID</span>:
                                    <span>{{ patient.id }}</span>
                                </div>
                                <div class="pb-4 text-left">
                                    <span class="font-bold">Name</span>:
                                    <span>{{ patient.name }}</span>
                                </div>
                                <div class="pb-4 text-left">
                                    <span class="font-bold">E-mail</span>:
                                    <a :href="'mailto:' + patient.email" class="text-blue-600">{{ patient.email }}</a>
                                </div>
                                <div class="pb-4 text-left">
                                    <span class="font-bold">Gender</span>:
                                    <span>{{ patient.gender }}</span>
                                </div>
                                <div class="pb-4 text-left">
                                    <span class="font-bold">Date of birth</span>:
                                    <span>{{ patient.date_of_birth }}</span>
                                </div>
                                <div class="pb-4 text-left">
                                    <span class="font-bold">Age</span>:
                                    <span>{{ patient.age }} years</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="right">
                        <div class="text-3xl font-bold m-3 border-b-2">
                            Test result
                        </div>
                        <div v-if="Object.keys(results).length > 0">
                            <div v-for="(result, index) in results" @click="view(result)" class="group transition duration-500 bg-gray-100 hover:bg-gray-200 hover:drop-shadow-xl drop-shadow-lg rounded-lg p-4 mb-5 w-96 cursor-pointer" :class="{ 'border-4 border-blue-400': index == 0 }">
                                <div class="transition duration-500 group-hover:border-gray-300 font-bold border-b-2 text-lg">
                                    <span v-if="index == 0" class="text-xl text-blue-500">Most recent<br/></span>
                                    {{ result.date }} - Test result
                                </div>
                                <div class="m-1 p-1 w-fit">
                                    <span class="font-bold">Date</span>: {{ result.date }}
                                </div>
                                <div class="m-1 p-1 w-fit">
                                    <span class="font-bold">Risk factor</span>:
                                    <span class="font-bold" :class="{'text-red-600': result.risk === 'High', 'text-orange-600': result.risk === 'Medium', 'text-green-600': result.risk === 'Low'}">{{ result.risk }}</span>
                                </div>
                            </div>
                        </div>
                        <div v-else class="text-center text-lg text-gray-500">
                            No test results found
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, router } from '@inertiajs/vue3';

export default {
    components: {
        AuthenticatedLayout,
        Head,
    },
    props: {
        patient: {
            type: Object,
            required: true,
        },
        results: {
            type: Array,
            required: false
        }
    },
    methods: {
        ucfirst(string) {
            return string.charAt(0).toUpperCase() + string.slice(1);
        },
        view(result) {
            router.get(route('results.info', [this.patient, result.id]));
        },
        back() {
            history.back();
        }
    },
    computed: {
        results: function () {
            return _.orderBy(this.results, 'id', 'desc')
        }
    }
}

</script>