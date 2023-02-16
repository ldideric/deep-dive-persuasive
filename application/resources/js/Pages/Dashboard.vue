<script>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import {Head, router, useForm} from '@inertiajs/vue3';
import PrimaryButton from "@/Components/PrimaryButton.vue";
import InputLabel from "@/Components/InputLabel.vue";
import InputError from "@/Components/InputError.vue";
import SuccessMessage from "@/Components/SuccessMessage.vue";
import {usePrecognitiveForm} from "laravel-precognition-vue";

export default {
    components: {
        SuccessMessage,
        InputError,
        InputLabel,
        PrimaryButton,
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
        isScientist: {
            type: Boolean,
            required: true,
            default: false,
        },
        patient: {
            type: Object,
            required: false,
        },
        flash: {
            type: Object,
            required: false,
        },
        errors: {
            type: Object,
            required: false,
        }
    },
    setup(props) {
        const searchForm = useForm({
            patientId: '',
        });

        if(props.patient) {
            const form = usePrecognitiveForm('post', route('results.store', props.patient.slug), useForm({
                proteinOne: '',
                proteinTwo: '',
                proteinThree: '',
                proteinFour: '',
                controlValue: '',
            }));

            const excelForm = useForm({
                file: '',
                patientId: props.patient.id,
            });

            return {
                form,
                searchForm,
                excelForm,
            };
        }

        return {
            searchForm,
        };

    },
    methods: {
        view(result) {
           router.get(route('results.show', result.patient.slug));
        },
        createResult() {
            this.searchForm.get(route('dashboard'), {
                preserveScroll: true,
            })
        },
        create() {
            this.form.post(route('results.store', this.patient.slug), {
                preserveScroll: true,
            });
        },
        onFileChange(file) {
            this.excelForm.file = file;
        },
        uploadExcel() {
            this.excelForm.post(route('results.import'), {
                preserveScroll: true,
            });
        },
    },
};
</script>

