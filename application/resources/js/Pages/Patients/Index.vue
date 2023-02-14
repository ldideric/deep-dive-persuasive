<template>
    <Head title="Patients"/>

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Patients
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex justify-center">
                <table>
                    <tr>
                        <th class="border">ID</th>
                        <th class="border">Name</th>
                        <th class="border">Gender</th>
                        <th class="border">Date of Birth</th>
                        <th></th>
                    </tr>
                    <tr v-for="patient in patients">
                        <td class="border p-4">{{ patient.id }}</td>
                        <td class="border p-4">{{ patient.name }}</td>
                        <td class="border p-4">{{ patient.gender }}</td>
                        <td class="border p-4">{{ patient.date_of_birth }}</td>
                        <td class="p-4"><a :href="'/patients/' + patient.id">Edit</a></td>
                    </tr>

                </table>
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