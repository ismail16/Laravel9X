<script setup>
import FrontendLayout from "@/Layouts/FrontendLayout.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import { Head, useForm } from "@inertiajs/inertia-vue3";

const form = useForm({
    password: "",
});

const submit = () => {
    form.post(route("password.confirm"), {
        onFinish: () => form.reset(),
    });
};
</script>

<template>
    <FrontendLayout>
        <section class="inner-page mt-5">
            <div class="container">
                <div class="row d-flex justify-content-center">
                    <div class="col-6">
                        <div class="card">
                            <div class="card-header">Register</div>
                            <div class="card-body">
                                <Head title="Confirm Password" />

                                <div class="mb-4 text-sm text-gray-600">
                                    This is a secure area of the application.
                                    Please confirm your password before
                                    continuing.
                                </div>

                                <form @submit.prevent="submit">
                                    <div>
                                        <InputLabel
                                            for="password"
                                            value="Password"
                                        />
                                        <TextInput
                                            id="password"
                                            type="password"
                                            class="mt-1 block w-full"
                                            v-model="form.password"
                                            required
                                            autocomplete="current-password"
                                            autofocus
                                        />
                                        <InputError
                                            class="mt-2"
                                            :message="form.errors.password"
                                        />
                                    </div>

                                    <div class="flex justify-end mt-4">
                                        <PrimaryButton
                                            class="ml-4"
                                            :class="{
                                                'opacity-25': form.processing,
                                            }"
                                            :disabled="form.processing"
                                        >
                                            Confirm
                                        </PrimaryButton>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </FrontendLayout>
</template>
