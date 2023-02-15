<template>
    <Head title="Patients"/>

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Patients
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex justify-center bg-white rounded-md flex flex-col justify-center items-center">
                <div class="w-2/4 mt-10">
                    <div class="w-full">
                        <input
                            v-model="form.search"
                            @input="search"
                            type="text" name="search" id="search"
                            placeholder="Search by name or ID"
                            class="block w-full rounded-md border-gray-300 pr-12 shadow-sm focus:border-blue-400 focus:ring-blue-400 sm:text-sm">
                        <div class="absolute inset-y-0 right-0 flex py-1.5 pr-1.5">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                 stroke="currentColor" class="w-6 h-6 text-slate-400">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z"/>
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="py-6 w-full">
                    <table class="border-2 w-full">
                        <tr>
                            <th class="border-t border-b p-2">ID</th>
                            <th class="border-t border-b p-2">Name</th>
                            <th class="border-t border-b p-2">Gender</th>
                            <th class="border-t border-b p-2">Date of Birth</th>
                            <th class="border-t border-b p-2">Details</th>
                        </tr>
                        <tr v-for="patient in patients">
                            <td class="border-t-2 border-b-2 p-4 text-center">{{ patient.id }}</td>
                            <td class="border-t-2 border-b-2 p-4 text-center">{{ patient.name }}</td>
                            <td class="border-t-2 border-b-2 p-4 text-center">{{ patient.gender }}</td>
                            <td class="border-t-2 border-b-2 p-4 text-center">{{ patient.date_of_birth }}</td>
                            <td class="border-t-2 border-b-2 p-4">
                                <button @click="view(patient)">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 9.776c.112-.017.227-.026.344-.026h15.812c.117 0 .232.009.344.026m-16.5 0a2.25 2.25 0 00-1.883 2.542l.857 6a2.25 2.25 0 002.227 1.932H19.05a2.25 2.25 0 002.227-1.932l.857-6a2.25 2.25 0 00-1.883-2.542m-16.5 0V6A2.25 2.25 0 016 3.75h3.879a1.5 1.5 0 011.06.44l2.122 2.12a1.5 1.5 0 001.06.44H18A2.25 2.25 0 0120.25 9v.776" />
                                    </svg>
                                </button>
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
import {Head, router} from '@inertiajs/vue3';
import { useForm } from '@inertiajs/vue3';

export default {
    name: "PatientsIndex",
    components: {
        AuthenticatedLayout,
        Head,
    },
    props: {
        patients: Object,
        search: {
            required: true
        },
    },
    setup (props) {
        const form = useForm({
            search: props.search || '',
        });

        const search = () => {
            form.get(route('patients.index'), {
                preserveState: true,
                onSuccess: (page) => {
                    props.patients = page.props.patients;
                },
            });
        };

        return {
            form,
            search,
        }
    },
    methods: {
        view(patient) {
            router.get(route('results.show', patient.slug));
        }
    }

}
</script>
