<template>
    <Head title="Results" />
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Result of {{ result.date }}</h2>
        </template>
        <div class="py-12 flex justify-center items-center text-center">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 bg-white rounded-md w-full relative">
                <button @click="back" class="absolute left-2 top-2 bg-gray-100 hover:bg-gray-200 drop-shadow-lg rounded-lg mb-3 w-fit m-1">
                    <div class="m-1 p-1 text-lg w-full text-center font-bold flex">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 15L3 9m0 0l6-6M3 9h12a6 6 0 010 12h-3" />
                        </svg>
                        <span class="pl-2">
                            Back
                        </span>
                    </div>
                </button>
                <div class="font-bold text-3xl mt-2 pb-1 mb-8">
                    {{ patient.name }}
                </div>
                <div class="flex justify-center w-full">
                    <div class="bg-gray-100 drop-shadow-lg rounded-lg p-5 mb-3 w-[28vw]">
                        <div class="m-1 p-1 text-lg w-full">
                            <div class="font-bold text-3xl p-2 border-b-2 border-gray-400 mb-3">Test result</div>
                            <div class="text-center">
                                <div class="pb-4">
                                    <span class="font-bold underline decoration-gray-300 underline-offset-4">Date</span><br>
                                    <span>{{ result.date }}</span>
                                </div>
                                <div class="pb-4">
                                    <span class="font-bold underline decoration-gray-300 underline-offset-4">Risk factor</span><br>
                                    <span class="font-semibold text-xl" :class="{'text-red-600': result.risk === 'High', 'text-orange-600': result.risk === 'Medium', 'text-green-600': result.risk === 'Low'}">{{ result.risk }}</span>
                                </div>
                                <div class="pb-4">
                                    <span class="font-bold underline decoration-gray-300 underline-offset-4">Result value</span><br>
                                    <span>{{ result.value }}</span>
                                </div>
                                <div class="pb-4">
                                    <span class="font-bold underline decoration-gray-300 underline-offset-4">Protein level 1</span><br>
                                    <span>{{ result.data.protein_one }}</span>
                                </div>
                                <div class="pb-4">
                                    <span class="font-bold underline decoration-gray-300 underline-offset-4">Protein level 2</span><br>
                                    <span>{{ result.data.protein_two }}</span>
                                </div>
                                <div class="pb-4">
                                    <span class="font-bold underline decoration-gray-300 underline-offset-4">Protein level 3</span><br>
                                    <span>{{ result.data.protein_three }}</span>
                                </div>
                                <div class="pb-2">
                                    <span class="font-bold underline decoration-gray-300 underline-offset-4">Protein level 4</span><br>
                                    <span>{{ result.data.protein_four }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';

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
        result: {
            type: Array,
            required: false
        }
    },
    methods: {
        ucfirst(string) {
            return string.charAt(0).toUpperCase() + string.slice(1);
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