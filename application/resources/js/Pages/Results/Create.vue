<template>
    <AuthenticatedLayout>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <SuccessMessage v-if="flash.success" :message="flash.success" class="m-4"></SuccessMessage>
                    <div class="p-6 flex flex-col space-y-6">
                        <div>
                            <InputLabel value="Protein one"></InputLabel>
                            <InputError v-if="form.errors.proteinOne" :message="form.errors.proteinOne"></InputError>
                            <input
                                type="text"
                                name="protein_one"
                                class="block w-1/4 flex-1 rounded-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
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
                                class="block w-1/4 flex-1 rounded-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
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
                                class="block w-1/4 flex-1 rounded-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
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
                                class="block w-1/4 flex-1 rounded-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                placeholder="value"
                                v-model="form.proteinFour"
                                @input="form.validate('proteinFour')"
                            >
                        </div>
                        <div>
                            <InputLabel value="Signal value"></InputLabel>
                            <InputError v-if="form.errors.signalValue" :message="form.errors.signalValue"></InputError>
                            <input
                                type="text"
                                name="signal_value"
                                class="block w-1/4 flex-1 rounded-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                placeholder="value"
                                v-model="form.signalValue"
                                @input="form.validate('signalValue')"
                            >
                        </div>
                        <PrimaryButton class="w-32" @click.prevent="create">submit</PrimaryButton>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script>

import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import InputLabel from '@/Components/InputLabel.vue';
import { useForm } from '@inertiajs/vue3';
import { usePrecognitiveForm } from "laravel-precognition-vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import InputError from "@/Components/InputError.vue";
import SuccessMessage from "@/Components/SuccessMessage.vue";

export default {
    components: {
        SuccessMessage,
        InputError,
        PrimaryButton,
        AuthenticatedLayout,
        InputLabel
    },
    props: {
        patient: {
            type: Object,
            required: true,
        },
        flash: {
            type: Object,
            required: false,
        },
    },
    setup(props) {
        const form = usePrecognitiveForm('post', route('results.store', props.patient.slug), useForm({
            proteinOne: '',
            proteinTwo: '',
            proteinThree: '',
            proteinFour: '',
            signalValue: '',
        }));

        return {
            form,
        };
    },
    methods: {
        create() {
            this.form.post(route('results.store', this.patient.slug), {
                preserveScroll: true,
            });
        }
    },
};

</script>
