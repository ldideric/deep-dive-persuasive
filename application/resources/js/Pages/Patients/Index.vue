<template>
    <Head title="Patients"/>

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Patients
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex justify-center bg-white rounded-md">
                <div class="py-6">
                    <table class="border">
                        <tr>
                            <th class="border-t border-b p-2">ID</th>
                            <th class="border-t border-b p-2">Name</th>
                            <th class="border-t border-b p-2">Gender</th>
                            <th class="border-t border-b p-2">Date of Birth</th>
                            <th class="border-t border-b p-2">Details</th>
                        </tr>
                        <tr v-for="patient in patients">
                            <td class="border-t border-b p-4 text-center">{{ patient.id }}</td>
                            <td class="border-t border-b p-4 text-center">{{ patient.name }}</td>
                            <td class="border-t border-b p-4 text-center">{{ patient.gender }}</td>
                            <td class="border-t border-b p-4 text-center">{{ patient.date_of_birth }}</td>
                            <td class="border-t border-b p-4">
                                <a href="#">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 9.776c.112-.017.227-.026.344-.026h15.812c.117 0 .232.009.344.026m-16.5 0a2.25 2.25 0 00-1.883 2.542l.857 6a2.25 2.25 0 002.227 1.932H19.05a2.25 2.25 0 002.227-1.932l.857-6a2.25 2.25 0 00-1.883-2.542m-16.5 0V6A2.25 2.25 0 016 3.75h3.879a1.5 1.5 0 011.06.44l2.122 2.12a1.5 1.5 0 001.06.44H18A2.25 2.25 0 0120.25 9v.776" />
                                    </svg>
                                </a>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import {Head} from '@inertiajs/vue3';

export default {
    name: "InvestmentsIndex",
    components: {
        AuthenticatedLayout,
        Head,
    },
    props: {
        patients: Object,
    },

}
</script>