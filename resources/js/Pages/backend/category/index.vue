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
                            <div class="d-inline-flex float-right">
                                <Link
                                    :href="route('admin.category.create')"
                                    class="btn btn-sm btn-primary float-right"
                                >
                                    <i class="fa fa-plus"></i> Add New Category
                                </Link>
                            </div>
                            <table
                                id="DataTable"
                                class="table table-bordered table-striped"
                            >
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>name</th>
                                        <th>image</th>
                                        <th>description</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(cate, index) in category" :key="index">
                                        <td>{{ cate.id }}</td>
                                        <td>{{ cate.name }}</td>
                                        <td>

                                            <img
                                                :src="'/images/category/'+cate.image"
                                                class="w-50"
                                                alt=""
                                            />
                                        </td>
                                        <td v-html="cate.description"></td>
                                        <td class="text-center">
                                            <Link :href="route('admin.category.edit', cate.id )" class="btn btn-sm btn-primary m-1">
                                                <i class="fa fa-edit"></i>
                                            </Link>
                                            <button @click="destroy(cate.id)" class="btn btn-sm btn-danger m-1">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </AdminLayout>
</template>

<script>
import AdminLayout from "@/Layouts/AdminLayout.vue";
import { Link } from "@inertiajs/inertia-vue3";
import { Inertia } from '@inertiajs/inertia';

export default {
    components: {
        AdminLayout, Link
    },

    props:{
        category: Array,
    },

    setup(){
        const destroy = (id) => {
            if(confirm('Are you sure delete')){
                Inertia.delete(route('admin.category.destroy', id))
            }
        }

        return { destroy }
    },

    mounted() {
        $("#DataTable").DataTable();
        console.log(this.$refs.infoBox.offsetHeight);
    },
};
</script>
