<template>
    <Head title="Contact" />
    <FrontendLayout>
        <main id="main">
            <section id="contact" class="contact mt-5">
                <div class="container" data-aos="fade-up">
                    <div class="section-title">
                        <div class="container-fluid">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="/">Home</a>
                                    </li>
                                    <li
                                        class="breadcrumb-item active"
                                        aria-current="page"
                                    >
                                        Contact
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-4">
                            <div class="info">
                                <div class="address">
                                    <i class="bi bi-geo-alt"></i>
                                    <h4>Location:</h4>
                                    <p>A108 Adam Street, New York, NY 535022</p>
                                </div>

                                <div class="email">
                                    <i class="bi bi-envelope"></i>
                                    <h4>Email:</h4>
                                    <p>info@example.com</p>
                                </div>

                                <div class="phone">
                                    <i class="bi bi-phone"></i>
                                    <h4>Call:</h4>
                                    <p>+1 5589 55488 55s</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-8 mt-5 mt-lg-0">
                            <form @submit.prevent="submit">
                                <div class="row">
                                    <div class="col-md-6 form-group">
                                        <input
                                            type="text"
                                            class="form-control"
                                            id="name"
                                            placeholder="Your Name"
                                            v-model="form.name"
                                        />
                                        <InputError
                                            class="mt-2"
                                            :message="form.errors.name"
                                        />
                                    </div>
                                    <div
                                        class="col-md-6 form-group mt-3 mt-md-0"
                                    >
                                        <input
                                            type="email"
                                            class="form-control"
                                            id="email"
                                            placeholder="Your Email"
                                            v-model="form.email"
                                        />
                                        <InputError
                                            class="mt-2"
                                            :message="form.errors.email"
                                        />
                                    </div>
                                </div>
                                <div class="form-group mt-3">
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="subject"
                                        placeholder="Subject"
                                        v-model="form.subject"
                                    />
                                    <InputError
                                        class="mt-2"
                                        :message="form.errors.subject"
                                    />
                                </div>
                                <div class="form-group mt-3">
                                    <textarea
                                        class="form-control"
                                        rows="5"
                                        placeholder="Message"
                                        v-model="form.message"
                                    ></textarea>
                                    <InputError
                                        class="mt-2"
                                        :message="form.errors.message"
                                    />
                                </div>
                                <div class="text-center mt-2">
                                    <button
                                        type="submit"
                                        class="btn btn-warning"
                                    >
                                        Send Message
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
            <!-- End Contact Section -->
        </main>
        <!-- End #main -->
    </FrontendLayout>
</template>

<script setup>
import FrontendLayout from "../../Layouts/FrontendLayout.vue";
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";
import InputError from "@/Components/InputError.vue";

const form = useForm({
    name: "",
    email: "",
    subject: "",
    message: "",
});

var Toast = Swal.mixin({
    toast: true,
    position: "top-end",
    showConfirmButton: false,
    timer: 3000,
});

const submit = () => {
    form.post(route("contact_post"), {
        onSuccess: () => {
            Toast.fire({
                icon: "success",
                title: "Message Sent successfully !!",
            });
            form.reset();
        },
        onError: () => {
            Toast.fire({
                icon: "error",
                title: "Something is wrong !!",
            });
        },
    });
};
</script>
