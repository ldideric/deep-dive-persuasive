<template>
    <GuestLayout>
        <div class="flex justify-center items-center">
            <div class="col-md-8">
                <div class="card-group">
                    <div class="card p-4">
                        <div class="card-body">
                            <p class="alert alert-info" v-if="message">
                                {{ message }}
                            </p>
                            <div>
                                <div>Two Factor Verification</div>
                                <p class="text-muted">
                                    You have received an email which contains two factor login code.
                                    If you haven't received it, press <a href="{{ route('verify.resend') }}" class="text-blue-500">here</a>.
                                </p>

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fa fa-lock"></i>
                                    </span>
                                    </div>
                                    <input
                                        placeholder="Two Factor Code"
                                        style="box-shadow: 0 4px 20px 0 rgba(33, 36, 33, 0.08)"
                                        class="h-12 w-full rounded-md border border-transparent bg-white px-3 placeholder:text-gray-300 focus:border-indigo-500 focus:ring-indigo-500"
                                        :class="{ 'border-red-500': errors }"
                                        type="text"
                                        v-model="form.two_factor_code"
                                    />
                                    <div class="text-red-400" v-if="errors.two_factor_code">
                                        {{ errors.two_factor_code }}
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-6">
                                        <submit-button :is-processing="form.processing" @click="verify">
                                            Verify
                                        </submit-button>
                                    </div>
                                    <div class="col-6 text-right">
                                        <primary-button @click="logout">
                                            Logout
                                        </primary-button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </GuestLayout>
</template>

<script>
import PrimaryButton from "@/Components/PrimaryButton.vue";
import {router, useForm} from "@inertiajs/vue3";
import GuestLayout from "@/Layouts/GuestLayout.vue";
import SubmitButton from "@/Components/SubmitButton.vue";

export default {
    name: "TwoFactor",
    components: {SubmitButton, GuestLayout, PrimaryButton},
    props: {
        message: String,
        errors: Object
    },
    setup () {
        const form = useForm({
            two_factor_code: ''
        });

        return { form }
    },
    methods: {
        logout() {
            router.post(route('logout'));
        },
        verify() {
            this.form.post(route('verify.store'), {
                preserveScroll: true,
            });
        }

    }
}
</script>