<template>
    <Head title="Dashboard" />
    <AuthenticatedLayout>
        <template #header v-if="!isScientist">
            <span
                class="font-semibold text-xl text-gray-800 leading-tight"
            >
                Dashboard
            </span>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-xl font-semibold text-gray-900">Welcome {{ user.name }}</div>
                    <div v-if="!isScientist">
                        <div class="flex justify-around">
                            <div class="left bg-gray-100 w-2/3 m-3 flex flex-col items-center py-2">
                                <div class="text-3xl font-semibold">
                                    Something
                                </div>
                            </div>
                            <div class="right bg-gray-100 w-1/3 m-3 flex flex-col items-center py-2">
                                <div class="text-2xl font-semibold border-b-2 border-gray-200 mb-2">Recent activity</div>
                                <div class="">
                                    <table v-if="Object.keys(results).length > 0">
                                        <tr>
                                            <th class="border-b-2 border-gray-600 p-1">Patient</th>
                                            <th class="border-b-2 border-gray-600 p-1">Activity</th>
                                            <th class="border-b-2 border-gray-600 p-1"></th>
                                        </tr>
                                        <tr v-for="result in results" class="text-center">
                                            <td class="border-t-2 border-gray-400 p-1 px-4" >
                                                {{ result.patient.name }}
                                            </td>
                                            <td class="border-t-2 border-gray-400 p-1 px-4 font-semibold">
                                                New result
                                            </td>
                                            <td class="border-t-2 border-gray-400 p-1 px-4 font-semibold">
                                                <button @click="view(result)">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 9.776c.112-.017.227-.026.344-.026h15.812c.117 0 .232.009.344.026m-16.5 0a2.25 2.25 0 00-1.883 2.542l.857 6a2.25 2.25 0 002.227 1.932H19.05a2.25 2.25 0 002.227-1.932l.857-6a2.25 2.25 0 00-1.883-2.542m-16.5 0V6A2.25 2.25 0 016 3.75h3.879a1.5 1.5 0 011.06.44l2.122 2.12a1.5 1.5 0 001.06.44H18A2.25 2.25 0 0120.25 9v.776" />
                                                    </svg>
                                                </button>
                                            </td>
                                        </tr>
                                    </table>
                                    <div v-else class="text-center text-gray-500">No recent activity</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div
                        v-else
                        class="p-6 bg-white"
                    >
                        <span class="text-gray-500">
                            Search for a patient by ID and add new lab results
                        </span>
                        <InputError v-if="errors.patientId" :message="errors.patientId" class="m-4"></InputError>
                        <div class="flex px-2">
                            <input
                                type="text"
                                class="block w-full mr-4 rounded-md border-gray-300 pr-12 shadow-sm focus:border-blue-400 focus:ring-blue-400 sm:text-sm"
                                placeholder="Patient ID"
                                v-model="searchForm.patientId"
                            />
                            <PrimaryButton @click="createResult">
                                Add
                            </PrimaryButton>
                        </div>
                        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" v-if="patient">
                            <div class="bg-white overflow-hidden sm:rounded-lg flex flex-col">
                                <div class="p-4">
                                    <SuccessMessage v-if="flash.success" :message="flash.success" class="m-4"></SuccessMessage>
                                    <InputError v-if="excelForm.errors" :message="excelForm.errors[0]" class="m-4"></InputError>
                                    <span class="italic text-lg font-semibold text-left"> Add a new lab result for patient {{ patient.name }}</span>
                                </div>
                                <div class="p-6 flex flex-col space-y-6 justify-center items-center">
                                    <div>
                                        <InputLabel value="Protein One"></InputLabel>
                                        <InputError v-if="form.errors.proteinOne" :message="form.errors.proteinOne"></InputError>
                                        <input
                                            type="text"
                                            name="protein_one"
                                            class="block w-full flex-1 rounded-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                            placeholder="value"
                                            v-model="form.proteinOne"
                                            @change="form.validate('proteinOne')"
                                        >
                                    </div>
                                    <div>
                                        <InputLabel value="Protein Two"></InputLabel>
                                        <InputError v-if="form.errors.proteinTwo" :message="form.errors.proteinTwo"></InputError>
                                        <input
                                            type="text"
                                            name="protein_two"
                                            class="block w-full flex-1 rounded-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                            placeholder="value"
                                            v-model="form.proteinTwo"
                                            @input="form.validate('proteinTwo')"
                                        >
                                    </div>
                                    <div>
                                        <InputLabel value="Protein Three"></InputLabel>
                                        <InputError v-if="form.errors.proteinThree" :message="form.errors.proteinThree"></InputError>

                                        <input
                                            type="text"
                                            name="protein_three"
                                            class="block w-full flex-1 rounded-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                            placeholder="value"
                                            v-model="form.proteinThree"
                                            @input="form.validate('proteinThree')"
                                        >
                                    </div>
                                    <div>
                                        <InputLabel value="Protein Four"></InputLabel>
                                        <InputError v-if="form.errors.proteinFour" :message="form.errors.proteinFour"></InputError>

                                        <input
                                            type="text"
                                            name="protein_four"
                                            class="block w-full flex-1 rounded-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                            placeholder="value"
                                            v-model="form.proteinFour"
                                            @input="form.validate('proteinFour')"
                                        >
                                    </div>
                                    <div>
                                        <InputLabel value="Control value"></InputLabel>
                                        <InputError v-if="form.errors.controlValue" :message="form.errors.controlValue"></InputError>
                                        <input
                                            type="text"
                                            name="signal_value"
                                            class="block w-full flex-1 rounded-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                            placeholder="value"
                                            v-model="form.controlValue"
                                            @input="form.validate('controlValue')"
                                        >
                                    </div>
                                    <PrimaryButton class="w-1/6" @click.prevent="create">submit</PrimaryButton>
                                </div>
                                <div class="w-full flex justify-end">
                                    <input type="file" @change="onFileChange($event.target.files[0])" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel">
                                    <PrimaryButton class="w-1/6 bg-green-500 font-bold text-center" @click.prevent="uploadExcel">Upload Excel</PrimaryButton>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
