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
                            <form @submit.prevent="submit">
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
                                        <div class="form-group">
                                            <label for="">Image</label>
                                            <input
                                                type="file"
                                                id="image"
                                                name="image"
                                                class="form-control"
                                                @input="
                                                    form.image =
                                                        $event.target.files[0]
                                                "
                                            />
                                            <!-- <input
                                                type="file"
                                                @change="previewImage"
                                                ref="photo"
                                                class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600"
                                            />-->
                                             <img
                                                :src="'/images/category/'+this.category.image"
                                                class="w-25"
                                                alt=""
                                            />
                                            <!-- <div
                                                v-if="errors.image"
                                                class="font-bold text-red-600"
                                            >
                                                {{ errors.image }}
                                            </div> -->
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
                                <button class="btn btn-outline-primary" type="submit">
                                    <i class="fa fa-sync"></i>  Update
                                </button>
                                <Link :href="route('admin.category.index')" class="btn btn-default ml-2">
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

<script setup>
import AdminLayout from "@/Layouts/AdminLayout.vue";
import { Link, useForm } from "@inertiajs/inertia-vue3";
import { Inertia } from '@inertiajs/inertia';

const props = defineProps({
    category: Object,
    // errors: Object,
    image : String
});

const form = useForm({
    name : props.category.name,
    description : props.category.description,
    image : null,
})

function submit() {
    Inertia.post(`/admin/category/update/${props.category.id}`, {
        _method: 'put',
        name: form.name,
        image: form.image,
        description: form.description,
    })
}

</script>


// <script>
// import AdminLayout from "@/Layouts/AdminLayout.vue";
// import { Link, useForm } from "@inertiajs/inertia-vue3";
// import { Inertia } from '@inertiajs/inertia';

// export default {
//     components: {
//         AdminLayout, Link
//     },
//     props: {
//         errors: Object,
//         category : Object,
//     },

//     setup (props) {
//         const form = useForm({
//             id: props.category.id,
//             name: props.category.name,
//             image: null,
//             description: props.category.description,
//         });

//         function submit() {
//             Inertia.post(`/admin/category/update/${props.category.id}`, {
//                 _method: 'put',
//                 name: form.name,
//                 image: form.image,
//                 description: form.description,
//             })
//         }
//         return { form, submit }
//     },

//     data() {
//         return {
//             url : this.category.image
//         };
//     },

//     mounted() {
//         let vit = this;
//         $("#description").summernote({
//             callbacks: {
//                 onChange: function (contents, $editable) {
//                     vit.form.description = contents;
//                     console.log(contents);
//                 },
//             },
//         });
//     },
//     methods: {
//         previewImage(e) {
//             const file = e.target.files[0];
//             this.url = URL.createObjectURL(file);
//         },
//     },
// };
// </script>
