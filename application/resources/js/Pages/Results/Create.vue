<template>
    <AuthenticatedLayout>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <InputLabel value="Protein1"></InputLabel>
                        <input type="number" v-model="form.proteinOne" @input="form.validate('proteinOne')">
                        <InputLabel value="Protein2"></InputLabel>
                        <input type="number" v-model="form.proteinTwo">
                        <InputLabel value="Protein3"></InputLabel>
                        <input type="number" v-model="form.proteinThree">
                        <InputLabel value="Protein4"></InputLabel>
                        <input type="number" v-model="form.proteinFour">
                        <InputLabel value="Signal Value"></InputLabel>
                        <input type="number" v-model="form.signalValue">
                        <button @click.prevent="create">submit</button>
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

export default {
    components: {
        AuthenticatedLayout,
        InputLabel
    },
    props: {
        patient: {
            type: Object,
            required: true,
        },
    },
    setup() {
        const form = usePrecognitiveForm('post', route('results.store'), useForm({
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
                onSuccess: () => {
                    this.$inertia.reload();
                },
            });
        }
    },
};

</script>