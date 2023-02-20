<script>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, router } from '@inertiajs/vue3';

export default {
    components: {
        AuthenticatedLayout,
        Head,
    },
    props: {
        user: {
            type: Object,
            required: true,
        },
        results: {
            type: Object,
            required: false,
        },
    },
    methods: {
        view(result) {
           router.get(route('results.show', result.patient.slug));
        }
    },
};
</script>

<template>
    <Head title="Dashboard" />
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Dashboard</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-xl font-semibold text-gray-900">Welcome {{ user.name }}</div>
                    <div class="flex justify-around">
                        <div class="left bg-gray-100 w-2/3 m-3 flex flex-col items-center py-2">
                            <div class="text-3xl font-semibold">
                                Something
                            </div>
                        </div>
                        <div class="right bg-gray-100 w-1/3 m-3 flex flex-col items-center py-2">
                            <div class="text-2xl font-semibold border-b-2 mb-2">Recent activity</div>
                            <div class="">
                                <table v-if="Object.keys(results).length > 0">
                                    <tr>
                                        <th class="border-b-2 border-gray-600 p-1">Patient</th>
                                        <th class="border-b-2 border-gray-600 p-1">Activity</th>
                                    </tr>
                                    <tr v-for="result in results" class="text-center">
                                        <td class="border-t-2 border-gray-400 p-1 px-4">
                                            <button @click="view(result)">
                                                {{ result.patient.name }}
                                            </button>
                                        </td>
                                        <td class="border-t-2 border-gray-400 p-1 px-4 font-semibold">
                                            <button @click="view(result)">
                                                New result
                                            </button>
                                        </td>
                                    </tr>
                                </table>
                                <div v-else class="text-center text-gray-500">No recent activity</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
