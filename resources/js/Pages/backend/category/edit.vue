<template>
    <Head title="Dashboard" />

    <AdminLayout>
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Dashboard</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">
                                <a href="#">Home</a>
                            </li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form @submit.prevent="updateCategory()">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="">Name</label>
                                            <input
                                                type="text"
                                                v-model="form.name"
                                                class="form-control"
                                                id=""
                                                placeholder="Category Name"
                                            />
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">Image</label>
                                                    <input
                                                        type="file"
                                                        id="image"
                                                        name="image"
                                                        class="form-control"
                                                        @change="previewImage"
                                                        @input="
                                                            form.image =
                                                                $event.target.files[0]
                                                        "
                                                    />
                                                    <div
                                                        v-if="errors.image"
                                                        class="font-bold text-red-600"
                                                    >
                                                        {{ errors.image }}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <img
                                                        :src="url"
                                                        class="w-50"
                                                        alt=""
                                                    />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="">Description</label>
                                            <textarea
                                                id="description"
                                                class="form-control"
                                                v-model="form.description"
                                            ></textarea>
                                        </div>
                                    </div>
                                </div>
                                <button
                                    class="btn btn-outline-primary"
                                    type="submit"
                                >
                                    <i class="fa fa-sync"></i> Update
                                </button>
                                <Link
                                    :href="route('admin.category.index')"
                                    class="btn btn-default ml-2"
                                >
                                    <i class="fa fa-window-close-o"></i> Cancel
                                </Link>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </AdminLayout>
</template>

<script>
import AdminLayout from "@/Layouts/AdminLayout.vue";
import { Link, useForm } from "@inertiajs/inertia-vue3";
import { Inertia } from "@inertiajs/inertia";

export default {
    components: {
        AdminLayout,
        Link,
    },

    props: {
        category: Object,
        errors: Object,
        image: String,
    },

    setup(props) {
        const form = useForm({
            name: props.category.name,
            description: props.category.description,
            image: null,
        });

        function updateCategory() {
            Inertia.post(`/admin/category/${props.category.id}`, {
                _method: "put",
                name: form.name,
                image: form.image,
                description: form.description,
            });
        };

        return { form, updateCategory};
    },

    data() {
        return {
            url: this.image,
        };
    },

    mounted() {
        let vit = this;
        $("#description").summernote({
            height: 150,
            callbacks: {
                onChange: function (contents, $editable) {
                    vit.form.description = contents;
                    console.log(contents);
                },
            },
        });
    },
    methods: {

        previewImage(e) {
            console.log('hello');
            const file = e.target.files[0];
            this.url = URL.createObjectURL(file);
        },
        
    },
};
</script>
