<template>
    <AuthenticatedLayout>
        <div class="mx-auto max-w-7xl flex justify-center items-center bg-white m-8 p-4 pb-6 text-center rounded-s">
            <div class="w-full">
                <div class="font-bold text-3xl mt-2 mb-4">
                    {{ patient.name }}
                </div>
                <div class="flex justify-around">
                    <div class="left">
                        <div class="text-3xl font-bold m-3 border-b-2">
                            Patient information
                        </div>
                        <div class="group transition duration-500 bg-gray-100 hover:bg-gray-200 hover:drop-shadow-2xl drop-shadow-xl rounded-lg p-5 mb-3 w-96">
                            <div v-for="(value, info) in patient" class="transition duration-500 m-1 p-1 text-lg w-fit underline decoration-gray-200 group-hover:decoration-gray-300 underline-offset-8">
                                <span class="font-bold">{{ ucfirst(info) }}</span>:
                                <a v-if="info == 'email'" :href="'mailto:' + value" class="text-blue-600">{{ value }}</a>
                                <span v-else>{{ value }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="right">
                        <div class="text-3xl font-bold m-3 border-b-2">
                            Test result
                        </div>
                        <div v-for="(result, index) in results" class="transition duration-500 bg-gray-100 hover:bg-gray-200 hover:drop-shadow-2xl drop-shadow-xl rounded-lg p-4 mb-5 w-96" :class="{ 'border-4 border-green-300': index == 0 }">
                            <div class="font-bold border-b-2 text-lg">
                                <span v-if="index == 0" class="text-xl text-lime-500">Most recent<br/></span>
                                {{ result.date }} - Test result
                            </div>
                            <div class="m-1 p-1 w-fit">
                                <span class="font-bold">Date</span>: {{ result.date }}
                            </div>
                            <div class="m-1 p-1 w-fit">
                                <span class="font-bold">Result</span>: {{ result.risk }}
                            </div>
                            <a class="p-1 text-center text-gray-500 underline underline-offset-2 font-semibold cursor-pointer select-none">
                                More information
                            </a>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';

export default {
    components: {
        AuthenticatedLayout
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
        }
    },
    computed: {
        results: function () {
            return _.orderBy(this.results, 'id', 'desc')
        }
    }
}

</script>